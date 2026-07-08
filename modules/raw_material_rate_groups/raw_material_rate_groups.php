<?php
$module = "raw_material_rate_groups";
$pageid = "raw_material_rate_groups-read";
include("../../common/header.php");
// include("raw_material_rate_group-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["raw_material_rate_groups"];

  $pagetitle = T("Raw Material Rate Groups");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "raw_material_rate_groups";

  $primary_column = "id";

  // $tags_arr = fetch_data(["table" => "tags", "columns" => "id, tag", "condition" => "", "order" => "tag ASC", "limit" => ""]);    // print_arr($tags_arr);
  // print_arr($tags_arr);

  // $raw_materials_arr = acl_roles();
  // $data["raw_materials"] = [];
  $raw_material_rate_group_link_arr = fetch_data(["table" => "raw_material_rate_group_link", "columns" => "raw_material_rate_group, raw_material", "condition" => "", "order" => "", "limit" => ""]);
  $links = [];
  foreach ($raw_material_rate_group_link_arr as $lk => $lv) {
    $links[$lv["raw_material_rate_group"]][] = $lv["raw_material"];
  }
  // print_arr($raw_materials_arr);
  // print_arr($links);

  $raw_material_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);        // print_arr($raw_material_arr);
  $raw_materials = [];
  foreach ($raw_material_arr as $vk => $vv) {
    $raw_materials[$vv["id"]] = ["id" => $vv["id"], "raw_material" => $vv["raw_material"]];
  }
  // print_arr($raw_materials);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    //["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "Raw Material Rate Group", "column" => "raw_material_rate_group", "class" => "title nowrap"],
    ["name" => "Raw materials", "column" => "", "options" => $raw_materials, "type" => "link_table_rows", "links" => $links, "option_id" => "id", "option_label" => "raw_material", "sorting" => false],
    ["name" => "Updated", "column" => "updated", "format" => "ts_to_dt", "class" => "nowrap"],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "raw_material_rate_groups-update", "delete" => "raw_material_rate_groups-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Last update", "type" => "last_update_info"],
  ];

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
      "orderby" => "id DESC"
    ]
  );

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>