<?php
include_once('widget_functions_table.php');
include_once('widget_functions_task.php');


function widget_chat_item($itemid, $bg, $align = "")
{
  global $timeampm;
?>
  <!-- list-group-item - start-->
  <div class="list-group-item py-2 <?php echo $align; ?>" aria-current="true">
    <?php if ($align == "" || $align == "left") { ?>
      <div class="img-wrap">
        <?php avatar(40); ?>
      </div>
    <?php } ?>
    <div class="data-wrap">
      <?php $id = rand(1, 22); ?>
      <div class="bubble <?php echo $bg; ?>">
        <div class="">
          <span class="mb-0"><strong><?php name($id); ?></strong></span>
        </div>
        <div><?php line(); ?></div>
      </div>
      <div class="mb-1">
        <span class="nowrap">
          <?php if ($align == "right") { ?>
            <span class="double-check">
              <span class="icon"><i data-feather="check"></i></span>
              <span class="icon"><i data-feather="check"></i></span>
            </span>
          <?php } ?>
          <small><?php echo $timeampm[$itemid]; ?></small>
        </span>
      </div>
    </div>
    <?php if ($align == "right") { ?>
      <div class="img-wrap">
        <?php avatar(40); ?>
      </div>
    <?php } ?>

  </div>
  <!-- list-group-item - end-->

<?php
}

?>





<?php

function widget_inline_counter_tiles($icon, $iconbg, $title, $count)
{ ?>
  <div class="inline-counter-tiles mt-3">
    <div class="wrap">
      <span class="icon-rounded <?php echo $iconbg; ?>"><i data-feather="<?php echo $icon; ?>"></i></span>
      <div class="info">
        <h5 class="count"><?php echo $count; ?></h5>
        <div class="gray"><?php echo $title; ?></div>
      </div>
    </div>
  </div>

<?php }

?>




<?php

function widget_comment_item($itemid)
{
  global $time;
?>
  <!-- list-group-item - start-->
  <div class="list-group-item py-3" aria-current="true">
    <div class="img-wrap">
      <?php avatar(60); ?>
    </div>
    <div class="data-wrap">
      <?php $id = rand(1, 22); ?>
      <div class="d-flex w-100 align-items-center justify-content-between">
        <span class="mb-2"><strong><?php name($id); ?></strong> <span class="light"><?php at_name($id); ?></span> from <strong><?php company(); ?></strong></span>
        <small class="ps-1"><?php echo $time[$itemid]; ?></small>
      </div>
      <div class="col-11  mt-0 mb-2"><?php sentence(); ?></div>
      <div class="col-11  mt-0 mb-1"><span class="nowrap">
          <span class="icon"><i data-feather="message-circle"></i></span>
          <span class="icon"><i data-feather="heart"></i></span>
          <span class="icon"><i data-feather="share-2"></i></span>
        </span></div>
    </div>
  </div>
  <!-- list-group-item - end-->

<?php
}

?>




<?php

function widget_graph_counters($icon, $iconbg, $title, $count, $sign, $percent, $chartid)
{ ?>
  <div class="graph">
    <div class="graph-wrap">
      <div id="<?php echo $chartid; ?>"></div>
    </div>
  </div>
  <div class="wrap">
    <span class="icon-rounded <?php echo $iconbg; ?>"><i data-feather="<?php echo $icon; ?>"></i></span>
    <h6 class="tit"><?php echo $title; ?></h6>
    <h2 class="count"><?php echo $count; ?></h2>
    <div class="clearfix"></div>
    <span class="percent <?php echo $sign; ?>"><i data-feather="arrow-<?php echo $sign; ?>"></i><span><?php echo $percent; ?></span></span>
  </div>

<?php }

?>




<?php

