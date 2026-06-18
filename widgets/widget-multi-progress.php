<?php include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2">
</div>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-3 g-4 py-3 px-2">
  <?php widget_start("Growth Earnings","widget-multi-progress","mb-3"); ?>
  <h3 class="mb-5">$553.23</h3>
  <div class="progress-wrap ">
    <div class="progress multi">
      <div class="progress-bar bg-primary" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="15%"></div>
      <div class="progress-bar bg-accent1" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="30%"></div>
      <div class="progress-bar bg-accent2" role="progressbar" style="width: 35%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="35%"></div>
    </div>
    <div class="legends">
      <span class="primary text-truncate">Sales</span>
      <span class="accent1 text-truncate">Earning</span>
      <span class="accent2 text-truncate">Profit</span>
    </div>
  </div>
  <?php widget_end(); ?>
  <?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
  <?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
  <?php widget_start("Widget Heading"); ?> hello <?php widget_end(); ?>
</div>





<?php include(__DIR__."/../common/footer.php"); ?>