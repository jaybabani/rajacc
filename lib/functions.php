<?php
// include_once("functions_modules.php");
// include_once 'functions_member.php';
// include_once("functions_place.php");
// include_once("functions_schedule.php");
// include_once("functions_schedule_member.php");
// include_once("functions_resources.php");
// include_once("functions_analysis.php");
// include_once("file.php");
include_once 'file-functions.php';

function get_data($table, $query, $cols, $order = '', $limit = '')
{
    global $conn;

    if (is_numeric($query)) {
        $where = "id='" . $query . "'";
        $singlearr = true;
    } else {
        $where = $query;
        $singlearr = false;
    }

    $condition = ' ' . $where . ' ';

    if (trim($query) == '') {
        $condition = '';
    }

    if (trim($order) != '') {
        if (strpos($order, " DESC") !== false || strpos($order, " ASC") !== false) {
            $order = ' ORDER BY ' . trim($order) . ' ';
        } else {
            $order = ' ORDER BY ' . trim($order) . ' ASC ';
        }
    }

    if (trim($limit) != '') {
        $limit = ' LIMIT ' . trim($limit) . ' ';
    }

    $ret = [];

    if ($cols == 'all') {
        $cols = '*';
    }
    $sql =
        ' SELECT ' .
        $cols .
        ' FROM ' .
        $table .
        ' ' .
        $condition .
        ' ' .
        $order .
        ' ' .
        $limit .
        ' ';
    // echo $sql."<br>";
    // echo $sql." <br>";
    //if($nonenglish == "true"){
    //$querystr = $conn->query("SET CHARACTER SET utf8 ");
    //$querystr = $conn->query("SET NAMES utf8"); //for non english languages
    //}

    $querystr = $conn->query($sql);

    $totrows = mysqli_num_rows($querystr);
    // echo $sql."<br>";
    if ($totrows > 0) {
        $inc = 0;
        while ($result = mysqli_fetch_object($querystr)) {
            // echo "<pre>";	print_r($result);	echo "</pre>";

            foreach ($result as $key => $value) {
                if ($singlearr) {
                    $ret[$key] = $value;
                } else {
                    $ret[$inc][$key] = $value;
                }
            }
            $inc = $inc + 1;
        }
    }

    return $ret;
}

function get_idval_arr_from_rows($arr, $idcol, $valcol, $returnas = '')
{
    $ret = [];

    if (is_array($valcol) && sizeof($valcol) > 0 && $idcol != '') {
        foreach ($arr as $row) {
            foreach ($row as $colname => $value) {
                if (
                    isset($row[$idcol]) &&
                    isset($row[$colname]) &&
                    in_array($colname, $valcol)
                ) {
                    $ret[$row[$idcol]][$colname] = $row[$colname];
                }
            }
        }
    }

    // if valcol is string
    elseif ($idcol != '' && $valcol != '') {
        foreach ($arr as $row) {
            foreach ($row as $valuearr) {
                if (isset($row[$idcol]) && isset($row[$valcol])) {
                    $ret[$row[$idcol]] = $row[$valcol];
                }
            }
        }
    }

    if ($returnas == 'display_name') {
        $retnew = [];

        foreach ($ret as $id => $v) {
            $fullname = member_display_name($v, 'en');
            $retnew[$id] = $fullname;
        }

        return $retnew;
    } elseif ($returnas == 'display_name_hindi') {
        $retnew = [];

        foreach ($ret as $id => $v) {
            $fullname = member_display_name($v, 'hi');

            $retnew[$id] = $fullname;
        }

        return $retnew;
    } elseif ($returnas == 'display_name_gujarati') {
        $retnew = [];

        foreach ($ret as $id => $v) {
            $fullname = member_display_name($v, 'gu');

            $retnew[$id] = $fullname;
        }

        return $retnew;
    }

    return $ret;
}

function name_title($title, $lang = 'en')
{
    //return $title;

    if ($lang == 'gu') {
        if (strtolower($title) == 'mrs') {
            $title = 'શ્રીમતી';
        } elseif (strtolower($title) == 'mr') {
            $title = 'શ્રી'; //"શ્રીમાન";
        } elseif (strtolower($title) == 'ms') {
            $title = 'સુશ્રી';
        }
    }

    if ($lang == 'hi') {
        if (strtolower($title) == 'mrs') {
            $title = 'श्रीमती';
        } elseif (strtolower($title) == 'mr') {
            $title = 'श्री';
        } elseif (strtolower($title) == 'ms') {
            $title = 'सुश्री';
        }
    }

    if ($lang == 'en') {
        if (strtolower($title) == 'mrs') {
            $title = 'Mrs.';
        } elseif (strtolower($title) == 'mr') {
            $title = 'Mr.';
        } elseif (strtolower($title) == 'ms') {
            $title = 'Ms.';
        }
    }

    return $title;
}

function disp_day_lang($day, $language = '')
{
    $ret = $day;

    $days['hi']['sunday'] = 'रविवार';
    $days['hi']['monday'] = 'सोमवार';
    $days['hi']['tuesday'] = 'मंगलवार';
    $days['hi']['wednesday'] = 'बुधवार';
    $days['hi']['thursday'] = 'गुरुवार';
    $days['hi']['friday'] = 'शुक्रवार';
    $days['hi']['saturday'] = 'शनिवार';

    $days['gu']['sunday'] = 'રવિવાર';
    $days['gu']['monday'] = 'સોમવાર';
    $days['gu']['tuesday'] = 'મંગળવાર';
    $days['gu']['wednesday'] = 'બુધવાર';
    $days['gu']['thursday'] = 'ગુરૂવાર';
    $days['gu']['friday'] = 'શુક્રવાર';
    $days['gu']['saturday'] = 'શનિવાર';

    if ($language == 'gujarati' || $language == 'gu') {
        $ret = $days['gu'][strtolower($day)];
    }

    if ($language == 'hindi' || $language == 'hi') {
        $ret = $days['hi'][strtolower($day)];
    }

    return $ret;
}

