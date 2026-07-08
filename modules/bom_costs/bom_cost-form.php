<?php
$module = "bom_costs";
$pageid = "bom_costs-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "bom_costs-update";
}

// $load_datepicker = true;

include("../../common/header.php");
// include("bom_cost-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New BOM cost');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit BOM cost');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "bom_costs";
  $primary_column = "id";

  $save_fields = [
    ["key" => "cost_type"],
    // ["key" => "rate"],
    ["key" => "amount"],
    ["key" => "bom"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  $link_table_rows = [];

  $msg = [
    "success_update" => "BOM cost updated successfully",
    "error_update" => "Error in updating BOM cost",
    "success_added" => "New BOM cost added successfully",
    "error_added" => "Error in adding new BOM cost",
  ];

  $save_column_history = [
    "columns" => ["amount"],
  ];


  $redirect_to = "";
  $url_param = "";
  if (isset($_POST["bom"])) {
    $url_param = "bom=" . $_POST["bom"] . "";
    $redirect_to = "bom_costs";
  }

  // if(isset($data["bom"]) && $data["bom"] != ""){
  //   $url_param = " bom =" . $data["bom"] . "";
  //   $redirect_to = "bom_costs";
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

    echo form_field(["type" => "select", "name" => "Cost type", "key" => "cost_type", "required" => true, "options" => bom_cost_type_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "number", "name" => "Cost Amount", "key" => "amount", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    echo column_history_fields($save_column_history, $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>