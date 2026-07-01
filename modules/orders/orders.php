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
[
 'name' => '',
 'column' => '',
 'type' => 'details',
 'sorting' => false,
 'search' => false,
 'class' => 'text-center nowrap',
],
[
 'name' => 'Select',
 'column' => '',
 'type' => 'select',
 'sorting' => false,
 'search' => false,
 'class' => 'text-center',
],
[
 'name' => 'ID',
 'column' => 'id',
 'class' => 'text-center nowrap',
 'id_prefix' => $module_pages['id_prefix'],
],
[
 'name' => 'Customer',
 'column' => 'customer',
 'options' => $customers_arr,
 'type' => 'table_id',
 'option_id' => 'id',
 'option_label' => 'firm_name',
 'class' => 'title',
 'module' => 'customers',
],
[
 'name' => 'Sales person',
 'column' => 'user',
 'options' => $users_arr,
 'type' => 'table_id',
 'option_id' => 'id',
 'option_label' => 'name',
 'class' => 'title',
 'module' => 'users',
],
// ["name" => "Available Qty", "column" => "available_quantity", "class" => "nowrap"],
// ["name" => "Reserved Qty", "column" => "reserved_quantity", "class" => "nowrap"],
// ["name" => "Consumed Qty", "column" => "consumed_quantity", "class" => "nowrap"],
[
 'name' => 'Order placed on Date',
 'column' => 'order_date',
 'format' => 'date',
 'class' => 'nowrap',
],
[
 'name' => 'Delivery Due Date',
 'column' => 'delivery_due_date',
 'format' => 'date',
 'class' => 'nowrap',
],
// ["name" => "Buy Price", "column" => "buy_price", "class" => "nowrap"],
// ["name" => "Vendor", "column" => "vendor", "options" => $vendors_arr, "type" => "table_id", "option_id" => "id", "option_label" => "firm_name", "module" => "vendors"],
// ["name" => "Purchase Invoice", "column" => "purchase_invoice", "type" => "image-file", "sorting" => false, "search" => false, "class" => "text-center"],
[
 'name' => 'Status',
 'column' => 'status',
 'options' => get_order_status_arr(),
 'badge' => true,
],
[
 'name' => 'Payment Status',
 'column' => 'payment_status',
 'options' => get_order_payment_status_arr(),
 'badge' => true,
],
[
 'name' => 'Actions',
 'column' => '',
 'type' => 'edit_delete',
 'sorting' => false,
 'search' => false,
 'class' => 'nowrap',
 'acl' => ['edit' => 'orders-update', 'delete' => 'orders-delete'],
],
  ];

  $fetch_columns = [];

  $detail_columns = [
['name' => 'Notes', 'column' => 'notes'],
// ["name" => "Purchase Details", "column" => "purchase", "options" => $purchases_arr, "type" => "table_id", "option_id" => "id", "option_label" => "title", "module" => "purchases"],
['name' => 'Last update', 'type' => 'last_update_info'],
[
 'name' => 'History',
 'type' => 'history',
 'history_columns' => [
  [
'name' => 'Status',
'column' => 'status',
'options' => get_order_status_arr(),
'badge' => true,
  ],
  [
'name' => 'Payment Status',
'column' => 'payment_status',
'options' => get_order_payment_status_arr(),
'badge' => true,
  ],
  // ["name" => "Quantity", "column" => "quantity"]
 ],
],
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


  <?php
  $widgettitle = 'Add new orders';

  widget_start($widgettitle, '', '', '', '');
  ?>

  <?php
  $tablename = 'order_items';
  $column_titles = ['Product', 'Quantity'];
  $display_new_rows = 3;
  $save_fields = [
    'single' => [
      ['key' => 'order'],
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
    ['column' => 'order', 'value' => '2'] // get form url
  ];

  $msg = [
    "success_added" => "New order items added successfully",
    "error_added" => "Error in adding new order items",
    "warning_added" => "Some new order items were added. Errors encountered in rest.",
  ];

  $submit_result = bulk_submit_form([
    'submit_data' => $_POST,
    'tablename' => $tablename,
    'save_fields' => $save_fields,
    'msg' => $msg,
  ]);

  $tableid = 'order_items_table';

?>
  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
 <?php echo single_inputs($single_fields); ?>
 
 <div class='widget-table'>
<div class='table-responsive'>
<table class='table' id='<?php echo $tableid; ?>'>
  <thead><tr>
 <?php 
  foreach ($column_titles as $ctk => $ctv) {
    echo '<th>' . $ctv . '</th>';
   } 
   ?>
  </tr></thead>
  <tbody>
  <?php 
    for ($index = 1; $index <= $display_new_rows; $index++) {
      echo bulk_insert_table_row($index);
    } 
  ?>
 
  </tbody>
</table>
<?php
$data = [];
echo add_new_row('orders_table');
echo form_field([  'type' => 'submit',  'name' => 'Save',  'key' => 'save',  'class' => 'col-md-12 col-sm-12 col-xs-12 text-center', ], $data);
?>
  </form>
  
  <?php widget_end(); ?>


</div>

<?php include '../../common/footer.php'; ?>

<?php
function single_inputs($fields)
{
 $s = '';
 foreach ($fields as $sk => $sv) {
  $s .="<input type='text' name='" .$sv['column'] ."' value='" .$sv['value'] ."'>";
 }
 return $s;
}

function bulk_insert_table_row($index)
{
 $data = [];
 $s = '';
 $s .= "<tr data-index='" . $index . "'>";
 $s .= '<td>' 
 .  form_field(['type' => 'hidden', 'name' => '', 'key' => 'rowindex[]', 'class' => '',],$data) 
 .form_field([ 'type' => 'text', 'name' => 'Product', 'key' => 'product[]', 'class' => ''],$data  ) .'</td>';
 $s .=  '<td>' .form_field(['type' => 'number', 'name' => 'Quantity', 'key' => 'quantity[]', 'class' => '',],$data  ) .  '</td>';
 $s .= '</tr>';
 return $s;
}

function add_new_row($tableid)
{
 $s = "";
 $ele = 'new-row-html';
 $s .=  "<input type='button' class='btn btn-primary add-new-row' value='Add new row' data-element='" .  $ele .  "' data-table='" .  $tableid .  "'>";
 $s .= "<template  id='" . $ele . "' style='display:none'>" . bulk_insert_table_row('new') . '</template >';
 return $s;
}


?>

<script>
    $(document).on("click", ".add-new-row", function () {
      let tableid = $(this).attr("data-table");
      let ele = $(this).attr("data-element");
      console.log(tableid, ele);
      let rowHtml = $('#'+ele).html();
      $('#'+tableid+' tbody').append(rowHtml);
    });
</script>
