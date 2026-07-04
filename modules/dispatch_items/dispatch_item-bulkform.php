<?php
$module = 'dispatch_items';
$pageid = 'dispatch_items-read';
include '../../common/header.php';
// include("dispatch_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr['dispatch_items'];

  $widgettitle = 'Add new dispatch items';

  widget_start($widgettitle, '', '', '', '');
  ?>

  <?php

  $dispatch_data = module_get_data("dispatchs", $_GET["dispatch"]);
  $order_id = $dispatch_data["order_id"];

  $single_fields = [
    ['column' => 'dispatch', 'value' => $_GET["dispatch"] ?? ""], // get form url
    ['column' => 'order_id', 'value' => $order_id]
  ];

  $tablename = 'dispatch_items';
  $save_fields = [
    'single' => [
      ['key' => 'dispatch'],
      ['key' => 'order_id'],
      ["key" => "auth_user", "type" => "session_user"],
      ["key" => "updated", "type" => "time"],
      ["key" => "created", "type" => "created_time"],
    ],
    'multi' => [
      ['key' => 'product'],
      ['key' => 'product_lot'],
      ['key' => 'quantity'],
    ],
  ];


  $msg = [
    "success_added" => "New dispatch items added successfully",
    "error_added" => "Error in adding new dispatch items",
    "warning_added" => "Some new dispatch items were added. Errors encountered in rest.",
  ];

  $save_column_history = [
    "columns" => ["quantity[]"],
  ];

  $manage_order_quantity = [
    "action" => "reserve", 
    "quantity_field" => "quantity"
  ];


  $redirect_to = "";
  $url_param = "";
  if (isset($_POST["dispatch"])) {
    $url_param = "dispatch=" . $_POST["dispatch"] . "";
    $redirect_to = "dispatch_items";
  }

  $submit_result = bi_bulk_submit_form([
    'submit_data' => $_POST,
    'tablename' => $tablename,
    'save_fields' => $save_fields,
    'msg' => $msg,
    "save_column_history" => $save_column_history,
    'manage_order_quantity' => $manage_order_quantity,
    "redirect_to" => $redirect_to,
    "url_param" => $url_param,
  ]);


  $tableid = 'dispatch_items_table';
  $column_titles = ['Reserve Quantity', 'Product Lot', 'Actions'];

  $order_products_arr = get_order_products($order_id);
  $order_products = $order_products_arr["order_products"];
  $product_ids = $order_products_arr["product_ids"];  // print_arr($product_ids);
  $product_lots = get_product_lot_quantities($product_ids, "merged_by_product");
  $products_arr = get_products_by_ids($product_ids);
  $product_movements = fetch_product_movements(["order_id" => $order_id, "dispatch" => $dispatch_data]);
  $quantities = get_quantities_summary(["order_id" => $order_id, "order_products" => $order_products, "product_lots" => $product_lots, "product_movements" => $product_movements]);

  $vars = [];
  $vars["dispatch"] = $dispatch_data;
  $vars["order_id"] = $order_id;
  $vars["order_products"] = $order_products;
  $vars["product_ids"] = $product_ids;
  $vars["products"] = $products_arr["products"];
  $vars["quantities"] = $quantities;
  $vars["product_lots"] = $product_lots["product_lots"];

  $display_new_rows = sizeof($quantities);

  // print_arrbox($vars, 300);
  // print_arrbox($vars["quantities"], 300);

  function bulk_header_row($vars, $pid)
  {
    $s = '';
    $s .= "<tr data-pid='" . $pid . "'>";
    $data["product_name[]"] = "<h6><span>Product</span>: <strong>" . $vars["products"][$pid] . "</strong> &nbsp; &nbsp; <span>Quantity:</span> <strong>" . json_encode($vars["quantities"][$pid])."</strong></h6>";
    $s .=  '<td colspan=3>'
      . form_field(['type' => 'display', 'name' => '', 'key' => 'product_name[]', 'class' => '',], $data)
      .  '</td>';
    $s .= '</tr>';

    return $s;
  }

  function bulk_insert_table_row($index, $save_column_history, $vars, $pid, $product_lot)
  {

    $s = '';
    $s .= "<tr data-index='" . $index . "'>";
    $data["product[]"] = $pid;
    $data["product_lot[]"] = $product_lot["id"];
    $data["product_lot_info[]"] = get_module_id_prefix("product_lots") . $product_lot["id"]." &nbsp; (Available: ".$product_lot["available_quantity"].")";

    $maxqty = min([$product_lot["available_quantity"], $vars["quantities"][$pid]["pending"]]);

    $s .=  '<td>'
      .  form_field(['type' => 'hidden', 'name' => '', 'key' => 'rowindex[]', 'class' => '',], [])
      .  column_history_fields($save_column_history, [])
      . form_field(['type' => 'hidden', 'name' => 'Product', 'key' => 'product[]', 'class' => '',], $data);
    $s .= form_field(['type' => 'number', 'name' => 'Reserve Quantity', 'key' => 'quantity[]', 'max' => $maxqty, 'required' => true, 'class' => '',], []) .  '</td>';
    $s .= '<td>'
      . form_field(['type' => 'display', 'name' => 'Product Lot', 'key' => 'product_lot_info[]', 'class' => ''], $data)
      . form_field(['type' => 'hidden', 'name' => '', 'key' => 'product_lot[]', 'class' => ''], $data)
      .  '</td>';
    $s .=  '<td>' . form_field(['type' => 'delete_row', 'name' => '', 'class' => '', 'key' => 'delete-row-' . $index . '', 'index' => $index], []) .  '</td>';
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
                    if (isset($qv["pending"]) && $qv["pending"] > 0) {
                      echo bulk_header_row($vars, $pid);
                      foreach ($vars["product_lots"][$pid] as $lk => $plv) {
                        $index++;
                        echo bulk_insert_table_row($index, $save_column_history, $vars, $pid, $plv);
                      }
                    }
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