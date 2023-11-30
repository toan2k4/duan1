<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(public/assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Single Product Left Sidebar</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="single-product.html">Single Product Left Sidebar</a></li>
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
                <div class="row row-20">

                    <div class="col-lg-6 col-12 mb-40">

                        <div class="pro-large-img mb-10 fix easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                            <a href="<?= $hinh ?>">
                                <img src="<?= $hinh ?>" alt="" style="width: 411px; height: 411px;" />
                            </a>
                        </div>
                        <!-- Single Product Thumbnail Slider -->
                        <ul id="pro-thumb-img" class="pro-thumb-img">

                            <?php
                            foreach ($list_hp as $hinh_phu) {
                                $path_hp = $img_path . $hinh_phu['hinh_anh'];
                                echo '<li><a href="' . $path_hp . '" data-standard="' . $path_hp . '">
                                    <img src="' . $path_hp . '" style="width: 96px; height: 114px;" alt="" /></a></li>';
                            }
                            ?>

                            <!-- <li><a href="public/assets/images/product/product-zoom-2.jpg"
                                    data-standard="public/assets/images/product/product-big-2.jpg"><img
                                        src="public/assets/images/product/product-2.jpg"  alt="" /></a></li>
                            <li><a href="public/assets/images/product/product-zoom-3.jpg"
                                    data-standard="public/assets/images/product/product-big-3.jpg"><img
                                        src="public/assets/images/product/product-3.jpg" alt="" /></a></li>
                            <li><a href="public/assets/images/product/product-zoom-4.jpg"
                                    data-standard="public/assets/images/product/product-big-4.jpg"><img
                                        src="public/assets/images/product/product-4.jpg" alt="" /></a></li>
                            <li><a href="public/assets/images/product/product-zoom-5.jpg"
                                    data-standard="public/assets/images/product/product-big-5.jpg"><img
                                        src="public/assets/images/product/product-5.jpg" alt="" /></a></li> -->
                        </ul>
                    </div>

                    <div class="col-lg-6 col-12 mb-40">
                        <div class="single-product-content">

                            <div class="head">
                                <div class="head-left">

                                    <h3 class="title">
                                        <?= $sp['ten_sp'] ?>
                                    </h3>

                                    <div class="ratting">
                                        <?php for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $sp['danh_gia']) {
                                                echo '<i class="fa fa-star"></i>';
                                            } else {
                                                echo '<i class="fa fa-star-o"></i>';
                                            }
                                        } ?>
                                    </div>

                                </div>

                                <div class="head-right">
                                    <span class="price">$
                                        <?= $gia_new ?> <span class="old_spct text-decoration-line-through">$
                                            <?= $sp['gia'] ?>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="description">
                                <p>
                                    <?= $sp['mo_ta'] ?>
                                </p>
                            </div>

                            <span class="availability">Availability: <span>In Stock</span></span>

                            <div class="quantity-colors d-flex flex-column">

                                <div class="quantity">
                                    <h5>Quantity:</h5>
                                    <div class="pro-qty"><input type="text" value="1"></div>
                                </div>

                                <div class="colors">
                                    <h5>Color:</h5>
                                    <div class="color-options">
                                        <?php
                                        $check = [];
                                        $spbt = load_one_spbt($sp['id_sp']);

                                        foreach ($spbt as $sp) {
                                            extract($sp);
                                            $mau = load_one_bt($id_color);
                                            if (!in_array($mau['id'], $check)) {
                                                echo '<button class="color" value="' . $mau['id'] . '" style="background-color:' . $mau['ma_mau'] . '"></button>';
                                                $check[] = $mau['id'];
                                            }

                                        }
                                        ?>

                                    </div>
                                </div>

                                <div class="colors">
                                    <h5>Size:</h5>
                                    <div class="size-options">
                                        <?php
                                        $check = [];
                                        $spbt = load_one_spbt($sp['id_sp']);

                                        foreach ($spbt as $sp) {
                                            extract($sp);
                                            $size = load_one_bt($id_size);
                                            if (!in_array($size['id'], $check)) {
                                                echo '<button class="size me-2" value="' . $size['id'] . '">' . $size['name'] . '</button>';
                                                $check[] = $size['id'];
                                            }

                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <script>
                                const sizes = document.querySelectorAll('.size');


                                for (const size of sizes) {
                                    size.onclick = function () {

                                        for (var i = 0; i < sizes.length; i++) {
                                            sizes[i].classList.remove('selected-size');
                                        }
                                        size.classList.add('selected-size');
                                        document.getElementById('selectedSizeInput').value = size.value;
                                    }
                                }
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



                            </script>
                            <div class="actions">
                                <form action="">
                                    <input type="hidden" name="size" id="selectedSizeInput">
                                    <input type="hidden" name="color" id="selectedColorInput">
                                    <input type="hidden" name="quantity" id="quantity">
                                    <button><i class="ti-shopping-cart"></i><span>ADD TO CART</span></button>
                                </form>
                                <button class="box" data-tooltip="Compare"><i class="ti-control-shuffle"></i></button>
                                <button class="box" data-tooltip="Wishlist"><i class="ti-heart"></i></button>

                            </div>

                            <!-- <div class="tags">

                                    <h5>Tags:</h5>
                                    <a href="#">Electronic</a>
                                    <a href="#">Smartphone</a>
                                    <a href="#">Phone</a>
                                    <a href="#">Charger</a>
                                    <a href="#">Powerbank</a>

                                </div> -->

                            <!-- <div class="share">

                                    <h5>Share: </h5>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>

                                </div> -->

                        </div>
                    </div>

                </div>

                <div class="row mb-50 ">
                    <!-- Nav tabs -->
                    <div class="col-12">
                        <ul class="pro-info-tab-list section nav">
                            <li><a class="active" href="#more-info" data-bs-toggle="tab">More info</a></li>
                            <!-- <li><a href="#data-sheet" data-bs-toggle="tab">Data sheet</a></li> -->
                            <li><a href="#reviews" data-bs-toggle="tab">Reviews</a></li>
                        </ul>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content col-12">
                        <div class="pro-info-tab tab-pane active" id="more-info">
                            <p>Fashion has been creating well-designed collections since 2010. The brand offers
                                feminine designs delivering stylish separates and statement dresses which have
                                since evolved into a full ready-to-wear collection in which every item is a
                                vital part of a woman's wardrobe. The result? Cool, easy, chic looks with
                                youthful elegance and unmistakable signature style. All the beautiful pieces are
                                made in Italy and manufactured with the greatest attention. Now Fashion extends
                                to a range of accessories including shoes, hats, belts and more!</p>
                        </div>
                        <!-- <div class="pro-info-tab tab-pane" id="data-sheet">
                                    <table class="table-data-sheet">
                                        <tbody>
                                            <tr class="odd">
                                                <td>Compositions</td>
                                                <td>Cotton</td>
                                            </tr>
                                            <tr class="even">
                                                <td>Styles</td>
                                                <td>Casual</td>
                                            </tr>
                                            <tr class="odd">
                                                <td>Properties</td>
                                                <td>Short Sleeve</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> -->
                        <div class="pro-info-tab tab-pane" id="reviews">

                            <!-- bình luận  -->
                            <section style="background-color: #eee;">
                                <div class="container my-5 py-5">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12 col-lg-10 col-xl-8">
                                            <div class="card">
                                                <?php foreach ($ds_bl as $bl) {
                                                    extract($bl);
                                                    $anh = $img_path . $image_tk;
                                                    ?>
                                                    <div class="card-body">
                                                        <div class="d-flex flex-start align-items-center">
                                                            <img class="rounded-circle shadow-1-strong me-3"
                                                                src="<?= $anh ?>" alt="avatar" width="60" height="60" />
                                                            <div>
                                                                <h6 class="fw-bold text-primary mb-1">
                                                                    <?= $name_tk ?>
                                                                </h6>
                                                                <p class="text-muted small mb-0">
                                                                    Shared publicly /
                                                                    <?= $ngaybinhluan ?>
                                                                </p>
                                                                <div class="ratting">
                                                                    <?php for ($i = 1; $i <= 5; $i++) {
                                                                        if ($i <= $danh_gia) {
                                                                            echo '<i class="fa fa-star"></i>';
                                                                        } else {
                                                                            echo '<i class="fa fa-star-o"></i>';
                                                                        }
                                                                    } ?>


                                                                </div>
                                                            </div>
                                                        </div>

                                                        <p class="mt-3 mb-4 pb-2">
                                                            <?= $noi_dung ?>
                                                        </p>

                                                        <div class="small d-flex justify-content-start">

                                                            <a href="#!"
                                                                class="d-flex align-items-center me-3 btn btn-dark">
                                                                <!-- <i class="far fa-comment-dots me-2"></i> -->
                                                                Reply
                                                            </a>

                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($_SESSION['user'])) { ?>
                                                    <div class="card-footer py-3 border-0"
                                                        style="background-color: #f8f9fa;">
                                                        <form action="?act=binhluan" method="post">
                                                            <div class="d-flex flex-start w-100">
                                                                <img class="rounded-circle shadow-1-strong me-3"
                                                                    src="public/uploads/<?= $_SESSION['user']['image_tk'] ?>"
                                                                    alt="avatar" width="40" height="40" />
                                                                <div class="d-flex flex-column w-100">
                                                                    <div class="form-outline w-100">
                                                                        <label class="form-label" for="danhgia">Đánh
                                                                            giá</label>
                                                                        <input type="hidden" name="danhgia" id="danhgia">
                                                                        <div class="">
                                                                            <i class="fa fa-star-o ratting-send"
                                                                                data='1'></i>
                                                                            <i class="fa fa-star-o ratting-send"
                                                                                data='2'></i>
                                                                            <i class="fa fa-star-o ratting-send"
                                                                                data='3'></i>
                                                                            <i class="fa fa-star-o ratting-send"
                                                                                data='4'></i>
                                                                            <i class="fa fa-star-o ratting-send"
                                                                                data='5'></i>
                                                                        </div>
                                                                    </div>
                                                                    <script>
                                                                        const stars = document.querySelectorAll('.ratting-send');
                                                                        const getdatadanhgia = document.querySelector('#danhgia');

                                                                        for (const star of stars) {
                                                                            star.onclick = function () {
                                                                                const clickedData = parseInt(star.getAttribute('data'));
                                                                                getdatadanhgia.value = clickedData;
                                                                                // Loop through all stars
                                                                                for (let a = 0; a < stars.length; a++) {
                                                                                    const currentStar = stars[a];
                                                                                    const currentData = parseInt(currentStar.getAttribute('data'));

                                                                                    // Toggle classes based on the comparison with clickedData
                                                                                    if (currentData <= clickedData) {
                                                                                        currentStar.classList.remove('fa-star-o');
                                                                                        currentStar.classList.add('fa-star');
                                                                                    } else {
                                                                                        currentStar.classList.remove('fa-star');
                                                                                        currentStar.classList.add('fa-star-o');
                                                                                    }
                                                                                }
                                                                            };
                                                                        }
                                                                    </script>

                                                                </div>

                                                            </div>
                                                            <div class="float-end mt-2 pt-1 w-100">

                                                                <div class="form-outline w-100">
                                                                    <input type="hidden" name="id_sp"
                                                                        value="<?= $sp['id_sp'] ?>">
                                                                    <input type="hidden" name="id_tk"
                                                                        value="<?= $_SESSION['user']['id_tk'] ?>">
                                                                    <label class="form-label"
                                                                        for="textAreaExample">Message</label>
                                                                    <textarea class="form-control" id="textAreaExample"
                                                                        name="noidung" rows="4"
                                                                        style="background: #fff;"></textarea>
                                                                </div>
                                                                <div class="mt-3"><button type="submit"
                                                                        class="btn btn-primary btn-sm">Post
                                                                        comment</button>
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary btn-sm">Cancel</button>
                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="alert alert-warning" role="alert">
                                                        Bạn cần đăng nhập trước khi bình luận
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

                <div class="section-title text-start mb-30">
                    <h1>Related Product</h1>
                </div>

                <div class="related-product-slider related-product-slider-2 slick-space p-0">
                    <?php foreach ($list_splq as $sp) {
                        $path_hlq = $img_path . $sp['hinh_sp'];
                        ?>
                        <div class="slick-slide">

                            <div class="product-item">
                                <div class="product-inner">

                                    <div class="image">
                                        <img src="<?= $path_hlq ?>" alt="Image" style="width: 270px; height: 320px;">

                                        <div class="image-overlay">
                                            <div class="action-buttons">
                                                <button>add to cart</button>
                                                <button>add to wishlist</button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="content">

                                        <div class="content-left">

                                            <h4 class="title"><a href="?act=spct&id_sp=<?= $sp['id_sp'] ?>">
                                                    <?= $sp['ten_sp'] ?>
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
                                                $spbt = load_one_spbt($sp['id_sp']);

                                                foreach ($spbt as $bt) {
                                                    extract($bt);
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
                                                $spbt = load_one_spbt($sp['id_sp']);

                                                foreach ($spbt as $bt) {
                                                    extract($bt);
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
                                                <?= $sp['gia'] ?>
                                            </span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    <?php } ?>
                    <!-- <div class="slick-slide">

                        <div class="product-item">
                            <div class="product-inner">

                                <div class="image">
                                    <img src="public/assets/images/product/product-2.jpg" alt="">

                                    <div class="image-overlay">
                                        <div class="action-buttons">
                                            <button>add to cart</button>
                                            <button>add to wishlist</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="content">

                                    <div class="content-left">

                                        <h4 class="title"><a href="single-product.html">Jumpsuit Outfits</a>
                                        </h4>

                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

                                        <h5 class="size">Size:
                                            <span>S</span><span>M</span><span>L</span><span>XL</span>
                                        </h5>
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

                    <div class="slick-slide">

                        <div class="product-item">
                            <div class="product-inner">

                                <div class="image">
                                    <img src="public/assets/images/product/product-3.jpg" alt="">

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

                                        <h5 class="size">Size:
                                            <span>S</span><span>M</span><span>L</span><span>XL</span>
                                        </h5>
                                        <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span
                                                style="background-color: #0271bc"></span><span
                                                style="background-color: #efc87c"></span><span
                                                style="background-color: #00c183"></span></h5>

                                    </div>

                                    <div class="content-right">
                                        <span class="price">$18</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="slick-slide">

                        <div class="product-item">
                            <div class="product-inner">

                                <div class="image">
                                    <img src="public/assets/images/product/product-4.jpg" alt="">

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

                                        <h5 class="size">Size:
                                            <span>S</span><span>M</span><span>L</span><span>XL</span>
                                        </h5>
                                        <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span
                                                style="background-color: #0271bc"></span><span
                                                style="background-color: #efc87c"></span><span
                                                style="background-color: #00c183"></span></h5>

                                    </div>

                                    <div class="content-right">
                                        <span class="price">$15</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="slick-slide">

                        <div class="product-item">
                            <div class="product-inner">

                                <div class="image">
                                    <img src="public/assets/images/product/product-5.jpg" alt="">

                                    <div class="image-overlay">
                                        <div class="action-buttons">
                                            <button>add to cart</button>
                                            <button>add to wishlist</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="content">

                                    <div class="content-left">

                                        <h4 class="title"><a href="single-product.html"> Bowknot Bodysuit</a>
                                        </h4>

                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>

                                        <h5 class="size">Size:
                                            <span>S</span><span>M</span><span>L</span><span>XL</span>
                                        </h5>
                                        <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span
                                                style="background-color: #0271bc"></span><span
                                                style="background-color: #efc87c"></span><span
                                                style="background-color: #00c183"></span></h5>

                                    </div>

                                    <div class="content-right">
                                        <span class="price">$12</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div> -->

                </div>

            </div>

            <?php
            include("view/include/sidebar.php");
            ?>

        </div>
    </div>
</div><!-- Page Section End -->