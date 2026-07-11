<?php
$module = 'production_batch_items';
$pageid = 'production_batch_items-read';
include '../../common/header.php';
// include("production_batch_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr['production_batch_items'];

  $widgettitle = 'Add new production batch items';

  widget_start($widgettitle, '', '', '', '');
  ?>

  <?php

  $production_batch_data = module_get_data("production_batchs", $_GET["production_batch"]);
  $production = $production_batch_data["production"];

  $single_fields = [
    ['column' => 'production_batch', 'value' => $_GET["production_batch"] ?? ""], // get form url
    ['column' => 'production', 'value' => $production]
  ];

  $tablename = 'production_batch_items';
  $save_fields = [
    'single' => [
      ['key' => 'production_batch'],
      ['key' => 'production'],
      ["key" => "auth_user", "type" => "session_user"],
      ["key" => "updated", "type" => "time"],
      ["key" => "created", "type" => "created_time"],
    ],
    'multi' => [
      ['key' => 'raw_material'],
      ['key' => 'raw_material_lot'],
      ['key' => 'quantity'],
    ],
  ];


  $msg = [
    "success_added" => "New production batch items added successfully",
    "error_added" => "Error in adding new production batch items",
    "warning_added" => "Some new production batch items were added. Errors encountered in rest.",
  ];

  $save_column_history = [
    "columns" => ["quantity[]"],
  ];

  $manage_order_quantity = [
    "type" => "raw_material",
    "action" => "reserve",
    "quantity_field" => "quantity"
  ];


  $redirect_to = "";
  $url_param = "";
  if (isset($_POST["production_batch"])) {
    $url_param = "production_batch=" . $_POST["production_batch"] . "";
    $redirect_to = "production_batch_items";
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

  $tableid = 'production_batch_items_table';
  $column_titles = ['Reserve Quantity', 'Raw Material Lot', 'Actions'];

  $production_products_arr = get_production_products($production);
  $production_products = $production_products_arr["production_products"];
  $product_ids = $production_products_arr["product_ids"];  // print_arr($product_ids);
  $boms = product_boms($product_ids);
  $raw_material_ids = $boms["raw_material_ids"];  // print_arr($raw_material_ids);
  $raw_material_lots = get_raw_material_lot_quantities($raw_material_ids, "merged_by_raw_material");
  // print_arr($raw_material_lots);
  $products_arr = get_products_by_ids($product_ids);
  $raw_materials_arr = get_raw_materials_by_ids($raw_material_ids);
  $production_raw_materials_arr = get_production_raw_materials($production_products, $boms);
  // print_arr($production_raw_materials_arr);
  $production_raw_materials = $production_raw_materials_arr["production_raw_materials"];
  
  $raw_material_movements = fetch_raw_material_movements(["production" => $production, "production_batch" => $production_batch_data]);
  // print_arr($raw_material_movements);

  $quantities = get_production_batch_quantities_summary(["production" => $production, "production_raw_materials" => $production_raw_materials, "raw_material_lots" => $raw_material_lots, "raw_material_movements" => $raw_material_movements]);

  $vars = [];
  $vars["production_batch"] = $production_batch_data;
  $vars["production"] = $production;
  $vars["production_products"] = $production_products;
  $vars["product_ids"] = $product_ids;
  $vars["boms"] = $boms;
  $vars["products"] = $products_arr["products"];
  $vars["raw_materials"] = $raw_materials_arr["raw_materials"];
  $vars["quantities"] = $quantities;
  $vars["raw_material_lots"] = $raw_material_lots["raw_material_lots"];

  // print_arrbox($vars, 500);
  // print_arrbox($vars["quantities"], 500);
  // die;

  function bulk_header_row($vars, $rmid)
  {

    $qtymap = "";
    // $qtymap .= json_encode($vars["quantities"][$rmid]);
    if(isset($vars["quantities"][$rmid])){
      $map = $vars["quantities"][$rmid];
      if(isset($map["ordered"])){
        $qtymap .= "&nbsp; <span class='badge bg-accent2'>Ordered: ".$map["ordered"]."</span>";
      }
      if(isset($map["available"])){
        $qtymap .= "&nbsp; <span class='badge bg-accent1'>Available: ".$map["available"]."</span>";
      }
      if(isset($map["pending"])){
        $qtymap .= "&nbsp; <span class='badge bg-accent3'>Pending: ".$map["pending"]."</span>";
      }
      if(isset($map["reserve"])){
        $qtymap .= "&nbsp; <span class='badge bg-success'>Reserved: ".$map["reserve"]."</span>";
      }
      if(isset($map["unreserve"])){
        $qtymap .= "&nbsp; <span class='badge bg-warning'>Unreserved: ".$map["unreserve"]."</span>";
      }
      if(isset($map["consume"])){
        $qtymap .= "&nbsp; <span class='badge bg-info'>Consumed: ".$map["consume"]."</span>";
      }
    }

    $s = '';
    $s .= "<tr data-rmid='" . $rmid . "'>";
    $data["raw_material_name[]"] = "<h6><span>Raw material</span>: <strong>" . $vars["raw_materials"][$rmid] . "</strong> &nbsp; &nbsp; <span>Quantity:</span> <strong>" . $qtymap . "</strong></h6>";
    $s .=  '<td colspan=3>'
      . form_field(['type' => 'display', 'name' => '', 'key' => 'raw_material_name[]', 'class' => '',], $data)
      .  '</td>';
    $s .= '</tr>';

    return $s;
  }

  function bulk_insert_table_row($index, $save_column_history, $vars, $rmid, $raw_material_lot)
  {

    $s = '';
    $s .= "<tr data-index='" . $index . "'>";
    $data["raw_material[]"] = $rmid;
    $data["raw_material_lot[]"] = $raw_material_lot["id"];
    $data["raw_material_lot_info[]"] = get_module_id_prefix("raw_material_lots") . $raw_material_lot["id"] . " &nbsp; (Available: " . $raw_material_lot["available_quantity"] . ")";

    $maxqty = min([$raw_material_lot["available_quantity"], $vars["quantities"][$rmid]["pending"]]);

    $s .=  '<td>'
      .  form_field(['type' => 'hidden', 'name' => '', 'key' => 'rowindex[]', 'class' => '',], [])
      .  column_history_fields($save_column_history, [])
      . form_field(['type' => 'hidden', 'name' => 'Raw material', 'key' => 'raw_material[]', 'class' => '',], $data);
    $s .= form_field(['type' => 'number', 'name' => 'Reserve Quantity', 'key' => 'quantity[]', 'max' => $maxqty, 'required' => true, 'class' => '',], []) .  '</td>';
    $s .= '<td>'
      . form_field(['type' => 'display', 'name' => 'Raw material Lot', 'key' => 'raw_material_lot_info[]', 'class' => ''], $data)
      . form_field(['type' => 'hidden', 'name' => '', 'key' => 'raw_material_lot[]', 'class' => ''], $data)
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
                  foreach ($vars["quantities"] as $rmid => $qv) {
                    if (isset($qv["pending"]) && $qv["pending"] > 0) {
                      echo bulk_header_row($vars, $rmid);
                      if (isset($vars["raw_material_lots"][$rmid])) {
                        foreach ($vars["raw_material_lots"][$rmid] as $lk => $rmlv) {
                          $index++;
                          echo bulk_insert_table_row($index, $save_column_history, $vars, $rmid, $rmlv);
                        }
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