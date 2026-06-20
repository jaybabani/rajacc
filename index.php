<?php
include_once __DIR__ . '/lib/app.php';
include(__DIR__ . "/common/header.php");
?>
<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php widget_start("Module");
  // print_arr($_SESSION);

  echo "<pre>
  CRUD

  data tables
  sorting
  searching
  pagination

  form with fields functions

  ajax save
  acl
  responsive
  download csv or excel
  
  
  static array
  fetch array from db

  

  
  </pre>";  

  widget_end(); ?>

</div>
<?php include(__DIR__ . "/common/footer.php"); ?>