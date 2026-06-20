<?php
$module = "users";
$pageid = "users-create";
if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
  $pageid = "users-update";
}
include("../../common/header.php");
// include("user-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php

  $id = '';
  $mode = "new";
  $titletag = T('Add New User');
  if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != '') {
    $mode = 'update';
    $titletag = T('Edit User');
    $id = $_GET['id'];
  }

  widget_start($titletag);
  ?>
  <?php

  $tablename = "users";
  $primary_column = "id";

  $save_fields = [
    ["key" => "name"],
    ["key" => "email"],
    ["key" => "active"],
    ["key" => "user_roles", "type" => "implode", "sep" => ","],
    ["key" => "updated", "type" => "time"]
  ];

  $link_table_rows = [
    // "table" => "user_sector_link",
    // "single_column" => ["column" => "user", "field" => $primary_column],
    // "multi_column" => ["column" => "sector", "field" => "sectors"],
  ];

  $msg = [
    "success_update" => "User updated successfully",
    "error_update" => "Error in updating user",
    "success_added" => "New user added successfully",
    "error_added" => "Error in adding new user",
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

    echo form_field(["type" => "text", "name" => "Name", "key" => "name", "required" => true, "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "text", "name" => "Email", "key" => "email", "class" => "col-md-6 col-lg-4 mb-3"], $data);
    echo form_field(["type" => "select", "name" => "Active", "key" => "active", "required" => true, "options" => get_active_arr(), "class" => "col-md-6 col-lg-4 mb-3"], $data);

    // user roles field with implode string in same same table
    $user_roles_arr = fetch_data(["table" => "user_roles", "columns" => "id, user_role", "condition" => "", "order" => "user_role ASC", "limit" => ""]);    // print_arr($user_roles_arr);
    $data["user_roles"] = (isset($data["user_roles"]) && $data["user_roles"] != NULL) ? explode(",", $data["user_roles"]) : [];
    echo form_field([
      "type" => "multi-checkbox",
      "name" => "User Roles",
      "key" => "user_roles",
      "required" => true,
      "options" => $user_roles_arr,
      "option_id" => "id",
      "option_label" => "user_role",
      "class" => "col-md-6 col-lg-4 mb-3"
    ], $data);

    // Sector Field with Table Linked rows
    // $sectors_arr = fetch_data(["table" => "sectors", "columns" => "id, sector", "condition" => "", "order" => "sector ASC", "limit" => ""]);    // print_arr($sectors_arr);
    // $data["sectors"] = [];
    // $user_sector_link_arr = fetch_data(["table" => "user_sector_link", "columns" => "user, sector", "condition" => " user = '" . $id . "' ", "order" => "", "limit" => ""]);
    // foreach ($user_sector_link_arr as $lk => $lv) {
    //   $data["sectors"][] = $lv["sector"];
    // }
    // echo form_field([
    //   "type" => "multi-checkbox",
    //   "name" => "Sectors",
    //   "key" => "sectors",
    //   "required" => true,
    //   "options" => $sectors_arr,
    //   "option_id" => "id",
    //   "option_label" => "sector",
    //   "class" => "col-md-6 col-lg-4 mb-3"
    // ], $data);


    echo form_field(["type" => "submit", "name" => "Save", "key" => "save", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);

    ?>

  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>