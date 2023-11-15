<?php 
    include("include/header.php");

    if(isset($_GET['act']) && ($_GET['act'] != '')){
        $act = $_GET['act'];
        switch ($act) {
            case '':
        }
    }else{
        include("include/home.php");
    }

    include("include/footer.php");

?>