<?php
$module = "documents";
$pageid = "documents-read";
include("../../common/header.php");
// include("document-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["documents"];

  $pagetitle = T("Documents");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "uploads";

  $primary_column = "id";

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "Document File", "column" => "id", "type" => "image-file", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "Document type", "column" => "caption", "attributes" => get_attributes_arr("document_type"), "badge" => true],
    ["name" => "Other info", "column" => "other"],
    ["name" => "Attached to", "column" => "", "type" => "table_row_link", "options" => get_module_pages_arr(), "class" => "nowrap"],
  ];

  $fetch_columns = [
    "row_id", "table_name"
  ];

  $detail_columns = [
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
    "query" => " file_type = 'document' ",
    "orderby" => "id DESC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>