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
    ['name' => 'Select', 'column' => '', 'type' => 'select', 'sorting' => false, 'search' => false, 'class' => 'text-center',],
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
        ["text" => "Add Dispatch Items", "url" => ROOT_PATH . "/modules/dispatch_items/dispatch_item-bulkform.php?dispatch={id}", "acl" => "dispatch_items-create"]
      ]
    ],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "product_lots-update", "delete" => "product_lots-delete"]],
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


  <?php
  /*
  $widgettitle = 'Add new dispatch items';

  widget_start($widgettitle, '', '', '', '');
  ?>

  <?php
  $tablename = 'dispatch_items';
  $display_new_rows = 3;
  $save_fields = [
    'single' => [
      ['key' => 'dispatch'],
      ["key" => "auth_user", "type" => "session_user"],
      ["key" => "updated", "type" => "time"],
      ["key" => "created", "type" => "created_time"],
    ],
    'multi' => [
      ['key' => 'product'],
      ['key' => 'quantity']
    ],
  ];

  $single_fields = [
    ['column' => 'dispatch', 'value' => $_GET["dispatch"] ?? ""] // get form url
  ];

  $msg = [
    "success_added" => "New dispatch items added successfully",
    "error_added" => "Error in adding new dispatch items",
    "warning_added" => "Some new dispatch items were added. Errors encountered in rest.",
  ];

  $submit_result = bi_bulk_submit_form([
    'submit_data' => $_POST,
    'tablename' => $tablename,
    'save_fields' => $save_fields,
    'msg' => $msg,
  ]);

  $tableid = 'dispatch_items_table';
  $column_titles = ['Product', 'Quantity'];

  function bulk_insert_table_row($index)
  {

    $product_arr = fetch_data(["table" => "products", "columns" => "id, product", "condition" => "", "dispatch" => "product ASC", "limit" => ""]);        // print_arr($product_arr);
    $products = [];
    foreach ($product_arr as $vk => $vv) {
      $products[$vv["id"]] = $vv["product"];
    }
    // print_arr($products); 


    $s = '';
    $s .= "<tr data-index='" . $index . "'>";
    $s .= '<td>'
      .  form_field(['type' => 'hidden', 'name' => '', 'key' => 'rowindex[]', 'class' => '',], [])
      . form_field(['type' => 'select', 'name' => 'Product', 'key' => 'product[]', "options" => $products, 'class' => ''], []);
    $s .= '</td>';
    $s .=  '<td>' . form_field(['type' => 'number', 'name' => 'Quantity', 'key' => 'quantity[]', 'class' => '',], []) .  '</td>';
    $s .= '</tr>';

    return $s;
  }

  ?>
  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data"><?php echo bi_single_inputs($single_fields); ?>
    <div class='widget-table'>
      <div class='table-responsive'>
        <table class='table' id='<?php echo $tableid; ?>'>
          <thead>
            <tr> <?php foreach ($column_titles as $ctk => $ctv) {
                    echo '<th>' . $ctv . '</th>';
                  }
                  ?>
            </tr>
          </thead>
          <tbody> <?php
                  for ($index = 1; $index <= $display_new_rows; $index++) {
                    echo bulk_insert_table_row($index);
                  }
                  ?>
          </tbody>
        </table>
        <?php
        $data = [];
        echo bi_add_new_row($tableid, bulk_insert_table_row('new'));
        echo form_field(['type' => 'submit',  'name' => 'Save',  'key' => 'save',  'class' => 'col-md-12 col-sm-12 col-xs-12 text-center',], $data);
        ?>
  </form>

  <?php widget_end(); */ ?>

</div>

<?php include '../../common/footer.php'; ?>