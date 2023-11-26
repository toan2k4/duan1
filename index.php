<?php
include ('model/pdo.php');
include ('model/sanpham.php');
include ('model/bienthe.php');
include ('global.php');

include("view/include/header.php");


$ds_popular = loadAll_sp_popular();
$ds_sp_sale = loadAll_sp_sale();
if (isset($_GET['act']) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {
        case 'spct':
            if(isset($_GET['id_sp'])){
                $sp = load_one_sp($_GET['id_sp']);
            }
            include('view/chitietsanpham.php');
            break;
        case 'cart':
            include('view/cart.php');
            break;
        case 'checkout':
            include('view/checkout.php');
            break;
        case 'login':
            include('view/login&register.php');
            break;
        case 'account':
            include('view/account.php');
            break;
        case 'shop':
            include('view/shop.php');
            break;
        case 'wishlist':
            include('view/wishlist.php');
            break;
    }
} else {
    include("view/include/home.php");
}

include("view/include/footer.php");
?>