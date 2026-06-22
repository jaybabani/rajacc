<?php $pageid = "index";
include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2"></div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-4 py-3 px-2">
 <?php
  $bgcolor = "bg-primary";
  widget_start("", "widget-counter-percent", "", $bgcolor . "-10");
  widget_counters_percent("Revenue", "3,121", "down", "-13% (+43)", "/day");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent1";
  widget_start("", "widget-counter-percent", "", $bgcolor . "-10");
  widget_counters_percent("Revenue", "3,121", "down", "-13% (+43)", "/day");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent2";
  widget_start("", "widget-counter-percent", "", $bgcolor . "-10");
  widget_counters_percent("Revenue", "3,121", "down", "-13% (+43)", "/day");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent3";
  widget_start("", "widget-counter-percent", "", $bgcolor . "-10");
  widget_counters_percent("Revenue", "3,121", "down", "-13% (+43)", "/day");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent1";
  widget_start("", "widget-counter-percent", "", $bgcolor . "-10");
  widget_counters_percent("Revenue", "3,121", "down", "-13% (+43)", "/day");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent2";
  widget_start("", "widget-counter-percent", "", $bgcolor . "-10");
  widget_counters_percent("Revenue", "3,121", "down", "-13% (+43)", "/day");
  widget_end();
  ?>

</div>

<?php include(__DIR__."/../common/footer.php"); ?>
