<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Cart</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="cart.html">Cart</a></li>
                </ul>

            </div>
        </div>
    </div>
</div><!-- Page Banner Section End -->

<!-- Page Section Start -->
<div class="page-section section section-padding">
    <div class="container">

        <form action="#" id="order">
            <div class="row mbn-40">
                <div class="col-12 mb-40">
                    <div class="cart-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">STT</th>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-price">Color</th>
                                    <th class="pro-price">Size</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($list_cart)) {
                                    $sumtotal = 0;
                                    foreach ($list_cart as $key => $cart) {
                                        extract($cart);
                                        $hinh = $img_path . $image;
                                        // $mau = load_one_bt($color);
                                        // $size = load_one_bt($size);
                                
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $key + 1 ?>
                                            </td>
                                            <td class="pro-thumbnail"><a href="#"><img src="<?= $hinh ?>" alt="" /></a></td>
                                            <td class="pro-title"><a href="#">
                                                    <?= $name ?>
                                                </a></td>
                                            <td class="pro-price"><span class="amount">$
                                                    <?= $price ?>
                                                </span></td>
                                            <td class="pro-color"><span class="amount">
                                                    <?php
                                                    if (!empty($color)) {
                                                        $mau = load_one_bt($color);
                                                        echo $mau['name'];

                                                    }
                                                    ?>
                                                </span></td>
                                            <td class="pro-size"><span class="amount">
                                                    <?php
                                                    if (!empty($size)) {
                                                        $size = load_one_bt($size);
                                                        echo $size['name'];

                                                    }
                                                    ?>
                                                </span></td>
                                            <td class="pro-quantity">
                                                <div class=""><input type="number" id="qty_<?= $id ?>" value="<?= $quantity ?>"
                                                        oninput="updateQty(<?= $id ?>, <?= $key ?>)" min="1"></div>
                                            </td>
                                            <td class="pro-subtotal">$
                                                <?= $price * $quantity ?>
                                            </td>
                                            <td class="pro-remove"><a onclick="removeFromCart(<?= $id ?>)">×</a></td>
                                        </tr>
                                        <?php
                                        $sumtotal += $price * $quantity;

                                        $_SESSION['resultTotal'] = $sumtotal;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-12 mb-40">
                    <div class="cart-buttons mb-30">
                        <input type="submit" value="Update Cart" />
                        <a href="?act=shop&nd=danhmuc">Continue Shopping</a>
                    </div>
                        <div class="cart-coupon">
                            <h4>Coupon</h4>
                            <p>Enter your coupon code if you have one.</p>
                            <div class="cuppon-form">
                                <input type="text" placeholder="Coupon code" name="coupon" />
                                <input type="submit" value="Apply Coupon" />
                            </div>
                        </div>
                </div>
                <div class="col-lg-4 col-md-5 col-12 mb-40">
                    <div class="cart-total fix">
                        <h3>Cart Totals</h3>
                        <table>
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td><span class="amount">$
                                            <?= !empty($list_cart)?$sumtotal:0 ?>
                                        </span></td>
                                </tr>
                                
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td>
                                        <strong><span class="amount">$
                                                <?= !empty($list_cart)? $_SESSION['resultTotal'] : 0 ?>
                                            </span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="proceed-to-checkout section mt-30">
                            <a href="?act=checkout">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div><!-- Page Section End -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function coupon() {
        var coupon = document.querySelector('#coupon').value;
        alert(coupon);
    }
    function updateQty(id, index) {
        let newQty = $('#qty_' + id).val();
        console.log(newQty);
        if (newQty <= 0) {
            newQty = 1;
        }

        $.ajax({
            type: 'POST',
            url: './view/addToCart.php?act=updateCart',
            data: {
                id: id,
                quantity: newQty
            },
            success: function (response) {
                $.post('view/tableCartOrder.php', function (data) {
                    $('#order').html(data);
                })
            },
            error: function (error) {
                console.log(error);
            }
        })
    }

    function removeFromCart(id) {
        if (confirm("bạn có chắc xóa sản phẩm này không?")) {
            $.ajax({
                type: 'POST',
                url: './view/addToCart.php?act=removeCart',
                data: {
                    id: id,

                },
                success: function (response) {
                    $.post('view/tableCartOrder.php', function (data) {
                        $('#order').html(data);
                    })
                },
                error: function (error) {
                    console.log(error);
                }
            })
        }
    }
</script>