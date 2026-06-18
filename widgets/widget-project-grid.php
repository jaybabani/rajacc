<?php include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2">
</div>


<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-4 g-4 py-3 px-2">

  <?php
  $color = "primary";
  widget_start("", "widget-project-grid", "", "bg-".$color . "-10");
  widget_project_grid(1,$color);
  widget_end();
  ?>

<?php
  $color = "accent1";
  widget_start("", "widget-project-grid", "", "bg-".$color . "-10");
  widget_project_grid(1,$color);
  widget_end();
  ?>

<?php
  $color = "accent2";
  widget_start("", "widget-project-grid", "", "bg-".$color . "-10");
  widget_project_grid(1,$color);
  widget_end();
  ?>

<?php
  $color = "accent3";
  widget_start("", "widget-project-grid", "", "bg-".$color . "-10");
  widget_project_grid(1,$color);
  widget_end();
  ?>
</div>

<?php include(__DIR__."/../common/footer.php"); ?>


<?php

function widget_project_grid($id,$color)
{
?>
  <div class="wrap">
    <div class="cat <?php echo $color."-color"; ?>"><?php echo project_category($id); ?></div>
    <h5 class="tit mt-1 mb-3"><?php echo project_name($id); ?></h5>
    <div class="mb-4"><?php sentence(); ?></div>

    <div class="d-flex w-100 align-items-center justify-content-between">
      <span class="mb-0 nowrap"><?php avatar(35, false);
                          avatar(35, false);
                          avatar(35, false); ?></span>
      <small class="ps-1">
        <span class="nowrap">
          <span class="icon <?php echo $color."-color"; ?>"><i data-feather="message-circle"></i></span>
          <span class="icon <?php echo $color."-color"; ?>"><i data-feather="heart"></i></span>
        </span>

      </small>
    </div>
  </div>

<?php
}

?>