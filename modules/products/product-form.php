<?php
$module = "products";
$pageid = "products-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "products-update";
}
include("../../common/header.php");
// include("product-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New Product');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Product');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "products";
  $primary_column = "id";

  $save_fields = [
    ["key" => "product"],
    ["key" => "code"],
    ["key" => "description"],
    ["key" => "category"],
    ["key" => "quality"],
    ["key" => "type"],
    ["key" => "pieces"],
    ["key" => "image", "type" => "image"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"]
  ];

  $link_table_rows = [
    // "table" => "product_sector_link",
    // "single_column" => ["column" => "product", "field" => $primary_column],
    // "multi_column" => ["column" => "sector", "field" => "sectors"],
  ];

  $msg = [
    "success_update" => "Product updated successfully",
    "error_update" => "Error in updating product",
    "success_added" => "New product added successfully",
    "error_added" => "Error in adding new product",
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

    echo form_field(["type" => "text", "name" => "Product", "key" => "product", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "Item Code", "key" => "code", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select-attribute", "name" => "Category", "key" => "category", "required" => true, "attributes" => get_attributes_arr("product_category"), "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select-attribute", "name" => "Quality", "key" => "quality", "required" => true, "attributes" => get_attributes_arr("product_quality"), "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "Type", "key" => "type", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "No. of Pieces / Set of", "key" => "pieces", "class" => "col-md-6 col-lg-4 mb-3"], $data);

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