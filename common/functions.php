<?php

function acl_auth($pageid)
{
    if ($pageid != "") {
    }
    print_arr($_SESSION);
}

function widget_start($title = "", $class = "", $widget_title_class = "", $widget_wrapper_class = "", $options = "", $widget_options_class = "")
{
    echo '<div class="widgetwrapper col d-flex align-items-start  px-2 py-0 ' . $class . ' ">
 <div class="widget container-fluid py-4 px-3 overhide ' . $widget_wrapper_class . '">';

    if ($title != "") {
        echo "<div class='widget-title " . $widget_title_class . "'>";
        echo $title;
        echo "</div>";
    }


    if ($options != "") {
        echo "<div class='widget-options " . $widget_options_class . "'>";
        echo $options;
        echo "</div>";
    }
    echo "<div class='spacer'></div>";
}

function widget_end()
{
    echo "</div>
 </div>";
}

function avatar($size = "", $show_status = true)
{

    global $status;
    echo "<div class='avatar " . ($show_status == true ? $status[rand(0, 3)] : "no-status") . " ";
    if ($size != "") {
        echo "avatar-" . $size . "'>";
    } else {
        echo "'>";
    }
    echo "<img src='" . ROOT_PATH . "/assets/images/user-" . rand(1, 20) . ".jpg'></div>";
}

function name(int $id)
{
    global $names;
    echo $names[$id];
}
function at_name(int $id)
{
    global $names;
    echo "@" . str_replace(" ", ".", strtolower($names[$id]));
}
function email(int $id)
{
    global $names;
    echo str_replace(" ", ".", strtolower($names[$id])) . "@gmail.com";
}
function phone()
{
    global $phone;
    echo $phone[rand(1, 20)];
}
function company()
{
    global $company;
    echo $company[rand(1, 11)];
}
function sentence()
{
    global $sentences;
    echo $sentences[rand(1, 20)];
}
function line()
{
    global $lines;
    echo $lines[rand(1, 20)];
}
function userBadge()
{
    global $userBadge;
    echo $userBadge[rand(0, 3)];
}
function profession()
{
    global $professions;
    echo $professions[rand(1, 20)];
}
function project_name(int $id)
{
    global $project_names;
    echo $project_names[$id];
}
function project_category(int $id)
{
    global $project_categories;
    echo $project_categories[$id];
}
function paragraph()
{
    global $paragraphs;
    echo $paragraphs[rand(1, 10)];
}


function add_new_form_link($opt)
{
    $s = "";
    if (isset($opt["text"]) && $opt["url"]) {
        $s = "<a class='download-btn btn btn-primary' href='" . $opt["url"] . "'>" . $opt["text"] . "</a>";
    }
    return $s;
}



function download_xlsx($data_type)
{

    return "";
    /*
    $param = "?data_type=" . $data_type . "";
    if (isset($_GET["srch"]) && $_GET["srch"] != "") {
        $param .= "&srch=" . $_GET["srch"] . "";
    }

    if (isset($_GET["srch_op"]) && $_GET["srch_op"] != "") {
        $param .= "&srch_op=" . $_GET["srch_op"] . "";
    }

    if (isset($_GET["sortby"]) && $_GET["sortby"] != "") {
        $param .= "&sortby=" . $_GET["sortby"];
    }

    if (isset($_GET["filter"]) && $_GET["filter"] != "") {
        $param .= "&filter=" . $_GET["filter"];
    }

    if (isset($_GET["report"]) && $_GET["report"] != "") {
        $param .= "&report=" . $_GET["report"];
    }

    return "<a class='download-btn btn btn-lightbg' href='" . ROOT_PATH . "/modules/spreadsheet/spreadsheet.php" . $param . "' target='_blank'>Download as excel</a>";
    */
}


function pagination($pagename)
{

    $page = 1;

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

    $prev = $page - 1;
    if ($prev < 1) {
        $prev = 1;
    }
    $next = $page + 1;

    $srch = "";
    if (isset($_GET["srch"])) {
        $srch = "&srch=" . $_GET["srch"];
    }

    $srch_op = "";
    if (isset($_GET["srch_op"])) {
        $srch_op = "&srch_op=" . $_GET["srch_op"];
    }

    $sortby = "";
    if (isset($_GET["sortby"])) {
        $sortby = "&sortby=" . $_GET["sortby"];
    }

    $filter = "";
    if (isset($_GET["filter"])) {
        $filter = "&filter=" . $_GET["filter"];
    }

    $report = "";
    if (isset($_GET["report"])) {
        $report = "&report=" . $_GET["report"];
    }

    $ret = '';

    $ret .= '<ul class="pagination">
 <li class="page-item"><a class="page-link" href="' . $pagename . '?page=' . $prev . '' . $srch . '' . $srch_op . '' . $sortby . '' . $filter . '' . $report . '">Previous</a></li>
 <li class="page-item"><a class="page-link" href="' . $pagename . '?page=' . $page . '' . $srch . '' . $srch_op . '' . $sortby . '' . $filter . '' . $report . '"><strong>' . $page . '</strong></a></li>
 <li class="page-item"><a class="page-link" href="' . $pagename . '?page=' . $next . '' . $srch . '' . $srch_op . '' . $sortby . '' . $filter . '' . $report . '">Next</a></li>
    </ul>';

    return $ret;
}

function ts_to_dt($ts)
{
    if ($ts != NULL && $ts != "" && $ts != "0") {
        return date('d M Y h:i a, D', $ts);
    }
    return "";
    // return date('D, d-M-Y h:i A', $ts);
}
function ymd_to_dt($dt)
{
    if ($dt != NULL && $dt != "" && $dt != "0") {
        $dateString = $dt;
        $date = DateTime::createFromFormat('Ymd', $dateString);
        $formattedDate = $date->format('d M Y, D');
        return $formattedDate;
    }
    return "";
    // F j, Y (D)
    // return date('D, d-M-Y', $ts);
    // return date('D, d-M-Y h:i A', $ts);
}

function ymdTodmy($dt)
{
    $dateString = $dt;
    $date = DateTime::createFromFormat('Y-m-d', $dateString);
    $formattedDate = $date->format('d-m-Y');
    return $formattedDate;
}


function ymdTostring($dt)
{
    $dateString = $dt;
    $date = DateTime::createFromFormat('Y-m-d', $dateString);
    $formattedDate = $date->format('d M Y');
    return $formattedDate;
}

function dateFormat($dt, $current_format, $output_format)
{
    $dateString = $dt;
    $date = DateTime::createFromFormat($current_format, $dateString);
    if ($date) {
        $formattedDate = $date->format($output_format);
        return $formattedDate;
    }

    return $dt;
}


function daysAgo($date)
{
    $givenDate = new DateTime($date);
    $today = new DateTime(); // Current date
    $diff = $today->diff($givenDate);

    // If the given date is in the past, return positive days
    // If it's in the future, return negative days
    return $diff->days * ($givenDate < $today ? 1 : -1);
}

function daysHeld($buydt, $selldt)
{
    $buyDate = new DateTime($buydt);
    $sellDate = new DateTime($selldt);

    // Calculate the holding period in days
    $daysHeld = $sellDate->diff($buyDate)->days;
    return $daysHeld;
}


