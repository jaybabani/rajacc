<?php
$module = "user_roles";
$pageid = "user_roles-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "user_roles-update";
}
include("../../common/header.php");
// include("user_role-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New User Role');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit User Role');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "user_roles";
  $primary_column = "id";

  $save_fields = [
    ["key" => "user_role"],
    ["key" => "auth_user", "type" => "session_user"],
    ["key" => "updated", "type" => "time"]
  ];

  $link_table_rows = [
    "table" => "user_role_permission_link",
    "single_column" => ["column" => "user_role", "field" => $primary_column],
    "multi_column" => ["column" => "permission", "field" => "permissions"],
  ];

  $msg = [
    "success_update" => "User Role updated successfully",
    "error_update" => "Error in updating user role",
    "success_added" => "New user role added successfully",
    "error_added" => "Error in adding new user role",
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

    echo form_field(["type" => "text", "name" => "User Role", "key" => "user_role", "eg" => "", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // Permission Field with Table Linked rows
    $permissions_arr = acl_roles();
    // print_arr($permissions_arr);
    $data["permissions"] = [];
    $user_role_permission_link_arr = fetch_data(["table" => "user_role_permission_link", "columns" => "user_role, permission", "condition" => " user_role = '" . $id . "' ", "order" => "", "limit" => ""]);
    foreach ($user_role_permission_link_arr as $lk => $lv) {
      $data["permissions"][] = $lv["permission"];
    }
    echo form_field([
      "type" => "multi-checkbox",
      "name" => "Permissions",
      "key" => "permissions",
      "required" => true,
      "options" => $permissions_arr,
      "option_id" => "id",
      "option_label" => "permission",
      "class" => "col-md-6 col-lg-4 mb-3"
    ], $data);

    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>