<?php include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2"></div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-4 g-4 py-3 px-2">
  <?php
  $chartid = "sparkline_chart_4_small";
  $bgcolor = "bg-primary";
  widget_start("", "widget-graph-tiles", "", $bgcolor . "-10");
  widget_graph_tiles("activity", $bgcolor, "Revenue", "4,753", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_5_small";
  $bgcolor = "bg-accent1";
  widget_start("", "widget-graph-tiles", "", $bgcolor . "-10");
  widget_graph_tiles("shopping-bag", $bgcolor, "New Orders", "542",   $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_6_small";
  $bgcolor = "bg-accent2";
  widget_start("", "widget-graph-tiles", "", $bgcolor . "-10");
  widget_graph_tiles("activity", $bgcolor, "Star Bucks Ltd.", "Design", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_7_small";
  $bgcolor = "bg-accent3";
  widget_start("", "widget-graph-tiles", "", $bgcolor . "-10");
  widget_graph_tiles("activity", $bgcolor, "Graphic Design", "UI Theme", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_8_small";
  $bgcolor = "bg-accent1";
  widget_start("", "widget-graph-tiles", "", $bgcolor . "-10");
  widget_graph_tiles("activity", $bgcolor, "Revenue", "4,753", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_9_small";
  $bgcolor = "bg-accent2";
  widget_start("", "widget-graph-tiles", "", $bgcolor . "-10");
  widget_graph_tiles("shopping-bag", $bgcolor, "New Orders", "542",   $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_10_small";
  $bgcolor = "bg-accent3";
  widget_start("", "widget-graph-tiles graph-mt", "", $bgcolor . "-10");
  widget_graph_tiles("activity", $bgcolor, "Star Bucks Ltd.", "UI Design", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_11_small";
  $bgcolor = "bg-primary";
  widget_start("", "widget-graph-tiles graph-mt", "", $bgcolor . "-10");
  widget_graph_tiles("activity", $bgcolor, "Graphic Design", "Tech Agency", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>



</div>




<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-4 g-4 py-3 px-2">

<?php
  $chartid = "";
  $bgcolor = "bg-primary";
  widget_start("", "widget-graph-tiles graph-mt", "", $bgcolor . "-10");
  widget_graph_tiles("activity", $bgcolor, "4,503 files", "Images", "20.43 GB", "text");
  // $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>



<?php
  $chartid = "";
  $bgcolor = "bg-accent1";
  widget_start("", "widget-graph-tiles graph-mt", "", $bgcolor . "-10");
  widget_graph_tiles("activity", $bgcolor, "4,503 files", "Images", "20.43 GB", "text");
  // $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>


<?php
  $chartid = "";
  $bgcolor = "bg-accent2";
  widget_start("", "widget-graph-tiles graph-mt", "", $bgcolor . "-10");
  widget_graph_tiles("activity", $bgcolor, "4,503 files", "Images", "20.43 GB", "text");
  // $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>


<?php
  $chartid = "";
  $bgcolor = "bg-accent3";
  widget_start("", "widget-graph-tiles graph-mt", "", $bgcolor . "-10");
  widget_graph_tiles("activity", $bgcolor, "4,503 files", "Images", "20.43 GB", "text");
  // $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

</div>

<?php include(__DIR__."/../common/footer.php"); ?>
