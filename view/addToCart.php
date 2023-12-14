<?php
session_start();
include "../model/pdo.php";
include "../model/bienthe.php";
if (isset($_GET['act']) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {
        case 'addCart':
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $id_sp = $_POST['id'];
                $ten_sp = $_POST['name'];
                $hinh_sp = $_POST['image'];
                $gia_sp = $_POST['price'];
                $mau = $_POST['color'];
                $size = $_POST['size'];
                $quantity = $_POST['quantity'];

                
                $productExists = false;
                foreach ($_SESSION['cart'] as $key => $item) {
                    if ($item['id'] === $id_sp && $item['color'] === $mau && $item['size'] === $size) {
                        $_SESSION['cart'][$key]['quantity'] += $quantity;
                        $productExists = true;
                        break;
                    }
                }
                
                if (!$productExists) {
                    $product = [
                        'id' => $id_sp,
                        'name' => $ten_sp,
                        'image' => $hinh_sp,
                        'price' => $gia_sp,
                        'quantity' => $quantity,
                        'color' => $mau,
                        'size' => $size
                    ];
                    $_SESSION['cart'][] = $product;
                }
                
                
                echo count($_SESSION['cart']);
            } else {
                echo 'yêu cầu khong kojpw lẹ';
            }
            break;
        case 'updateCart':
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $id_sp = $_POST['id'];
                $newQty = $_POST['quantity'];

                if (!empty($_SESSION['cart'])) {
                    $index = array_search($id_sp, array_column($_SESSION['cart'], 'id'));
                    if ($index !== false) {
                        $_SESSION['cart'][$index]['quantity'] = $newQty;
                    } else {
                        echo 'sản phẩm không tồn tại trong giỏ hàng';
                    }
                }
            } else {
                echo 'yêu cầu khong kojpw lẹ';
            }
            break;
        case 'removeCart':
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $id_sp = $_POST['id'];

                if (!empty($_SESSION['cart'])) {
                    $index = array_search($id_sp, array_column($_SESSION['cart'], 'id'));
                    if ($index !== false) {
                        unset($_SESSION['cart'][$index]);
                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                    } else {
                        echo 'sản phẩm không tồn tại trong giỏ hàng';
                    }
                }
            } else {
                echo 'yêu cầu khong kojpw lẹ';
            }
            break;
        case 'checksize':
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $color = $_POST['mau'];
                $size = $_POST['kichco'];
                $id_sp = $_POST['productId'];
                
                $check = check_size($id_sp, $color, $size);
                if(empty($check)){
                    echo 'không còn size này';
                }elseif($check['so_luong'] == 0){
                    echo 'sản phẩm này trong kho đã hết';
                }
            }
            break;
        case 'checkSl':
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $color = $_POST['mau'];
                $size = $_POST['kichco'];
                $id_sp = $_POST['id_sp'];
                $newQty = $_POST['newQuantity'];
                $sl = checkSl($id_sp,$color, $size);
                if($sl['so_luong'] > 0){
                    if($sl['so_luong'] >= $newQty){
                        echo 'valid';
                    }else{
                        echo 'invalid';
                    }
                }else{
                    echo 'saisl';
                }
            }
            break;
    }
}
?>