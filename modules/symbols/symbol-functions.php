<?php

function symbol_get_data()
{
  // include("variables.php");

  global $table_symbols;

  $data = [];
  $data['mode'] = 'new';
  if (
    isset($_GET['id']) &&
    is_numeric($_GET['id']) &&
    trim($_GET['id']) != ''
  ) {
    $get = get_data($table_symbols, 'WHERE id=' . $_GET['id'] . '', '*');
    if (sizeof($get) > 0) {
      $data = $get[0];
    }

    $id = $_GET['id'];
    $data['mode'] = 'update';
  }

  return $data;
}


function symbol_get_data_by_id_arr($arr)
{
  // include("variables.php");

  global $table_symbols;
  $data = [];
  if (sizeof($arr) > 0) {
    $imp = implode(",", $arr);
    $get = get_data($table_symbols, 'WHERE id IN (' . $imp . ') ', '*');
    if (sizeof($get) > 0) {
      foreach ($get as $key => $v) {
        $data[$v["id"]] = $v;
      }
      // $data = $get;
    }
  }

  return $data;
}

function symbol_get_data_by_ID($id)
{
  // include("variables.php");

  global $table_symbols;
  $data = [];
  $get = get_data($table_symbols, 'WHERE id=' . $id . '', '*');
  if (sizeof($get) > 0) {
    $data = $get[0];
  }

  return $data;
}


function symbol_submit_form()
{
  global $conn;
  global $table_symbols;

  // include 'variables.php';
  $ts = getts();

  if (isset($_POST['save']) || isset($_POST['savenew'])) {
    // print_r($_POST);
    // die;

    $query = '';
    $query .= " symbol = \"" . $conn->real_escape_string($_POST['symbol']) . "\", ";
    $query .= " strategy = \"" . $_POST['strategy'] . "\", ";
    $query .= " combination = \"" . $_POST['combination'] . "\", ";
    $query .= " exchange = \"" . $conn->real_escape_string($_POST['exchange']) . "\", ";
    $query .= " active = \"" . $conn->real_escape_string($_POST['active']) . "\", ";
    // $query .= " sample_url = \"" . $conn->real_escape_string($_POST['sample_url']) . "\", ";
    // $query .= " timezone = \"" . $_POST['timezone'] . "\", ";
    $query .= " updated = \"" . $ts . "\" ";

    // echo $query;
    // die;

    //for non english languages
    $sql = $conn->query('SET NAMES utf8');

    if ($_POST['mode'] == 'new') {
      // insert

      // $query .= " created = \"".$ts."\" ";
      $q = "INSERT INTO $table_symbols SET " . $query . ' ';
      // echo $q;
      // die;
      $sql = $conn->query($q);

      //echo "New firewall inserted at ". decrypt($datetime);
      if ($sql) {
        notify('success', 'New trading stock added successfully.');

        $id = $conn->insert_id;

        redirect_action($_POST);

        return true;
      } else {
        notify('danger', 'Error in saving.');

        redirect_action($_POST);

        return false;
      }
    } elseif ($_POST['mode'] == 'update') {
      // update
      // $query .= " updated = \"" . $ts . "\" ";
      $sql = $conn->query(" UPDATE $table_symbols SET " . $query . " WHERE id = '" . $_POST['id'] . "' ");

      if ($sql) {
        notify('success', 'Trading Stock Details Updated Successfuly.');
        redirect_action($_POST);

        return true;
      } else {
        notify('danger', 'Error in updating.');
        redirect_action($_POST);

        return false;
      }
    } else {
      // no mode defined
      return false;
    }
  }
}


