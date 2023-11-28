<?php
session_start();
ob_start();
include ('model/pdo.php');
include ('model/sanpham.php');
include ('model/bienthe.php');
include ('model/danhmuc.php');
include ('model/taikhoan.php');
include ('model/binhluan.php');
include ('model/thongke.php');
include ('global.php');

$ds_dm = loadAll_dm();
include("view/include/header.php");


$ds_popular = loadAll_sp_popular();

$ds_sp_sale = loadAll_sp_sale();
if (isset($_GET['act']) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {
        case 'spct':
            if(isset($_GET['id_sp'])){
                $sp = load_one_sp($_GET['id_sp']);
                $hinh = $img_path . $sp['hinh_sp'];
                $list_hp = loadAll_hp($_GET['id_sp']);
                $list_splq = loadAll_splq($_GET['id_sp'], $sp['id_dm']);
                $gia_new = $sp['gia'] - ($sp['gia'] * ($sp['giam_gia'] / 100));
                $ds_bl = load_bl_sp($_GET['id_sp']);
            }
            include('view/chitietsanpham.php');
            break;
        case 'binhluan':

            break;
        case 'cart':
            include('view/cart.php');
            break;
        case 'checkout':
            include('view/checkout.php');
            break;
        case 'login':
            if(isset($_GET['nd'])){
                if($_GET['nd'] == 'login'){
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $check_user = dangnhap($_POST['email'], $_POST['pass']);
                        
                        if(is_array($check_user)){
                            $_SESSION['user'] = $check_user;
                            header('location: index.php');
                        }else{
                            $thongbao = "Đăng nhập thất bại";
                        }
                    }
                }

                if($_GET['nd'] == 'logout'){
                    dangxuat();
                    header("location: index.php");
                }
            }
            include('view/login&register.php');
            break;
        case 'account':
            include('view/myaccount.php');
            break;
        case 'shop':
            if(isset($_GET['nd'])){
                if($_GET['nd'] == 'danhmuc'){
                    if(isset($_GET['id_dm'])){
                        $id_dm = $_GET['id_dm'];
                    }else{
                        $id_dm = 0;
                    }
        
                    if(isset($_GET['kyw'])){
                        $kyw = $_GET['kyw'];
                    }else{
                        $kyw = '';
                    }
                    if($_SERVER['REQUEST_METHOD'] == "POST"){
                        $kyw = $_POST['kyw'];
                    }
                    

                    $ds_sp = loadAll_sp($id_dm, $kyw);
                }

                if($_GET['nd'] == 'mau'){
                    if(isset($_GET['id_mau'])){
                        $id_mau = $_GET['id_mau'];
                        $productId = array_column(load_sp_ma_mau($id_mau), 'id_sp');
                        $ds_id_sp = implode(',', $productId) ;
                        
                        if(empty($ds_id_sp)){
                            $ds_id_sp =0;
                        }
                    $ds_sp = load_sp_id($ds_id_sp);
                    }
                }

                if($_GET['nd'] == 'price'){
                    if($_SERVER['REQUEST_METHOD'] == "POST"){
                        $price1 = $_POST['price1'];
                        $price2 = $_POST['price2'];
                        $ds_sp = load_sp_price($price1, $price2);
                    }
                }

                if($_GET['nd'] == 'gioi_tinh'){
                    if($_GET['id_sex']){
                        $ds_sp = load_sp_sex((int)$_GET['id_sex']);
                        
                    }
                }

            }
            
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