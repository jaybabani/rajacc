<?php


function widget_task($mode = "")
{ ?>

  <div class="wrap <?php echo "mode-".$mode; ?>">
    <div class="row header">
      <div class="col-2 text-truncate"><span>Today</span></div>
      <div class="col-10">
        <div class="row">
          <div class="col col-2 text-truncate"><span>Mon</span><span class="badge rounded-pill bg-accent1 d-none d-sm-inline-block">2</span></div>
          <div class="col col-2 text-truncate"><span>Tue</span></div>
          <div class="col col-2 text-truncate"><span>Wed</span></div>
          <div class="col col-2 text-truncate"><span>Thu</span><span class="badge rounded-pill bg-accent2 d-none d-sm-inline-block">7</span></div>
          <div class="col col-2 text-truncate"><span>Fri</span></div>
          <div class="col col-2 text-truncate"><span>Sat</span></div>
        </div>
      </div>
    </div>
    <?php if ($mode != "timeline") { ?>
      <div class="row bglines">
        <div class="col-2"><span></span></div>
        <div class="col-10">
          <div class="row">
            <div class="col-2"></div>
            <div class="col-2"></div>
            <div class="col-2"></div>
            <div class="col-2"></div>
            <div class="col-2"></div>
            <!-- <div class="col-2"></div> -->
          </div>
        </div>
      </div>
    <?php } ?>

    <?php if ($mode == "avatar") { ?>

      <div class="avatar-task">
        <?php task_avatar("09:00", "col col-xs-5 col-sm-8", "offset-0", "bg-primary-30", "Designing"); ?>
        <?php task_avatar("10:00", "col col-xs-5 col-sm-7", "offset-sm-3 offset-xs-1", "bg-accent1-30", "UI/UX Design"); ?>
        <?php task_avatar("11:00", "col col-xs-6 col-sm-7", "offset-1", "bg-accent2-30", "Flutter App"); ?>
        <?php task_avatar("12:00", "col col-xs-6 col-sm-7", "offset-sm-3 offset-xs-1", "bg-accent3-30", "ReactJs Project"); ?>
      </div>


    <?php } else if ($mode == "timeline") { ?>

      <div class="timeline-task">
        <?php task_timeline(1, "09:00", "bg-primary", "Designing"); ?>
        <?php task_timeline(2, "10:00", "bg-accent1", "UI/UX Design"); ?>
        <?php task_timeline(3, "11:00", "bg-accent2", "Flutter App"); ?>
        <?php task_timeline(4, "12:00", "bg-accent3", "ReactJs Project"); ?>
      </div>


    <?php } else { ?>

      <div class="bubbles">
        <?php task_bubble("09:00", "col col-xs-7 col-sm-6", "offset-0", "bg-primary-70", "Designing"); ?>
        <?php task_bubble("10:00", "col col-xs-7 col-sm-6", "offset-3", "bg-accent1-70", "UI/UX Design"); ?>
        <?php task_bubble("11:00", "col col-xs-6 col-sm-5", "offset-1", "bg-accent2-70", "Flutter App"); ?>
        <?php task_bubble("12:00", "col col-xs-7 col-sm-7", "offset-sm-3 offset-xs-3", "bg-accent3-70", "ReactJs Project"); ?>
      </div>

    <?php } ?>

  </div>

<?php  }


function task_bubble($time, $col, $offset, $bg, $title)
{ ?>
  <div class="row">
    <div class="col-1 time ps-0"><span><?php echo $time; ?></span></div>
    <div class="<?php echo $col; ?> <?php echo $offset; ?>">
      <div class="info <?php echo $bg; ?>"><span class="tit"><?php echo $title; ?></span></div>
    </div>
  </div>
<?php  }


function task_avatar($time, $col, $offset, $bg, $title)
{ ?>
  <div class="row">
    <div class="col-1 time ps-0"><span><?php echo $time; ?></span></div>
    <div class="<?php echo $col; ?> <?php echo $offset; ?>">
      <div class="info nowrap row <?php echo $bg; ?>">
        <div class="data-wrap col">
          <h6 class="task-tit mb-0"><?php echo $title; ?></h6>
          <small class="gray task-cat"><?php company(); ?></small>
        </div>
        <span class="avatar-wrap col">
          <?php avatar(30, false);
          avatar(30, false);
          avatar(30, false); ?>
        </span>
      </div>
    </div>
  </div>
<?php  }


function task_timeline($id, $time, $bg, $title)
{ ?>
  <div class="row">
    <div class="time col ps-0"><span><?php echo $time; ?></span></div>
    <div class="info col <?php echo "info-" . $bg; ?>">
      <div class="data-wrap">
        <h6 class="task-tit mb-2"><?php project_name($id); ?></h6>
        <span class="badge <?php echo $bg; ?>"><?php project_category($id); ?></span>
        <div class="gray task-cat"><?php line(); ?></div>
        <!-- <span class="avatar-wrap col">
            <?php avatar(30, false);
            avatar(30, false);
            avatar(30, false); ?>
          </span> -->
      </div>
    </div>
  </div>
<?php  }


?>