function disp_date_lang($dynos, $mn, $langcode = '')
{
    //return $date;

    $months['gu']['jan'] = 'જાન્યુઆરી';
    $months['gu']['feb'] = 'ફેબ્રુઆરી';
    $months['gu']['mar'] = 'માર્ચ';
    $months['gu']['apr'] = 'એપ્રિલ';
    $months['gu']['may'] = 'મે';
    $months['gu']['jun'] = 'જૂન';
    $months['gu']['jul'] = 'જુલાઈ';
    $months['gu']['aug'] = 'ઑગસ્ટ';
    $months['gu']['sep'] = 'સપ્ટેમ્બર';
    $months['gu']['oct'] = 'ઑક્ટ્બર';
    $months['gu']['nov'] = 'નવેમ્બર';
    $months['gu']['dec'] = 'ડિસેમ્બર';

    $months['hi']['jan'] = 'जनवरी';
    $months['hi']['feb'] = 'फ़रवरी';
    $months['hi']['mar'] = 'मार्च';
    $months['hi']['apr'] = 'अप्रैल';
    $months['hi']['may'] = 'मई';
    $months['hi']['jun'] = 'जून';
    $months['hi']['jul'] = 'जुलाई';
    $months['hi']['aug'] = 'अगस्त';
    $months['hi']['sep'] = 'सितंबर';
    $months['hi']['oct'] = 'अक्टूबर';
    $months['hi']['nov'] = 'नवंबर';
    $months['hi']['dec'] = 'दिसंबर';

    $numbers = get_lang_numbers();

    $ret = '';

    $mnstr = $mn;
    if (isset($months[$langcode][strtolower($mn)])) {
        $mnstr = $months[$langcode][strtolower($mn)];
    }

    $ret .= $mnstr . ' ';

    $arr = str_split($dynos);
    foreach ($arr as $key => $value) {
        if (is_numeric($value)) {
            $ret .= $numbers[$langcode][$value];
        } else {
            $ret .= $value;
        }
    }

    return $ret;
}

function get_lang_numbers()
{
    $numbers = [];

    $numbers['hi'][0] = '०';
    $numbers['hi'][1] = '१';
    $numbers['hi'][2] = '२';
    $numbers['hi'][3] = '३';
    $numbers['hi'][4] = '४';
    $numbers['hi'][5] = '५';
    $numbers['hi'][6] = '६';
    $numbers['hi'][7] = '७';
    $numbers['hi'][8] = '८';
    $numbers['hi'][9] = '९';

    $numbers['gu'][0] = '૦';
    $numbers['gu'][1] = '૧';
    $numbers['gu'][2] = '૨';
    $numbers['gu'][3] = '૩';
    $numbers['gu'][4] = '૪';
    $numbers['gu'][5] = '૫';
    $numbers['gu'][6] = '૬';
    $numbers['gu'][7] = '૭';
    $numbers['gu'][8] = '૮';
    $numbers['gu'][9] = '૯';

    return $numbers;
}

function disp_lang_no($no, $language)
{
    $numbers = get_lang_numbers();

    $langcode = '';
    if ($language == 'gujarati' || $language == 'gu') {
        $langcode = 'gu';
    }

    if ($language == 'hindi' || $language == 'hi') {
        $langcode = 'hi';
    }

    $ret = '';
    $arr = str_split($no);
    foreach ($arr as $key => $value) {
        if (isset($numbers[$langcode][$value])) {
            $ret .= $numbers[$langcode][$value];
        } else {
            $ret .= $value;
        }
    }

    return $ret;
}

function disp_lang($label, $language)
{
    //return $label;
    $all = [];
    $all['gu']['Place'] = 'સ્થળ';
    $all['gu']['Date'] = 'તારીખ';
    $all['gu']['Ahmedabad'] = 'અમદાવાદ';

    $all['hi']['Place'] = 'जगह';
    $all['hi']['Date'] = 'दिनांक';
    $all['hi']['Ahmedabad'] = 'अहमदाबाद';
    $langcode = 'en';

    if ($language == 'gujarati' || $language == 'gu') {
        $langcode = 'gu';
    }

    if ($language == 'hindi' || $language == 'hi') {
        $langcode = 'hi';
    }

    if (isset($all[$langcode][$label]) && $all[$langcode][$label] != '') {
        return $all[$langcode][$label];
    } else {
        return $label;
    }
}

