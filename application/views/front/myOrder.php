<style>
    .close_add_modal {
        position: absolute;
        right: -20px;
        float: right;
        margin-top: -50px;
    }
</style>
<div class="main-menu-box">
    <div class="container">
        <div class="row">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs center-nav-tabs" role="tablist">
                <li role="presentation" class="active col-sm-2" style="padding: 0;width: 18%;">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">我的订单</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="more-goods-body">
            <table class="table table-responsive table-hover table-striped">
                <thead>
                <tr>
                    <th class="text-center">订单编号</th>
                    <th class="text-center">商品数量</th>
                    <th class="text-center">下单时间</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    if ($orders == null){
                        echo '<td colspan="4" style="text-align: center;">没有购物车。</td>';
                    }else{

                    foreach ($orders as $key=>$item){

                    foreach ($item['detail'] as $i){

                    ?>
                    <td class="text-center"><?php echo $item['number']; ?></td>
                    <td class="text-center"><?php echo $i['amount']; ?></td>
                    <td class="text-center"><?php echo $item['created_at']; ?></td>
                    <td class="text-center opration">
                        <button type="button" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $key;?>" class="btn btn-primary-block">查看</button>
                    </td>
                </tr>
                <?php
                }
                }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
foreach ($orders as $key=>$item){
    foreach ($item['detail'] as $i){
        ?>
        <div class="modal fade bd-example-modal-lg<?php echo $key;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="padding-left: 30px;">
                        <h4 class="modal-title" id="exampleModalLabel">订单详情</h4>
                        <img src="public/front/img/Close.png" class="close_add_modal"
                             data-dismiss="modal"
                             aria-label="Close"
                        style="position: absolute;right: -20px;float:right;margin-top: -50px; cursor: pointer;">

                    </div>
                    <div class="modal-body" style="padding-left: 50px;">
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p style="float: right; font-size: 18px;">收件地址 : </p>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-8">
                                            <p><?php echo $i['shipping_address'];?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p style="float: right; font-size: 18px;">电话号码 : </p>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-8">
                                            <p><?php echo $i['receipt_phone'];?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p style="float: right; font-size: 18px;">商品名称 : </p>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-8">
                                            <p><?php echo $i['inventory_name'];?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p style="float: right; font-size: 18px;">品牌 : </p>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-8">
                                            <p><?php echo $i['brand_name'];?></p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p style="float: right; font-size: 18px;">型号 : </p>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-8">
                                            <p><?php echo $i['serial_no'];?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p style="float: right; font-size: 18px;">价格 : </p>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-8">
                                            <p><?php echo $i['price'];?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p style="float: right; font-size: 18px;">数量 : </p>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-8">
                                            <p><?php echo $i['amount'];?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p style="float: right; font-size: 18px;">总价 : </p>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-8">
                                            <p><?php echo $item['total'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">良好</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>

<!--<div class="domination"></div>-->
<script type="text/javascript">
    function viewOrder() {
        $('#modal_back').css('display', 'block');
        $('#view_modal').css('display', 'block');
    }

</script>