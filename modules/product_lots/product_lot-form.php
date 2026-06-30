<?php
$module = "product_lots";
$pageid = "product_lots-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "product_lots-update";
}

// $load_datepicker = true;

include("../../common/header.php");
// include("product_lot-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $source = "produced";
  $titletag = T('Add New product Lot (produced internally)');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit product Lot');
    $id = $_GET['id'];
  }
  if (isset($_GET['source']) && trim($_GET['source']) == 'purchased') {
    $titletag = T('Add New product Lot (purchased)');
    $source = "purchased";
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "product_lots";
  $primary_column = "id";

  $data = module_get_data($tablename, $id);

  if ($mode == "update" && isset($data["source"]) && $data["source"] != "") {
    $source = $data["source"];
  }
  // print_arr($data);

  $save_fields = [
    ["key" => "product"],
    ["key" => "ordered_quantity"],
    ["key" => "received_quantity"],
    ["key" => "accepted_quantity"],
    ["key" => "rejected_quantity"],
    ["key" => "available_quantity"],
    ["key" => "reserved_quantity"],
    ["key" => "consumed_quantity"],
    ["key" => "source"],
    ["key" => "notes"],
    ["key" => "status"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];
  if ($source == "purchased") {
    $save_fields = array_merge($save_fields, [
      ["key" => "purchase"],
      ["key" => "buy_price"],
    ]);
  }
  // print_arr($save_fields);
  // die;

  $link_table_rows = [
  ];

  $msg = [
    "success_update" => "Product Lot updated successfully",
    "error_update" => "Error in updating product_lot",
    "success_added" => "New product lot added successfully",
    "error_added" => "Error in adding new product lot",
  ];

  $save_column_history = [
    "columns" => ["status"],
  ];

  $submit_result = module_submit_form([
    "submit_data" => $_POST,
    "primary_column" => $primary_column,
    "tablename" => $tablename,
    "save_fields" => $save_fields,
    "messages" => $msg,
    "link_table_rows" => $link_table_rows,
    "save_column_history" => $save_column_history,
  ]);

  $data = module_get_data($tablename, $id);
  if ($mode == "new" && !isset($data["source"])) {
    $data["source"] = $source;
  }

  // print_arr($_SESSION);
  ?>

  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">

    <?php

    $purchases = [];
    if ($source == "purchased") {
      $purchase_arr = fetch_data(["table" => "purchases", "columns" => "id, title", "condition" => "", "order" => "created DESC", "limit" => ""]);        // print_arr($purchase_arr);
      foreach ($purchase_arr as $vk => $vv) {
        $purchases[$vv["id"]] = $vv["title"];
      }
      // print_arr($purchases);
    }

    $product_arr = fetch_data(["table" => "products", "columns" => "id, product", "condition" => "", "order" => "product ASC", "limit" => ""]);        // print_arr($product_arr);
    $products = [];
    foreach ($product_arr as $vk => $vv) {
      $products[$vv["id"]] = $vv["product"];
    }
    // print_arr($products); 

    echo form_field(["type" => "select", "name" => "Product", "key" => "product", "required" => true, "options" => $products, "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "number", "name" => "Ordered Quantity", "key" => "ordered_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Received Quantity", "key" => "received_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Accepted Quantity", "key" => "accepted_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Rejected Quantity", "key" => "rejected_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Available Quantity", "key" => "available_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Reserved Quantity", "key" => "reserved_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Consumed Quantity", "key" => "consumed_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // echo form_field(["type" => "number", "name" => "Quantity", "key" => "quantity", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "hidden", "name" => "Source", "key" => "source", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    if ($source == "purchased") {
      echo form_field([
        "type" => "number",
        "name" => "Buy Price",
        "key" => "buy_price",
        "required" => true,
        "class" => "col-md-6 col-lg-4 mb-3",
        // "parent_field" => ["column" => "source", "value" => "purchased", "default" => "hide"]
      ], $data);
      echo form_field(["type" => "select", "name" => "Purchase details", "key" => "purchase", "options" => $purchases, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    }

    echo form_field(["type" => "select", "name" => "Status", "key" => "status", "required" => true, "options" => get_product_lot_status_arr($source), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "textarea", "name" => "Notes", "key" => "notes", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    echo column_history_fields($save_column_history, $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>