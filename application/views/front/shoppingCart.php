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
                <table id="data_table" class="table table-responsive">
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
                        if ($carts_rel == null){
                            echo '<td colspan="6" style="text-align: center;">没有购物车。</td>';
                        }else{
                        foreach ($carts_rel as $item){
                        ?>
                        <td class="text-center"><?php echo $item['detail']['inventory_name']; ?></td>

                        <td class="text-center"><?php echo $item['detail']['brand_name']; ?></td>

                        <td class="text-center"><?php echo $item['detail']['serial_no']; ?></td>

                        <td class="text-center"><?php echo $item['place_real']; ?></td>

                        <td class="text-center"><?php echo $item['detail']['price']; ?></td>

                        <td class="text-center opration">
                            <div class="opration-item">
                                <div class="input-group text-right">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default btn-cut" type="button"><i
                                                            class="fa fa-minus"></i></button>
                                            </span>
                                    <input type="text" data-price="<?php echo $item['detail']['price']; ?>"
                                           data-max='999999' data-min="0"
                                           class="form-control input-numbox" oninput="countAmount(this)"
                                           placeholder="0" id="amount" value="<?php echo $item['amount']; ?>">
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
                    }
                    ?>

                    </tbody>
                </table>
            </div>
            <form action="<?php echo base_url('api/order/create')?>" method="POST" class="form-horizontal" role="form">
                <div class="order-info-box" style="height: 310px;">
                    <p class="order-info-title">订购信息</p>

                        <?php
                        foreach ($carts_rel as $item) {
                            ?>
                            <input type="hidden" name="cartsId[]" value="<?php echo $item['id']; ?>">
                            <input type="hidden" name="inventory_name[]" value="<?php echo $item['detail']['inventory_name']; ?>">
                            <input type="hidden" name="brand_name[]" value="<?php echo $item['detail']['brand_name']; ?>">
                            <input type="hidden" name="serial_no[]" value="<?php echo $item['detail']['serial_no']; ?>">
                            <input type="hidden" name="place_of[]" value="<?php echo $item['detail']['place_of']; ?>">
                            <input type="hidden" name="price[]" value="<?php echo $item['detail']['price']; ?>">
                            <input type="hidden" name="amount[]" data-price="<?php echo $item['detail']['price']; ?>"
                                   data-max='999999'
                                   data-min="0"
                                   class="form-control input-numbox" oninput="countAmount(this)"
                                   placeholder="0" id="hidden_amount" value="<?php echo $item['amount']; ?>">
                            <?php
                        }
                        ?>


                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">姓名 :</label>
                                <div class="col-sm-5">
                                    <input type="text" name="receipt_name" class="form-control" required placeholder="请输入姓名"
                                           v-focus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">手机号 :</label>
                                <div class="col-sm-5">
                                    <input type="text" name="receipt_phone" class="form-control" required placeholder="请输入手机号"
                                           v-focus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">地址 :</label>
                                <div class="col-sm-5">
                                        <textarea name="shipping_address" rows="4" class="form-control" placeholder="请输入详细地址" v-focus>
                                        </textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="submit-form-box">
                        <span>
                            总金额： ￥
                            <span id="sumb-price">0.00</span>
                            <input type="hidden" name="total" value="0" id="total-price">
                        </span>
                    <?php
                    if ($carts_rel == null) echo '<button type="submit" class="btn btn-primary" disabled>提交订单</button>';
                    else echo '<button type="submit" class="btn btn-primary">提交订单</button>'
                    ?>

                </div>
            </form>


    </div>
</div>

<!--<div class="domination"></div>-->

<script type="text/javascript">

</script>