<?php
$module = "bom_costs";
$pageid = "bom_costs-delete";
include '../../common/header.php';
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
    <?php
    $id = '';
    if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != "") {
        $id = $_GET['id'];
    }

    $titletag = "Delete BOM cost";

    $tablename = "bom_costs";

    $msg = [
        "success_delete" => "BOM cost deleted successfully",
        "error_delete" => "Error in deleting BOM cost",
    ];

    $primary_column = "id";

    $url_param = "";
    if(isset($_POST["bom"])){
        $url_param = "bom=".$_POST["bom"]."";
    }

    $submit_result = module_submit_delete_form([
        "submit_data" => $_POST,
        "tablename" => $tablename,
        "messages" => $msg,
        "primary_column" => $primary_column,
        "redirect_to" => "bom_costs",
        "url_param" => $url_param,
    ]);

    $data = module_get_data($tablename, $id);
    // print_arr($data);

    widget_start($titletag);

    ?>

    <form action="bom_cost-delete.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="mode" value="<?php echo get_value($data, 'mode'); ?>">
        <input type="hidden" name="bom" value="<?php echo get_value($data, 'bom'); ?>">
        <input type="hidden" name="id" value="<?php echo get_value($data, 'id'); ?>">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-9 col-sm-10 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="field-4">Are You sure you want to delete BOM cost?
                            <?php echo "<br>ID: <strong>" . get_module_id_prefix("bom_costs") . get_value($data, 'id') . "</strong>";
                            $cost_type = get_value($data, 'cost_type');
                            $cost_type_arr = bom_cost_type_arr();
                            if(isset($cost_type_arr[$cost_type])){
                                $cost_type = $cost_type_arr[$cost_type];
                            }
                            echo "<br>Cost type: <strong>" . $cost_type . "</strong>";
                            echo "<br>Cost Amount: <strong>" . get_value($data, 'amount') . "</strong>"; ?>
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