function symbols_list($format = "html")
{
  global $table_symbols;

  $tbl_res = $table_symbols;

  $page = 1;
  $pagelimit = 100; //50;
  $st = 0;
  $end = $pagelimit;

  if (isset($_GET["page"])) {
    $page = $_GET["page"];
  }

  if ($page > 0) {
    $st = ($page - 1) * $pagelimit;
    $end = $pagelimit;
  }

  $limit = " LIMIT $st, $end ";


  if ($format == "download") {
    $limit = "";
  }



  $order = " id ";

  // $order = " name ASC ";

  if (isset($_GET["sortby"]) && $_GET["sortby"] != "") {
    $sortexp = explode(":", str_replace("|", "", $_GET["sortby"]));
    $sortby = $sortexp[2];

    // echo $sortby;

    if ($sortby == "id") {
      $order = " id ";
    } else if ($sortby == "type") {
      $order = " type, name ASC ";
    } else {
      // default is sort by name
    }
  }

  // Search filter
  /////////////////////
  // $scon = search_query($table_symbols);
  // echo $scon;

  // $cols = "*";
  // $cols = "";

  $cols = "" .
    $tbl_res . ".id, " .
    $tbl_res . ".symbol, " .
    $tbl_res . ".strategy, " .
    $tbl_res . ".combination, " .
    $tbl_res . ".active, " .
    $tbl_res . ".generated_trade_on, " .
    $tbl_res . ".fetched_price_on, " .
    $tbl_res . ".exchange ";

  $query = "";


  // if ($scon != '') {
  //   $query .=   " WHERE " . $scon . " ";
  // }

  $query .= " ORDER BY " . $order . " " . $limit;

  // echo $query . "<br>";

  $rows = get_data($tbl_res, $query, $cols);

  $disp = array();
  foreach ($rows as $row) {
    // echo "<pre>";
    // print_r($row);
    // echo "</pre>";

    // $a = [];
    $row_id = trim($row['id']);
    $symbol = trim($row['symbol']);
    $strategy = $row["strategy"];
    $combination = $row["combination"];
    $active = $row["active"];
    $exchange = $row["exchange"];
    $generated_trade_on = $row["generated_trade_on"] ?? "";
    $fetched_price_on = $row["fetched_price_on"] ?? "";

    $display_record = true;


    if ($display_record == true) {
      if (!isset($disp[$row_id])) {
        $disp[$row_id] = array();
        $disp[$row_id] = array(
          "row_id" => $row_id,
          "symbol" => $symbol,
          "strategy" => $strategy,
          "combination" => $combination,
          "active" => ($active == "yes" ? "Active" : "Inactive"),
          "exchange" => $exchange,
          "generated_trade_on" => ($generated_trade_on != "" ? dateFormat($generated_trade_on, "Ymd", "d M Y, l") : ""),
          "fetched_price_on" => ($fetched_price_on != "" ? dateFormat($fetched_price_on, "Ymd", "d M Y, l") : ""),
        );
      }
    }
  }


  // echo "<pre>";
  // print_r($disp);
  // echo "</pre>";
  // die;

  if ($format == "download") {
    return $disp;
  } else {

    // echo "<pre>";
    // print_r($disp);
    // echo "</pre>";


    foreach ($disp as $id => $res) {
      display_symbol_row($id, $res);
    }
    return $disp;
  }
}

function create_symbol_initial($str)
{
  $clean = preg_replace("/[^a-zA-Z0-9 ]/", "", $str);
  $a = strtolower($clean);
  $a = str_replace(" ", "_", $a);
  $ret = substr($a, 0, 41) . "";
  return $ret;
}


function display_symbol_row($id, $res)
{
?>

  <tr class="">
    <td class="gray"><span class="nowrap"><?php echo $res["row_id"]; ?></span></td>
    <td class="title" style="width:15%"><span class=""><?php echo $res["symbol"]; ?></span></td>
    <td class="gray" style="width:10%"><span class=""><?php echo $res["exchange"]; ?></span></td>
    <td class="gray" style="width:10%"><span class=""><?php echo $res["strategy"]; ?></span></td>
    <td class="gray" style="width:15%"><span class=""><?php echo $res["combination"]; ?></span></td>
    <td class="gray" style="width:10%"><span class=""><?php echo $res["active"]; ?></span></td>
    <td class="gray" style="width:10%"><span class=""><?php echo $res["fetched_price_on"]; ?></span></td>
    <td class="gray" style="width:10%"><span class=""><?php echo $res["generated_trade_on"]; ?></span></td>
    <td class="" style="width:5%"><span class="nowrap">
        <a href='symbol-form.php?id=<?php echo $res["row_id"]; ?>'><span class="icon"><i data-feather="edit"></i></span></a>
        <a href='symbol-delete.php?id=<?php echo $res["row_id"]; ?>'><span class="icon"><i data-feather="trash"></i></span></a>
      </span>
    </td>
  </tr>

<?php }





