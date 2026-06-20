<?php
$module = "users";
$pageid = "users-read";
include("../../common/header.php");
// include("user-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_pages = [
    "read" => "users",
    "update" => "user-form",
    "create" => "user-form",
    "delete" => "user-delete"
  ];

  $pagetitle = T("Users");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "users";

  $primary_column = "id";

  $user_roles_arr = fetch_data(["table" => "user_roles", "columns" => "id, user_role", "condition" => "", "order" => "user_role ASC", "limit" => ""]);    // print_arr($user_roles_arr);
  // print_arr($user_roles_arr);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    ["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center"],
    ["name" => "Name", "column" => "name", "class" => "title nowrap"],
    ["name" => "Email", "column" => "email"],
    ["name" => "Active", "column" => "active", "options" => get_active_arr(), "badge" => true],
    ["name" => "User roles", "column" => "user_roles", "options" => $user_roles_arr, "type" => "implode", "sep" => ",", "option_id" => "id", "option_label" => "user_role", "sorting" => false],
    // ["name" => "Sectors", "column" => "", "options" => $sectors_arr, "type" => "link_table_rows", "links" => $links, "option_id" => "id", "option_label" => "sector", "sorting" => false],
    ["name" => "Updated", "column" => "updated", "format" => "ts_to_dt", "class" => "nowrap"],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "users-update", "delete" => "users-delete"]],
  ];

  $fetch_columns = [];

  $table_html = crud_read(
    [
      "module_pages" => $module_pages,
      "tablename" => $tablename,
      "primary_column" => $primary_column,
      "display_columns" => $display_columns,
      "fetch_columns" => $fetch_columns,
      "datatable" => true,
      "pagination" => true,
      "pagelimit" => 100,
      "query" => " usertype != 'admin' ",
      "orderby" => "id DESC"
    ]
  );

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>