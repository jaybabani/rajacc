<?php
$module = "raw_materials";
$pageid = "raw_materials-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "raw_materials-update";
}
include("../../common/header.php");
// include("raw_material-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New Raw Material');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Raw Material');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "raw_materials";
  $primary_column = "id";

  $save_fields = [
    ["key" => "raw_material"],
    ["key" => "code"],
    ["key" => "unit"],
    ["key" => "description"],
    ["key" => "category"],
    ["key" => "image", "type" => "image"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"]
  ];

  $link_table_rows = [
    // "table" => "raw_material_sector_link",
    // "single_column" => ["column" => "raw_material", "field" => $primary_column],
    // "multi_column" => ["column" => "sector", "field" => "sectors"],
  ];

  $msg = [
    "success_update" => "Raw Material updated successfully",
    "error_update" => "Error in updating raw_material",
    "success_added" => "New raw_material added successfully",
    "error_added" => "Error in adding new raw_material",
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

  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">

    <?php

    echo form_field(["type" => "text", "name" => "Raw material", "key" => "raw_material", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "Item Code", "key" => "code", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "Unit", "key" => "unit", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select-attribute", "name" => "Category", "key" => "category", "required" => true, "attributes" => get_attributes_arr("raw_material_category"), "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "textarea", "name" => "Description", "key" => "description", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // Image upload field
    if(isset($data["image"]) && $data["image"] != NULL && $data["image"] != "") {
      $image_arr = fetch_data(["table" => "uploads", "columns" => "id, thumb, small, name, type", "condition" => " id = '".$data["image"]."' ", "order" => "", "limit" => ""]);    // print_arr($image_arr);
      $data["image"] = $image_arr;      // print_arr($data);
    }
    echo form_field(["type" => "image-file", "name" => "Image", "key" => "image", "display_size" => "small", "class" => "col-md-6 col-lg-4 mb-3"], $data);


    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>