function symbol_submit_delete_form()
{
  global $conn;
  global $table_symbols;

  // include("variables.php");

  if (isset($_POST['delete'])) {
    // echo "<br><br><br>"; print_r($_POST);
    // die;


    $query = " id = \"" . $_POST["id"] . "\" ";

    $sql = $conn->query("DELETE FROM $table_symbols WHERE " . $query . " ");

    //echo "New firewall inserted at ". decrypt($datetime);
    if ($sql) {
      notify("success", "Symbol Deleted Successfully.");
      echo "<script>window.top.location='symbols.php'</script>";
      // $id = $conn -> insert_id;
    }
  }
  // die();
}


function recent_trade_delete_form()
{
  global $conn;
  global $table_trades;

  // include("variables.php");

  if (isset($_POST['delete'])) {
    // echo "<br><br><br>"; print_r($_POST);
    // die;


    $query = " id = \"" . $_POST["id"] . "\" ";

    $sql = $conn->query("DELETE FROM $table_trades WHERE " . $query . " ");

    // echo " |". $_POST["goto"] ?? "|";
    // die;

    $goto = $_POST["goto"];

    //echo "New firewall inserted at ". decrypt($datetime);
    if ($sql) {
      notify("success", "Recent Trade Deleted Successfully.");
      echo "<script>window.top.location='" . $goto . "'</script>";
      // $id = $conn -> insert_id;
    }
  }
  // die();
}



function symbol_search_query($table, $field, $value, $op, $scon)
{

  global $table_symbols;

  if ($table == $table_symbols) {

    // Search Name string
    if ($field == "name" && trim($value) != "") {
      $scon .= $table . ".name " . trim($value) . " " . $op . " ";
    }

    // Search by ID
    if ($field == "ID" && trim($value) != "") {
      $scon .= $table . ".id " . trim($value) . " " . $op . " ";
    }

    // Search By symbol_type
    if ($field == "type" && trim($value) != "") {
      $scon .= $table . ".type " . trim($value) . " " . $op . " ";
    }

    // Search counter
    if ($field == "counter" && trim($value) != "") {
      $scon .= $table . ".counter " . trim($value) . " " . $op . " ";
    }
  }

  return $scon;
}

function symbols_sortby()
{
  $arr = [];
  $arr['name'] = 'Name';
  $arr['id'] = 'ID';
  $arr['type'] = 'Symbol type';
  return $arr;
}

function get_symbols()
{
  global $table_symbols;

  $dept_rows = get_data(
    $table_symbols,
    '',
    'id,name',
    'name'
  );
  $orgs = [];
  foreach ($dept_rows as $key => $value) {
    $orgs[$value['id']] = trim($value['name']);
  }
  return $orgs;
}


function get_active_arr()
{
  $arr = [
    'yes' => 'Active',
    'no' => 'Inactive',
  ];

  return $arr;
}

function generate_symbol_text($symbol_id, $symbol_var)
{

  $data = symbol_get_data_by_ID($symbol_id);
  $str = "";
  if (isset($data["detail"])) {
    $str = $data["detail"];

    foreach ($symbol_var as $key => $value) {
      $str = str_replace($key, $value, $str);
    }
  }



  return $str;
}



function recent_trade_get_data()
{
  // include("variables.php");

  global $table_trades;

  $data = [];
  $data['mode'] = 'new';
  if (
    isset($_GET['id']) &&
    is_numeric($_GET['id']) &&
    trim($_GET['id']) != ''
  ) {
    $get = get_data($table_trades, 'WHERE id=' . $_GET['id'] . '', '*');
    if (sizeof($get) > 0) {
      $data = $get[0];
    }

    $id = $_GET['id'];
    $data['mode'] = 'update';
  }

  return $data;
}

function get_trades_list_by_date($ymd)
{

  $ret = [];

  global $conn;

  // by date or by trading symbol itself
  $findsql = "SELECT * FROM trades WHERE ymd_eod = '" . $ymd . "' OR order_placed_on = '" . $ymd . "' OR order_updated_on = '" . $ymd . "' ORDER BY id ASC ";
  $find = $conn->query($findsql);
  $totrows_new = mysqli_num_rows($find);
  if ($totrows_new > 0) {
    while ($r = mysqli_fetch_assoc($find)) {
      $ret[] = $r;
      // print_arr($r);
    }
  }
  return $ret;
}

