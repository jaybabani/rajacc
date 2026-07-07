<?php
$module = 'bom_items';
$pageid = 'bom_items-read';
include '../../common/header.php';
// include("bom_item-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr['bom_items'];

  $widgettitle = 'Add new BOM items';

  widget_start($widgettitle, '', '', '', '');
  ?>

  <?php
  $tablename = 'bom_items';
  $display_new_rows = 3;
  $save_fields = [
    'single' => [
      ['key' => 'bom'],
      ["key" => "auth_user", "type" => "session_user"],
      ["key" => "updated", "type" => "time"],
      ["key" => "created", "type" => "created_time"],
    ],
    'multi' => [
      ['key' => 'raw_material'],
      ['key' => 'quantity'],
      ['key' => 'wastage_quantity'],
      // ['key' => 'rate']
    ],
  ];

  $single_fields = [
    ['column' => 'bom', 'value' => $_GET["bom"] ?? ""] // get form url
  ];

  $msg = [
    "success_added" => "New BOM items added successfully",
    "error_added" => "Error in adding new BOM items",
    "warning_added" => "Some new BOM items were added. Errors encountered in rest.",
  ];

  $save_column_history = [
    "columns" => ["quantity[]", "wastage_quantity[]", ], //"rate[]", 
  ];


  $redirect_to = "";
  $url_param = "";
  if (isset($_POST["bom"])) {
    $url_param = "bom=" . $_POST["bom"] . "";
    $redirect_to = "bom_items";
  }

  $submit_result = bi_bulk_submit_form([
    'submit_data' => $_POST,
    'tablename' => $tablename,
    'save_fields' => $save_fields,
    'msg' => $msg,
    "save_column_history" => $save_column_history,
    "redirect_to" => $redirect_to,
    "url_param" => $url_param,
  ]);

  $tableid = 'bom_items_table';
  $column_titles = ['Raw Material', 'Quantity', 'Actions']; //'Rate / unit', 

  function bulk_insert_table_row($index, $save_column_history)
  {

    $raw_material_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);        // print_arr($raw_material_arr);
    $raw_materials = [];
    foreach ($raw_material_arr as $vk => $vv) {
      $raw_materials[$vv["id"]] = $vv["raw_material"];
    }
    // print_arr($raw_materials); 


    $s = '';
    $s .= "<tr data-index='" . $index . "'>";
    $s .= '<td>'
      .  form_field(['type' => 'hidden', 'name' => '', 'key' => 'rowindex[]', 'class' => '',], [])
      .  column_history_fields($save_column_history, [])
      .  form_field(['type' => 'select', 'name' => 'Raw Material', 'key' => 'raw_material[]', 'required' => true, "options" => $raw_materials, 'class' => ''], []);
    $s .= '</td>';
    $s .=  '<td>' . form_field(['type' => 'number', 'name' => 'Quantity', 'key' => 'quantity[]', 'required' => true, 'class' => '',], []) .  '</td>';
    $s .=  '<td>' . form_field(['type' => 'number', 'name' => 'Wastage Quantity', 'key' => 'wastage_quantity[]', 'required' => true, 'class' => '',], []) .  '</td>';
    // $s .=  '<td>' . form_field(['type' => 'number', 'name' => 'Rate', 'key' => 'rate[]', 'required' => true, 'class' => '',], []) .  '</td>';
    $s .=  '<td>' . form_field(['type' => 'delete_row', 'name' => '', 'class' => '', 'key' => 'delete-row-'.$index.'', 'index' => $index], []) .  '</td>';
    $s .= '</tr>';



    return $s;
  }

  ?>
  <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
    <?php echo bi_single_inputs($single_fields); ?>
    <div class='widget-table'>
      <div class='table-responsive'>
        <table class='table' id='<?php echo $tableid; ?>'>
          <thead>
            <tr> <?php foreach ($column_titles as $ctk => $ctv) {
                    echo '<th>' . $ctv . '</th>';
                  }
                  ?>
            </tr>
          </thead>
          <tbody> <?php
                  for ($index = 1; $index <= $display_new_rows; $index++) {
                    echo bulk_insert_table_row($index, $save_column_history);
                  }
                  ?>
          </tbody>
        </table>
        <?php
        $data = [];
        echo bi_add_new_row($tableid, bulk_insert_table_row('new', $save_column_history));
        echo form_field(['type' => 'submit',  'name' => 'Save',  'key' => 'save',  'class' => 'col-md-12 col-sm-12 col-xs-12 text-center',], $data);
        ?>
  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>