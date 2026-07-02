<?php
$module = "dispatch_items";
$pageid = "dispatch_items-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "dispatch_items-update";
}

// $load_datepicker = true;

include("../../common/header.php");
// include("dispatch_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New dispatch item');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit dispatch item');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "dispatch_items";
  $primary_column = "id";

  $save_fields = [
    ["key" => "product"],
    ["key" => "rate"],
    ["key" => "quantity"],
    ["key" => "order_id"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  $link_table_rows = [];

  $msg = [
    "success_update" => "dispatch item updated successfully",
    "error_update" => "Error in updating dispatch_item",
    "success_added" => "New dispatch_item added successfully",
    "error_added" => "Error in adding new dispatch_item",
  ];

  $save_column_history = [
    "columns" => ["rate", "quantity"],
  ];


  $redirect_to = "";
  $url_param = "";
  if (isset($_POST["order_id"])) {
    $url_param = "order_id=" . $_POST["order_id"] . "";
    $redirect_to = "dispatch_items";
  }

  // if(isset($data["order_id"]) && $data["order_id"] != ""){
  //   $url_param = " order_id =" . $data["order_id"] . "";
  //   $redirect_to = "dispatch_items";
  // }

  $submit_result = module_submit_form([
    "submit_data" => $_POST,
    "primary_column" => $primary_column,
    "tablename" => $tablename,
    "save_fields" => $save_fields,
    "messages" => $msg,
    "link_table_rows" => $link_table_rows,
    "save_column_history" => $save_column_history,
    "redirect_to" => $redirect_to,
    "url_param" => $url_param,
  ]);

  $data = module_get_data($tablename, $id);
  if ($mode == "new" && !isset($data["order_id"]) && isset($_GET["order_id"]) && $_GET["order_id"] != "") {
    $data["order_id"] = $_GET["order_id"];
  }
  // print_arr($data);

  ?>

  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">
    <input type="hidden" name="order_id" value="<?php echo get_value($data, 'order_id'); ?>">

    <?php

    $product_arr = fetch_data(["table" => "products", "columns" => "id, product", "condition" => "", "order" => "product ASC", "limit" => ""]);        // print_arr($product_arr);
    $products = [];
    foreach ($product_arr as $vk => $vv) {
      $products[$vv["id"]] = $vv["product"];
    }
    // print_arr($products);

    // $purchase_arr = fetch_data(["table" => "purchases", "columns" => "id, title", "condition" => "", "order" => "created DESC", "limit" => ""]);        // print_arr($vendor_arr);
    // $purchases = [];
    // foreach ($purchase_arr as $vk => $vv) {
    //   $purchases[$vv["id"]] = $vv["title"];
    // }
    // print_arr($purchases);

    echo form_field(["type" => "select", "name" => "Product", "key" => "product", "required" => true, "options" => $products, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Rate", "key" => "rate", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Ordered Quantity", "key" => "quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    // echo form_field(["type" => "hidden", "name" => "", "key" => "order_id", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // echo form_field(["type" => "select", "name" => "Purchase Details", "key" => "purchase", "options" => $purchases, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    // echo form_field(["type" => "select", "name" => "Status", "key" => "status", "required" => true, "options" => get_dispatch_item_status_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    echo column_history_fields($save_column_history, $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>