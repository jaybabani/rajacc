<?php
$module = "products";
$pageid = "products-read";
include("../../common/header.php");
// include("product-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_pages = [
    "read" => "products",
    "update" => "product-form",
    "create" => "product-form",
    "delete" => "product-delete"
  ];

  $pagetitle = T("Products");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "products";

  $primary_column = "id";

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center"],
    ["name" => "Item Code", "column" => "code", "class" => "nowrap"],
    ["name" => "Image", "column" => "image", "type" => "image-file", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "Product", "column" => "product", "class" => "title nowrap"],
    ["name" => "Type", "column" => "type", "class" => "nowrap"],
    ["name" => "Category", "column" => "category", "attributes" => get_attributes_arr("product_category"), "badge" => true],
    ["name" => "Quality", "column" => "quality", "attributes" => get_attributes_arr("product_quality"), "badge" => true],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "products-update", "delete" => "products-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Product", "column" => "product"],
    ["name" => "No. of pieces / Set of", "column" => "pieces"],
    ["name" => "Description", "column" => "description"],
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
    "orderby" => "product ASC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>