<?php
$module = "payments";
$pageid = "payments-delete";
include '../../common/header.php';
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
    <?php
    $id = '';
    if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != "") {
        $id = $_GET['id'];
    }

    $titletag = "Delete Payment";

    $tablename = "payments";

    $msg = [
        "success_delete" => "Payment deleted successfully",
        "error_delete" => "Error in deleting payment",
    ];

    $primary_column = "id";

    $url_param = "";
    if (isset($_POST["source"])) {
        $url_param = "source=" . $_POST["source"] . "";
    }


    $submit_result = module_submit_delete_form([
        "submit_data" => $_POST,
        "tablename" => $tablename,
        "messages" => $msg,
        "primary_column" => $primary_column,
        "redirect_to" => "payments",
        "url_param" => $url_param,
    ]);

    $data = module_get_data($tablename, $id);
    // print_arr($data);

    // $raw_materials_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => " id = '".$data["raw_material"]."' ", "order" => "", "limit" => ""]);
    // // print_arr($raw_materials_arr);
    // if(isset($raw_materials_arr[0]["raw_material"])){
    //     $data["raw_material"] = $raw_materials_arr[0]["raw_material"];
    // }

    widget_start($titletag);

    ?>

    <form action="payment-delete.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="mode" value="<?php echo get_value($data, 'mode'); ?>">
        <input type="hidden" name="id" value="<?php echo get_value($data, 'id'); ?>">
        <input type="hidden" name="source" value="<?php echo get_value($data, 'type'); ?>">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-9 col-sm-10 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="field-4">Are You sure you want to delete Payment?
                            <?php echo "<br>ID: <strong>". get_module_id_prefix("payments").get_value($data, 'id') . "</strong>";
                            $type = name_title(get_value($data, 'type'));
                            $options = get_payment_type_arr();
                            echo "<br>Type: <strong>" . $options[$type] ?? $type . "</strong>"; ?></label>
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