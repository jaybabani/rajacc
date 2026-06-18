<?php include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2">
</div>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 row-cols-xxl-2 g-4 py-3 px-2">

  <?php widget_start("Timeline", "widget-task", "mb-3"); ?>
  <?php widget_task("timeline"); ?>
  <?php widget_end(); ?>


  <?php widget_start("Recent Tasks", "widget-task", "mb-3"); ?>
  <?php widget_task("avatar"); ?>
  <?php widget_end(); ?>


  <?php widget_start("Recent Tasks", "widget-task", "mb-3"); ?>
  <?php widget_task(); ?>
  <?php widget_end(); ?>

  <?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
</div>


<?php
$other_scripts = "";
?>


<?php include(__DIR__."/../common/footer.php"); ?>

