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



function download_xlsx($data_type)
{

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
    return date('D, d-M-Y', $ts);
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
        foreach ($vars["fetch_columns"] as $k => $v) {
            if (isset($v["column"]) && $v["column"] != "") {
                $cols_arr[] = $v["column"];
            }
        }
    }

    // Columns fetched in detail rows (toggle rows)
    if (isset($vars["detail_columns"])) {
        foreach ($vars["detail_columns"] as $k => $v) {
            if (isset($v["column"]) && $v["column"] != "") {
                $cols_arr[] = $v["column"];
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

                        if (isset($dv["format"])) {
                            if ($dv["format"] == "ts_to_dt") {
                                $colval = "<span class='data-hide'>" . $colval . "</span>" . ts_to_dt($colval);
                            }
                        }

                        if (isset($dv["options"])) {
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

                        if (isset($dv["type"]) && $dv['type'] == "image-file") {
                            $val = $r[$colname] ?? "";
                            if ($val != "" && isset($images[$val])) {
                                $colval = "<img src='" . ROOT_PATH . "/" . $images[$val]["thumb"] . "' class='table-thumb'>";
                            }
                        }

                        if (isset($dv["type"]) && $dv['type'] == "implode" && isset($dv["sep"])) {
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
                                    $html .= "<a href='" . $vars["module_pages"]["update"] . ".php?id=" . $r[$vars["primary_column"]] . "" . $urlparam . "'><span class='icon wtxt bg-accent2'><i data-feather='edit'></i>Edit</span></a> &nbsp; ";
                                }
                            }
                            if (in_array($dv['type'], ["delete", "edit_delete"])) {
                                if (isset($dv["acl"]["delete"]) && in_array($dv["acl"]["delete"], $_SESSION["acl"])) {
                                    $html .= "<a href='" . $vars["module_pages"]["delete"] . ".php?id=" . $r[$vars["primary_column"]] . "" . $urlparam . "'><span class='icon wtxt bg-info'><i data-feather='trash'></i>Delete</span></a></td>";
                                }
                            }
                        }
                        //
                        else if ($dv['type'] == "link_table_rows") {
                            $colval = "";
                            if (isset($dv["links"][$r[$vars["primary_column"]]])) {
                                $lnk = $dv["links"][$r[$vars["primary_column"]]];

                                foreach ($dv["options"] as $ok => $ov) {
                                    // print_arr($ov);
                                    if (in_array($ov[$dv["option_id"]], $lnk)) {
                                        $colval .= $ov[$dv["option_label"]] . ", ";
                                    }
                                }
                                $colval = trim($colval);
                                if ($colval != "") {
                                    $colval = substr($colval, 0, -1);
                                }
                            }
                            $html .= "<td class='" . $row_col_class . "'>" . $colval . "</td>";
                        }
                    }
                }
            }

            // Details Columns ---------
            $row_detail = "";
            foreach ($vars["detail_columns"] as $dk => $dv) {
                if (isset($dv["column"]) && $dv["column"] != "") {
                    $colname = $dv["column"];
                    $colval = "";
                    if ($r[$colname] != NULL) {
                        $colval = nl2br($r[$colname]);
                    }
                    $row_detail .= "<small><i>" . $dv["name"] . ": </i></small>" . $colval . "<br>";
                }
            }
            $details[$r[$vars["primary_column"]]] = $row_detail;
            // --------


            $html .= "</tr>";
        }
    }

    $html .= "</tbody></table></div></div>";

    foreach ($details as $det_rowid => $str) {
        $html .= "<input type='hidden' value='" . $str . "' id='details-" . $det_rowid . "'>";
    }

    return $html;

    // return $ret;
}

function crud_update() {}

function crud_delete() {}