function crud_read($vars)
{
    global $conn;

    // order by
    $order = "";
    if (isset($vars["orderby"]) && $vars["orderby"] != "") {
        $order = " ORDER BY " . $vars["orderby"];
    }

    // limit
    $limit = "";
    if (isset($vars["pagination"]) && $vars["pagination"] == true) {
        $page = 1;
        $pagelimit = $vars["pagelimit"];
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
    }

    $query = "";
    if (isset($vars["query"]) && $vars["query"] != "") {
        $query = " WHERE " . $vars["query"];
    }

    $cols = "*";
    $cols_arr = [];
    $image_cols = [];
    $fetch_column_history = false;
    $history = "";

    // remove any empty columns from $vars["display_columns"]
    $vars["display_columns"] = array_filter($vars["display_columns"]);

    //
    if (isset($vars["display_columns"])) {
        foreach ($vars["display_columns"] as $k => $v) {
            if (isset($v["column"])) {

                // Merged columns in single cell
                if (is_array($v["column"])) {
                    foreach ($v["column"] as $ck => $colv) {
                        $cols_arr[] = $colv;
                    }
                }

                // Single column in single cell
                else if ($v["column"] != "") {
                    $cols_arr[] = $v["column"];

                    // Note: Image-file column cannot be merged with other columns
                    if (isset($v["type"]) && $v["type"] == "image-file") {
                        $image_cols[] = $v["column"];
                    }
                }
            }
        }
    }

    // Extra info to be fetched
    if (isset($vars["fetch_columns"])) {
        foreach ($vars["fetch_columns"] as $k => $colv) {
            if ($colv != "") {
                $cols_arr[] = $colv;
            }
        }
    }

    // Columns fetched in detail rows (toggle rows)
    if (isset($vars["detail_columns"])) {
        foreach ($vars["detail_columns"] as $k => $v) {
            if (isset($v["type"]) && $v["type"] == "last_update_info") {
                $cols_arr[] = "auth_user";
                $cols_arr[] = "updated";
            }
            if (isset($v["type"]) && $v["type"] == "created_info") {
                // $cols_arr[] = "auth_user";
                $cols_arr[] = "created";
            }
            if (isset($v["type"]) && $v["type"] == "history") {
                $fetch_column_history = true;
            }
            if (isset($v["column"])) {
                if ($v["column"] != "") {
                    $cols_arr[] = $v["column"];

                    // Note: Image-file column cannot be merged with other columns
                    if (isset($v["type"]) && $v["type"] == "image-file") {
                        $image_cols[] = $v["column"];
                    }
                }
            }
        }
    }

    if (sizeof($cols_arr) > 0) {
        $cols = implode(", ", $cols_arr);
    }

    $sql = ' SELECT ' . $cols . ' FROM ' . $vars["tablename"] . ' ' . $query . ' ' . $order . ' ' . $limit . ' ';
    $querystr = $conn->query($sql);
    $totrows = mysqli_num_rows($querystr);
    // echo $sql;

    $tableid = "" . $vars["module_pages"]["read"] . "_table";

    $html = "<div class='widget-table'><div class='table-responsive combination_reports'><table class='table' id='" . $tableid . "'><thead><tr>";
    foreach ($vars["display_columns"] as $dk => $dv) {
        $colclass = "";
        if (isset($dv["sorting"]) && $dv["sorting"] == false) {
            $colclass .= " no-sort ";
        }
        if (isset($dv["search"]) && $dv["search"] == false) {
            $colclass .= " no-search ";
        }
        $html .= "<th class='" . $colclass . "'>" . $dv["name"] . "</th>";
    }
    $html .= "</tr></thead><tbody>";

    $details = [];

    if ($totrows > 0) {
        $fetched_rows = [];
        while ($r = mysqli_fetch_assoc($querystr)) {
            $fetched_rows[] = $r;
        }

        $images = fetch_image_rows($fetched_rows, $image_cols);
        // print_arr($images);

        $documents = fetch_document_rows($vars, $fetched_rows);
        // print_arr($documents);
        $auth_users = fetch_auth_users($fetched_rows);
        // print_arr($auth_users);
        if ($fetch_column_history == true) {
            $history = fetch_column_history($vars, $fetched_rows);
        }

        $inc = 0;


        foreach ($fetched_rows as $rk => $r) {
            // echo "<pre>";	print_r($r);	echo "</pre>";

            // hidden details row data

            $inc = $inc + 1;
            $selected =  "";

            $html .= "<tr data-id='" . $r[$vars["primary_column"]] . "'>";

            foreach ($vars["display_columns"] as $dk => $dv) {

                $row_col_class = "";
                if (isset($dv["class"])) {
                    $row_col_class = $dv["class"];
                }


                if (isset($dv["column"]) && $dv["column"] != "") {

                    $prefix = [];
                    $cell_value = "";
                    $colindex = 0;

                    if (is_array($dv["column"])) {
                        $colarr = $dv["column"];
                        $prefix = $dv["prefix"];
                    } else {
                        $colarr = [$dv["column"]];
                    }

                    foreach ($colarr as $ck => $colname) {

                        $colval = $r[$colname];

                        if (isset($dv["id_prefix"]) && $dv["id_prefix"] != NULL && trim($dv["id_prefix"]) != "") {
                            if ($dv["id_prefix"] == "attribute_category_id_prefix") {
                                if (isset($dv["options"]) && is_array($dv["options"]) && isset($dv["options"][$r["category"]])) {
                                    $colval = $dv["options"][$r["category"]] . $colval;
                                }
                            } else {
                                $colval = "<span class='sorthide'>" . str_pad($colval, 11, '0', STR_PAD_LEFT) . "</span>" . trim($dv["id_prefix"]) . $colval;
                            }
                        }


                        if (isset($dv["format"])) {
                            if ($dv["format"] == "ts_to_dt") {
                                $colval = "<span class='data-hide'>" . $colval . "</span>" . ts_to_dt($colval);
                            }
                            if ($dv["format"] == "date") {
                                $colval = "<span class='data-hide'>" . $colval . "</span>" . ymd_to_dt($colval);
                            }
                        }

                        if (isset($dv["options"]) && !isset($dv["type"])) {
                            if (is_array($dv["options"]) && isset($dv["options"][$colval])) {
                                $colval = $dv["options"][$colval];
                            }
                        }

                        if (isset($dv["attributes"])) {
                            if (is_array($dv["attributes"]) && isset($dv["attributes"][$colval])) {
                                $colval = "<span class='badge bg-" . $dv["attributes"][$colval]["color"] . "'>" . $dv["attributes"][$colval]["attribute"] . "</span>";
                            }
                        }

                        if (isset($dv["badge"])) {
                            $colval = "<span class='badge badge-" . $r[$colname] . "'>" . $colval . "</span>";
                        }


                        if (isset($dv["type"])) {
                            if ($dv['type'] == "image-file") {
                                $colval = display_thumb($r, $colname, $images);
                            }

                            //
                            else if ($dv['type'] == "table_id") {
                                $val = $r[$colname] ?? "";
                                if ($val != "") {
                                    $colval = "";
                                    foreach ($dv["options"] as $ok => $ov) {
                                        if ($ov[$dv["option_id"]] == $val) {
                                            $colval .= $ov[$dv["option_label"]] . "";
                                            if (isset($dv["module"]) && $dv["module"] != "") {
                                                $colval .= "" . get_module_link($dv["module"], $val, "form") . "";
                                            }
                                        }
                                    }
                                }
                            }

                            //
                            else if ($dv['type'] == "implode" && isset($dv["sep"])) {
                                $val = $r[$colname] ?? "";
                                if ($val != "") {
                                    $selarr = explode($dv["sep"], $val);
                                    $colval = "";
                                    foreach ($dv["options"] as $ok => $ov) {
                                        if (in_array($ov[$dv["option_id"]], $selarr)) {
                                            $colval .= $ov[$dv["option_label"]] . ", ";
                                        }
                                    }

                                    $colval = trim($colval);
                                    if ($colval != "") {
                                        $colval = substr($colval, 0, -1);
                                    }
                                }
                            }
                        }


                        // applies in case of columns array in same cell
                        if ($cell_value != "") {
                            $cell_value .= "<br>";
                        }

                        // Prefix for multiple columns data
                        if (isset($prefix[$colindex]) && $prefix[$colindex] != "") {
                            $cell_value .= "<small><i>" . $prefix[$colindex] . ": " . "</i></small>";
                        }

                        $cell_value .= $colval;
                        $colindex++; // increment column counter in a cell
                    }

                    $html .= "<td class='" . $row_col_class . "'>" . $cell_value . "</td>";
                }

                //
                else {
                    if (isset($dv["type"])) {
                        //
                        if ($dv['type'] == "details") {
                            $html .= "<td class='details-control " . $row_col_class . "'><span>&#9660;</span></td>";
                        }
                        //
                        else if ($dv['type'] == "select") {
                            $html .= "<td class='" . $row_col_class . "'><input type='checkbox' " . $selected . " class='symbol-combination-check form-check-input' data-id='" . $r[$vars["primary_column"]] . "' /></td>";
                        }
                        //
                        else if (in_array($dv['type'], ["edit", "delete", "edit_delete"])) {
                            $html .= "<td class='" . $row_col_class . "'>";
                            $urlparam = "";
                            if (isset($vars["url_param"]) && $vars["url_param"] != "") {
                                $urlparam = "&" . $vars["url_param"];
                            }
                            if (in_array($dv['type'], ["edit", "edit_delete"])) {
                                if (isset($dv["acl"]["edit"]) && in_array($dv["acl"]["edit"], $_SESSION["acl"])) {
                                    $html .= "<a href='" . $vars["module_pages"]["update"] . ".php?id=" . $r[$vars["primary_column"]] . "" . $urlparam . "'><span class='icon wtxt bg-accent2'><i data-feather='edit'></i>Edit</span></a> &nbsp;";
                                }
                            }
                            if (in_array($dv['type'], ["delete", "edit_delete"])) {
                                if (isset($dv["acl"]["delete"]) && in_array($dv["acl"]["delete"], $_SESSION["acl"])) {
                                    $html .= "<a href='" . $vars["module_pages"]["delete"] . ".php?id=" . $r[$vars["primary_column"]] . "" . $urlparam . "'><span class='icon wtxt bg-info'><i data-feather='trash'></i>Delete</span></a> &nbsp;";
                                }
                            }

                            if (isset($dv["links"])) {
                                foreach ($dv["links"] as $lk => $lv) {
                                    if (isset($lv["acl"]) && in_array($lv["acl"], $_SESSION["acl"])) {
                                        $url = $lv["url"];
                                        // $url = str_replace("{random_string}",randomString(10),$url);
                                        $url = preg_replace_callback('/\{([a-zA-Z0-9_]+)\}/', function ($matches) use ($r) {
                                            $key = $matches[1];
                                            if($key == "random_string"){ return randomString(rand(25,40)); }
                                            return $r[$key] ?? $matches[0]; // keep original if key missing
                                        }, $url);
                                        $text = $lv["text"];
                                        $html .= "<a href='" . $url . "'><span class='icon wtxt " . $lv["class"] . "'><i data-feather='" . $lv["icon"] . "'></i>" . $text . "</span></a> &nbsp;";
                                    }
                                }
                            }
                            $html .= "</td>";
                        }
                        //
                        else if ($dv['type'] == "link") {
                            $colval = "";
                            foreach ($dv["links"] as $lk => $lv) {
                                if (isset($lv["acl"]) && in_array($lv["acl"], $_SESSION["acl"])) {
                                    $url = $lv["url"];
                                    $url = preg_replace_callback('/\{([a-zA-Z0-9_]+)\}/', function ($matches) use ($r) {
                                        $key = $matches[1];
                                        return $r[$key] ?? $matches[0]; // keep original if key missing
                                    }, $url);
                                    $text = $lv["text"];
                                    $row_condition = true;
                                    if (isset($lv["row_condition"])) {
                                        $row_condition = check_row_condition($r, $lv["row_condition"]);
                                    }
                                    if ($row_condition == true) {
                                        $colval .= "<a href='" . $url . "'>" . $text . "</a> &nbsp;";
                                    }
                                }
                            }
                            $html .= "<td class='" . $row_col_class . "'>" . $colval . "</td>";
                        }
                        //
                        else if ($dv['type'] == "table_row_link") {
                            $colval = "";
                            if (isset($dv["options"]) && $dv["options"][$r["table_name"]]) {
                                $modarr = $dv["options"][$r["table_name"]];
                                $modname = $modarr["name"] . " " . $modarr["id_prefix"] . "" . $r["row_id"];
                                $link = $modarr["form"];
                                $link = str_replace("XXX", $r["row_id"], $link);
                                $colval = "<a href='" . $link . "'>" . $modname . "</a>"; //$r[$dv["column"]]." ".($r["row_id"] ?? "");
                            }
                            $html .= "<td class='" . $row_col_class . "'>" . $colval . "</td>";
                        }
                        //
                        else if ($dv['type'] == "link_table_rows") {
                            $colval = "";
                            if (isset($dv["links"][$r[$vars["primary_column"]]])) {
                                $lnk = $dv["links"][$r[$vars["primary_column"]]];

                                foreach ($dv["options"] as $ok => $ov) {
                                    // print_arr($ov);
                                    if (in_array($ov[$dv["option_id"]], $lnk)) {
                                        $colval .= "<div class='vsele'>".$ov[$dv["option_label"]] . "</div>";
                                    }
                                }
                                $colval = trim($colval);
                                if ($colval != "") {
                                    $colval = substr($colval, 0, -1);
                                }
                            }
                            $html .= "<td class='" . $row_col_class . "'><div class='vertical-scrollbox'>" . $colval . "</div></td>";
                        }
                    }
                }
            }

            // Details Columns ---------
            $row_detail = "";
            foreach ($vars["detail_columns"] as $dk => $dv) {

                // Last updated by info
                if (isset($dv["type"]) && $dv["type"] == "last_update_info") {
                    $row_detail .= "<br><small><i>" . $dv["name"] . ": </i></small>";
                    $row_detail .= user_updated($r, $auth_users);
                }
                if (isset($dv["type"]) && $dv["type"] == "created_info") {
                    $row_detail .= "<br><small><i>" . $dv["name"] . ": </i></small>";
                    $row_detail .= user_created($r, $auth_users);
                }

                // history in details
                else if (isset($dv["type"]) && $dv["type"] == "history") {
                    $row_detail .= "<br><br><strong><i>" . $dv["name"] . ": </i></strong><br>";
                    $row_detail .= display_column_history($vars, $r, $history, $dv["history_columns"]);
                }

                // documents
                else if (isset($dv["type"]) && $dv["type"] == "multi-file") {
                    $row_detail .= "<strong><i>" . $dv["name"] . ": </i></strong><br>";
                    $row_detail .= display_documents($vars, $r, $dv, $documents);
                }

                // Extra column values
                else if (isset($dv["column"]) && $dv["column"] != "") {
                    $colname = $dv["column"];
                    $colval = "";

                    $show_col = true;
                    if (isset($dv["show_only"]) && is_array($dv["show_only"]) && sizeof($dv["show_only"]) > 0) {
                        foreach ($dv["show_only"] as $shwk => $shwv) {
                            // print_arr($shwv);
                            foreach ($shwv as $sk => $sv) {
                                if ($r[$sk] != $sv) {
                                    $show_col = false;
                                }
                            }
                        }
                    }

                    if ($show_col == true) {
                        if ($r[$colname] != NULL) {
                            $colval = nl2br($r[$colname]);
                        }

                        if (isset($dv["format"])) {
                            if ($dv["format"] == "ts_to_dt") {
                                $colval = ts_to_dt($colval);
                            }
                            if ($dv["format"] == "date") {
                                $colval = ymd_to_dt($colval);
                            }
                        }

                        // if (isset($dv["options"]) && !isset($dv["type"])) {
                        //     if (is_array($dv["options"]) && isset($dv["options"][$colval])) {
                        //         $colval = $dv["options"][$colval];
                        //     }
                        // }

                        if (isset($dv['type'])) {
                            if ($dv['type'] == "image-file") {
                                $colval = display_thumb($r, $colname, $images);
                            }
                            if ($dv['type'] == "table_id") {
                                $val = $r[$colname] ?? "";
                                if ($val != "") {
                                    $colval = "";
                                    foreach ($dv["options"] as $ok => $ov) {
                                        if ($ov[$dv["option_id"]] == $val) {
                                            $colval .= $ov[$dv["option_label"]] . "";
                                            if (isset($dv["module"]) && $dv["module"] != "") {
                                                $colval .= "" . get_module_link($dv["module"], $val, "form") . "";
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        if (isset($dv["options"]) && !isset($dv["type"])) {
                            if (is_array($dv["options"]) && isset($dv["options"][$colval])) {
                                $colval = $dv["options"][$colval];
                            }
                        }

                        if (isset($dv["attributes"]) && !isset($dv["type"])) {
                            if (is_array($dv["attributes"]) && isset($dv["attributes"][$colval])) {
                                $colval = $dv["attributes"][$colval]["attribute"];
                            }
                        }

                        //
                        $row_detail .= "<small><i>" . $dv["name"] . ": </i></small><strong>" . $colval . "</strong>" . "<br>";
                    }
                }
            }
            $details[$r[$vars["primary_column"]]] = $row_detail;
            // --------


            $html .= "</tr>";
        }
    }

    $html .= "</tbody></table></div></div>";

    foreach ($details as $det_rowid => $str) {
        // $html .= "<input type='text' value='" . htmlspecialchars($str, ENT_QUOTES, 'UTF-8'). "' id='details-" . $det_rowid . "'>";
        $html .= "<textarea id='details-" . $det_rowid . "' style='display:none;'>" . htmlspecialchars($str, ENT_QUOTES, 'UTF-8') . "</textarea>";
    }

    return $html;

    // return $ret;
}

function randomString($length = 16)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }

    return $randomString;
}

function check_row_condition($r, $condition)
{
    // print_arr($r);
    // print_arr($condition);
    $res = [];
    foreach ($condition["checks"] as $ck => $c) {

        // not in array condition
        if ($c["is"] == "not_in_array") {
            if (isset($c["column"]) && isset($c["value"])) {
                $col = $c["column"];
                $val = $c["value"];
                // echo $col; print_arr($val);
                $res[$ck] = in_array($r[$col], $val) ? "fail" : "pass";
            }
        }

        // is_valid condition
        else if ($c["is"] == "is_not_valid") {
            if (isset($c["column"])) {
                $col = $c["column"];
                $res[$ck] = ($r[$col] == NULL || $r[$col] == "" || $r[$col] == "0") ? "pass" : "fail";
            }
        }

        // is_valid condition
        else if ($c["is"] == "is_valid") {
            if (isset($c["column"])) {
                $col = $c["column"];
                $res[$ck] = ($r[$col] != NULL && $r[$col] != "" && $r[$col] != "0") ? "pass" : "fail";
            }
        }
    }

    // print_arr($res);
    if ($condition["type"] == "AND") {
        if (in_array("fail", $res)) {
            return false;
        }
    } else if ($condition["type"] == "OR") {
        if (!in_array('pass', $res, true)) {
            return false;
        }
    }

    return true;
}




function get_module_link($module, $val, $key, $format = "")
{
    $s = "";
    if ($module != "" && $key != "" && $val != "") {
        $arr = get_module_details($module);
        // print_arr($arr);
        $link = $arr[$key];
        // echo $link;
        $link = str_replace("XXX", $val, $link);

        $modname = "";
        if ($format == "full") {
            $modname .= $arr["name"] . " ";
        }

        $modname .= $arr["id_prefix"] . "" . $val;
        $s = "<a href='" . $link . "' class='table_id_link'>[" . $modname . "]</a></span>";
    }
    return $s;
}


function arr_val_valid($arr, $key)
{
    if (is_array($arr) && $key != "") {
        if (isset($arr[$key]) && $arr[$key] != NULL && $arr[$key] != "" && $arr[$key] != "0") {
            return true;
        }
    }
    return false;
}

function value_valid($v)
{
    if ($v != NULL && $v != "" && $v != "0") {
        return true;
    }
    return false;
}


function crud_update() {}

function crud_delete() {}

function crud_create() {}

function display_documents($vars, $r, $dv, $documents)
{
    // print_arr($documents);
    // $colval = json_encode($r);

    $colval = "";

    $primary_column = $vars["primary_column"];
    if (isset($documents[$r[$primary_column]])) {

        // $colval = sizeof($documents[$r[$primary_column]]);

        $docs = $documents[$r[$primary_column]];
        foreach ($docs as $dk => $drow) {
            $d = "";
            $fullpath = $drow["name"];
            $filetype = get_filetype($drow["type"]);

            $iconpath = "";
            if ($filetype == "image" && $drow["thumb"] != "") {
                $iconpath = $drow["thumb"];
            } else {
                $iconpath = "assets/images/file/" . $filetype . ".svg";
            }
            // default file icon
            if (!file_exists(ROOT_DIR . "/" . $iconpath)) {
                $iconpath = "assets/images/file/file.svg";
            }


            if (file_exists(ROOT_DIR . "/" . $fullpath)) {
                $tit = "";
                if ($drow["caption"] != "" && isset($dv["attributes"][$drow["caption"]])) {
                    $tit .= $dv["attributes"][$drow["caption"]]["attribute"];
                }
                if ($drow["other"] != "" && $drow["other"] != NULL) {
                    if ($tit != "") {
                        $tit .= " / ";
                    }
                    $tit .= $drow["other"];
                }
                $d = "<div class='doc-thumb'>
                        <a href='" . ROOT_PATH . "/" . $fullpath . "' target='_blank'><img src='" . ROOT_PATH . "/" . $iconpath . "' class='table-thumb'><span>" . $tit . "</span></a>
                </div>";
            } else {
                $d = "<img src='" . ROOT_PATH . "/assets/images/notfound.jpg' class='table-thumb'>";
            }
            $colval .= $d;
        }
    }

    if ($colval != "") {
        $colval .= "<br><br>";
    }

    return $colval;
}

function display_thumb($r, $colname, $images)
{
    $colval = "";
    $val = $r[$colname] ?? "";
    if ($val != "" && isset($images[$val])) {
        $fullpath = $images[$val]["name"];
        $filetype = get_filetype($images[$val]["type"]);

        $iconpath = "";
        if ($filetype == "image" && $images[$val]["thumb"] != "") {
            $iconpath = $images[$val]["thumb"];
        } else {
            $iconpath = "assets/images/file/" . $filetype . ".svg";
        }
        // default file icon
        if (!file_exists(ROOT_DIR . "/" . $iconpath)) {
            $iconpath = "assets/images/file/file.svg";
        }


        if (file_exists(ROOT_DIR . "/" . $fullpath)) {
            $colval = "<a href='" . ROOT_PATH . "/" . $fullpath . "' target='_blank'><img src='" . ROOT_PATH . "/" . $iconpath . "' class='table-thumb'></a>";
        } else {
            $colval = "<img src='" . ROOT_PATH . "/assets/images/notfound.jpg' class='table-thumb'>";
        }
    }
    // echo $colval;
    return $colval;
}

function fetch_image_rows($rows, $cols)
{
    $images = [];

    // print_arrbox($rows);
    // print_arr($cols);
    $ids = [];
    foreach ($rows as $rk => $r) {
        foreach ($cols as $ck => $col) {
            if (isset($r[$col])) {
                $ids[] = $r[$col];
            }
        }
    }
    // print_arr($ids);
    $condition = "";
    if (sizeof($ids) > 0) {
        $condition = " id IN (" . implode(",", $ids) . ") ";
        $fetched = fetch_data(["table" => "uploads", "columns" => "id, thumb, name, type, small", "condition" => $condition, "order" => "", "limit" => ""]);    // print_arr($image_arr);
        // print_arrbox($fetched, 300);
        foreach ($fetched as $k => $i) {
            $images[$i["id"]] = $i;
        }
        unset($fetched);
    }

    // print_arrbox($images, 300);
    return $images;
}

function fetch_document_rows($vars, $fetched_rows)
{
    $docs = [];
    $tablename = $vars["tablename"];
    // print_arrbox($rows);
    // print_arr($cols);
    $ids = [];
    foreach ($fetched_rows as $rk => $r) {
        $ids[] = $r[$vars["primary_column"]];
    }
    // print_arr($ids);
    $condition = "";
    if (sizeof($ids) > 0) {
        $condition = " table_name = '" . $tablename . "' AND  row_id IN (" . implode(",", $ids) . ") AND file_type = 'document' ";
        $fetched = fetch_data(["table" => "uploads", "columns" => "id, thumb, name, type, small, row_id, table_name, caption, other", "condition" => $condition, "order" => "", "limit" => ""]);    // print_arr($image_arr);
        // print_arrbox($fetched, 300);
        foreach ($fetched as $k => $i) {
            $docs[$i["row_id"]][] = $i;
        }
        unset($fetched);
    }

    // print_arrbox($docs, 300);
    return $docs;
}

function fetch_auth_users($rows)
{

    $users = [];

    // print_arrbox($rows);
    // print_arr($cols);
    $ids = [];
    foreach ($rows as $rk => $r) {
        if (isset($r["auth_user"]) && $r["auth_user"] != NULL && $r["auth_user"] != "" && $r["auth_user"] != "0") {
            $ids[] = $r["auth_user"];
        }
        if (isset($r["created"]) && $r["created"] != NULL && $r["created"] != "" && $r["created"] != "0") {
            $expcr = explode("_", $r["created"]);
            if (sizeof($expcr) == 2 && isset($expcr[1])) {
                $ids[] = $expcr[1];
            }
        }
    }
    $ids = array_filter(array_unique($ids));

    // print_arr($ids);
    $condition = "";
    if (sizeof($ids) > 0) {
        $condition = " id IN (" . implode(",", $ids) . ") ";
        $fetched = fetch_data(["table" => "users", "columns" => "id, name", "condition" => $condition, "order" => "", "limit" => ""]);    // print_arr($image_arr);
        // print_arrbox($fetched, 300);
        foreach ($fetched as $k => $i) {
            $users[$i["id"]] = $i;
        }
        unset($fetched);
    }

    // print_arrbox($users, 300);
    return $users;
}

function datepicker_scripts()
{
    $s = '<link rel="stylesheet" href="' . ROOT_PATH . '/assets/plugins/flatpickr/flatpickr.min.css">
    <script src="' . ROOT_PATH . '/assets/plugins/flatpickr/flatpickr.js"></script>';
    // echo $s;
    return $s;
}


function datatable_scripts()
{

    $s = '<link href="' . ROOT_PATH . '/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="' . ROOT_PATH . '/plugins/datatables/fixedheader/css/fixedHeader.dataTables.min.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="' . ROOT_PATH . '/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="' . ROOT_PATH . '/plugins/datatables/fixedheader/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
    <script src="' . ROOT_PATH . '/plugins/datatables/fixedcolumns/js/dataTables.fixedColumns.min.js" type="text/javascript"></script>';

    // echo $s;

    return $s;
}



function datatable_instance($module_pages)
{
    $tableid = "#" . $module_pages["read"] . "_table";
?>
    <script>
        // const pageStart = new Date();
        // console.log("Page started loading at:", pageStart.toLocaleTimeString());

        $(document).ready(function() {
            const table = $('<?php echo $tableid; ?>').DataTable({
                info: false,
                autoWidth: true,
                deferRender: true, // don’t render invisible rows
                //scrollY: 800, // fixed height (px)
                scroller: true, // enables virtual scrolling
                pageLength: -1, // special value to show all rows
                lengthMenu: [
                    [-1, 100, 250, 500, 1000],
                    ["All", 100, 250, 500, 1000]
                ], // optional: dropdown
                order: [
                    // [16, 'desc'],
                    // [14, 'desc']
                ], // Sort by Symbol by default

                columnDefs: [{
                        targets: 'no-sort',
                        orderable: false,
                    },
                    {
                        targets: 'no-search',
                        searchable: false,
                    },
                    // {
                    //     targets: 1, // column index where checkboxes are
                    //     orderable: true,
                    //     render: function(data, type, row) {
                    //  // 'type' can be 'display', 'filter', or 'sort'
                    //  if (type === 'sort') {
                    //      let checked = $(data).find('input[type="checkbox"]').prop('checked');
                    //      return checked ? 1 : 0;
                    //      // Return 1 if checked, 0 if unchecked
                    //      //   return $('input[type="checkbox"]', data).prop(':checked') ? 1 : 0;
                    //  }
                    //  return data;
                    //     }
                    // },
                ]


                // initComplete: function(settings, json) {
                //   const end = new Date();
                //   console.log("DataTable finished loading at:", end.toLocaleTimeString());

                //   const diff = (end - pageStart) / 1000;
                //   console.log("Total load time:", diff.toFixed(2), "seconds");

                //   // Optionally show on the page:
                //   document.body.insertAdjacentHTML("beforeend",
                //     `<p>DataTable loaded in <b>${diff.toFixed(2)}</b> seconds</p>`);
                // }
            });

            // Function to build nested detail table
            function format(details) {
                let html = "<table class='detail-table'>";
                html += "<thead><tr><th>Field</th><th>Value</th></tr></thead><tbody>";
                for (const key in details) {
                    html += `<tr><td>${key}</td><td>${details[key]}</td></tr>`;
                }
                html += "</tbody></table>";
                return html;
            }


            let detailData = {}; // store JSON data here

            // Step 1: Load the JSON file once
            // $.getJSON('<?php //echo $dir . "" . $json_filename; 
                            ?>', function(data) {
            //     detailData = data;
            // });

            // Toggle detail row
            $('<?php echo $tableid; ?> tbody').on('click', 'td.details-control', function() {
                const tr = $(this).closest('tr');
                const row = table.row(tr);
                const id = tr.data('details'); // e.g. "1"

                // const details = JSON.parse(tr.data('details'));
                // const details = tr.data('details');
                // detailData[id] = details;

                // console.log(details);

                if (row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Get the details HTML by ID from JSON
                    const id = tr.data('id');
                    detailData[id] = $("#details-" + id).val();

                    const details = detailData[id] || "<div class='no-det'>No more details to display</div>";
                    // Show it
                    row.child(details).show();
                    tr.addClass('shown');

                }
            });
        });
    </script>
<?php
}

function column_history_fields($history, $data)
{
    $s = "";
    foreach ($history["columns"] as $hk => $hv) {
        $s .= '<input type="hidden" class="form-control" name="old_' . $hv . '" id="old_' . $hv . '" value="' . get_value($data, $hv) . '" ' . '>';
    }
    return $s;
}

function form_field($vars, $data)
{
    $s = "";


    if ($vars["type"] == "submit") {
        $s = '<div class="' . $vars["class"] . '">';
        $s .= '<input type="submit" name="' . $vars["key"] . '" value="' . $vars["name"] . '" class="btn btn-success btn-lg">';
        $s .= '</div>';
    }

    //
    else {

        $show_as_field = true;
        if ($vars["type"] == "hidden") {
            $show_as_field = false;
        }


        if ($show_as_field) {

            $parent_class = "";
            // if(isset($vars["parent_field"])){
            //     $parent_class = $vars["parent_field"]["column"]."_".$vars["parent_field"]["value"]." default_".$vars["parent_field"]["default"];
            // }

            $s = '<div class="' . $vars["class"] . ' ' . $parent_class . '"><label for="' . $vars["key"] . '" class="form-label">' . $vars["name"] . '';

            $required = (isset($vars["required"]) && $vars["required"] == true) ? true : false;
            if ($required) {
                $s .= '<sup>*</sup>';
            }

            if (isset($vars["eg"]) && $vars["eg"] != "") {
                $s .= '<small><i> (eg: ' . $vars["eg"] . ')</i></small>';
            }
            $s .= '</label>';
        }

        if ($vars["type"] == "display") {
            $s .= '<div class="form-display" name="' . $vars["key"] . '" id="' . $vars["key"] . '">' . get_value($data, $vars["key"]) . '</div>';
        }
        //

        else if ($vars["type"] == "text") {
            $s .= '<input type="text" class="form-control" name="' . $vars["key"] . '" id="' . $vars["key"] . '" value="' . htmlspecialchars(get_value($data, $vars["key"])) . '" ' . ($required ? "required" : "") . '>';
            $s .= '<div class="invalid-feedback">Incorrect ' . $vars["name"] . ' value</div>';
        }
        //
        else if ($vars["type"] == "date") {
            $datefield_id = str_replace("[]", "", $vars["key"]) . "-" . rand();
            $s .= '<input type="text" class="form-control" name="' . $vars["key"] . '" id="' . $datefield_id . '" value="' . get_value($data, $vars["key"]) . '" ' . ($required ? "required" : "") . '>';
            $s .= '<div class="invalid-feedback">Incorrect ' . $vars["name"] . ' value</div>';
            $s .= '<script>flatpickr("#' . $datefield_id . '", {altInput: true, altFormat: "d M Y, D", dateFormat: "Ymd"}); </script>';
        }
        //
        else if ($vars["type"] == "hidden") {
            $s .= '<input type="hidden" class="form-control" name="' . $vars["key"] . '" id="' . $vars["key"] . '" value="' . get_value($data, $vars["key"]) . '" ' . '>';
        }
        //
        else if ($vars["type"] == "textarea") {
            $s .= '<textarea class="form-control" name="' . $vars["key"] . '" id="' . $vars["key"] . '" ' . ($required ? "required" : "") . '>' . get_value($data, $vars["key"]) . '</textarea>';
            $s .= '<div class="invalid-feedback">Incorrect ' . $vars["name"] . ' value</div>';
        }
        //
        else if ($vars["type"] == "number") {
            $maxno = "";
            if (isset($vars["max"])) {
                $maxno = " max = '" . $vars["max"] . "' ";
            }
            $s .= '<input type="number" class="form-control" step="any" name="' . $vars["key"] . '" id="' . $vars["key"] . '" ' . $maxno . ' value="' . get_value($data, $vars["key"]) . '" ' . ($required ? "required" : "") . '>';
            $s .= '<div class="invalid-feedback">Incorrect ' . $vars["name"] . ' value</div>';
        }
        //
        else if ($vars["type"] == "select") {
            $s .= '<select class="form-control" readonly name="' . $vars["key"] . '" id="' . $vars["key"] . '" ' . ($required ? "required" : "") . '>';
            $sel = get_value($data, $vars["key"]);
            $s .= select_options($vars["options"], $sel);
            $s .= '</select><div class="invalid-feedback">Incorrect ' . $vars["name"] . ' value</div>';
        }
        //
        else if ($vars["type"] == "select-attribute") {
            $s .= '<select class="form-control" name="' . $vars["key"] . '" id="' . $vars["key"] . '" ' . ($required ? "required" : "") . '>';
            $sel = get_value($data, $vars["key"]);
            $s .= select_attribute_options($vars["attributes"], $sel);
            $s .= '</select><div class="invalid-feedback">Incorrect ' . $vars["name"] . ' value</div>';
        }
        //
        else if ($vars["type"] == "multi-checkbox") {
            $s .= '<div class="multi-check-list">';
            foreach ($vars["options"] as $k => $v) {
                $sel = "";
                $optid = $vars["option_id"];
                $optlabel = $vars["option_label"];
                if (in_array($v[$optid], $data[$vars["key"]])) {
                    $sel = "checked";
                }
                $s .= '<input type="checkbox" ' . $sel . ' class="form-check-input" name="' . $vars["key"] . '[]" id="' . $vars["key"] . '-' . $v[$optid] . '" value="' . $v[$optid] . '"><label for="' . $vars["key"] . '-' . $v[$optid] . '">' . $v[$optlabel] . '</label><br>';
            }
            $s .= '</div>';
        }
        //
        else if ($vars["type"] == "image-file") {
            $s .= '<input type="file" class="form-control" name="' . $vars["key"] . '" id="' . $vars["key"] . '" ' . ($required ? "required" : "") . '>';
            $s .= '<div class="invalid-feedback">Invalid ' . $vars["name"] . '</div>';
            if (isset($data[$vars["key"]])) {
                if (is_array($data[$vars["key"]]) && isset($data[$vars["key"]][0])) {
                    $imgarr = $data[$vars["key"]][0];
                    $urlpath = "";
                    $fullpath = $imgarr["name"];
                    // print_arr($imgarr);
                    $filetype = get_filetype($imgarr["type"]);

                    // if image, then display thumb
                    if ($filetype == "image" && isset($vars["display_size"]) && $vars["display_size"] != "") {
                        $urlpath = isset($imgarr[$vars["display_size"]]) ? $imgarr[$vars["display_size"]] : $imgarr["thumb"];
                    }
                    // choose file icon
                    else {
                        $urlpath = "assets/images/file/" . $filetype . ".svg";
                    }

                    // default file icon
                    if (!file_exists(ROOT_DIR . "/" . $urlpath)) {
                        $urlpath = "assets/images/file/file.svg";
                    }

                    // if file exists, then link it
                    if (file_exists(ROOT_DIR . "/" . $fullpath)) {
                        $s .= "<div class='image-file-box'><a href='" . ROOT_PATH . "/" . $fullpath . "' target='_blank'><img src='" . ROOT_PATH . "/" . $urlpath . "' class='form-imgbox'></a>";
                        $s .= "<div class='delete-this-checkbox'>
                                    <input class='form-check-input delete' name='" . $vars["key"] . "-delete' value='" . $imgarr["id"] . "' id='delete-file-" . $imgarr["id"] . "' type='checkbox'>
                                    <label class='form-check-label' for='delete-file-" . $imgarr["id"] . "'>Delete</label>
                                </div><script> $('#delete-file-" . $imgarr["id"] . "').on('change', function() {
                                $(this).closest('.image-file-box').toggleClass('mark-delete', this.checked);
                                }); </script></div>";
                    }
                    // if file not exists on server
                    else {
                        $s .= "<img src='" . ROOT_PATH . "/assets/images/notfound.jpg' class='form-imgbox'>";
                    }
                }
            }
        }

        //
        else if ($vars["type"] == "multi-file") {
            $s .= '<input type="file" multiple class="form-control" name="' . $vars["key"] . '[]" id="' . $vars["key"] . '" ' . ($required ? "required" : "") . '>';
            $s .= '<div class="invalid-feedback">Invalid ' . $vars["name"] . '</div><div id="file-list-' . $vars["key"] . '"></div>';
            $s .= "<script>
                        document.getElementById('" . $vars["key"] . "').addEventListener('change', function(e) {
                        let files = Array.from(e.target.files);
                        console.log(files);
                        let html = '';
                        files.forEach((file, index) => {
                            html += `<div class='multi-file-item'><img src='" . ROOT_PATH . "/assets/images/file/file.svg'><div class='fn'><b>`+file.name+`</b> (`+((file.size/1024).toFixed(1))+` KB)</div>
                            <input type='hidden' name='" . $vars["key"] . "-index[]' value='`+index+`'>
                            <div class='multi-ft'>
                            <div class='ftcol'><p>Select file type</p>
                            <select class='form-control " . $vars["key"] . "-multi-item-type' name='" . $vars["key"] . "-caption[]' id='" . $vars["key"] . "-attribute-`+index+`'>";
            $sel = "";
            $s .= select_attribute_options($vars["attributes"], $sel);
            $s .= "</select></div>
                            <div class='ftcol'>
                            <p>Or describe file type</p>
                            <input type='text' class='form-control " . $vars["key"] . "-multi-item-other' name='" . $vars["key"] . "-other[]' value='' placeholder=''>
                            </div></div>
                            </div>`;
                        });
                        document.getElementById('file-list-" . $vars["key"] . "').innerHTML = html;";
            /*
                        $s .= "$('." . $vars["key"] . "-multi-item-type').on('change', function() {
                            let other = $(this).next('." . $vars["key"] . "-multi-item-other');
                            if($(this).val() == 'other'){ other.attr('type', 'text'); } else { other.attr('type', 'hidden'); }
                            console.log($(this).val());
                        });"; */
            $s .= "});
                    </script>";
            if (isset($data[$vars["key"]]) && is_array($data[$vars["key"]])) {
                foreach ($data[$vars["key"]] as $dk => $dv) {
                    // print_arr($dv);
                    // print_arr($vars["attributes"]);
                    $s .= display_document_linked($vars, $dv, $vars["attributes"]);
                }
            }
        }
        //
        else if ($vars["type"] == "delete_row") {
            $s .= "<span class='icon wtxt bg-info delete-row-btn' id='" . $vars["key"] . "'><i data-feather='trash'></i>Delete</span>
            <script> $(document).on('click', '#" . $vars["key"] . "', function () {  
                $(this).closest('tr').remove();
            }); </script>";
        }

        if ($show_as_field) {
            $s .= '</div>';
        }

        if (isset($vars["restrict"]) && $vars["restrict"] != "") {
            if ($vars["restrict"] == "lowercase|_") {
                $s .= "<script>
                        $('#" . $vars["key"] . "').on('input', function() {
                            let val = $(this).val().toLowerCase();
                            $(this).val(val.replace(/[^a-z0-9_]/g, ''));
                        });
                        </script>";
            }
        }
    }



    return $s;
}

function display_document_linked($vars, $dv, $captions)
{
    $fieldkey = $vars["key"];
    $imgarr = $dv;
    $urlpath = "";
    $fullpath = $imgarr["name"];
    // print_arr($imgarr);
    $filetype = get_filetype($imgarr["type"]);
    // echo $filetype;

    $s = "";
    // if image, then display thumb
    if ($filetype == "image" && isset($vars["display_size"]) && $vars["display_size"] != "") {
        $urlpath = isset($imgarr[$vars["display_size"]]) ? $imgarr[$vars["display_size"]] : $imgarr["thumb"];
    }
    // choose file icon
    else {
        $urlpath = "assets/images/file/" . $filetype . ".svg";
    }

    // default file icon
    if (!file_exists(ROOT_DIR . "/" . $urlpath)) {
        $urlpath = "assets/images/file/file.svg";
    }

    $tit = "";
    if (isset($dv["caption"]) && $dv["caption"] != "") {
        if (isset($captions[$dv["caption"]])) {
            $tit .= $captions[$dv["caption"]]["attribute"];
        }
    }
    if (isset($dv["other"]) && $dv["other"] != "") {
        if ($tit != "") {
            $tit .= " / ";
        }
        $tit .= $dv["other"];
    }

    $s .= "<div class='multi-listwrap'>";
    // if file exists, then link it
    if (file_exists(ROOT_DIR . "/" . $fullpath)) {
        $s .= "<a href='" . ROOT_PATH . "/" . $fullpath . "' target='_blank'><img src='" . ROOT_PATH . "/" . $urlpath . "' class='form-imgbox-list'><span>" . $tit . "</span></a>";
    }
    // if file not exists on server
    else {
        $s .= "<img src='" . ROOT_PATH . "/assets/images/notfound.jpg' class='form-imgbox'>";
    }

    $s .= "<div class='delete-this-checkbox'>
            <input class='form-check-input delete' name='" . $fieldkey . "-delete[]' value='" . $dv["id"] . "' id='delete-doc-" . $dv["id"] . "' type='checkbox'>
            <label class='form-check-label' for='delete-doc-" . $dv["id"] . "'>Delete</label>
        </div><script> $('#delete-doc-" . $dv["id"] . "').on('change', function() {
         $(this).closest('.multi-listwrap').toggleClass('mark-delete', this.checked);
        }); </script>";

    $s .= "</div>";

    return $s;
}
//multi-listwrap

function module_get_data($table, $id)
{
    $data = [];
    $data['mode'] = 'new';
    if ($id != "") {
        $get = get_data($table, 'WHERE id=' . $id . '', '*');
        if (sizeof($get) > 0) {
            $data = $get[0];
        }
        $data['mode'] = 'update';
    }
    return $data;
}

function module_submit_form($vars)
{
    global $conn;

    $_REQ = $vars["submit_data"];
    // $_FILES = $vars["submit_files"] ?? [];
    $table = $vars["tablename"];
    $msg = $vars["messages"];
    $save_fields = $vars["save_fields"];
    $link_table_rows = $vars["link_table_rows"];
    $primary_column = $vars["primary_column"];

    $ts = getts();
    $curr_user_id = get_curr_user_id();

    if (isset($_REQ['save']) || isset($_REQ['savenew'])) {
        // print_arr($_REQ);
        // print_arr($_FILES);
        // print_arr($_SESSION);
        // die;

        $query = '';
        foreach ($save_fields as $sk => $sv) {

            if (isset($sv["type"]) && $sv["type"] == "time") {
                $query .= " " . $sv['key'] . " = \"" . $ts . "\", ";
            }
            //
            else if (isset($sv["type"]) && $sv["type"] == "created_time") {
                if ($_REQ['mode'] == 'new') {
                    $query .= " " . $sv['key'] . " = \"" . $ts . "_" . $curr_user_id . "\", ";
                }
            }
            //
            else if (isset($sv["type"]) && $sv["type"] == "session_user") {
                $query .= " " . $sv['key'] . " = \"" . $curr_user_id . "\", ";
            }
            //
            else if (isset($sv["type"]) && $sv["type"] == "image") {

                $image = single_file_upload($conn, $_REQ, $_FILES, $sv["key"]);
                // echo "image id: " . $image;
                if ($image != "") {
                    $query .= " " . $sv['key'] . " = \"" . $image . "\", ";
                }
                // if image or file is marked as deleted
                else if (isset($_REQ[$sv["key"] . "-delete"]) && $_REQ[$sv["key"] . "-delete"] != "") {
                    $query .= " " . $sv['key'] . " = NULL, ";
                }

                // die;
            }

            //
            else if (isset($sv["type"]) && $sv["type"] == "multi-file") {
                // do nothing..
            }
            // 
            else if (isset($sv["type"]) && $sv["type"] == "implode" && isset($_REQ[$sv['key']])) {
                $query .= " " . $sv['key'] . " = \"" . implode($sv["sep"], $_REQ[$sv['key']]) . "\", ";
            }
            //
            else {

                if(isset($_REQ[$sv['key']])){
                    $query .= " " . $sv['key'] . " = \"" . $conn->real_escape_string($_REQ[$sv['key']]) . "\", ";
                }
            }
        }

        $query = trim($query);
        $query = substr($query, 0, -1);

        // echo $query;
        // die;

        //for non english languages
        $sql = $conn->query('SET NAMES utf8');

        if ($_REQ['mode'] == 'new') {
            // insert

            // $query .= " created = \"".$ts."\" ";
            $q = "INSERT INTO $table SET " . $query . ' ';
            // echo $q;
            // die;
            $sql = $conn->query($q);

            //echo "New firewall inserted at ". decrypt($datetime);
            if ($sql) {

                $insert_id = $conn->insert_id;
                save_link_table_rows($vars, $insert_id);
                save_multi_document_upload($vars, $insert_id);
                save_column_history($vars, $insert_id);
                action_on_submit($vars, $_REQ[$primary_column]);

                notify_and_redirect_on_submit($vars, 'success', $msg["success_added"]);
                //
                // notify('success', $msg["success_added"]);

                // redirect_action($_REQ);

                return true;
            } else {
                notify('danger', $msg["error_added"]);

                // redirect_action($_REQ);

                return false;
            }
        }

        //
        elseif ($_REQ['mode'] == 'update') {
            // update
            // $query .= " updated = \"" . $ts . "\" ";

            // echo " UPDATE $table SET " . $query . " WHERE " . $primary_column . " = '" . $_REQ[$primary_column] . "' ";
            $sql = $conn->query(" UPDATE $table SET " . $query . " WHERE " . $primary_column . " = '" . $_REQ[$primary_column] . "' ");

            if ($sql) {
                save_link_table_rows($vars, $_REQ[$primary_column]);
                save_multi_document_upload($vars, $_REQ[$primary_column]);
                save_column_history($vars, $_REQ[$primary_column]);
                action_on_submit($vars, $_REQ[$primary_column]);

                notify_and_redirect_on_submit($vars, 'success', $msg["success_update"]);

                // notify('success', $msg["success_update"]);
                // redirect_action($_REQ);

                return true;
            } else {
                notify('danger', $msg["error_update"]);
                // redirect_action($_REQ);

                return false;
            }
        } else {
            // no mode defined
            return false;
        }
    }
}



function bi_single_inputs($fields)
{
    $s = '';
    foreach ($fields as $sk => $sv) {
        $s .= "<input type='hidden' name='" . $sv['column'] . "' value='" . $sv['value'] . "'>";
    }
    return $s;
}


function bi_add_new_row($tableid, $template)
{
    $s = "";
    $ele = 'new-row-html';
    $s .=  "<input type='button' class='btn btn-primary add-new-row' value='Add new row' data-element='" .  $ele .  "' data-table='" .  $tableid .  "'>";
    $s .= "<template  id='" . $ele . "' style='display:none'>" . $template . '</template >';
    $s .= '<script>
        $(document).on("click", ".add-new-row", function() {
          let tableid = $(this).attr("data-table");
          let ele = $(this).attr("data-element");
          console.log(tableid, ele);
          let rowHtml = $("#" + ele).html();
          $("#" + tableid + " tbody").append(rowHtml);
          feather.replace();
        });
      </script>';
    return $s;
}

function bi_bulk_submit_form($vars)
{

    global $conn;
    // print_arr($vars);
    $_REQ = $vars["submit_data"];
    // $_FILES = $vars["submit_files"] ?? [];
    $msg = $vars["msg"];
    $table = $vars["tablename"];
    $primary_column = $vars["primary_column"] ?? "";
    $save_fields = $vars["save_fields"];
    $mode = $vars["mode"] ?? "new"; // todo in other forms


    $ts = getts();
    $curr_user_id = get_curr_user_id();
    $saverows = [];
    $insert_ids = [];
    $errors = 0;

    if (isset($_REQ['save']) || isset($_REQ['savenew'])) {
        // print_arr($_REQ);
        // print_arr($_FILES);
        // die;

        if (isset($_REQ["rowindex"]) && is_array($_REQ["rowindex"])) {

            foreach ($_REQ["rowindex"] as $index => $rv) {
                $row = [];

                if ($rv != "") {
                    $row[$primary_column] = $rv;
                }

                foreach ($save_fields["single"] as $sk => $sv) {
                    if (isset($sv["type"]) && $sv["type"] == "time") {
                        $row[$sv["key"]] = $ts;
                    }
                    //
                    else if (isset($sv["type"]) && $sv["type"] == "created_time") {
                        $row[$sv["key"]] = $ts . "_" . $curr_user_id;
                    }
                    //
                    else if (isset($sv["type"]) && $sv["type"] == "session_user") {
                        $row[$sv["key"]] = $curr_user_id;
                    }

                    //
                    else {
                        if (isset($_REQ[$sv["key"]])) {
                            $row[$sv["key"]] = $_REQ[$sv["key"]];
                        }
                    }
                }

                foreach ($save_fields["multi"] as $fk => $fv) {
                    $row[$fv["key"]] = $_REQ[$fv["key"]][$index];
                }
                $saverows[] = $row;
            }

            // print_arr($saverows);
        }
        // die;

        foreach ($saverows as $index => $r) {

            $query = '';
            foreach ($r as $c => $v) {
                $query .= " " . $c . " = \"" . $conn->real_escape_string($v) . "\", ";
            }
            $query = trim($query);
            $query = substr($query, 0, -1);

            if ($mode == "new") {
                $q = "INSERT INTO " . $table . " SET " . $query . ' ';
                // echo $q . "<br>";
                $sql = $conn->query($q);
                if ($sql) {
                    $insid = $conn->insert_id;
                    $affected_ids[] = $insid;
                    // save column history here
                    save_product_movements($vars, $r);
                    save_bulk_column_history($vars, $insid, $index);
                } else {
                    $errors++;
                }
            }

            //
            else if ($mode == "update") {
                $q = " UPDATE " . $table . " SET " . $query . " WHERE " . $primary_column . " = '" . $r[$primary_column] . "' ";
                // echo $q . "<br>";
                $sql = $conn->query($q);
                if ($sql) {
                    // $insid = $conn->insert_id;
                    $affected_ids[] = $r[$primary_column];
                    save_product_movements($vars, $r);
                    save_bulk_column_history($vars, $r[$primary_column], $index);
                } else {
                    $errors++;
                }
            }
        }

        if (sizeof($_REQ["rowindex"]) == sizeof($affected_ids) && $errors == 0) {
            action_on_submit($vars, "");
            notify_and_redirect_on_submit($vars, 'success', (($mode == "new") ? $msg["success_added"] : $msg["success_updated"]));
            redirect_action($_REQ);
            return true;
        } else if (sizeof($affected_ids) > 0 && $errors > 0) {
            notify_and_redirect_on_submit($vars, 'warning', (($mode == "new") ? $msg["warning_added"] : $msg["warning_updated"]));
            redirect_action($_REQ);
            return false;
        } else {
            notify('danger', (($mode == "new") ? $msg["error_added"] : $msg["error_updated"]));
            redirect_action($_REQ);
            return false;
        }
    }
}

function save_link_table_rows($vars, $primary_id)
{
    global $conn;

    $_REQ = $vars["submit_data"];
    $ltr = $vars["link_table_rows"] ?? [];
    $primary_column = $vars["primary_column"];

    if (sizeof($ltr) > 0) {
        $rows = $_REQ[$ltr["multi_column"]["field"]] ?? [];
        $single_col = $ltr["single_column"]["column"];
        $multi_col = $ltr["multi_column"]["column"];
        $table = $ltr["table"];

        $delsql = " DELETE FROM " . $table . " WHERE " . $single_col . " = '" . $primary_id . "' ";
        // echo $delsql . "<br>";
        $conn->query($delsql);

        foreach ($rows as $k => $r) {
            $inssql = "INSERT INTO " . $table . " (" . $single_col . ", " . $multi_col . ") VALUES ( '" . $primary_id . "' , '" . $r . "') ";
            // echo $inssql . "<br>";
            $conn->query($inssql);
        }
    }
}

function save_multi_document_upload($vars, $primary_id)
{

    global $conn;

    $attachments = [];
    $deleted = [];

    $_REQ = $vars["submit_data"];
    $tablename = $vars["tablename"];
    $primary_column = $vars["primary_column"];
    $save_fields = $vars["save_fields"];
    // print_arr($_REQ);
    // print_arr($_FILES);

    $ts = getts();
    $curr_user_id = get_curr_user_id();

    if (isset($_REQ['save']) || isset($_REQ['savenew'])) {
        // print_arr($_REQ);
        // print_arr($_FILES);
        // print_arr($_SESSION);
        // die;

        $save_uploads = [];


        $query = '';
        foreach ($save_fields as $sk => $sv) {

            if (isset($sv["type"]) && $sv["type"] == "multi-file") {
                // echo $sv["key"] . "<br>";
                if (isset($_REQ[$sv["key"] . "-index"])) {
                    foreach ($_REQ[$sv["key"] . "-index"] as $i) {
                        if (isset($_FILES[$sv["key"]]["name"][$i])) {
                            $file = $_FILES[$sv["key"]];
                            $farr = [];
                            $farr["name"] = $file["name"][$i];
                            $farr["full_path"] = $file["full_path"][$i];
                            $farr["type"] = $file["type"][$i];
                            $farr["tmp_name"] = $file["tmp_name"][$i];
                            $farr["size"] = $file["size"][$i];
                            $farr["error"] = $file["error"][$i];
                            $fother = $_REQ[$sv["key"] . "-other"][$i];
                            $fcaption = $_REQ[$sv["key"] . "-caption"][$i];

                            // print_arr($farr);
                            // echo $fcaption . " , " . $fother . "<br>";

                            if (0 < $farr["error"]) {
                            } else {
                                $allowed_file = isAllowedFile($farr);
                                if (is_array($allowed_file) && $allowed_file[0] == true) {
                                    // echo "$i allowed<br>";
                                    $randno = rand() . '-';
                                    $filename = 'uploads/' . $randno . '' . $farr['name'];
                                    $type = $farr['type'];
                                    $tmp_name = $farr['tmp_name'];
                                    $thumbname = "";
                                    $smallname = "";
                                    $resize_img = (str_starts_with($allowed_file[2], "image/") && $allowed_file[1] != "svg") ? true : false;
                                    if ($resize_img) {
                                        $thumbname = 'uploads/' . $randno . 'thumb-' . $farr['name'];
                                        $thumb = ImageResize(
                                            100,
                                            100,
                                            '../../' . $thumbname,
                                            $tmp_name,
                                            $type,
                                            false
                                        );
                                        if (!$thumb) {
                                            $thumbname = '';
                                        }

                                        $smallname = 'uploads/' . $randno . 'small-' . $farr['name'];
                                        $small = ImageResize(
                                            200,
                                            200,
                                            '../../' . $smallname,
                                            $tmp_name,
                                            $type,
                                            true
                                        );
                                        if (!$small) {
                                            $smallname = '';
                                        }
                                    }
                                    move_uploaded_file($tmp_name, '../../' . $filename);

                                    // compress image
                                    if ($resize_img) {
                                        compress_image('../../' . $filename);
                                    }
                                    $save_uploads[$i] = [];
                                    $save_uploads[$i]['name'] = $filename;
                                    $save_uploads[$i]['thumb'] = $thumbname;
                                    $save_uploads[$i]['small'] = $smallname;
                                    $save_uploads[$i]['type'] = $type;
                                    $save_uploads[$i]['size'] = $farr['size'];
                                    $save_uploads[$i]['auth_user'] = $curr_user_id;
                                    $save_uploads[$i]['table_name'] = $tablename;
                                    $save_uploads[$i]['row_id'] = $primary_id;
                                    $save_uploads[$i]['file_type'] = "document";
                                    $save_uploads[$i]['caption'] = $fcaption;
                                    $save_uploads[$i]['other'] = $fother;
                                    $save_uploads[$i]['created'] = $ts . "_" . $curr_user_id;
                                }
                            }
                        }
                    }
                }

                ////
                $uploaded_ids = insert_update_data('uploads', $save_uploads, 'id');
                if (sizeof($uploaded_ids['inserted']) > 0) {
                    $attachments = [...$attachments, ...$uploaded_ids['inserted']];
                    // $attachments = implode(',', $uploaded_ids['inserted']);
                    // echo "attachments: " . implode(",", $attachments);
                }

                // delete if any is marked as deleted
                if (isset($_REQ[$sv["key"] . "-delete"]) && is_array($_REQ[$sv["key"] . "-delete"])) {
                    $delsql = " DELETE FROM uploads WHERE id IN (" . implode(",", $_REQ[$sv["key"] . "-delete"]) . ") ";
                    if ($conn->query($delsql)) {
                        $deleted = [...$deleted, ...$_REQ[$sv["key"] . "-delete"]];
                    }
                    // echo $delsql;
                }
            } // end multi file
        }
    }
    return [$attachments, $deleted];
    // die;
}


function save_product_movements($vars, $r)
{

    if (isset($vars["manage_order_quantity"])) {
        global $conn;
        // $_REQ = $vars["submit_data"];
        // $tablename = $vars["tablename"];
        $manage = $vars["manage_order_quantity"];

        // print_arr($vars);
        // print_arr($r);
        // die;

        $action = $manage["action"];
        $table = "product_movements";
        $ts = getts();
        $curr_user_id = get_curr_user_id();
        $created = $ts . "_" . $curr_user_id;

        $quantity = $r[$manage["quantity_field"]];

        // $action_date = $ts;

        $sql = " INSERT INTO " . $table . " (order_id, dispatch, product, product_lot, quantity, action, action_date, auth_user, updated, created) 
        VALUES ('" . $r["order_id"] . "', '" . $r["dispatch"] . "', '" . $r["product"] . "', '" . $r["product_lot"] . "', '" . $quantity . "', 
         '" . $action . "', '" . $ts . "', '" . $curr_user_id . "', '" . $ts . "', '" . $created . "' ) ";

        if ($conn->query($sql)) {
            manage_lot_quantity("product_lots", $r["product_lot"], $action, $quantity);
        }

        // print_arr($vars);
        // die;
    }
}

function manage_lot_quantity($table, $row_id, $action, $quantity)
{
    global $conn;

    $condition = " id = '" . $row_id . "' ";
    $fetched = fetch_data([
        "table" => $table,
        "columns" => "id, available_quantity, reserved_quantity, consumed_quantity",
        "condition" => $condition,
        "order" => "",
        "limit" => ""
    ]);

    $ts = getts();
    $curr_user_id = get_curr_user_id();

    if (sizeof($fetched) > 0) {
        $available = $fetched[0]["available_quantity"];
        $reserved = $fetched[0]["reserved_quantity"];
        $consumed = $fetched[0]["consumed_quantity"];
        // print_arr($fetched);
        // die;
        if ($action == "reserve") {
            $available = $available - $quantity;
            $reserved = $reserved + $quantity;
        }
        //
        else if ($action == "unreserve") {
            $available = $available + $quantity;
            $reserved = $reserved - $quantity;
        }
        //
        else if ($action == "consume") {
            $consumed = $consumed + $quantity;
            $reserved = $reserved - $quantity;
        }
        //
        else if ($action == "return") {
            $consumed = $consumed - $quantity;
            $available = $available + $quantity;
        }
        $sql = " UPDATE " . $table . " SET available_quantity = '" . $available . "', reserved_quantity = '" . $reserved . "', consumed_quantity = '" . $consumed . "', auth_user = '" . $curr_user_id . "', updated = '" . $ts . "' WHERE id = '" . $row_id . "' ";
        // echo $sql;
        if ($conn->query($sql)) {
            // echo "manage in history";
        }
    }
    // die;


}


function save_bulk_column_history($vars, $primary_id, $index)
{
    if (isset($vars["save_column_history"])) {

        global $conn;
        $_REQ = $vars["submit_data"];
        $history = $vars["save_column_history"];
        // $primary_column = $vars["primary_column"];
        $tablename = $vars["tablename"];

        // print_arr($tablename);
        // print_arr($_REQ);
        // print_arr($history);
        // print_arr($primary_column);
        // echo $primary_id;

        $auth_user = get_curr_user_id();
        $ts = getts();

        if (isset($history["columns"])) {
            if ($primary_id != "") {
                $row_id = $primary_id;
                foreach ($history["columns"] as $hk => $hv) {
                    $hv = str_replace("[]", "", $hv);
                    if (isset($_REQ["old_" . $hv][$index]) && isset($_REQ[$hv][$index])) {
                        if ($_REQ["old_" . $hv][$index] != $_REQ[$hv][$index]) {
                            $value = $_REQ[$hv][$index];
                            $sql = " INSERT INTO column_history (table_name, row_id, column_name, value, auth_user, updated, created) VALUES ('" . $tablename . "', '" . $row_id . "', '" . $hv . "', '" . $value . "', '" . $auth_user . "', '" . $ts . "', '" . $ts . "') ";
                            // echo $sql."<br>";
                            $conn->query($sql);
                        }
                    }
                }
            }
        }

        // die;

    }
}

function action_on_submit($vars, $primary_id)
{
    if (isset($vars["action_after_submit"])) {
        $_REQ = $vars["submit_data"];
        // $table = $vars["tablename"];
        // $msg = $vars["messages"];
        // $save_fields = $vars["save_fields"];
        // $link_table_rows = $vars["link_table_rows"];
        // $primary_column = $vars["primary_column"];
        // echo "action_on_submit: ";
        // echo $primary_id;
        // print_arrbox($vars, 300);
        $action = $vars["action_after_submit"]["action"];
        $condition = $vars["action_after_submit"]["condition"];
        // print_arr($condition);
        // print_arr($_REQ);
        // die;

        //
        if ($condition["type"] == "change_to") {
            // print_arr($condition["param"]);
            // echo $action;
            $param = $condition["param"];
            if (isset($param["key"]) && isset($param["value"])) {
                $col = $param["key"];
                $val = $param["value"];
                if (isset($_REQ[$col]) && isset($_REQ["old_" . $col])) {
                    if ($_REQ[$col] == $val && $_REQ["old_" . $col] != $_REQ[$col]) {
                        // echo $col . " : column change detected";
                        execute_action($action, $vars, $primary_id);
                    }
                }
            }
        }

        //
        else if ($condition["type"] == "equal") {
            $param = $condition["param"];
            if (isset($param["key"]) && isset($param["value"])) {
                $col = $param["key"];
                $val = $param["value"];
                if (isset($_REQ[$col]) && $_REQ[$col] == $val) {
                    execute_action($action, $vars, $primary_id);
                }
            }
        }

        // die;
    }
}

function execute_action($action, $vars, $primary_id)
{

    global $conn;
    $ts = getts();
    $curr_user_id = get_curr_user_id();

    if ($action == "invoice_cancelled") {

        // echo "invoice_cancelled";
        $_REQ = $vars["submit_data"];
        $dispatch = $_REQ["dispatch"];
        $invoice = $_REQ["id"];
        // print_arr($_REQ);

        //invoice = '0', 
        $sql = " UPDATE dispatchs SET status = 'new', auth_user = '" . $curr_user_id . "', updated = '" . $ts . "' WHERE id = '" . $dispatch . "' ";
        if ($conn->query($sql)) {
            insert_column_history([
                "table_name" => "dispatchs",
                "row_id" => $dispatch,
                "column_name" => "status",
                "value" => "new",
                "notes" => "Status changed because invoice was cancelled",
            ]);
        }

        //
        // die;
    }

    //
    else if ($action == "invoice_items_added") {
        // echo $action;
        // print_arr($vars);
        $_REQ = $vars["submit_data"];
        $dispatch = $_REQ["dispatch"];
        $invoice = $_REQ["invoice"];

        // update dispatchs table
        // echo "invoice attached to dispatch";
        //invoice = '" . $invoice . "', 
        $sql = " UPDATE dispatchs SET status = 'invoice_generated', auth_user = '" . $curr_user_id . "', updated = '" . $ts . "' WHERE id = '" . $dispatch . "' ";
        if ($conn->query($sql)) {
            insert_column_history([
                "table_name" => "dispatchs",
                "row_id" => $dispatch,
                "column_name" => "status",
                "value" => "invoice_generated"
            ]);
        }

        // change invoice status        
        $sql2 = " UPDATE invoices SET status = 'generated', auth_user = '" . $curr_user_id . "', updated = '" . $ts . "' WHERE id = '" . $invoice . "' ";
        if ($conn->query($sql2)) {
            insert_column_history([
                "table_name" => "invoices",
                "row_id" => $invoice,
                "column_name" => "status",
                "value" => "generated"
            ]);
        }
    }

    //
    else if ($action == "dispatch_done") {

        // echo "invoice_cancelled";
        $_REQ = $vars["submit_data"];
        // $dispatch = $_REQ["dispatch"];
        $dispatch = $_REQ["id"];
        // print_arr($_REQ);
        // print_arr($vars);
        $movvars = [
            "manage_order_quantity" => [
                "action" => "consume",
                "quantity_field" => "quantity"
            ]
        ];

        // find product lots in a dispatch
        $dispatch_items_arr = fetch_data(["table" => "dispatch_items", "columns" => "id, product, quantity, dispatch, order_id, product_lot", "condition" => " dispatch = '" . $dispatch . "' ", "order" => "product ASC", "limit" => ""]);
        foreach ($dispatch_items_arr as $opk => $opv) {
            // enter product movement as consumed for each product lot
            // print_arr($opv);
            save_product_movements($movvars, $opv);
            // $pid = $opv["product"];
        }

        // maintain master quantity of each product lot

        // die;
    }

    // die;
}

function save_column_history($vars, $primary_id)
{
    // check is history is enabled or not
    if (isset($vars["save_column_history"])) {

        global $conn;

        $_REQ = $vars["submit_data"];
        $history = $vars["save_column_history"];
        $primary_column = $vars["primary_column"];
        $tablename = $vars["tablename"];

        // print_arr($tablename);
        // print_arr($_REQ);
        // print_arr($history);
        // print_arr($primary_column);
        // echo $primary_id;

        $auth_user = get_curr_user_id();
        $ts = getts();

        if (isset($history["columns"])) {
            if ($primary_id != "") {
                $row_id = $primary_id;
                foreach ($history["columns"] as $hk => $hv) {
                    if (isset($_REQ["old_" . $hv]) && isset($_REQ[$hv])) {
                        if ($_REQ["old_" . $hv] != $_REQ[$hv]) {
                            $value = $_REQ[$hv];
                            $sql = " INSERT INTO column_history (table_name, row_id, column_name, value, auth_user, updated, created) VALUES ('" . $tablename . "', '" . $row_id . "', '" . $hv . "', '" . $value . "', '" . $auth_user . "', '" . $ts . "', '" . $ts . "') ";
                            // echo $sql."<br>";
                            $conn->query($sql);
                        }
                    }
                }
            }
        }
    }
    // die;
}

function insert_column_history($arr)
{
    global $conn;
    $table_name = $arr["table_name"];
    $row_id = $arr["row_id"];
    $column_name = $arr["column_name"];
    $value = $arr["value"];
    $notes = $arr["notes"] ?? "";

    $auth_user = get_curr_user_id();
    $ts = getts();

    $sql = " INSERT INTO column_history (table_name, row_id, column_name, value, notes, auth_user, updated, created) VALUES ('" . $table_name . "', '" . $row_id . "', '" . $column_name . "', '" . $value . "', '" . $notes . "', '" . $auth_user . "', '" . $ts . "', '" . $ts . "') ";
    // echo $sql."<br>";
    $conn->query($sql);
}

function display_column_history($vars, $row, $history, $columns)
{

    global $conn;

    // $_REQ = $vars["submit_data"];
    // $history = $vars["save_column_history"];
    $primary_column = $vars["primary_column"];
    $tablename = $vars["tablename"];

    // print_arrbox($history,200);
    // print_arr($tablename);
    // print_arr($row);
    // print_arr($history);
    // print_arr($primary_column);
    // echo "<hr>";
    // print_arrbox($history, 400);

    $s = '';

    if (isset($history["rows"][$row[$primary_column]])) {
        foreach ($history["rows"][$row[$primary_column]] as $hk => $v) {

            $s .= '<div class="disp-history-row">';
            foreach ($columns as $ck => $cv) {
                if ($cv["column"] == $v["column_name"]) {
                    $s .= "<i>" . $cv["name"] . ": </i> ";

                    $hisval = $v["value"];

                    if (isset($cv["format"]) && $cv["format"] == "date") {
                        $hisval = ymd_to_dt($hisval);
                    }


                    if (isset($cv["options"]) && is_array($cv["options"]) && isset($cv["options"][$v["value"]])) {
                        $hisval = $cv["options"][$v["value"]];
                    }


                    if (isset($cv["badge"]) && $cv["badge"] == true) {
                        $hisval = '<span class="badge badge-' . $v["value"] . '">' . $hisval . '</span>';
                    } else {
                        $hisval = '<strong>' . $hisval . '</strong>';
                    }
                    $s .= $hisval;
                    if ($v["notes"] != "" && $v["notes"] != NULL) {
                        $s .= "&nbsp;<small><i>(" . $v["notes"] . ")</i></small>";
                    }
                }
            }

            $s .= user_updated($v, $history["auth_users"]);
            $s .= '</div>';
        }
    }

    return $s;
}

function fetch_column_history($vars, $rows)
{
    // get ids of each rows
    // get data for all ids from history table
    $primary_column = $vars["primary_column"];
    $tablename = $vars["tablename"];
    // print_arr($tablename);
    // print_arr($primary_column);
    // print_arrbox($vars, 200);
    // print_arrbox($rows, 200);
    // print_arrbox($rows);
    // print_arr($cols);

    $fetched = [];
    $history = [];
    $ids = [];
    $history_auth_users = [];

    foreach ($rows as $rk => $r) {
        if (arr_val_valid($r, $primary_column)) {
            $ids[] = $r[$primary_column];
        }
    }
    // print_arr($ids);
    $condition = "";
    if (sizeof($ids) > 0) {
        $condition = " row_id IN (" . implode(",", $ids) . ") AND table_name = '" . $tablename . "' ";
        $fetched = fetch_data([
            "table" => "column_history",
            "columns" => "id, column_name, table_name, row_id, value, notes, auth_user, updated, created",
            "condition" => $condition,
            "order" => " updated ASC ",
            "limit" => ""
        ]);

        // print_arrbox($fetched, 300);
        foreach ($fetched as $k => $hr) {
            if (!isset($history[$hr["row_id"]])) {
                $history[$hr["row_id"]] = [];
            }
            $history[$hr["row_id"]][] = $hr;

            // $history_auth_users[] = $hr["auth_user"];
        }
    }

    $history_auth_users = fetch_auth_users($fetched);

    // // print_arrbox($users, 300);
    // return $users;

    return [
        "rows" => $history,
        "auth_users" => $history_auth_users
    ];
}

function user_updated($r, $auth_users)
{
    $s = "";
    if (arr_val_valid($r, "auth_user")) {
        if (isset($auth_users[$r["auth_user"]]["name"])) {
            $s .= "&nbsp;<small><i>By: </i></small><strong>" . $auth_users[$r["auth_user"]]["name"] . "</strong>";
        }
    }
    if (arr_val_valid($r, "updated")) {
        $s .= "&nbsp;<small><i>On: </i></small><strong>" . ts_to_dt($r["updated"]) . "</strong>";
    }
    return $s;
}

function user_created($r, $auth_users)
{
    $s = "";
    if (arr_val_valid($r, "created")) {
        $exp = explode("_", $r["created"]);
        if (sizeof($exp) == 2) {
            if (isset($auth_users[$exp[1]]["name"])) {
                $s .= "&nbsp;<small><i>By: </i></small><strong>" . $auth_users[$exp[1]]["name"] . "</strong>";
            }
            $s .= "&nbsp;<small><i>On: </i></small><strong>" . ts_to_dt($exp[0]) . "</strong>";
        }
    }
    return $s;
}


function module_submit_delete_form($vars)
{
    global $conn;
    $_REQ = $vars["submit_data"];
    $table = $vars["tablename"];
    $msg = $vars["messages"];

    if (isset($_REQ['delete'])) {
        // print_arr($_REQ);

        if (isset($vars["manage_order_quantity"])) {
            $data_row = module_get_data($table, $_REQ[$vars["primary_column"]]);
            save_product_movements($vars, $data_row);
        }

        $query = " id = \"" . $_REQ[$vars["primary_column"]] . "\" ";

        $sql = $conn->query("DELETE FROM $table WHERE " . $query . " ");

        //echo "New firewall inserted at ". decrypt($datetime);
        if ($sql) {
            notify_after_redirect("success", $msg["success_delete"]);
            $urlparam = "";
            if (isset($vars["url_param"]) && $vars["url_param"] != "") {
                $urlparam = "?" . $vars["url_param"];
            }
            echo "<script>window.top.location='" . $vars["redirect_to"] . ".php" . $urlparam . "'</script>";
        } else {
            notify("error", $msg["error_delete"]);
        }
    }
    // die();

    return true;
}



function fetch_data($vars)
{
    global $conn;

    $table = $vars["table"];
    $cols = $vars["columns"];
    $order = $vars["order"];
    $limit = $vars["limit"];
    $condition = $vars["condition"];

    if ($condition != "") {
        $condition = " WHERE " . $condition;
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

    $singlearr = true;

    $ret = [];

    $sql = ' SELECT ' . $cols . ' FROM ' . $table . ' ' . $condition . ' ' . $order . ' ' . $limit . ' ';
    // echo $sql."<br>";
    //if($nonenglish == "true"){
    //$querystr = $conn->query("SET CHARACTER SET utf8 ");
    //$querystr = $conn->query("SET NAMES utf8"); //for non english languages
    //}

    $querystr = $conn->query($sql);

    $totrows = mysqli_num_rows($querystr);

    if ($totrows > 0) {
        $inc = 0;
        while ($result = mysqli_fetch_object($querystr)) {
            // print_arr($result);
            foreach ($result as $key => $value) {
                $ret[$inc][$key] = $value;
            }
            $inc = $inc + 1;
        }
    }

    return $ret;
}


function get_invoice_items($invoice)
{
    $invoice_items_arr = fetch_data(["table" => "invoice_items", "columns" => "id, product, quantity, rate, discount, igst, cgst, sgst, hsn_sac", "condition" => " invoice = '" . $invoice . "' ", "order" => "product ASC", "limit" => ""]);
    // foreach ($invoice_items_arr as $opk => $opv) {
    //     $product_ids[] = $opv["product"];
    //     $order_products[] = $opv;
    // }
    return $invoice_items_arr;
}

function get_order_products($order_id, $format = "")
{
    $ret = [];
    $product_ids = [];
    $order_products = [];
    $order_products_arr = fetch_data(["table" => "order_items", "columns" => "id, product, quantity, rate", "condition" => "order_id = '" . $order_id . "' ", "order" => "product ASC", "limit" => ""]);
    foreach ($order_products_arr as $opk => $opv) {
        $product_ids[] = $opv["product"];
        $order_products[] = $opv;
    }

    $product_ids = array_values(array_filter(array_unique($product_ids)));

    $ret["order_products"] = $order_products;
    $ret["product_ids"] = $product_ids;

    return $ret;
}

function get_dispatch_products($dispatch, $format = "")
{
    $ret = [];
    $product_ids = [];
    $dispatch_products = [];
    $qty = [];
    $dispatch_products_arr = fetch_data(["table" => "dispatch_items", "columns" => "id, product, quantity", "condition" => " dispatch = '" . $dispatch . "' ", "order" => "product ASC", "limit" => ""]);
    foreach ($dispatch_products_arr as $opk => $opv) {
        $pid = $opv["product"];
        $product_ids[] = $pid;
        $dispatch_products[] = $opv;
        if (!isset($qty[$pid])) {
            $qty[$pid] = 0;
        }
        $qty[$pid] += $opv["quantity"];
    }

    $product_ids = array_values(array_filter(array_unique($product_ids)));

    $ret["dispatch_products"] = $dispatch_products;
    $ret["product_ids"] = $product_ids;
    $ret["quantity"] = $qty;

    return $ret;
}


function get_production_products($production, $format = "")
{
    $ret = [];
    $product_ids = [];
    $production_products = [];
    $production_products_arr = fetch_data(["table" => "production_items", "columns" => "id, product, quantity, rate", "condition" => "production = '" . $production . "' ", "order" => "product ASC", "limit" => ""]);
    foreach ($production_products_arr as $opk => $opv) {
        $product_ids[] = $opv["product"];
        $production_products[] = $opv;
    }

    $product_ids = array_values(array_filter(array_unique($product_ids)));

    $ret["production_products"] = $production_products;
    $ret["product_ids"] = $product_ids;

    return $ret;
}

function get_invoice_item_details($items, $format = "")
{

    $ret = [];
    $product_ids = [];
    $qty = [];
    $rate = [];
    $discount = [];
    $rowindex = [];
    foreach ($items as $k => $r) {
        $pid = $r["product"];
        $product_ids[] = $pid;
        $qty[$pid] = $r["quantity"];
        $rate[$pid] = $r["rate"];
        $discount[$pid] = $r["discount"];
        $igst[$pid] = $r["igst"];
        $cgst[$pid] = $r["cgst"];
        $sgst[$pid] = $r["sgst"];
        $hsn_sac[$pid] = $r["hsn_sac"];
        $rowindex[$pid] = $r["id"];
    }
    $ret["product_ids"] = $product_ids;
    $ret["quantity"] = $qty;
    $ret["rate"] = $rate;
    $ret["discount"] = $discount;
    $ret["igst"] = $igst;
    $ret["cgst"] = $cgst;
    $ret["sgst"] = $sgst;
    $ret["hsn_sac"] = $hsn_sac;
    $ret["rowindex"] = $rowindex;

    return $ret;
}



function get_raw_material_lot_quantities($raw_material_ids, $format = "")
{

    // fetch raw_material lots 
    $condition = "";
    if (is_array($raw_material_ids) && sizeof($raw_material_ids) > 0) {
        $condition = " raw_material IN (" . implode(",", $raw_material_ids) . ") AND status = 'ready' AND available_quantity > 0 ";
    }

    $raw_material_lots_arr = fetch_data([
        "table" => "raw_material_lots",
        "columns" => "id, raw_material, available_quantity, reserved_quantity, consumed_quantity",
        "condition" => $condition,
        "order" => "raw_material ASC",
        "limit" => ""
    ]);        // print_arr($raw_material_arr);

    if ($format == "merged_by_raw_material") {
        $rm_qty = [];
        foreach ($raw_material_lots_arr as $k => $v) {
            $rmid = $v["raw_material"];
            if (!isset($rm_qty[$rmid])) {
                $rm_qty[$rmid] = [];
            }
            $rm_qty[$rmid][] = $v;
        }

        $lots = [];
        foreach ($rm_qty as $rmid => $parr) {

            $lots[$rmid] = [];
            $lots[$rmid]["available"] = 0;
            $lots[$rmid]["reserved"] = 0;
            $lots[$rmid]["consumed"] = 0;

            foreach ($parr as $k => $p) {
                $lots[$rmid]["available"] += $p["available_quantity"];
                $lots[$rmid]["reserved"] += $p["reserved_quantity"];
                $lots[$rmid]["consumed"] += $p["consumed_quantity"];
            }
        }

        return ["raw_material_lots" => $rm_qty, "raw_material_quantity" => $lots];
    }
    //
    else {
        return $raw_material_lots_arr;
    }
}


function get_products_by_ids($ids)
{
    $condition = "";
    if (is_array($ids) && sizeof($ids) > 0) {
        $condition = " id IN (" . implode(",", $ids) . ")";
    }

    $product_arr = fetch_data(["table" => "products", "columns" => "id, product, igst, cgst, sgst, hsn_sac", "condition" => $condition, "order" => "product ASC", "limit" => ""]);        // print_arr($product_arr);
    $products = [];
    $igsts = [];
    $cgsts = [];
    $sgsts = [];
    $hsn_sacs = [];

    $prodgst = [];
    foreach ($product_arr as $vk => $vv) {
        $products[$vv["id"]] = $vv["product"];
        $igsts[$vv["id"]] = $vv["igst"];
        $cgsts[$vv["id"]] = $vv["cgst"];
        $sgsts[$vv["id"]] = $vv["sgst"];
        $hsn_sacs[$vv["id"]] = $vv["hsn_sac"];
               
        $prodgst[$vv["id"]] = [];
        $prodgst[$vv["id"]]["igst"] = $vv["igst"];
        $prodgst[$vv["id"]]["cgst"] = $vv["cgst"];
        $prodgst[$vv["id"]]["sgst"] = $vv["sgst"];
        $prodgst[$vv["id"]]["hsn_sac"] = $vv["hsn_sac"];
    }
    // print_arr($products); 

    return [
        "products" => $products,
        "igsts" => $igsts,
        "cgsts" => $cgsts,
        "sgsts" => $sgsts,
        "hsn_sacs" => $hsn_sacs,
        "prod_gst" => $prodgst
    ];
}


function get_raw_materials_by_ids($ids)
{
    $condition = "";
    if (is_array($ids) && sizeof($ids) > 0) {
        $condition = " id IN (" . implode(",", $ids) . ")";
    }

    $raw_material_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => $condition, "order" => "raw_material ASC", "limit" => ""]);        // print_arr($raw_material_arr);
    $raw_materials = [];

    $prodgst = [];
    foreach ($raw_material_arr as $vk => $vv) {
        $raw_materials[$vv["id"]] = $vv["raw_material"];
    }
    // print_arr($raw_materials); 

    return [
        "raw_materials" => $raw_materials,
    ];
}



function get_product_lot_quantities($product_ids, $format = "")
{

    // fetch product lots 
    $condition = "";
    if (is_array($product_ids) && sizeof($product_ids) > 0) {
        $condition = " product IN (" . implode(",", $product_ids) . ") AND status = 'ready' AND available_quantity > 0 ";
    }

    $product_lots_arr = fetch_data([
        "table" => "product_lots",
        "columns" => "id, product, available_quantity, reserved_quantity, consumed_quantity, source, buy_price",
        "condition" => $condition,
        "order" => "product ASC",
        "limit" => ""
    ]);        // print_arr($product_arr);

    if ($format == "merged_by_product") {
        $prod_qty = [];
        foreach ($product_lots_arr as $k => $v) {
            $pid = $v["product"];
            if (!isset($prod_qty[$pid])) {
                $prod_qty[$pid] = [];
            }
            $prod_qty[$pid][] = $v;
        }

        $lots = [];
        foreach ($prod_qty as $pid => $parr) {

            $lots[$pid] = [];
            $lots[$pid]["available"] = 0;
            $lots[$pid]["reserved"] = 0;
            $lots[$pid]["consumed"] = 0;

            foreach ($parr as $k => $p) {
                $lots[$pid]["available"] += $p["available_quantity"];
                $lots[$pid]["reserved"] += $p["reserved_quantity"];
                $lots[$pid]["consumed"] += $p["consumed_quantity"];
            }
        }

        return ["product_lots" => $prod_qty, "product_quantity" => $lots];
    }
    //
    else {
        return $product_lots_arr;
    }
}



function get_quantities_summary($arr)
{

    // ["order_id" => $order_id, "order_products" => $order_products];
    $qty = [];

    // Ordered product quantities
    if (isset($arr["order_products"]) && is_array($arr["order_products"]) && sizeof($arr["order_products"]) > 0) {
        $ord_prods = $arr["order_products"];
        foreach ($ord_prods as $k => $p) {
            $pid = $p["product"];
            if (!isset($qty[$pid])) {
                $qty[$pid]["available"] = 0;
                $qty[$pid]["ordered"] = 0;
                $qty[$pid]["pending"] = 0;
                $qty[$pid]["reserve"] = 0;
                $qty[$pid]["unreserve"] = 0;
                $qty[$pid]["consume"] = 0;
            }
            $qty[$pid]["ordered"] += $p["quantity"];
        }
    }

    // Get product lot quantities
    // $product_ids = array_keys($qty);    // print_arr($product_ids);
    // $product_lots = get_product_lot_quantities($product_ids, "merged_by_product");
    // print_arrbox($product_lots, 300);

    foreach ($arr["product_lots"]["product_quantity"] as $pid => $parr) {
        $qty[$pid]["available"] += $parr["available"];
    }

    // fetch reserved and dispatched then do final calculation of pending.
    if (isset($arr["product_movements"]) && is_array($arr["product_movements"])) {
        foreach ($arr["product_movements"] as $pid => $val) {
            if (isset($val["reserve"])) {
                $qty[$pid]["reserve"] += $val["reserve"];
            }
            if (isset($val["unreserve"])) {
                $qty[$pid]["unreserve"] += $val["unreserve"];
            }
            if (isset($val["consume"])) {
                $qty[$pid]["consume"] += $val["consume"];
            }
        }
    }

    // manage pending quantities
    foreach ($qty as $pid => $v) {
        // $qty[$pid]["pending"] = $qty[$pid]["ordered"] - $qty[$pid]["consume"];
        $qty[$pid]["pending"] = $qty[$pid]["ordered"] - $qty[$pid]["reserve"] + $qty[$pid]["unreserve"];
    }

    return $qty;
}


function fetch_product_movements($arr, $type = "order")
{
    // print_arr($arr); 
    $status = [];

    $condition = "";

    if ($type == "order" && isset($arr["order_id"]) && $arr["order_id"] != "") {
        $condition = " order_id = '" . $arr["dispatch"]["order_id"] . "' ";
    } else if ($type == "dispatch" && isset($arr["dispatch"]) && is_array($arr["dispatch"]) && sizeof($arr["dispatch"]) > 0) {
        $condition = " dispatch = '" . $arr["dispatch"]["id"] . "' AND order_id = '" . $arr["dispatch"]["order_id"] . "' ";
    }

    if ($condition != "") {
        $product_movements_arr = fetch_data([
            "table" => "product_movements",
            "columns" => "id, product, product_lot, quantity, action, action_date ",
            "condition" => $condition,
            "order" => "",
            "limit" => ""
        ]);
        // print_arr($product_movements_arr);
        if (sizeof($product_movements_arr) > 0) {
            foreach ($product_movements_arr as $k => $v) {
                $pid = $v["product"];
                $action = $v["action"];
                $quantity = $v["quantity"];
                if (!isset($status[$pid][$action])) {
                    $status[$pid][$action] = 0;
                }
                $status[$pid][$action] += $quantity;
            }
        }
    }
    // print_arr($status);
    return $status;
}




function get_raw_material_rate_details($items, $format = "")
{

    $ret = [];
    $product_ids = [];
    $qty = [];
    $rate = [];
    // $discount = [];
    $rowindex = [];
    foreach ($items as $k => $r) {
        $pid = $r["product"];
        $product_ids[] = $pid;
        $qty[$pid] = $r["quantity"];
        $rate[$pid] = $r["rate"];
        // $discount[$pid] = $r["discount"];
        // $igst[$pid] = $r["igst"];
        // $cgst[$pid] = $r["cgst"];
        // $sgst[$pid] = $r["sgst"];
        $rowindex[$pid] = $r["id"];
    }
    $ret["product_ids"] = $product_ids;
    $ret["quantity"] = $qty;
    $ret["rate"] = $rate;
    // $ret["discount"] = $discount;
    // $ret["igst"] = $igst;
    // $ret["cgst"] = $cgst;
    // $ret["sgst"] = $sgst;
    $ret["rowindex"] = $rowindex;

    return $ret;
}




function get_raw_material_rates_entities($loadtype = "")
{
    $ret = [];
    $raw_materials = [];
    // $dispatch_products = [];
    // $qty = [];

    $raw_materials_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material", "condition" => "", "order" => "raw_material ASC", "limit" => ""]);
    $raw_materials = [];
    $individual = [];
    foreach ($raw_materials_arr as $opk => $opv) {
        $raw_materials[$opv["id"]] = "" . $opv["raw_material"];
        $individual[$opv["id"]] = "" . $opv["raw_material"];
    }

    $raw_material_rate_groups_arr = fetch_data(["table" => "raw_material_rate_groups", "columns" => "id, raw_material_rate_group", "condition" => "", "order" => "raw_material_rate_group ASC", "limit" => ""]);
    $raw_material_rate_groups = [];
    foreach ($raw_material_rate_groups_arr as $opk => $opv) {
        $raw_material_rate_groups[$opv["id"]] = "" . $opv["raw_material_rate_group"];
    }

    $rn_rate_group_link_arr = fetch_data(["table" => "raw_material_rate_group_link", "columns" => "id, raw_material_rate_group, raw_material", "condition" => "", "order" => "", "limit" => ""]);
    $rm_group_links = [];

    foreach ($rn_rate_group_link_arr as $opk => $opv) {
        if (isset($raw_material_rate_groups[$opv["raw_material_rate_group"]])) {
            if (isset($raw_materials[$opv["raw_material"]])) {
                $rm_group_links[$opv["raw_material_rate_group"]][] = $opv["raw_material"];
                if (isset($individual[$opv["raw_material"]])) {
                    unset($individual[$opv["raw_material"]]);
                }
            }
        }
    }

    $entities = [];
    foreach ($raw_material_rate_groups as $k => $v) {
        $entities["RMRG-" . $k] = "Rate Group: " . $v;
    }
    foreach ($individual as $k => $v) {
        $entities["RM-" . $k] = $v;
    }


    $rates_arr = fetch_data(["table" => "raw_material_rates", "columns" => "id, entity, rate", "condition" => "", "order" => "", "limit" => ""]);
    $rates = [];
    foreach ($rates_arr as $k => $v) {
        $rates[$v["entity"]] = $v["rate"];
    }

    $pending = [];
    foreach ($entities as $k => $v) {
        if (!isset($rates[$k])) {
            $pending[$k] = $v;
        }
    }

    $ret["raw_materials"] = $raw_materials;
    $ret["raw_material_rate_groups"] = $raw_material_rate_groups;
    $ret["rm_group_links"] = $rm_group_links;
    $ret["individual"] = $individual;
    $ret["entities"] = $entities;
    $ret["rates"] = $rates;
    $ret["pending"] = $pending;

    return $ret;
}


function get_product_cost($product_ids)
{

    $cost = [];
    $product_boms = [];
    $bom_items = [];
    $bom_costs = [];
    $raw_material_ids = [];
    // print_arr($product_ids);

    // product margin / markup
    $product_margin = [];
    $products_arr = fetch_data(["table" => "products", "columns" => "id, product, markup_percent", "condition" => " id IN (" . implode(",", $product_ids) . ") ", "order" => "", "limit" => ""]);
    foreach ($products_arr as $bk => $bv) {
        $product_margin[$bv["id"]] = $bv["markup_percent"];
    }
    // print_arr($product_margin);



    $boms = product_boms($product_ids);

    $raw_material_ids = $boms["raw_material_ids"] ?? [];
    $raw_material_rates = raw_material_rates($raw_material_ids);

    // print_arr($boms["product_boms"][$pid]);

    foreach ($product_ids as $k => $pid) {
        $costs[$pid] = [];
        if (isset($boms["product_boms"][$pid])) {
            $bom = $boms["product_boms"][$pid];
            if (isset($boms["bom_items"][$bom])) {
                $bom_items = $boms["bom_items"][$bom];
                // print_arr($bom_items);
                foreach ($bom_items as $bik => $biv) {
                    $c = [];
                    $rm = $biv["raw_material"];
                    if (isset($raw_material_rates["raw_material_rates"][$rm])) {
                        $c["type"] = "bom_items";
                        $c["raw_material"] = $biv["raw_material"];
                        $c["quantity"] = $biv["quantity"];
                        $c["wastage_quantity"] = $biv["wastage_quantity"];
                        $c["raw_material_rate"] = $raw_material_rates["raw_material_rates"][$rm];
                        $c["raw_material_name"] = $raw_material_rates["raw_materials"][$rm];
                        $c["raw_material_unit"] = $raw_material_rates["raw_material_units"][$rm];
                    }
                    $costs[$pid][] = $c;
                }

                $bom_costs = $boms["bom_costs"][$bom];
                // print_arr($bom_costs);
                foreach ($bom_costs as $bik => $biv) {
                    $c = [];
                    $c["type"] = "bom_costs";
                    $c["cost_type"] = $biv["cost_type"];
                    $c["amount"] = $biv["amount"];
                    // $rm = $biv["raw_material"];
                    // if (isset($raw_material_rates["raw_material_rates"][$rm])) {
                    //     $c["raw_material"] = $biv["raw_material"];
                    //     $c["quantity"] = $biv["quantity"];
                    //     $c["wastage_quantity"] = $biv["wastage_quantity"];
                    //     $c["raw_material_rate"] = $raw_material_rates["raw_material_rates"][$rm];
                    //     $c["raw_material_name"] = $raw_material_rates["raw_materials"][$rm];
                    // }
                    $costs[$pid][] = $c;
                }
            }
        }
    }

    // print_arr($costs);


    return [
        "costs" => $costs,
        "product_ids" => $product_ids,
        "product_margin" => $product_margin,
        "boms" => $boms,
        "raw_material_ids" => $raw_material_ids,
        "raw_material_rates" => $raw_material_rates,
    ];
}
function product_boms($product_ids)
{
    if (sizeof($product_ids) == 0) {
        return [];
    }

    $product_boms = [];
    $bom_items = [];
    $bom_costs = [];
    $raw_material_ids = [];
    // print_arr($product_ids);
    $boms_ids = [];
    if (sizeof($product_ids) > 0) {
        $boms_arr = fetch_data(["table" => "boms", "columns" => "id, product", "condition" => " product IN (" . implode(",", $product_ids) . ") AND status = 'active' ", "order" => "", "limit" => ""]);
        foreach ($boms_arr as $bk => $bv) {
            $product_boms[$bv["product"]] = $bv["id"];
            $boms_ids[] = $bv["id"];
        }
        // print_arr($boms_ids);
        // die;

        if (sizeof($boms_ids)) {
            $bom_items_arr = fetch_data(["table" => "bom_items", "columns" => "id, raw_material, quantity, wastage_quantity, bom", "condition" => " bom IN (" . implode(",", $boms_ids) . ") ", "order" => "", "limit" => ""]);
            foreach ($bom_items_arr as $bik => $biv) {
                $bom_items[$biv["bom"]][] = $biv;
                $raw_material_ids[] = $biv["raw_material"];
            }

            $bom_costs_arr = fetch_data(["table" => "bom_costs", "columns" => "id, cost_type, bom, amount", "condition" => " bom IN (" . implode(",", $boms_ids) . ") ", "order" => "", "limit" => ""]);
            foreach ($bom_costs_arr as $bik => $biv) {
                $bom_costs[$biv["bom"]][] = $biv;
            }
        }
    }

    return [
        "product_ids" => $product_ids,
        "product_boms" => $product_boms,
        "bom_items" => $bom_items,
        "bom_costs" => $bom_costs,
        "raw_material_ids" => $raw_material_ids,
    ];
}

function raw_material_rates($raw_material_ids)
{

    if (sizeof($raw_material_ids) == 0) {
        return [];
    }

    $raw_materials_arr = fetch_data(["table" => "raw_materials", "columns" => "id, raw_material, unit", "condition" => " id IN (" . implode(",", $raw_material_ids) . ") ", "order" => "raw_material ASC", "limit" => ""]);
    $raw_materials = [];
    $raw_material_units = [];
    foreach ($raw_materials_arr as $opk => $opv) {
        $raw_materials[$opv["id"]] = "" . $opv["raw_material"];
        $raw_material_units[$opv["id"]] = $opv["unit"];
    }

    $raw_material_rate_group_arr = fetch_data([
        "table" => "raw_material_rate_group_link",
        "columns" => "id, raw_material_rate_group, raw_material",
        "condition" => " raw_material IN (" . implode(",", $raw_material_ids) . ") ",
        "order" => "",
        "limit" => ""
    ]);
    $raw_material_rate_groups = [];
    foreach ($raw_material_rate_group_arr as $opk => $opv) {
        $raw_material_rate_groups[$opv["raw_material"]] = $opv["raw_material_rate_group"];
    }

    // make rate group entity list
    $rate_group_entities = [];
    $rm_rate_condition = "";
    foreach ($raw_material_ids as $k => $v) {
        $rate_group_entities[] = "RM-" . $v;
        $rm_rate_condition .= "'" . ("RM-" . $v) . "', ";
    }
    foreach ($raw_material_rate_groups as $k => $v) {
        $rate_group_entities[] = "RMRG-" . $v;
        $rm_rate_condition .= "'" . ("RMRG-" . $v) . "', ";
    }

    if (trim($rm_rate_condition) != "") {
        $rm_rate_condition = substr(trim($rm_rate_condition), 0, -1);
    }

    // echo $rm_rate_condition;

    $rm_entity_rates_arr = fetch_data([
        "table" => "raw_material_rates",
        "columns" => "id, entity, rate, effective_date",
        "condition" => " entity IN (" . $rm_rate_condition . ") ",
        "order" => "",
        "limit" => ""
    ]);
    $rm_entity_rates = [];
    foreach ($rm_entity_rates_arr as $opk => $opv) {
        $rm_entity_rates[$opv["entity"]] = $opv;
    }


    $raw_material_rates = [];
    foreach ($raw_material_ids as $k => $v) {
        $ent = "";
        // check if directly set for this raw material only (not in other group)
        if (isset($rm_entity_rates["RM-" . $v])) {
            $ent = "RM-" . $v;
            $raw_material_rates[$v] = ["rate" => $rm_entity_rates[$ent]["rate"], "effective_date" => $rm_entity_rates[$ent]["effective_date"]];
        }

        // if it is part of rate group
        else {
            if (isset($raw_material_rate_groups[$v])) {
                $ent = "RMRG-" . $raw_material_rate_groups[$v];
                if (isset($rm_entity_rates[$ent])) {
                    $raw_material_rates[$v] = ["rate" => $rm_entity_rates[$ent]["rate"], "effective_date" => $rm_entity_rates[$ent]["effective_date"]];
                }
            }
        }
    }

    return [
        "raw_material_ids" => $raw_material_ids,
        "raw_materials" => $raw_materials,
        "raw_material_units" => $raw_material_units,
        "raw_material_rate_groups" => $raw_material_rate_groups,
        "rate_group_entities" => $rate_group_entities,
        "rm_entity_rates" => $rm_entity_rates,
        "raw_material_rates" => $raw_material_rates,
    ];
}





function product_cost_details($costing, $prodid)
{

    $bom_cost_types = bom_cost_type_arr();
    // echo $prod["id"];print_arr($prod);

    $d = "";

    $total = 0;
    if (isset($costing["costs"][$prodid])) {
        $costarr = $costing["costs"][$prodid];
        // $d = json_encode($costarr);

        if (sizeof($costarr) > 0) {
            $d .= "<div class='widget-table'><div class='table-responsive'><table class='table table-compact table-bordered'>
        <tr><th>Raw Material / Cost</th><th>Rate</th><th>Quantity</th><th>Total</th></tr>";
            foreach ($costarr as $ck => $cv) {
                if (isset($cv["type"]) && $cv["type"] != "") {

                    //
                    if ($cv["type"] == "bom_items") {
                        $d .= "<tr>
                            <td>" . $cv["raw_material_name"] . "</td>
                            <td>" . $cv["raw_material_rate"]["rate"] . " / " . $cv["raw_material_unit"] . "</td>
                            <td>" . ($cv["quantity"] + $cv["wastage_quantity"]) . " " . $cv["raw_material_unit"] . "</td>
                            <td>" . (($cv["quantity"] + $cv["wastage_quantity"]) * $cv["raw_material_rate"]["rate"]) . "</td>
                            </tr>";

                        $total += ($cv["raw_material_rate"]["rate"] * ($cv["quantity"] + $cv["wastage_quantity"]));
                    }

                    //
                    else if ($cv["type"] == "bom_costs") {
                        $d .= "<tr>
                            <td>" . ($bom_cost_types[$cv["cost_type"]] ?? $cv["cost_type"]) . "</td>
                            <td>" . round($cv["amount"], 2) . "</td>
                            <td></td>
                            <td>" . round($cv["amount"], 2) . "</td>
                            </tr>";
                        $total += $cv["amount"];
                    }
                }
            }

            if (isset($costing["product_margin"][$prodid]) && is_numeric($costing["product_margin"][$prodid])) {
                $markup = $costing["product_margin"][$prodid];
                $d .= "<tr>
                            <td>Markup %</td>
                            <td>" . round($markup, 2) . "% of " . $total . "</td>
                            <td></td>
                            <td>" . round((($total * ($markup / 100))), 2) . "</td>
                            </tr>";
                $total += round((($total * ($markup / 100))), 2);
            }
            $total = round($total);
            $d .= "<tr>
                            <td class='title'>Product Cost (Rounded)</td>
                            <td></td>
                            <td></td>
                            <td class='title'>" . ($total) . "</td>
                            </tr>";

            $d .= "</table></div></div>";
        }
    }
    return ["detail" => $d, "total" => ($total)];
}


function getFinancialYears($ymd)
{
    $year = (int)substr($ymd, 0, 4);
    $month = (int)substr($ymd, 4, 2);

    // Financial Year starts on 1st April
    if ($month >= 4) {
        $fyStart = $year;
        $fyEnd   = $year + 1;
    } else {
        $fyStart = $year - 1;
        $fyEnd   = $year;
    }

    $fy = substr($fyStart, -2) . '-' . substr($fyEnd, -2);

    // Assessment Year = FY + 1
    $ayStart = $fyStart + 1;
    $ayEnd   = $fyEnd + 1;

    $ay = substr($ayStart, -2) . '-' . substr($ayEnd, -2);

    return [
        'fy' => $fy,
        'ay' => $ay
    ];
}
