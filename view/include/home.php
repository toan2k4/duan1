<!-- Hero Section Start -->
<div class="hero-section section">

    <!-- Hero Slider Start -->
    <div class="hero-slider hero-slider-one fix">

        <!-- Hero Item Start -->
        <div class="hero-item" style="background-image: url(public/assets/images/hero/hero-1.jpg)">

            <!-- Hero Content -->
            <div class="hero-content">

                <h1>Get 35% off <br>Latest Baby Product</h1>
                <a href="#">SHOP NOW</a>

            </div>

        </div><!-- Hero Item End -->

        <!-- Hero Item Start -->
        <div class="hero-item" style="background-image: url(public/assets/images/hero/hero-2.jpg)">

            <!-- Hero Content -->
            <div class="hero-content">

                <h1>Get 35% off <br>Latest Baby Product</h1>
                <a href="#">SHOP NOW</a>

            </div>

        </div><!-- Hero Item End -->

    </div><!-- Hero Slider End -->

</div><!-- Hero Section End -->

<!-- Banner Section Start -->
<div class="banner-section section mt-40">
    <div class="container-fluid">
        <div class="row row-10 mbn-20">

            <div class="col-lg-4 col-md-6 col-12 mb-20">
                <div class="banner banner-1 content-left content-middle">

                    <a href="#" class="image"><img src="public/assets/images/banner/banner-1.jpg"
                            alt="Banner Image"></a>

                    <div class="content">
                        <h1>New Arrival <br>Baby’s Shoe <br>GET 30% OFF</h1>
                        <a href="#" data-hover="SHOP NOW">SHOP NOW</a>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-20">
                <a href="#" class="banner banner-2">

                    <img src="public/assets/images/banner/banner-2.jpg" alt="Banner Image">

                    <div class="content bg-theme-one">
                        <h1>New Toy’s for your Baby</h1>
                    </div>

                    <span class="banner-offer">25% off</span>

                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-20">
                <div class="banner banner-1 content-left content-top">

                    <a href="#" class="image"><img src="public/assets/images/banner/banner-3.jpg"
                            alt="Banner Image"></a>

                    <div class="content">
                        <h1>Trendy <br>Collections</h1>
                        <a href="#" data-hover="SHOP NOW">SHOP NOW</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div><!-- Banner Section End -->

