<?php
include '../../common/header.php';
// include("symbol-functions.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
    <?php
    $id = '';
    if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != "") {
        $id = $_GET['id'];
    }

    $titletag = "Delete Symbol";

    $tablename = "symbols";

    $msg = [
        "success_delete" => "Symbol deleted successfully",
        "error_delete" => "Error in deleting symbol",
    ];

    $primary_column = "id";

    $submit_result = module_submit_delete_form([
        "submit_data" => $_POST,
        "tablename" => $tablename,
        "messages" => $msg,
        "primary_column" => $primary_column,
        "redirect_to" => "symbols"
    ]);

    $data = module_get_data($tablename, $id);
    // print_arr($data);

    widget_start($titletag);

    ?>

    <form action="symbol-delete.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="mode" value="<?php echo get_value($data, 'mode'); ?>">
        <input type="hidden" name="id" value="<?php echo get_value($data, 'id'); ?>">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-9 col-sm-10 col-xs-12">

                    <div class="form-group">
                        <label class="form-label" for="field-4">Are You sure you want to delete symbol

                            <?php echo "ID: <strong>" . get_value($data, 'id') . "</strong>";

                            $Symbol = name_title(get_value($data, 'symbol'));

                            echo " Symbol: <strong>" . $Symbol . "</strong>"; ?>?</label>

                    </div>



                </div>
            </div>
        </div>

        <div class="clearfix"></div><br>

        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <input type="submit" name="delete" value="Delete" class="btn btn-success btn-lg">
        </div>

        <div class="clearfix"></div><br>

    </form>


    <?php widget_end(); ?>
</div>

<?php include("../../common/footer.php"); ?>