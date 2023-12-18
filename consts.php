<?php
$hostname = gethostname();
$ipAddress = $_SERVER['SERVER_ADDR'];
$isLocal = ($hostname === 'localhost' || $ipAddress === '127.0.0.1' || $ipAddress === '::1');
$isLocal = false;
if (!defined('BASE_URL')) {
    define('BASE_URL',   $isLocal ? 'http://10.10.10.165' : 'http://105.155.253.52');
}
if (!defined('PORT')) {
    define('PORT', '3020');
}