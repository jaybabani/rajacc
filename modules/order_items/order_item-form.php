<?php
$module = "order_items";
$pageid = "order_items-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "order_items-update";
}

// $load_datepicker = true;

include("../../common/header.php");
// include("order_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New Order Item');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Order Item');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "order_items";
  $primary_column = "id";

  $save_fields = [
    ["key" => "raw_material"],
    ["key" => "purchase"],
    ["key" => "notes"],
    ["key" => "status"],
    ["key" => "buy_price"],
    ["key" => "ordered_quantity"],
    ["key" => "received_quantity"],
    ["key" => "accepted_quantity"],
    ["key" => "rejected_quantity"],
    ["key" => "available_quantity"],
    ["key" => "reserved_quantity"],
    ["key" => "consumed_quantity"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  $link_table_rows = [
  ];

  $msg = [
    "success_update" => "Order Item updated successfully",
    "error_update" => "Error in updating order_item",
    "success_added" => "New order_item added successfully",
    "error_added" => "Error in adding new order_item",
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
  // print_arr($data);
  ?>

  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">

    <?php

    $raw_material_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);        // print_arr($raw_material_arr);
    $raw_materials = [];
    foreach ($raw_material_arr as $vk => $vv) {
      $raw_materials[$vv["id"]] = $vv["raw_material"];
    }
    // print_arr($raw_materials);

    $purchase_arr = fetch_data(["table" => "purchases", "columns" => "id, title", "condition" => "", "order" => "created DESC", "limit" => ""]);        // print_arr($vendor_arr);
    $purchases = [];
    foreach ($purchase_arr as $vk => $vv) {
      $purchases[$vv["id"]] = $vv["title"];
    }
    // print_arr($purchases);

    echo form_field(["type" => "select", "name" => "Raw Material", "key" => "raw_material", "required" => true, "options" => $raw_materials, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Purchase Details", "key" => "purchase", "options" => $purchases, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Buy Price", "key" => "buy_price", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Ordered Quantity", "key" => "ordered_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Received Quantity", "key" => "received_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Accepted Quantity", "key" => "accepted_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Rejected Quantity", "key" => "rejected_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Available Quantity", "key" => "available_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Reserved Quantity", "key" => "reserved_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Consumed Quantity", "key" => "consumed_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "textarea", "name" => "Notes", "key" => "notes", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Status", "key" => "status", "required" => true, "options" => get_order_item_status_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    echo column_history_fields($save_column_history,$data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>