function crud_create() {}


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
        $fetched = fetch_data(["table" => "uploads", "columns" => "id, thumb, small", "condition" => $condition, "order" => "", "limit" => ""]);    // print_arr($image_arr);
        // print_arrbox($fetched, 300);
        foreach ($fetched as $k => $i) {
            $images[$i["id"]] = $i;
        }
        unset($fetched);
    }

    // print_arrbox($images, 300);
    return $images;
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

            $s = '<div class="' . $vars["class"] . '"><label for="' . $vars["key"] . '" class="form-label">' . $vars["name"] . '';

            $required = (isset($vars["required"]) && $vars["required"] == true) ? true : false;
            if ($required) {
                $s .= '<sup>*</sup>';
            }

            if (isset($vars["eg"]) && $vars["eg"] != "") {
                $s .= '<small><i> (eg: ' . $vars["eg"] . ')</i></small>';
            }
            $s .= '</label>';
        }


        if ($vars["type"] == "text") {
            $s .= '<input type="text" class="form-control" name="' . $vars["key"] . '" id="' . $vars["key"] . '" value="' . get_value($data, $vars["key"]) . '" ' . ($required ? "required" : "") . '>';
            $s .= '<div class="invalid-feedback">Incorrect ' . $vars["name"] . ' value</div>';
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
            $s .= '<input type="number" class="form-control" name="' . $vars["key"] . '" id="' . $vars["key"] . '" value="' . get_value($data, $vars["key"]) . '" ' . ($required ? "required" : "") . '>';
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
                    if (isset($vars["display_size"]) && $vars["display_size"] != "") {
                        $imgpath = isset($imgarr[$vars["display_size"]]) ? $imgarr[$vars["display_size"]] : $imgarr["thumb"];
                        $s .= "<img src='" . ROOT_PATH . "/" . $imgpath . "' class='form-imgbox'>";
                    }
                }
            }
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
    $table = $vars["tablename"];
    $msg = $vars["messages"];
    $save_fields = $vars["save_fields"];
    $link_table_rows = $vars["link_table_rows"];
    $primary_column = $vars["primary_column"];

    $ts = getts();

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
            else if (isset($sv["type"]) && $sv["type"] == "image") {
                $image = single_file_upload($conn, $_REQ, $_FILES, $sv["key"]);
                // echo "image id: " . $image;
                if ($image != "") {
                    $query .= " " . $sv['key'] . " = \"" . $image . "\", ";
                }
            }
            // 
            else if (isset($sv["type"]) && $sv["type"] == "implode") {
                $query .= " " . $sv['key'] . " = \"" . implode($sv["sep"], $_REQ[$sv['key']]) . "\", ";
            }
            //
            else {
                $query .= " " . $sv['key'] . " = \"" . $conn->real_escape_string($_REQ[$sv['key']]) . "\", ";
            }
        }

        $query = trim($query);
        $query = substr($query, 0, -1);

        // echo $query;
        // die;

        //for non english languages
        $sql = $conn->query('SET NAMES utf8');

        if ($_POST['mode'] == 'new') {
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
                notify('success', $msg["success_added"]);

                redirect_action($_REQ);

                return true;
            } else {
                notify('danger', $msg["error_added"]);

                redirect_action($_REQ);

                return false;
            }
        }

        //
        elseif ($_REQ['mode'] == 'update') {
            // update
            // $query .= " updated = \"" . $ts . "\" ";
            $sql = $conn->query(" UPDATE $table SET " . $query . " WHERE " . $primary_column . " = '" . $_REQ[$primary_column] . "' ");

            if ($sql) {
                save_link_table_rows($vars, $_REQ[$primary_column]);
                notify('success', $msg["success_update"]);
                redirect_action($_REQ);

                return true;
            } else {
                notify('danger', $msg["error_update"]);
                redirect_action($_REQ);

                return false;
            }
        } else {
            // no mode defined
            return false;
        }
    }
}

function save_link_table_rows($vars, $primary_id)
{
    global $conn;

    $_REQ = $vars["submit_data"];
    $ltr = $vars["link_table_rows"];
    $primary_column = $vars["primary_column"];

    if (sizeof($ltr) > 0) {
        $rows = $_REQ[$ltr["multi_column"]["field"]];
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



function module_submit_delete_form($vars)
{
    global $conn;
    $_REQ = $vars["submit_data"];
    $table = $vars["tablename"];
    $msg = $vars["messages"];

    if (isset($_REQ['delete'])) {
        // print_arr($_REQ);

        $query = " id = \"" . $_REQ[$vars["primary_column"]] . "\" ";

        $sql = $conn->query("DELETE FROM $table WHERE " . $query . " ");

        //echo "New firewall inserted at ". decrypt($datetime);
        if ($sql) {
            notify_after_redirect("success", $msg["success_delete"]);
            $urlparam = "";
            if (isset($vars["url_param"]) && $vars["url_param"] != "") {
                $urlparam = $vars["url_param"];
            }
            echo "<script>window.top.location='" . $vars["redirect_to"] . ".php?" . $urlparam . "'</script>";
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
