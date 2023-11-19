<?php
include("../model/pdo.php");
include("../model/danhmuc.php");
include("../model/sanpham.php");
include("../model/thongke.php");
include("../global.php");
include("include/header.php");

$dsdm = loadAll_dm();
$dssp = loadAll_sp();
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
                    include('sanpham/list.php');
                }

                if ($_GET['nd'] == 'addsp') {
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $ten_sp = $_POST["ten_sp"];
                        $giam_gia = $_POST["giam_gia"];
                        $gia = $_POST["gia"];
                        $mo_ta = $_POST["mo_ta"];
                        $ngay_nhap = $_POST["ngay_nhap"];
                        $gioi_tinh = $_POST["gioi_tinh"];
                        $id_dm = $_POST["danh_muc"];

                        $file = $_FILES["hinh_sp"];
                        $hinh_sp = $file["name"];
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
                        $thongbao = ' Thêm thành công';

                    }
                    include('sanpham/add.php');
                }

                if ($_GET['nd'] == 'editsp') {
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
                        $hinh_sp= $_POST["hinh_sp"];
                        $file = $_FILES["hinh_sp"];
                        if($file['size'] > 0){
                            $hinh_sp = $file["name"];
                            move_uploaded_file($file["tmp_name"], "../" . $img_path . $hinh_sp);
                        }
                         update_sp($id_sp, $ten_sp, $hinh_sp, $giam_gia, $gia, $mo_ta, $ngay_nhap, $gioi_tinh, $id_dm);


                        if (isset($_FILES['hinh_phu'])) {
                            if (!empty($_FILES['hinh_phu'])) {
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
            }
            break;

    }
} else {
    include("include/home.php");
}

include("include/footer.php");

?>