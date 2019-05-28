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
                    foreach ($orders as $item){
//                        var_dump($item);
                    foreach ($item['detail'] as $i){

                    ?>
                    <td class="text-center"><?php echo $item['number']; ?></td>
                    <td class="text-center"><?php echo $i['amount']; ?></td>
                    <td class="text-center"><?php echo $item['created_at']; ?></td>
                    <td class="text-center opration">
                        <button type="button" onclick="viewOrder()" class="btn btn-primary-block">查看</button>
                    </td>
                </tr>
                <?php
                }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--<div class="domination"></div>-->
