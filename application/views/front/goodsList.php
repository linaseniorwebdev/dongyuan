<link rel="stylesheet" href="<?php echo base_url();?>public/front/css/goodsStyle.css">
<div class="main-menu-box">
    <div class="container">
        <div class="row">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs center-nav-tabs" role="tablist">
                <li role="presentation" class="active col-sm-2" style="padding: 0;width: 18%;">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">商品列表</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="text-center hot-brands-box">
        <div class="container">
            <ul class="hot-brands-ul">
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
            <div class="production-box" v-for="(sort,index) in products" v-cloak>
                <div class="production-header">
                    <a href="#"><span class="floor-num">{{ index+1 }}F</span>{{ sort.title }}</a>
                    <a href="#" class="view-more">查看更多<i class="fa-fw fa-2x fa fa-angle-right"></i> </a>
                </div>
                <ul class="production-ul">
                    <li class="product-slider-parent">
                        <div :class="'product-slider'+index" class="product-slider prev">
                            <i class="fa-fw fa-3x fa fa-angle-left left"></i>
                        </div>
                    </li>
                    <li style="width:calc(100% - 80px);">
                        <div class="swiper-container" :class="'swiper-container'+index">
                            <div class="swiper-wrapper" :id="'products'+index">
                                <div class="swiper-slide" v-for="p in sort.productions">
                                    <a class="sk_item_lk " href="#">
                                        <div class="text-center products-item">
                                            <img class="product-img" :src="p.img" :alt="p.img">
                                        </div>
                                        <p>{{ p.name }}</p>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-scrollbar" :class="'swiper-scrollbar'+index"></div>
                        </div>
                    </li>
                    <li class="product-slider-parent">
                        <div :class="'product-slider'+index" class="next product-slider">
                            <i class="fa-fw fa-3x fa fa-angle-right right"></i>
                            <!-- <a class="product-slider-item right" href="javascript:;">
                            </a> -->
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>