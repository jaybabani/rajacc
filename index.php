<?php
$pageid = "index";
include_once __DIR__ . '/lib/app.php';
include(__DIR__ . "/common/header.php");
?>
<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php widget_start("Dashboard");
  // print_arr($_SESSION);

  echo "<pre>
  
  New Invoice items when saved - in dispatch table insert invoice id in column.
  change status as from pack_and_ready to invoice_generated

  after invoice_generated status dont allow dispatch to be edited / added / deleted.
  dispatch can be edited when invoice is null or empty.

  invoice must be cancelled to allow dispatch items editing. 
  on cancel invoice - it will change dispatch status to new
  on cancel invoice - make invoice null or empty in dispatch table

  on create new invoice form - only show dispatch where invoice is null or empty.
  
  -------------------
  
  Create new payments module. It can send and receive payments.
  For receive payment - Attach payment to invoice. Invoice can have multiple payments.

  
 
  
  
  </pre>";  

  widget_end(); ?>

</div>
<?php include(__DIR__ . "/common/footer.php"); ?>