function widget_graph_tiles($icon, $iconbg, $title, $count, $data, $type = "chart", $tag = "h5")
{ ?>
  <div class="wid-wrap">
    <?php if ($type == "text") { ?>
      <div class="text-data">
        <h5 class="title nowrap <?php echo str_replace("bg-", "", $iconbg) . "-color"; ?>"><?php echo $data; ?></h5>
      </div>
    <?php }
    if ($type == "chart") {  ?>
      <div class="graph">
        <div class="graph-wrap">
          <div id="<?php echo $data; ?>"></div>
        </div>
      </div>
    <?php } ?>
    <div class="wrap">
      <span class="icon-rounded <?php echo $iconbg; ?>"><i data-feather="<?php echo $icon; ?>"></i></span>
      <div class="info">
        <<?php echo $tag; ?> class="count"><?php echo $count; ?></<?php echo $tag; ?>>
        <div class="tit"><?php echo $title; ?></div>
      </div>
    </div>
  </div>
<?php }

?>



<?php

function widget_icon_counters($icon, $iconbg, $title, $count, $sign, $percent)
{ ?>

  <span class="icon-rounded <?php echo $iconbg; ?>"><i data-feather="<?php echo $icon; ?>"></i></span>
  <h6 class="tit"><?php echo $title; ?></h6>
  <div class="wrap">
    <h3 class="count"><?php echo $count; ?></h3>
    <span class="percent <?php echo $sign; ?>"><i data-feather="arrow-<?php echo $sign; ?>"></i><span><?php echo $percent; ?></span></span>
  </div>


<?php }

?>




<?php

function widget_progress_percent($iconbg, $title, $percent)
{ ?>
  <div class="wrap align-items-center">
    <div class="info">
      <h6 class="tit mb-0 text-truncate"><?php echo $title; ?></h6>
      <div class="count text-truncate"><?php echo $percent; ?>%</div>
    </div>
    <div class="clearfix"></div>
    <div class="progress marker <?php echo $iconbg; ?>-marker progress-sm mt-1 mb-4">
      <div class="progress-bar <?php echo $iconbg; ?>" role="progressbar" style="width: <?php echo $percent; ?>%" aria-valuenow="<?php echo $percent; ?>" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>

<?php }

?>





<?php

function widget_progress_tiles($icon, $iconbg, $title, $count)
{
  $percent = rand(40, 80);
?>
  <div class="wrap align-items-center">
    <span class="icon-rounded <?php echo $iconbg; ?>"><i data-feather="<?php echo $icon; ?>"></i></span>
    <div class="clearfix"></div>
    <h6 class="tit mt-4 mb-2"><?php echo $title; ?></h6>
    <h4 class="count"><?php echo $count; ?></h4>
    <div class="clearfix"></div>
    <div class="progress marker <?php echo $iconbg; ?>-marker progress-sm mt-4 mb-2">
      <div class="progress-bar <?php echo $iconbg; ?>" role="progressbar" style="width: <?php echo $percent; ?>%" aria-valuenow="<?php echo $percent; ?>" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>

<?php }

?>


<?php

function widget_icon_with_title($icon, $iconbg, $title)
{
?>
  <div class="wrap w-icon-tit">
    <span class="icon-rounded <?php echo $iconbg; ?>"><i data-feather="<?php echo $icon; ?>"></i></span>
    <div class="clearfix"></div>
    <h4 class="tit mt-3 mb-3"><?php echo $title; ?></h4>
    <div class="clearfix"></div>
  </div>

<?php }

?>




<?php

function widget_user_grid($icon, $iconbg, $title, $count)
{
  $id = rand(1, 22); ?>

  <div class="wrap align-items-center">
    <?php avatar(60); ?>
    <div class="clearfix"></div>
    <h5 class="name mt-3"><?php name($id); ?></h5>
    <div class="clearfix"></div>
    <div class="tit mt-1 mb-3"><?php echo profession(); ?></div>
    <div class="clearfix"></div>
    <div class="badge mb-1 <?php echo $iconbg; ?>"><?php echo at_name($id); ?></div>


  </div>

<?php }

