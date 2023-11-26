

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

                                <div
                                    class="pro-large-img mb-10 fix easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                    <a href="public/assets/images/product/product-zoom-1.jpg">
                                        <img src="public/assets/images/product/product-big-1.jpg" alt="" />
                                    </a>
                                </div>
                                <!-- Single Product Thumbnail Slider -->
                                <ul id="pro-thumb-img" class="pro-thumb-img">
                                    <li><a href="public/assets/images/product/product-zoom-1.jpg"
                                            data-standard="public/assets/images/product/product-big-1.jpg"><img
                                                src="public/assets/images/product/product-1.jpg" alt="" /></a></li>
                                    <li><a href="public/assets/images/product/product-zoom-2.jpg"
                                            data-standard="public/assets/images/product/product-big-2.jpg"><img
                                                src="public/assets/images/product/product-2.jpg" alt="" /></a></li>
                                    <li><a href="public/assets/images/product/product-zoom-3.jpg"
                                            data-standard="public/assets/images/product/product-big-3.jpg"><img
                                                src="public/assets/images/product/product-3.jpg" alt="" /></a></li>
                                    <li><a href="public/assets/images/product/product-zoom-4.jpg"
                                            data-standard="public/assets/images/product/product-big-4.jpg"><img
                                                src="public/assets/images/product/product-4.jpg" alt="" /></a></li>
                                    <li><a href="public/assets/images/product/product-zoom-5.jpg"
                                            data-standard="public/assets/images/product/product-big-5.jpg"><img
                                                src="public/assets/images/product/product-5.jpg" alt="" /></a></li>
                                </ul>
                            </div>

                            <div class="col-lg-6 col-12 mb-40">
                                <div class="single-product-content">

                                    <div class="head">
                                        <div class="head-left">

                                            <h3 class="title">Tmart Baby Dress</h3>

                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>

                                        </div>

                                        <div class="head-right">
                                            <span class="price">$25</span>
                                        </div>
                                    </div>

                                    <div class="description">
                                        <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                                            quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui
                                            dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
                                            numquam eius modi tempora inform</p>
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
                                                <button style="background-color: #ff502e"></button>
                                                <button style="background-color: #fff600"></button>
                                                <button style="background-color: #1b2436"></button>
                                            </div>
                                        </div>

                                        <div class="colors">
                                            <h5>Size:</h5>
                                            <div class="size-options">
                                                <button class="size" value="1">S</button>
                                                <button class="size" value="2">M</button>
                                                <button class="size" value="3">L</button>
                                                <button class="size" value="4">XL</button>
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
                                    </script>
                                    <div class="actions">
                                        <form action="">
                                            <input type="hidden" name="size" id="selectedSizeInput">
                                            <button><i class="ti-shopping-cart"></i><span>ADD TO CART</span></button>
                                        </form>
                                        <button class="box" data-tooltip="Compare"><i
                                                class="ti-control-shuffle"></i></button>
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
                                    <a href="#">Be the first to write your review!</a>
                                    <!-- bình luận  -->
                                    <section style="background-color: #eee;">
                                        <div class="container my-5 py-5">
                                          <div class="row d-flex justify-content-center">
                                            <div class="col-md-12 col-lg-10 col-xl-8">
                                              <div class="card">
                                                <div class="card-body">
                                                  <div class="d-flex flex-start align-items-center">
                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                      src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                                                      height="60" />
                                                    <div>
                                                      <h6 class="fw-bold text-primary mb-1">Lily Coleman</h6>
                                                      <p class="text-muted small mb-0">
                                                        Shared publicly - Jan 2020
                                                      </p>
                                                      <div class="ratting">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    </div>
                                                  </div>
                                      
                                                  <p class="mt-3 mb-4 pb-2">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip consequat.
                                                  </p>
                                      
                                                  <div class="small d-flex justify-content-start">
                                                  
                                                    <a href="#!" class="d-flex align-items-center me-3 btn btn-dark">
                                                      <!-- <i class="far fa-comment-dots me-2"></i> -->
                                                      <p class="mb-0">Rely</p>
                                                    </a>
                                                    
                                                  </div>
                                                </div>
                                                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                                  <div class="d-flex flex-start w-100">
                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                      src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                                                      height="40" />
                                                    <div class="form-outline w-100">
                                                      <textarea class="form-control" id="textAreaExample" rows="4"
                                                        style="background: #fff;"></textarea>
                                                      <label class="form-label" for="textAreaExample">Message</label>
                                                    </div>
                                                  </div>
                                                  <div class="float-end mt-2 pt-1">
                                                    <button type="button" class="btn btn-primary btn-sm">Post comment</button>
                                                    <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                                                  </div>
                                                </div>
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

                            <div class="slick-slide">

                                <div class="product-item">
                                    <div class="product-inner">

                                        <div class="image">
                                            <img src="public/assets/images/product/product-1.jpg" alt="">

                                            <div class="image-overlay">
                                                <div class="action-buttons">
                                                    <button>add to cart</button>
                                                    <button>add to wishlist</button>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="content">

                                            <div class="content-left">

                                                <h4 class="title"><a href="single-product.html">Tmart Baby Dress</a>
                                                </h4>

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
                                                <h5 class="color">Color: <span
                                                        style="background-color: #ffb2b0"></span><span
                                                        style="background-color: #0271bc"></span><span
                                                        style="background-color: #efc87c"></span><span
                                                        style="background-color: #00c183"></span></h5>

                                            </div>

                                            <div class="content-right">
                                                <span class="price">$25</span>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="slick-slide">

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
                                                <h5 class="color">Color: <span
                                                        style="background-color: #ffb2b0"></span><span
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
                                                <h5 class="color">Color: <span
                                                        style="background-color: #ffb2b0"></span><span
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
                                                <h5 class="color">Color: <span
                                                        style="background-color: #ffb2b0"></span><span
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
                                                <h5 class="color">Color: <span
                                                        style="background-color: #ffb2b0"></span><span
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

                            </div>

                        </div>

                    </div>

                    <?php 
                        include ("view/include/sidebar.php");
                    ?>

                </div>
            </div>
        </div><!-- Page Section End -->

