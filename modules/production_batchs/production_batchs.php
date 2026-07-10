<?php
$module = 'production_batchs';
$pageid = 'production_batchs-read';
include '../../common/header.php';

// include("production_batch-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">

  <?php
  $module_arr = get_module_pages_arr();
  $module_pages = $module_arr['production_batchs'];

  $pagetitle = T('All Production Batches');
  $actions_html = '';
  $actions_html .= download_xlsx($module_pages['read']);
  $actions_html .= pagination($module_pages['read'] . '.php');
  widget_start($pagetitle, '', '', '', $actions_html);
  ?>

  <?php
  $tablename = 'production_batchs';

  $primary_column = 'id';

  $display_columns = [
    ['name' => '', 'column' => '', 'type' => 'details', 'sorting' => false, 'search' => false, 'class' => 'text-center nowrap',],
    // ['name' => 'Select', 'column' => '', 'type' => 'select', 'sorting' => false, 'search' => false, 'class' => 'text-center',],
    ['name' => 'ID', 'column' => 'id', 'class' => 'text-center nowrap', 'id_prefix' => $module_pages['id_prefix'],],
    ['name' => 'Production', 'column' => 'production', 'class' => 'text-center nowrap', 'id_prefix' => get_module_id_prefix("orders")],
    ["name" => "Created on date", "column" => "created_on_date", "format" => "date", "class" => "nowrap"],
    ["name" => "Status", "column" => "status", "options" => get_production_batch_status_arr(), "badge" => true],
    // ["name" => "Payment Status", "column" => "payment_status", "options" => get_production_batch_payment_status_arr(), "badge" => true],
    [
      "name" => "Production Batch Items",
      "column" => "",
      "type" => "link",
      "sorting" => false,
      "search" => false,
      "class" => "nowrap",
      "links" => [
        ["text" => "View Production Batch Items", "url" => ROOT_PATH . "/modules/production_batch_items/production_batch_items.php?production_batch={id}", "acl" => "production_batch_items-read"],
        [
          "text" => "Add Production Batch Items",
          "url" => ROOT_PATH . "/modules/production_batch_items/production_batch_item-bulkform.php?production_batch={id}",
          "acl" => "production_batch_items-create",
          "row_condition" => [
            "type" => "AND",
            "checks" => [
              [
                "column" => "status",
                "is" => "not_in_array",
                "value" => ["invoice_generated", "production_batched"]
              ]
            ]
          ]
        ]
      ]
    ],
    [
      "name" => "Actions",
      "column" => "",
      "type" => "edit",
      "sorting" => false,
      "search" => false,
      "class" => "nowrap",
      "acl" => ["edit" => "production_batchs-update"],
      "links" => [
        ["text" => "Inventory Movement", "icon" => "clipboard", "url" => ROOT_PATH . "/modules/raw_material_movements/raw_material_movements.php?production_batch={id}", "acl" => "raw_material_movements-read", "class" => "prod-move-link"],
      ]
    ],
  ];

  $fetch_columns = [];

  $detail_columns = [
    ['name' => 'Notes', 'column' => 'notes'],

    // ["name" => "Packing Cost", "column" => "packing_cost"],
    // ["name" => "Loading Cost", "column" => "loading_cost"],
    // ["name" => "Any Other Cost", "column" => "other_cost"],
    // ["name" => "Transport Cost", "column" => "transport_cost"],
    // ["name" => "Transporter Name", "column" => "transporter_name"],
    // ["name" => "Transporter Vehicle No.", "column" => "vehicle_no"],
    // ["name" => "Transporter Document No.", "column" => "transport_document_no"],
    // ["name" => "Documents", "type" => "multi-file", "attributes" => get_attributes_arr("document_type"),],

    // ["name" => "Purchase Details", "column" => "purchase", "options" => $purchases_arr, "type" => "table_id", "option_id" => "id", "option_label" => "title", "module" => "purchases"],['name' => 'Last update', 'type' => 'last_update_info'],['name' => 'History','type' => 'history','history_columns' => [  [    'name' => 'Status',    'column' => 'status',    'options' => get_production_batch_status_arr(),    'badge' => true,  ],  [    'name' => 'Payment Status',    'column' => 'payment_status',    'options' => get_production_batch_payment_status_arr(),    'badge' => true,  ],  // ["name" => "Quantity", "column" => "quantity"]],],
    ["name" => "Last update", "type" => "last_update_info"],
    [
      "name" => "History",
      "type" => "history",
      "history_columns" => [
        ["name" => "Status", "column" => "status", "options" => get_production_batch_status_arr(), "badge" => true],
        // ["name" => "Payment Status", "column" => "payment_status", "options" => get_production_batch_payment_status_arr(), "badge" => true],
        // ["name" => "Quantity", "column" => "quantity"]
      ],
    ]
  ];

  $table_html = crud_read([
    'module_pages' => $module_pages,
    'tablename' => $tablename,
    'primary_column' => $primary_column,
    'display_columns' => $display_columns,
    'fetch_columns' => $fetch_columns,
    'detail_columns' => $detail_columns,
    'datatable' => true,
    'pagination' => true,
    'pagelimit' => 100,
    'query' => '',
    'production_batchby' => 'id DESC',
  ]);

  $load_datatable = true;

  echo $table_html;
  ?>

  <?php widget_end(); ?>

</div>

<?php include '../../common/footer.php'; ?>