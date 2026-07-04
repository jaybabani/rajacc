<?php
$module = "customers";
$pageid = "customers-read";
include("../../common/header.php");
// include("customer-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php

  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["customers"];

  $pagetitle = T("Customers");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "customers";

  $primary_column = "id";

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "Image", "column" => "image", "type" => "image-file", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "Firm Name", "column" => "firm_name", "class" => "title nowrap"],
    ["name" => "Firm Contact", "column" => ["firm_email", "firm_phone"], "prefix" => ["Firm Email", "Firm Phone"], "sorting" => false],
    ["name" => "Category", "column" => "category", "attributes" => get_attributes_arr("customer_category"), "badge" => true],
    ["name" => "Owner Name", "column" => "owner_name", "class" => "title nowrap"],
    ["name" => "Owner Contact", "column" => ["owner_email", "owner_phone"], "prefix" => ["Owner Email", "Owner Phone"], "sorting" => false],
    ["name" => "GST No.", "column" => "gst", "class" => "nowrap"],
    ["name" => "Zone / Area", "column" => "zone", "class" => "nowrap"],
    ["name" => "Active", "column" => "active", "options" => get_active_arr(), "badge" => true],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "customers-update", "delete" => "customers-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Firm Name", "column" => "firm_name"],
    ["name" => "Price Allotment", "column" => "price_allotment"],
    ["name" => "Firm Address", "column" => "firm_address"],
    ["name" => "GST Type", "column" => "gst_type", "options" => get_gst_type_arr()],
    ["name" => "Last update", "type" => "last_update_info"],
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