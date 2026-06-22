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

  $tags_arr = fetch_data(["table" => "tags", "columns" => "id, tag", "condition" => "", "order" => "tag ASC", "limit" => ""]);    // print_arr($tags_arr);
  // print_arr($tags_arr);

  $sectors_arr = fetch_data(["table" => "sectors", "columns" => "id, sector", "condition" => "", "order" => "sector ASC", "limit" => ""]);    // print_arr($sectors_arr);
  // $data["sectors"] = [];
  $symbol_sector_link_arr = fetch_data(["table" => "symbol_sector_link", "columns" => "symbol, sector", "condition" => "", "order" => "", "limit" => ""]);
  $links = [];
  foreach ($symbol_sector_link_arr as $lk => $lv) {
    $links[$lv["symbol"]][] = $lv["sector"];
  }
  // print_arr($sectors_arr);
  // print_arr($links);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center"],
    ["name" => "Symbol", "column" => "symbol", "class" => "title nowrap"],
    ["name" => "Exchange", "column" => "exchange"],
    ["name" => "Active", "column" => "active", "options" => get_active_arr(), "badge" => true],
    ["name" => "Tags", "column" => "tags", "options" => $tags_arr, "type" => "implode", "sep" => ",", "option_id" => "id", "option_label" => "tag", "sorting" => false],
    ["name" => "Sectors", "column" => "", "options" => $sectors_arr, "type" => "link_table_rows", "links" => $links, "option_id" => "id", "option_label" => "sector", "sorting" => false],
    ["name" => "Updated", "column" => "updated", "format" => "ts_to_dt", "class" => "nowrap"],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "symbols-update", "delete" => "symbols-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [];

  $table_html = crud_read(
    [
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
    ]
  );

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>