<?php
$module = "documents";
$pageid = "documents-read";
include("../../common/header.php");
// include("document-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["documents"];

  $pagetitle = T("Documents");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "uploads";

  $primary_column = "id";

  // $vendors_arr = fetch_data(["table" => "vendors", "columns" => "id, firm_name", "condition" => "", "order" => "firm_name ASC", "limit" => ""]);    // print_arr($vendors_arr);
  // print_arr($vendors_arr);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "Document File", "column" => "id", "type" => "image-file", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "Document type", "column" => "caption", "attributes" => get_attributes_arr("document_type"), "badge" => true],
    ["name" => "Other info", "column" => "other"],
    // ["name" => "Title", "column" => "title", "class" => "nowrap"],
    // ["name" => "Status", "column" => "status", "options" => get_document_status_arr(), "badge" => true],
    // ["name" => "Order Date", "column" => "order_date", "format" => "date", "class" => "nowrap"],
    // ["name" => "Expeced Date", "column" => "expected_delivery_date", "format" => "date", "class" => "nowrap"],
    // ["name" => "Received Date", "column" => "fully_received_date", "format" => "date", "class" => "nowrap"],
    // ["name" => "Extension", "column" => "table_name", "class" => "nowrap"],
    ["name" => "Attached to", "column" => "", "type" => "table_row_link", "options" => get_module_pages_arr(), "class" => "nowrap"],
    // ["name" => "Cost", "column" => ["sub_total", "gst", "tax", "discount", "grand_total"], "prefix" => ["Subtotal", "GST", "Tax", "Discount", "Grand Total"], "sorting" => false],
    // ["name" => "Vendor", "column" => "vendor", "options" => $vendors_arr, "type" => "table_id", "option_id" => "id", "option_label" => "firm_name"],
    // ["name" => "Document Invoice", "column" => "document_invoice", "type" => "image-file", "sorting" => false, "search" => false, "class" => "text-center"],
    // ["name" => "Payment Status", "column" => "payment_status", "options" => get_document_payment_status_arr(), "badge" => true],
    // ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "documents-update", "delete" => "documents-delete"]],
  ];

  $fetch_columns = [
    "row_id", "table_name"
  ];

  $detail_columns = [
    // ["name" => "Brief", "column" => "brief"],
    // ["name" => "Buy Price", "column" => "buy_price"],
    // ["name" => "First Received on", "column" => "first_received_date", "format" => "date", "class" => "nowrap"],
    // ["name" => "Fully Received on", "column" => "fully_received_date", "format" => "date", "class" => "nowrap"],
    // ["name" => "Cancelled on", "column" => "cancel_date", "format" => "date", "class" => "nowrap"],

    // ["name" => "Vendor", "column" => "vendor", "options" => $vendors_arr, "type" => "table_id", "option_id" => "id", "option_label" => "firm_name"],
    // ["name" => "Document Invoice", "column" => "document_invoice", "type" => "image-file", "class" => "text-center"],
    // ["name" => "Documents", "type" => "multi-file", "attributes" => get_attributes_arr("document_type"),],
    ["name" => "Last update", "type" => "last_update_info"],
    // [
    //   "name" => "History",
    //   "type" => "history",
    //   "history_columns" => [
    //     // ["name" => "Status", "column" => "status", "options" => get_document_status_arr(), "badge" => true],
    //     // ["name" => "Payment Status", "column" => "payment_status", "options" => get_document_payment_status_arr(), "badge" => true],
    //     // ["name" => "Quantity", "column" => "quantity"]
    //   ],
    // ]
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
    "query" => " file_type = 'document' ",
    "orderby" => "id DESC"
  ]);

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>