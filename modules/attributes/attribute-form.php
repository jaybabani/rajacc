<?php
$module = "attributes";
$pageid = "attributes-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "attributes-update";
}
include("../../common/header.php");
include("attribute-submodule.php");
// include("attribute-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New ' . $submod["page_title"]);
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit Attribute');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "attributes";
  $primary_column = "id";

  $save_fields = [
    ["key" => "attribute"],
    // ["key" => "code"],
    ["key" => "active"],
    ["key" => "category"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"],
    ["key" => "created", "type" => "created_time"],
  ];

  $link_table_rows = [];

  $msg = [
    "success_update" => $submod["page_title"] . " updated successfully",
    "error_update" => "Error in updating " . $submod["page_title"],
    "success_added" => "New " . $submod["page_title"] . " added successfully",
    "error_added" => "Error in adding new " . $submod["page_title"],
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
  if ($mode == "new") {
    if ($submod["column_name"] != "") {
      $data[$submod["column_name"]] = $parent;
    }
  }
  // print_arr($data);
  ?>

  <form class="row g-3 needs-validation" novalidate method="POST">
    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="<?php echo $primary_column; ?>" value="<?php echo $id; ?>">

    <?php

    echo form_field(["type" => "text", "name" => $submod["column_title"], "key" => "attribute", "eg" => "INFY_NSE", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    // echo form_field(["type" => "text", "name" => "Code", "key" => "code", "restrict" => "lowercase|_", "eg" => "Only lowercase & _ allowed", "class" => "col-md-6 col-lg-4 mb-3"], $data);

    echo ($parent == "default") ?
      form_field([
        "type" => "select",
        "name" => "Category",
        "key" => "category",
        "required" => true,
        "options" => get_attribute_category_arr(),
        "class" => "col-md-6 col-lg-4 mb-3",
      ], $data) :
      form_field([
        "type" => "hidden",
        "name" => "Category",
        "key" => "category",
        "required" => true,
        "class" => "col-md-6 col-lg-4 mb-3"
      ], $data);
    echo form_field(["type" => "select", "name" => "Active", "key" => "active", "required" => true, "options" => get_active_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>