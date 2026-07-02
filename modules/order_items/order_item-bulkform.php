<?php
$module = 'order_items';
$pageid = 'order_items-read';
include '../../common/header.php';
// include("order_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr['order_items'];

  $widgettitle = 'Add new order items';

  widget_start($widgettitle, '', '', '', '');
  ?>

  <?php
  $tablename = 'order_items';
  $display_new_rows = 3;
  $save_fields = [
    'single' => [
      ['key' => 'order_id'],
      ["key" => "auth_user", "type" => "session_user"],
      ["key" => "updated", "type" => "time"],
      ["key" => "created", "type" => "created_time"],
    ],
    'multi' => [
      ['key' => 'product'],
      ['key' => 'quantity'],
      ['key' => 'rate']
    ],
  ];

  $single_fields = [
    ['column' => 'order_id', 'value' => $_GET["order_id"] ?? ""] // get form url
  ];

  $msg = [
    "success_added" => "New order items added successfully",
    "error_added" => "Error in adding new order items",
    "warning_added" => "Some new order items were added. Errors encountered in rest.",
  ];

  $save_column_history = [
    "columns" => ["rate[]", "quantity[]"],
  ];

  $submit_result = bi_bulk_submit_form([
    'submit_data' => $_POST,
    'tablename' => $tablename,
    'save_fields' => $save_fields,
    'msg' => $msg,
    "save_column_history" => $save_column_history,
  ]);

  $tableid = 'order_items_table';
  $column_titles = ['Product', 'Quantity', 'Rate / unit', 'Actions'];

  function bulk_insert_table_row($index, $save_column_history)
  {

    $product_arr = fetch_data(["table" => "products", "columns" => "id, product", "condition" => "", "order" => "product ASC", "limit" => ""]);        // print_arr($product_arr);
    $products = [];
    foreach ($product_arr as $vk => $vv) {
      $products[$vv["id"]] = $vv["product"];
    }
    // print_arr($products); 


    $s = '';
    $s .= "<tr data-index='" . $index . "'>";
    $s .= '<td>'
      .  form_field(['type' => 'hidden', 'name' => '', 'key' => 'rowindex[]', 'class' => '',], [])
      .  column_history_fields($save_column_history, [])
      .  form_field(['type' => 'select', 'name' => 'Product', 'key' => 'product[]', 'required' => true, "options" => $products, 'class' => ''], []);
    $s .= '</td>';
    $s .=  '<td>' . form_field(['type' => 'number', 'name' => 'Quantity', 'key' => 'quantity[]', 'required' => true, 'class' => '',], []) .  '</td>';
    $s .=  '<td>' . form_field(['type' => 'number', 'name' => 'Rate', 'key' => 'rate[]', 'required' => true, 'class' => '',], []) .  '</td>';
    $s .=  '<td>' . form_field(['type' => 'delete_row', 'name' => '', 'class' => '', 'key' => 'delete-row-'.$index.'', 'index' => $index], []) .  '</td>';
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
                  for ($index = 1; $index <= $display_new_rows; $index++) {
                    echo bulk_insert_table_row($index, $save_column_history);
                  }
                  ?>
          </tbody>
        </table>
        <?php
        $data = [];
        echo bi_add_new_row($tableid, bulk_insert_table_row('new', $save_column_history));
        echo form_field(['type' => 'submit',  'name' => 'Save',  'key' => 'save',  'class' => 'col-md-12 col-sm-12 col-xs-12 text-center',], $data);
        ?>
  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>