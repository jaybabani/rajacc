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