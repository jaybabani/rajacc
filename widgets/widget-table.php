<?php $pageid = "index";
include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2">
</div>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">


  <?php widget_start("Recent Projects"); ?>

  <!-- Table Start -->
  <div class="widget-table">
    <div class="table-responsive">
      <table class="table">
        <?php widget_table_thead3(); ?>
        <tbody>
          <?php widget_table_tr3(0, "bg-primary", "67"); ?>
          <?php widget_table_tr3(1, "bg-accent1", "78"); ?>
          <?php widget_table_tr3(2, "bg-accent2", "58"); ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Table End -->

  <?php widget_end(); ?>



  <?php widget_start("All Projects"); ?>

  <!-- Table Start -->
  <div class="widget-table">
    <div class="table-responsive">
      <table class="table">
        <?php widget_table_thead2(); ?>
        <tbody>
          <?php widget_table_tr2(0, "bg-primary", "67"); ?>
          <?php widget_table_tr2(1, "bg-accent1", "78"); ?>
          <?php widget_table_tr2(2, "bg-accent2", "58"); ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Table End -->

  <?php widget_end(); ?>


  <?php widget_start("All Users"); ?>

  <!-- Table Start -->
  <div class="widget-table">
    <div class="table-responsive">
      <table class="table">
        <?php widget_table_thead(); ?>
        <tbody>
          <?php widget_table_tr(0); ?>
          <?php widget_table_tr(1); ?>
          <?php widget_table_tr(2); ?>
          <?php widget_table_tr(3); ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Table End -->

  <?php widget_end(); ?>


</div>
<?php include(__DIR__."/../common/footer.php"); ?>




