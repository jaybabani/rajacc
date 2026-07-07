<?php
$module = "payments";
$pageid = "payments-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "payments-update";
}

$load_datepicker = true;

include("../../common/header.php");
// include("payment-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $source = "received";
  $titletag = T('Add New Received Payment');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Payment');
    $id = $_GET['id'];
  }
  if (isset($_GET['source']) && trim($_GET['source']) == 'sent') {
    $titletag = T('Add New Sent payment');
    $source = "sent";
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "payments";
  $primary_column = "id";

  $data = module_get_data($tablename, $id);

  if ($mode == "update" && isset($data["source"]) && $data["source"] != "") {
    $source = $data["source"];
  }


  $save_fields = [
    ["key" => "type"],
    ["key" => "payment_date", "type" => "date"],
    ["key" => "amount"],
    ["key" => "transaction_type"],
    ["key" => "payment_mode"],
    ["key" => "bank_account"],
    ["key" => "reference_no"],
    ["key" => "status"],
    ["key" => "notes"],
    ["key" => "attachment", "type" => "image"],
    ["key" => "documents", "type" => "multi-file"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  if ($source == "received") {
    $save_fields = array_merge($save_fields, [
      ["key" => "customer"],
      ["key" => "invoice"],
    ]);
  }

  //
  else if ($source == "sent") {
    $save_fields = array_merge($save_fields, [
      ["key" => "purchase"],
      ["key" => "vendor"],
    ]);
  }

  $link_table_rows = [
    // "table" => "payment_sector_link",
    // "single_column" => ["column" => "payment", "field" => $primary_column],
    // "multi_column" => ["column" => "sector", "field" => "sectors"],
  ];

  $msg = [
    "success_update" => "Payment updated successfully",
    "error_update" => "Error in updating payment",
    "success_added" => "New payment added successfully",
    "error_added" => "Error in adding new payment",
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
    $data["type"] = $source;
  }


  // print_arr($data);
  // print_arr($_SESSION);
  ?>

  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">

    <?php

    if ($source == "sent") {
      $vendor_arr = fetch_data(["table" => "vendors", "columns" => "id, firm_name", "condition" => " active = 'yes' ", "order" => "firm_name ASC", "limit" => ""]);        // print_arr($vendor_arr);
      $vendors = [];
      foreach ($vendor_arr as $vk => $vv) {
        $vendors[$vv["id"]] = $vv["firm_name"];
      }
      // print_arr($vendors);

      $purchase_arr = fetch_data(["table" => "purchases", "columns" => "id, title", "condition" => "", "order" => "id DESC", "limit" => ""]);        // print_arr($purchase_arr);
      $purchases = [];
      foreach ($purchase_arr as $vk => $vv) {
        $purchases[$vv["id"]] = $vv["title"];
      }
      // print_arr($purchases);


    }

    //
    else if ($source == "received") {
      $customer_arr = fetch_data(["table" => "customers", "columns" => "id, firm_name", "condition" => " active = 'yes' ", "order" => "firm_name ASC", "limit" => ""]);        // print_arr($customer_arr);
      $customers = [];
      foreach ($customer_arr as $vk => $vv) {
        $customers[$vv["id"]] = $vv["firm_name"];
      }
      // print_arr($customers);

      $invoice_arr = fetch_data(["table" => "invoices", "columns" => "id", "condition" => " status = 'generated' ", "order" => "id DESC", "limit" => ""]);        // print_arr($invoice_arr);
      $invoices = [];
      foreach ($invoice_arr as $vk => $vv) {
        $invoices[$vv["id"]] = get_module_id_prefix("invoices") . $vv["id"];
      }
      // print_arr($invoices);

    }
    // $raw_material_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);        // print_arr($raw_material_arr);
    // $raw_materials = [];
    // foreach ($raw_material_arr as $vk => $vv) {
    //   $raw_materials[$vv["id"]] = $vv["raw_material"];
    // }
    // // print_arr($vendors);

    echo form_field(["type" => "hidden", "name" => "Type", "key" => "type", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    if ($source == "sent") {
      echo form_field(["type" => "select", "name" => "Payment to Vendor", "key" => "vendor", "options" => $vendors, "class" => "col-md-6 col-lg-4 mb-3"], $data);
      echo form_field(["type" => "select", "name" => "Send Payment for Purchase", "key" => "purchase", "options" => $purchases, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    }

    if ($source == "received") {
      echo form_field(["type" => "select", "name" => "Payment from Customer", "key" => "customer", "options" => $customers, "class" => "col-md-6 col-lg-4 mb-3"], $data);
      echo form_field(["type" => "select", "name" => "Receive Payment for Invoice", "key" => "invoice", "options" => $invoices, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    }

    echo form_field(["type" => "date", "name" => "Payment date", "key" => "payment_date", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Amount", "key" => "amount", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "select-attribute", "name" => "Bank Account", "key" => "bank_account", "attributes" => get_attributes_arr("bank_account"), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "select", "name" => "Payment mode", "key" => "payment_mode", "required" => true, "options" => get_payment_mode_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "text", "name" => "Payment reference no.", "key" => "reference_no", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "select", "name" => "Transaction type", "key" => "transaction_type", "options" => get_transaction_type_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "select", "name" => "Status", "key" => "status", "required" => true, "options" => get_payment_status_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "textarea", "name" => "Notes", "key" => "notes", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // Image upload field
    if (isset($data["attachment"]) && $data["attachment"] != NULL && $data["attachment"] != "") {
      $image_arr = fetch_data(["table" => "uploads", "columns" => "id, name, thumb, type, small", "condition" => " id = '" . $data["attachment"] . "' ", "order" => "", "limit" => ""]);    // print_arr($image_arr);
      $data["attachment"] = $image_arr;
      // print_arr($data);
    }
    echo form_field(["type" => "image-file", "name" => "Attachment (if any)", "key" => "attachment", "display_size" => "small", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    $data["documents"] = [];
    if ($mode == 'update' && isset($id) && $id != "" && $id != NULL) {
      $documents_arr = fetch_data([
        "table" => "uploads",
        "columns" => "id, name, thumb, type, small, caption, other",
        "condition" => " table_name = '" . $tablename . "' AND row_id = '" . $id . "' AND file_type = 'document' ",
        "order" => "",
        "limit" => ""
      ]);    // print_arr($documents_arr);
      $data["documents"] = $documents_arr;
    }
    // print_arr($data);

    // print_arr(get_attributes_arr("document_type"));

    // print_arr(get_attributes_arr("raw_material_category"));

    echo form_field([
      "type" => "multi-file",
      "name" => "Documents",
      "key" => "documents",
      "attributes" => get_attributes_arr("document_type"),
      "display_size" => "small",
      "class" => "col-md-6 col-lg-4 mb-3"
    ], $data);

    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    echo column_history_fields($save_column_history, $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php
// $other_scripts = '<link rel="stylesheet" href="'. ROOT_PATH.'/assets/plugins/flatpickr/flatpickr.min.css">
// <script src="'. ROOT_PATH.'/assets/plugins/flatpickr/flatpickr.js"></script><script>flatpickr("#datepicker", {}); </script>';
?>
<?php include '../../common/footer.php'; ?>