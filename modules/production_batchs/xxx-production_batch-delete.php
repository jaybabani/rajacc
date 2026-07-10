<?php
$module = "production_batchs";
$pageid = "production_batchs-delete";
include '../../common/header.php';
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
    <?php
    $id = '';
    if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != "") {
        $id = $_GET['id'];
    }

    $titletag = "Delete production batch";

    $tablename = "production_batchs";

    $msg = [
        "success_delete" => "production batch deleted successfully",
        "error_delete" => "Error in deleting production batch",
    ];

    $primary_column = "id";

    $submit_result = module_submit_delete_form([
        "submit_data" => $_POST,
        "tablename" => $tablename,
        "messages" => $msg,
        "primary_column" => $primary_column,
        "redirect_to" => "production_batchs"
    ]);

    $data = module_get_data($tablename, $id);
    // print_arr($data);

    // $customers_arr = fetch_data(["table" => "customers", "columns" => "id, firm_name", "condition" => " id = '".$data["customer"]."' ", "production_batch" => "", "limit" => ""]);
    // // print_arr($customers_arr);
    // if(isset($customers_arr[0]["firm_name"])){
    //     $data["customer"] = $customers_arr[0]["firm_name"];
    // }

    widget_start($titletag);

    ?>

    <form action="production_batch-delete.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="mode" value="<?php echo get_value($data, 'mode'); ?>">
        <input type="hidden" name="id" value="<?php echo get_value($data, 'id'); ?>">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-9 col-sm-10 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="field-4">Are You sure you want to delete production_batch?
                            <?php echo "<br>ID: <strong>" . get_module_id_prefix("production_batchs").get_value($data, 'id') . "</strong>";
                            $production = name_title(get_module_id_prefix("orders").get_value($data, 'production'));
                            echo "<br>Production: <strong>" . $production . "</strong>"; ?>
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