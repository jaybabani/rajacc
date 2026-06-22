<?php $pageid = "index";
include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2">
</div>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 row-cols-xxl-2 g-4 py-3 px-2">

  <?php widget_start("Sales & Profits", "widget-chart", "mb-3"); ?>
  <h3 class="mb-5">$12,153.99</h3>
  <div style="margin-top: -100px;">
    <div id="widget-area-chart"></div>
  </div>
  <?php widget_end(); ?>



  <?php widget_start("Sales & Profits", "widget-chart", "mb-3"); ?>
  <h3 class="mb-5">$12,153.99</h3>
  <div style="margin-top: -80px;">
    <div id="widget-bar-negative-chart"></div>
  </div>
  <?php widget_end(); ?>



  <?php widget_start("Sales & Profits", "widget-chart", "mb-3"); ?>
  <h3 class="mb-5">$12,153.99</h3>
  <div style="margin-top: -100px;">
    <div id="widget-column-chart"></div>
  </div>
  <?php widget_end(); ?>


  <?php widget_start("Sales & Profits", "widget-chart", "mb-3"); ?>
  <h3 class="mb-5">$12,153.99</h3>
  <div style="margin-top: -100px;">
    <div id="widget-column-stacked-chart"></div>
  </div>
  <div class="row mt-2 ps-2">
    <div class="col col-6"><?php widget_counters_percent("Revenue", "3,121", "down", "-13% (+43)", "/day"); ?></div>
    <div class="col col-6"><?php widget_counters_percent("Revenue", "3,121", "down", "-13% (+43)", "/day"); ?></div>
  </div>
  <?php widget_end(); ?>



  <?php widget_start("Sales & Profits", "widget-chart", "mb-3"); ?>
  <h3 class="mb-5">$12,153.99</h3>
  <div style="margin-top: -100px;">
    <div id="widget-bar-chart"></div>
  </div>
  <div class="row mt-2 ps-2">
    <div class="col col-6"><?php widget_counters_percent("Revenue", "3,121", "down", "-13% (+43)", "/day"); ?></div>
    <div class="col col-6"><?php widget_counters_percent("Revenue", "3,121", "down", "-13% (+43)", "/day"); ?></div>
  </div>
  <?php widget_end(); ?>



  <?php widget_start("Sales & Profits", "widget-chart", "mb-3"); ?>
  <h3 class="mb-5">$12,153.99</h3>
  <div style="margin-top: -100px;">
    <div id="widget-bar-stacked-chart"></div>
  </div>
  <div class="row mt-2 ps-2">
    <div class="col col-6"><?php widget_counters_percent("Revenue", "3,121", "down", "-13% (+43)", "/day"); ?></div>
    <div class="col col-6"><?php widget_counters_percent("Revenue", "3,121", "down", "-13% (+43)", "/day"); ?></div>
  </div>
  <?php widget_end(); ?>

</div>



<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-3 g-4 py-3 px-2">
  <?php
  $chartid = "sparkline_chart_1";
  widget_start("", "widget-chart", "mb-3", "widget-no-padding"); ?>

  <div class="widget-icon-counters small">
  <?php widget_icon_counters("shopping-bag", "bg-primary", "New Orders", "542", "up", "43%"); ?></div>
  <div style="margin-top: -100px;">
      <?php echo '<div id="' . $chartid . '"></div>'; ?>
  </div>
  <?php
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_2";
  widget_start("", "widget-chart", "mb-3", "widget-no-padding");
  ?>
  <div class="widget-icon-counters small">
  <?php widget_icon_counters("shopping-bag", "bg-accent1", "New Orders", "542", "up", "43%"); ?></div>
  <div style="margin-top: -100px;">
      <?php echo '<div id="' . $chartid . '"></div>'; ?>
  </div>
  <?php 
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_3";
  widget_start("", "widget-chart", "mb-3", "widget-no-padding");
  ?>
  <div class="widget-icon-counters small">
  <?php widget_icon_counters("shopping-bag", "bg-accent2", "New Orders", "542", "up", "43%"); ?></div>
  <div style="margin-top: -100px;">
      <?php echo '<div id="' . $chartid . '"></div>'; ?>
  </div>
  <?php $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

</div>

<?php

$other_scripts .= "<script>
var areachart = new ApexCharts(document.querySelector('#widget-area-chart'), widget_area_chart_options);
areachart.render();
</script>";

$other_scripts .= "<script>
var barnegativechart = new ApexCharts(document.querySelector('#widget-bar-negative-chart'), widget_bar_negative_chart_options);
barnegativechart.render();
</script>";

$other_scripts .= "<script>
var columnchart = new ApexCharts(document.querySelector('#widget-column-chart'), widget_column_chart_options);
columnchart.render();
</script>";

$other_scripts .= "<script>
var columnstackedchart = new ApexCharts(document.querySelector('#widget-column-stacked-chart'), widget_column_stacked_chart_options);
columnstackedchart.render();
</script>";


$other_scripts .= "<script>
var barchart = new ApexCharts(document.querySelector('#widget-bar-chart'), widget_bar_chart_options);
barchart.render();
</script>";

$other_scripts .= "<script>
var barstackedchart = new ApexCharts(document.querySelector('#widget-bar-stacked-chart'), widget_bar_stacked_chart_options);
barstackedchart.render();
</script>";

?>


<?php include(__DIR__."/../common/footer.php"); ?>