<div class="main-menu-box">
    <div class="container">
        <div class="row">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs center-nav-tabs" role="tablist">
                <li role="presentation" class="active col-sm-2" style="padding: 0;width: 18%;">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">全部商品分类</a>
                </li>
                <li role="presentation" class="text-center col-sm-2">
                    <a href="<?php echo base_url()?>" aria-controls="profile" role="tab" data-toggle="tab">东元商城</a>
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
<input type="hidden" value="<?php echo sizeof($categories);?>" id="array_length">
<div class="tab-content-box">
    <div class="container">
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="row">
                <div class="col-sm-2" style="width: 18%;padding-left: 0;padding-right: 0">
                    <div class="side-bar">
                        <div class="nav-box hnavq" id="nav">
                            <div class="wrapper clf relative">
                                <div class="menu relative fl">
                                    <div class="submenu">
                                        <?php
                                        foreach ($categories as $rows) {
                                            ?>
                                            <div class="submenu-item">
                                                <div class="submenu-title">
                                                    <div class="category_item">
                                                        <a href="#" target="_blank" onclick="searchList(this, <?php echo $rows['id'];?>)">
                                                            <?php echo $rows['name'];?>
                                                        </a>
                                                    </div>
                                                    <i class="fa fa-fw fa-angle-right"></i>
                                                </div>
                                                <div class="catetwo">
                                                    <div class="category_row">
                                                        <?php
                                                        foreach ($rows['children'] as $row2s) {
                                                            ?>
                                                            <div class="category_column">
                                                                <div class="category_column_head">
                                                                    <a href="#" target="_blank" onclick="searchList(this, <?php echo $row2s['id'];?>)">
                                                                        <?php echo $row2s['name'];?>
                                                                        <i class="fa fa-fw fa-angle-right"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="cateory_item_list">
                                                                    <?php
                                                                    foreach ($row2s['children'] as $row3s) {
                                                                        ?>
                                                                        <span>
                                                                            <span style="padding: 0 3%;">|</span>
                                                                            <a href="#" target="_blank" onclick="searchList(this, <?php echo $row3s['id'];?>)">
                                                                                <?php echo $row3s['name'];?>
                                                                            </a>
                                                                        </span>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <div class="submenu-item last"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-7" style="padding-left:0;width: 63%;">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php
                            foreach ($ads as $key=>$item) {
                                ?>
                                <li data-target="#carousel-example-generic"
                                    class="<?php if ($key == 0) echo 'active'; ?>" data-slide-to="<?php echo $key; ?>">

                                </li>
                                <?php
                            }
                            ?>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                            foreach ($ads as $key=>$item) {
                                $ads_url = './public/uploads/ads/' . $item['image'];
                                ?>
                                <div class="item <?php if ($key == 0) echo 'active';?>">
                                    <img class="carousel-img" src="<?php echo $ads_url;?>">
                                    <div class="carousel-caption">

                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                        <a class="left carousel-control" href="#carousel-example-generic" role="button"
                           data-slide="prev">
                            <span class="fa fa-1-5x fa-angle-left left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button"
                           data-slide="next">
                            <span class="fa fa-1-5x fa-angle-right right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-2 side-bar right" style="width:19%;">
                    <div class="login-box text-center">
                        <p class="login-slogen">
                            Hi, 欢迎登录到东元商城</p>
                        <div class="login-btn-box">
                            <? if ($userdata == null){
                                ?>
                                <a href="<?php echo base_url('Page/login') ?>" class="btn btn-primary">商户登录</a>
                                <a href="<?php echo base_url('Page/register') ?>" class="btn btn-default">免费注册</a>
                                <?php
                            }else {
                                ?>
                                <a href="<?php echo base_url('Page/mypage') ?>"
                                   class="btn btn-default login_true">会员中心</a>
                                <a href="#" onclick="logout()" class="btn btn-default login_true">退出登录</a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="resources-box">
                        <p class="res-title">东元资讯</p>
                    </div>
                    <div class="resources-box content">
                        <ul class="resources-menu">
                            <li>
                                <a href="#">
                                    <p>2018年获得优质品牌奖年获得优质品牌奖</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>2018年获得优质品牌奖年获得优质品牌奖</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>2018年获得优质品牌奖年获得优质品牌奖</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>2018年获得优质品牌奖年获得优质品牌奖</p>
                                </a>
                            </li>
                        </ul>
                        <div class="resources-footer">
                            <img class="res-sub-img" src="public/front/img/res/pho.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="text-center hot-brands-box">
        <!-- <p class="position"></p> -->
        <p class="text-center hot-brands-title">热门品牌</p>
        <div class="container">
            <ul class="hot-brands-ul">
                <?php
                foreach ($brand as $item){
                    ?>
                    <li class="text-center">

                        <div class="v-center">
                            <img class="brand-img" src="<?php echo $item['image'];?>">
                        </div>

                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<div class="pro-box">
    <div class="container">
        <div class="row">
            <div class="production-box">
                <?php
                foreach ($categories as $key=>$item) {
                    $idx = 1;
                    ?>
                    <div class="production-header">
                        <a href="#"><span class="floor-num"><?php echo ($key++) + 1;?>F</span><?php echo $item['name'];?></a>
                        <a href="#" class="view-more" onclick="searchList(this, <?php echo $item['id']?>)">查看更多<i
                                    class="fa-fw fa-2x fa fa-angle-right"></i> </a>
                    </div>
                    <ul class="production-ul" style="height: 270px;">
                        <li class="product-slider-parent">
                            <div class="product-slider<?php echo $key;?> product-slider prev homepage">
                                <i class="fa-fw fa-3x fa fa-angle-left left"></i>
                            </div>
                        </li>
                        <li style="width:calc(100% - 86px);">
                            <div class="swiper-container swiper-container<?php echo $key;?>">
                                <div class="swiper-wrapper" id="products<?php echo $key;?>">
                                    <?php
                                    foreach ($item['goods_data'] as $item2s) {
                                        ?>
                                        <div class="swiper-slide">

                                            <a class="sk_item_lk " href="#"
                                               onclick="goods_detail(this, <?php echo $item2s['id']; ?>)">

                                                <div class="text-center products-item">
                                                    <img class="product-img"
                                                         src="<?php echo $item2s['images'][0]; ?>">
                                                </div>

                                                <p><?php echo $item2s['name'] ?></p>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </div>
                                <div class="swiper-scrollbar swiper-scrollbar<?php echo $key;?>"></div>
                            </div>
                        </li>
                        <li class="product-slider-parent">
                            <div class="next product-slider homepage product-slider<?php echo $key;?>">
                                <i class="fa-fw fa-3x fa fa-angle-right right"></i>
                                <!-- <a class="product-slider-item right" href="javascript:;">
                                </a> -->
                            </div>
                        </li>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!--<div class="domination"></div>-->

<script type="text/javascript">
    function goods_detail(obj, idx) {
        location.href =_server_url + 'page/productinfo?productId=' + idx;
    }
</script>