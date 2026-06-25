<?php
$module = "vendors";
$pageid = "vendors-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "vendors-update";
}
include("../../common/header.php");
// include("vendor-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New Vendor');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Vendor');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "vendors";
  $primary_column = "id";

  $save_fields = [
    ["key" => "firm_name"],
    ["key" => "firm_email"],
    ["key" => "firm_phone"],
    ["key" => "firm_address"],
    ["key" => "owner_name"],
    ["key" => "owner_email"],
    ["key" => "owner_phone"],
    ["key" => "pan"],
    ["key" => "gst"],
    ["key" => "category"],
    ["key" => "payment_term"],
    ["key" => "active"],
    ["key" => "image", "type" => "image"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  $msg = [
    "success_update" => "Vendor updated successfully",
    "error_update" => "Error in updating vendor",
    "success_added" => "New vendor added successfully",
    "error_added" => "Error in adding new vendor",
  ];


  $link_table_rows = [
    "table" => "vendor_raw_material_link",
    "single_column" => ["column" => "vendor", "field" => $primary_column],
    "multi_column" => ["column" => "raw_material", "field" => "raw_materials"],
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

    echo form_field(["type" => "text", "name" => "Firm Name", "key" => "firm_name", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "Firm Email", "key" => "firm_email", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "textarea", "name" => "Firm Phone", "key" => "firm_phone", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "textarea", "name" => "Firm Address", "key" => "firm_address", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "Owner Name", "key" => "owner_name", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "Owner Email", "key" => "owner_email", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "textarea", "name" => "Owner Phone", "key" => "owner_phone", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select-attribute", "name" => "Category", "key" => "category", "required" => true, "attributes" => get_attributes_arr("vendor_category"), "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "GST No.", "key" => "gst", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "text", "name" => "PAN No.", "key" => "pan", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "Payment term", "key" => "payment_term", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Active", "key" => "active", "required" => true, "options" => get_active_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // Image upload field
    if (isset($data["image"]) && $data["image"] != NULL && $data["image"] != "") {
      $image_arr = fetch_data(["table" => "uploads", "columns" => "id, thumb, small, name, type", "condition" => " id = '" . $data["image"] . "' ", "order" => "", "limit" => ""]);    // print_arr($image_arr);
      $data["image"] = $image_arr;      //print_arr($data);
    }
    echo form_field(["type" => "image-file", "name" => "Image", "key" => "image", "display_size" => "small", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // raw_material Field with Table Linked rows
    $raw_materials_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);    // print_arr($raw_materials_arr);
    $data["raw_materials"] = [];
    $vendor_raw_material_link_arr = fetch_data(["table" => "vendor_raw_material_link", "columns" => "vendor, raw_material", "condition" => " vendor = '" . $id . "' ", "order" => "", "limit" => ""]);
    foreach ($vendor_raw_material_link_arr as $lk => $lv) {
      $data["raw_materials"][] = $lv["raw_material"];
    }
    echo form_field([
      "type" => "multi-checkbox",
      "name" => "Raw materials",
      "key" => "raw_materials",
      // "required" => true,
      "options" => $raw_materials_arr,
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