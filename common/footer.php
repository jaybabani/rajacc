</div>


<?php include("sidebar-right.php"); ?>

</main>
<!-- CORE JS FRAMEWORK - START -->
<script src="<?php echo ROOT_PATH; ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="<?php echo ROOT_PATH; ?>/assets/js/sidebars.js" type="text/javascript"></script>
<script src="<?php echo ROOT_PATH; ?>/assets/js/scripts.js" type="text/javascript"></script>
<script src="<?php echo ROOT_PATH; ?>/assets/plugins/overlayscrollbars/js/OverlayScrollbars.min.js"></script>
<?php
if (isset($other_scripts)) {
    echo $other_scripts;
}
?>
<script src="<?php echo ROOT_PATH; ?>/assets/app.js"></script>

<!-- CORE JS FRAMEWORK - END -->

<?php

echo '<div class="screen-type d-block d-sm-none">xs</div>
<div class="screen-type d-none d-sm-block d-md-none">sm</div>
<div class="screen-type d-none d-md-block d-lg-none">md</div>
<div class="screen-type d-none d-lg-block d-xl-none">lg</div>
<div class="screen-type d-none d-xl-block d-xxl-none">xl</div>
<div class="screen-type d-none d-xxl-block">xxl</div>
<div class="top-ref"></div>';

// global $dbname;
// echo "<div style='position:fixed;top:0;right:0;z-index:2;background:#757575;color:#ffffff;padding:5px;'>" . $dbname . "</div>";

?>

<button id="scrollBtn">↓</button>

<script>
</script>

<script>
    feather.replace()
</script>

<?php

if (isset($load_datatable) && $load_datatable == true) {
    echo datatable_scripts();
    if (isset($module_pages)) {
        datatable_instance($module_pages);
    }
}

?>

</body>

</html>