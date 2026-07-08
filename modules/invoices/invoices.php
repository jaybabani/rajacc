<?php
$module = 'invoices';
$pageid = 'invoices-read';
include '../../common/header.php';

// include("invoice-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr['invoices'];

  $pagetitle = T('All Invoicees');
  $actions_html = '';
  $actions_html .= download_xlsx($module_pages['read']);
  $actions_html .= pagination($module_pages['read'] . '.php');
  widget_start($pagetitle, '', '', '', $actions_html);
  ?>

  <?php
  $tablename = 'invoices';

  $primary_column = 'id';


  $display_columns = [
    ['name' => '', 'column' => '', 'type' => 'details', 'sorting' => false, 'search' => false, 'class' => 'text-center nowrap',],
    // ['name' => 'Select', 'column' => '', 'type' => 'select', 'sorting' => false, 'search' => false, 'class' => 'text-center',],
    ['name' => 'ID', 'column' => 'id', 'class' => 'text-center nowrap', 'id_prefix' => $module_pages['id_prefix'],],
    ['name' => 'Dispatch', 'column' => 'dispatch', 'class' => 'text-center nowrap', 'id_prefix' => get_module_id_prefix("dispatchs")],
    ["name" => "Created on date", "column" => "created_on_date", "format" => "date", "class" => "nowrap"],
    ["name" => "Status", "column" => "status", "options" => get_invoice_status_arr(), "badge" => true],
    // ["name" => "Payment Status", "column" => "payment_status", "options" => get_invoice_payment_status_arr(), "badge" => true],
    [
      "name" => "Invoice Items",
      "column" => "",
      "type" => "link",
      "sorting" => false,
      "search" => false,
      "class" => "nowrap",
      "links" => [
        ["text" => "View Invoice Items", "url" => ROOT_PATH . "/modules/invoice_items/invoice_items.php?invoice={id}", "acl" => "invoice_items-read"],
        ["text" => "Manage Invoice Items", "url" => ROOT_PATH . "/modules/invoice_items/invoice_item-bulkform.php?invoice={id}", "acl" => "invoice_items-create"]
      ]
    ],
    [
      "name" => "Actions",
      "column" => "",
      "type" => "edit",
      "sorting" => false,
      "search" => false,
      "class" => "nowrap",
      "acl" => ["edit" => "invoices-update"],
    ],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ['name' => 'Notes', 'column' => 'notes'],
    // ["name" => "Purchase Details", "column" => "purchase", "options" => $purchases_arr, "type" => "table_id", "option_id" => "id", "option_label" => "title", "module" => "purchases"],['name' => 'Last update', 'type' => 'last_update_info'],['name' => 'History','type' => 'history','history_columns' => [  [    'name' => 'Status',    'column' => 'status',    'options' => get_invoice_status_arr(),    'badge' => true,  ],  [    'name' => 'Payment Status',    'column' => 'payment_status',    'options' => get_invoice_payment_status_arr(),    'badge' => true,  ],  // ["name" => "Quantity", "column" => "quantity"]],],
    ["name" => "Last update", "type" => "last_update_info"],
    [
      "name" => "History",
      "type" => "history",
      "history_columns" => [
        ["name" => "Status", "column" => "status", "options" => get_invoice_status_arr(), "badge" => true],
        // ["name" => "Payment Status", "column" => "payment_status", "options" => get_invoice_payment_status_arr(), "badge" => true],
        // ["name" => "Quantity", "column" => "quantity"]
      ],
    ]
  ];

  $table_html = crud_read([
    'module_pages' => $module_pages,
    'tablename' => $tablename,
    'primary_column' => $primary_column,
    'display_columns' => $display_columns,
    'fetch_columns' => $fetch_columns,
    'detail_columns' => $detail_columns,
    'datatable' => true,
    'pagination' => true,
    'pagelimit' => 100,
    'query' => '',
    'invoiceby' => 'id DESC',
  ]);

  $load_datatable = true;

  echo $table_html;
  ?>

  <?php widget_end(); ?>


</div>

<?php include '../../common/footer.php'; ?>