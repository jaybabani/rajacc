<?php
$module = 'raw_material_rates';
$pageid = 'raw_material_rates-read';
$load_datepicker = true;
include '../../common/header.php';
// include("raw_material_rate-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr['raw_material_rates'];

  $widgettitle = 'Add new Raw Material Rates';

  widget_start($widgettitle, '', '', '', '');
  ?>

  <?php
  $tablename = 'raw_material_rates';
  $save_fields = [
    'single' => [
      // ['key' => 'bom'],
      ["key" => "auth_user", "type" => "session_user"],
      ["key" => "updated", "type" => "time"],
      ["key" => "created", "type" => "created_time"],
    ],
    'multi' => [
      ['key' => 'entity'],
      ['key' => 'rate'],
      ['key' => 'effective_date'],
      
    ],
  ];

  $single_fields = [
    // ['column' => 'bom', 'value' => $_GET["bom"] ?? ""] // get form url
  ];

  $msg = [
    "success_added" => "New Raw Material rates added successfully",
    "error_added" => "Error in adding new Raw Material rates",
    "warning_added" => "Some new Raw Material rates were added. Errors encountered in rest.",
  ];

  $save_column_history = [
    "columns" => ["rate[]", "effective_date[]"], //"rate[]", 
  ];


  // $redirect_to = "";
  $redirect_to = "raw_material_rates";
  $url_param = "";
  // if (isset($_POST["bom"])) {
  //   $url_param = "bom=" . $_POST["bom"] . "";
  //   $redirect_to = "raw_material_rates";
  // }

  $submit_result = bi_bulk_submit_form([
    'submit_data' => $_POST,
    'tablename' => $tablename,
    'save_fields' => $save_fields,
    'msg' => $msg,
    "save_column_history" => $save_column_history,
    "redirect_to" => $redirect_to,
    "url_param" => $url_param,
  ]);

  $tableid = 'raw_material_rates_table';
  $column_titles = ['Raw material / Rate Group', 'Rate per unit', 'Effective Date', 'Actions'];


  $rm_rate_arr = get_raw_material_rates_entities("pending");
  // print_arrbox($rm_rate_arr,300);
  $pending_entities = $rm_rate_arr["pending"];
  // print_arr($pending_entities);

  $display_new_rows = sizeof($pending_entities);

  // $raw_material_rates_arr = raw_material_rates_arr();

  function bulk_insert_table_row($index, $save_column_history, $pending_entities, $eid)
  {

    $data = [];
    $data["entity[]"] = $eid;
    $data["entity_display[]"] = $pending_entities[$eid];

    $s = '';
    $s .= "<tr data-index='" . $index . "'>";
    $s .= '<td>'
      .  form_field(['type' => 'hidden', 'name' => '', 'key' => 'rowindex[]', 'class' => '',], [])
      .  column_history_fields($save_column_history, [])
      .  form_field(['type' => 'hidden', 'name' => '', 'key' => 'entity[]', 'class' => '',], $data)
      .  form_field(['type' => 'display', 'name' => 'Raw Material', 'key' => 'entity_display[]', 'class' => '',], $data);
      // .  form_field(['type' => 'select', 'name' => 'Cost type', 'key' => 'entity[]', 'required' => true, "options" => $pending_entities, 'class' => ''], []);
    $s .= '</td>';
    $s .=  '<td>' . form_field(['type' => 'number', 'name' => 'Rate per unit', 'key' => 'rate[]', 'class' => '',], []) .  '</td>';
    $s .=  '<td>' . form_field(['type' => 'date', 'name' => 'Effective Date', 'key' => 'effective_date[]', 'class' => '',], []) .  '</td>';
    $s .=  '<td>' . form_field(['type' => 'delete_row', 'name' => '', 'class' => '', 'key' => 'delete-row-' . $index . '', 'index' => $index], []) .  '</td>';
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
                  $index = 0;
                  foreach ($pending_entities as $eid => $ename) {
                    $index++;
                    echo bulk_insert_table_row($index, $save_column_history, $pending_entities, $eid);
                  }

                  if($display_new_rows == 0){
                    echo "<tr><td colspan=3>All raw material rates are already saved. Please edit them.</td></tr>";
                  }

                  ?>
          </tbody>
        </table>
        <?php
        $data = [];
        // echo bi_add_new_row($tableid, bulk_insert_table_row('new', $save_column_history, $pending_entities));
        echo form_field(['type' => 'submit',  'name' => 'Save',  'key' => 'save',  'class' => 'col-md-12 col-sm-12 col-xs-12 text-center',], $data);
        ?>
  </form>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>