<!-- Product Section Start -->
<div class="product-section section section-padding">
    <div class="container">

        <div class="row">
            <div class="section-title text-center col mb-30">
                <h1>Popular Products</h1>
                <p>All popular product find here</p>
            </div>
        </div>

        <div class="row mbn-40">
            <?php
            $j = 0;
            foreach ($ds_popular as $ds) {
                extract($ds);
                $gia_new = number_format(($ds['gia'] - ($ds['gia'] * ($ds['giam_gia'] / 100))), 1);
                $hinh = $img_path . $hinh_sp;
                if ($j == 8) {
                    break;
                }
                ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">

                    <div class="product-item">
                        <div class="product-inner">

                            <div class="image">
                                <img src="<?= $hinh ?>" alt="Image" style="width: 270px; height: 320px;">

                                <div class="image-overlay">
                                    <div class="action-buttons">
                                        <button data-id="<?= $id_sp?>"  onclick="addToCart(<?= $id_sp?>,'<?= $ten_sp?>','<?= $hinh_sp?>',<?= $gia_new?>,'<?= $mau = ''?>','<?= $size = ''?>',<?= $quantity = 1?>)">add to cart</button>
                                        <button>add to wishlist</button>
                                    </div>
                                </div>

                            </div>

                            <div class="content">

                                <div class="content-left">

                                    <h4 class="title"><a href="?act=spct&id_sp=<?= $id_sp ?>">
                                            <?= $ten_sp ?>
                                        </a></h4>

                                    <div class="ratting">
                                        <?php for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $danh_gia) {
                                                echo '<i class="fa fa-star"></i>';
                                            } else {
                                                echo '<i class="fa fa-star-o"></i>';
                                            }
                                        } ?>
                                        <!-- <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i> -->
                                    </div>

                                    <h5 class="size">Size:
                                        <?php
                                        $check = [];
                                        $spbt = load_one_spbt($id_sp);

                                        foreach ($spbt as $sp) {
                                            extract($sp);
                                            $size = load_one_bt($id_size);

                                            if (!in_array($size['id'], $check)) {
                                                echo '<span>' . $size['name'] . '</span>';
                                                $check[] = $size['id'];
                                            }

                                        }
                                        ?>
                                    </h5>
                                    <h5 class="color">Color:
                                        <?php
                                        $check = [];
                                        $spbt = load_one_spbt($id_sp);

                                        foreach ($spbt as $sp) {
                                            extract($sp);
                                            $mau = load_one_bt($id_color);

                                            if (!in_array($mau['id'], $check)) {
                                                echo '<span style="background-color: ' . $mau['ma_mau'] . '"></span>';
                                                $check[] = $mau['id'];
                                            }

                                        }
                                        ?>
                                    </h5>

                                </div>

                                <div class="content-right">
                                    <span class="price">$
                                        <?= $gia_new ?>
                                        <span class="old">$
                                            <?= $gia ?>
                                        </span>
                                    </span>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            <?php $j++; } ?>
            <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">

                <div class="product-item">
                    <div class="product-inner">

                        <div class="image">
                            <img src="public/assets/images/product/product-2.jpg" alt="Image">

                            <div class="image-overlay">
                                <div class="action-buttons">
                                    <button>add to cart</button>
                                    <button>add to wishlist</button>
                                </div>
                            </div>

                        </div>

                        <div class="content">

                            <div class="content-left">

                                <h4 class="title"><a href="single-product.html">Jumpsuit Outfits</a></h4>

                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>

                                <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span
                                        style="background-color: #0271bc"></span><span
                                        style="background-color: #efc87c"></span><span
                                        style="background-color: #00c183"></span></h5>

                            </div>

                            <div class="content-right">
                                <span class="price">$09</span>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            
            <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">

                <div class="product-item">
                    <div class="product-inner">

                        <div class="image">
                            <img src="public/assets/images/product/product-8.jpg" alt="Image">

                            <div class="image-overlay">
                                <div class="action-buttons">
                                    <button>add to cart</button>
                                    <button>add to wishlist</button>
                                </div>
                            </div>

                        </div>

                        <div class="content">

                            <div class="content-left">

                                <h4 class="title"><a href="single-product.html">Lattic Shirt</a></h4>

                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>

                                <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span
                                        style="background-color: #0271bc"></span><span
                                        style="background-color: #efc87c"></span><span
                                        style="background-color: #00c183"></span></h5>

                            </div>

                            <div class="content-right">
                                <span class="price">$08</span>
                            </div>

                        </div>

                    </div>
                </div>

            </div> -->

        </div>

    </div>
</div><!-- Product Section End -->

<!-- Banner Section Start -->
<div class="banner-section section section-padding pt-0 fix">
    <div class="row row-5 mbn-10">

        <div class="col-lg-4 col-md-6 col-12 mb-10">
            <div class="banner banner-3">

                <a href="#" class="image"><img src="public/assets/images/banner/banner-4.jpg" alt="Banner Image"></a>

                <div class="content" style="background-image: url(public/assets/images/banner/banner-3-shape.png)">
                    <h1>New Arrivals</h1>
                    <h2>Up to 35% off</h2>
                    <h4>2 - 5 Years</h4>
                </div>

                <a href="#" class="shop-link" data-hover="SHOP NOW">SHOP NOW</a>

            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-10">
            <div class="banner banner-4">

                <a href="#" class="image"><img src="public/assets/images/banner/banner-5.jpg" alt="Banner Image"></a>

                <div class="content">
                    <div class="content-inner">
                        <h1>Online Shopping</h1>
                        <h2>Flat 25% off <br>New Trend for 2022</h2>
                        <a href="#" data-hover="SHOP NOW">SHOP NOW</a>
                    </div>
                </div>


            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-10">
            <div class="banner banner-5">

                <a href="#" class="image"><img src="public/assets/images/banner/banner-6.jpg" alt="Banner Image"></a>

                <div class="content" style="background-image: url(public/assets/images/banner/banner-5-shape.png)">
                    <h1>Collection for <br>Baby Girl’s</h1>
                    <h2>Flat 25% off</h2>
                </div>

                <a href="#" class="shop-link" data-hover="SHOP NOW">SHOP NOW</a>

            </div>
        </div>

    </div>
</div><!-- Banner Section End -->

