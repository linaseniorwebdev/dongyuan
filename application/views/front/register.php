
    <link rel="stylesheet" href="<?php echo base_url();?>public/front/css/login.css">

    <div class="page-content">
        <div class="logo-box">
            <div class="container">
                <a href="<?php echo base_url();?>">
                    <img class="logo" src="public/front/img/res/logo.png" alt="">
                </a>
            </div>
        </div>

        <div class="register-content">
            <div class="container">
                <div class="register-box">
                    <div class="register-form-box row text-center">
                        <form  class="form-horizontal" role="form">
                            <div class="form-group">
                                <p class="register-slogon">用户注册</p>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">选择角色</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="role" name="role">
                                        <?php
                                        foreach ($permit_data as $item) {
                                            ?>
                                            <option value="<?php echo $item['id'];?>"><?php echo $item['name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="div-domination"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">账号</label>
                                <div class="col-sm-9">
                                    <input type="text" name="account" id="username" class="form-control" placeholder="请输入账号">
                                </div>
                            </div>
                            <div class="div-domination"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">密码</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="请输入密码">
                                </div>
                            </div>
                            <div class="div-domination"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">重复密码</label>
                                <div class="col-sm-9">
                                    <input type="password" name="repassword" id="repassword" class="form-control" placeholder="请再次输入密码">
                                </div>
                            </div>
                            <div class="div-domination"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">图片</label>
                                <div class="col-sm-9">
                                    <div class="upload-box">
                                        <img id="file-img" class="upload-file-img"
                                             src="public/front/img/res/upload-file.jpg" alt="">
                                        <!--                                    <input id="file-input" type="file" class="file-input" accept="image/*" onchange="uploadFile('file-input', 'file-img', 'attachment-path')">-->
                                        <input id="file-input" type="file" class="file-input" accept="image/*" onchange="image_upload(this)">
                                    </div>
                                    <!-- attachment-path用于保存最后要提交的文件路径 -->
                                    <input id="attachment-path" type="hidden" name="attachment" class="form-control">
                                </div>
                            </div>
                            <!-- <div class="text-right col-sm-11">
                                <a class="foget-pwd" href="">忘记密码</a>
                            </div> -->
                            <div class="div-domination"></div>
                            <div class="form-group">
                                <div class="register-btn-box text-center" onclick="register();">
                                    <div class="btn btn-primary">立即注册</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url();?>public/front/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>public/front/js/file-upload.js"></script>
    <script src="<?php echo base_url();?>public/front/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/front/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/front/bootstrap/js/bootstrap-hover-dropdown.js"></script>
    <script type="text/javascript">
        var image=null;
        var _server_url = '<?php echo base_url();?>';

        $(document).ready(function () {
            document.getElementById('search_box').style.display = 'none';
        });

        function image_upload(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#file-img')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                image = input.files[0];
            }
        }

        function register() {
            var e = document.getElementById("role");
            var role = e.options[e.selectedIndex].value;
            var username = $("#username").val();
            var password = $("#password").val();
            var repassword =  $("#repassword").val();

            if (role == null) {
                swal("警告!", "请选择你的角色。", "warning");
            }
            else if (username.length < 1) {
                swal("警告!", "请输入您的帐户。", "warning");
            }
            else if (password.length < 1) {
                swal("警告!", "请输入密码。", "warning");
            }
            else if (repassword.length < 1 || password != repassword) {
                swal("警告!", "密码不匹配。", "warning");
            }else if (image == null){
                $.post(_server_url + 'data/register', {
                        'role': role,
                        'username' : username,
                        'password' : password,
                    },
                    function (data) {
                        var result = JSON.parse(data);
                        console.log(result);
                        if (result['state'] == "success") {
                            swal({
                                title: "成功！",
                                text: "您已成功注册。",
                                icon: "success",
                            })
                                .then((isok) => {
                                    if (isok) {
                                        location.href =_server_url + 'home/signin';
                                    }
                                });
                        }
                        else {
                            swal("警告!", "帐户已存在。.", "warning");
                        }
                    });
            }else {
                var formData = new FormData();
                formData.append('image', image, image.filename);
                formData.append('role', role);
                formData.append('username', username);
                formData.append('password', password);
                $.ajax({
                    type: "POST",
                    url: _server_url + 'data/register',
                    success: function (data, textStatus, jqXHR) {
                        var result = JSON.parse(data);
                        console.log(result);
                        if (result['state'] == "success") {
                            swal({
                                title: "成功！",
                                text: "您已成功注册。",
                                icon: "success",
                            })
                                .then((isok) => {
                                    if (isok) {
                                        location.href =_server_url + 'home/signin';
                                    }
                                });
                        }
                        else {
                            swal("警告!", "帐户已存在。.", "warning");

                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        message('danger', textStatus + ': ' + errorThrown);
                    },
                    async: true,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        }
    </script>
</body>

</html>