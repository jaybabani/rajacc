<?php $pageid = "index";
include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2">
</div>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 row-cols-xxl-2 g-4 py-3 px-2">

  <?php widget_start("User Comments", "widget-comments", "mb-3"); ?>

  <div class="d-flex flex-column align-items-stretch flex-shrink-0 scrollbar-overlay" style="height: 460px;">
    <div class="list-group list-group-flush scrollarea">
      <?php  widget_comment_item(1); ?>
      <?php  widget_comment_item(2); ?>
      <?php  widget_comment_item(3); ?>
      <?php  widget_comment_item(4); ?>
      <?php  widget_comment_item(5); ?>
      <?php  widget_comment_item(6); ?>
      <?php  widget_comment_item(7); ?>
  </div>
  </div>

  <?php widget_end(); ?>
</div>

<?php include(__DIR__."/../common/footer.php"); ?>

