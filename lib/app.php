<?php
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('Asia/Kolkata');
// date_default_timezone_set('UTC');
ini_set('max_execution_time', '600'); // 10 minutes
ini_set('log_errors', 'On');
// ini_set('error_log', __DIR__ . '/logs/php_error.log');
$loghost = "";
if (isset($_SERVER['HTTP_HOST'])) {
  $loghost = str_replace(":", ".", $_SERVER['HTTP_HOST']);
}
ini_set('error_log', __DIR__ . '/../logs/php_error_web.' . $loghost . '.log');

include __DIR__ . '/connection.php';
include __DIR__ . '/variables.php';
include __DIR__ . '/app_functions.php';



// echo $mode;

// $GLOBALS['momentumFactor'] = ["up" => -0.5, "down" => 0.5]; //-0.25; // -1 to 1. // 0 means OHLC price. 
// $GLOBALS['momentumFactor'] = ["up" => -0.5, "down" => -0.5]; //-0.25; // -1 to 1. // 0 means OHLC price. 
// $GLOBALS['momentumFactor'] = ["up" => 0.5, "down" => 0.5]; //-0.25; // -1 to 1. // 0 means OHLC price. 
// $GLOBALS['momentumFactor'] = ["up" => 0, "down" => -0.5]; //-0.25; // -1 to 1. // 0 means OHLC price. 
// $GLOBALS['momentumFactor'] = ["up" => 2.99, "down" => 2.99]; //-0.25; // -1 to 1. // 0 means OHLC price. 
// $GLOBALS['momentumFactor'] = ["up" => -0.25, "down" => -0.25]; //-0.25; // -1 to 1. // 0 means OHLC price. 
// $GLOBALS['momentumFactor'] = ["up" => 0, "down" => 0]; //-0.25; // -1 to 1. // 0 means OHLC price. 
// $GLOBALS['momentumFactor'] = ["up" => 0.25, "down" => 0.25]; //-0.25; // -1 to 1. // 0 means OHLC price. 
// $GLOBALS['momentumFactor'] = ["up" => -0.5, "down" => -0.5]; //-0.25; // -1 to 1. // 0 means OHLC price. 
// $GLOBALS['momentumFactor'] = ["up" => 0, "down" => 0]; //-0.25; // -1 to 1. // 0 means OHLC price. 
// $GLOBALS['momentumFactor'] = ["up" => 0.5, "down" => 0.5]; //-0.25; // -1 to 1. // 0 means OHLC price. 
// $GLOBALS['momentumFactor'] = ["up" => 2, "down" => 2]; //-0.25; // -1 to 1. // 0 means OHLC price. 

// global $momentumFactor;

// $GLOBALS['emaPriceType'] = "mClose"; // High
// global $emaPriceType;

// $GLOBALS['zlmaPriceType'] = "mClose"; // High
// global $zlmaPriceType;

// $GLOBALS['kmaPriceType'] = "mClose";
// global $kmaPriceType;

// $GLOBALS['smaPriceType'] = "mClose"; // High
// global $smaPriceType;

// $GLOBALS['hmaPriceType'] = "mClose"; // High
// global $hmaPriceType;


// $GLOBALS['APP_MODULES'] = ['label'];
// global $APP_MODULES;
// $GLOBALS['APP_KEY'] = '411a164adef2dc87d3da8ef7af834cf7';
// global $APP_KEY;

// $APP_THEME_COLORS = [];
// $APP_THEME_COLORS['red'] = '#E57373';
// $APP_THEME_COLORS['orange'] = '#ff8a65';
// $APP_THEME_COLORS['blue'] = '#64B5F6';
// $APP_THEME_COLORS['green'] = '#81C784';
// $APP_THEME_COLORS['teal'] = '#4db6ac';
// $APP_THEME_COLORS['amber'] = '#ffc107';
// $APP_THEME_COLORS['pink'] = '#f06292';
// $APP_THEME_COLORS['indigo'] = '#7986cb';
// $APP_THEME_COLORS['blue-grey'] = '#90a4ae';
// $APP_THEME_COLORS['brown'] = '#a1887f';
// $APP_THEME_COLORS['cyan'] = '#26C6DA';
// $APP_THEME_COLORS['light-green'] = '#8BC34A';
// $APP_THEME_COLORS['purple'] = '#BA68C8'; // means violet on front end
// $APP_THEME_COLORS['grey'] = '#616161';
// $APP_THEME_COLORS['deep-purple'] = '#9575CD';

// $GLOBALS['APP_COLORS'] = $APP_THEME_COLORS;
// global $APP_COLORS;

// require '../app/app-functions.php';
// require '../app/app-time-functions.php';
// require '../file/file-functions.php';
// require '../user/user-functions.php';
// require '../task/task-functions.php';
// require '../label/label-functions.php';
// require '../shooting-match/shooting-match-functions.php';
// require_once '../web-token/web-token-functions.php';
// require '../blog/blog-functions.php';
