<?php $pageid = "index";
include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2"></div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4 py-3 px-2">
  <?php
  $bgcolor = "bg-primary";
  widget_start("", "widget-progress-tiles", "", $bgcolor . "-10");
  widget_progress_tiles("activity", $bgcolor, "Revenue", "4,753");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent1";
  widget_start("", "widget-progress-tiles", "", $bgcolor . "-10");
  widget_progress_tiles("shopping-bag", "bg-accent1", "New Orders", "542");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent2";
  widget_start("", "widget-progress-tiles", "", $bgcolor . "-10");
  widget_progress_tiles("activity", "bg-accent2", "Star Bucks Ltd.", "Design");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent3";
  widget_start("", "widget-progress-tiles", "", $bgcolor . "-10");
  widget_progress_tiles("activity", "bg-accent3", "Graphic Design", "UI Theme");
  widget_end();
  ?>


</div>

<?php include(__DIR__."/../common/footer.php"); ?>
