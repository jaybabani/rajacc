<?php
$pageid = "index";
include_once __DIR__ . '/lib/app.php';
include(__DIR__ . "/common/header.php");
?>
<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 g-4 py-3 px-2">
  <?php widget_start("Dashboard");
  // print_arr($_SESSION);

  echo "<pre>
        
  ------------
  invoice build: invoice details like buyer details, seller details etc. to be stored separately too like invoice item prices. This will not reflect any future changes in already created invoices.
  ------------
    
  dashboard widgets for important modules
  acl rights for few different user roles and to be tested.
  acl rights to protect sidebar menu and links

  ---------------
            column from order items or convert it to salesman committed to this rate. Only for reference in future invoice generation.
            show as msg at top of invoice generation page.

  -------------------

  in case if stock is sent and returned back:
  if dispatch is marked as consumed or delivered and then invoice is cancelled
  - dispatch items will be returned and not unreserved.

  ------------------

  For payrolls - add a send payments - attach to employee payroll module.
  Create employee module and attach to user account.
  incentives and Sales commission can be added too in this payroll.
  combine acl with this

  ------------------

  Bar codes to be created for product.

  ------------------

  product minimum qty management. cross check with availale qty in lots.
  add min qty field for each product.
 
  ------------------

  download as excel
  select field in datatable for bulk delete and highlighting feature of each row.
  select field is right now commented.
  
  -------------------
  </pre>";  

  widget_end(); ?>

</div>
<?php include(__DIR__ . "/common/footer.php"); ?>