<div class="col-xl-3 col-lg-4 col-12 order-2 order-lg-1 mb-40">

    <div class="sidebar">
        <h4 class="sidebar-title">Danh mục</h4>
        <ul class="sidebar-list">
            <?php
            $dm_sidebar = thongke_sp_danhmuc();
            foreach ($dm_sidebar as $dm) { ?>
                <li><a href="?act=shop&nd=danhmuc&id_dm=<?= $dm['id_dm'] ?>">
                        <?= $dm['name_dm'] ?> <span class="num">
                            <?= $dm['Tong'] ?>
                        </span>
                    </a></li>
            <?php } ?>
            <!-- <li><a href="#">Pants <span class="num">09</span></a></li>
                            <li><a href="#">T-Shart <span class="num">05</span></a></li>
                            <li><a href="#">Tops <span class="num">03</span></a></li>
                            <li><a href="#">Kid's Clothes <span class="num">15</span></a></li>
                            <li><a href="#">Watch <span class="num">07</span></a></li>
                            <li><a href="#">Accessories <span class="num">02</span></a></li> -->
        </ul>
    </div>

    <div class="sidebar">
        <h4 class="sidebar-title">colors</h4>
        <ul class="sidebar-list">
            <?php
            $ds_mau = loadAll_mau();
            // var_dump($ds_mau);
            // die();
            foreach ($ds_mau as $mau) {
                
                $productId = array_column(load_sp_ma_mau($mau['id']), 'id_sp');
                
                echo '<li><a href="?act=shop&nd=mau&id_mau=' . $mau['id'] . '"><span class="color" style="background-color: ' . $mau['ma_mau'] . '"></span> ' . $mau['ten_gia_tri_tt'] . '<span class="num">'.count($productId).'</span></a></li>';
            }
            ?>

            <!-- <li><a href="#"><span class="color" style="background-color: #FF0000"></span> Red</a></li>
                            <li><a href="#"><span class="color" style="background-color: #0000FF"></span> Blue</a></li>
                            <li><a href="#"><span class="color" style="background-color: #28901D"></span> Green</a></li>
                            <li><a href="#"><span class="color" style="background-color: #FF6801"></span> Orange</a></li> -->
        </ul>
    </div>

    <div class="sidebar">
        <h4 class="sidebar-title">Popular Product</h4>
        <div class="sidebar-product-wrap">
            <?php 
            $i = 0;
            foreach($ds_popular as $sp){
                if($i == 2){
                    break;
                }
                 $hinh = $img_path . $sp['hinh_sp'];
                 $gia_new = $sp['gia'] - ($sp['gia'] * ($sp['giam_gia'] / 100));
                ?>
            <div class="sidebar-product">
                <a href="single-product.html" class="image"><img src="<?=$hinh?>"
                        alt="" style="width: 80px; height:95px"></a>
                <div class="content">
                    <a href="?act=spct&id_sp=<?=$sp['id_sp']?>" class="title"><?=$sp['ten_sp']?></a>
                    <span class="price">$<?=$gia_new ?><span class="old">$<?=$sp['gia'] ?></span></span>
                    <div class="ratting">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                </div>
            </div>
            <?php $i++; }?>
            <!-- <div class="sidebar-product">
                                <a href="single-product.html" class="image"><img src="public/assets/images/product/product-2.jpg" alt=""></a>
                                <div class="content">
                                    <a href="single-product.html" class="title">Jumpsuit Outfits</a>
                                    <span class="price">$09 <span class="old">$21</span></span>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-product">
                                <a href="single-product.html" class="image"><img src="public/assets/images/product/product-3.jpg" alt=""></a>
                                <div class="content">
                                    <a href="single-product.html" class="title">Smart Shirt</a>
                                    <span class="price">$18 <span class="old">$29</span></span>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </div> -->
        </div>
    </div>

    <div class="sidebar">
        <h3 class="sidebar-title">Price</h3>

        <div class="sidebar-price">
            <div id="price-range"></div>
            <!-- <p><span id="price-amount1"></span> - 
                                <span id="price-amount2"></span></p> -->
            <input type="text" id="price-amount" readonly>
        </div>
        <form action="?act=shop&nd=price" method="POST">
            <input type="hidden" id="getprice-amount1" name="price1">
            <input type="hidden" id="getprice-amount2" name="price2">
            <input type="submit" value="Search" class="btn btn-info">
        </form>
    </div>
    <!-- <div class="sidebar">
        <h3 class="sidebar-title">Tags</h3>
        <ul class="sidebar-tag">
            <li><a href="#">New</a></li>
            <li><a href="#">brand</a></li>
            <li><a href="#">black</a></li>
            <li><a href="#">white</a></li>
            <li><a href="#">chire</a></li>
            <li><a href="#">table</a></li>
            <li><a href="#">Lorem</a></li>
            <li><a href="#">ipsum</a></li>
            <li><a href="#">dolor</a></li>
            <li><a href="#">sit</a></li>
            <li><a href="#">amet</a></li>
        </ul>
    </div> -->

</div>