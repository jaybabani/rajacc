<?php
$module = 'orders';
$pageid = 'orders-read';
include '../../common/header.php';

// include("order-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr['orders'];

  $pagetitle = T('Sales Orders');
  $actions_html = '';
  $actions_html .= download_xlsx($module_pages['read']);
  $actions_html .= pagination($module_pages['read'] . '.php');
  widget_start($pagetitle, '', '', '', $actions_html);
  ?>

  <?php
  $tablename = 'orders';

  $primary_column = 'id';

  // $purchases_arr = fetch_data(["table" => "purchases", "columns" => "id, title", "condition" => "", "order" => "created DESC", "limit" => ""]); // print_arr($purchases_arr);
  // print_arr($purchases_arr);

  $customers_arr = fetch_data([
    'table' => 'customers',
    'columns' => 'id, firm_name',
    'condition' => '',
    'order' => 'firm_name ASC',
    'limit' => '',
  ]); // print_arr($customers_arr);
  // print_arr($customers_arr);

  $users_arr = fetch_data([
    'table' => 'users',
    'columns' => 'id, name',
    'condition' => '',
    'order' => 'name ASC',
    'limit' => '',
  ]); // print_arr($users_arr);
  // print_arr($users_arr);

  $display_columns = [
    ['name' => '', 'column' => '', 'type' => 'details', 'sorting' => false, 'search' => false, 'class' => 'text-center nowrap',],
    // ['name' => 'Select', 'column' => '', 'type' => 'select', 'sorting' => false, 'search' => false, 'class' => 'text-center',],
    ['name' => 'ID', 'column' => 'id', 'class' => 'text-center nowrap', 'id_prefix' => $module_pages['id_prefix'],],
    ['name' => 'Customer', 'column' => 'customer', 'options' => $customers_arr, 'type' => 'table_id', 'option_id' => 'id', 'option_label' => 'firm_name', 'class' => 'title', 'module' => 'customers',],
    ['name' => 'Sales person', 'column' => 'user', 'options' => $users_arr, 'type' => 'table_id', 'option_id' => 'id', 'option_label' => 'name', 'class' => 'title', 'module' => 'users',],
    ["name" => "Order placed on Date", "column" => "order_date", "format" => "date", "class" => "nowrap"],
    ["name" => "Due Date", "column" => "delivery_due_date", "format" => "date", "class" => "nowrap"],
    ["name" => "Status", "column" => "status", "options" => get_order_status_arr(), "badge" => true],
    ["name" => "Payment Status", "column" => "payment_status", "options" => get_order_payment_status_arr(), "badge" => true],
    [
      "name" => "Order Items",
      "column" => "",
      "type" => "link",
      "sorting" => false,
      "search" => false,
      "class" => "nowrap",
      "links" => [
        ["text" => "View Order Items", "url" => ROOT_PATH . "/modules/order_items/order_items.php?order_id={id}", "acl" => "order_items-read"],
        ["text" => "Add Order Items", "url" => ROOT_PATH . "/modules/order_items/order_item-bulkform.php?order_id={id}", "acl" => "order_items-create"]
      ]
    ],
    [
      "name" => "Actions",
      "column" => "",
      "type" => "edit_delete",
      "sorting" => false,
      "search" => false,
      "class" => "nowrap",
      "acl" => [
        "edit" => "orders-update",
        "delete" => "orders-delete",
      ],
      "links" => [
        ["text" => "Inventory Movement", "icon" => "clipboard", "url" => ROOT_PATH . "/modules/product_movements/product_movements.php?order_id={id}", "acl" => "product_movements-read", "class" => "prod-move-link"],
      ]
    ],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ['name' => 'Notes', 'column' => 'notes'],
    // ["name" => "Purchase Details", "column" => "purchase", "options" => $purchases_arr, "type" => "table_id", "option_id" => "id", "option_label" => "title", "module" => "purchases"],['name' => 'Last update', 'type' => 'last_update_info'],['name' => 'History','type' => 'history','history_columns' => [  [    'name' => 'Status',    'column' => 'status',    'options' => get_order_status_arr(),    'badge' => true,  ],  [    'name' => 'Payment Status',    'column' => 'payment_status',    'options' => get_order_payment_status_arr(),    'badge' => true,  ],  // ["name" => "Quantity", "column" => "quantity"]],],
    ["name" => "Last update", "type" => "last_update_info"],
    [
      "name" => "History",
      "type" => "history",
      "history_columns" => [
        ["name" => "Status", "column" => "status", "options" => get_order_status_arr(), "badge" => true],
        ["name" => "Payment Status", "column" => "payment_status", "options" => get_order_payment_status_arr(), "badge" => true],
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
    'orderby' => 'id DESC',
  ]);

  $load_datatable = true;

  echo $table_html;
  ?>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>