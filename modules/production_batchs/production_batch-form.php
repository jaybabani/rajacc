<?php
$module = "production_batchs";
$pageid = "production_batchs-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "production_batchs-update";
}

$load_datepicker = true;

include("../../common/header.php");
// include("production_batch-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New Production Batch');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Production Batch');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "production_batchs";
  $primary_column = "id";

  $save_fields = [
    ["key" => "production"],
    ["key" => "notes"],
    ["key" => "status"],
    // ["key" => "packing_cost"],
    // ["key" => "loading_cost"],
    // ["key" => "transport_cost"],
    // ["key" => "other_cost"],
    // ["key" => "transporter_name"],
    // ["key" => "vehicle_no"],
    // ["key" => "transport_document_no"],
    // ["key" => "documents", "type" => "multi-file"],

    ["key" => "created_on_date", "type" => "date"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  $link_table_rows = [];

  $msg = [
    "success_update" => "production_batch updated successfully",
    "error_update" => "Error in updating production_batch",
    "success_added" => "New production_batch added successfully",
    "error_added" => "Error in adding new production_batch",
  ];

  $save_column_history = [
    "columns" => ["status"],
  ];

  $action_after_submit = [
    "action" => "production_batch_done",
    "condition" => [
      "type" => "change_to",
      "param" => ["key" => "status", "value" => "production_batched"]
    ]
  ];

  $submit_result = module_submit_form([
    "submit_data" => $_POST,
    "primary_column" => $primary_column,
    "tablename" => $tablename,
    "save_fields" => $save_fields,
    "messages" => $msg,
    "link_table_rows" => $link_table_rows,
    "save_column_history" => $save_column_history,
    "action_after_submit" => $action_after_submit,
  ]);


  $data = module_get_data($tablename, $id);
  // print_arr($data);
  ?>

  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">

    <?php

    $production_arr = fetch_data(["table" => "productions", "columns" => "id", "condition" => "", "order" => "id ASC", "limit" => ""]);        // print_arr($production_arr);
    $productions = [];
    foreach ($production_arr as $vk => $vv) {
      $productions[$vv["id"]] = get_module_id_prefix("productions") . $vv["id"];
    }
    // print_arr($productions);

    echo form_field(["type" => "select", "name" => "Production", "key" => "production", "required" => true, "options" => $productions, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Status", "key" => "status", "required" => true, "options" => get_production_batch_status_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "date", "name" => "Created on date", "key" => "created_on_date", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "textarea", "name" => "Notes", "key" => "notes", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // echo form_field(["type" => "number", "name" => "Packing Cost", "key" => "packing_cost", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    // echo form_field(["type" => "number", "name" => "Loading Cost", "key" => "loading_cost", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    // echo form_field(["type" => "number", "name" => "Transport Cost", "key" => "transport_cost", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    // echo form_field(["type" => "number", "name" => "Any Other Cost", "key" => "other_cost", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    // echo form_field(["type" => "text", "name" => "Transporter Name", "key" => "transporter_name", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    // echo form_field(["type" => "text", "name" => "Transporter Vehicle No.", "key" => "vehicle_no", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    // echo form_field(["type" => "text", "name" => "Transporter Document No.", "eg" => "(LR / GRN / AWB / RR)", "key" => "transport_document_no", "class" => "col-md-6 col-lg-4 mb-3"], $data);


    // $data["documents"] = [];
    // if ($mode == 'update' && isset($id) && $id != "" && $id != NULL) {
    //   $documents_arr = fetch_data([
    //     "table" => "uploads",
    //     "columns" => "id, name, thumb, type, small, caption, other",
    //     "condition" => " table_name = '" . $tablename . "' AND row_id = '" . $id . "' AND file_type = 'document' ",
    //     "order" => "",
    //     "limit" => ""
    //   ]);    // print_arr($documents_arr);
    //   $data["documents"] = $documents_arr;
    // }
    // // print_arr($data);

    // // print_arr(get_attributes_arr("document_type"));

    // // print_arr(get_attributes_arr("raw_material_category"));

    // echo form_field([
    //   "type" => "multi-file",
    //   "name" => "Documents",
    //   "key" => "documents",
    //   "attributes" => get_attributes_arr("document_type"),
    //   "display_size" => "small",
    //   "class" => "col-md-6 col-lg-4 mb-3"
    // ], $data);

    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    echo column_history_fields($save_column_history, $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>