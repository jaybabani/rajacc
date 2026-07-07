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

                product has tax percent columns (gst, igst, cgst)
                create new colums in invoice items - discount%, igst%, cgst%, sgst% (gst rates copy from product in invoice items)

  
  ------------
  
                invoice raw materials and products in database.
  make all columns as null for online installation. or default as 0 on int columns
  invoice to be downloaded as pdf
  dashboard widgets for important modules
  acl rights for few different user roles and to be tested.

  ---------------
            column from order items or convert it to salesman committed to this rate. Only for reference in future invoice generation.
            show as msg at top of invoice generation page.

  -------------------

  if dispatch is delivered. add dispatch items as consumed.
  dispatch transport is created. this transport is attached to dispatch.
  transports / delivery module for this

  ---------------------------
  in case if stock is sent and returned back:
  if dispatch is marked as consumed or delivered and then invoice is cancelled
  - dispatch items will be returned and not unreserved.

  ------------------

          Create new payments module. It can send and receive payments.
          For receive payment - Attach payment to invoice. Invoice can have multiple payments.
          for send payments - on purchase of raw material and products. Attach payment to purchase

  ------------------

  For payrolls - add a send payments - attach to employee payroll module.
  Create employee module and attach to user account.
  incentives and Sales commission can be added too in this payroll.
  
  ------------------

  Raw material rates are stored for each raw material.
  This rates are updated to latest price and price history is stored.
  Raw material rate will help in auto calculation of rate in invoice.
  ------------------
  Products and raw materail map to be generated. 
  Production process from raw material to finished products need to be created
  this helps in determining materail consumption in production process.
  also helps in rate calculation during invoice.
  Bar codes to be created for product.

  ------------------

  product minimum qty management. cross check with availale qty in lots.
  add min qty field for each product.
 
  ------------------

  download as excel
  select field in datatable for bulk delete and highlighting feature of each row.
  
  </pre>";  

  widget_end(); ?>

</div>
<?php include(__DIR__ . "/common/footer.php"); ?>