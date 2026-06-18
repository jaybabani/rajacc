
<?php include(__DIR__."/../common/header.php"); ?>
<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2"></div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4 py-3 px-2">


<?php
  $bgcolor = "bg-primary";
  $percent = rand(40,80);
  widget_start("", "widget-progress-percent", "", $bgcolor . "-10");
  widget_progress_percent($bgcolor, "Revenue", $percent);
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent1";
  $percent = rand(40,80);
  widget_start("", "widget-progress-percent", "", $bgcolor . "-10");
  widget_progress_percent($bgcolor, "New Orders", $percent);
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent2";
  $percent = rand(40,80);
  widget_start("", "widget-progress-percent", "", $bgcolor . "-10");
  widget_progress_percent($bgcolor, "Sales", $percent);
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent3";
  $percent = rand(40,80);
  widget_start("", "widget-progress-percent", "", $bgcolor . "-10");
  widget_progress_percent($bgcolor, "Profit", $percent);
  widget_end();
  ?>

<?php
  widget_start("", "widget-progress-percent", "", "");
  $bgcolor = "bg-primary";
  $percent = rand(40,80);
  widget_progress_percent($bgcolor, "Revenue", $percent);
  $bgcolor = "bg-accent1";
  $percent = rand(40,80);
  widget_progress_percent($bgcolor, "New Orders", $percent);
  $bgcolor = "bg-accent2";
  $percent = rand(40,80);
  widget_progress_percent($bgcolor, "Profit", $percent);
  $bgcolor = "bg-accent3";
  $percent = rand(40,80);
  widget_progress_percent($bgcolor, "Sales", $percent);
  widget_end();
?>


</div>



<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4 py-3 px-2">

<?php
  $bgcolor = "bg-primary";
  $percent = rand(40,80);
  widget_start("", "widget-progress-percent", "", $bgcolor . "-10");
  widget_icon_with_title("shopping-bag", $bgcolor, "Sales");
  widget_progress_percent($bgcolor, "Growth", $percent);
  widget_end();
?>

<?php
  $bgcolor = "bg-accent1";
  $percent = rand(40,80);
  widget_start("", "widget-progress-percent", "", $bgcolor . "-10");
  widget_icon_with_title("activity", $bgcolor, "Revenue");
  widget_progress_percent($bgcolor, "Growth", $percent);
  widget_end();
?>

<?php
  $bgcolor = "bg-accent2";
  $percent = rand(40,80);
  widget_start("", "widget-progress-percent", "", $bgcolor . "-10");
  widget_icon_with_title("shopping-bag", $bgcolor, "Orders");
  widget_progress_percent($bgcolor, "Growth", $percent);
  widget_end();
?>

<?php
  $bgcolor = "bg-accent3";
  $percent = rand(40,80);
  widget_start("", "widget-progress-percent", "", $bgcolor . "-10");
  widget_icon_with_title("activity", $bgcolor, "Customers");
  widget_progress_percent($bgcolor, "Growth", $percent);
  widget_end();
?>


</div>


<?php include(__DIR__."/../common/footer.php"); ?>
