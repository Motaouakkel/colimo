<?php
 $hostname = gethostname();
 $ipAddress = $_SERVER['SERVER_ADDR'];
 $isLocal = ($hostname === 'localhost' || $ipAddress === '127.0.0.1' || $ipAddress === '::1');
if (!defined('BASE_URL')) {
    define('BASE_URL',  'http://10.10.10.165');
}
if (!defined('PORT')) {
    define('PORT', '3020');
}

