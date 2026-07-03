<?php
$module = 'invoice_items';
$pageid = 'invoice_items-read';
include '../../common/header.php';
// include("invoice_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr['invoice_items'];

  $widgettitle = 'Add new invoice items';

  widget_start($widgettitle, '', '', '', '');
  ?>

  <?php

  $invoice_data = module_get_data("invoices", $_GET["invoice"]);
  // print_arr($invoice_data);
  $dispatch = $invoice_data["dispatch"];
  $dispatch_data = module_get_data("dispatchs", $dispatch);
  $order_id = $dispatch_data["order_id"];

  $invoice_items_data = get_invoice_items($_GET["invoice"]); 
  print_arr($invoice_items_data);
  // module_get_data("invoices", $_GET["invoice"]);

  // print_arr($dispatch_data);
  // $order

  $single_fields = [
    ['column' => 'invoice', 'value' => $_GET["invoice"] ?? ""], // get form url
    ['column' => 'dispatch', 'value' => $dispatch],
    ['column' => 'order_id', 'value' => $order_id]
  ];

  $tablename = 'invoice_items';
  $save_fields = [
    'single' => [
      ['key' => 'order_id'],
      ['key' => 'invoice'],
      ['key' => 'dispatch'],
      ["key" => "auth_user", "type" => "session_user"],
      ["key" => "updated", "type" => "time"],
      ["key" => "created", "type" => "created_time"],
    ],
    'multi' => [
      ['key' => 'product'],
      ['key' => 'rate'],
      ['key' => 'quantity'],
    ],
  ];


  $msg = [
    "success_added" => "New invoice items added successfully",
    "error_added" => "Error in adding new invoice items",
    "warning_added" => "Some new invoice items were added. Errors encountered in rest.",
  ];

  $save_column_history = [
    "columns" => ["quantity[]", "rate[]"],
  ];

  // $manage_order_quantity = [
  //   "action" => "reserve", 
  //   "quantity_field" => "quantity"
  // ];


  $redirect_to = "";
  $url_param = "";
  if (isset($_POST["invoice"])) {
    $url_param = "invoice=" . $_POST["invoice"] . "";
    $redirect_to = "invoice_items";
  }

  $submit_result = bi_bulk_submit_form([
    'submit_data' => $_POST,
    'tablename' => $tablename,
    'save_fields' => $save_fields,
    'msg' => $msg,
    "save_column_history" => $save_column_history,
    // 'manage_order_quantity' => $manage_order_quantity,
    "redirect_to" => $redirect_to,
    "url_param" => $url_param,
  ]);


  $tableid = 'invoice_items_table';
  $column_titles = ['Product', 'Quantity', 'Rate'];

  // get dispatch items
  // combine as products and merge all quantity 
  // and display each product as a row

  $dispatch_products = get_dispatch_products($dispatch);
  $product_ids = $dispatch_products["product_ids"];  // print_arr($product_ids);
  $products_arr = get_products_by_ids($product_ids);
  $quantities = $dispatch_products["quantity"];

  $vars = [];
  $vars["invoice"] = $invoice_data;
  $vars["dispatch_data"] = $dispatch_data;
  $vars["order_id"] = $order_id;
  $vars["dispatch_products"] = $dispatch_products;
  $vars["product_ids"] = $product_ids;
  $vars["products"] = $products_arr;
  $vars["quantities"] = $quantities;

  $display_new_rows = sizeof($product_ids);

  // print_arr($vars);
  print_arrbox($vars, 300);

  function bulk_insert_table_row($index, $save_column_history, $vars, $pid)
  {

    $s = '';
    $s .= "<tr data-index='" . $index . "'>";
    $data["product_name[]"] = $vars["products"][$pid];
    $data["product[]"] = $pid;  
    $data["quantity[]"] = $vars["quantities"][$pid];

    $s .=  '<td>'
      .  form_field(['type' => 'hidden', 'name' => '', 'key' => 'rowindex[]', 'class' => '',], [])
      .  column_history_fields($save_column_history, [])
      . form_field(['type' => 'hidden', 'name' => 'Product', 'key' => 'product[]', 'class' => '',], $data)
      . form_field(['type' => 'display', 'name' => 'Product', 'key' => 'product_name[]', 'class' => '',], $data);
    $s .=  '</td>';
    $s .= '<td>'
      . form_field(['type' => 'hidden', 'name' => 'Quantity', 'key' => 'quantity[]', 'class' => '',], $data)
      . form_field(['type' => 'display', 'name' => 'Quantity', 'key' => 'quantity[]', 'class' => '',], $data)
      .  '</td>';
    $s .=  '<td>'
      . form_field(['type' => 'number', 'name' => 'Rate', 'key' => 'rate[]', 'required' => true, 'class' => '',], [])
      .  '</td>';
    $s .= '</tr>';

    return $s;
  }

  ?>
  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <?php echo bi_single_inputs($single_fields); ?>
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
                  $index = 0;
                  foreach ($vars["quantities"] as $pid => $qv) {
                    $index++;
                    echo bulk_insert_table_row($index, $save_column_history, $vars, $pid);
                  }
                  ?>
          </tbody>
        </table>
        <?php
        $data = [];
        // echo bi_add_new_row($tableid, bulk_insert_table_row('new', $save_column_history, $vars));
        echo form_field(['type' => 'submit',  'name' => 'Save',  'key' => 'save',  'class' => 'col-md-12 col-sm-12 col-xs-12 text-center',], $data);
        ?>
  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>