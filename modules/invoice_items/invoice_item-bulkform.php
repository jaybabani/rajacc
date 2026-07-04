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

  $invoice_data = module_get_data("invoices", $_GET["invoice"]);
  // print_arr($invoice_data);
  $dispatch = $invoice_data["dispatch"];
  $dispatch_data = module_get_data("dispatchs", $dispatch);
  $order_id = $dispatch_data["order_id"];

  $invoice_items_data = get_invoice_items($_GET["invoice"]); 
  // print_arrbox($invoice_items_data);

  $mode = "new";
  $widgettitle = 'Add new invoice items';
  if(sizeof($invoice_items_data) > 0){
    $mode = "update";
    $widgettitle = 'Edit invoice items';
  }

  widget_start($widgettitle, '', '', '', '');


  $tablename = 'invoice_items';
  $primary_column = "id";

  $save_fields_new = [
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

  $save_fields_update = [
    'single' => [
      ["key" => "auth_user", "type" => "session_user"],
      ["key" => "updated", "type" => "time"],
    ],
    'multi' => [
      ['key' => 'rate'],
    ],
  ];

  $save_fields = $save_fields_new;
  if(sizeof($invoice_items_data) > 0){
    $save_fields = $save_fields_update;
  }

  // module_get_data("invoices", $_GET["invoice"]);

  // print_arr($dispatch_data);
  // $order

  $single_fields = [
    ['column' => 'mode', 'value' => $mode],
    ['column' => 'invoice', 'value' => $_GET["invoice"] ?? ""], // get form url
    ['column' => 'dispatch', 'value' => $dispatch],
    ['column' => 'order_id', 'value' => $order_id]
  ];

  $msg = [
    "success_added" => "New invoice items added successfully",
    "error_added" => "Error in adding new invoice items",
    "warning_added" => "Some new invoice items were added. Errors encountered in rest.",
    "success_updated" => "Invoice items updated successfully",
    "error_updated" => "Error in updating invoice items",
    "warning_updated" => "Some invoice items were updated. Errors encountered in rest.",
  ];

  $save_column_history = [
    "columns" => ["rate[]"],
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

  $action_after_submit = [
    "action" => "invoice_items_added",
    "condition" => [
      "type" => "equal",
      "param" => ["key" => "mode", "value" => "new"]
    ]
  ];


  $submit_result = bi_bulk_submit_form([
    'mode' => $mode,
    'submit_data' => $_POST,
    'tablename' => $tablename,
    'primary_column' => $primary_column,    
    'save_fields' => $save_fields,
    'msg' => $msg,
    "save_column_history" => $save_column_history,
    "redirect_to" => $redirect_to,
    "url_param" => $url_param,
    "action_after_submit" => $action_after_submit,
  ]);

  $tableid = 'invoice_items_table';
  $column_titles = ['Product', 'Quantity', 'Rate'];

  // get dispatch items
  // combine as products and merge all quantity 
  // and display each product as a row

  if($mode == "new"){
    $dispatch_products = get_dispatch_products($dispatch);
    $product_ids = $dispatch_products["product_ids"];  // print_arr($product_ids);
    $quantities = $dispatch_products["quantity"];
    $rates = [];
    $rowindex = [];
  }
  else if($mode == "update"){
    $invoice_item_details = get_invoice_item_details($invoice_items_data);
    $product_ids = $invoice_item_details["product_ids"];  // print_arr($product_ids);
    $quantities = $invoice_item_details["quantity"];
    $rates = $invoice_item_details["rate"];
    $rowindex = $invoice_item_details["rowindex"];
  }

  $products_arr = get_products_by_ids($product_ids);

  $vars = [];
  $vars["invoice"] = $invoice_data;
  $vars["dispatch_data"] = $dispatch_data;
  $vars["order_id"] = $order_id;
  // $vars["dispatch_products"] = $dispatch_products;
  $vars["product_ids"] = $product_ids;
  $vars["products"] = $products_arr;
  $vars["quantities"] = $quantities;
  $vars["rates"] = $rates;
  $vars["rowindex"] = $rowindex;

  $display_new_rows = sizeof($product_ids);

  // print_arr($vars);
  // print_arrbox($vars, 300);

  function bulk_insert_table_row($mode, $index, $save_column_history, $vars, $pid)
  {

    $s = '';
    $s .= "<tr data-index='" . $index . "'>";
    $data["product_name[]"] = $vars["products"][$pid];
    $data["product[]"] = $pid;  
    $data["quantity[]"] = $vars["quantities"][$pid];
    $data["rate[]"] = "";
    $data["rowindex[]"] = "";

    if($mode == "update"){
      $data["rate[]"] = $vars["rates"][$pid];
      $data["rowindex[]"] = $vars["rowindex"][$pid];
    }

    $s .=  '<td>'
      .  form_field(['type' => 'hidden', 'name' => '', 'key' => 'rowindex[]', 'class' => '',], $data)
      .  column_history_fields($save_column_history, $data)
      . form_field(['type' => 'hidden', 'name' => 'Product', 'key' => 'product[]', 'class' => '',], $data)
      . form_field(['type' => 'display', 'name' => 'Product', 'key' => 'product_name[]', 'class' => '',], $data);
    $s .=  '</td>';
    $s .= '<td>'
      . form_field(['type' => 'hidden', 'name' => 'Quantity', 'key' => 'quantity[]', 'class' => '',], $data)
      . form_field(['type' => 'display', 'name' => 'Quantity', 'key' => 'quantity[]', 'class' => '',], $data)
      .  '</td>';
    $s .=  '<td>'
      . form_field(['type' => 'number', 'name' => 'Rate', 'key' => 'rate[]', 'required' => true, 'class' => '',], $data)
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
                    echo bulk_insert_table_row($mode, $index, $save_column_history, $vars, $pid);
                  }
                  ?>
          </tbody>
        </table>
        <?php
        $data = [];
        echo form_field(['type' => 'submit',  'name' => 'Save',  'key' => 'save',  'class' => 'col-md-12 col-sm-12 col-xs-12 text-center',], $data);
        ?>
  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>