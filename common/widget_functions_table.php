<?php

function widget_table_thead()
{ ?>
  <thead>
    <tr>
      <th scope="col" class="">Name</th>
      <th scope="col" class="d-none d-lg-table-cell">Email</th>
      <th scope="col" class="d-none d-xl-table-cell">Phone</th>
      <th scope="col">Company</th>
      <th scope="col">Status</th>
      <th scope="col" class="d-none d-sm-table-cell">Actions</th>
    </tr>
  </thead>
<?php }

function widget_table_tr(int $count)
{
  global $userBadge;
  $id = rand(1, 22);
?>
  <tr>
    <td class="title"><span class="nowrap"><?php avatar(); ?> <?php name($id); ?></span></td>
    <td class="gray d-none d-lg-table-cell"><span class="text-truncate"> <?php email($id); ?></span></td>
    <td class="d-none d-xl-table-cell"><span class="nowrap"><?php phone(); ?></span></td>
    <td class="gray"><span class="nowrap"><?php company(); ?></span></td>
    <td>
      <h6><?php echo $userBadge[$count]; ?></h6>
    </td>
    <td class="d-none d-sm-table-cell"><span class="nowrap">
        <span class="icon d-none d-md-table-cell"><i data-feather="message-circle"></i></span>
        <span class="icon"><i data-feather="edit"></i></span>
        <span class="icon"><i data-feather="trash"></i></span>
      </span>
    </td>
  </tr>
<?php }



function widget_table_thead2()
{ ?>
  <thead>
    <tr>
      <th scope="col" class="">Project</th>
      <th scope="col" class="d-none d-lg-table-cell">Category</th>
      <th scope="col" style="width:25%;">Team</th>
      <th scope="col">Progress</th>
      <th scope="col" class="d-none d-sm-table-cell">Actions</th>
    </tr>
  </thead>
<?php }

function widget_table_tr2(int $count, $bg, $percent)
{
  global $userBadge;
  $id = rand(1, 10);
?>
  <tr>
    <td class="title"><span class="nowrap text-truncate"><?php project_name($id); ?></span></td>
    <td class="gray d-none d-lg-table-cell"><span class="text-truncate"><?php project_category($id); ?></span></td>
    <td class=""><span class="nowrap">

        <span class="d-none d-xl-table-cell"><?php avatar(35); ?></span>
        <span class="d-none d-lg-table-cell"><?php avatar(35); ?></span>
        <span class="d-none d-sm-table-cell"><?php avatar(35); ?></span>
        <span class=""><?php avatar(35); ?></span>

      </span></td>
    <td class="">
      <div class="progress marker progress-sm <?php echo $bg; ?>-marker">
        <div class="progress-bar <?php echo $bg; ?>" role="progressbar" style="width: <?php echo $percent; ?>%" aria-valuenow="<?php echo $percent; ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </td>
    <td class="d-none d-sm-table-cell"><span class="nowrap">
        <span class="icon d-none d-md-table-cell"><i data-feather="message-circle"></i></span>
        <span class="icon"><i data-feather="edit"></i></span>
        <span class="icon"><i data-feather="trash"></i></span>
      </span>
    </td>
  </tr>
<?php }


?>


<?php

function widget_table_thead3()
{ ?>
  <thead>
    <tr>
      <th scope="col" class="">Name</th>
      <th scope="col" class="d-none d-lg-table-cell">Company</th>
      <th scope="col" class="d-none d-xl-table-cell">Project</th>
      <th scope="col">Status</th>
      <th scope="col" class="d-none d-sm-table-cell">Actions</th>
    </tr>
  </thead>
<?php }

function widget_table_tr3(int $count)
{
  global $userBadge;
  $id = rand(1, 10);
?>
  <tr>
    <td class="avatar-left nowrap">
      <?php avatar(); ?>
      <span class="info-area">
        <div class="title"><?php name($id); ?></div>
        <small class="gray"><?php at_name($id); ?></small>
      </span>
    </td>


    <td class="d-none d-lg-table-cell">
      <div class="title text-truncate"> <?php company(); ?></div>
      <small class="text-truncate gray"> <?php phone(); ?></small>
    </td>


    <td class="d-none d-xl-table-cell">
      <div class="title text-truncate"> <?php project_name($id); ?></div>
      <small class="text-truncate gray"> <?php project_category($id); ?></small>
    </td>
    
    <td>
      <h6><?php echo $userBadge[$count]; ?></h6>
    </td>
    <td class="d-none d-sm-table-cell"><span class="nowrap">
        <span class="icon d-none d-md-table-cell"><i data-feather="edit"></i></span>
        <span class="icon"><i data-feather="trash"></i></span>
      </span>
    </td>
  </tr>
<?php }

?>


