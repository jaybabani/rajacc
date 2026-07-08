<?php
$module = "user_roles";
$pageid = "user_roles-read";
include("../../common/header.php");
// include("user_role-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr["user_roles"];

  $pagetitle = T("User Roles");
  $actions_html = "";
  $actions_html .= download_xlsx($module_pages["read"]);
  $actions_html .= pagination($module_pages["read"] . ".php");
  widget_start($pagetitle, "", "", "", $actions_html); ?>

  <?php

  $tablename = "user_roles";

  $primary_column = "id";

  // $tags_arr = fetch_data(["table" => "tags", "columns" => "id, tag", "condition" => "", "order" => "tag ASC", "limit" => ""]);    // print_arr($tags_arr);
  // print_arr($tags_arr);

  $permissions_arr = acl_roles();
  // $data["permissions"] = [];
  $user_role_permission_link_arr = fetch_data(["table" => "user_role_permission_link", "columns" => "user_role, permission", "condition" => "", "order" => "", "limit" => ""]);
  $links = [];
  foreach ($user_role_permission_link_arr as $lk => $lv) {
    $links[$lv["user_role"]][] = $lv["permission"];
  }
  // print_arr($permissions_arr);
  // print_arr($links);

  $display_columns = [
    ["name" => "", "column" => "", "type" => "details", "sorting" => false, "search" => false, "class" => "text-center nowrap"],
    //["name" => "Select", "column" => "", "type" => "select", "sorting" => false, "search" => false, "class" => "text-center"],
    ["name" => "ID", "column" => "id", "class" => "text-center nowrap", "id_prefix" => $module_pages["id_prefix"]],
    ["name" => "User Role", "column" => "user_role", "class" => "title nowrap"],
    ["name" => "Permissions", "column" => "", "options" => $permissions_arr, "type" => "link_table_rows", "links" => $links, "option_id" => "id", "option_label" => "permission", "sorting" => false],
    ["name" => "Updated", "column" => "updated", "format" => "ts_to_dt", "class" => "nowrap"],
    ["name" => "Actions", "column" => "", "type" => "edit_delete", "sorting" => false, "search" => false, "class" => "nowrap", "acl" => ["edit" => "user_roles-update", "delete" => "user_roles-delete"]],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ["name" => "Last update", "type" => "last_update_info"],
  ];

  $table_html = crud_read(
    [
      "module_pages" => $module_pages,
      "tablename" => $tablename,
      "primary_column" => $primary_column,
      "display_columns" => $display_columns,
      "fetch_columns" => $fetch_columns,
      "detail_columns" => $detail_columns,
      "datatable" => true,
      "pagination" => true,
      "pagelimit" => 100,
      "orderby" => "id DESC"
    ]
  );

  $load_datatable = true;

  echo $table_html;

  ?>

  <?php widget_end(); ?>

</div>

<?php include("../../common/footer.php"); ?>