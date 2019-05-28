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
                        <?php if ($userdata != null){

                        ?>
                        <a type="button" class="btn btn-link">欢迎光临东元商城,</a>
                        <a type="button" class="btn btn-link" href="<?php echo base_url() ?>Page/profile">
                            <?php echo $userdata; ?>
                        </a>|
                        <a type="button" class="btn btn-link" href="#" onclick="logout();">退出</a>|
                        <?php
                        }else{
                            ?>
                            <a type="button" class="btn btn-link" href="<?php echo base_url() ?>Page/login">请登录</a>|
                            <a type="button" class="btn btn-link" href="<?php echo base_url() ?>Page/register">免费注册</a>|
                            <?php
                        }
                        ?>

                        <a type="button" class="btn btn-link" href="<?php echo base_url()?>">商城首页</a>|
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
                    <form class="form-inline search-form" role="form">
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

