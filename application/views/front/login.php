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
    <title>登录 | <?php echo APPNAME;?></title>
    <link rel="shortcut icon" href="public/front/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="public/front/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/front/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/front/layer/skin/layer.css">
    <link rel="stylesheet" href="public/front/Swiper/css/swiper.min.css">
    <link rel="stylesheet" href="public/front/css/style.css">
    <link rel="stylesheet" href="public/front/css/login.css">
    <!--[if lt IE 9]>
    <script src="public/front/js/respond.min.js"></script>
    <script src="public/front/js/html5shiv.js"></script>
    <![endif]-->
</head>

<body>
<div class="header">
    <div class="container">
        <div class="page-header">
            <h3>
                <small>您好，欢迎光临东元商城！</small>
                <small>
                    <a type="button" class="btn btn-link" href="">请登录</a>|
                    <a type="button" class="btn btn-link" href="<?php echo base_url()?>Page/register">免费注册</a>|
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

<div class="page-content" style="background-color: #FFF">
    <div class="logo-box">
        <div class="container">
            <img class="logo" src="public/front/img/res/logo.png" alt="">
        </div>
    </div>
    <div class="login-content">
        <div class="container">
            <div class="login-box">
                <div class="login-form-box row text-center">
                    <form action="<?php echo base_url('data/login');?>" method="post" class="form-horizontal" role="form">
                        <div class="form-group">
                            <p class="login-slogon">登录</p>
                            <?php
                            if (isset($message)) {
                                echo '<h3 class="text-center text-danger">' . $message . '</h3>';
                            }
                            ?>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">账号</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" placeholder="请输入账号" <?php if (isset($username)) echo 'value="' . $username . '"'; ?> required/>
                            </div>
                        </div>
                        <div class="div-domination"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" placeholder="请输入密码">
                            </div>
                        </div>
                        <div class="text-right col-sm-11">
                            <a class="foget-pwd" href="<?php echo base_url('page/forgetPass')?>">忘记密码</a>
                        </div>
                        <div class="div-domination"></div>
                        <div class="form-group">
                            <div class="login-btn-box">
                                <button type="submit" class="btn btn-primary">登录</button>
                                <a type="button" class="btn btn-default" href="<?php echo base_url('page/register');?>">注册</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>