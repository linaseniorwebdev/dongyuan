<link rel="stylesheet" href="<?php echo base_url();?>public/front/css/goodsStyle.css">

        <div class="main-menu-box">
            <div class="container">
                <div class="row">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs center-nav-tabs" role="tablist">
                        <li role="presentation" class="active col-sm-2" style="padding: 0;width: 18%;">
                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">产品清单</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="text-center hot-brands-box">
                <div class="container">
                    <ul class="hot-brands-ul">
                        <li class="text-center v-center">
                            品牌：
                        </li>
                        <?php
                        foreach ($brand as $item) {

                            ?>
                            <li class="text-center">
                                <div class="v-center">
                                    <img class="brand-img" src="<?php echo $item['image'];?>">
                                </div>
                                <!-- <p>{{ brand.title }}</p> -->
                            </li>
                            <?php
                        }
                        ?>
                        <li class="v-center li-to-more">
                            <a href="#">更多<i class="fa fa-fw fa-angle-right"></i></a>
                        </li>
                    </ul>

                    <ul class="pro-address-ul">
                        <li class="text-center v-center">
                            产地：
                        </li>
                        <li class="text-center pro-address-li">
                            <div class="v-center">
                                <div
                                    class="swiper-container mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
                                    <div class="swiper-wrapper mui-scroll">
                                        <div class="swiper-slide">
                                            <a class="mui-control-item" v-for="p in ps"
                                                :class="{'mui-active':province==p.provinceCode}"
                                                @click.prevent="loadAreas(false, 'p', p.provinceCode)">
                                                {{ p.provinceName }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mui-swiper-scrollbar swiper-scrollbar"></div>
                                </div>

                                <div
                                    class="swiper-container mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
                                    <div class="swiper-wrapper mui-scroll">
                                        <div class="swiper-slide">
                                            <a class="mui-control-item" v-for="c in cs"
                                                :class="{'mui-active':city==c.cityCode}"
                                                @click.prevent="loadAreas(false, 'c', c.cityCode)">
                                                {{ c.cityName }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mui-swiper-scrollbar swiper-scrollbar"></div>
                                </div>
                            </div>
                        </li>
                        <li class="v-center li-to-more">
                            <a href="#">更多<i class="fa fa-fw fa-angle-right"></i></a>
                        </li>
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
                    $style = "";
                    if ($item['goods_data'] == null) {
                        $style = "style='display:none;'";
                    }else{
                        ?>
                        <div id="goods-box" <?php echo $style; ?>>
                            <div class="production-header">
                                <a href="#"><span
                                            class="floor-num"><?php echo ($key++) + 1; ?>F</span><?php echo $item['name']; ?>
                                </a>
                                <a href="#" class="view-more"
                                   onclick="searchList(<?php echo $item['id'] ?>)">查看更多<i
                                            class="fa-fw fa-2x fa fa-angle-right"></i> </a>
                            </div>
                            <ul class="production-ul">
                                <li class="product-slider-parent">
                                    <div class="product-slider<?php echo $key; ?> product-slider prev">
                                        <i class="fa-fw fa-3x fa fa-angle-left left"></i>
                                    </div>
                                </li>
                                <li style="width:calc(100% - 86px);">
                                    <div class="swiper-container swiper-container<?php echo $key; ?>">
                                        <div class="swiper-wrapper" id="products<?php echo $key; ?>">
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
                                        <div class="swiper-scrollbar swiper-scrollbar<?php echo $key; ?>"></div>
                                    </div>
                                </li>
                                <li class="product-slider-parent">
                                    <div class="next product-slider product-slider<?php echo $key; ?>">
                                        <i class="fa-fw fa-3x fa fa-angle-right right"></i>
                                        <!-- <a class="product-slider-item right" href="javascript:;">
                                        </a> -->
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
