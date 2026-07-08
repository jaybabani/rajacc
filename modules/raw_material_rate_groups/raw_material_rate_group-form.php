<?php
$module = "raw_material_rate_groups";
$pageid = "raw_material_rate_groups-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "raw_material_rate_groups-update";
}
include("../../common/header.php");
// include("raw_material_rate_group-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New Raw Material Rate Group');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Raw Material Rate Group');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "raw_material_rate_groups";
  $primary_column = "id";

  $save_fields = [
    ["key" => "raw_material_rate_group"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  $link_table_rows = [
    "table" => "raw_material_rate_group_link",
    "single_column" => ["column" => "raw_material_rate_group", "field" => $primary_column],
    "multi_column" => ["column" => "raw_material", "field" => "raw_materials"],
  ];

  $msg = [
    "success_update" => "Raw Material Rate Group updated successfully",
    "error_update" => "Error in updating Raw Material Rate Group",
    "success_added" => "New Raw Material Rate Group added successfully",
    "error_added" => "Error in adding new Raw Material Rate Group",
  ];

  $submit_result = module_submit_form([
    "submit_data" => $_POST,
    "primary_column" => $primary_column,
    "tablename" => $tablename,
    "save_fields" => $save_fields,
    "messages" => $msg,
    "link_table_rows" => $link_table_rows
  ]);

  $data = module_get_data($tablename, $id);
  // print_arr($data);
  ?>

  <form class="row g-3 needs-validation" novalidate method="POST">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">

    <?php

    echo form_field(["type" => "text", "name" => "Raw Material Rate Group", "key" => "raw_material_rate_group", "eg" => "", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // raw_material Field with Table Linked rows
    $raw_materials_arr = acl_roles();
    // print_arr($raw_materials_arr);

    $raw_material_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);        // print_arr($raw_material_arr);
    $raw_materials = [];
    foreach ($raw_material_arr as $vk => $vv) {
      $raw_materials[$vv["id"]] = ["id" => $vv["id"], "raw_material" => $vv["raw_material"]];
    }
    // print_arr($raw_materials);

    $data["raw_materials"] = [];
    $raw_material_rate_group_link_arr = fetch_data(["table" => "raw_material_rate_group_link", "columns" => "raw_material_rate_group, raw_material", "condition" => " raw_material_rate_group = '" . $id . "' ", "order" => "", "limit" => ""]);
    foreach ($raw_material_rate_group_link_arr as $lk => $lv) {
      $data["raw_materials"][] = $lv["raw_material"];
    }
    echo form_field([
      "type" => "multi-checkbox",
      "name" => "Raw materials",
      "key" => "raw_materials",
      "required" => true,
      "options" => $raw_materials,
      "option_id" => "id",
      "option_label" => "raw_material",
      "class" => "col-md-6 col-lg-4 mb-3"
    ], $data);

    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>