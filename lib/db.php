<?php
$db = [];
if (
    (isset($_SERVER['HTTP_ORIGIN']) && ( $_SERVER['HTTP_ORIGIN'] == 'http://localhost' || $_SERVER['HTTP_ORIGIN'] == 'http://localhost:3000' )) ||
    (isset($_SERVER['HTTP_HOST']) && ( $_SERVER['HTTP_HOST'] == 'localhost')) ||
    (isset($_SERVER['HTTP_HOST']) && ( $_SERVER['HTTP_HOST'] == 'localhost:8080'))
) {
    $db['serverhost'] = 'localhost'; // server host
    $db['serverdatabase'] = 'rajacc'; // database name
    $db['serveruser'] = 'admin'; // database user
    $db['serverpassword'] = 'admin'; // database password
} 

// else {
//     $db['serverhost'] = 'localhost'; // server host
//     $db['serverdatabase'] = 'jayb_stocks_app'; // database name
//     $db['serveruser'] = 'jayb_stocks_app'; // database user
//     $db['serverpassword'] = 'Ertb^Ma%e7Gj3biB'; // database password
// }
else {
    $db['serverhost'] = 'localhost'; // server host
    $db['serverdatabase'] = 'jbso_rajacc'; // database name
    $db['serveruser'] = 'rajacc'; // database user
    $db['serverpassword'] = '3PcIDlIdL56W6%Rdf4ag^e@fjkld#d'; // database password
}

//
?>