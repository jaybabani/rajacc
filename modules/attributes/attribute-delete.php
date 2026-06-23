<?php
$module = "attributes";
$pageid = "attributes-delete";
include '../../common/header.php';
include("attribute-submodule.php");
?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
    <?php
    $id = '';
    if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != "") {
        $id = $_GET['id'];
    }

    $titletag = "Delete ". $submod["page_title"];

    $tablename = "attributes";

    $msg = [
        "success_delete" => $submod["page_title"]." deleted successfully",
        "error_delete" => "Error in deleting ". $submod["page_title"],
    ];

    $primary_column = "id";

    // $url_param = "category=".$_GET["category"];
    $url_param = $submod["url_param"];

    $submit_result = module_submit_delete_form([
        "submit_data" => $_POST,
        "tablename" => $tablename,
        "messages" => $msg,
        "primary_column" => $primary_column,
        "redirect_to" => "attributes",
        "url_param" => $url_param,
    ]);

    $data = module_get_data($tablename, $id);
    // print_arr($data);

    widget_start($titletag);

    ?>

    <form action="attribute-delete.php?<?php echo $url_param;?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="mode" value="<?php echo get_value($data, 'mode'); ?>">
        <input type="hidden" name="id" value="<?php echo get_value($data, 'id'); ?>">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-9 col-sm-10 col-xs-12">
                    <div class="form-group">
                        <label class="form-label" for="field-4">Are You sure you want to delete <?php echo $submod["page_title"]; ?>
                            <?php echo "<br>ID: <strong>" . get_value($data, 'id') . "</strong>";
                            $attribute = name_title(get_value($data, 'attribute'));
                            echo "<br>".$submod["page_title"].": <strong>" . $attribute . "</strong>"; ?>?</label>
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