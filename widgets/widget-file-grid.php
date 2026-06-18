<?php include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2"></div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4 py-3 px-2">
  <?php
  $bgcolor = "bg-primary";
  widget_start("", "widget-file-grid", "", $bgcolor . "-10");
  widget_file_grid("icon-css", $bgcolor, "styleguide.css", "5.43 Kb");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent1";
  widget_start("", "widget-file-grid", "", $bgcolor . "-10");
  widget_file_grid("icon-jpg", $bgcolor, "image-file.jpg", "2.13 Mb");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent2";
  widget_start("", "widget-file-grid", "", $bgcolor . "-10");
  widget_file_grid("icon-pdf", $bgcolor, "resume-file.pdf", "1.56 Mb");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent3";
  widget_start("", "widget-file-grid", "", $bgcolor . "-10");
  widget_file_grid("icon-xls", $bgcolor, "spreadsheet.xls", "354.43 Kb");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-primary";
  widget_start("", "widget-file-grid", "", $bgcolor . "-10");
  widget_file_grid("icon-doc", $bgcolor, "presentation.doc", "5.43 Kb");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent1";
  widget_start("", "widget-file-grid", "", $bgcolor . "-10");
  widget_file_grid("icon-html", $bgcolor, "project-website.html", "643.13 Kb");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent2";
  widget_start("", "widget-file-grid", "", $bgcolor . "-10");
  widget_file_grid("icon-zip", $bgcolor, "package.zip", "11.56 Mb");
  widget_end();
  ?>

  <?php
  $bgcolor = "bg-accent3";
  widget_start("", "widget-file-grid", "", $bgcolor . "-10");
  widget_file_grid("icon-mp3", $bgcolor, "music-file.mp3", "4.43 Mb");
  widget_end();
  ?>
</div>

<?php include(__DIR__."/../common/footer.php"); ?>


