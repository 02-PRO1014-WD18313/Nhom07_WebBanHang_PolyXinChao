<div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">SẢN PHẨM:<span class="bg-secondary pr-3"></span></h2>
        <div class="row px-xl-5">
        <?php
         $i=0;
         foreach ($sptu30_50 as $sp) {
            extract($sp);
            $linksp="index.php?act=spct&idsp=".$id;
            $anhsp=$img_path.$img;
            if(($i==2)||($i==5)||($i==8 || ($i == 11))){
               $mr="";
            }else{
               $mr="mr";
            }
            echo '
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1 '.$mr.'">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="view/img-fluid w-100" src="'.$anhsp.'" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="'.$linksp.'"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h5 text-decoration-none text-truncate"href="'.$linksp.'">'.$name.'</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>'.number_format($price, 0, ".", ".").'VND</h5><h6 class="text-muted ml-2"><del>'.number_format($price, 0, ".", ".").'VND</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="far fa-star text-primary mr-1"></small>
                            <small class="far fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>';
            $i+1;
            }
            ?>
    </div>