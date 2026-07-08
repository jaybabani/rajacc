<?php
$module = "folders";
$pageid = "folders-read";
include("../../common/header.php");
// include("folder-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["folders"];

  $pagetitle = T("Folders");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "folders";

  $primary_column = "id";

  $vendors_arr = fetch_data(["table" => "vendors", "columns" => "id, firm_name", "condition" => "", "order" => "firm_name ASC", "limit" => ""]);    // print_arr($vendors_arr);
  // print_arr($vendors_arr);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    //["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "Title", "column" => "title", "class" => "nowrap"],
    ["name" => "Category", "column" => "category", "attributes" => get_attributes_arr("folder_category"), "badge" => true],
    ["name" => "Notes", "column" => "notes", "class" => ""],
    // ["name" => "Documents", "type" => "multi-file", "attributes" => get_attributes_arr("document_type"),],
    // ["name" => "Payment Status", "column" => "payment_status", "options" => get_folder_payment_status_arr(), "badge" => true],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "folders-update", "delete" => "folders-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    // ["name" => "Notes", "column" => "notes"],
    ["name" => "Documents", "type" => "multi-file", "attributes" => get_attributes_arr("document_type"),],
    ["name" => "Last update", "type" => "last_update_info"],
    [
      // "name" => "History",
      // "type" => "history",
      // "history_columns" => [
        // ["name" => "Status", "column" => "status", "options" => get_folder_status_arr(), "badge" => true],
        // ["name" => "Payment Status", "column" => "payment_status", "options" => get_folder_payment_status_arr(), "badge" => true],
        // ["name" => "Quantity", "column" => "quantity"]
      // ],
    ]
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