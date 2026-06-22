<?php $layout = ""; $pageid = "index";
include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2">
</div>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-3 px-2">
  <?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
  <?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
</div>


<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-4 py-3 px-2">
  <?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
  <?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
  <?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
  <?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
  <?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
  <?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
</div>

<div class="row row-cols-2 g-4 py-3 px-2">

  <?php widget_start("Widget Heading"); ?>
  <div class="col" style="background:var(--primary-color);">1</div>
  <div class="col" style="background:var(--accent1-color);">1</div>
  <div class="col" style="background:var(--accent2-color);">1</div>
  <div class="col" style="background:var(--accent3-color);">1</div>
  <div class="col" style="background:var(--success-color);">1</div>
  <div class="col" style="background:var(--warning-color);">1</div>
  <div class="col" style="background:var(--info-color);">1</div>
  <div class="col" style="background:var(--danger-color);">1</div>
  <?php widget_end(); ?>

  <?php widget_start("Widget Heading"); ?>
  <div class="col" style="background:rgba(var(--bs-primary-rgb),1);">1</div>
  <div class="col" style="background:rgba(var(--bs-accent1-rgb),1);">1</div>
  <div class="col" style="background:rgba(var(--bs-accent2-rgb),1);">1</div>
  <div class="col" style="background:rgba(var(--bs-accent3-rgb),1);">1</div>
  <div class="col" style="background:rgba(var(--bs-success-rgb),1);">1</div>
  <div class="col" style="background:rgba(var(--bs-warning-rgb),1);">1</div>
  <div class="col" style="background:rgba(var(--bs-info-rgb),1);">1</div>
  <div class="col" style="background:rgba(var(--bs-danger-rgb),1);">1</div>
  <?php widget_end(); ?>
</div>




<?php include(__DIR__."/../common/footer.php"); ?>