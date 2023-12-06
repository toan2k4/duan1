<?php
session_start();
ob_start();
include('model/pdo.php');
include('model/sanpham.php');
include('model/bienthe.php');
include('model/danhmuc.php');
include('model/cart.php');
include('model/bill.php');
include('model/taikhoan.php');
include('model/binhluan.php');
include('model/thongke.php');
include('global.php');


// var_dump($_SESSION['cart']);
// die();

$ds_dm = loadAll_dm();
include("view/include/header.php");


$ds_popular = loadAll_sp_popular();

$ds_sp_sale = loadAll_sp_sale();

if (isset($_SESSION['user']) && $_SESSION['user']['roles'] == '1') {
    header("location: admin/index.php");
} elseif (isset($_SESSION['user']) && $_SESSION['user']['roles'] == '0') {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if (isset($_GET['act']) && ($_GET['act'] != '')) {
        $act = $_GET['act'];
        switch ($act) {
            case 'spct':
                if (isset($_GET['id_sp'])) {
                    $sp = load_one_sp($_GET['id_sp']);
                    update_view($_GET['id_sp'], $sp['so_luot_xem'] + 1);
                    $hinh = $img_path . $sp['hinh_sp'];
                    $list_hp = loadAll_hp($_GET['id_sp']);
                    $list_splq = loadAll_splq($_GET['id_sp'], $sp['id_dm']);
                    $gia_new = $sp['gia'] - ($sp['gia'] * ($sp['giam_gia'] / 100));
                    $ds_bl = load_bl_sp($_GET['id_sp']);
                }
                include('view/chitietsanpham.php');
                break;
            case 'binhluan':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $danh_gia = $_POST['danhgia'];
                    $noi_dung = $_POST['noidung'];
                    $id_sp = $_POST['id_sp'];
                    $id_tk = $_POST['id_tk'];
                    insert_bl($noi_dung, $id_sp, $id_tk, $danh_gia);
                    $danh_gia = thongke_danhgia_sp($id_sp);
                    update_danhgia_sp($id_sp, $danh_gia);
                }
                header('location: index.php?act=spct&id_sp=' . $id_sp);
                break;
            case 'cart':
                if (!empty($_SESSION['cart'])) {
                    $list_cart = $_SESSION['cart'];
                    // $productId = array_column($cart, 'id');
                    // $idList = implode(',',$productId);

                    // $list_cart = load_sp_id($idList);
                    // var_dump( $list_cart );
                    // die();
                }

                include('view/cart.php');
                break;
            case 'checkout':
                include('view/checkout.php');
                break;
            case 'thanks':
                if(isset($_GET['id_ctbill'])){
                    $kh = loadone_detailbill_id($_GET['id_ctbill']);
                    $sp = loadone_bill($_GET['id_ctbill']);
                    
                }
                include('view/thanks.php');
                break;
            case 'bill':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (empty($_POST["full_name"])) {
                        $nameErr = "Name is required";
                    } else {
                        $full_name = $_POST['full_name'];
                    }


                    $email = $_POST['email'];

                    if (empty($_POST["phone"])) {
                        $phoneErr = "Phone is required";
                    } else {
                        $phone = $_POST['phone'];
                    }

                    $thanh_tien = $_POST['thanh_tien'];

                    if (empty($_POST["dia_chi"])) {
                        $addressErr = "Address is required";
                    } else {
                        $dia_chi = $_POST['dia_chi'];
                    }


                    if (empty($_POST["payUrl"])) {
                        $payErr = "payment method is required";
                    } else {
                        $thanh_toan = $_POST['payUrl'];
                    }

                    if (isset($full_name) && isset($phone) && isset($dia_chi) && isset($thanh_toan)) {
                        if ($thanh_toan == 'Chuyển khoản') {
                            // test momo:
                            // NGUYEN VAN A
                            // 9704 0000 0000 0018
                            // 03/07
                            // OTP
                            $id_detailbill = insert_detail_bill($_SESSION['user']['id_tk'], $full_name, $phone, $dia_chi, $email, $thanh_tien, $thanh_toan);
                            foreach ($_SESSION['cart'] as $item) {
                                extract($item);
                                insert_bill($id_detailbill, $id, $quantity, $price, $color, $size);
                            }
                            unset($_SESSION['cart']);
                            include "view/thanhtoan.php";
                        } else {
                            $id_detailbill = insert_detail_bill($_SESSION['user']['id_tk'], $full_name, $phone, $dia_chi, $email, $thanh_tien, $thanh_toan);
                            foreach ($_SESSION['cart'] as $item) {
                                extract($item);
                                insert_bill($id_detailbill, $id, $quantity, $price, $color, $size);
                            }
                            unset($_SESSION['cart']);
                            header('location: index.php?act=thanks&id_detailbill='.$id_detailbill.'');
                        }

                    } else {

                        include "view/checkout.php";
                    }

                }
                break;
            case 'login':
                if (isset($_GET['nd'])) {
                    if ($_GET['nd'] == 'login') {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $check_user = dangnhap($_POST['email'], $_POST['pass']);

                            if (is_array($check_user)) {
                                $_SESSION['user'] = $check_user;
                                header('location: index.php');
                            } else {
                                $thongbao = "Đăng nhập thất bại";
                            }
                        }
                    }

                    if ($_GET['nd'] == 'logout') {
                        dangxuat();
                        header("location: index.php");
                    }


                }
                include('view/login&register.php');
                break;
            case 'account':
                if (isset($_GET['nd'])) {
                    if ($_GET['nd'] == 'chitiet') {
                        if (isset($_GET['id_ctbill']) && isset($_GET['trang_thai'])) {
                            $ds = loadone_bill($_GET['id_ctbill']);
                            $trang_thai = $_GET['trang_thai'];
                            include "view/chitietdonhang.php";
                        }

                    }

                    if ($_GET['nd'] == 'uptt') {
                        if (isset($_POST['huy']) && ($_POST['huy'])) {
                            $id = $_POST['id'];
                            update_trangthai($id, 4);
                        }


                    }

                }
                $list_detailbill = loadAll_detailbill_idtk($_SESSION['user']['id_tk']);
                include('view/myaccount.php');
                break;
            case 'shop':
                if (isset($_GET['nd'])) {
                    if ($_GET['nd'] == 'danhmuc') {
                        if (isset($_GET['id_dm'])) {
                            $id_dm = $_GET['id_dm'];
                        } else {
                            $id_dm = 0;
                        }

                        if (isset($_GET['kyw'])) {
                            $kyw = $_GET['kyw'];
                        } else {
                            $kyw = '';
                        }
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $kyw = $_POST['kyw'];
                        }


                        $ds_sp = loadAll_sp($id_dm, $kyw);
                    }

                    if ($_GET['nd'] == 'mau') {
                        if (isset($_GET['id_mau'])) {
                            $id_mau = $_GET['id_mau'];
                            $productId = array_column(load_sp_ma_mau($id_mau), 'id_sp');
                            $ds_id_sp = implode(',', $productId);

                            if (empty($ds_id_sp)) {
                                $ds_id_sp = 0;
                            }
                            $ds_sp = load_sp_id($ds_id_sp);
                        }
                    }

                    if ($_GET['nd'] == 'price') {
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $price1 = $_POST['price1'];
                            $price2 = $_POST['price2'];
                            $ds_sp = load_sp_price($price1, $price2);
                        }
                    }

                    if ($_GET['nd'] == 'gioi_tinh') {
                        if ($_GET['id_sex']) {
                            $ds_sp = load_sp_sex((int) $_GET['id_sex']);

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
} else {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if (isset($_GET['act']) && ($_GET['act'] != '')) {
        $act = $_GET['act'];
        switch ($act) {
            case 'spct':
                if (isset($_GET['id_sp'])) {
                    $sp = load_one_sp($_GET['id_sp']);
                    update_view($_GET['id_sp'], $sp['so_luot_xem'] + 1);
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
                if (!empty($_SESSION['cart'])) {
                    $list_cart = $_SESSION['cart'];
                    // $productId = array_column($cart, 'id');
                    // $idList = implode(',',$productId);

                    // $list_cart = load_sp_id($idList);
                    // var_dump( $list_cart );
                    // die();
                }


                include('view/cart.php');
                break;
            case 'checkout':
                include('view/checkout.php');
                break;
            case 'bill':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (empty($_POST["full_name"])) {
                        $nameErr = "Name is required";
                    } else {
                        $full_name = $_POST['full_name'];
                    }


                    $email = $_POST['email'];

                    if (empty($_POST["phone"])) {
                        $phoneErr = "Phone is required";
                    } else {
                        $phone = $_POST['phone'];
                    }

                    $thanh_tien = $_POST['thanh_tien'];

                    if (empty($_POST["dia_chi"])) {
                        $addressErr = "Address is required";
                    } else {
                        $dia_chi = $_POST['dia_chi'];
                    }


                    if (empty($_POST["payment-method"])) {
                        $payErr = "payment method is required";
                    } else {
                        $thanh_toan = $_POST['payment-method'];
                    }

                    if (isset($full_name) && isset($phone) && isset($dia_chi) && isset($thanh_toan)) {
                        $id_detailbill = insert_detail_bill(0, $full_name, $phone, $dia_chi, $email, $thanh_tien, $thanh_toan);
                        foreach ($_SESSION['cart'] as $item) {
                            extract($item);
                            insert_bill($id_detailbill, $id, $quantity, $price, $color, $size);
                        }
                        unset($_SESSION['cart']);
                        header('location: index.php');
                    } else {

                        include "view/checkout.php";
                    }

                }

                break;
            case 'login':
                if (isset($_GET['nd'])) {
                    if ($_GET['nd'] == 'login') {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $check_user = dangnhap($_POST['email'], $_POST['pass']);

                            if (is_array($check_user)) {
                                $_SESSION['user'] = $check_user;
                                header('location: index.php');
                            } else {
                                $thongbao = "Đăng nhập thất bại";
                            }
                        }

                    }

                    if ($_GET['nd'] == 'logout') {
                        dangxuat();
                        header("location: index.php");
                    }

                    if ($_GET['nd'] == 'register') {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $full_name = $_POST['full_name'];
                            $name_tk = $_POST['name_tk'];
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];
                            $repass = $_POST['repass'];
                            if ($repass == $pass) {
                                insert_tk($name_tk, $pass, $full_name, $email);
                            } else {
                                $thongbaodk = "Mật khẩu nhập lại không trùng";
                            }
                        }
                    }
                }

                include('view/login&register.php');
                break;
            case 'quenmk':
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $email = $_POST['email'];
                    $sendMailMess = sendMail($email);

                }
                include('view/quenmk.php');
                break;
            case 'account':
                include('view/myaccount.php');
                break;
            case 'shop':
                if (isset($_GET['nd'])) {
                    if ($_GET['nd'] == 'danhmuc') {
                        if (isset($_GET['id_dm'])) {
                            $id_dm = $_GET['id_dm'];
                        } else {
                            $id_dm = 0;
                        }

                        if (isset($_GET['kyw'])) {
                            $kyw = $_GET['kyw'];
                        } else {
                            $kyw = '';
                        }
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $kyw = $_POST['kyw'];
                        }


                        $ds_sp = loadAll_sp($id_dm, $kyw);
                    }

                    if ($_GET['nd'] == 'mau') {
                        if (isset($_GET['id_mau'])) {
                            $id_mau = $_GET['id_mau'];
                            $productId = array_column(load_sp_ma_mau($id_mau), 'id_sp');
                            $ds_id_sp = implode(',', $productId);

                            if (empty($ds_id_sp)) {
                                $ds_id_sp = 0;
                            }
                            $ds_sp = load_sp_id($ds_id_sp);
                        }
                    }

                    if ($_GET['nd'] == 'price') {
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $price1 = $_POST['price1'];
                            $price2 = $_POST['price2'];
                            $ds_sp = load_sp_price($price1, $price2);
                        }
                    }

                    if ($_GET['nd'] == 'gioi_tinh') {
                        if ($_GET['id_sex']) {
                            $ds_sp = load_sp_sex((int) $_GET['id_sex']);

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
}

?>