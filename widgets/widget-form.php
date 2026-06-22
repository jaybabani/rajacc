<?php 

?>

<?php $pageid = "index";
include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2">
</div>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 row-cols-xxl-2 g-4 py-3 px-2">

  <?php widget_start("Form", "widget-mailbox", "mb-3"); ?>



  <form class="row g-3 needs-validation" novalidate>

    <div class="col-md-4 mb-3">
      <label for="validationCustom01" class="form-label">First name <sup>*</sup></label>
      <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02" class="form-label">Last name</label>
      <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername" class="form-label">Username</label>
      <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend">@</span>
        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please choose a username.
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <label for="validationCustom03" class="form-label">City</label>
      <input type="text" class="form-control" id="validationCustom03" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-3">
      <label for="validationCustom04" class="form-label">State</label>
      <select class="form-select" id="validationCustom04" required>
        <option selected disabled value="">Choose...</option>
        <option>...</option>
      </select>
      <div class="invalid-feedback">
        Please select a valid state.
      </div>
    </div>
    <div class="col-md-3">
      <label for="validationCustom05" class="form-label">Zip</label>
      <input type="text" class="form-control" id="validationCustom05" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>


    <div class="mb-3">
      <label for="validationTextarea" class="form-label">Textarea</label>
      <textarea class="form-control" id="validationTextarea" placeholder="Required example textarea" required></textarea>
      <div class="invalid-feedback">
        Please enter a message in the textarea.
      </div>
    </div>

    <div class="mb-3">
      <input type="checkbox" class="form-check-input" id="validationFormCheck1" required>
      <label class="form-check-label" for="validationFormCheck1">Check this checkbox</label>
      <div class="invalid-feedback">Example invalid feedback text</div>
    </div>

    <div class="">
      <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
      <label class="form-check-label" for="validationFormCheck2">Toggle this radio</label>
    </div>
    <div class="mb-3">
      <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
      <label class="form-check-label" for="validationFormCheck3">Or toggle this other radio</label>
      <div class="invalid-feedback">More example invalid feedback text</div>
    </div>

    <div class="col-md-6 mb-3">
      <select class="form-select" required aria-label="select example">
        <option value="">Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
      <div class="invalid-feedback">Example invalid select feedback</div>
    </div>

    <div class="col-md-6 mb-3">
      <input type="file" class="form-control" aria-label="file example" required>
      <div class="invalid-feedback">Example invalid form file feedback</div>
    </div>

    <div class="col-md-4 mb-3">
      <label for="customRange1" class="form-label">Example range</label>
      <input type="range" class="form-range" id="customRange1">
    </div>

    <div class="col-md-4 mb-3">
      <label for="customRange1" class="form-label">Switch</label>
        <div class="clearfix"></div>
      <label class="switch mt-2">
        <input type="checkbox" checked>
        <span class="slider"></span>
      </label>
      <label class="switch-label">Agree to terms</label>
    </div>

    <div class="col-md-3">
      <label for="validationCustom05" class="form-label">Date</label>
      <input type="text" class="form-control" id="datepicker" required>
      <div class="invalid-feedback">
        Please provide a valid date.
      </div>
    </div>


    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label" for="invalidCheck">
          Agree to terms and conditions
        </label>
        <div class="invalid-feedback">
          You must agree before submitting.
        </div>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
  </form>



  <?php widget_end(); ?>

</div>

<?php
$other_scripts = '<link rel="stylesheet" href="'. ROOT_PATH.'/assets/plugins/flatpickr/flatpickr.min.css">
<script src="'. ROOT_PATH.'/assets/plugins/flatpickr/flatpickr.js"></script><script>flatpickr("#datepicker", {}); </script>';
?>

<?php include(__DIR__."/../common/footer.php"); ?>


