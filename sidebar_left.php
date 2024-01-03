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

    foreach ($groupedArray as $key => $value) {
        // Sort the "Agence" array by "iname"
        usort($groupedArray[$key], 'compareByIname');
    }
} catch (Exception  $e) {
}

// Custom comparison function to sort by "iname"
function compareByIname($a, $b)
{
    
    return strcasecmp($a["iname"], $b["iname"]);
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
                    $logic_name = $menu_item["logic_name"];
                    
                    if ('/' . $logic_name === $pageRoute) {
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