function member_display_name($v, $lang)
{
    $fullname = '';

    if (
        $lang == 'hi' &&
        trim($v['firstname_hindi']) != '' &&
        trim($v['lastname_hindi']) != ''
    ) {
        $v['title'] = name_title($v['title'], 'hi');

        //$initial = substr($v['middlename_hindi'],0,1);

        $fullname =
            $v['title'] .
            ' ' .
            $v['firstname_hindi'] .
            ' ' .
            $v['lastname_hindi'];
        /*			if(strlen($fullname) >= 20){
						$fullname = $v['title']." ".$v['firstname']." ".$v['lastname'];
						$fullname = preg_replace("/ {2,}/", " ", $fullname);
						if(strlen($fullname) >= 20){
							$fullname = str_ireplace(" behn","",$fullname);
						}
					}
		*/
        if (isset($v['purchased']) && $v['purchased'] == '1') {
            $fullname .= ' (बाहर से)'; //" (बाहर से)";
        }
    } elseif (
        $lang == 'gu' &&
        trim($v['firstname_gujarati']) != '' &&
        trim($v['lastname_gujarati']) != ''
    ) {
        $v['title'] = name_title($v['title'], 'gu');

        //$initial = substr($v['middlename_hindi'],0,1);

        $fullname =
            $v['title'] .
            ' ' .
            $v['firstname_gujarati'] .
            ' ' .
            $v['lastname_gujarati'];
        /*			if(strlen($fullname) >= 20){
						$fullname = $v['title']." ".$v['firstname']." ".$v['lastname'];
						$fullname = preg_replace("/ {2,}/", " ", $fullname);
						if(strlen($fullname) >= 20){
							$fullname = str_ireplace(" behn","",$fullname);
						}
					}
		*/
        if (isset($v['purchased']) && $v['purchased'] == '1') {
            $fullname .= ' (બહાર થી)';
        }
    } else {
        $v['title'] = name_title($v['title'], 'en');

        $initial = substr($v['middlename'], 0, 1);

        $fullname =
            $v['title'] .
            ' ' .
            $v['firstname'] .
            ' ' .
            $initial .
            ' ' .
            $v['lastname'];
        if (strlen($fullname) >= 20) {
            $fullname =
                $v['title'] . ' ' . $v['firstname'] . ' ' . $v['lastname'];
            $fullname = preg_replace('/ {2,}/', ' ', $fullname);
            if (strlen($fullname) >= 20) {
                $fullname = str_ireplace(' behn', '', $fullname);
            }
        }
        if (isset($v['purchased']) && $v['purchased'] == '1') {
            $fullname .= ' (Ext.)';
        }
    }

    return $fullname;
}

function get_option($type, $return_as = '')
{
    include 'variables.php';

    $value = $data = '';

    if (trim($type) != '') {
        $query = " option_key='" . trim($type) . "' ";
        //echo $query;

        $value = get_data($table_options, $query, 'option_value');

        if (isset($value[0]['option_value'])) {
            $data = $value[0]['option_value'];
        }
    }

    if ($return_as != '' && $data != '') {
        $ret = [];
        $ret = explode_str($data, $return_as, '', 'filter');
        return $ret;
    }

    return $data;
}

function update_option($type, $value = '')
{
    include 'variables.php';

    $return = [];

    if (trim($type) != '') {
        $condition = " option_key='" . trim($type) . "' ";
        //echo $query;

        $check =
            ' SELECT id FROM ' . $table_options . ' WHERE ' . $condition . ' ';
        //echo $check;
        //die();
        $check_query = $conn->query($check);
        $totrows = mysqli_num_rows($check_query);

        if ($totrows > 0) {
            //echo "totrows > 0";
            while ($check_result = mysqli_fetch_object($check_query)) {
                //echo "<pre>";	print_r($check_result);	echo "</pre>";
                $updateID = $check_result->id;
            }
        }

        $query = " option_value='" . trim($value) . "' ";
        $sql = $conn->query(
            ' UPDATE ' .
                $table_options .
                ' SET ' .
                $query .
                " WHERE id = '" .
                $updateID .
                "' "
        );
        $return['updated'][] = $updateID;
    }

    return $return;
}

function get_value($data, $key)
{
    if (isset($data[$key]) && is_array($data)) {
        return $data[$key];
    } else {
        return '';
    }
}

