<?php
$module = "folders";
$pageid = "folders-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "folders-update";
}

$load_datepicker = true;

include("../../common/header.php");
// include("folder-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New Folder');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Folder');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "folders";
  $primary_column = "id";

  $save_fields = [
    ["key" => "title"],
    ["key" => "notes"],
    ["key" => "documents", "type" => "multi-file"],
    ["key" => "category"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  $link_table_rows = [
    // "table" => "folder_sector_link",
    // "single_column" => ["column" => "folder", "field" => $primary_column],
    // "multi_column" => ["column" => "sector", "field" => "sectors"],
  ];

  $msg = [
    "success_update" => "Folder updated successfully",
    "error_update" => "Error in updating folder",
    "success_added" => "New folder added successfully",
    "error_added" => "Error in adding new folder",
  ];

  $save_column_history = [
    "columns" => ["status", "payment_status"],
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

    echo form_field(["type" => "text", "name" => "Title", "required" => true, "key" => "title", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "textarea", "name" => "Notes", "key" => "notes", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select-attribute", "name" => "Category", "key" => "category", "required" => true, "attributes" => get_attributes_arr("folder_category"), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    $data["documents"] = [];
    if ($mode == 'update' && isset($id) && $id != "" && $id != NULL) {
      $documents_arr = fetch_data([
        "table" => "uploads",
        "columns" => "id, name, thumb, type, small, caption, other",
        "condition" => " table_name = '" . $tablename . "' AND row_id = '" . $id . "' AND file_type = 'document' ",
        "order" => "",
        "limit" => ""
      ]);    // print_arr($documents_arr);
      $data["documents"] = $documents_arr;
    }
    // print_arr($data);

    // print_arr(get_attributes_arr("document_type"));

    echo form_field([
      "type" => "multi-file",
      "name" => "Documents",
      "key" => "documents",
      "attributes" => get_attributes_arr("document_type"),
      "display_size" => "small",
      "class" => "col-md-6 col-lg-4 mb-3"
    ], $data);

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