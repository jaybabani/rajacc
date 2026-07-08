<?php
$module = "payments";
$pageid = "payments-read";
include("../../common/header.php");
// include("payment-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["payments"];

  $source = "sent";
  $pagetitle = T("Payments sent");
  $query = " type = 'sent' ";
  if (isset($_GET['source']) && trim($_GET['source']) == 'received') {
    $pagetitle = T('Payment received');
    $source = "received";
  $query = " type = 'received' ";
  }


  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "payments";

  $primary_column = "id";

  $vendors_arr = fetch_data(["table" => "vendors", "columns" => "id, firm_name", "condition" => "", "order" => "firm_name ASC", "limit" => ""]);    // print_arr($vendors_arr);
  // print_arr($vendors_arr);

  $invoices_arr = fetch_data(["table" => "invoices", "columns" => "id", "condition" => "", "order" => "id DESC", "limit" => ""]);    // print_arr($invoices_arr);
  // print_arr($invoices_arr);

  $customers_arr = fetch_data(["table" => "customers", "columns" => "id, firm_name", "condition" => "", "order" => "firm_name ASC", "limit" => ""]);    // print_arr($vendors_arr);
  // print_arr($customers_arr);

  $purchases_arr = fetch_data(["table" => "purchases", "columns" => "id", "condition" => "", "order" => "id DESC", "limit" => ""]);    // print_arr($purchases_arr);
  // print_arr($purchases_arr);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    //["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    // ["name" => "Title", "column" => "title", "class" => "nowrap"],
    ["name" => "Type", "column" => "type", "options" => get_payment_type_arr(), "badge" => true],

    ["name" => "Payment Date", "column" => "payment_date", "format" => "date", "class" => "nowrap"],
    ["name" => "Status", "column" => "status", "options" => get_payment_status_arr(), "badge" => true],
    // ["name" => "Expeced Date", "column" => "expected_delivery_date", "format" => "date", "class" => "nowrap"],
    // ["name" => "Received Date", "column" => "fully_received_date", "format" => "date", "class" => "nowrap"],
    ["name" => "Amount", "column" => "amount", "class" => "nowrap"],
    // ["name" => "Payment Mode", "column" => ["payment_mode", "reference_no"], "prefix" => ["Payment Mode", "Reference no."], "sorting" => false],

    $source == "received" ? ["name" => "Customer", "column" => "customer", "options" => $customers_arr, "type" => "table_id", "option_id" => "id", "option_label" => "firm_name", "module" => "customers"] : [],
    $source == "received" ? ["name" => "Invoice", "column" => "invoice", "options" => $invoices_arr, "type" => "table_id", "option_id" => "id", "option_label" => "id", "module" => "invoices"] : [],

    $source == "sent" ? ["name" => "Vendor", "column" => "vendor", "options" => $vendors_arr, "type" => "table_id", "option_id" => "id", "option_label" => "firm_name", "module" => "vendors"] : [],
    $source == "sent" ? ["name" => "Purchase", "column" => "purchase", "options" => $purchases_arr, "type" => "table_id", "option_id" => "id", "option_label" => "id", "module" => "purchases"] : [],

    // ["name" => "Payment Invoice", "column" => "payment_invoice", "type" => "image-file", "sorting" => false, "search" => false, "class" => "text-center"],
    // ["name" => "Payment Status", "column" => "payment_status", "options" => get_payment_status_arr(), "badge" => true],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "payments-update", "delete" => "payments-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Notes", "column" => "notes"],
    // ["name" => "Buy Price", "column" => "buy_price"],
    // ["name" => "First Received on", "column" => "first_received_date", "format" => "date", "class" => "nowrap"],
    // ["name" => "Fully Received on", "column" => "fully_received_date", "format" => "date", "class" => "nowrap"],
    // ["name" => "Cancelled on", "column" => "cancel_date", "format" => "date", "class" => "nowrap"],

    // ["name" => "Vendor", "column" => "vendor", "options" => $vendors_arr, "type" => "table_id", "option_id" => "id", "option_label" => "firm_name", "module" => "vendors"],

    ["name" => "Transaction type", "column" => "transaction_type", "options" => get_transaction_type_arr()],
    ["name" => "Payment mode", "column" => "payment_mode"],
    ["name" => "Reference No.", "column" => "reference_no"],
    ["name" => "Bank account", "column" => "bank_account", "attributes" => get_attributes_arr("bank_account"),],

    ["name" => "Attachment", "column" => "attachment", "type" => "image-file", "class" => "text-center"],

    ["name" => "Documents", "type" => "multi-file", "attributes" => get_attributes_arr("document_type"),],
    ["name" => "Last update", "type" => "last_update_info"],
    [
      "name" => "History",
      "type" => "history",
      "history_columns" => [
        ["name" => "Status", "column" => "status", "options" => get_payment_status_arr(), "badge" => true],
        // ["name" => "Payment Status", "column" => "payment_status", "options" => get_payment_payment_status_arr(), "badge" => true],
        // ["name" => "Quantity", "column" => "quantity"]
      ],
    ]
  ];

  $table_html = crud_read([
    "module_pages" => $module_pages,
    "tablename" => $tablename,
    "primary_column" => $primary_column,
    "display_columns" => $display_columns,
    "fetch_columns" => $fetch_columns,
    "detail_columns" => $detail_columns,
    "datatable" => true,
    "pagination" => true,
    "pagelimit" => 100,
    "query" => $query,
    "orderby" => "id DESC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>