function explode_str($str, $sep1, $sep2, $type)
{
    $exp = [];
    $str = trim($str);

    if ($str != '') {
        $exp = explode($sep1, $str);

        if ($type == 'filterunique') {
            $exp = array_unique(array_filter($exp));
        } elseif ($type == 'filter') {
            $exp = array_filter($exp);
        } elseif ($type == 'unique') {
            $exp = array_unique($exp);
        }
    }

    if ($sep2 != '') {
        $exp2 = [];

        foreach ($exp as $val) {
            if (trim($val) != '') {
                $arr = explode($sep2, $val);
                $exp2[$arr[0]] = $arr[1];
            }
        }
        return $exp2;
    } else {
        return $exp;
    }
}
if (!function_exists('print_arr')) {
    function print_arr($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
}

if (!function_exists('print_arrbox')) {
    function print_arrbox($a, $h = 100)
    {
        echo '<pre class="arr-box" style="height:' . $h . 'px;overflow:auto;">';
        print_r($a);
        echo '</pre>';
    }
}

function select_options($arr, $sel)
{
    $ret = "<option value=''></option>";

    foreach ($arr as $key => $value) {

        $selected = '';
        if (is_array($sel)) {
            if (in_array($key, $sel)) {
                $selected = 'selected';
            }
        } else {
            if ($key == $sel) {
                $selected = 'selected';
            }
        }
        $ret .=
            "<option value='" .
            $key .
            "' " .
            $selected .
            '>' .
            $value .
            '</option>';
    }

    return $ret;
}

function select_attribute_options($arr, $sel)
{
    $ret = "<option value=''></option>";

    foreach ($arr as $key => $value) {

        $selected = '';
        if (is_array($sel)) {
            if (in_array($key, $sel)) {
                $selected = 'selected';
            }
        } else {
            if ($key == $sel) {
                $selected = 'selected';
            }
        }
        $ret .= "<option value='" . $key . "' " . $selected . " data-color='" . $value["color"] . "'>" . $value["attribute"] . "</option>";
    }

    return $ret;
}

function select_multi_options($arr, $sel)
{
    $ret = "<option value=''></option>";

    foreach ($arr as $key => $value) {
        if ($key == $sel) {
            $selected = 'selected';
        } else {
            $selected = '';
        }
        $ret .=
            "<option value='" .
            $key .
            "' " .
            $selected .
            '>' .
            $value .
            '</option>';
    }

    return $ret;
}



function getts($d = '0', $m = '0', $y = '0', $h = '0', $min = '0', $s = '0')
{
    if (
        $d =
        '0' &&
        $m == '0' &&
        $y == '0' &&
        $h == '0' &&
        $min == '0' &&
        $s == '0'
    ) {
        return time();
    } else {
        return time();
    }
}

// function encrypt($text)
// {
// if(trim($text) == ""){return $text;}
// $salt ='@#!3454eg$FD9)asfa([DDs33re3$%^&';
//     return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
// }

// function decrypt($text)
// {
// if(trim($text) == ""){return $text;}
// $salt ='@#!3454eg$FD9)asfa([DDs33re3$%^&';
// return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
// }

function get_curr_user_id(){
    $ret = "0";
    if(isset($_SESSION["user_id"])){
        $ret = $_SESSION["user_id"];
    }
    return $ret;
}

function logthis($table, $query, $id, $datetime, $type)
{
    /*include("variables.php");
    $userid = encrypt($_SESSION["user_id"]);
    $table= encrypt($table);
    $query= encrypt($query);
    $id = encrypt($id);
    $datetime= $datetime;
    $type= encrypt($type);
    $conn->query("INSERT INTO $tablelog SET tablename='".$table."', datetime = '".$datetime."', query = '".$query."', tableid = '".$id."', userid = '".$userid."', type = '".$type."' ");*/
}

function notify($type = '', $msg = '')
{
    echo '<div class="position-fixed showNotification alert alert-' . $type . ' alert-dismissible fade show" role="alert">
    <strong>' . $msg . '</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

function notify_after_redirect($type = '', $msg = '')
{
    $_SESSION["notify"] = [$type, $msg];
}

function display_notifications()
{
    if (isset($_SESSION["notify"]) && sizeof($_SESSION["notify"]) > 0) {
        $type = $_SESSION["notify"][0];
        $msg = $_SESSION["notify"][1];
        notify($type, $msg);
        $_SESSION["notify"] = [];
    }
}

function icheck_list(
    $arr = [],
    $selected = [],
    $select_grpid = '',
    $format = 'vertical',
    $sep = '|',
    $type = ''
) {
    $ret = [];
    $ret['checks'] = '';
    $ret['checks_all'] = '';
    $ret['keystr'] = $sep;

    $unique = 'check_';

    $style = 'width:100%;display:inline-block;';
    $listclass = '';
    if ($format == 'horizontal') {
        $style = 'width:250px;display:inline-block;';
        $listclass = 'list-inline';
    }

    if ($select_grpid != '' && $type != 'preferrence') {
        $ret['checks_all'] .=
            "<input type='checkbox' data-group-id='" .
            $select_grpid .
            "' 
			data-group='all_" .
            $select_grpid .
            "' value='all_" .
            $select_grpid .
            "' id='all_" .
            $select_grpid .
            "'
			class='skin-square-orange satsang-place-day selectgroup'>
			<label for='all_" .
            $select_grpid .
            "'>Select</label>";
    }

    $ret['checks'] .=
        "<ul class='" .
        $listclass .
        "' style='padding-left:0px;margin-top: 5px;'>";

    foreach ($arr as $key => $value) {
        $place_checked = ''; // checked

        if (in_array($key, $selected)) {
            $place_checked = 'checked';
        } else {
            $place_checked = '';
        }

        $ret['checks'] .= "<li style='" . $style . "'>";

        //$ret['checks'] .= "<input type='checkbox' data-group-id='".$select_grpid."' data-group='".$unique."' value='".$key."' id='".$unique."".$key."'><label for='".$unique."".$key."'>".$value."</label>";

        $ret['checks'] .=
            '<div class="" style="min-height:34px;">
                                        <input tabindex="5" type="checkbox" data-place-id="' .
            $key .
            '" 
                                        data-group-id="' .
            $select_grpid .
            '" data-group="' .
            $unique .
            '" 
                                        value="' .
            $key .
            '" id="' .
            $unique .
            '' .
            $key .
            '" 
                                        name="' .
            $unique .
            '' .
            $key .
            '" 
                                        class=" placegroup' .
            $select_grpid .
            ' skin-square-orange select-icheck-place" ' .
            $place_checked .
            '><label class="icheck-label form-label" for="' .
            $unique .
            '' .
            $key .
            '">' .
            $value .
            '</label>
                                        </div>';

        $ret['checks'] .= '</li>';

        $ret['keystr'] .= $key . '' . $sep;
    }

    $ret['checks'] .= '</ul>';

    return $ret;
}

function display_date($date, $language = 'en')
{
    $disp_format = 'M d, Y';
    $disp = $date;

    $ts = ts_from_date($date, 'Y-m-d');

    $disp = date($disp_format, $ts);

    if ($language == 'gujarati' || $language == 'gu') {
        $langcode = 'gu';
        $dynos = date('d, Y', $ts);
        $mn = date('M', $ts);
        $disp = disp_date_lang($dynos, $mn, $langcode);
    }

    if ($language == 'hindi' || $language == 'hi') {
        $langcode = 'hi';
        $dynos = date('d, Y', $ts);
        $mn = date('M', $ts);
        $disp = disp_date_lang($dynos, $mn, $langcode);
    }

    return $disp;
}

function display_date_from_ts($ts, $language = 'en')
{
    $dt = date_from_ts($ts, 'Y-m-d');
    return display_date($dt, $language);
}

function date_from_ts($ts, $format = 'Y-m-d H:i:s')
{
    if (is_array($ts)) {
        $ret = [];

        foreach ($ts as $key => $value) {
            $ret[$key] = date($format, $value);
        }

        return $ret;
    } else {
        return date($format, $ts);
    }
}

function ts_from_date($date, $format = 'M d, Y H:i:s', $zone = 'UTC')
{
    $append = '';
    if (
        strpos($format, 'H') === false &&
        strpos($format, 'i') === false &&
        strpos($format, 's') === false
    ) {
        $format = $format . ' H:i:s';
        $append = ' 00:00:00';
    }

    if (is_array($date)) {
        $ret = [];

        foreach ($date as $key => $value) {
            $value = $value . $append;

            $d = DateTime::createFromFormat(
                $format,
                $value,
                new DateTimeZone($zone)
            );
            $value_ts = $d->getTimestamp();
            $ret[$key] = $value_ts;
        }

        return $ret;
    } else {
        $date = $date . $append;

        $d = DateTime::createFromFormat(
            $format,
            $date,
            new DateTimeZone($zone)
        );
        return $d->getTimestamp();
    }
}

function get_start_end_dates($range)
{
    $start = $end = '';
    $return = ['start' => '', 'end' => ''];

    if ($range != '') {
        $dtexp = explode_str($range, '-', '', 'filterunique');

        if (sizeof($dtexp) == 0 || sizeof($dtexp) > 2) {
            echo 'Invalid date range!';
            die();
        }

        if (sizeof($dtexp) == '1') {
            $dtexp[1] = $dtexp[0];
        }

        //echo $dtexp[0]; echo "<br>";

        $start = ts_from_date(trim($dtexp[0]) . '00:00:00', 'M d, Y H:i:s');
        $end = ts_from_date(trim($dtexp[1]) . '00:00:00', 'M d, Y H:i:s');

        //echo $start;  echo "<br>"; echo $end; echo "<br>";
        //echo date('Y-m-d',$start);
        //echo "<br>";
        //echo date('Y-m-d',$end);

        $valid = check_date_range($start, $end);

        if (!$valid) {
            echo 'Invalid Date Range';
            die();
        } else {
            $return['start'] = $start;
            $return['end'] = $end;
        }
    } else {
        echo 'Please select a date range!';
        die();
    }

    return $return;
}

function check_date_range($start, $end)
{
    if ($start == '' || $end == '') {
        return false;
    }

    if ($start > $end) {
        return false;
    }

    return true;
}

function get_ts_from_range($start, $end, $format = 'Y-m-d')
{
    include 'variables.php';
    $ret = [];
    $ret['all'] = [];
    $ret['days'] = [];

    while ($start <= $end) {
        $dt = date($format, $start);
        $day = date('l', $start);
        $ret['all'][] = $dt;
        $ret['days'][$day][] = $dt;
        $start += 86400; // add 24 hours
    }
    return $ret;
}

function get_dates_day($dates, $format = 'Y-m-d', $zone = 'UTC')
{
    $ret = [];

    if (sizeof($dates) > 0) {
        foreach ($dates as $date) {
            $ret[$date] = get_date_day($date, $format, $zone);
        }
    }

    return $ret;
}

function get_date_day(
    $date,
    $format = 'Y-m-d',
    $zone = 'UTC',
    $return_as = 'str'
) {
    //$dt = date($format,$start);

    $ts = DateTime::createFromFormat($format, $date);
    $day = date('l', $ts->getTimestamp());

    if ($return_as == 'number') {
        global $satsang_days;
        $flip_satsang_days = $satsang_days;
        $flip_satsang_days = array_flip($flip_satsang_days);
        return $flip_satsang_days[$day];
    }

    return $day;
}

function get_first_date_of_previous_month($format, $date)
{
    // current date manipulations
    $ts = DateTime::createFromFormat($format, $date);
    $month = date('m', $ts->getTimestamp());
    $year = date('Y', $ts->getTimestamp());
    //echo $month.$year." - ";

    // previous month manipulations
    if ($month == 1) {
        $prev_month = 12;
        $prev_year = $year - 1;
    } else {
        $prev_month = $month - 1;
        $prev_year = $year;
    }
    //echo $prev_month.$prev_year."<br>";

    // first day of previous month in proper format
    $prev_date = $format;
    $prev_date = str_replace('Y', $prev_year, $prev_date);
    $prev_date = str_replace('m', $prev_month, $prev_date);
    $prev_date = str_replace('d', '01', $prev_date);
    //echo $prev_date;

    $ts = ts_from_date($prev_date, $format);
    return date($format, $ts);
}

function get_last_date_of_next_month($format, $date)
{
    // current date manipulations
    $ts = DateTime::createFromFormat($format, $date);
    $month = date('m', $ts->getTimestamp());
    $year = date('Y', $ts->getTimestamp());
    //echo $month.$year." - ";

    // next month manipulations
    if ($month == 12) {
        $next_month = 1;
        $next_year = $year + 1;
    } else {
        $next_month = $month + 1;
        $next_year = $year;
    }
    //echo $next_month.$next_year."<br>";

    // last day of next month in proper format
    $next_date = $format;
    $next_date = str_replace('Y', $next_year, $next_date);
    $next_date = str_replace('m', $next_month, $next_date);
    $next_date = str_replace('d', '01', $next_date);
    //echo $next_date;

    $new_format = str_replace('d', 't', $format);

    $ts = ts_from_date($next_date, $format);
    return date($new_format, $ts);
}

function ts_in_range($ts, $range, $itself = '0')
{
    //print_arr($range);

    $return = false;

    if (sizeof($range) > 0) {
        foreach ($range as $key => $date) {
            $min = $date['from'];
            $max = $date['to'];
            //echo $min; echo " - "; echo $max; echo " - "; echo $ts; echo " - ";
            if ($ts >= $min && $ts <= $max) {
                $return = true;
            }
        }
    }

    /*
	//itself = 0 means , $ts (date used) SHOULD NOT BE considered as in given range.
	if($itself == "0" && $return == true){
		$return = false;
	}

	//itself = 1 means , $ts (date used) SHOULD BE considered in given range.
	if($itself == "1" && $return == true){
		$return = true;
	}
*/

    return $return;
}

function group_dates_by_month($place_dates, $format = 'Y-m-d')
{
    $arr = [];
    $i = -1;
    $temp = [];
    foreach ($place_dates as $placeID => $dates) {
        foreach ($dates as $date) {
            $ts = DateTime::createFromFormat($format, $date);
            $m = date('m', $ts->getTimestamp());
            $y = date('Y', $ts->getTimestamp());

            $key = $y . $m;

            if (!isset($temp[$placeID][$key])) {
                $temp[$placeID][$key] = $i;
                $i++;
            }
            $arr[$placeID][$i][] = $date;
        }
        $i = -1;
    }

    return $arr;
}

// returns all possible combinations from different arrays

function combinations($arrays, $i = 0)
{
    if (!isset($arrays[$i])) {
        return [];
    }
    if ($i == count($arrays) - 1) {
        return $arrays[$i];
    }

    // get combinations from subsequent arrays
    $tmp = combinations($arrays, $i + 1);

    $result = [];

    // concat each array from tmp with each element from $arrays[$i]
    foreach ($arrays[$i] as $v) {
        foreach ($tmp as $t) {
            $result[] = is_array($t) ? array_merge([$v], $t) : [$v, $t];
        }
    }

    return $result;
}

function convert_array_to_object($arr)
{
    $object = new stdClass();

    if (is_array($arr) && sizeof($arr) > 0) {
        foreach ($arr as $key => $value) {
            $object->$key = $value;
        }
    }

    return $object;
}

function implode_obj_to_str($obj, $sep)
{
    $str = '';
    foreach ($obj as $key => $value) {
        $str .= $value . '' . $sep;
    }

    return $str;
}

function insert_update_data($table, $rows, $index_key)
{
    global $conn;
    //echo $table;	print_arr($rows);

    $ts = getts();
    $return = ['inserted' => [], 'updated' => []];

    foreach ($rows as $row) {
        $query = '';
        foreach ($row as $column => $value) {
            if (trim($column) != '') {
                $query .= ' ' . $column . " = \"" . $value . "\", ";
            }
        }
        // echo "|||". $query."|||<br>";

        // check if row is present or not based on index columns
        // if present, then update else insert
        $update = false;
        $insert = false;
        $updateID = '';

        $condition = ''; // based on index key columns

        $keys = explode(',', $index_key);
        foreach ($keys as $key) {
            //echo $key;
            if (isset($row[$key]) && $row[$key] != "") {
                $condition .= $key . " = '" . $row[$key] . "' AND ";
            }
        }

        $condition = substr($condition, 0, -4);
        // echo $condition . "<br>";

        if (trim($condition) != '') {
            $condition = ' WHERE ' . $condition;
        }

        if ($condition != "") {
            $check = ' SELECT id FROM ' . $table . ' ' . $condition . ' ';
            // echo $check;
            $check_query = $conn->query($check);
            $totrows = mysqli_num_rows($check_query);

            if ($totrows > 0) {
                $update = true;

                // get id
                while ($check_result = mysqli_fetch_object($check_query)) {
                    //echo "<pre>";	print_r($check_result);	echo "</pre>";
                    $updateID = $check_result->id;
                }
                //echo "ID: ".$updateID."<br>";
                //echo "update<hr>";
            } else {
                //echo "insert<hr>";
                $insert = true;
            }
        } else {
            //echo "insert<hr>";
            $insert = true;
        }

        if ($update && $updateID != '') {
            $query .= " updated = \"" . $ts . "\" ";
            $sql = $conn->query(
                ' UPDATE ' .
                    $table .
                    ' SET ' .
                    $query .
                    " WHERE id = '" .
                    $updateID .
                    "' "
            );
            $return['updated'][] = $updateID;
        } elseif ($insert) {
            $query .= " updated = \"" . $ts . "\" ";
            // echo $query;
            $sql = $conn->query(
                'INSERT INTO ' . $table . ' SET ' . $query . ' '
            );
            $return['inserted'][] = $conn->insert_id;
        }
    }

    return $return;
}

function insert_data($table, $rows, $index)
{
    global $conn;

    //echo $table;	print_arr($rows);

    $ts = getts();
    $return = [];

    foreach ($rows as $row) {
        $query = '';
        foreach ($row as $column => $value) {
            if (trim($column) != '') {
                $query .= ' ' . $column . " = \"" . $value . "\", ";
            }
        }

        $query .= " created = \"" . $ts . "\" ";
        $sql = $conn->query('INSERT INTO ' . $table . ' SET ' . $query . ' ');
        $return[] = $conn->insert_id;
    }

    return $return;
}


function updateScheduleLog()
{
    echo "<script type='text/javascript'> $('.sessionlog').html('" .
        $_SESSION['log'] .
        "'); </script>";
}

function age($birthday)
{
    if (trim($birthday) != '') {
        list($day, $month, $year) = explode('/', $birthday);
        $year_diff = date('Y') - $year;
        $month_diff = date('m') - $month;
        $day_diff = date('d') - $day;
        if ($day_diff < 0 && $month_diff == 0) {
            $year_diff--;
        }
        if ($day_diff < 0 && $month_diff < 0) {
            $year_diff--;
        }
        return $year_diff;
    }

    return '';
}

function dob_from_db($dt)
{
    if ($dt == NULL || $dt == "NULL") {
        return "";
    }
    return str_replace('_', ' ', $dt);
}

function show_age($dt, $format = true)
{
    $dt = dob_from_db($dt);
    if ($dt != "") {
        $from = DateTime::createFromFormat('d M Y', $dt);
        $to = new DateTime('today');
        $yr = $from->diff($to)->y;

        if ($format) {
            return "<small class='gray'>(" . $yr . ' yr)</small>';
        }

        return $yr;
    }

    return "";

    // return strtoupper($dt->format('d M Y'));
}

function highlight_data_percent($data, $matchwith, $similar_percent = '')
{
    // if string is a substring - match is 100%
    if (stripos(trim($data), trim($matchwith)) !== false) {
        $ret =
            "<span class='success-color'><strong>" . $data . '</strong></span>';
        return $ret;
    }

    // if is similar > 75% - then show percentage
    elseif ($similar_percent != '' && $similar_percent > 75) {
        $ret =
            "<span class='success-color' title='" .
            $similar_percent .
            "% similarity'><strong>" .
            $data .
            "</strong> <span class='warning-color'><small>(<strong>" .
            $similar_percent .
            '</strong>%)</small></span></span>';
        return $ret;
    }

    return $data;
}

function highlight_data($data, $highlight)
{
    if ($highlight == true) {
        $ret =
            "<span class='success-color'><strong>" . $data . '</strong></span>';
        return $ret;
    }

    return $data;
}


function get_departments()
{
    global $table_departments;

    $dept_rows = get_data(
        $table_departments,
        '',
        'id,department',
        'department'
    );
    $departments = [];
    foreach ($dept_rows as $key => $value) {
        $departments[$value['id']] = trim($value['department']);
    }
    return $departments;
}


function get_genders()
{
    $arr = [];

    $arr['Male'] = 'Male';
    $arr['Female'] = 'Female';

    return $arr;
}

function get_age_operators()
{
    $arr = [];

    $arr['less_than'] = 'Less Than (<)';
    $arr['greater_than'] = 'Greater Than (>)';
    $arr['equal_to'] = 'Equal (=)';

    return $arr;
}

function get_birth_dates()
{
    $arr = [];
    for ($i = 1; $i <= 31; $i++) {
        if ($i <= 9) {
            $i = '0' . $i;
        }
        $arr[$i] = $i;
    }
    return $arr;
}

function get_birth_months()
{
    $arr = [];
    $months = [
        1 => 'Jan',
        2 => 'Feb',
        3 => 'Mar',
        4 => 'Apr',
        5 => 'May',
        6 => 'Jun',
        7 => 'Jul',
        8 => 'Aug',
        9 => 'Sep',
        10 => 'Oct',
        11 => 'Nov',
        12 => 'Dec',
    ];
    foreach ($months as $no => $name) {
        $arr[$name] = $name;
    }
    // for ($i=1; $i <= 12; $i++) {
    // 	$monthName = date("F", mktime(0, 0, 0, $i, 10));
    // }
    return $arr;
}

function get_birth_years()
{
    $arr = [];
    for ($i = 1900; $i <= date('Y'); $i++) {
        $arr[$i] = $i;
    }
    return $arr;
}

function get_timezones()
{
    $ret = array(

        "-12:00" => "(GMT -12:00) Eniwetok, Kwajalein",
        "-11:00" => "(GMT -11:00) Midway Island, Samoa",
        "-10:00" => "(GMT -10:00) Hawaii",
        "-09:30" => "(GMT -9:30) Taiohae",
        "-09:00" => "(GMT -9:00) Alaska",
        "-08:00" => "(GMT -8:00) Pacific Time (US &amp; Canada)",
        "-07:00" => "(GMT -7:00) Mountain Time (US &amp; Canada)",
        "-06:00" => "(GMT -6:00) Central Time (US &amp; Canada), Mexico City",
        "-05:00" => "(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima",
        "-04:30" => "(GMT -4:30) Caracas",
        "-04:00" => "(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz",
        "-03:30" => "(GMT -3:30) Newfoundland",
        "-03:00" => "(GMT -3:00) Brazil, Buenos Aires, Georgetown",
        "-02:00" => "(GMT -2:00) Mid-Atlantic",
        "-01:00" => "(GMT -1:00) Azores, Cape Verde Islands",
        "+00:00" => "(GMT) Western Europe Time, London, Lisbon, Casablanca",
        "+01:00" => "(GMT +1:00) Brussels, Copenhagen, Madrid, Paris",
        "+02:00" => "(GMT +2:00) Kaliningrad, South Africa",
        "+03:00" => "(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg",
        "+03:30" => "(GMT +3:30) Tehran",
        "+04:00" => "(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi",
        "+04:30" => "(GMT +4:30) Kabul",
        "+05:00" => "(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent",
        "+05:30" => "(GMT +5:30) Bombay, Calcutta, Madras, New Delhi",
        "+05:45" => "(GMT +5:45) Kathmandu, Pokhara",
        "+06:00" => "(GMT +6:00) Almaty, Dhaka, Colombo",
        "+06:30" => "(GMT +6:30) Yangon, Mandalay",
        "+07:00" => "(GMT +7:00) Bangkok, Hanoi, Jakarta",
        "+08:00" => "(GMT +8:00) Beijing, Perth, Singapore, Hong Kong",
        "+08:45" => "(GMT +8:45) Eucla",
        "+09:00" => "(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk",
        "+09:30" => "(GMT +9:30) Adelaide, Darwin",
        "+10:00" => "(GMT +10:00) Eastern Australia, Guam, Vladivostok",
        "+10:30" => "(GMT +10:30) Lord Howe Island",
        "+11:00" => "(GMT +11:00) Magadan, Solomon Islands, New Caledonia",
        "+11:30" => "(GMT +11:30) Norfolk Island",
        "+12:00" => "(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka",
        "+12:45" => "(GMT +12:45) Chatham Islands",
        "+13:00" => "(GMT +13:00) Apia, Nukualofa",
        "+14:00" => "(GMT +14:00) Line Islands, Tokelau"
    );



    return $ret;
}



function T($str)
{
    return $str;
}


function redirect_action($POST)
{

    // if(isset($_POST['savenew'])){
    // 	echo "<script>window.top.location='member-form.php'</script>";
    // } else {
    // 	echo "<script>window.top.location='index.php'</script>";
    // }

}


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}



function generate_zip_folder($source, $destination)
{
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
        return false;
    }

    $source = realpath($source);
    $sourceLength = strlen($source);

    $addFiles = function ($folder) use ($zip, $source, $sourceLength, &$addFiles) {
        $handle = opendir($folder);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != '.' && $entry != '..') {
                $filePath = "$folder/$entry";
                $relativePath = substr($filePath, $sourceLength + 1);

                if (is_dir($filePath)) {
                    $zip->addEmptyDir($relativePath);
                    $addFiles($filePath);
                } else {
                    $zip->addFile($filePath, $relativePath);
                }
            }
        }
        closedir($handle);
    };

    $addFiles($source);

    return $zip->close();
}