?>




<?php

function widget_file_grid($icon, $iconbg, $title, $count)
{
  $id = rand(1, 22); ?>

  <div class="wrap align-items-center">

    <span class="file-icon">
      <span class="<?php echo $icon; ?>"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span></span>
    </span>
    <h5 class="name mt-3 text-truncate"><?php echo $title; ?></h5>
    <div class="clearfix"></div>
    <div class="tit mt-1 mb-3"><?php echo $count; ?></div>
    <div class="clearfix"></div>
    <div class="badge mb-1 <?php echo $iconbg; ?>"><?php echo at_name($id); ?></div>


  </div>

<?php }

?>



<?php

function widget_avatar_row()
{ ?>

  <div class="clearfix"></div>
  <div class="wrap align-items-center">
    <?php avatar(40);
    avatar(40);
    avatar(40);
    avatar(40); ?>
  </div>

<?php }

?>




<?php

function widget_counters_percent($title, $count, $sign, $percent, $per = "")
{ ?>
  <div class="w-counter-percent mt-1 mb-1">
    <div class="wrap">
      <h6 class="tit"><?php echo $title; ?></h6>
      <h2 class="count"><?php echo $count; ?></h2>
      <h6 class="suffix"><?php echo $per; ?></h6>
      <div class="clearfix"></div>
      <span class="percent <?php echo $sign; ?>"><i data-feather="arrow-<?php echo $sign; ?>"></i><span><?php echo $percent; ?></span></span>
    </div>
  </div>

<?php }

?>




<?php

function widget_mailbox_item($itemid, $view = "")
{
  global $time;
?>
  <!-- list-group-item - start-->
  <div class="list-group-item py-3" aria-current="true">
    <div class="img-wrap">
      <?php avatar(40); ?>
    </div>
    <div class="data-wrap">
      <?php $id = rand(1, 22); ?>
      <div class="d-flex mt-2 w-100 align-items-center justify-content-between">
        <span class="mb-2"><strong class="primary-color"><?php name($id); ?></strong> <span class="light"><?php at_name($id); ?></span></span>
        <small class="ps-1"><?php echo $time[$itemid]; ?></small>
      </div>
      <h6 class="mail-tit col-11  mt-0 mb-2"><?php line(); ?></h6>


      <?php if ($view == "full") { ?>

        <div class="col-11  mt-0 mb-3">
          <?php
          echo "<p>" . paragraph() . "</p>";
          echo "<p>" . paragraph() . "</p>";
          ?>
        </div>

        <div class="row">
          <?php
          $bgcolor = "bg-accent3";
          echo '<div class="col-xs-12 col-sm-6 mb-4 widget-graph-tiles"><div class="widget-wrapper '.$bgcolor.'-10">';
          widget_graph_tiles("image", $bgcolor, "04.32 Mb", "Attach.jpg", "","",  "h6");
          echo '</div></div>';
          ?>
          <?php
          $bgcolor = "bg-accent2";
          echo '<div class="col-xs-12 col-sm-6 mb-4 widget-graph-tiles"><div class="widget-wrapper '.$bgcolor.'-10">';
          widget_graph_tiles("image", $bgcolor, "04.32 Mb", "Picture.jpg", "","",  "h6");
          echo '</div></div>';
          ?>
        </div>




        <?php } else { ?>

        <div class="col-11  mt-0 mb-3">
          <?php sentence(); ?>
        </div>
        <div class="col-11  mt-0 mb-1"><span class="nowrap icon-left-align">
            <span class="icon"><i data-feather="message-circle"></i></span>
            <span class="icon"><i data-feather="heart"></i></span>
            <span class="icon"><i data-feather="share-2"></i></span>
          </span>
        </div>

      <?php } ?>


    </div>
  </div>
  <!-- list-group-item - end-->

<?php
}

?>