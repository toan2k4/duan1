<?php 
    function load_one_coupon($code){
        $sql = "SELECT * FROM `coupon` WHERE code = 'toanNumberOne'";
        $coupon = pdo_query_one($sql);
        return $coupon['giam_gia'];
    }

?>