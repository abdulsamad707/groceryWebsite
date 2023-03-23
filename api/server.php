
<?php

header('Access-Control-Allow-Origin:*');


header('Access-Control-Allow-Methods:GET');

$browser = get_browser(null, true);

$user_agent = $_SERVER['HTTP_USER_AGENT'];

if (strpos($user_agent, 'MSIE') !== FALSE) {
    $browser = 'Internet Explorer';
} elseif (strpos($user_agent, 'Trident') !== FALSE) {
    $browser = 'Internet Explorer';
} elseif (strpos($user_agent, 'Firefox') !== FALSE) {
    $browser = 'Mozilla Firefox';
} elseif (strpos($user_agent, 'Chrome') !== FALSE) {
    $browser = 'Google Chrome';
} elseif (strpos($user_agent, 'Safari') !== FALSE) {
    $browser = 'Apple Safari';
} else {
    $browser = 'Unknown';
}

if (strpos($user_agent, 'Windows NT 10.0') !== FALSE) {
    $os = 'Windows 10';
} elseif (strpos($user_agent, 'Windows NT 6.3') !== FALSE) {
    $os = 'Windows 8.1';
} elseif (strpos($user_agent, 'Windows NT 6.2') !== FALSE) {
    $os = 'Windows 8';
} elseif (strpos($user_agent, 'Windows NT 6.1') !== FALSE) {
    $os = 'Windows 7';
} elseif (strpos($user_agent, 'Windows NT 6.0') !== FALSE) {
    $os = 'Windows Vista';
} elseif (strpos($user_agent, 'Windows NT 5.1') !== FALSE) {
    $os = 'Windows XP';
} elseif (strpos($user_agent, 'Windows NT 5.0') !== FALSE) {
    $os = 'Windows 2000';
} elseif (strpos($user_agent, 'Mac') !== FALSE) {
    $os = 'Mac OS X';
} elseif (strpos($user_agent, 'Linux') !== FALSE) {
    $os = 'Linux';
} else {
    $os = 'Unknown';
}
echo date_default_timezone_get();
date_default_timezone_set('Asia/Karachi');

// create a new DateTime object with the current date and time


 // output the string

?>