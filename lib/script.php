
<style type="text/css">
  body,
  body * {
    font-family: Roboto;
    font-size: 14px;
    line-height: 25px;
  }

  table {
    margin: 30px 10px;
  }

  td,
  th {
    border: 1px solid #eee;
    padding: 5px 8px;
    background: #ffffff;
    position: relative;
  }

  /* table.trades td {
    background-color: transparent;
  } */

  .fundcol {
    max-width: 200px;
  }

  .mcap {
    min-width: 80px;
  }

  .stock-val .per {
    font-size: 12px;
    opacity: 0.4;
    margin-left: 5px;
  }

  .presentdots {
    display: inline-block;
    margin: 0 0 0 5px;
  }

  .presentdots span {
    height: 7px;
    width: 7px;
    margin: 0 2px;
    background-color: #00cc00;
    display: inline-block;
    border-radius: 50%;
  }

  .invest_info {
    font-size: 12px;
    font-style: italic;
    float: right;
    padding: 2px;
    border-radius: 50%;
    height: 12px;
    width: 12px;
    background-color: #eee;
    text-align: center;
    line-height: 12px;
    position: relative;
    top: 5px;
    cursor: pointer;
    position: absolute;
    right: 0px;
    top: 5px;
  }

  .invest-in-stock {
    /* font-weight: bold; */
  }

  .sorthidden {
    opacity: 0.1;
    visibility: hidden;
    font-size: 0.1px;
    width: 1px;
    height: 1px;
    overflow: hidden;
    display: inline-block;
  }

  .per {
    display: none;
  }

  td:hover .per {
    display: inline-block !important;
  }

  .toggle_percent {
    float: right;
    cursor: pointer;
  }

  #merge_table_wrapper th {
    padding: 5px;
    min-width: 200px;
  }

  #merge_table_wrapper th:first-child {
    min-width: 30px;
    max-width: 50px;
  }

  .toggle_percent {
    position: absolute;
    top: 5px;
    right: 5px;
  }

  tr.ignore td {
    background: #dddddd;
    opacity: 0.5;
  }

  .Sbuyinc,
  .Sinvestinc {
    width: 70px;
    border: 1px solid #eee;
    margin: 0 5px;
  }

  .Sbuyplus,
  .Sbuyminus {
    width: 30px;
    border: 1px solid #eee;
    background-color: transparent;
    cursor: pointer;
    outline: none;
  }

  .inc_by_times {
    position: absolute;
    top: 3px;
    right: 7px;
    font-size: 13px;
    font-weight: bold;
    color: #aaaaaa;
  }

  .text-success {
    color: green;
  }

  .text-danger {
    color: red;
  }

  td.vtop {
    vertical-align: top;
  }

  table td.spacer {
    background-color: #eeeeee;
  }

  .all-sections {
    position: fixed;
    top: 150px;
    right: -40px;
    padding: 10px;
    display: inline-block;
    width: 200px;
    height: auto;
    border: 1px solid #cccccc;
    background-color: rgba(255, 255, 255, .9);
  }

  .fixed-box {
    position: fixed;
    border: 1px solid #ccc;
    padding: 5px;
    background-color: #ffffff;
    width: 200px;
    z-index: 9;
  }
  .infotext{
    font-size: 17px;
    margin: 0 5px;
    display: inline-block;
    color: #5248d8;
    cursor: pointer;
    font-weight: bold;
  }
  /* .fixed-box.b100{
    bottom: 100px;
  }
  .fixed-box.r10{
    right: 10px;
  } */

  /* .sector-even td.sector-color{
    background-color: rgba(155,155,0,.05);
  } */
  <?php
  $rgba_colors = random_colors("rgba", "0.07");
  foreach ($rgba_colors as $i => $c) {
    echo ".sector-" . $i . " td{background-color:" . $c . ";}";
  }
  ?>
</style>

<script src="lib/jquery.min.js" type="text/javascript"></script>
