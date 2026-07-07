<?php
$module = "bom_items";
$pageid = "bom_items-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "bom_items-update";
}

// $load_datepicker = true;

include("../../common/header.php");
// include("bom_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New BOM item');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit BOM item');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "bom_items";
  $primary_column = "id";

  $save_fields = [
    ["key" => "raw_material"],
    // ["key" => "rate"],
    ["key" => "quantity"],
    ["key" => "wastage_quantity"],
    ["key" => "bom"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  $link_table_rows = [];

  $msg = [
    "success_update" => "BOM item updated successfully",
    "error_update" => "Error in updating BOM item",
    "success_added" => "New BOM item added successfully",
    "error_added" => "Error in adding new BOM item",
  ];

  $save_column_history = [
    "columns" => ["quantity", "wastage_quantity"], //"rate", 
  ];


  $redirect_to = "";
  $url_param = "";
  if (isset($_POST["bom"])) {
    $url_param = "bom=" . $_POST["bom"] . "";
    $redirect_to = "bom_items";
  }

  // if(isset($data["bom"]) && $data["bom"] != ""){
  //   $url_param = " bom =" . $data["bom"] . "";
  //   $redirect_to = "bom_items";
  // }

  $submit_result = module_submit_form([
    "submit_data" => $_POST,
    "primary_column" => $primary_column,
    "tablename" => $tablename,
    "save_fields" => $save_fields,
    "messages" => $msg,
    "link_table_rows" => $link_table_rows,
    "save_column_history" => $save_column_history,
    "redirect_to" => $redirect_to,
    "url_param" => $url_param,
  ]);

  $data = module_get_data($tablename, $id);
  if ($mode == "new" && !isset($data["bom"]) && isset($_GET["bom"]) && $_GET["bom"] != "") {
    $data["bom"] = $_GET["bom"];
  }
  // print_arr($data);

  ?>

  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">
    <input type="hidden" name="bom" value="<?php echo get_value($data, 'bom'); ?>">

    <?php

    $raw_material_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material, unit", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);        // print_arr($raw_material_arr);
    $raw_materials = [];
    // $units = [];
    foreach ($raw_material_arr as $vk => $vv) {
      $raw_materials[$vv["id"]] = $vv["raw_material"]." (".$vv["unit"].")";
      // $units[$vv["id"]] = $vv["unit"];
    }
    // print_arr($raw_materials);

    // $purchase_arr = fetch_data(["table" => "purchases", "columns" => "id, title", "condition" => "", "order" => "created DESC", "limit" => ""]);        // print_arr($vendor_arr);
    // $purchases = [];
    // foreach ($purchase_arr as $vk => $vv) {
    //   $purchases[$vv["id"]] = $vv["title"];
    // }
    // print_arr($purchases);

    echo form_field(["type" => "select", "name" => "Raw Material", "key" => "raw_material", "required" => true, "options" => $raw_materials, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    // echo form_field(["type" => "number", "name" => "Rate", "key" => "rate", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Quantity", "key" => "quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Wastage Quantity", "key" => "wastage_quantity", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // echo form_field(["type" => "select", "name" => "Purchase Details", "key" => "purchase", "options" => $purchases, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    // echo form_field(["type" => "select", "name" => "Status", "key" => "status", "required" => true, "options" => get_bom_item_status_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    echo column_history_fields($save_column_history, $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>