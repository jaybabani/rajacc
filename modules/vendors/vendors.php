<?php
$module = "vendors";
$pageid = "vendors-read";
include("../../common/header.php");
// include("vendor-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_pages = [
    "read" => "vendors",
    "update" => "vendor-form",
    "create" => "vendor-form",
    "delete" => "vendor-delete"
  ];

  $pagetitle = T("Vendors");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "vendors";

  $primary_column = "id";

  $raw_materials_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);    // print_arr($raw_materials_arr);
  // $data["raw_materials"] = [];
  $vendor_raw_material_link_arr = fetch_data(["table" => "vendor_raw_material_link", "columns" => "vendor, raw_material", "condition" => "", "order" => "", "limit" => ""]);
  $links = [];
  foreach ($vendor_raw_material_link_arr as $lk => $lv) {
    $links[$lv["vendor"]][] = $lv["raw_material"];
  }
  // print_arr($raw_materials_arr);
  // print_arr($links);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center"],
    ["name" => "Image", "column" => "image", "type" => "image-file", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "Firm Name", "column" => "firm_name", "class" => "title nowrap"],
    ["name" => "Firm Contact", "column" => ["firm_email", "firm_phone"], "prefix" => ["Firm Email", "Firm Phone"], "sorting" => false],
    ["name" => "Category", "column" => "category", "attributes" => get_attributes_arr("vendor_category"), "badge" => true],
    ["name" => "Owner Name", "column" => "owner_name", "class" => "title nowrap"],
    ["name" => "Owner Contact", "column" => ["owner_email", "owner_phone"], "prefix" => ["Owner Email", "Owner Phone"], "sorting" => false],
    ["name" => "Raw Materials", "column" => "", "options" => $raw_materials_arr, "type" => "link_table_rows", "links" => $links, "option_id" => "id", "option_label" => "raw_material", "sorting" => false],
    ["name" => "Registrations", "column" => ["gst","pan"], "prefix" => ["GST No.", "PAN"], "sorting" => false],
    ["name" => "Active", "column" => "active", "options" => get_active_arr(), "badge" => true],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "vendors-update", "delete" => "vendors-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Firm Name", "column" => "firm_name"],
    ["name" => "Payment term", "column" => "payment_term"],
    ["name" => "Firm Address", "column" => "firm_address"],
  ];


  $table_html = crud_read([
    "module_pages" => $module_pages,
    "tablename" => $tablename,
    "primary_column" => $primary_column,
    "display_columns" => $display_columns,
    "fetch_columns" => $fetch_columns,
    "detail_columns" => $detail_columns,
    "datatable" => true,
    "pagination" => true,
    "pagelimit" => 100,
    "query" => "",
    "orderby" => "id DESC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>