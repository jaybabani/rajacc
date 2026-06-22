<?php $pageid = "index";
include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2">
</div>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-3 g-4 py-3 px-2">

  <?php widget_start("Statistics", "widget-circle-chart"); ?>
  <h3 class="mb-5">$12,153.99</h3>
  <div style="margin-top:-20px;">
    <div id="widget-donut-chart"></div>
    <div class="row">
      <div class="col-6 inline-wid"> <?php widget_inline_counter_tiles("shopping-bag", "bg-primary", "Revenue", "421");        ?></div>
      <div class="col-6 inline-wid"> <?php widget_inline_counter_tiles("shopping-bag", "bg-accent1", "Sales", "512");        ?></div>
    </div>
  </div>
  <?php widget_end(); ?>


  <?php widget_start("Statistics", "widget-circle-chart"); ?>
  <h3 class="mb-5">$12,153.99</h3>
  <div style="margin-top:-20px;">
    <div id="widget-radialbar-chart"></div>
    <div class="row">
      <div class="col-6 inline-wid"> <?php widget_inline_counter_tiles("shopping-bag", "bg-accent2", "Orders", "753");        ?></div>
      <div class="col-6 inline-wid"> <?php widget_inline_counter_tiles("shopping-bag", "bg-accent3", "Clients", "431");        ?></div>
    </div>
  </div>
  <?php widget_end(); ?>



  <?php widget_start("Statistics", "widget-circle-chart"); ?>
  <h3 class="mb-5">$12,153.99</h3>
  <div style="margin-top:-20px;">
    <div id="widget-semidonut-chart"></div>
    <div class="row widget-graph-tiles" style="margin-top: -80px;">
    <div class="mt-4"><?php  widget_graph_tiles("activity", "bg-primary", "4,503 files", "Images", "20.43 GB", "text");  ?></div>
    <div class="mt-4"><?php  widget_graph_tiles("activity", "bg-accent1", "4,503 files", "Images", "20.43 GB", "text");  ?></div>
    <div class="mt-4"><?php  widget_graph_tiles("activity", "bg-accent2", "4,503 files", "Images", "20.43 GB", "text");  ?></div>
    <div class="mt-4"><?php  widget_graph_tiles("activity", "bg-accent3", "4,503 files", "Images", "20.43 GB", "text");  ?></div>

  </div>
  </div>
  <?php widget_end(); ?>



</div>


<?php

$other_scripts .= "<script>
var donutchart = new ApexCharts(document.querySelector('#widget-donut-chart'), widget_donut_chart_options);
donutchart.render();
</script>";

$other_scripts .= "<script>
var radialbarchart = new ApexCharts(document.querySelector('#widget-radialbar-chart'), widget_radialbar_chart_options);
radialbarchart.render();
</script>";

$other_scripts .= "<script>
var semidonutchart = new ApexCharts(document.querySelector('#widget-semidonut-chart'), widget_semidonut_chart_options);
semidonutchart.render();
</script>";


?>


<?php include(__DIR__."/../common/footer.php"); ?>

