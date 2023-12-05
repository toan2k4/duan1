<?php
session_start();
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

                // $index = array_search($id_sp, array_column($_SESSION['cart'], 'id'));

                // if ($index !== false) {
                //     if ($_SESSION['cart'][$index]['color'] === $mau && $_SESSION['cart'][$index]['size'] === $size && $_SESSION['cart'][$index]['id'] === $id_sp) {
                //         $_SESSION['cart'][$index]['quantity'] += $quantity;
                //     } else {
                //         $product = [
                //             'id' => $id_sp,
                //             'name' => $ten_sp,
                //             'image' => $hinh_sp,
                //             'price' => $gia_sp,
                //             'quantity' => $quantity,
                //             'color' => $mau,
                //             'size' => $size
                //         ];
                //         $_SESSION['cart'][] = $product;
                //     }
                //     // $_SESSION['cart'][$index]['quantity'] += $quantity;
                // } else {
                //     $product = [
                //         'id' => $id_sp,
                //         'name' => $ten_sp,
                //         'image' => $hinh_sp,
                //         'price' => $gia_sp,
                //         'quantity' => $quantity,
                //         'color' => $mau,
                //         'size' => $size
                //     ];
                //     $_SESSION['cart'][] = $product;
                // }
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
    }
}
?>