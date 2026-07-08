<?php
$module = "raw_material_rates";
$pageid = "raw_material_rates-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "raw_material_rates-update";
}

$load_datepicker = true;

include("../../common/header.php");
// include("raw_material_rate-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New Raw Material rate');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Raw Material rate');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "raw_material_rates";
  $primary_column = "id";

  $save_fields = [
    ["key" => "entity"],
    ["key" => "rate"],
    ["key" => "effective_date"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  $link_table_rows = [];

  $msg = [
    "success_update" => "Raw Material rate updated successfully",
    "error_update" => "Error in updating Raw Material rate",
    "success_added" => "New Raw Material rate added successfully",
    "error_added" => "Error in adding new Raw Material rate",
  ];

  $save_column_history = [
    "columns" => ["rate", "effective_date"],
  ];


  $redirect_to = "raw_material_rates";
  $url_param = "";
  // if (isset($_POST["bom"])) {
  //   $url_param = "bom=" . $_POST["bom"] . "";
  //   $redirect_to = "raw_material_rates";
  // }

  // if(isset($data["bom"]) && $data["bom"] != ""){
  //   $url_param = " bom =" . $data["bom"] . "";
  //   $redirect_to = "raw_material_rates";
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
  // if ($mode == "new" && !isset($data["bom"]) && isset($_GET["bom"]) && $_GET["bom"] != "") {
  //   $data["bom"] = $_GET["bom"];
  // }
  // print_arr($data);

  $rm_rate_arr = get_raw_material_rates_entities();
  $entities = $rm_rate_arr["entities"];
  // print_arr($entities);
  $pending_entities = $rm_rate_arr["pending"];
  // print_arr($pending_entities);
  if($mode == "update"){
    $data["entity_name"] = $entities[$data["entity"]];
  }

  $display_form = true;
    if(sizeof($pending_entities) == 0 && $mode == "new"){
      echo "All raw material rates are already added. Please edit them as needed";
      $display_form = false;
    } 
    

  ?>

  <?php if($display_form == true){ ?>
  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">

    <?php

    if($mode == "update"){
      echo form_field(["type" => "hidden", "name" => "Raw material / Rate Group", "key" => "entity", "class" => "col-md-6 col-lg-4 mb-3"], $data);
      echo form_field(["type" => "display", "name" => "Raw material / Rate Group", "key" => "entity_name", "required" => true, "options" => $entities, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    } 
    
    //
    else if($mode == "new"){
      echo form_field(['type' => 'select', 'name' => 'Raw material / Rate Group', 'key' => 'entity', 'required' => true, "options" => $pending_entities, "class" => "col-md-6 col-lg-4 mb-3"], []);
    }

    echo form_field(["type" => "number", "name" => "Rate per unit", "key" => "rate", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "date", "name" => "Effective date", "key" => "effective_date", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    echo column_history_fields($save_column_history, $data);

    ?>

  </form>
  <?php } ?>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>