<!-- Product Section Start -->
<div class="product-section section section-padding pt-0">
    <div class="container">
        <div class="row mbn-40">

            <div class="col-lg-4 col-md-6 col-12 mb-40">

                <div class="row">
                    <div class="section-title text-start col mb-30">
                        <h1>Best Deal</h1>
                        <p>Exclusive deals for you</p>
                    </div>
                </div>

                <div class="best-deal-slider w-100">
                    <?php
                    $i = 0;
                    foreach ($ds_sp_sale as $sp) {
                        extract($sp);
                        $hinh = $img_path . $hinh_sp;
                        $gia_new = $gia - ($gia * ($giam_gia / 100));
                        if ($i == 2) {
                            break;
                        }
                        ?>
                        <div class="slide-item">
                            <div class="best-deal-product">

                                <div class="image"><img src="<?= $hinh ?>" alt="Image" style="width: 370px; height: 547px;">
                                </div>

                                <div class="content-top">

                                    <div class="content-top-left">
                                        <h4 class="title"><a href="#">
                                                <?= $ten_sp ?>
                                            </a></h4>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>

                                    <div class="content-top-right">
                                        <span class="price">
                                            <?= $gia_new ?> <span class="old">
                                                <?= $gia ?>
                                            </span>
                                        </span>
                                    </div>

                                </div>

                                <div class="content-bottom">
                                    <div class="countdown" data-countdown="2023/06/20"></div>
                                    <a href="?act=spct&id_sp=<?= $id_sp ?>" data-hover="SHOP NOW">SHOP NOW</a>
                                </div>

                            </div>
                        </div>
                        <?php $i++;
                    } ?>
                    <!-- <div class="slide-item">
                        <div class="best-deal-product">

                            <div class="image"><img src="public/assets/images/product/best-deal-2.jpg" alt="Image">
                            </div>

                            <div class="content-top">

                                <div class="content-top-left">
                                    <h4 class="title"><a href="#">Kelly Shirt Set</a></h4>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>

                                <div class="content-top-right">
                                    <span class="price">$09 <span class="old">$25</span></span>
                                </div>

                            </div>

                            <div class="content-bottom">
                                <div class="countdown" data-countdown="2023/06/20"></div>
                                <a href="#" data-hover="SHOP NOW">SHOP NOW</a>
                            </div>

                        </div>
                    </div> -->

                </div>

            </div>

            <div class="col-lg-8 col-md-6 col-12 ps-3 ps-lg-4 ps-xl-5 mb-40">

                <div class="row">
                    <div class="section-title text-start col mb-30">
                        <h1>On Sale Products</h1>
                        <p>All featured product find here</p>
                    </div>
                </div>

                <div class="small-product-slider row row-7 mbn-40">
                    <?php
                    foreach ($ds_sp_sale as $sp) {
                        extract($sp);
                        $hinh = $img_path . $hinh_sp;
                        $gia_new = $gia - ($gia * ($giam_gia / 100));
                        ?>
                        <div class="col mb-40">

                            <div class="on-sale-product">
                                <a href="single-product.html" class="image"><img src="<?= $hinh ?>" alt="Image"
                                        style="width: 174px; height: 174px;"></a>
                                <div class="content text-center">
                                    <h4 class="title"><a href="?act=spct&id_sp=<?= $id_sp ?>">
                                            <?= $ten_sp ?>
                                        </a></h4>
                                    <span class="price">$
                                        <?= $gia_new ?> <span class="old">$
                                            <?= $gia ?>
                                        </span>
                                    </span>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                    <!-- <div class="col mb-40">

                        <div class="on-sale-product">
                            <a href="single-product.html" class="image"><img
                                    src="public/assets/images/product/on-sale-2.jpg" alt="Image"></a>
                            <div class="content text-center">
                                <h4 class="title"><a href="single-product.html">Kelly Shirt Set</a></h4>
                                <span class="price">$08 <span class="old">$25</span></span>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                        </div>

                    </div> -->



                </div>

            </div>

        </div>
    </div>
</div><!-- Product Section End -->

<!-- Feature Section Start -->
<div class="feature-section bg-theme-two section section-padding fix"
    style="background-image: url(public/assets/images/pattern/pattern-dot.png);">
    <div class="container">
        <div class="feature-wrap row justify-content-between mbn-30">

            <div class="col-md-4 col-12 mb-30">
                <div class="feature-item text-center">

                    <div class="icon"><img src="public/assets/images/feature/feature-1.png" alt="Image"></div>
                    <div class="content">
                        <h3>Free Shipping</h3>
                        <p>Start from $100</p>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-12 mb-30">
                <div class="feature-item text-center">

                    <div class="icon"><img src="public/assets/images/feature/feature-2.png" alt="Image"></div>
                    <div class="content">
                        <h3>Money Back Guarantee</h3>
                        <p>Back within 25 days</p>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-12 mb-30">
                <div class="feature-item text-center">

                    <div class="icon"><img src="public/assets/images/feature/feature-3.png" alt="Image"></div>
                    <div class="content">
                        <h3>Secure Payment</h3>
                        <p>Payment Security</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div><!-- Feature Section End -->

