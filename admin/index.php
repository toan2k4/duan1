<?php
session_start();
ob_start();

if (isset($_SESSION['user']) && $_SESSION['user']['roles'] == '1') {
    include("../model/pdo.php");
    include("../model/danhmuc.php");
    include("../model/sanpham.php");
    include("../model/thongke.php");
    include("../model/binhluan.php");
    include("../model/bill.php");
    include("../model/taikhoan.php");
    include("../model/bienthe.php");
    include("../global.php");
    include("include/header.php");

    $dsdm = loadAll_dm();
    // $dssp = loadAll_sp();
    $isthongbao = '';
    $thongbao = '';
    if (isset($_GET['act']) && ($_GET['act'] != '')) {
        $act = $_GET['act'];
        switch ($act) {
            case 'danhmuc':
                if (isset($_GET['nd'])) {
                    if ($_GET['nd'] == 'listdm') {
                        include('danhmuc/list.php');
                    }

                    if ($_GET['nd'] == 'adddm') {
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $tendm = $_POST["name"];
                            if ($tendm == null || $tendm == "") {
                                $isthongbao = 0;
                                $thongbao = 'Không thành công';
                            } else {
                                $isthongbao = 1;
                                add_dm($tendm);
                                $thongbao = ' Thêm thành công';
                            }
                        }
                        include('danhmuc/add.php');
                    }

                    if ($_GET['nd'] == 'editdm') {
                        $dm = load_one_dm($_GET['iddm']);
                        include('danhmuc/edit.php');
                    }

                    if ($_GET['nd'] == 'update') {
                        if (isset($_POST['gui']) && $_POST['gui'] != "") {
                            $name = $_POST['name'];
                            $id = $_POST['id'];
                            upload_dm($id, $name);
                            // echo "  <script>alert('Đã Cập Nhật Thành Công') </script> ";
                            echo "  <script>window.location.href ='index.php?act=danhmuc&nd=listdm'</script> ";
                        }
                        break;
                    }

                    if ($_GET['nd'] == 'deldm') {
                        xoadm($_GET['iddm']);
                        echo "  <script>window.location.href ='index.php?act=danhmuc&nd=listdm'</script> ";
                    }

                    if ($_GET['nd'] == 'thongke') {
                        $ds = thongke_sp_danhmuc();
                        include("danhmuc/thongke.php");
                    }

                }
                break;
            case 'sanpham':
                if (isset($_GET['nd'])) {
                    if ($_GET['nd'] == 'listsp') {
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $kyw = $_POST['keyword'];
                            $id_dm = $_POST['id_dm'];

                        } elseif (isset($_GET['id_dm'])) {
                            $id_dm = $_GET['id_dm'];
                        } else {
                            $kyw = '';
                            $id_dm = 0;
                        }

                        $dssp = loadAll_sp($id_dm, $kyw);
                        include('sanpham/list.php');
                    }

                    if ($_GET['nd'] == 'addsp') {

                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            if (empty($_POST["ten_sp"])) {
                                $errorTen = 'Vui lòng bạn nhập tên sản phẩm';
                                $isthongbao = 0;
                            } else {
                                $ten_sp = $_POST["ten_sp"];
                            }
                            $giam_gia = $_POST["giam_gia"];
                            if (empty($_POST["gia"])) {
                                $errorGia = 'Vui lòng bạn nhập giá sản phẩm';
                                $isthongbao = 0;
                            } else {
                                $gia = $_POST["gia"];
                            }
                            if (empty($_POST["mo_ta"])) {
                                $errorMt = 'Vui lòng bạn nhập mô tả của sản phẩm';
                                $isthongbao = 0;
                            } else {
                                $mo_ta = $_POST["mo_ta"];
                            }
                            if (empty($_POST["ngay_nhap"])) {
                                $errorNn = 'Vui lòng bạn chọn ngày nhập sản phẩm';
                                $isthongbao = 0;
                            } else {
                                $ngay_nhap = $_POST["ngay_nhap"];
                            }

                            if (empty($_POST["danh_muc"])) {
                                $errorDm = 'Vui lòng bạn danh mục cho sản phẩm';
                                $isthongbao = 0;
                            } else {
                                $id_dm = $_POST["danh_muc"];
                            }
                            $gioi_tinh = $_POST["gioi_tinh"];
                            $file = $_FILES["hinh_sp"];
                            $hinh_sp = $file["name"];
                            if (isset($ten_sp) && isset($gia) && isset($mo_ta) && isset($ngay_nhap) && isset($id_dm) && isset($file)) {
                                
                                move_uploaded_file($file["tmp_name"], "../" . $img_path . $hinh_sp);
                                $idspnew = add_sp($ten_sp, $hinh_sp, $giam_gia, $gia, $mo_ta, $ngay_nhap, $gioi_tinh, $id_dm);


                                if (isset($_FILES['hinh_phu'])) {
                                    foreach ($_FILES['hinh_phu']['tmp_name'] as $key => $value) {
                                        $file_name = $_FILES['hinh_phu']['name'][$key];
                                        $file_tmp = $_FILES['hinh_phu']['tmp_name'][$key];
                                        add_img($idspnew, $file_name);
                                        move_uploaded_file($file_tmp, "../public/uploads/" . $file_name);
                                    }
                                } 
                                $isthongbao = 1;
                                $thongbao = ' Thêm sản phẩm thành công';
                            }else{
                                
                                $thongbao = ' Thêm sản phẩm thất bại';
                               
                            }

                        }
                        include('sanpham/add.php');
                    }

                    if ($_GET['nd'] == 'addbt') {
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $id_sp = $_POST["id_sp"];
                            $id_color = $_POST["id_color"];
                            $id_size = $_POST["id_size"];
                            $so_luong = $_POST["so_luong"];
                            add_thong_tin_sp($id_sp, $id_color, $id_size, $so_luong);
                        }
                        echo "  <script>window.location.href ='index.php?act=sanpham&nd=editsp&idsp=$id_sp'</script> ";
                        // header("location: index.php?act=sanpham&nd=editsp&idsp='.$id_sp.'");
                    }
                    if ($_GET['nd'] == 'editsp') {
                        $dsmau = loadAll_mau();
                        $dssize = loadAll_size();
                        $spbt = load_one_spbt($_GET['idsp']);
                        $sp = load_one_sp($_GET['idsp']);
                        $hinh_phu = loadAll_hp($_GET['idsp']);
                        include('sanpham/edit.php');
                    }

                    if ($_GET['nd'] == 'updatesp') {
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $ten_sp = $_POST["ten_sp"];
                            $giam_gia = $_POST["giam_gia"];
                            $gia = $_POST["gia"];
                            $id_sp = $_POST["id_sp"];
                            $mo_ta = $_POST["mo_ta"];
                            $ngay_nhap = $_POST["date"];
                            $gioi_tinh = $_POST["gt"];
                            $id_dm = $_POST["dm"];
                            $hinh_sp = $_POST["hinh_sp"];

                            $file = $_FILES["hinh_sp"];
                            if ($file['size'] > 0) {
                                unlink("../" . $img_path . $hinh_sp);
                                $hinh_sp = $file["name"];
                                move_uploaded_file($file["tmp_name"], "../" . $img_path . $hinh_sp);

                            }

                            update_sp($id_sp, $ten_sp, $hinh_sp, $giam_gia, $gia, $mo_ta, $ngay_nhap, $gioi_tinh, $id_dm);


                            if (isset($_FILES['hinh_phu'])) {
                                if (!empty($_FILES['hinh_phu']['name'][0])) {
                                    xoaimgsp($id_sp);
                                    foreach ($_FILES['hinh_phu']['tmp_name'] as $key => $value) {
                                        $file_name = $_FILES['hinh_phu']['name'][$key];
                                        $file_tmp = $_FILES['hinh_phu']['tmp_name'][$key];
                                        add_img($id_sp, $file_name);
                                        move_uploaded_file($file_tmp, "../public/uploads/" . $file_name);
                                    }
                                }

                            }
                            $isthongbao = 1;
                            $thongbao = ' Thêm thành công';
                            echo "  <script>window.location.href ='index.php?act=sanpham&nd=listsp'</script> ";
                        }
                        break;
                    }

                    if ($_GET['nd'] == 'delsp') {
                        xoaimgsp($_GET['idsp']);
                        xoasp($_GET['idsp']);
                        echo "  <script>window.location.href ='index.php?act=sanpham&nd=listsp'</script> ";
                    }

                    if ($_GET['nd'] == 'delbt') {
                        del_bt($_GET['id']);
                        echo "  <script>window.location.href ='index.php?act=sanpham&nd=editsp&idsp=" . $_GET['idsp'] . "'</script> ";
                    }

                }
                break;
            case 'binhluan':
                if (isset($_GET['nd'])) {
                    if ($_GET['nd'] == 'list') {
                        $ds = thongke_bl_sp();
                        include('binhluan/list.php');
                    }


                    if ($_GET['nd'] == 'chitiet') {
                        $dsbl = load_bl_sp($_GET['id_sp']);
                        include("binhluan/chitiet.php");
                    }

                    if ($_GET['nd'] == 'delbl') {
                        xoabl($_GET['idbl']);
                        $dsbl = load_bl_sp($_GET['id_sp']);
                        include("binhluan/chitiet.php");
                    }

                }
                break;
            case 'taikhoan':
                if (isset($_GET['nd'])) {
                    if ($_GET['nd'] == 'list') {
                        $dstk = loadAll_tk();
                        include('taikhoan/list.php');
                    }

                    if ($_GET['nd'] == 'khoa') {
                        khoa_tk($_GET['idtk']);
                        $dstk = loadAll_tk();
                        include('taikhoan/list.php');
                    }

                    if ($_GET['nd'] == 'bokhoa') {
                        bo_khoa_tk($_GET['idtk']);
                        $dstk = loadAll_tk();
                        include('taikhoan/list.php');
                    }

                    if ($_GET['nd'] == 'phanquyen') {
                        if (isset($_GET['idtk'])) {
                            $tk = load_one_tk($_GET['idtk']);
                        }
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $roles = $_POST['roles'];
                            $id_tk = $_POST['id_tk'];

                            update_phanquyen($id_tk, $roles);
                            header('location: index.php?act=taikhoan&nd=list');
                        }

                        include "taikhoan/phanquyen.php";
                    }

                }
                break;
            case 'bienthe':
                if (isset($_GET['nd'])) {
                    if ($_GET['nd'] == 'list') {
                        $dsmau = loadAll_mau();
                        $dssize = loadAll_size();
                        include('bienthe/list.php');
                    }

                    if ($_GET['nd'] == 'add') {
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $id_thuoc_tinh = $_POST["id_thuoc_tinh"];
                            $name = $_POST["name"];
                            $ma_mau = $_POST["ma_mau"];

                            if ($id_thuoc_tinh == 0) {
                                $isthongbao = 0;
                                $thongbao = 'Không thành công';
                            } else {
                                $isthongbao = 1;
                                if ($id_thuoc_tinh == 2) {
                                    $ma_mau = '';
                                }
                                add_bt($name, $ma_mau, $id_thuoc_tinh);
                                $thongbao = ' Thêm thành công';
                            }

                        }
                        include('bienthe/add.php');
                    }


                    if ($_GET['nd'] == 'edit') {
                        if (isset($_GET['idbt'])) {
                            $bienthe = load_one_bt($_GET['idbt']);
                        }
                        include('bienthe/edit.php');
                    }
                    if ($_GET['nd'] == 'update') {
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $id = $_POST["id"];
                            $name = $_POST["name"];
                            $ma_mau = $_POST["ma_mau"];
                            update_bt($id, $ma_mau, $name);
                        }
                        $dsmau = loadAll_mau();
                        $dssize = loadAll_size();
                        include('bienthe/list.php');
                    }
                }
                break;
            case 'donhang':
                if (isset($_GET['nd'])) {
                    if ($_GET['nd'] == 'list') {
                        $list_detailbill = loadAll_detailbill();
                        include 'donhang/list.php';
                    }

                    if ($_GET['nd'] == 'chitiet') {
                        if (isset($_GET['id_ctbill']) && isset($_GET['trang_thai'])) {
                            $trang_thai = $_GET['trang_thai'];
                            $ds = loadone_bill($_GET['id_ctbill']);
                        }
                        include "donhang/chitietdonhang.php";
                    }

                    if ($_GET['nd'] == 'update') {
                        if (isset($_POST['xac']) && ($_POST['xac'])) {
                            $id = $_POST['id'];
                            update_trangthai($id, 1);
                        }
                        if (isset($_POST['giao']) && ($_POST['giao'])) {
                            $id = $_POST['id'];
                            update_trangthai($id, 2);
                        }
                        if (isset($_POST['huy']) && ($_POST['huy'])) {
                            $id = $_POST['id'];
                            update_trangthai($id, 4);
                        }
                        if (isset($_POST['thanhcong']) && ($_POST['thanhcong'])) {
                            $id = $_POST['id'];
                            update_trangthai($id, 3);
                        }
                        $list_detailbill = loadAll_detailbill();
                        include "donhang/list.php";
                    }
                }
                break;
            case "logout":
                dangxuat();
                header("location: ../index.php");
                // echo '<script>window.location.href = ../index.php</script>';
                break;
            case 'thongke':
                $data_nam = thongke_nam();
                $data_thang = thongke_thang();
                $data_tuan = thongke_tuan();
                $data_ngay = thongke_gio();
                // $listthongke = loadall_thongke();
                // $thongke = thongke_ngay();
                include "thongke/list1.php";
                break;
        }
    } else {
        $data_nam = thongke_nam();
        $sp_bn = top_sp_ban();
        include("include/home.php");
    }

    include("include/footer.php");
} else {
    header("location: ../index.php");
}

?>