<?php
$module = "raw_material_lots";
$pageid = "raw_material_lots-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "raw_material_lots-update";
}

$load_datepicker = true;

include("../../common/header.php");
// include("raw_material_lot-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New Raw Material Lot');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Raw Material Lot');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "raw_material_lots";
  $primary_column = "id";

  $save_fields = [
    ["key" => "raw_material"],
    ["key" => "quantity"],
    ["key" => "notes"],
    ["key" => "vendor"],
    ["key" => "status"],
    ["key" => "buy_price"],
    ["key" => "buy_date", "type" => "date"],
    ["key" => "purchase_invoice", "type" => "image"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  $link_table_rows = [
    // "table" => "raw_material_lot_sector_link",
    // "single_column" => ["column" => "raw_material_lot", "field" => $primary_column],
    // "multi_column" => ["column" => "sector", "field" => "sectors"],
  ];

  $msg = [
    "success_update" => "Raw Material Lot updated successfully",
    "error_update" => "Error in updating raw_material_lot",
    "success_added" => "New raw_material_lot added successfully",
    "error_added" => "Error in adding new raw_material_lot",
  ];

  $save_column_history = [
    "columns" => ["status"],
  ];

  $submit_result = module_submit_form([
    "submit_data" => $_POST,
    "primary_column" => $primary_column,
    "tablename" => $tablename,
    "save_fields" => $save_fields,
    "messages" => $msg,
    "link_table_rows" => $link_table_rows,
    "save_column_history" => $save_column_history,
  ]);


  $data = module_get_data($tablename, $id);
  // print_arr($data);
  // print_arr($_SESSION);
  ?>

  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">

    <?php

    $vendor_arr = fetch_data(["table" => "vendors", "columns" => "id, firm_name", "condition" => " active = 'yes' ", "order" => "firm_name ASC", "limit" => ""]);        // print_arr($vendor_arr);
    $vendors = [];
    foreach ($vendor_arr as $vk => $vv) {
      $vendors[$vv["id"]] = $vv["firm_name"];
    }
    // print_arr($vendors);

    $raw_material_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);        // print_arr($raw_material_arr);
    $raw_materials = [];
    foreach ($raw_material_arr as $vk => $vv) {
      $raw_materials[$vv["id"]] = $vv["raw_material"];
    }
    // print_arr($vendors);

    echo form_field(["type" => "select", "name" => "Raw Material", "key" => "raw_material", "required" => true, "options" => $raw_materials, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Quantity", "key" => "quantity", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Buy Price", "key" => "buy_price", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "date", "name" => "Buy Date", "key" => "buy_date", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "textarea", "name" => "Notes", "key" => "notes", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Purchased from Vendor", "key" => "vendor", "options" => $vendors, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Status", "key" => "status", "required" => true, "options" => get_raw_material_lot_status_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // Image upload field
    if (isset($data["purchase_invoice"]) && $data["purchase_invoice"] != NULL && $data["purchase_invoice"] != "") {
      $image_arr = fetch_data(["table" => "uploads", "columns" => "id, name, thumb, type, small", "condition" => " id = '" . $data["purchase_invoice"] . "' ", "order" => "", "limit" => ""]);    // print_arr($image_arr);
      $data["purchase_invoice"] = $image_arr;
      // print_arr($data);
    }
    echo form_field(["type" => "image-file", "name" => "Purchase Invoice", "key" => "purchase_invoice", "display_size" => "small", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    echo column_history_fields($save_column_history,$data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php
// $other_scripts = '<link rel="stylesheet" href="'. ROOT_PATH.'/assets/plugins/flatpickr/flatpickr.min.css">
// <script src="'. ROOT_PATH.'/assets/plugins/flatpickr/flatpickr.js"></script><script>flatpickr("#datepicker", {}); </script>';
?>
<?php include '../../common/footer.php'; ?>