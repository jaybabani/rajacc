<?php
$module = "bom_costs";
$pageid = "bom_costs-read";
include("../../common/header.php");
// include("bom_cost-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["bom_costs"];

  $pagetitle = T("Sales BOM costs");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);

  $query = "";
  if (isset($_GET["bom"]) && $_GET["bom"] != "") {
    $actions_html .= add_new_form_link(["text" => "Add new BOM costs (Bulk)", "url" => ROOT_PATH . "/modules/bom_costs/bom_cost-bulkform.php?bom=" . $_GET["bom"] . ""]);
    $actions_html .= add_new_form_link(["text" => "Add new BOM cost (Single)", "url" => ROOT_PATH . "/modules/bom_costs/bom_cost-form.php?bom=" . $_GET["bom"] . ""]);

    $bom = $_GET["bom"];
    $query = " bom = '" . $bom . "' ";
    
  }

  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "bom_costs";

  $primary_column = "id";


  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "BOM ID", "column" => "bom", "class" => "text-center nowrap", "id_prefix" => get_module_id_prefix("boms")],
    ["name" => "Cost type", "column" => "cost_type", "options" => bom_cost_type_arr()],
    ["name" => "Cost Amount", "column" => "amount", "class" => "nowrap"],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "bom_costs-update", "delete" => "bom_costs-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Last update", "type" => "last_update_info"],
    [
      "name" => "History",
      "type" => "history",
      "history_columns" => [
        ["name" => "Cost", "column" => "amount"],
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