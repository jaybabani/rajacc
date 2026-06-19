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

  $submit_fields = [
    ["key" => "symbol"],
    ["key" => "exchange"],
    ["key" => "active"],
    ["key" => "updated", "type" => "time"]
  ];

  $msg = [
    "success_update" => "Symbol updated successfully",
    "error_update" => "Error in updating symbol",
    "success_added" => "New symbol added successfully",
    "error_added" => "Error in adding new symbol",
  ];

  $submit_result = module_submit_form(["submit_data" => $_POST, "tablename" => $tablename, "submit_fields" => $submit_fields, "messages" => $msg]);

  $data = module_get_data($tablename, $id);
  // print_arr($data);
  ?>

  <form class="row g-3 needs-validation" novalidate method="POST">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <?php

    echo form_field(["type" => "text", "name" => "Symbol", "key" => "symbol", "eg" => "INFY_NSE", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "Exchange", "key" => "exchange", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Active", "key" => "active", "required" => true, "options" => get_active_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>