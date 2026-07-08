<?php
$module = "raw_material_rates";
$pageid = "raw_material_rates-read";
include("../../common/header.php");
// include("raw_material_rate-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["raw_material_rates"];

  $rm_rate_arr = get_raw_material_rates_entities();
  $entities = $rm_rate_arr["entities"];
  // print_arr($entities);
  $pending_entities = $rm_rate_arr["pending"];
  // print_arr($pending_entities);



  $pagetitle = T("Raw Material rates");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);

  $query = "";
  // if (isset($_GET["bom"]) && $_GET["bom"] != "") {

    if(sizeof($pending_entities) > 0){
      $actions_html .= add_new_form_link(["text" => "Add new Raw Material rates (Bulk)", "url" => ROOT_PATH . "/modules/raw_material_rates/raw_material_rate-bulkform.php"]);
      $actions_html .= add_new_form_link(["text" => "Add new Raw Material rate (Single)", "url" => ROOT_PATH . "/modules/raw_material_rates/raw_material_rate-form.php"]);
    }
    // $bom = $_GET["bom"];
    // $query = " bom = '" . $bom . "' ";
    
  // }

  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>



  <?php

  $tablename = "raw_material_rates";

  $primary_column = "id";

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    //["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    // ["name" => "BOM ID", "column" => "bom", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("boms")],
    ["name" => "Raw Material / Rate Group", "column" => "entity", "options" => $entities],
    ["name" => "Rate per unit", "column" => "rate", "class" => "nowrap"],
    ["name" => "Effective Date", "column" => "effective_date", "format" => "date", "class" => "nowrap"],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "raw_material_rates-update", "delete" => "raw_material_rates-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Last update", "type" => "last_update_info"],
    [
      "name" => "History",
      "type" => "history",
      "history_columns" => [
        ["name" => "Rate per unit", "column" => "rate"],
        ["name" => "Effective date", "column" => "effective_date",  "format" => "date"],
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
    "orderby" => "id DESC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>