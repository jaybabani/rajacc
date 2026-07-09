<?php
require_once((dirname(__FILE__)) . '/../../vendor/autoload.php');
include_once("../../common/includes.php");

$module = "invoices";
$pageid = "invoices-build";
$invoice_str_id = "";

$test = rand();
$pdfcontent = "";
if (isset($_GET['invoice']) && trim($_GET['invoice']) != '') {
  $invoice_str_id = $_GET['invoice'];
  $strexp = explode("-", $invoice_str_id);
  if (sizeof($strexp) == 5) {
    $inv = $strexp[1];
    $invid = $strexp[3];
    if (is_numeric($invid)) {
      $pdfcontent = process_invoice_html($invid, $inv);
    }
  }
}

$mpdf = new \Mpdf\Mpdf([
  'margin_top' => 5,     // top margin in mm
  'margin_bottom' => 5   // bottom margin in mm
]);
$mpdf->autoScriptToLang = true;
$mpdf->autoLangToFont = true;
$mpdf->WriteHTML($pdfcontent);
$mpdf->Output('files/invoice-' . $test . '.pdf', 'I');

// output mode
// I = send the file inline to the browser.
// F enter code here= save to a local file with the name given by $filename.
// S = return the document as a string. $filename is ignored.
// D = send to the browser and force a file download with the name given by $filename.

