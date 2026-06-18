$(document).ready(function () {


  $(document).on("click", ".report-options .opt", function () {
    // console.log("hi");
    $(this).toggleClass("active");
    let c = "";
    $('.report-options .opt.active').each(function (i, e) {
      c += "."+$(this).attr("data-cls") + "";
    });
    console.log(c);
    $(".report-row").hide();
    $(".report-row"+c).show();
    $(".report-row"+c).length;
    $(".report-count").html("" + $(".report-row"+c).length + "");
  });

  $(document).on("change", ".nifty-sector-check", function () {
    let symbol = $(this).attr("data-tradingsymbol");
    let id = $(this).attr("data-id");
    console.log(id, symbol);
    nifty_sector_check(id, symbol, this.checked);
  });


  function nifty_sector_check(id, symbol, checked) {

    let formData = { id: id, symbol: symbol, checked: checked, type: "nifty_sector_check" };
    // loader.addClass("loading");
    $.ajax({
      url: "nifty-sector-request.php",
      type: "POST",
      data: formData,
      success: function (response) {
        // loader.removeClass("loading");
        console.log(response);
        if (response.success) {
          console.log("success");
          // if (checked == true && fetchprices == true) {
          //   // alert("Fetch Prices Again");
          //   var myModal = new bootstrap.Modal(document.getElementById('connected_ids_modal'));
          //   myModal.show();

          //   url = "../../symbol-fetch-prices.php?symbol=" + symbol + "&exchange=" + exchange + "" + '&t=' + Date.now();
          //   const iframe = document.getElementById('connected_ids_iframe');
          //   iframe.src = url;
          // }
          // console.log(response);
          // if (type == "add-cluster-symbol") {
          //   $(".all-cluster-symbols-" + clusterid + "").html(response.linked_symbols);
          //   $(".cluster-symbol-add-input[data-cluster-id='" + clusterid + "']").val("");
          //   // $(".cluster-symbol-link-delete[data-cluster-id='"+clusterid+"'][data-cluster-symbol-id='"+symid+"']").hide();
          // }
          // loader.html(response.message);
          // afterResponse();
        } else {
          console.log('Error: ' + response.message);
        }

      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('Error in Ajax request');
        console.log(jqXHR);
      }
    });
  }


  $(document).on("change", ".symbol-combination-check", function () {
    let id = $(this).attr("data-id");
    let symbol = $(this).attr("data-symbol");
    let exchange = $(this).attr("data-exchange");
    let fetchprices = $("#fetch-prices-on-select").prop("checked");
    console.log(id, this.checked, fetchprices);
    symbol_combination_report_check(id, symbol, exchange, this.checked, fetchprices);
    // let v = $(".merge-ids").val();
    // if (this.checked) {
    //   mergeIds = [...mergeIds, id];
    // } else {
    //   let newArray = mergeIds.filter(item => item !== id);
    //   mergeIds = [];
    //   mergeIds = newArray;
    // }
    // console.log(mergeIds);
    // $(".merge-ids").val(mergeIds.toString());
  });


  function symbol_combination_report_check(id, symbol, exchange, checked, fetchprices) {

    let formData = { id: id, symbol: symbol, exchange: exchange, checked: checked, type: "symbol_combination_report_check" };
    // loader.addClass("loading");
    $.ajax({
      url: "symbol-request.php",
      type: "POST",
      data: formData,
      success: function (response) {
        // loader.removeClass("loading");
        console.log(response);
        if (response.success) {
          console.log("success");
          if (checked == true && fetchprices == true) {
            // alert("Fetch Prices Again");
            var myModal = new bootstrap.Modal(document.getElementById('connected_ids_modal'));
            myModal.show();

            url = "../../symbol-fetch-prices.php?symbol=" + symbol + "&exchange=" + exchange + "" + '&t=' + Date.now();
            const iframe = document.getElementById('connected_ids_iframe');
            iframe.src = url;
          }
          // console.log(response);
          // if (type == "add-cluster-symbol") {
          //   $(".all-cluster-symbols-" + clusterid + "").html(response.linked_symbols);
          //   $(".cluster-symbol-add-input[data-cluster-id='" + clusterid + "']").val("");
          //   // $(".cluster-symbol-link-delete[data-cluster-id='"+clusterid+"'][data-cluster-symbol-id='"+symid+"']").hide();
          // }
          // loader.html(response.message);
          // afterResponse();
        } else {
          console.log('Error: ' + response.message);
        }

      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('Error in Ajax request');
        console.log(jqXHR);
      }
    });
  }

  $(document).on("click", ".comment-summary", function () {
    console.log("click summary");
    let id = $(this).attr("data-id");
    if ($(this).hasClass("open")) {
      $(this).removeClass("open");
      $(".trades-detail-list[data-id='" + id + "']").hide();
    } else {
      $(this).addClass("open");
      $(".trades-detail-list[data-id='" + id + "']").show();
    }
  });

  $(document).on("click", "#scrollBtn", function () {
    // console.log("scroll to bottom");
    const el = document.querySelector(".content-area");
    el.scrollTo({
      top: el.scrollHeight,
      behavior: "smooth"
    });
  });



  $(document).on("click", ".toggle-transactions", function () {
    // console.log("click toggle-transactions");
    $(".table.all-transactions").toggleClass("show-all");
  });


});
