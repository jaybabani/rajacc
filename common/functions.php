<?php

function widget_start($title = "", $class = "", $widget_title_class = "", $widget_wrapper_class = "", $options = "", $widget_options_class = "")
{
    echo '<div class="widgetwrapper col d-flex align-items-start  px-4 py-1 ' . $class . ' ">
 <div class="widget container-fluid py-4 overhide ' . $widget_wrapper_class . '">';

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

    $cols = "*";
    $cols_arr = [];

    if (isset($vars["display_columns"])) {
        foreach ($vars["display_columns"] as $k => $v) {
            if (isset($v["column"]) && $v["column"] != "") {
                $cols_arr[] = $v["column"];
            }
        }
    }
    if (isset($vars["fetch_columns"])) {
        foreach ($vars["fetch_columns"] as $k => $v) {
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
            $colclass = "no-sort";
        }
        $html .= "<th class='" . $colclass . "'>" . $dv["name"] . "</th>";
    }
    $html .= "</tr></thead><tbody>";

    if ($totrows > 0) {
        $inc = 0;
        while ($r = mysqli_fetch_assoc($querystr)) {
            // echo "<pre>";	print_r($r);	echo "</pre>";

            $inc = $inc + 1;

            $selected =  ""; //$inc > 6  ? "checked" : "";

            $html .= "<tr data-details='" . $r[$vars["primary_column"]] . "'>";

            foreach ($vars["display_columns"] as $dk => $dv) {

                $row_col_class = "";
                if (isset($dv["class"])) {
                    $row_col_class = $dv["class"];
                }

                if (isset($dv["column"]) && $dv["column"] != "") {

                    $colval = $r[$dv["column"]];

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

                    if (isset($dv["badge"])) {
                        $colval = "<span class='badge badge-" . $r[$dv["column"]] . "'>" . $colval . "</span>";
                    }

                    $html .= "<td class='" . $row_col_class . "'>" . $colval . "</td>";
                }

                //
                else {
                    if (isset($dv["type"])) {
                        if ($dv['type'] == "details") {
                            $html .= "<td class='details-control " . $row_col_class . "'><span>&#9660;</span></td>";
                        } else if ($dv['type'] == "select") {
                            $html .= "<td class='" . $row_col_class . "'><input type='checkbox' " . $selected . " class='symbol-combination-check form-check-input' data-id='" . $r[$vars["primary_column"]] . "' /></td>";
                        } else if ($dv['type'] == "edit_delete") {
                            $html .= "<td class='" . $row_col_class . "'><a href='" . $vars["module_pages"]["update"] . ".php?id=" . $r[$vars["primary_column"]] . "'><span class='icon wtxt bg-accent2'><i data-feather='edit'></i>Edit</span></a> &nbsp; ";
                            $html .= "<a href='" . $vars["module_pages"]["delete"] . ".php?id=" . $r[$vars["primary_column"]] . "'><span class='icon wtxt bg-info'><i data-feather='trash'></i>Delete</span></a></td>";
                        }
                    }
                }
            }

            $html .= "</tr>";
        }
    }

    $html .= "</tbody></table></div></div>";

    return $html;

    // return $ret;
}

function crud_update() {}

function crud_delete() {}

function crud_create() {}


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
                    // {
                    //     targets: 1, // column index where checkboxes are
                    //     orderable: true,
                    //     render: function(data, type, row) {
                    //         // 'type' can be 'display', 'filter', or 'sort'
                    //         if (type === 'sort') {
                    //             let checked = $(data).find('input[type="checkbox"]').prop('checked');
                    //             return checked ? 1 : 0;
                    //             // Return 1 if checked, 0 if unchecked
                    //             //   return $('input[type="checkbox"]', data).prop(':checked') ? 1 : 0;
                    //         }
                    //         return data;
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
                const details = tr.data('details');

                if (row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Get the details HTML by ID from JSON
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

        $s = '<div class="' . $vars["class"] . '"><label for="' . $vars["key"] . '" class="form-label">' . $vars["name"] . '';

        $required = (isset($vars["required"]) && $vars["required"] == true) ? true : false;
        if ($required) {
            $s .= '<sup>*</sup>';
        }

        if (isset($vars["eg"]) && $vars["eg"] != "") {
            $s .= '<small>(eg: ' . $vars["eg"] . ')</small>';
        }
        $s .= '</label>';


        if ($vars["type"] == "text") {
            $s .= '<input type="text" class="form-control" name="' . $vars["key"] . '" id="' . $vars["key"] . '" value="' . get_value($data, $vars["key"]) . '" ' . ($required ? "required" : "") . '>
          <div class="invalid-feedback">Incorrect ' . $vars["name"] . ' value</div>';
        }

        if ($vars["type"] == "select") {
            $s .= '<select class="form-control" name="' . $vars["key"] . '" id="' . $vars["key"] . '" ' . ($required ? "required" : "") . '>';
            $sel = get_value($data, $vars["key"]);
            $s .= select_options($vars["options"], $sel);
            $s .= '</select><div class="invalid-feedback">Incorrect ' . $vars["name"] . ' value</div>';
        }

        $s .= '</div>';
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
    $submit_fields = $vars["submit_fields"];

    $ts = getts();

    if (isset($_REQ['save']) || isset($_REQ['savenew'])) {
        // print_arr($_REQ);
        // die;

        $query = '';
        foreach ($submit_fields as $sk => $sv) {
            if (isset($sv["type"]) && $sv["type"] == "time") {
                $query .= " " . $sv['key'] . " = \"" . $ts . "\", ";
            } else {
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
                notify('success', $msg["success_added"]);

                $id = $conn->insert_id;

                redirect_action($_REQ);

                return true;
            } else {
                notify('danger', $msg["error_added"]);

                redirect_action($_REQ);

                return false;
            }
        } elseif ($_REQ['mode'] == 'update') {
            // update
            // $query .= " updated = \"" . $ts . "\" ";
            $sql = $conn->query(" UPDATE $table SET " . $query . " WHERE id = '" . $_REQ['id'] . "' ");

            if ($sql) {
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
            echo "<script>window.top.location='" . $vars["redirect_to"] . ".php'</script>";
        } else {
            notify("error", $msg["error_delete"]);
        }
    }
    // die();

    return true;
}


function get_active_arr()
{
    $arr = [
        'yes' => 'Active',
        'no' => 'Inactive',
    ];

    return $arr;
}