function invoice_build_details($placeholders, $invoice_id, $invt)
{
  global $inv_adjust;

  $tablename = "invoices";
  $data = module_get_data($tablename, $invoice_id);
  $invoice_items_data = get_invoice_items($invoice_id);

  $dispatch_data = [];
  $order_data = [];
  $customer_data = [];
  $gst_type = "";

  $placeholders["invoice_date"] = ymd_to_dt($data["created_on_date"]);

  $placeholders["invoice_no"] = get_module_id_prefix("invoices") . $invoice_id;
  if(isset($data["created_on_date"]) && is_numeric($data["created_on_date"]) && $data["created_on_date"] > 0){
    $finyear = getFinancialYears($data["created_on_date"]); 
    $placeholders["invoice_no"] = $placeholders["invoice_no"]."/".($invt == "t" ? $finyear["ay"] : $finyear["fy"]);
  }
  

  $rate_adjust = 1;
  if (isset($inv_adjust) && is_numeric($inv_adjust)) {
    $rate_adjust = $inv_adjust;
  }

  if (isset($data["dispatch"]) && $data["dispatch"] != "") {

    $dispatch_data = module_get_data("dispatchs", $data["dispatch"]);
    $placeholders["dispatch_doc_no"] = get_module_id_prefix("dispatchs") . $dispatch_data["id"] ?? "";

    if (isset($dispatch_data["order_id"]) && $dispatch_data["order_id"] != "") {

      $order_data = module_get_data("orders", $dispatch_data["order_id"]);


      $placeholders["vehicle_no"] = $dispatch_data["vehicle_no"] ?? "";
      $placeholders["transport_document_no"] = $dispatch_data["transport_document_no"] ?? "";
      // $placeholders["transport_name"] = $dispatch_data["transporter_name"] ?? "";
      // if ($placeholders["transport_name"] != "") {
      //   $placeholders["transport_name"] = " (" . $placeholders["transport_name"] . ")";
      // }


      $placeholders["buyer_order_no"] = get_module_id_prefix("orders") . $dispatch_data["order_id"] ?? "";
      $placeholders["buyer_order_date"] = ymd_to_dt($order_data["order_date"]) ?? "";

      if (isset($order_data["customer"]) && $order_data["customer"] != "") {
        $customer_data = module_get_data("customers", $order_data["customer"]);

        if (sizeof($customer_data) > 0) {
          $gst_type = $customer_data["gst_type"];

          $gst_states_arr = get_gst_states_arr();
          $gst_state = $customer_data["gst_state"];
          $gst_state_name = "";
          $gst_state_code = "";
          if ($gst_state != "" && $gst_state != NULL && isset($gst_states_arr[$gst_state])) {
            $gst_state_name = $gst_states_arr[$gst_state];
            $gst_state_code = $gst_state;
          }

          $placeholders["ship_to_company"] = $customer_data["firm_name"] ?? "";
          $placeholders["ship_to_address"] = "<p>" . ($customer_data["firm_address"] ?? "") . "<p>";
          $placeholders["ship_to_taxinfo"] = $invt == "t" ?
            "<p>GSTIN/UIN: " . ($customer_data["gst"] ?? "") . "</p>" .
            "<p>State Name: " . $gst_state_name . "" .
            "&nbsp; Code: " . $gst_state_code . "</p>"
            : "";

          $placeholders["buyer_company"] = $customer_data["firm_name"] ?? "";
          $placeholders["buyer_address"] = "<p>" . ($customer_data["firm_address"] ?? "") . "</p>";
          $placeholders["buyer_taxinfo"] = $invt == "t" ?
            "<p>GSTIN/UIN: " . ($customer_data["gst"] ?? "") . "</p>" .
            "<p>State Name: " . $gst_state_name . "" .
            "&nbsp; Code: " . $gst_state_code .
            "<br>Place of Supply: " . $gst_state_name . "</p>"
            . "<p>Contact Name: " . ($customer_data["owner_name"] ?? "") . "</p>"
            . "<p>Contact: " . ($customer_data["owner_phone"] ?? "") . "</p>"
            : "";
        }
      }
    }
  }

  $items = "";
  $tax_summary = [];
  $tax_summary_html = "";

  // $items .= "<tr><td colspan=8>data: " . json_encode($data) . "</td></tr>";
  // $items .= "<tr><td colspan=8>dispatch: " . json_encode($dispatch_data) . "</td></tr>";
  // $items .= "<tr><td colspan=8>order: " . json_encode($order_data) . "</td></tr>";
  // $items .= "<tr><td colspan=8>customer: " . json_encode($customer_data) . "</td></tr>";
  $product_ids = [];
  foreach ($invoice_items_data as $ik => $iv) {
    $product_ids[] = $iv["product"];
  }
  $product_ids = array_filter(array_unique($product_ids));
  $products_arr = [];

  $condition = "";
  if (sizeof($product_ids) > 0) {
    $condition = " id IN (" . implode(",", $product_ids) . ")";
    $products_arr = fetch_data(["table" => "products", "columns" => "id, product, pieces", "condition" => $condition, "order" => "product ASC", "limit" => ""]);    // print_arr($products_arr);
    foreach ($products_arr as $k => $v) {
      $products[$v["id"]] = $v;
    }
  }

  $sr = 0;
  $sub_total = 0;
  $total_tax = 0;
  $sub_total_t = 0;
  foreach ($invoice_items_data as $ik => $iv) {

    if (isset($products[$iv["product"]])) {
      $sr++;

      $pcs = $products[$iv["product"]]["pieces"];
      if ($pcs > 1) {
        $pcs = "Set";
      } else {
        $pcs = "pc";
      }


      $rate = round($iv["rate"], 2);
      // $rate_t = $rate;

      // if ($invt == "t") {
      $rate_t = round($iv["rate"] * $rate_adjust);
      // }

      $quantity = round($iv["quantity"], 2);
      // $prod_subtot = ($rate_t * $quantity);

      $discount_disp = "";
      $discount = round($iv["discount"], 2);
      $discount_val = 0;

      if ($discount != "" && $discount != "0" && $discount > 0) {
        $discount_val = round((round($rate * $quantity) * ($discount / 100)), 1);
        $discount_disp = $discount_val; // . " (" . $discount . "%)";
        // $discount .= "%";
      }


      $amount = round((round($rate * $quantity) - $discount_val), 1);
      $amount_t = round((round($rate_t * $quantity) - $discount_val), 1);

      $taxpercent = 0;
      if ($gst_type == "outer") {
        $taxpercent = $iv["igst"];
      } else if ($gst_type == "inter") {
        $taxpercent = $iv["cgst"] + $iv["sgst"];
      }
      $taxable_amount = (($rate_t * $quantity) - $discount_val);
      $tax = ((($rate_t * $quantity) - $discount_val) * ($taxpercent / 100));

      $sub_total += $amount;
      $sub_total_t += $amount_t;
      $total_tax += $tax;

      $tax_summary[] = [
        "sr" => $sr,
        "hsn_sac" => $iv["hsn_sac"] ?? $sr,
        "taxpercent" => $taxpercent,
        "tax" => $tax,
        "taxable_amount" => $taxable_amount,
      ];


      $items .= "<tr><td class='center'>" . $sr . "</td><td><strong>" . $products[$iv["product"]]["product"] . "<strong></td>
      <td></td>
      <td class='center'>" . $quantity . "</td>
      <td class='right'>" . (($invt == "t") ? $rate_t : $rate) . "</td>
      <td class='center'>" . $pcs . "</td>
      <td class='right'>" . $discount_disp . "</td>
      <td class='right'><strong>" . (($invt == "t") ? $amount_t : $amount) . "<strong></td>
      </tr>";
    }


    // $items .= "<tr><td colspan=8>" . json_encode($iv) . "</td></tr>";
  }

  $placeholders["invoice_items"] = $items;

  $packing_cost = 0;
  if (isset($dispatch_data["packing_cost"]) && $dispatch_data["packing_cost"] != "") {
    $packing_cost = $dispatch_data["packing_cost"];
  }
  $placeholders["packing_cost"] = $invt == "t" ? "" : "<tr>
      <td></td>
      <td>Packing Charges</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td class='right'><strong>" . $packing_cost . "</strong></td>
    </tr>";

  $transport_cost = 0;
  if (isset($dispatch_data["transport_cost"]) && $dispatch_data["transport_cost"] != "") {
    $transport_cost = $dispatch_data["transport_cost"];
  }
  $transport_name = (isset($dispatch_data["transporter_name"]) && $dispatch_data["transporter_name"] != "") ? " (" . $dispatch_data["transporter_name"] . ") " : "";
  $placeholders["transport_cost"] = $invt == "t" ? "" : "<tr>
      <td></td>
      <td>Delivery Charges " . $transport_name . "</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td class='right'><strong>" . $transport_cost . "</strong></td>
    </tr>";


  $loading_cost = 0;
  if (isset($dispatch_data["loading_cost"]) && $dispatch_data["loading_cost"] != "") {
    $loading_cost = $dispatch_data["loading_cost"];
  }
  $placeholders["loading_cost"] = $invt == "t" ? "" : "<tr>
      <td></td>
      <td>Loading Charges</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td class='right'><strong>" . $loading_cost . "</strong></td>
    </tr>";

  $other_cost = 0;
  if (isset($dispatch_data["other_cost"]) && $dispatch_data["other_cost"] != "") {
    $other_cost = $dispatch_data["other_cost"];
  }
  $placeholders["other_cost"] = $invt == "t" ? "" : "<tr>
      <td></td>
      <td>Other Charges</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td class='right'><strong>" . $other_cost . "</strong></td>
    </tr>";

  $placeholders["tax_cost_title"] = $invt == "t" ? "IGST Output" : "IOC";

  $total_tax = round($total_tax);

  if($invt == "t"){
    $total = round((($sub_total_t) + $total_tax));
  } else {
    $total = round((($sub_total) + $packing_cost + $transport_cost + $loading_cost + $other_cost + $total_tax));
  }

  $placeholders["tax_cost"] = $total_tax;
  $placeholders["total"] = $total;

  $placeholders["total_in_words"] = convertNumberToWordsForIndia($total);


  $tsh = "";
  $hsnrow = [];
  if ($invt == "t") {
    foreach ($tax_summary as $tk => $tv) {
      if (!isset($hsnrow[$tv["hsn_sac"]])) {
        $hsn = $tv["hsn_sac"];
        $hsnrow[$hsn] = [];
        $hsnrow[$hsn]["amount"] = 0;
        $hsnrow[$hsn]["tax"] = 0;
        $hsnrow[$hsn]["percent"] = $tv["taxpercent"];
      }
      $hsnrow[$hsn]["amount"] += $tv["taxable_amount"];
      $hsnrow[$hsn]["tax"] += $tv["tax"];
    }

    // $tax_summary_html = "" . $total_tax . json_encode($tax_summary)."<br>";
    $ts_taxable = 0;
    $ts_tax = 0;
    $ts_tax_amount = 0;

    foreach ($hsnrow as $hk => $hv) {
      // $tsh .= "<tr><td>".json_encode($hv)."</td></tr>";
      $tsh .= "<tr><td class='left'>" . $hk . "</td><td class='right'>" . $hv["amount"] . "</td><td class='center'>" . round($hv["percent"]) . "%</td><td class='center'>" . round($hv["tax"], 1) . "</td><td class='right'>" . round($hv["tax"]) . "</td></tr>";
      $ts_taxable += $hv["amount"];
      $ts_tax += round($hv["tax"], 1);
      $ts_tax_amount += round($hv["tax"], 1);
    }

    $tax_summary_html .= json_encode($hsnrow);

    $tax_summary_html = "<table border='0' cellspacing='0' cellpadding='0' class='items'>
    <tr><td rowspan='2' class='w25 center'>HSN / SAC</td><td rowspan='2' class='w25 center'>Taxable Value</td>
    <td colspan='2' class='w25 center'>Integrated Tax</td>
    <td rowspan='2' class='w25 center'>Total Tax Amount</td></tr>
    <tr><td>Rate</td><td>Amount</td></tr>
    " . $tsh .
      "<tr><td class='right'><strong>Total</strong></td><td class='right'><strong>" . round($ts_taxable) . "</strong></td><td class='center'></td><td class='center'><strong>" . round($ts_tax) . "</strong></td><td class='right'><strong>" . round($ts_tax_amount) . "</strong></td></tr>"
      . "<tr>
      <td colspan='5' class='bt'>
        <p>Tax Amount (in words)</p>
        <strong>" . convertNumberToWordsForIndia(round($ts_tax_amount)) . "</strong>
      </td>
    </tr>"
      . "</table>";
  }

  $placeholders["tax_summary_table"] = $tax_summary_html;

  return $placeholders;
}


