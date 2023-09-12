<?php
$routes = [
    '/' => 'home.php',
    '/segm_nombre_factures' => 'segm_nombre_factures.php',
    '/segm_tax_by_invoice' => 'segm_tax_by_invoice.php',
    '/sales_frequency_segmentation' => 'sales_frequency_segmentation.php',
];

$url = $_SERVER['REQUEST_URI'];

if (strpos($url, ".php") !== false) {
    include($url);
}

foreach ($routes as $route => $handler) {
    if ($route === $url) {

        include($handler);
        exit;
    }
}
die;

include($routes['/']);