function get_trades_list_by_trade_symbol($trade_symbol)
{

  $ret = [];
  global $conn;

  // by date or by trading symbol itself
  $findsql = "SELECT * FROM trades WHERE tradeID LIKE '" . $trade_symbol . "%' ORDER BY id ASC ";
  $find = $conn->query($findsql);
  $totrows_new = mysqli_num_rows($find);
  if ($totrows_new > 0) {
    while ($r = mysqli_fetch_assoc($find)) {
      $ret[] = $r;
      // print_arr($r);
    }
  }
  return $ret;
}

function get_trades_list_by_all_in_symbol($symbol)
{

  $ret = [];
  global $conn;

  // by date or by trading symbol itself
  $findsql = "SELECT * FROM trades WHERE symbol = '" . $symbol . "' ORDER BY id ASC ";
  $find = $conn->query($findsql);
  $totrows_new = mysqli_num_rows($find);
  if ($totrows_new > 0) {
    while ($r = mysqli_fetch_assoc($find)) {
      $ret[] = $r;
      // print_arr($r);
    }
  }
  return $ret;
}


function display_trades($trades)
{

  $funds_req = 0;

  echo '<div class="widget-table">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col" class="">ID</th>
            <th scope="col" class="">Trading Stock</th>
            <th scope="col">Price / Qty.</th>
            <th scope="col">Type</th>
            <th scope="col">Created On EOD</th>
            <th scope="col">Status</th>
            <th scope="col">Order Status</th>
            <th scope="col">Order Placed On</th>
            <th scope="col">Order Updated On</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>';
  if (sizeof($trades) > 0) {
    foreach ($trades as $tk => $tv) {
      // echo $tk;
      // print_arr($tv);
      // echo $tv;

      if($tv["status"] == "new" &&  $tv["type"] == "buy_call_at_eod"){
        $funds_req = $funds_req + (float)((float)$tv["price"] * (float)$tv["quantity"]);
      }


      $crid_url = "recent-trades.php?trade_symbol=".strtolower($tv["symbol"])."-s3-c".$tv["combination_report_id"]."-";

      echo "<tr>";
      echo "<td>" . $tv["id"] . "</td>";
      echo "<td title='" . $tv["tradeID"] . "'>" . $tv["symbol"] . "<br><small><a href='".$crid_url."'>(" . $tv["combination_report_id"] . ")</a></small></td>";
      echo "<td>Price: " . $tv["price"] . " | Qty: " . $tv["quantity"] . "</td>";
      echo "<td>" . $tv["type"] . "</td>";
      echo "<td>" . dateFormat($tv["date_eod"], "Y-m-d", "d M Y, l") . "</td>";
      echo "<td>" . $tv["status"] . "</td>";
      echo "<td>" . $tv["order_status"];
      if ($tv["order_id"] != "") {
        echo "<br><small>Order id: (" . $tv["order_id"] . ")</small>";
      }
      echo "</td>";
      echo "<td>";
      if ($tv["order_placed_on"] != "") {
        echo dateFormat($tv["order_placed_on"], "Ymd", "d M Y, l");
      }
      echo "</td>";
      echo "<td>";
      if ($tv["order_updated_on"] != "") {
        echo dateFormat($tv["order_updated_on"], "Ymd", "d M Y, l");
      }
      echo "</td>";

      $goto = "recent-trades.php";
      if (isset($_GET["trade_symbol"]) && $_GET["trade_symbol"] != "") {
        $goto = "recent-trades.php?trade_symbol=" . $_GET["trade_symbol"];
      } else if (isset($_GET["symbol"]) && $_GET["symbol"] != "") {
        $goto = "recent-trades.php?symbol=" . $_GET["symbol"];
      } else {
        if (isset($_GET["setymd"]) && $_GET["setymd"] != "" && is_numeric($_GET["setymd"])) {
          $goto = "recent-trades.php?setymd=" . $_GET["setymd"];
        }
      }

      echo "<td><a href='recent-trade-delete.php?id=" . $tv["id"] . "&goto=" . $goto . "'>Delete Trade</a>";
      echo "</td>";
      echo "</tr>";
    }
  }

  echo '<tr><td colspan=10>Funds required for new trades: <b><span class="text-success">'.$funds_req.'</span></b></td></tr>';

  echo '</tbody>
      </table></div></div>';
}


?>