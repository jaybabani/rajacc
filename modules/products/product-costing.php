<?php
$module = 'products';
$pageid = 'products-costing';
include '../../common/header.php';
// include("order_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  // $module_arr = get_module_pages_arr();
  // $module_pages = $module_arr['order_items'];

  $widgettitle = 'Product Costing';

  widget_start($widgettitle, '', '', '', '');
  // 

  $condition = "";
  if (isset($_GET["product"]) && $_GET["product"] != "" && is_numeric($_GET["product"])) {

    $get_prod_ids = [];
    $exp = explode(",", $_GET["product"]);
    $get_prod_ids = array_values(array_filter(array_unique($exp)));
    if (sizeof($get_prod_ids) > 0) {
      $condition = " id IN (" . implode(",", $get_prod_ids) . ")";
    }
  }

  $tableid = 'product_costing_table';
  $column_titles = ['Product', 'Total Cost per unit', 'Detail Cost per unit']; //'Rate / unit', 
  $products_arr = fetch_data(["table" => "products", "columns" => "id, product", "condition" => $condition, "order" => "product ASC", "limit" => ""]);    // print_arr($products_arr);
  // print_arr($products_arr);

  $product_ids = [];
  foreach ($products_arr as $k => $v) {
    $product_ids[] = $v["id"];
  }

  $product_ids = [];
  $product_ids[] = 30;

  $costing = get_product_cost($product_ids);
  // print_arr($costing);

  function table_row($index, $prod, $costing)
  {

    $det = product_cost_details($costing, $prod["id"]);

    $s = '';
    $s .= "<tr data-index='" . $index . "'>";
    $s .= '<td class="title">' . $prod["product"];
    $s .= '</td>';
    $s .=  '<td class="title">' . $det["total"] .  '</td>';
    $s .=  '<td>' . $det["detail"] .  '</td>';
    $s .= '</tr>';

    return $s;
  }

  ?>
  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <?php //echo bi_single_inputs($single_fields); 
    ?>
    <div class='widget-table'>
      <div class='table-responsive'>
        <table class='table' id='<?php echo $tableid; ?>'>
          <thead>
            <tr> <?php
                  foreach ($column_titles as $ctk => $ctv) {
                    echo '<th>' . $ctv . '</th>';
                  }
                  ?>
            </tr>
          </thead>
          <tbody> <?php
                  $index = 0;
                  foreach ($products_arr as $k => $p) {
                    $index++;
                    echo table_row($index, $p, $costing);
                  }
                  // for ($index = 1; $index <= $display_new_rows; $index++) {
                  //   echo bulk_insert_table_row($index, $save_column_history);
                  // }
                  ?>
          </tbody>
        </table>
        <?php
        // $data = [];
        // echo bi_add_new_row($tableid, bulk_insert_table_row('new', $save_column_history));
        // echo form_field(['type' => 'submit',  'name' => 'Save',  'key' => 'save',  'class' => 'col-md-12 col-sm-12 col-xs-12 text-center',], $data);
        ?>
  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>