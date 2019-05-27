<div class="footer-domination"></div>
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
                            <ul class="qrcode-header">
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

<script type="text/javascript" src="public/front/js/jquery.min.js"></script>
<script type="text/javascript" src="public/front/Swiper/js/swiper.min.js"></script>
<script type="text/javascript" src="public/front/layer/layer.js"></script>
<script type="text/javascript" src="public/front/js/SuperSlide.js"></script>
<script type="text/javascript" src="public/front/js/area_data.js"></script>
<script type="text/javascript" src="public/front/js/file-upload.js"></script>
<script type="text/javascript" src="public/front/js/common-min.js"></script>
<script src="public/front/bootstrap/js/bootstrap.min.js"></script>
<script src="public/front/js/vue.min.js"></script>
<script src="public/front/js/sweetalert.min.js"></script>

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
    
    function logout() {
        swal({
            title: "警告!",
            text: "您确定要退出吗？",
            icon: "warning",

            buttons: ["不", "是"],
        })
            .then((isok) => {
                if (isok) {
                    location.href =_server_url + 'page/login';
                }
            });
    }
    var vm = new Vue({
        el: '#app',
        data: {
            thumbnails: [
                {
                    id: '001',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/01.jpg'
                }, {
                    id: '002',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/02.jpg'
                }, {
                    id: '003',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/03.jpg'
                }, {
                    id: '004',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/04.jpg'
                }, {
                    id: '005',
                    name: '东风08厂9809发动机',
                    img: 'public/front/img/moto/05.jpg'
                }, {
                    id: '006',
                    name: '东风08厂9809发动机市公司的个人梵蒂冈阿尔股份东风的的颁发的是吃饭',
                    img: 'public/front/img/moto/07.jpg'
                },
                {
                    id: '007',
                    name: '',
                    img: 'public/front/img/product/product_4.png'
                }
            ]
        },
        methods: {
            loadAreas(initFlag, rank, val) {
                if (initFlag) {
                    // 初始化页面
                    if (this.province != '' && this.province != null) {
                        // 有值初始化
                        for (var i = 0; i < Area.length; i++) {
                            if (Area[i].provinceCode == this.province) {
                                this.cs = Area[i].mallCityList;
                            }
                        }
                    } else {
                        // 无值初始化，默认浙江省杭州市
                        this.province = 330000;
                        for (var i = 0; i < Area.length; i++) {
                            if (Area[i].provinceCode == this.province) {
                                this.cs = Area[i].mallCityList;
                            }
                        }
                        this.city = 330100;
                    }
                } else {
                    // 手动选择
                    if (rank == 'p') {
                        // 选择省，市清空
                        this.province = val
                        for (var i = 0; i < Area.length; i++) {
                            if (Area[i].provinceCode == this.province) {
                                this.cs = Area[i].mallCityList;
                            }
                        }
                        this.city = '';
                    } else {
                        this.city = val;
                    }
                }
            },
            search(params) {
                // 执行搜索方法
                console.log(params)
            },
            goodsInfo(id) {
                window.location.href = "./goodsInfo.html?id=" + id
            },
        },
        created() {
            // 进入页面时数据操作
            this.loadAreas(true, '', '');
            this.search('123');

        },
        mounted: function () {
            var floorNum = $('#array_length').val();
            console.log(floorNum);
            for (var i = 0; i < floorNum; i++) {
                new Swiper('.swiper-container' + i, {
                    scrollbar: '.swiper-scrollbar' + i,
                    scrollbarHide: true,
                    slidesPerView: 'auto',
                    centeredSlides: false,
                    spaceBetween: 0,
                    grabCursor: true,
                    scrollbarDraggable: true,
                    scrollbarSnapOnRelease: false,
                    nextButton: '.product-slider' + i + '.next',
                    prevButton: '.product-slider' + i + '.prev'
                });
            }

            new Swiper('.mui-scroll-wrapper.swiper-container', {
                scrollbar: '.mui-swiper-scrollbar.swiper-scrollbar',
                scrollbarHide: true,
                slidesPerView: 'auto',
                centeredSlides: false,
                spaceBetween: 0,
                grabCursor: true,
                scrollbarDraggable: true,
                scrollbarSnapOnRelease: false
            });

            $(".search-more-btn").click(function () {
                if ($(this).find("i.fa-angle-down").length == 1) {
                    $(this).find("i.fa").removeClass("fa-angle-down").addClass("fa-angle-up")
                } else {
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

            $(".tag-content-li .goods-specification").click(function () {
                $(this).addClass("active").siblings().removeClass("active");
            })

            $(".btn-cut").click(function () {
                var numBox = $(this).parent().siblings(".input-numbox");
                var num = $(numBox).val();
                var minNum = $(numBox).attr("data-min");
                if (num > minNum) {
                    $(numBox).val(--num);
                    countAmount(numBox);
                } else if (num == minNum) {
                    $(numBox).val(minNum);
                    countAmount(numBox);
                }
            });
            $(".btn-add").click(function () {
                var numBox = $(this).parent().siblings(".input-numbox");
                var num = $(numBox).val();
                var maxNum = $(numBox).attr("data-max");
                if (parseInt(num) < parseInt(maxNum)) {
                    $(numBox).val(++num);
                    countAmount(numBox);
                } else if (num == '') {
                    $(numBox).val(1);
                    countAmount(numBox);
                }
            });

            new Swiper('.swiper-container', {
                scrollbar: '.swiper-scrollbar',
                scrollbarHide: true,
                slidesPerView: 'auto',
                centeredSlides: false,
                spaceBetween: 0,
                grabCursor: true,
                scrollbarDraggable: true,
                scrollbarSnapOnRelease: false,
                nextButton: '.product-slider.next',
                prevButton: '.product-slider.prev'
            });

            $(".product-img").mousemove(function () {
                $("#main-pic").attr("src", $(this).attr("src"));
            })


            $('#more-goods-tabs a').click(function (e) {
                e.preventDefault()
                $(this).tab('show')
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