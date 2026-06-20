<?php
$module = "symbols";
$pageid = "symbols-form";
include("../../common/header.php");
// include("symbol-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New Symbol');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Symbol');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "symbols";
  $primary_column = "id";

  $save_fields = [
    ["key" => "symbol"],
    ["key" => "exchange"],
    ["key" => "active"],
    ["key" => "tags", "type" => "implode", "sep" => ","],
    ["key" => "updated", "type" => "time"]
  ];

  $link_table_rows = [
      "table" => "symbol_sector_link",
      "single_column" => ["column" => "symbol", "field" => $primary_column],
      "multi_column" => ["column" => "sector", "field" => "sectors"],
  ];

  $msg = [
    "success_update" => "Symbol updated successfully",
    "error_update" => "Error in updating symbol",
    "success_added" => "New symbol added successfully",
    "error_added" => "Error in adding new symbol",
  ];

  $submit_result = module_submit_form([
    "submit_data" => $_POST,
    "primary_column" => $primary_column,
    "tablename" => $tablename,
    "save_fields" => $save_fields,
    "messages" => $msg,
    "link_table_rows" => $link_table_rows
  ]);

  $data = module_get_data($tablename, $id);
  // print_arr($data);
  ?>

  <form class="row g-3 needs-validation" novalidate method="POST">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">

    <?php

    echo form_field(["type" => "text", "name" => "Symbol", "key" => "symbol", "eg" => "INFY_NSE", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "Exchange", "key" => "exchange", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Active", "key" => "active", "required" => true, "options" => get_active_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // tag field with implode string in same same table
    $tags_arr = fetch_data(["table" => "tags", "columns" => "id, tag", "condition" => "", "order" => "tag ASC", "limit" => ""]);    // print_arr($tags_arr);
    $data["tags"] = $data["tags"] != NULL ? explode(",", $data["tags"]) : [];
    echo form_field([
      "type" => "multi-checkbox",
      "name" => "Tags",
      "key" => "tags",
      "required" => true,
      "options" => $tags_arr,
      "option_id" => "id",
      "option_label" => "tag",
      "class" => "col-md-6 col-lg-4 mb-3"
    ], $data);


    // Sector Field with Table Linked rows
    $sectors_arr = fetch_data(["table" => "sectors", "columns" => "id, sector", "condition" => "", "order" => "sector ASC", "limit" => ""]);    // print_arr($sectors_arr);
    $data["sectors"] = [];
    $symbol_sector_link_arr = fetch_data(["table" => "symbol_sector_link", "columns" => "symbol, sector", "condition" => " symbol = '".$id."' ", "order" => "", "limit" => ""]);
    foreach ($symbol_sector_link_arr as $lk => $lv) {
      $data["sectors"][] = $lv["sector"];
    }
    echo form_field([
      "type" => "multi-checkbox",
      "name" => "Sectors",
      "key" => "sectors",
      "required" => true,
      "options" => $sectors_arr,
      "option_id" => "id",
      "option_label" => "sector",
      "class" => "col-md-6 col-lg-4 mb-3"
    ], $data);






    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>