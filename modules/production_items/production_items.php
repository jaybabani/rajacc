<?php
$module = "production_items";
$pageid = "production_items-read";
include("../../common/header.php");
// include("production_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["production_items"];

  $pagetitle = T("Production Items");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);

  $query = "";
  if (isset($_GET["production"]) && $_GET["production"] != "") {
    $actions_html .= add_new_form_link(["text" => "Add new production items (Bulk)", "url" => ROOT_PATH . "/modules/production_items/production_item-bulkform.php?production=" . $_GET["production"] . ""]);
    $actions_html .= add_new_form_link(["text" => "Add new production item (Single)", "url" => ROOT_PATH . "/modules/production_items/production_item-form.php?production=" . $_GET["production"] . ""]);

    $production = $_GET["production"];
    $query = " production = '" . $production . "' ";
    
  }

  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "production_items";

  $primary_column = "id";

  // $purchases_arr = fetch_data(["table" => "purchases", "columns" => "id, title", "condition" => "", "order" => "created DESC", "limit" => ""]);    // print_arr($purchases_arr);
  // print_arr($purchases_arr);

  $products_arr = fetch_data(["table" => "products", "columns" => "id, product", "condition" => "", "order" => "product ASC", "limit" => ""]);    // print_arr($products_arr);
  // print_arr($products_arr);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    //["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "Production ID", "column" => "production", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("productions")],
    ["name" => "Product", "column" => "product", "options" => $products_arr, "type" => "table_id", "option_id" => "id", "option_label" => "product", "class" => "title", "module" => "products"],
    ["name" => "Production quantity", "column" => "quantity", "class" => "nowrap"],
    // ["name" => "Rate per unit", "column" => "rate", "class" => "nowrap"],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "production_items-update", "delete" => "production_items-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Last update", "type" => "last_update_info"],
    [
      "name" => "History",
      "type" => "history",
      "history_columns" => [
        ["name" => "Quantity", "column" => "quantity"],
        // ["name" => "Rate", "column" => "rate"]
      ],
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
    "query" => $query,
    "orderby" => "product ASC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>