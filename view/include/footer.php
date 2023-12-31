<!-- Brand Section Start -->
<div class="brand-section section section-padding pt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="brand-slider">

                <div class="brand-item col">
                    <img src="assets/images/brands/brand-1.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="assets/images/brands/brand-2.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="assets/images/brands/brand-3.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="assets/images/brands/brand-4.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="assets/images/brands/brand-5.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="assets/images/brands/brand-6.png" alt="">
                </div>

            </div>
        </div>
    </div>
</div><!-- Brand Section End -->

<!-- Footer Top Section Start -->
<div class="footer-top-section section bg-theme-two-light section-padding">
    <div class="container">
        <div class="row mbn-40">

            <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                <h4 class="title">CONTACT US</h4>
                <p>You address will be here<br /> Lorem Ipsum text</p>
                <p><a href="tel:01234567890">01234 567 890</a><a href="tel:01234567891">01234 567 891</a></p>
                <p><a href="mailto:info@example.com">info@example.com</a><a href="#">www.example.com</a></p>
            </div>

            <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                <h4 class="title">PRODUCTS</h4>
                <ul>
                    <li><a href="#">New Arrivals</a></li>
                    <li><a href="#">Best Seller</a></li>
                    <li><a href="#">Trendy Items</a></li>
                    <li><a href="#">Best Deals</a></li>
                    <li><a href="#">On Sale Products</a></li>
                    <li><a href="#">Featured Products</a></li>
                </ul>
            </div>

            <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                <h4 class="title">INFORMATION</h4>
                <ul>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Payment Method</a></li>
                    <li><a href="#">Product Warranty</a></li>
                    <li><a href="#">Return Process</a></li>
                    <li><a href="#">Payment Security</a></li>
                </ul>
            </div>

            <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                <h4 class="title">NEWSLETTER</h4>
                <p>Subscribe our newsletter and get all update of our product</p>

                <form id="mc-form" class="mc-form footer-subscribe-form">
                    <input id="mc-email" autocomplete="off" placeholder="Enter your email here" name="EMAIL"
                        type="email">
                    <button id="mc-submit"><i class="fa fa-paper-plane-o"></i></button>
                </form>
                <!-- mailchimp-alerts Start -->
                <div class="mailchimp-alerts">
                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                </div><!-- mailchimp-alerts end -->

                <h5>FOLLOW US</h5>
                <p class="footer-social"><a href="#">Facebook</a> - <a href="#">Twitter</a> - <a href="#">Google+</a>
                </p>

            </div>

        </div>
    </div>
</div><!-- Footer Top Section End -->

<!-- Footer Bottom Section Start -->
<div class="footer-bottom-section section bg-theme-two pt-15 pb-15">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <p class="footer-copyright">© 2022 Jadusona. Made with <i class="fa fa-heart heart-icon"></i> By <a
                        target="_blank" href="https://hasthemes.com/">HasThemes</a></p>
            </div>
        </div>
    </div>
</div><!-- Footer Bottom Section End -->

</div>

<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="public/assets/js/vendor/jquery-3.6.0.min.js"></script>
<!-- Migrate JS -->
<script src="public/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<!-- Bootstrap JS -->
<script src="public/assets/js/bootstrap.bundle.min.js"></script>
<!-- Plugins JS -->
<script src="public/assets/js/plugins.js"></script>
<!-- Main JS -->
<script src="public/assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    let totalProduct = document.getElementById('totalProduct');

    function addToCart(id_sp, ten_sp, hinh_sp, gia_sp, mau, size, quantity) {
        // console.log(id_sp, ten_sp, hinh_sp, gia_sp);
        $.ajax({
            type: "POST",
            url: "./view/addToCart.php?act=addCart",
            data: {
                id: id_sp,
                name: ten_sp,
                image: hinh_sp,
                price: gia_sp,
                color: mau,
                size: size,
                quantity: quantity
            },
            success: function (response) {
                totalProduct.innerText = response;
                alert('bạn đã thêm sản phẩm thành công');
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    var btn_DH = document.querySelector('#btn_DH');

    btn_DH.onclick = function () {
        var id_sp = document.getElementById('id_sp').value;
        var ten_sp = document.getElementById('ten_sp').value;
        var price = document.getElementById('price').value;
        var hinh_sp = document.getElementById('hinh_sp').value;
        var size = document.getElementById('selectedSizeInput').value;
        var color = document.getElementById('selectedColorInput').value;
        var quantity = document.getElementById('quantity').value;
        addToCart(id_sp, ten_sp, hinh_sp, price, color, size, quantity);

    }
</script>
<script>
    const colors = document.querySelectorAll('.color');

    for (const color of colors) {
        color.onclick = function () {

            for (var i = 0; i < colors.length; i++) {
                colors[i].style.border = "none";
            }
            color.style.border = "2px solid";
            document.getElementById('selectedColorInput').value = color.value;
        }
    }

    const sizes = document.querySelectorAll('.size');

    const id_sp = document.getElementById('id_sp').value;
    for (const size of sizes) {
        size.onclick = function () {
            for (var i = 0; i < sizes.length; i++) {
                sizes[i].classList.remove('selected-size');
            }
            size.classList.add('selected-size');
            document.getElementById('selectedSizeInput').value = size.value;
            var color = document.getElementById('selectedColorInput').value
            var kc = document.getElementById('selectedSizeInput').value
            // console.log(color);
            $.ajax({
                type: 'POST',
                url: "./view/addToCart.php?act=checksize",
                data: {
                    mau: color,
                    kichco: kc,
                    productId: id_sp

                },
                success: function (response) {
                    if (response == '') {
                        
                    } else {
                        alert(response);
                        for (var i = 0; i < sizes.length; i++) {
                            sizes[i].classList.remove('selected-size');
                        }
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            })
        }
    }




</script>
</body>


<!-- Mirrored from htmldemo.net/jadusona/jadusona/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2023 08:02:34 GMT -->

</html>