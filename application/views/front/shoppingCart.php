<div class="main-menu-box">
    <div class="container">
        <div class="row">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs center-nav-tabs" role="tablist">
                <li role="presentation" class="active col-sm-2" style="padding: 0;width: 18%;">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">订购清单</a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="page-content">
    <div class="container">
        <div class="more-goods-body">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th class="text-center">商品列表</th>
                    <th class="text-center">品牌</th>
<!--                    <th class="text-center">订货号</th>-->
                    <th class="text-center">替代型号</th>
                    <th class="text-center">产地</th>
                    <th class="text-center">价格</th>
                    <th class="text-center">订购数量</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    foreach ($carts_rel as $item){
                    ?>
                    <td class="text-center"><?php echo $item['detail']['inventory_name'];?></td>
                    <td class="text-center"><?php echo $item['detail']['brand_name'];?></td>
<!--                    <td class="text-center">1245NFX</td>-->
                    <td class="text-center"><?php echo $item['detail']['serial_no'];?></td>
                    <td class="text-center"><?php echo $item['place_real'];?></td>
                    <td class="text-center"><?php echo $item['detail']['price'];?></td>
                    <td class="text-center opration">
                        <div class="opration-item">
                            <div class="input-group text-right">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-cut" type="button"><i
                                                            class="fa fa-minus"></i></button>
                                            </span>
                                <input type="text" data-price="<?php echo $item['detail']['price'];?>" data-max='999999' data-min="0"
                                       class="form-control input-numbox" oninput="countAmount(this)"
                                       placeholder="0" value="<?php echo $item['amount'];?>">
                                <span class="input-group-btn">
                                                <button class="btn btn-default btn-add" type="button"><i
                                                            class="fa fa-plus"></i></button>
                                            </span>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                ?>

                </tbody>
            </table>
        </div>

        <div class="order-info-box">
            <p class="order-info-title">订购信息</p>
            <form action="" method="POST" class="form-horizontal" role="form">
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">姓名：</label>
                        <div class="col-sm-5">
                            <input type="text" name="" class="form-control" required placeholder="请输入姓名"
                                   v-focus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">手机号：</label>
                        <div class="col-sm-5">
                            <input type="text" name="" class="form-control" required placeholder="请输入手机号"
                                   v-focus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">地址：</label>
                        <div class="col-sm-5">
                                    <textarea name="" id="" rows="4" class="form-control" placeholder="请输入详细地址"
                                              v-focus></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="submit-form-box">
                    <span>
                        总金额： ￥
                        <span id="sumb-price">0.00</span>
                    </span>
            <button type="submit" onclick="makeOrder()" class="btn btn-primary">提交订单</button>
        </div>
    </div>
</div>

<!--<div class="domination"></div>-->

<script type="text/javascript">
    function makeOrder() {
        var name;
        var phone;
        var address;
        var goods_name;
        var brand_name;
        var goods_type;
        var place_of;
        var price;
        var amount;

        $.post(_server_url + 'api/order/create',
            {
                'receipt_name': name,
                'receipt_phone': phone,
                'shipping_address': address,
                'inventory_name': goods_name,
                'brand_name': brand_name,
                'serial_no': goods_type,
                'place_of': place_of,
                'price' : price,
                'amount' : amount

            },
            function (data) {
                var result = JSON.parse(data);

                if (result['status'] == "success") {
                    swal({
                        title: "成功！",
                        text: "您已在购物车中成功添加商品。.",
                        icon: "success",
                    })
                }
            });

    }
</script>