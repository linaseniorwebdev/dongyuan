<link rel="stylesheet" href="<?php echo base_url();?>public/front/css/brand.css">
<div class="main-menu-box">
    <div class="container">
        <div class="row">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs center-nav-tabs" role="tablist">
                <li role="presentation" class="active col-sm-2" style="padding: 0;width: 18%;">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">全部商品分类</a>
                </li>
                <li role="presentation" class="text-center col-sm-2">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">东元商城</a>
                </li>
                <li role="presentation" class="text-center col-sm-2">
                    <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">线上交易</a>
                </li>
                <li role="presentation" class="text-center col-sm-2">
                    <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">低价促销</a>
                </li>
                <li role="presentation" class="text-center col-sm-2">
                    <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">其他其他</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="brand-box">
    <div class="container">
        <div class="tm-area">
            <div class="tm-brand-title">
                <div class="tm-brand-title-placeholder">&nbsp;</div>
                <div class="tm-brand-title-in">全部品牌</div>
            </div>
        </div>
        <div class="row">
            <div class="tm-row tm-brand-list">

                <?php
                foreach ($brands as $item) {
                    ?>
                    <div class="col-sm-2">
                        <a href="#" onclick="goods_by_brand(<?php echo $item['id'];?>)">
                            <p class="tm-p1">
                                <img src="<?php echo $item['image'] ?>" width="180"
                                     height="116">
                            </p>
                            <p class="tm-p2"><?php echo $item['name'];?></p>
                        </a>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>

    </div>
</div>