function settings_get_data($type)
{

    // include("variables.php");

    $data = array();
    // $data['mode'] = "new";
    // if (isset($_GET['id']) && is_numeric($_GET['id']) && trim($_GET['id']) != "") {
    $data = get_data("settings", " WHERE type = '" . $type . "' ", "all");

    // $id = $_GET['id'];
    //print_arr($data);

    // $data['mode'] = "update";
    // }

    return $data;

    // global $table_departments;

    // $dept_rows = get_data(
    //     $table_departments,
    //     '',
    //     'id,department',
    //     'department'
    // );
    // $departments = [];
    // foreach ($dept_rows as $key => $value) {
    //     $departments[$value['id']] = trim($value['department']);
    // }
    // return $departments;

}

function settings_submit_form()
{

    global $conn;

    // include("variables.php");

    if (isset($_POST['save']) || isset($_POST['savenew'])) {
        // echo "<br><br><br>";
        // print_r($_POST);
        // die;

        unset($_POST["mode"]);
        unset($_POST["save"]);
        unset($_POST["id"]);
        unset($_POST["savenew"]);

        foreach ($_POST as $k => $v) {

            $stmt = $conn->prepare("UPDATE settings SET value = ? WHERE property = ? ");
            $stmt->bind_param("ss", $v, $k);

            if ($stmt->execute()) {
                // echo "JSON Updated Successfully!";
            } else {
                echo "Error: " . $conn->error . "<br>";
            }
        }
    }
}


