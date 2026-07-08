<?php
$module = 'dispatchs';
$pageid = 'dispatchs-read';
include '../../common/header.php';

// include("dispatch-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr['dispatchs'];

  $pagetitle = T('All Dispatches');
  $actions_html = '';
  $actions_html .= download_xlsx($module_pages['read']);
  $actions_html .= pagination($module_pages['read'] . '.php');
  widget_start($pagetitle, '', '', '', $actions_html);
  ?>

  <?php
  $tablename = 'dispatchs';

  $primary_column = 'id';

  $display_columns = [
    ['name' => '', 'column' => '', 'type' => 'details', 'sorting' => false, 'search' => false, 'class' => 'text-center nowrap',],
    // ['name' => 'Select', 'column' => '', 'type' => 'select', 'sorting' => false, 'search' => false, 'class' => 'text-center',],
    ['name' => 'ID', 'column' => 'id', 'class' => 'text-center nowrap', 'id_prefix' => $module_pages['id_prefix'],],
    ['name' => 'Order ID', 'column' => 'order_id', 'class' => 'text-center nowrap', 'id_prefix' => get_module_id_prefix("orders")],
    ["name" => "Created on date", "column" => "created_on_date", "format" => "date", "class" => "nowrap"],
    ["name" => "Status", "column" => "status", "options" => get_dispatch_status_arr(), "badge" => true],
    // ["name" => "Payment Status", "column" => "payment_status", "options" => get_dispatch_payment_status_arr(), "badge" => true],
    [
      "name" => "Dispatch Items",
      "column" => "",
      "type" => "link",
      "sorting" => false,
      "search" => false,
      "class" => "nowrap",
      "links" => [
        ["text" => "View Dispatch Items", "url" => ROOT_PATH . "/modules/dispatch_items/dispatch_items.php?dispatch={id}", "acl" => "dispatch_items-read"],
        [
          "text" => "Add Dispatch Items",
          "url" => ROOT_PATH . "/modules/dispatch_items/dispatch_item-bulkform.php?dispatch={id}",
          "acl" => "dispatch_items-create",
          "row_condition" => [
            "type" => "AND",
            "checks" => [
              [
                "column" => "status",
                "is" => "not_in_array",
                "value" => ["invoice_generated", "dispatched"]
              ]
            ]
          ]
        ]
      ]
    ],
    [
      "name" => "Actions",
      "column" => "",
      "type" => "edit",
      "sorting" => false,
      "search" => false,
      "class" => "nowrap",
      "acl" => ["edit" => "dispatchs-update"],
      "links" => [
        ["text" => "Inventory Movement", "icon" => "clipboard", "url" => ROOT_PATH . "/modules/product_movements/product_movements.php?dispatch={id}", "acl" => "product_movements-read", "class" => "prod-move-link"],
      ]
    ],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ['name' => 'Notes', 'column' => 'notes'],
    // ["name" => "Purchase Details", "column" => "purchase", "options" => $purchases_arr, "type" => "table_id", "option_id" => "id", "option_label" => "title", "module" => "purchases"],['name' => 'Last update', 'type' => 'last_update_info'],['name' => 'History','type' => 'history','history_columns' => [  [    'name' => 'Status',    'column' => 'status',    'options' => get_dispatch_status_arr(),    'badge' => true,  ],  [    'name' => 'Payment Status',    'column' => 'payment_status',    'options' => get_dispatch_payment_status_arr(),    'badge' => true,  ],  // ["name" => "Quantity", "column" => "quantity"]],],
    ["name" => "Last update", "type" => "last_update_info"],
    [
      "name" => "History",
      "type" => "history",
      "history_columns" => [
        ["name" => "Status", "column" => "status", "options" => get_dispatch_status_arr(), "badge" => true],
        // ["name" => "Payment Status", "column" => "payment_status", "options" => get_dispatch_payment_status_arr(), "badge" => true],
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
    'dispatchby' => 'id DESC',
  ]);

  $load_datatable = true;

  echo $table_html;
  ?>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>