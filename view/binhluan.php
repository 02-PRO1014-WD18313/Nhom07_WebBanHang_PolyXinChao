<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .review {
            margin-bottom: 20px;
        }

        .review .title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .review .name {
            font-style: italic;
            margin-bottom: 10px;
        }

        .review .content {
            margin-bottom: 10px;
        }
        .tab-content{
            width: 1300px;
        }
    </style>
</head>

<body>
    <div class="row px-xl-5">
                <div class="col">
                    <div class="bg-light p-30">
                        <div class="nav nav-tabs mb-4">
                            <!-- <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Mô tả</a> -->
                            <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Bình luận</a>
                        </div>
                        <div class="tab-content" >
                            <div class="box_search">
                                <form action="index.php?act=spct&idsp=<?=$id?>" method="POST">
                                    <input type="hidden" name="idpro" value="<?=$id?>">
                                    <input type="text" name="noidung">
                                    <input type="submit" name="guibinhluan" value="Gửi bình luận">
                                </form>
                            </div>
                            <?php foreach($binhluan as $value): ?>
                                <div class="review">
                                    <div><?php echo $value['user']; ?></div>
                                    <div class="name">(<?php echo date("d/m/Y", strtotime($value['ngaybinhluan'])); ?>)</div>
                                    <div class="content"><?php echo $value['noidung']; ?></div>
                                </div> 
                            <?php endforeach; ?>
     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>

