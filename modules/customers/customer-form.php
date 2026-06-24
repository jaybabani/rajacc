<?php
$module = "customers";
$pageid = "customers-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "customers-update";
}
include("../../common/header.php");
// include("customer-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New Customer');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Customer');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "customers";
  $primary_column = "id";

  $save_fields = [
    ["key" => "firm_name"],
    ["key" => "firm_email"],
    ["key" => "firm_phone"],
    ["key" => "firm_address"],
    ["key" => "owner_name"],
    ["key" => "owner_email"],
    ["key" => "owner_phone"],
    ["key" => "zone"],
    ["key" => "gst"],
    ["key" => "category"],
    ["key" => "price_allotment"],
    ["key" => "active"],
    ["key" => "image", "type" => "image"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"]
  ];

  $msg = [
    "success_update" => "Customer updated successfully",
    "error_update" => "Error in updating customer",
    "success_added" => "New customer added successfully",
    "error_added" => "Error in adding new customer",
  ];

  $link_table_rows = [];

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
    echo form_field(["type" => "select-attribute", "name" => "Category", "key" => "category", "required" => true, "attributes" => get_attributes_arr("customer_category"), "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "Zone / Area", "key" => "zone", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "GST No.", "key" => "gst", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "Price Allotment", "key" => "price_allotment", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Active", "key" => "active", "required" => true, "options" => get_active_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // Image upload field
    if (isset($data["image"]) && $data["image"] != NULL && $data["image"] != "") {
      $image_arr = fetch_data(["table" => "uploads", "columns" => "id, thumb, small, name, type", "condition" => " id = '" . $data["image"] . "' ", "order" => "", "limit" => ""]);    // print_arr($image_arr);
      $data["image"] = $image_arr;      // print_arr($data);
    }
    echo form_field(["type" => "image-file", "name" => "Image", "key" => "image", "display_size" => "small", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>