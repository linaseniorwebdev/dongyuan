<link rel="stylesheet" href="<?php echo base_url();?>public/front/css/goods.css">

<style>
    table thead {
        background: #F7F7F7;
        border: 1px solid #E3E3E3;
    }
</style>
<input type="hidden" id="user_check" value="<?php echo $userdata;?>">
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
                    <li><a href="<?php echo base_url();?>"> 首页 </a></li>
                    <li onclick="searchList(<?php echo $category_one['id']; ?>)"><?php echo $category_one['name']; ?></li>
                    <?php if (isset($product_info['level_two'])) {
                        ?>
                        <li onclick="searchList(<?php echo $category_two['id']; ?>)">
                            <?php echo $category_two['name'];?>
                        </li>
                        <?php
                    }
                    if (isset($product_info['level_three'])) {
                        ?>
                        <li onclick="searchList(<?php echo $category_three['id']; ?>)">
                            <?php echo $category_three['name']; ?>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="active" onclick="goods_detail(this, <?php echo $product_info['id'];?>)"><?php echo $product_info['name']; ?></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="goods-info-box" onselectstart="return false;">
                    <div class="thumbnail-box goods-info text-center">
                        <div class="main-pic-box">
                            <img id="main-pic" class="main-pic" src="<?php echo $product_info['images'][0]; ?>"
                                 alt="">
                        </div>
                        <div>
                            <ul class="production-ul">
                                <li class="product-slider-parent">
                                    <div class="product-slider prev goods-prev">
                                        <i class="fa-fw fa fa-angle-left left"></i>
                                    </div>
                                </li>
                                <li style="width:calc(100% - 46px);">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <?php
                                            foreach ($product_info['images'] as $item) {

                                                ?>
                                                <div class="swiper-slide">
                                                    <div class="text-center products-item">
                                                        <img class="product-img" src="<?php echo $item; ?>">
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
                                    <div class="next product-slider goods-next">
                                        <i class="fa-fw fa fa-angle-right right"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="goods-intruduction-box goods-info">
                        <div class="goods-info-header goods-info-div-9">
                            <p class="title" id="goods_name"><?php echo $product_info['name'];?></p>
                            <p class="remarks" id="goods_brief"><?php echo $product_info['brief'];?></p>
                        </div>
                        <div class="goods-info-price goods-info-div-10">
                            <ul>
                                <li class="tag-name-li">
                                    <span class="tag-name-first">价</span>格：</li>
                                <li class="tag-content-li price-li">
                                    <span class="small">￥</span>
                                    <span class="price" id="goods_price"><?php echo $product_info['branches'][0]['price'];?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="goods-info-config goods-info-div-9">
                            <ul class="goods-info-config-ul">
                                <li class="goods-info-config-li">
                                    <ul>
                                        <li class="tag-name-li">
                                            <span class="tag-name-first">品</span>牌：</li>
                                        <li class="tag-content-li">
                                            <span class="tag-name-last" id="goods_brand"><?php echo $brand['name'];?></span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="goods-info-config-li">
                                    <ul>
                                        <li class="tag-name-li">
                                            <span class="tag-name-first">配</span>送：</li>
                                        <li class="tag-content-li">
                                            <select style="width: 200px;" id="goods_ship">
                                                <?php
                                                foreach ($place as $key=>$item) {
                                                    ?>
                                                    <option value="<?php echo $item['id'][$key]?>"><?php echo $item['prov']['name'];?>&nbsp;&nbsp;<?php echo $item['city']['name'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </li>
                                    </ul>
                                </li>
                                <li class="goods-info-config-li">
                                    <ul>
                                        <li class="tag-name-li">
                                            <span class="tag-name-first">型</span>号：</li>
                                        <li class="tag-content-li">
                                                    <span class="tag-name-last" id="goods_type">
                                                        <?php echo $product_info['serial_no']; ?>
                                                    </span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="goods-info-config-li">
                                    <ul>
                                        <li class="tag-name-li">起订量：</li>
                                        <li class="tag-content-li goods-info-count">
                                                    <span class="tag-name-last">
                                                        ≥15
                                                        <div class="opration-item">
                                                            <div class="input-group text-right">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-default btn-cut"
                                                                            type="button"><i
                                                                                class="fa fa-minus"></i></button>
                                                                </span>
                                                                <input type="text" id="goods_amount" data-price="<?php echo $product_info['branches'][0]['price'];?>"
                                                                       data-max='999'
                                                                       data-min="15" class="form-control input-numbox"
                                                                       oninput="countAmount(this)" placeholder="0"
                                                                       value="15">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-default btn-add"
                                                                            type="button"><i
                                                                                class="fa fa-plus"></i></button>
                                                                </span>
                                                            </div>
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
                                            <?php
                                            foreach ($product_info['branches'] as $key=>$item) {
                                                ?>
                                                <span id="goods_scale" class="goods-specification <?php if ($key == 0) echo 'active';?>">
                                                            <?php echo $item['model'];?>
                                                        </span>
                                                <?php
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="goods-info-footer goods-info-div-9">
                            <button type="button" class="btn btn-default">立即购买</button>
                            <button type="button" class="btn btn-primary" onclick="addToCart()"><i
                                        class="fa fa-fw fa-shopping-cart"></i>加入购物车</button>
                        </div>

                    </div>
                    <div class="extra-goods-box goods-info">
                        <div class="extra-goods-info-box">
                            <p class="text-center extra-goods-title">相关商品推荐</p>
                            <div class="extra-goods text-center">
                                <ul>
                                    <?php if (!$related) {?>
                                        <div>没有相关产品推荐</div>
                                    <?php } else {?>
                                        <li onclick="goods_detail(this, <?php echo $related[0]['id'];?>)">
                                            <a href="#">
                                                <img src="<?php echo $related[0]['images'][0]?>" alt="">
                                                <p class="text-center extra-goods-name"><?php echo $related[0]['name']?></p>
                                            </a>
                                        </li>
                                        <li onclick="goods_detail(this, <?php echo $related[1]['id'];?>)">
                                            <a href="#">
                                                <img src="<?php echo $related[1]['images'][0]?>" alt="">
                                                <p class="text-center extra-goods-name"><?php echo $related[1]['name']?></p>
                                            </a>
                                        </li>
                                    <?php }?>
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
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">商品列表</th>
                        <th class="text-center">品牌</th>
                        <th class="text-center">型号</th>
                        <th class="text-center">规格</th>
                        <th class="text-center">价格</th>
                        <th class="text-center">数量</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        foreach ($more_goods as $key=>$item){
                        ?>
                        <td class="text-center" id="more_name"><?php echo $item['name']; ?></td>
                        <td class="text-center" id="more_brand"><?php echo $item['brands_name']['name']; ?></td>
                        <td class="text-center" id="more_type"><?php echo $item['serial_no']; ?></td>
                        <td class="text-center" id="more-scale"><?php echo $item['branches'][0]['model']; ?></td>
                        <td class="text-center" id="more_price"><?php echo $item['branches'][0]['price']; ?></td>
                        <td class="text-center opration">
                            <div class="opration-item">
                                <div class="input-group text-right">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-cut" type="button"><i
                                                    class="fa fa-minus"></i></button>
                                    </span>
                                    <input type="text" data-price="<?php echo $item['branches'][0]['price']; ?>" data-max='99999' data-min="15"
                                           class="form-control input-numbox" oninput="countAmount(this)"
                                           placeholder="0" id="more_amount<?php echo $key;?>" value="15">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-add" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="opration-item">
                                <button type="button" class="btn btn-primary btn-xs" onclick="addToCart(<?php echo $key;?>)">
                                    <i class="fa fa-fw fa-shopping-cart"></i>
                                </button>
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
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">生产厂家</th>
                        <th class="text-center">生产厂家链接</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        foreach ($product_info['links'] as $item){
                        ?>
                        <td class="text-center company"><?php echo $item['name'];?></td>
                        <td class="text-center ">
                            <a class="hlink"
                               href="<?php echo $item['link'];?>"><?php echo $item['link'];?></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="domination"></div>


