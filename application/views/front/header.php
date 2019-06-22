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
    <title><?php echo $title;?> | <?php echo APPNAME;?></title>
    <link rel="shortcut icon" href="<?php echo base_url();?>public/front/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url();?>public/front/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/front/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/front/layer/skin/layer.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/front/Swiper/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/front/css/style.css">

    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>public/front/js/respond.min.js"></script>
    <script src="<?php echo base_url();?>public/front/js/html5shiv.js"></script>
    <![endif]-->
</head>

<body>
<div id="app">
    <div class="header">
        <div class="container">
            <div class="page-header">
                <div>
                    <?php if ($userdata != null){ ?>
                        <a type="button" class="btn btn-link">欢迎光临东元商城, &nbsp;<?php echo $userdata; ?></a>
                    <?php } else { ?>
                        <a type="button" class="btn btn-link" href="<?php echo base_url('home/signin') ?>">请登录</a>|
                        <a type="button" class="btn btn-link" href="<?php echo base_url('home/register') ?>">免费注册</a>|
                    <?php } ?>
                    <a type="button" class="btn btn-link" href="<?php echo base_url()?>">商城首页</a>|
                    <?php if ($userdata != null) { ?>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1"
                                    data-hover="dropdown" aria-haspopup="true" aria-expanded="true">
                                收藏夹

                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">收藏的宝贝</a></li>
                                <li><a href="#">收藏的网页</a></li>
                            </ul>
                        </div>|
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu2"
                                    data-hover="dropdown" aria-haspopup="true" aria-expanded="true">
                                我的订单

                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><a href="<?php echo base_url('home/orderList')?>">所有订单</a></li>
                                <li><a href="<?php echo base_url('home/orderList')?>">待处理订单</a></li>
                                <li><a href="<?php echo base_url('home/orderList')?>">查询订单</a></li>
                                <li><a href="<?php echo base_url('home/orderList')?>">我要催单</a></li>
                                <li><a href="<?php echo base_url('home/orderList')?>">已完成订单</a></li>
                                <li><a href="<?php echo base_url('home/orderList')?>">申请退换货</a></li>
                            </ul>
                        </div>|
                        <a type="button" class="btn btn-link" href="<?php echo base_url('home/cartsList')?>">订购清单</a>|
                    <?php } ?>

                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu3"
                                data-hover="dropdown" aria-haspopup="true" aria-expanded="true">
                            客服

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                            <li><a href="#">联系客服</a></li>
                            <li><a href="#">商城入驻</a></li>
                            <li><a href="#">网站服务</a></li>
                        </ul>
                    </div>|
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu4"
                                data-hover="dropdown" aria-haspopup="true" aria-expanded="true">
                            帮助中心

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                            <li><a href="#">账户安全</a></li>
                            <li><a href="#">意见反馈</a></li>
                        </ul>
                    </div>|

                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu5"
                                data-hover="dropdown" aria-haspopup="true" aria-expanded="true">
                            语言

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu5">
                            <li><a href="#">中文</a></li>
                            <li><a href="#">英语</a></li>
                            <li><a href="#">俄语</a></li>
                            <li><a href="#">阿拉伯语</a></li>
                        </ul>
                    </div>
                    <?php if ($userdata != null){
                        ?>|
                        <a type="button" class="btn btn-link" href="#" onclick="logout();">退出</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="search-box" id="search_box">
        <div class="container">
            <div class="row">
                <div class="logo-box">
                    <a href="<?php echo base_url();?>">
                        <img class="logo" src="<?php echo base_url();?>public/front/img/res/logo.png" alt="">
                    </a>
                </div>
                <div class="col-sm-8" style="padding: 10px 15px 15px;">
                    <form action="" method="POST" class="form-inline search-form" role="form">
                        <div class="row" style="margin-bottom: 7px;">
                            <div class="col-sm-8">
                                <ul class="shortcut-search">
                                    <li><a href="<?php echo base_url('home/goodsList')?>">商品</a></li>
                                    <li>|</li>
                                    <li><a href="<?php echo base_url('home/goodsList')?>">公司</a></li>
                                    <li>|</li>
                                    <li><a href="<?php echo base_url('home/goodsList')?>">品牌</a></li>
                                    <li>|</li>
                                    <li><a href="<?php echo base_url('home/goodsList')?>">***</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="input-group w-100">
                                    <input type="text" class="form-control keywords-input" placeholder="请输入关键词"
                                           v-focus>
                                    <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">搜索</button>
                                        </span>
                                </div>
                            </div>
                            <div class="col-sm-3" style="padding-left: 45px;">
                                <a href="tel:400-000-000">
                                    <button type="button" class="btn btn-default">
                                        <img style="height: 1.2em;position: relative; margin-top: -0.1em;margin-right: 6px;"
                                             src="<?php echo base_url();?>public/front/img/res/kefu.png" alt=""> 联系客服
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <ul class="shortcut-search">
                                    <li><a href="<?php echo base_url('home/goodsList')?>">易损件专区</a></li>
                                    <li>|</li>
                                    <li><a href="<?php echo base_url('home/goodsList')?>">二手酉件</a></li>
                                    <li>|</li>
                                    <li><a href="<?php echo base_url('home/goodsList')?>">再制造商品</a></li>
                                    <li>|</li>
                                    <li><a href="<?php echo base_url('home/goodsList')?>">低价促销</a></li>
                                    <li>|</li>
                                    <li><a href="<?php echo base_url('home/goodsList')?>">限时促销 </a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-1" style="margin-left: 5%;">
                    <div class="logo-box" style="width: 110px;padding-top: 22px;">
                        <img src="<?php echo base_url();?>public/front/img/res/erwm.png" alt="">
                        <p class="download-qrcode">下载手机东元商城</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