function view_nearby_dates($ymd)
{
    // ?setymd=20251121

    $nowdt = new DateTime();
    $todayymd = $nowdt->format('Ymd');

    $dt = DateTime::createFromFormat('Ymd', $ymd);

    $str = "";
    $str .= "Past dates:<br>";
    for ($i = 1; $i <= 5; $i++) {
        $pastDate = clone $dt;
        $pastDate->modify("-$i days");
        $str .= "<a class='change-dt-link' href='?setymd=" . $pastDate->format('Ymd') . "'>" . $pastDate->format('d M Y, l') . "</a>";
    }

    // $str = substr($str, 0, -2);

    // show futues dates also
    if ($ymd < $todayymd) {

        $str .= "<br><br>Next dates:<br>";
        $dt = DateTime::createFromFormat('Ymd', $ymd);
        for ($i = 1; $i <= 5; $i++) {
            $pastDate = clone $dt;
            $pastDate->modify("+$i days");
            if ($todayymd >= $pastDate->format('Ymd')) {
                $str .= "<a class='change-dt-link' href='?setymd=" . $pastDate->format('Ymd') . "'>" . $pastDate->format('d M Y, l') . "</a>";
            }
        }
        // $str = substr($str, 0, -2);
    }


    echo $str;
}



function color($n)
{
    if ($n > 0) {
        return "<span class='grn'>" . $n . "</span>";
    } else {
        return "<span class='rd'>" . $n . "</span>";
    }
    return $n;
}
function green($n)
{
    return "<span class='grn'>" . $n . "</span>";
}
function red($n)
{
    return "<span class='rd'>" . $n . "</span>";
}

