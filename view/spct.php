

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="?act=index">Trang chủ</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
   
            <?php extract(($onesp));?>
                <?php
                    $anhsp=$img_path.$img;
                    echo ' 
                    <form action="index.php?act=addtocart" method="post">
                    <div class="container-fluid pb-5">
                        <div class="row px-xl-5">
                            <div class="col-lg-5 mb-30">
                                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner bg-light">
                                        <div class="carousel-item active">

                                            <img class="w-100 h-100" src="'.$anhsp.'" alt="Image">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="w-100 h-100" src="'.$anhsp.'" alt="Image">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="w-100 h-100" src="'.$anhsp.'" alt="Image">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="w-100 h-100" src="'.$anhsp.'" alt="Image">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7 h-auto mb-30">
                            <div class="h-100 bg-light p-30">
                                <h3>'.$name.'</h3>
                                <div class="d-flex mb-3">
                                    <div class="text-primary mr-2">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star-half-alt"></small>
                                        <small class="far fa-star"></small>
                                    </div>
                                    <small class="pt-1">(99 Reviews)</small>
                                </div>
                                <h3 class="font-weight-semi-bold mb-4">'.number_format($price, 0, ".", ".").'VND</h3>
                                <p class="mb-4">'.$description.'</p>
                                <div class="d-flex mb-3">
                                <strong class="text-dark mr-3">Sizes:</strong>
                                <?php
                                ?>
                                
                                <form>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="size-3" name="size">
                                        <label class="custom-control-label" for="size-3">'.$name_size.'</label>
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex mb-4">
                                <strong class="text-dark mr-3">Topping:</strong>
                                <form>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                                            <label class="custom-control-label" for="color-1"><?=$id_tp?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="color-2" name="color">
                                        <label class="custom-control-label" for="color-2">trân châu trắng</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="color-3" name="color">
                                        <label class="custom-control-label" for="color-3">trân châu đen</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="color-4" name="color">
                                        <label class="custom-control-label" for="color-4">trân châu body(new)</label>
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex align-items-center mb-4 pt-2">
                                <div class="input-group quantity mr-3" style="width: 130px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="'.$id.'">
                                <input type="hidden" name="name" value="'.$name.'">
                                <input type="hidden" name="img" value="'.$img.'">
                                <input type="hidden" name="price" value="'.$price.'">
                                <button type="submit" value="btn" name="addtocart" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ</button>
                            </div>
                            <div class="d-flex pt-2">
                                <strong class="text-dark mr-2">Share on:</strong>
                                <div class="d-inline-flex">
                                    <a class="text-dark px-2" href="">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a class="text-dark px-2" href="">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="text-dark px-2" href="">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a class="text-dark px-2" href="">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </div>    
                            </div>
                        </div>
                    </div>
                    
    </form>
    ';
    include "view/binhluan.php";
?>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script>
            $(document).ready(function(){
                $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?=$id?>});
            });
        </script>
        <div class="row" id="binhluan"></div> -->

        <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản phẩm liên quan</span></h2>
        <div class="row px-xl-5">
            <?php
            foreach ($sp_cung_loai as $sp_cung_loai) {
                extract($sp_cung_loai);
                $linksp="index.php?act=spct&idsp=".$id;
                echo ' <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="view/img-fluid w-100" src="view/img/ts1.jpg" alt="">
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="'.$linksp.'">'.$name.'</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small>(99)</small>
                                    </div>
                                </div>
                            </div>
                        </div>';
                
                
            }
            ?>
        </div>


        
</body>

</html>