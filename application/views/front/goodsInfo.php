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

<div class="filter-box">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li>首页</li>
                    <li><?php echo $category_one['name'];?></li>
                    <?php
                    if (isset($category_two)) {
                        echo '<li>'.$category_two['name'].'</li>';
                    }
                    if (isset($category_three)) {
                        echo '<li>'.$category_three['name'].'</li>';
                    }
                    ?>
                    <li class="active"><?php echo $product_info['name'];?></li>

                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="goods-info-box" onselectstart="return false;">
                    <div class="thumbnail-box goods-info text-center">
                        <div class="main-pic-box">
                            <img id="main-pic" class="main-pic"
                                 src="<?php echo "public/uploads/goods/".$product_info['thumbnail'];?>" alt="">
                        </div>
                        <div class="goods-gallery">
                            <ul class="production-ul">
                                <li class="product-slider-parent">
                                    <div class="goods product-slider prev">
                                        <i class="fa-fw fa fa-angle-left left"></i>
                                    </div>
                                </li>
                                <li style="width:calc(100% - 46px);">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <?php
                                            foreach ($gallery as $item) {
                                                $gallery_img = "public/uploads/gallery/".$item['image'];
                                                ?>
                                                <div class="swiper-slide">
                                                    <div class="text-center product-item">
                                                        <img class="product-img" src="<?php echo $gallery_img;?>">
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="swiper-scrollbar"></div>
                                    </div>
                                </li>
                                <li class="product-slider-parent">
                                    <div class="next product-slider goods">
                                        <i class="fa-fw fa fa-angle-right right"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="goods-intruduction-box goods-info">
                        <div class="goods-info-header goods-info-div-9">
                            <p class="title"><?php echo $product_info['name'];?></p>
                            <p class="remarks">1、Cr-V材质，热处理，表面电镀 2：双色手柄，握持舒适。 2：双色手柄</p>
                        </div>
                        <div class="goods-info-price goods-info-div-10">
                            <ul>
                                <li class="tag-name-li"><span class="tag-name-first">价</span>格：</li>
                                <li class="tag-content-li price-li"><span class="small">￥</span><span
                                        class="price"><?php echo $product_info['price'];?></span></li>
                            </ul>
                        </div>
                        <div class="goods-info-config goods-info-div-9">
                            <ul class="goods-info-config-ul">
                                <li class="goods-info-config-li">
                                    <ul>
                                        <li class="tag-name-li"><span class="tag-name-first">品</span>牌：</li>
                                        <li class="tag-content-li"><span class="tag-name-last"><?php echo $brand['name'];?></span></li>
                                    </ul>
                                </li>
                                <li class="goods-info-config-li">
                                    <ul>
                                        <li class="tag-name-li"><span class="tag-name-first">配</span>送：</li>
                                        <li class="tag-content-li"><span class="tag-name-last">东风斯达康</span></li>
                                    </ul>
                                </li>
                                <li class="goods-info-config-li">
                                    <ul>
                                        <li class="tag-name-li"><span class="tag-name-first">型</span>号：</li>
                                        <li class="tag-content-li"><span class="tag-name-last"><?=(isset($product_info['serial_no']) ? $product_info['serial_no'] : '默认')?></span></li>
                                    </ul>
                                </li>
                                <li class="goods-info-config-li">
                                    <ul>
                                        <li class="tag-name-li">起订量：</li>
                                        <li class="tag-content-li goods-info-count">
                                                    <span class="tag-name-last">
                                                        ≥15
                                                        <div class="input-group text-right">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-default btn-cut" type="button"><i
                                                                        class="fa fa-minus"></i></button>
                                                            </span>
                                                            <input type="text" data-price="169" data-max='999'
                                                                   data-min="15" class="form-control input-numbox"
                                                                   oninput="countAmount(this)" placeholder="0" value="15">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-default btn-add" type="button"><i
                                                                        class="fa fa-plus"></i></button>
                                                            </span>
                                                        </div>
                                                        (库存有货，下单后立即发货)
                                                    </span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="goods-info-config-li">
                                    <ul>
                                        <li class="tag-name-li" style="color: #737373;"><span
                                                class="tag-name-first">规</span>格：</li>
                                        <li class="tag-content-li">
                                            <span class="goods-specification active">7米</span>
                                            <span class="goods-specification">8米</span>
                                            <span class="goods-specification">9米</span>
                                            <span class="goods-specification">9米</span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="goods-info-footer goods-info-div-9">
                            <button type="button" class="btn btn-default" onclick="add_order();">立即购买</button>
                            <button type="button" class="btn btn-primary" onclick="add_cart();"><i
                                    class="fa fa-fw fa-shopping-cart"></i>加入购物车</button>
                        </div>

                    </div>
                    <div class="extra-goods-box goods-info">
                        <div class="extra-goods-info-box">
                            <p class="text-center extra-goods-title">相关商品推荐</p>
                            <div class="extra-goods text-center">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="public/front/img/product/product_4.png" alt="">
                                            <p class="text-center extra-goods-name">气缸</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="public/front/img/product/product_4.png" alt="">
                                            <p class="text-center extra-goods-name">气缸</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p class="change">换一批</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="domination"></div>
<div class="domination"></div>
<div class="more-goods-box">
    <div class="container">
        <div class="more-goods-header">
            <ul id="more-goods-tabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#table-1" aria-controls="table-1" role="tab" data-toggle="tab">更多规格产品</a>
                </li>
                <li role="presentation">
                    <a href="#table-2" aria-controls="table-2" role="tab" data-toggle="tab">生产厂家链接</a>
                </li>
            </ul>
        </div>
        <div class="more-goods-body tab-content">
            <div role="tabpanel" class="tab-pane active" id="table-1">
                <table class="table table-striped table-hover table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">订货号</th>
                        <th class="text-center">型号</th>
                        <th class="text-center">规格</th>
                        <th class="text-center">价格</th>
                        <th class="text-center">数量</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        foreach ($more_goods as $item) {
                            ?>
                            <td class="text-center"><?php echo $item['order_num']?></td>
                            <td class="text-center"><?php echo $item['serial_no']?></td>
                            <td class="text-center"><?php echo $item['alternative']?></td>
                            <td class="text-center"><?php echo $item['price']?></td>
                            <td class="text-center opration">
                                <div class="opration-item">
                                    <div class="input-group text-right">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-cut" type="button"><i
                                                            class="fa fa-minus"></i></button>
                                            </span>
                                        <input type="text" data-price="169" data-max='999' data-min="15"
                                               class="form-control input-numbox" oninput="countAmount(this)"
                                               placeholder="0" value="15">
                                        <span class="input-group-btn">
                                                <button class="btn btn-default btn-add" type="button"><i
                                                            class="fa fa-plus"></i></button>
                                            </span>
                                    </div>
                                </div>
                                <div class="opration-item">
                                    <button type="button" class="btn btn-primary btn-xs"><i
                                                class="fa fa-fw fa-shopping-cart"></i></button>
                                </div>
                            </td>

                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="table-2">
                <table class="table table-striped table-hover table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">生产厂家</th>
                        <th class="text-center">生产厂家链接</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center company">杭州东元商城有限公司</td>
                        <td class="text-center ">
                            <a class="hlink"
                               href="http://b.toolmall.com/profile/newquiryorder/?type=look&id=B01000751606">http://b.toolmall.com/profile/newquiryorder/?type=look&id=B01000751606</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center company">杭州东元商城有限公司</td>
                        <td class="text-center ">
                            <a class="hlink"
                               href="http://b.toolmall.com/profile/newquiryorder/?type=look&id=B01000751606">http://b.toolmall.com/profile/newquiryorder/?type=look&id=B01000751606</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center company">杭州东元商城有限公司</td>
                        <td class="text-center ">
                            <a class="hlink"
                               href="http://b.toolmall.com/profile/newquiryorder/?type=look&id=B01000751606">http://b.toolmall.com/profile/newquiryorder/?type=look&id=B01000751606</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center company">杭州东元商城有限公司</td>
                        <td class="text-center ">
                            <a class="hlink"
                               href="http://b.toolmall.com/profile/newquiryorder/?type=look&id=B01000751606">http://b.toolmall.com/profile/newquiryorder/?type=look&id=B01000751606</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center company">杭州东元商城有限公司</td>
                        <td class="text-center ">
                            <a class="hlink"
                               href="http://b.toolmall.com/profile/newquiryorder/?type=look&id=B01000751606">http://b.toolmall.com/profile/newquiryorder/?type=look&id=B01000751606</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center company">杭州东元商城有限公司</td>
                        <td class="text-center ">
                            <a class="hlink"
                               href="http://b.toolmall.com/profile/newquiryorder/?type=look&id=B01000751606">http://b.toolmall.com/profile/newquiryorder/?type=look&id=B01000751606</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="domination"></div>

<script type="text/javascript">

    function add_order() {
        $.post(_server_url + 'Data/addOrder',
            {},
            function (data) {
                var val = JSON.parse(data);
                if(val.status == 'SUCCESS'){
                    location.href = url_admin_path + 'Main_Controller';
                }else if(val.status == 'BLOCKED'){
                    $('p.msg-blocked').show();
                }else{
                    $('p.msg-wrong').show();
                }
            }
        );
    }
    
    function add_cart() {
        
    }
</script>