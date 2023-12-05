<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Shop Left Sidebar</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                </ul>

            </div>
        </div>
    </div>
</div><!-- Page Banner Section End -->

<!-- Page Section Start -->
<div class="page-section section section-padding">
    <div class="container">
        <div class="row row-30 mbn-40">

            <div class="col-xl-9 col-lg-8 col-12 order-1 order-lg-2 mb-40">
                <div class="row">

                    <div class="col-12">
                        <div class="product-show">
                            <h4>Show:</h4>
                            <select class="nice-select">
                                <option>8</option>
                                <option>12</option>
                                <option>16</option>
                                <option>20</option>
                            </select>
                        </div>
                        <div class="product-short">
                            <h4>Short by:</h4>
                            <select class="nice-select">
                                <option>Name Ascending</option>
                                <option>Name Descending</option>
                                <option>Date Ascending</option>
                                <option>Date Descending</option>
                                <option>Price Ascending</option>
                                <option>Price Descending</option>
                            </select>
                        </div>
                    </div>

                    <?php
                    $i = 0;
                    foreach ($ds_sp as $ds) {
                        extract($ds);
                        $hinh = $img_path . $hinh_sp;
                        $gia_new = number_format(($ds['gia'] - ($ds['gia'] * ($ds['giam_gia'] / 100))),1);
                        
                        ?>
                        <div class="col-xl-4 col-md-6 col-12 mb-40">

                            <div class="product-item">
                                <div class="product-inner">

                                    <div class="image">
                                        <img src="<?= $hinh ?>" alt="Image" style="width: 270px; height: 320px;">

                                        <div class="image-overlay">
                                            <div class="action-buttons">
                                                <button data-id="<?= $id_sp?>"  onclick="addToCart(<?= $id_sp?>,'<?= $ten_sp?>','<?= $hinh_sp?>',<?= $gia_new?>)">add to cart</button>
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
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
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
                                                <span class="old">$<?=$gia?></span>
                                            </span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <?php $i++;
                    } ?>

                    <!-- <div class="col-xl-4 col-md-6 col-12 mb-40">

                            <div class="product-item">
                                <div class="product-inner">

                                    <div class="image">
                                        <img src="assets/images/product/product-2.jpg" alt="">

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
                                            <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                        </div>

                                        <div class="content-right">
                                            <span class="price">$09</span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-40">

                            <div class="product-item">
                                <div class="product-inner">

                                    <div class="image">
                                        <img src="assets/images/product/product-3.jpg" alt="">

                                        <div class="image-overlay">
                                            <div class="action-buttons">
                                                <button>add to cart</button>
                                                <button>add to wishlist</button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="content">

                                        <div class="content-left">

                                            <h4 class="title"><a href="single-product.html">Smart Shirt</a></h4>

                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>

                                            <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                            <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                        </div>

                                        <div class="content-right">
                                            <span class="price">$18</span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-40">

                            <div class="product-item">
                                <div class="product-inner">

                                    <div class="image">
                                        <img src="assets/images/product/product-4.jpg" alt="">

                                        <div class="image-overlay">
                                            <div class="action-buttons">
                                                <button>add to cart</button>
                                                <button>add to wishlist</button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="content">

                                        <div class="content-left">

                                            <h4 class="title"><a href="single-product.html">Kids Shoe</a></h4>

                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>

                                            <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                            <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                        </div>

                                        <div class="content-right">
                                            <span class="price">$15</span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-40">

                            <div class="product-item">
                                <div class="product-inner">

                                    <div class="image">
                                        <img src="assets/images/product/product-5.jpg" alt="">

                                        <div class="image-overlay">
                                            <div class="action-buttons">
                                                <button>add to cart</button>
                                                <button>add to wishlist</button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="content">

                                        <div class="content-left">

                                            <h4 class="title"><a href="single-product.html"> Bowknot Bodysuit</a></h4>

                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>

                                            <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                            <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                        </div>

                                        <div class="content-right">
                                            <span class="price">$12</span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-40">

                            <div class="product-item">
                                <div class="product-inner">

                                    <div class="image">
                                        <img src="assets/images/product/product-6.jpg" alt="">

                                        <div class="image-overlay">
                                            <div class="action-buttons">
                                                <button>add to cart</button>
                                                <button>add to wishlist</button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="content">

                                        <div class="content-left">

                                            <h4 class="title"><a href="single-product.html">Striped T-Shirt</a></h4>

                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>

                                            <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                            <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                        </div>

                                        <div class="content-right">
                                            <span class="price">$12</span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-40">

                            <div class="product-item">
                                <div class="product-inner">

                                    <div class="image">
                                        <img src="assets/images/product/product-7.jpg" alt="">

                                        <div class="image-overlay">
                                            <div class="action-buttons">
                                                <button>add to cart</button>
                                                <button>add to wishlist</button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="content">

                                        <div class="content-left">

                                            <h4 class="title"><a href="single-product.html">Kislen Jak Tops</a></h4>

                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>

                                            <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                            <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                        </div>

                                        <div class="content-right">
                                            <span class="price">$29</span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-40">

                            <div class="product-item">
                                <div class="product-inner">

                                    <div class="image">
                                        <img src="assets/images/product/product-8.jpg" alt="">

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
                                            <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                        </div>

                                        <div class="content-right">
                                            <span class="price">$08</span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-md-6 col-12 mb-40">

                            <div class="product-item">
                                <div class="product-inner">

                                    <div class="image">
                                        <img src="assets/images/product/product-9.jpg" alt="">

                                        <div class="image-overlay">
                                            <div class="action-buttons">
                                                <button>add to cart</button>
                                                <button>add to wishlist</button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="content">

                                        <div class="content-left">

                                            <h4 class="title"><a href="single-product.html">Skily Girld Dress</a></h4>

                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>

                                            <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                            <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                        </div>

                                        <div class="content-right">
                                            <span class="price">$19 <span class="old">$35</span></span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div> -->

                    <!-- <div class="col-12">
                        <ul class="page-pagination">
                            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div> -->

                </div>
            </div>

            <?php
            include("view/include/sidebar.php");
            ?>

        </div>
    </div>
</div><!-- Page Section End -->