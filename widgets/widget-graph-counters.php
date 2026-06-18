<?php include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2"></div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-4 g-4 py-3 px-2">
  <?php
  $chartid = "sparkline_chart_4";
  $bgcolor = "bg-primary";
  widget_start("", "widget-graph-counters", "", $bgcolor . "-10");
  widget_graph_counters("activity", $bgcolor, "Revenue", "3,121", "down", "-13% this month", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_5";
  $bgcolor = "bg-accent1";
  widget_start("", "widget-graph-counters", "", $bgcolor . "-10");
  widget_graph_counters("shopping-bag", "bg-accent1", "New Orders", "542", "up", "43% this month", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_6";
  $bgcolor = "bg-accent2";
  widget_start("", "widget-graph-counters", "", $bgcolor . "-10");
  widget_graph_counters("activity", "bg-accent2", "Revenue", "3,121", "down", "-13% this month", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_7";
  $bgcolor = "bg-accent3";
  widget_start("", "widget-graph-counters", "", $bgcolor . "-10");
  widget_graph_counters("shopping-bag", "bg-accent3", "New Orders", "542", "up", "43% this month", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_8";
  $bgcolor = "bg-accent1";
  widget_start("", "widget-graph-counters", "", $bgcolor . "-10");
  widget_graph_counters("activity", "bg-accent1", "Revenue", "3,121", "down", "-13% this month", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_9";
  $bgcolor = "bg-accent2";
  widget_start("", "widget-graph-counters", "", $bgcolor . "-10");
  widget_graph_counters("activity", "bg-accent2", "Revenue", "3,121", "down", "-13% this month", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_10";
  $bgcolor = "bg-accent3";
  widget_start("", "widget-graph-counters", "", $bgcolor . "-10");
  widget_graph_counters("shopping-bag", "bg-accent3", "New Orders", "542", "up", "43% this month", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>

  <?php
  $chartid = "sparkline_chart_11";
  $bgcolor = "bg-primary";
  widget_start("", "widget-graph-counters", "", $bgcolor . "-10");
  widget_graph_counters("activity", "bg-primary", "Revenue", "3,121", "down", "-13% this month", $chartid);
  $other_scripts .= "<script> var display_" . $chartid . " = new ApexCharts(document.querySelector('#" . $chartid . "'), " . $chartid . ");  display_" . $chartid . ".render();  </script>";
  widget_end();
  ?>


</div>

<?php include(__DIR__."/../common/footer.php"); ?>
