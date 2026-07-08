<?php
$module = "raw_material_rates";
$pageid = "raw_material_rates-delete";
include '../../common/header.php';
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
    <?php
    $id = '';
    if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != "") {
        $id = $_GET['id'];
    }

    $titletag = "Delete Raw Material rate";

    $tablename = "raw_material_rates";

    $msg = [
        "success_delete" => "Raw Material rate deleted successfully",
        "error_delete" => "Error in deleting Raw Material rate",
    ];

    $primary_column = "id";

    $url_param = "";
    // if (isset($_POST["bom"])) {
    //     $url_param = "bom=" . $_POST["bom"] . "";
    // }

    $submit_result = module_submit_delete_form([
        "submit_data" => $_POST,
        "tablename" => $tablename,
        "messages" => $msg,
        "primary_column" => $primary_column,
        "redirect_to" => "raw_material_rates",
        "url_param" => $url_param,
    ]);

    $data = module_get_data($tablename, $id);
    // print_arr($data);

    widget_start($titletag);

    $rm_rate_arr = get_raw_material_rates_entities("pending");
    // print_arrbox($rm_rate_arr,300);
    $entities = $rm_rate_arr["entities"];
    // print_arr($entities);


    ?>

    <form action="raw_material_rate-delete.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="mode" value="<?php echo get_value($data, 'mode'); ?>">
        <input type="hidden" name="id" value="<?php echo get_value($data, 'id'); ?>">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-9 col-sm-10 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="field-4">Are You sure you want to delete Raw Material rate?
                            <?php echo "<br>ID: <strong>" . get_module_id_prefix("raw_material_rates") . get_value($data, 'id') . "</strong>";
                            $entity = get_value($data, 'entity');
                            // $entity_arr = raw_material_rate_type_arr();
                            // if(isset($entity_arr[$entity])){
                            //     $entity = $entity_arr[$entity];
                            // }
                            echo "<br>Raw material: <strong>" . (isset($entities[$entity]) ? $entities[$entity] :  $entity) . "</strong>";
                            echo "<br>Rate per Unit: <strong>" . get_value($data, 'rate') . "</strong>"; ?>
                        </label>
                    </div>
                </div>
            </div>
        </div>


        <div class="clearfix"></div><br>

        <?php
        echo form_field(["type" => "submit", "name" => "Delete", "key" => "delete", "class" => "col-md-12 col-sm-12 col-xs-12 text-center"], $data);
        ?>

        <div class="clearfix"></div><br>

    </form>


    <?php widget_end(); ?>
</div>

<?php include("../../common/footer.php"); ?>