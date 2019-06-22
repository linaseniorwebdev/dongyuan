
<link rel="stylesheet" href="<?php echo base_url();?>public/front/css/login.css">

<div class="page-content">
        <div class="logo-box">
            <div class="container">
                <a href="<?php echo base_url();?>">
                    <img class="logo" src="<?php echo base_url();?>public/front/img/res/logo.png" alt="">
                </a>
            </div>
        </div>
        <div class="login-content">
            <div class="container">
                <div class="login-box">
                    <div class="login-form-box row text-center">
                        <form action="<?php echo base_url('data/login');?>" method="POST" class="form-horizontal" role="form">
                            <div class="form-group">
                                <p class="login-slogon">登录</p>
                                <?php
                                if (isset($message)) {
                                    echo '<h4 class="text-center text-danger">' . $message . '</h4>';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">账号</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" placeholder="请输入账号">
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
                                <a class="foget-pwd" href="<?php echo base_url('home/forgetPass')?>">忘记密码</a>
                            </div>
                            <div class="div-domination"></div>
                            <div class="form-group">
                                <div class="login-btn-box">
                                    <button type="submit" class="btn btn-primary">登录</button>
                                    <a type="button" class="btn btn-default" href="<?php echo base_url('home/register')?>">注册</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/front/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/front/bootstrap/js/bootstrap-hover-dropdown.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementById('search_box').style.display = 'none';
    });
</script>

</body>

</html>