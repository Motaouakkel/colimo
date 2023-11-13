<?php
include 'consts.php';
$groupedArray = [];
try {
    $data = array("partner_id" => $_SESSION["partner"]);
    $response = fetch_data(BASE_URL . ':' . PORT . '/ms/gpmenuweb', $data, 'test', 'miftah');
    $obj = json_decode($response, true);
    $groupedArray = array_reduce($obj, function ($carry, $item) {
        $key = $item['mname'];

        if (!isset($carry[$key])) {
            $carry[$key] = [];
        }
        $carry[$key][] = $item;

        return $carry;
    }, []);
} catch (Exception  $e) {
}
?>


<!-- Start: Sidebar -->
<aside id="sidebar_left" class="nano nano-primary test3434">
    <div class="nano-content">
        <!-- sidebar menu -->
        <ul class="nav sidebar-menu">
            <li class="active">
                <a href="/home.php">
                    <span class="glyphicons glyphicons-home"></span>
                    <span class="sidebar-title">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-label pt15">Menu</li>
            <?php
            $output = "";
            $currentUrl = $_SERVER['REQUEST_URI'];
            $pageRoute = parse_url($currentUrl, PHP_URL_PATH);
            $menu_item_class  = "";
            $menu_class  = "";
            $index = 0;
            foreach ($groupedArray as $key => $menu) {
                $menu_class = "";
                $output .= '<li><a class="accordion-toggle @@menu@@" href="#">';
                $output .= '<span class="glyphicons glyphicons-fire"></span>';
                $output .= '<span class="sidebar-title">' . $key . '</span>';
                $output .= '<span class="caret"></span></a><ul class="nav sub-nav @@menu@@">';
                foreach ($menu as $key => $menu_item) {
                    $menu_item_class = "";
                    if (strpos($pageRoute, $menu_item["logic_name"]) !== false) {
                        $menu_item_class = "active";
                        $menu_class = "menu-open";
                    }
                    $output .= '<li class="' . $menu_item_class . '">';
                    $output .= '<a href="' . $menu_item["logic_name"] . '"><span class="glyphicons glyphicons-book"></span> ' . $menu_item["iname"] . ' </a> </li>';
                }
                $output .= '</ul></li>';
                $index++;
                $output = str_replace('@@menu@@', $menu_class, $output);
            }
            echo $output;
            ?>
        </ul>
        <div class="sidebar-toggle-mini">
            <a href="#">
                <span class="fa fa-sign-out"></span>
            </a>
        </div>
    </div>
</aside>