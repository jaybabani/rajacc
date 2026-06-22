<?php $pageid = "index";
include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2">
</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-4 py-3 px-2">
  <?php 
  widget_start("", "widget-icon-counters");
  widget_icon_counters("shopping-bag", "bg-primary", "New Orders", "542", "up", "43%"); 
  widget_end(); 
  ?>

  <?php 
  widget_start("", "widget-icon-counters");
  widget_icon_counters("activity", "bg-accent1", "Revenue", "3,121", "down", "-13%");
  widget_end(); 
  ?>

<?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
<?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
<?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
<?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
<?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
</div>

<?php include(__DIR__."/../common/footer.php"); ?>

