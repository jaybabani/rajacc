<?php
$module = "invoices";
$pageid = "invoices-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "invoices-update";
}

$load_datepicker = true;

include("../../common/header.php");
// include("invoice-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New invoice');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit invoice');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "invoices";
  $primary_column = "id";

  $save_fields = [
    ["key" => "dispatch"],
    ["key" => "notes"],
    ["key" => "status"],
    ["key" => "created_on_date", "type" => "date"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  $link_table_rows = [];

  $msg = [
    "success_update" => "invoice updated successfully",
    "error_update" => "Error in updating invoice",
    "success_added" => "New invoice added successfully",
    "error_added" => "Error in adding new invoice",
  ];

  $save_column_history = [
    "columns" => ["status"],
  ];

  // $action_after_submit = [
  //   "action" => "create_invoice_for_invoice",
  //   "condition" => [
  //     "type" => "change_to",
  //     "param" => ["column" => "status", "value" => "ready_for_invoice"]
  //   ]
  // ];

  $submit_result = module_submit_form([
    "submit_data" => $_POST,
    "primary_column" => $primary_column,
    "tablename" => $tablename,
    "save_fields" => $save_fields,
    "messages" => $msg,
    "link_table_rows" => $link_table_rows,
    "save_column_history" => $save_column_history,
    // "action_after_submit" => $action_after_submit,
  ]);


  $data = module_get_data($tablename, $id);
  // print_arr($data);
  ?>

  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">

    <?php

    $dispatch_arr = fetch_data(["table" => "dispatchs", "columns" => "id", "condition" => "", "order" => "id ASC", "limit" => ""]);        // print_arr($dispatch_arr);
    $dispatchs = [];
    foreach ($dispatch_arr as $vk => $vv) {
      $dispatchs[$vv["id"]] = get_module_id_prefix("dispatchs") . $vv["id"];
    }
    // print_arr($dispatchs);

    echo form_field(["type" => "select", "name" => "Dispatch", "key" => "dispatch", "required" => true, "options" => $dispatchs, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Status", "key" => "status", "required" => true, "options" => get_invoice_status_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "date", "name" => "Created on date", "key" => "created_on_date", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "textarea", "name" => "Notes", "key" => "notes", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    echo column_history_fields($save_column_history, $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>