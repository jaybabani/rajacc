<?php /* 
<div class="bg-white topbar">

  <ul class="topnav">

    <li class="nav-item nav-icon display-side-nav d-sm-block d-md-none">
      <a class="nav-link" href="#"><span class="icon icon-menu"><i data-feather="menu"></i></span></a>
    </li>

    <li class="nav-item nav-icon display-side-nav d-sm-block d-md-none logo-area">
      <!-- <a class="nav-link" href="#">
        <svg class="logo" width="28" height="28">
          <use xlink:href="#bootstrap" />
        </svg>
      </a> -->
    </li>

    <?php if ($layout == "layout1") { ?>
      <li class="nav-item">
      <span class="page-title">
        Dashboard
      </span>
    </li>      
    <?php } else {
      include("topbar-menu-links.php");
    }
    ?>

    <?php if ($layout == "layout1") { ?>
    
    <?php } else {  ?>
      <!-- <li class="nav-item dropdown right profile" id="myDropdown3">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><?php avatar(40); ?></a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li> <a class="dropdown-item" href="#"> Dropdown item 1 </a></li>
          <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
          <li><a class="dropdown-item" href="#"> Dropdown item 4 </a></li>
        </ul>
      </li> -->
    <?php
    } 
    ?>

    <!-- <li class="nav-item nav-icon right display-side-nav-right">
      <a class="nav-link" href="#"><span class="icon icon-menu"><i data-feather="message-square"></i></span></a>
    </li> -->

  </ul>
</div> */ ?>