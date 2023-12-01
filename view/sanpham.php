<div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">SẢN PHẨM:<span class="bg-secondary pr-3"><?=$tendm?></span></h2>
        <div class="row px-xl-5">
        <?php
         $i=0;
         foreach ($tk as $sp) {
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
            <form action="index.php?act=addtocart" method="post">
                <div class="product-item bg-light mb-4">       
                    <div class="product-img position-relative overflow-hidden">
                        <img class="view/img-fluid w-100" src="'.$anhsp.'" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><button type="submit" value="btn" name="addtocart"><i class="fa fa-shopping-cart"></i></button></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h5 text-decoration-none text-truncate"href="'.$linksp.'">'.$name.'</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>'.number_format($price, 0, ".", ".").'đ</h5><h6 class="text-muted ml-2"><del>'.number_format($price * 1.1, 0, ".", ".").'đ</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="far fa-star text-primary mr-1"></small>
                            <small>(299)</small>
                        </div>
                            <input type="hidden" name="id" value="'.$id.'">
                            <input type="hidden" name="name" value="'.$name.'">
                            <input type="hidden" name="img" value="'.$img.'">
                            <input type="hidden" name="price" value="'.$price.'">
                            

                    </div>
                </div>
                </form>
            </div>';
            $i+1;
            }
            ?>
    </div>