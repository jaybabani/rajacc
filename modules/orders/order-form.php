<?php
$module = "orders";
$pageid = "orders-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "orders-update";
}

$load_datepicker = true;

include("../../common/header.php");
// include("order-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New Sales Order');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Sales Order');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "orders";
  $primary_column = "id";

  $save_fields = [
    ["key" => "customer"],
    ["key" => "user"],
    ["key" => "notes"],
    ["key" => "status"],
    ["key" => "payment_status"],
    ["key" => "order_date", "type" => "date"],
    ["key" => "delivery_due_date", "type" => "date"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  $link_table_rows = [
  ];

  $msg = [
    "success_update" => "Sales Order updated successfully",
    "error_update" => "Error in updating order",
    "success_added" => "New order added successfully",
    "error_added" => "Error in adding new order",
  ];

  $save_column_history = [
    "columns" => ["status", "payment_status"],
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

    $customer_arr = fetch_data(["table" => "customers", "columns" => "id, firm_name", "condition" => "", "order" => "firm_name ASC", "limit" => ""]);        // print_arr($customer_arr);
    $customers = [];
    foreach ($customer_arr as $vk => $vv) {
      $customers[$vv["id"]] = $vv["firm_name"];
    }
    // print_arr($customers);

    $user_arr = fetch_data(["table" => "users", "columns" => "id, name", "condition" => " usertype != 'admin' ", "order" => "name ASC", "limit" => ""]);        // print_arr($vendor_arr);
    $users = [];
    foreach ($user_arr as $vk => $vv) {
      $users[$vv["id"]] = $vv["name"];
    }
    // print_arr($users);

    echo form_field(["type" => "select", "name" => "Customer", "key" => "customer", "required" => true, "options" => $customers, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Sales person", "key" => "user", "options" => $users, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Status", "key" => "status", "required" => true, "options" => get_order_status_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Payment Status", "key" => "payment_status", "options" => get_order_payment_status_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "date", "name" => "Order placed on date", "key" => "order_date", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "date", "name" => "Delivery due date", "key" => "delivery_due_date", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "textarea", "name" => "Notes", "key" => "notes", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    echo column_history_fields($save_column_history,$data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>