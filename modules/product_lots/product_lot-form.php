<?php
$module = "product_lots";
$pageid = "product_lots-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "product_lots-update";
}

$load_datepicker = true;

include("../../common/header.php");
// include("product_lot-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $source = "produced";
  $titletag = T('Add New product Lot (produced internally)');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit product Lot');
    $id = $_GET['id'];
  }
  if (isset($_GET['source']) && trim($_GET['source']) == 'purchased') {
    $titletag = T('Add New product Lot (purchased)');
    $source = "purchased";
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "product_lots";
  $primary_column = "id";

  $data = module_get_data($tablename, $id);

  if ($mode == "update" && isset($data["source"]) && $data["source"] != "") {
    $source = $data["source"];
  }
  if ($mode == "new" && !isset($data["source"])) {
    $data["source"] = $source;
  }
  // print_arr($data);

  $save_fields = [
    ["key" => "product"],
    ["key" => "quantity"],
    ["key" => "source"],
    ["key" => "notes"],
    ["key" => "status"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"]
  ];
  if ($source == "purchased") {
    $save_fields = array_merge($save_fields, [
      ["key" => "vendor"],
      ["key" => "buy_price"],
      ["key" => "buy_date", "type" => "date"],
      ["key" => "purchase_invoice", "type" => "image"],
    ]);
  }
  // print_arr($save_fields);
  // die;

  $link_table_rows = [
    // "table" => "product_lot_sector_link",
    // "single_column" => ["column" => "product_lot", "field" => $primary_column],
    // "multi_column" => ["column" => "sector", "field" => "sectors"],
  ];

  $msg = [
    "success_update" => "Product Lot updated successfully",
    "error_update" => "Error in updating product_lot",
    "success_added" => "New product lot added successfully",
    "error_added" => "Error in adding new product lot",
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


  // print_arr($_SESSION);
  ?>

  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">

    <?php

    if ($source == "purchased") {
      $vendor_arr = fetch_data(["table" => "vendors", "columns" => "id, firm_name", "condition" => " active = 'yes' ", "order" => "firm_name ASC", "limit" => ""]);        // print_arr($vendor_arr);
      $vendors = [];
      foreach ($vendor_arr as $vk => $vv) {
        $vendors[$vv["id"]] = $vv["firm_name"];
      }
      // print_arr($vendors);
    }

    $product_arr = fetch_data(["table" => "products", "columns" => "id, product", "condition" => "", "order" => "product ASC", "limit" => ""]);        // print_arr($product_arr);
    $products = [];
    foreach ($product_arr as $vk => $vv) {
      $products[$vv["id"]] = $vv["product"];
    }
    // print_arr($vendors); 

    echo form_field(["type" => "select", "name" => "Product", "key" => "product", "required" => true, "options" => $products, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Quantity", "key" => "quantity", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "hidden", "name" => "Source", "key" => "source", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    if ($source == "purchased") {
      echo form_field([
        "type" => "number",
        "name" => "Buy Price",
        "key" => "buy_price",
        "required" => true,
        "class" => "col-md-6 col-lg-4 mb-3",
        // "parent_field" => ["column" => "source", "value" => "purchased", "default" => "hide"]
      ], $data);
      echo form_field(["type" => "date", "name" => "Buy Date", "key" => "buy_date", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
      echo form_field(["type" => "select", "name" => "Purchased from Vendor", "key" => "vendor", "options" => $vendors, "class" => "col-md-6 col-lg-4 mb-3"], $data);
      // Image upload field
      if (isset($data["purchase_invoice"]) && $data["purchase_invoice"] != NULL && $data["purchase_invoice"] != "") {
        $image_arr = fetch_data(["table" => "uploads", "columns" => "id, name, thumb, type, small", "condition" => " id = '" . $data["purchase_invoice"] . "' ", "order" => "", "limit" => ""]);    // print_arr($image_arr);
        $data["purchase_invoice"] = $image_arr;
        // print_arr($data);
      }
      echo form_field(["type" => "image-file", "name" => "Purchase Invoice", "key" => "purchase_invoice", "display_size" => "small", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    }

    echo form_field(["type" => "select", "name" => "Status", "key" => "status", "required" => true, "options" => get_product_lot_status_arr($source), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo form_field(["type" => "textarea", "name" => "Notes", "key" => "notes", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    echo column_history_fields($save_column_history, $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php
// $other_scripts = '<link rel="stylesheet" href="'. ROOT_PATH.'/assets/plugins/flatpickr/flatpickr.min.css">
// <script src="'. ROOT_PATH.'/assets/plugins/flatpickr/flatpickr.js"></script><script>flatpickr("#datepicker", {}); </script>';
?>
<?php include '../../common/footer.php'; ?>