<?php
$module = "symbols";
$pageid = "symbols-read";
include("../../common/header.php");
// include("symbol-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  /*
    widget_start(T("Search Symbols"), "", "", "", "");
    $form_type = "symbols";
    $show_fields = ["ID", "symbol_name", "symbol_type", "sortby"];
    include ROOT_DIR . '/modules/search/search-module.php';
    // include("../../search-module.php");
    widget_end(); 
  */ ?>

  <?php
  $module_pages = [
    "read" => "symbols",
    "update" => "symbol-form",
    "create" => "symbol-form",
    "delete" => "symbol-delete"
  ];

  $pagetitle = T("Symbols");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "symbols";

  $primary_column = "id";
  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false],
    ["name" => "ID", "column" => "id"],
    ["name" => "Symbol", "column" => "symbol", "class" => "title"],
    ["name" => "Exchange", "column" => "exchange"],
    ["name" => "Active", "column" => "active"],
    ["name" => "Updated", "column" => "updated", "format" => "ts_to_dt"],
    ["name" => "Actions", "column" => "", "type" => "edit_delete"],
  ];

  $fetch_columns = [];

  $table_html = crud_read(
    [
      "module_pages" => $module_pages,
      "tablename" => $tablename,
      "primary_column" => $primary_column,
      "display_columns" => $display_columns,
      "fetch_columns" => $fetch_columns,
      "datatable" => true,
      "pagination" => true,
      "pagelimit" => 100,
      "orderby" => "id DESC"
    ]
  );

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>