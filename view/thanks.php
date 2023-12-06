<div class="page-section section section-padding">
    <div class="container">

        <!-- Checkout Form s-->

            <div class="row row-50 mbn-40">

                <h1 class="p-3" style="text-align: center">Cảm ơn bạn đã mua hàng bên chúng tôi!</h1>
                <div class="col-lg-7">
                    <div class="row">
                        <!-- Cart Total -->
                        <div class="col-12 mb-40">

                            <div class="checkout-cart-total">

                                <!-- <h4>Product <span>Total</span></h4> -->

                                

                                <p>User Name: <?= $kh['full_name']?></p>
                                <p>Phone:  <?= $kh['phone']?></p>
                                <p>Address:  <?= $kh['dia_chi']?></p>
                                <p>Email:  <?= $kh['email']?></p>
                                <p>Date:  <?= $kh['thoi_gian']?></p>
                                <p>Payment method:  <?= $kh['thanh_toan']?></p>

                                
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="row">
                        <!-- Cart Total -->
                        <div class="col-12 mb-40">


                            <div class="checkout-cart-total">

                                <h4>Product <span>Total</span></h4>

                                <ul>
                                    <?php
                                    $sumtotal = 0;
                                    foreach ($sp as $item) {
                                        if (!empty($item['color'])) {
                                            $size = load_one_bt($item['size']);
                                            $color = load_one_bt($item['mau']);
                                            echo '<li>' . $item['ten_sp'] . '  X  ' . $item['so_luong'] . '(color: ' . $color['name'] . ', size:  ' . $size['name'] . ') <span>$' . $item['price'] . '</span></li>';
                                        } else{
                                            echo '<li>' . $item['ten_sp'] . '  X  ' . $item['so_luong'] . ' <span>$' . $item['gia'] . '</span></li>';
                                        }
                                        $sumtotal += $item['so_luong'] * $item['gia'];
                                    } ?>
                                </ul>

                                <p>Sub Total <span>$
                                        <?= $sumtotal ?>
                                    </span></p>
                                <p>Shipping Fee <span>$00.00</span></p>

                                <h4>Grand Total <span>$
                                        <?= number_format($sumtotal, 0, ',', '.')  ?>
                                    </span></h4>
                                <input type="hidden" name="thanh_tien"
                                    value="<?= !empty($_SESSION['cart']) ? $_SESSION['resultTotal'] : 0 ?>">
                            </div>

                        </div>
                    </div>
                </div>

            </div>
 

    </div>
</div>