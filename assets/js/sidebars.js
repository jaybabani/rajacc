/* global bootstrap: false */
(function () {
  'use strict'
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()


  // document.addEventListener("DOMContentLoaded", function () {
    // var sideNavScroll = OverlayScrollbars(document.querySelectorAll('.side-nav-scrollbar-overlay'), { });
  // });

if ("undefined" != typeof jQuery) {

  $(document).ready(function () {

    var sideNavScroll = OverlayScrollbars(document.querySelectorAll('.side-nav-scrollbar-overlay'), {});

    $('.toggle-side-nav').on('click', function (e) {
      let body = document.body;
      if (body.classList.contains('mini')) {
        body.classList.remove('mini');
        sideNavScroll = OverlayScrollbars(document.querySelectorAll('.side-nav-scrollbar-overlay'), {});
      } else {
        body.classList.add('mini');
        sideNavScroll.destroy();
      }
    });

    $('.display-side-nav').on('click', function () {
      let body = document.body;
      if (body.classList.contains('show-side-nav')) {
        body.classList.remove('show-side-nav');
      } else {
        body.classList.add('show-side-nav');
      }
    });

    // Side Nav Mouse In and Out
    $('.side-nav').on('mouseenter', function (e) {
      let ontoggle = e.target.classList.contains("toggle-side-nav");
      if(!ontoggle){
        $("body").addClass("side-nav-on");
        sideNavScroll = OverlayScrollbars(document.querySelectorAll('.side-nav-scrollbar-overlay'), {});
      }
    });
    $('.side-nav').on('mouseleave', function () {
      $("body").removeClass("side-nav-on");
    });
 
    $('.drawer-overlay').on('click', function () {
      let body = document.body;
      body.classList.remove('show-side-nav');
      body.classList.remove('show-side-nav-right');
    });
    

    $('.display-side-nav-right').on('click', function () {
      let body = document.body;
      if (body.classList.contains('show-side-nav-right')) {
        body.classList.remove('show-side-nav-right');
      } else {
        body.classList.add('show-side-nav-right');
      }
    });


 
  });
}