<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit" />
    <title><?php echo $title?> | <?php echo APPNAME;?></title>
    <link rel="shortcut icon" href="public/front/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="public/front/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/front/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/front/layer/skin/layer.css">
    <link rel="stylesheet" href="public/front/Swiper/css/swiper.min.css">
    <link rel="stylesheet" href="public/front/css/style.css">
    <link rel="stylesheet" href="public/front/css/goods.css">
    <link rel="stylesheet" href="public/front/css/goodsStyle.css">
    <link rel="stylesheet" href="public/front/css/pagenation.css">
<!--    <link rel="stylesheet" href="public/front/css/search.css">-->
    <link href="public/front/css/menu.css" rel="stylesheet" type="text/css" />

    <!--[if lt IE 9]>
    <script src="public/front/js/respond.min.js"></script>
    <script src="public/front/js/html5shiv.js"></script>
    <![endif]-->
</head>

<body>
<div id="app">
    <div class="header">
        <div class="container">
            <div class="page-header">
                <h3>
                    <small>您好，欢迎光临东元商城！</small>
                    <small>
                        <? if ($userdata != null): ?>
                            <a type="button" class="btn btn-link">欢迎光临东元商城,</a>
                            <a type="button" class="btn btn-link" href="<?php echo base_url()?>Page/profile">
                                <?php echo $userdata;?>
                            </a>|
                            <a type="button" class="btn btn-link" href="#" onclick="logout();">退出</a>|

                        <? else: ?>
                            <a type="button" class="btn btn-link" href="<?php echo base_url()?>Page/signin">请登录</a>|
                            <a type="button" class="btn btn-link" href="<?php echo base_url()?>Page/register">免费注册</a>|
                        <? endif; ?>
                        <a type="button" class="btn btn-link" href="<?php echo base_url()?>">商城首页</a>|
                        <!--                        <a type="button" class="btn btn-link" href="--><?php //echo base_url()?><!--Page/cart">购物车</a>|-->
                        <a type="button" class="btn btn-link" href="<?php echo base_url()?>Page/cartList">订购清单</a>|
                        <a type="button" class="btn btn-link" href="<?php echo base_url()?>Page/orderList">我的订单</a>|
                        <a type="button" class="btn btn-link" href="#">网站服务</a>|
                        <a type="button" class="btn btn-link" href="#">国际站</a>
                    </small>
                </h3>
            </div>
        </div>
    </div>

    <div class="search-box">
        <div class="container">
            <div class="row">
                <div class="logo-box">
                    <img src="public/front/img/res/logo.png" alt="">
                </div>
                <div class="col-sm-8" style="padding: 40px 0 15px;">
                    <form action="" method="POST" class="form-inline search-form" role="form">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="input-group w-100">
                                    <input type="text" class="form-control keywords-input" placeholder="请输入关键词"
                                           v-focus>
                                    <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">搜索</button>
                                        </span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-default">
                                    <img style="height: 1.2em;position: relative; margin-top: -0.1em;margin-right: 6px;"
                                         src="public/front/img/res/kefu.png" alt=""> 联系客服</button>
                            </div>
                            <div class="col-sm-8">
                                <ul class="shortcut-search">
                                    <li><a href="#" onclick="goodsList(this, id)">发动机</a></li>
                                    <li>|</li>
                                    <li><a href="#" onclick="goodsList(this, id)">发动机</a></li>
                                    <li>|</li>
                                    <li><a href="#" onclick="goodsList(this, id)">发动机</a></li>
                                    <li>|</li>
                                    <li><a href="#" onclick="goodsList(this, id)">发动机</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-1" style="margin-left: 5%;">
                    <div class="logo-box" style="width: 110px;padding-top: 22px;">
                        <img src="public/front/img/res/erwm.png" alt="">
                        <p class="download-qrcode">下载手机东元商城</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        <?php
                        if ($category_info['level'] == 1) {
                            ?>
                            <li class="active" onclick="searchList(this, <?php $category_info['id'];?>)">
                                <?php echo $category_info['name']; ?>
                            </li>
                            <?php
                        }elseif ($category_info['level'] == 2) {
                            ?>
                            <li onclick="searchList(this, <?php $category_one['id']; ?>)">
                                <?php echo $category_one['name']; ?>
                            </li>
                            <li class="active" onclick="searchList(this, <?php $category_info['id']; ?>)">
                                <?php echo $category_info['name']; ?>
                            </li>
                            <?php
                        }else {
                            ?>
                            <li onclick="searchList(this, <?php $category_one['id']; ?>)">
                                <?php echo $category_one['name']; ?>
                            </li>
                            <li onclick="searchList(this, <?php $category_two['id']; ?>)">
                                <?php echo $category_two['name']; ?>
                            </li>
                            <li class="active" onclick="searchList(this, <?php $category_info['id']; ?>)">
                                <?php echo $category_info['name']; ?>
                            </li>
                            <?php
                        }
                        ?>
                    </ol>
                </div>

                <div class="col-sm-12">
                    <!-- 搜索条件过滤box开始 -->
                    <div class="search-filter-box">
                        <div class="tags-box" onselectstart="return false;">
                            <?php
                                if ($category_info['level'] == 1) {
                                    foreach ($category_two as $key=>$item) {

                                        ?>
                                        <span class="tag-span <?php if ($key == 0) echo 'active';?>" filter="tag" value="<?php echo $item['name'];?>">
                                            <?php echo $item['name'];?>
                                        </span>
                                        <?php
                                    }
                                }elseif ($category_info['level'] == 2) {
                                    foreach ($category_three as $key=>$item) {
                                        ?>
                                        <span class="tag-span <?php if ($key == 0) echo 'active';?>" filter="tag" value="<?php echo $item['name']; ?>">
                                            <?php echo $item['name']; ?>
                                        </span>
                                        <?php
                                    }
                                }
                            ?>
                        </div>

                        <ul class="list-group">
                            <li class="list-group-item search-filter-item">
                                <ul class="search-filter-ul ul-h-flex">
                                    <li class="search-filter-li first" onselectstart="return false;">
                                        <span class="search-filter-name">厂家品牌：</span>
                                    </li>
                                    <li class="search-filter-li second" onselectstart="return false;">
                                        <div class="search-filter-opt-box">
                                            <?php
                                            foreach ($brands1_active as $key=>$item) {
                                                ?>
                                                <span class="search-filter-opt <?php if ($key == 0 ) echo 'active';?>" filter="factory"
                                                      value="<?php echo $item['id']?>"><?php echo $item['name'];?></span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    <li class="search-filter-li third" onselectstart="return false;">
                                        <a class="search-more-btn" data-toggle="collapse"
                                           data-target="#more-factory" aria-expanded="false"
                                           aria-controls="more-factory">
                                            更多 <i class="fa fa-fw fa-angle-down"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="collapse" id="more-factory">
                                    <div class="well">
                                        <div class="search-filter-opt-box" onselectstart="return false;">
                                            <?php
                                            foreach ($brands1_inactive as $item) {

                                                ?>
                                                <span class="search-filter-opt" filter="factory" value="<?php echo $item['id']?>">
                                                    <?php echo $item['name'];?></span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item search-filter-item">
                                <ul class="search-filter-ul ul-h-flex">
                                    <li class="search-filter-li first" onselectstart="return false;">
                                        <span class="search-filter-name">车型品牌：</span>
                                    </li>
                                    <li class="search-filter-li second" onselectstart="return false;">
                                        <div class="search-filter-opt-box">
                                            <?php
                                            foreach ($brands2_active as $key=>$item) {
                                                ?>
                                                <span class="search-filter-opt <?php if ($key == 0) echo 'active';?>" filter="model" value="<?php echo $item['id'];?>"><?php echo $item['name'];?></span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    <li class="search-filter-li third" onselectstart="return false;">
                                        <a class="search-more-btn" data-toggle="collapse" data-target="#more-model"
                                           aria-expanded="false" aria-controls="more-model">
                                            更多 <i class="fa fa-fw fa-angle-down"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="collapse" id="more-model">
                                    <div class="well">
                                        <div class="search-filter-opt-box" onselectstart="return false;">
                                            <?php
                                            foreach ($brands2_inactive as $item) {
                                                ?>
                                                <span class="search-filter-opt" filter="model" value="<?php echo $item['id'];?>">
                                                    <?php echo $item['name'];?></span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item search-filter-item">
                                <ul class="search-filter-ul ul-h-flex">
                                    <li class="search-filter-li first" onselectstart="return false;">
                                        <span class="search-filter-name">机型品牌：</span>
                                    </li>
                                    <li class="search-filter-li second" onselectstart="return false;">
                                        <div class="search-filter-opt-box">
                                            <?php
                                            foreach ($brands3_active as $key=>$item) {
                                                ?>
                                                <span class="search-filter-opt <?php if ($key == 0) echo 'active'?>" filter="moto"
                                                      value="<?php echo $item['id']?>"><?php echo $item['name'];?></span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    <li class="search-filter-li third" onselectstart="return false;">
                                        <a class="search-more-btn" type="button" data-toggle="collapse"
                                           data-target="#more-moto" aria-expanded="false"
                                           aria-controls="more-moto">
                                            更多 <i class="fa fa-fw fa-angle-down"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="collapse" id="more-moto">
                                    <div class="well">
                                        <div class="search-filter-opt-box" onselectstart="return false;">

                                            <?php
                                            foreach ($brands3_inactive as $item) {
                                                ?>
                                                <span class="search-filter-opt" filter="moto"
                                                      value="<?php echo $item['id']?>"><?php echo $item['name'];?></span>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- 搜索条件过滤box结束 -->
                </div>

                <div class="col-sm-12">
                    <div class="search-sort-box">
                        <ul class="search-sort-ul ul-h-flex">
                            <li class="search-sort-li col-sm-6">
                                <ul class="sort-by-ul">
                                    <li class="sort-by-li active" sort="synth" orderBy="asc"
                                        onselectstart="return false;">
                                        综合排序 <i class="fa fa-fw fa-caret-up"></i>
                                    </li>
                                    <li class="sort-by-li" sort="sales" orderBy="desc"
                                        onselectstart="return false;">
                                        销量 <i class="fa fa-fw fa-caret-down"></i>
                                    </li>
                                    <li class="sort-by-li" sort="price" orderBy="desc"
                                        onselectstart="return false;">
                                        价格 <i class="fa fa-fw fa-caret-down"></i>
                                    </li>
                                </ul>
                            </li>
                            <li class="search-sort-li col-sm-6">
                                <div class="search-result-preview" onselectstart="return false;">
                                    <span class="count-info">共<span class="total-count">47</span>个商品</span>
                                    <span class="page-info">
                                            <span class="current-count">1</span> / <span class="total-page"> 20</span>
                                        </span>

                                    <span class="page-item">
                                            <i class="fa fa-fw fa-angle-left"></i>
                                        </span>
                                    <span class="page-item">
                                            <i class="fa fa-fw fa-angle-right"></i>
                                        </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="search-result-box">
        <div class="container">
            <div class="row">
                <ul class="search-result-ul">
                    <li class="search-result-li v-center" v-for="p in products">
                        <div class="pro-item v-center text-center" @click="goodsInfo(p.id)">
                            <img :src="p.img" :alt="p.img">
                            <p :title="p.name">{{ p.name }}</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="pager">
                        <page-helper @jumpPage="1" :page-number="1"></page-helper>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="footer-header-ul">
                            <li>
                                正品保障
                            </li>|
                            <li>
                                七天包退
                            </li>|
                            <li>
                                好评如潮
                            </li>|
                            <li>
                                闪电发货
                            </li>|
                            <li>
                                权威荣誉
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-7">
                        <div class="row">
                            <div class="col-sm-11">
                                <div class="hot-lk">
                                    <a class="btn btn-link" href="#">新手上路</a>
                                    <a class="btn btn-link" href="#">配送与支付</a>
                                    <a class="btn btn-link" href="#">会员中心</a>
                                    <a class="btn btn-link" href="#">服务保证</a>
                                    <a class="btn btn-link" href="#">联系我们</a>
                                </div>
                                <ul class="sub-menu">
                                    <li>
                                        <ul>
                                            <li class=""><a href="#">售后流程</a></li>
                                            <li class=""><a href="#">购物流程</a></li>
                                            <li class=""><a href="#">订购方式</a></li>

                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li class=""><a href="#">货到付款区域</a></li>
                                            <li class=""><a href="#">配送支付智能查询</a></li>
                                            <li class=""><a href="#">支付方式说明</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li class=""><a href="#">资金管理</a></li>
                                            <li class=""><a href="#">我的收藏</a></li>
                                            <li class=""><a href="#">我的订单</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li class=""><a href="#">退换货管理</a></li>
                                            <li class=""><a href="#">售后服务保证</a></li>
                                            <li class=""><a href="#">产品质量保证</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li class=""><a href="#">网站故障报告</a></li>
                                            <li class=""><a href="#">选购咨询</a></li>
                                            <li class=""><a href="#">投诉与建议</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="contact">

                            <span class="contact-kefu">服务热线</span>
                            <p class="number">400-000-000</p>
                            <button type="button" class="btn btn-bright"><img src="public/front/img/res/kefu.png"
                                                                              alt="">&nbsp;&nbsp;咨询客服</button>

                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="qrcode">
                            <div class="qrcode-box">
                                <ul class="qrcode-header" onselectstart="return false;">
                                    <li>东元</li>
                                    <li>商城</li>
                                </ul>
                                <div class="qrcode-img-box">
                                    <img src="public/front/img/res/erwm.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="text-center">
                            <ul class="first-ul">
                                <li><a href="./index.html">首页</a></li>|
                                <li><a href="./index.html">隐私保护</a></li>|
                                <li><a href="./index.html">联系我们</a></li>|
                                <li><a href="./index.html">免责条款</a></li>|
                                <li><a href="./index.html">公司简介</a></li>|
                                <li><a href="./index.html">商户入驻</a></li>|
                                <li><a href="./index.html">意见反馈</a></li>
                            </ul>
                            <p class="text-center">ICP备案证书号：123456789</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<template id="page-helper">
    <div>
        <div class="page-helper" v-if="showPageHelper">
            <div class="page-list">
                <!-- <span class="page-item" @click="jumpPage(1)">首页</span> -->
                <span class="page-item" :class="{'disabled': currentPage === 1}" @click="prevPage">上一页</span>
                <span class="page-ellipsis" v-if="showPrevMore" @click="showPrevPage">...</span>
                <span class="page-item" v-for="num in groupList" :class="{'page-current':currentPage===num}"
                      :key="num" @click="jumpPage(num)">{{ num }}</span>
                <span class="page-ellipsis" v-if="showNextMore" @click="showNextPage">...</span>
                <span class="page-item" :class="{'disabled': currentPage === totalPage}"
                      @click="nextPage">下一页</span>
                <span class="ml20">共{{ totalPage }}页<!--  / {{ totalCount }}条 --></span>
                <!-- <span class="page-item" @click="jumpPage(totalPage)">末页</span> -->
                <span class="ml20">到第</span>
                <span class="page-jump-to"><input type="type" v-model="jumpPageNumber"></span>
                <span class="ml20" style="padding-left: 0px; padding-right: 10px;">页</span>
                <span class="page-item jump-go-btn" @click="goPage(jumpPageNumber)">确定</span>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript" src="public/front/js/jquery.min.js"></script>
<script type="text/javascript" src="public/front/layer/layer.js"></script>
<script>

    var _server_url = '<?php echo base_url();?>';
    function getBrowser() {
        if (window.navigator.userAgent.indexOf("Chrome") == -1) {
            //如果浏览器为IE7
            return true;
        }
    }

    if (getBrowser()) {
        layer.msg("请在Chrome谷歌内核浏览器中查看效果更佳，双核浏览器可切换Chrome内核")
    }

    function goodsList(obj, idx) {
        location.href =_server_url + 'page/goodsList';
    }

    function searchList(obj, idx) {
        location.href =_server_url + 'page/searchList?keyword='+ '&categoryId=' + idx + '&pageNum=1' + '&pageSize=40';
    }
</script>
<script src="public/front/bootstrap/js/bootstrap.min.js"></script>
<script src="public/front/js/vue.min.js"></script>
<script>
    var vm = new Vue({
        el: '#app',
        data: {
            products: [
                {
                    id: '001',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '002',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '003',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '004',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '005',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '006',
                    name: '东风08厂9809发动机市公司的个人梵蒂冈阿尔股份东风的的颁发的是吃饭',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '007',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '008',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '009',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '010',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '011',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '001',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '002',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '003',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '004',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '005',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '006',
                    name: '东风08厂9809发动机市公司的个人梵蒂冈阿尔股份东风的的颁发的是吃饭',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '007',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '008',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '009',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '010',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '011',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '001',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '002',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '003',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '004',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '005',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '006',
                    name: '东风08厂9809发动机市公司的个人梵蒂冈阿尔股份东风的的颁发的是吃饭',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '007',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '008',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '009',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '010',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '011',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '001',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '002',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '003',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '004',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '005',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '006',
                    name: '东风08厂9809发动机市公司的个人梵蒂冈阿尔股份东风的的颁发的是吃饭',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '007',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '008',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '009',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '010',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '011',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '001',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '002',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '003',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '004',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '005',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '006',
                    name: '东风08厂9809发动机市公司的个人梵蒂冈阿尔股份东风的的颁发的是吃饭',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '007',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '008',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '009',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '010',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '011',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '001',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '002',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '003',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '004',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '005',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '006',
                    name: '东风08厂9809发动机市公司的个人梵蒂冈阿尔股份东风的的颁发的是吃饭',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '007',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '008',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '009',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '010',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '011',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }
            ]
        },
        components: {
            'pageHelper': {
                template: "#page-helper",
                data() {
                    return {
                        currentPage: this.pageNumber,
                        currentSize: 20,
                        jumpPageNumber: 1,
                        showPrevMore: false,
                        showNextMore: false
                    }
                },
                props: {
                    pageNumber: {   //当前页面
                        type: Number,
                        default: 25
                    },
                    totalCount: {   //总条数
                        type: Number,
                        default: 50
                    },
                    pageGroup: {   //连续页码个数
                        type: Number,
                        default: 10
                    }
                },
                computed: {
                    showPageHelper() {
                        return this.totalCount > 0
                    },
                    totalPage() {   //总页数
                        return Math.ceil(this.totalCount / this.currentSize);
                    },
                    groupList() {  //获取分页码
                        const groupArray = []
                        const totalPage = this.totalPage
                        const pageGroup = this.pageGroup
                        const _offset = (pageGroup - 1) / 2
                        let current = this.currentPage
                        const offset = {
                            start: current - _offset,
                            end: current + _offset
                        }
                        if (offset.start < 1) {
                            offset.end = offset.end + (1 - offset.start)
                            offset.start = 1
                        }
                        if (offset.end > totalPage) {
                            offset.start = offset.start - (offset.end - totalPage)
                            offset.end = totalPage
                        }
                        if (offset.start < 1) offset.start = 1
                        this.showPrevMore = (offset.start > 1)
                        this.showNextMore = (offset.end < totalPage)
                        for (let i = offset.start; i <= offset.end; i++) {
                            groupArray.push(i)
                        }
                        return groupArray
                    }
                },
                methods: {
                    prevPage() {
                        if (this.currentPage > 1) {
                            this.jumpPage(this.currentPage - 1)
                        }
                    },
                    nextPage() {
                        if (this.currentPage < this.totalPage) {
                            this.jumpPage(this.currentPage + 1)
                        }
                    },
                    showPrevPage() {
                        this.currentPage = this.currentPage - this.pageGroup > 0 ? this.currentPage - this.pageGroup : 1
                    },
                    showNextPage() {
                        this.currentPage = this.currentPage + this.pageGroup < this.totalPage ? this.currentPage + this.pageGroup : this.totalPage
                    },
                    goPage(jumpPageNumber) {
                        if (Number(jumpPageNumber) <= 0) {
                            jumpPageNumber = 1
                        } if (Number(jumpPageNumber) >= this.totalPage) {
                            jumpPageNumber = this.totalPage
                        }
                        this.jumpPage(Number(jumpPageNumber))
                    },
                    jumpPage(pageNumber) {
                        if (this.currentPage !== pageNumber) {  //点击的页码不是当前页码
                            this.currentPage = pageNumber
                            //父组件通过change方法来接受当前的页码
                            this.$emit('jumpPage', { currentPage: this.currentPage, currentSize: this.currentSize })
                        }
                    }
                },
                watch: {
                    currentSize(newValue, oldValue) {
                        if (newValue !== oldValue) {
                            if (this.currentPage >= this.totalPage) { //当前页面大于总页面数
                                this.currentPage = this.totalPage
                            }
                            this.$emit('jumpPage', { currentPage: this.currentPage, currentSize: this.currentSize })
                        }
                    }
                }
            }
        },
        methods: {
            search(params) {
                // 执行搜索方法
                console.log(params)
            },
            goodsInfo(id) {
                window.location.href = "./goodsInfo.html?id=" + id
            }
        },
        created() {
            // 进入页面时数据操作
            this.search('123');
        },
        mounted: function () {
            $(".search-more-btn").click(function(){
                if($(this).find("i.fa-angle-down").length==1){
                    $(this).find("i.fa").removeClass("fa-angle-down").addClass("fa-angle-up")
                }else{
                    $(this).find("i.fa").removeClass("fa-angle-up").addClass("fa-angle-down")
                }
            })

            // 按标签查询
            $(".tags-box .tag-span").click(function () {
                $(this).addClass("active").siblings().removeClass("active");
                // 装配新tag条件并搜索
                vm.search('filter:' + $(this).attr("filter") + "---value:" + $(this).attr("value"));
            })

            // 按filter-opt查询
            $(".search-filter-opt-box .search-filter-opt").click(function () {
                var parentEl = $(this).parents(".search-filter-item");
                $(parentEl).find(".search-filter-opt").removeClass("active");
                $(this).addClass("active");
                // 装配新filter条件并搜索
                vm.search('filter:' + $(this).attr("filter") + "---value:" + $(this).attr("value"));
            })

            // 排序
            $(".sort-by-ul .sort-by-li").click(function () {
                $(this).addClass("active").siblings().removeClass("active");
                // 装配新filter条件并搜索
                var thisOrderBy = $(this).attr("orderBy");
                if (thisOrderBy == 'asc') {
                    thisOrderBy = 'desc'
                    $(this).find("i.fa").removeClass("fa-caret-up").addClass("fa-caret-down")
                } else if (thisOrderBy == 'desc') {
                    thisOrderBy = 'asc'
                    $(this).find("i.fa").removeClass("fa-caret-down").addClass("fa-caret-up")
                }

                $(this).attr("orderBy", thisOrderBy);
                vm.search('sort:' + $(this).attr("sort") + "---orderBy:" + thisOrderBy);
            })
        },
        directives: {
            "focus": function (elem) {
                $(elem).mouseover(param => {
                    $(elem).focus().select()
                })
            }
        }
    })
</script>
</body>

</html>