function process_date_range($dateRange, $page)
{

    $fromymd = $dateRange["start"];
    if (isset($_GET["stymd"]) && is_numeric($_GET["stymd"])) {
        $fromymd = $_GET["stymd"];
    }

    $fromymdObj = DateTime::createFromFormat('Ymd', $fromymd);
    $toymdObj = clone $fromymdObj;
    $toymdObj->modify("+" . ($dateRange["batch"] - 1) . " days");


    // echo "<br>";
    // print_r($fromymdObj);
    // echo "<br>";
    // print_r($toymdObj);
    $toymd = $toymdObj->format("Ymd");

    if ($toymd >= $dateRange["end"]) {
        $toymd = $dateRange["end"];
        $nextymdObj = null;
    } else {
        $nextymdObj = clone $toymdObj;
        $nextymdObj->modify("+1 days");
    }

    // echo "<br>";
    // echo $fromymd . " - " . $toymd;
    // echo "<br>";
    // print_r($nextymdObj);

    $goto = "";
    // $page = "shop_backtest_generate_ranks.php";
    if ($nextymdObj != null) {
        $goto = $page . "&stymd=" . $nextymdObj->format("Ymd") . "";
    }

    // echo "<br>";
    // echo $goto;

    return [
        "fromymd" => $fromymd,
        "toymd" => $toymd,
        "goto" => $goto,
    ];
}

function goto_url($page)
{

    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    $url .= "" . ROOT_PATH . "/";
    $url .= "" . $page . "";

    echo "Redirecting to next variable number...
      <script>
          setTimeout(function(){
              window.top.location = '" . $url . "';
          }, 1000);
        </script>";
}

function get_attributes_arr($cat)
{
    $colors = [
        'accent1',
        'accent2',
        'accent3',
        'warning',
        'info',
        'primary',
        'success',
        'danger'
    ];
    $arr = [];
    if ($cat != "") {
        $fetch_arr = fetch_data(["table" => "attributes", "columns" => "id, color, attribute, code", "condition" => " category = '" . $cat . "' AND active = 'yes' ", "order" => "attribute ASC", "limit" => ""]);
        foreach ($fetch_arr as $lk => $lv) {
            if($lv["color"] == NULL || $lv["color"] == ""){
                $lv["color"] = $color = $colors[$lv["id"] % count($colors)];
            }
            $arr[$lv["code"]] = $lv;
        }
    }
    return $arr;
}