function process_invoice_html($invoice_str_id, $invt)
{

  $html = invoice_html();

  $placeholders = [];

  $placeholders["company"] = "R.A.";
  $placeholders["address"] = "Pin Code: 380015";
  $placeholders["terms_of_payment"] = "25 Days";
  $placeholders["seller_gst"] = "";
  $placeholders["seller_pan"] = "";

  if ($invt == "t") {
    $placeholders["company"] = "Husk Inc";
    $placeholders["address"] = "A-11, GF, Sumel-6, Opp. Hanumanpura BRTS,<br>Dudheshwar, Ahemdabad-04, M: 9978628212,<br>GSTIN/UIN: 24AASFH0222P1Z6,<br>Mobile no. : 9978628212<br>Pin code : 380004<br>GSTIN/UIN : 24AASFH0222P1Z6<br>E-Mail : sales@huskinc.com";
    $placeholders["terms_of_payment"] = "30 Days";
    $placeholders["seller_gst"] = "24AASFH0222P1Z6";
    $placeholders["seller_pan"] = "";
  }

  $placeholders["invoice_no"] = "";
  $placeholders["invoice_date"] = "";
  $placeholders["delivery_note"] = "";
  $placeholders["reference_no"] = "";
  $placeholders["other_reference"] = "";
  $placeholders["ship_to_company"] = "";
  $placeholders["ship_to_address"] = "";
  $placeholders["buyer_order_no"] = "";
  $placeholders["buyer_order_date"] = "";
  $placeholders["dispatch_doc_no"] = "";
  $placeholders["delivery_note_date"] = "";
  $placeholders["dispatched_through"] = "";
  $placeholders["destination"] = "";
  $placeholders["buyer_company"] = "";
  $placeholders["buyer_address"] = "";
  $placeholders["buyer_taxinfo"] = "";
  $placeholders["transport_document_no"] = "";
  $placeholders["vehicle_no"] = "";
  $placeholders["terms_of_delivery"] = "";
  $placeholders["invoice_items"] = "";
  $placeholders["packing_cost"] = "";
  $placeholders["transport_name"] = "";
  $placeholders["transport_cost"] = "";
  $placeholders["tax_cost"] = "";
  $placeholders["total"] = "";
  $placeholders["total_in_words"] = "";
  $placeholders["tax_summary_table"] = "";

  $placeholders = invoice_build_details($placeholders, $invoice_str_id, $invt);

  foreach ($placeholders as $pk => $pv) {
    // if ($pv != "") { // todo: comment this if later
    $html = str_replace("%" . $pk . "%", $pv, $html);
    // }
  }

  // $html .= $amountval;
  return $html;
}

