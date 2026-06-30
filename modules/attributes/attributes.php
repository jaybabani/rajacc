<?php
$module = "attributes";
$pageid = "attributes-read";
include("../../common/header.php");
include("attribute-submodule.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  /*
    widget_start(T("Search Attributes"), "", "", "", "");
    $form_type = "attributes";
    $show_fields = ["ID", "attribute_name", "attribute_type", "sortby"];
    include ROOT_DIR . '/modules/search/search-module.php';
    // include("../../search-module.php");
    widget_end(); 
  */ ?>

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["attributes"];

  $pagetitle = T($submod["page_title"]);
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "attributes";

  $primary_column = "id";

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => "attribute_category_id_prefix", "options" => get_attribute_category_id_prefix($submodule)], //$submod["id_prefix"]
    ["name" => $submod["column_title"], "column" => "attribute", "class" => "title nowrap"],
    // ["name" => "Code", "column" => "code"],
    ($parent == "default") ? ["name" => "Category", "column" => "category", "options" => get_attribute_category_arr()]:[],
    ["name" => "Active", "column" => "active", "options" => get_active_arr(), "badge" => true],
    ["name" => "Updated", "column" => "updated", "format" => "ts_to_dt", "class" => "nowrap"],
    ["name" => "Actions", "column" => "", "type" => "edit", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "attributes-update", "delete" => "attributes-delete"]],
  ];

  $fetch_columns = ["category"];

  $detail_columns = [
    ["name" => "Last update", "type" => "last_update_info"],
  ];

  $url_param = $submod["url_param"];
  $query = $submod["query"];

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
      "orderby" => "attribute ASC",
      "query" => $query,
      "url_param" => $url_param,
    ]
  );

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>