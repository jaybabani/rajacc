<?php include(__DIR__."/../common/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 g-4 py-4 px-2">
</div>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 row-cols-xxl-2 g-4 py-3 px-2">

  <?php widget_start("Chat", "widget-chat", "mb-3"); ?>
  <div class="row avatar-row mb-0">
    <div class="col">
      <div class="wrap pb-2">
        <?php avatar(); ?>
        <?php avatar(); ?>
        <?php avatar(); ?>
        <?php avatar(); ?>
        <?php avatar(); ?>
        <?php avatar(); ?>
        <?php avatar(); ?>
      </div>
    </div>
  </div>
  <div class="d-flex flex-column align-items-stretch flex-shrink-0 scrollbar-overlay pt-3" style="height: 550px;">
    <div class="list-group list-group-flush scrollarea">
      <?php widget_chat_item(2, "bg-accent1-10"); ?>
      <?php widget_chat_item(1, "bg-primary-10", "right"); ?>
      <?php widget_chat_item(4, "bg-accent2-10"); ?>
      <?php widget_chat_item(3, "bg-primary-10", "right"); ?>
      <?php widget_chat_item(5, "bg-accent3-10", ""); ?>
      <?php widget_chat_item(6, "bg-primary-10", "right"); ?>
      <?php widget_chat_item(7, "bg-accent3-10"); ?>
    </div>
  </div>

  <?php widget_end(); ?>
</div>

<?php include(__DIR__."/../common/footer.php"); ?>