function invoice_html()
{

  // return "<p>Hello<p>";
  $s = file_get_contents((dirname(__FILE__)) . "/style.html");
  $t = file_get_contents((dirname(__FILE__)) . "/template.html");
  return $s . $t;
  // return file_get_contents((dirname(__FILE__)) . "/template.html");
}



function convertNumberToWordsForIndia($number)
{
  //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
  $words = array(
    '0' => '',
    '1' => 'one',
    '2' => 'two',
    '3' => 'three',
    '4' => 'four',
    '5' => 'five',
    '6' => 'six',
    '7' => 'seven',
    '8' => 'eight',
    '9' => 'nine',
    '10' => 'ten',
    '11' => 'eleven',
    '12' => 'twelve',
    '13' => 'thirteen',
    '14' => 'fouteen',
    '15' => 'fifteen',
    '16' => 'sixteen',
    '17' => 'seventeen',
    '18' => 'eighteen',
    '19' => 'nineteen',
    '20' => 'twenty',
    '30' => 'thirty',
    '40' => 'fourty',
    '50' => 'fifty',
    '60' => 'sixty',
    '70' => 'seventy',
    '80' => 'eighty',
    '90' => 'ninty'
  );

  //First find the length of the number
  $number_length = strlen($number);
  //Initialize an empty array
  $number_array = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
  $received_number_array = array();

  //Store all received numbers into an array
  for ($i = 0; $i < $number_length; $i++) {
    $received_number_array[$i] = substr($number, $i, 1);
  }

  //Populate the empty array with the numbers received - most critical operation
  for ($i = 9 - $number_length, $j = 0; $i < 9; $i++, $j++) {
    $number_array[$i] = $received_number_array[$j];
  }

  $number_to_words_string = "";
  //Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
  for ($i = 0, $j = 1; $i < 9; $i++, $j++) {
    //"01,23,45,6,78"
    //"00,10,06,7,42"
    //"00,01,90,0,00"
    if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
      if ($number_array[$j] == 0 || $number_array[$i] == "1") {
        $number_array[$j] = intval($number_array[$i]) * 10 + $number_array[$j];
        $number_array[$i] = 0;
      }
    }
  }

  $value = "";
  for ($i = 0; $i < 9; $i++) {
    if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
      $value = $number_array[$i] * 10;
    } else {
      $value = $number_array[$i];
    }
    if ($value != 0) {
      $number_to_words_string .= $words["$value"] . " ";
    }
    if ($i == 1 && $value != 0) {
      $number_to_words_string .= "Crores ";
    }
    if ($i == 3 && $value != 0) {
      $number_to_words_string .= "Lakhs ";
    }
    if ($i == 5 && $value != 0) {
      $number_to_words_string .= "Thousand ";
    }
    if ($i == 6 && $value != 0) {
      $number_to_words_string .= "Hundred &amp; ";
    }
  }
  if ($number_length > 9) {
    $number_to_words_string = "Sorry This does not support more than 99 Crores";
  }
  return ucwords(strtolower($number_to_words_string) . " Indian rupees Only.");
}
