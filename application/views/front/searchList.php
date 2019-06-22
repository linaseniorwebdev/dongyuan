<link rel="stylesheet" href="<?php echo base_url();?>public/front/css/goods.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/front/css/pagenation.css">

<input type="hidden" id="category_id" value="<?php echo $category_info['id'];?>">
<input type="hidden" id="page_num" value="<?php echo $pageNum;?>">
<input type="hidden" id="page_size" value="<?php echo $pageSize;?>">
<input type="hidden" id="total_counts" value="<?php echo $total;?>">
        <div class="main-menu-box">
            <div class="container">
                <div class="row">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs center-nav-tabs" role="tablist">
                        <li role="presentation" class="active col-sm-2" style="padding: 0;width: 18%;">
                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">全部商品分类</a>
                        </li>
                        <li role="presentation" class="text-center col-sm-2">
                            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">东元商城</a>
                        </li>
                        <li role="presentation" class="text-center col-sm-2">
                            <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">线上交易</a>
                        </li>
                        <li role="presentation" class="text-center col-sm-2">
                            <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">低价促销</a>
                        </li>
                        <li role="presentation" class="text-center col-sm-2">
                            <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">其他其他</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="filter-box">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url();?>"> 首页 </a></li>
                            <?php
                            if ($category_info['level'] == 1) {
                                ?>
                                <li class="active" onclick="searchList(<?php echo $category_info['id'];?>)">
                                    <?php echo $category_info['name']; ?>
                                </li>
                                <?php
                            }elseif ($category_info['level'] == 2) {
                                ?>
                                <li onclick="searchList(<?php echo $category_one['id']; ?>)">
                                    <?php echo $category_one['name']; ?>
                                </li>
                                <li class="active" onclick="searchList(<?php echo $category_info['id']; ?>)">
                                    <?php echo $category_info['name']; ?>
                                </li>
                                <?php
                            }else {
                                ?>
                                <li onclick="searchList(<?php echo $category_one['id']; ?>)">
                                    <?php echo $category_one['name']; ?>
                                </li>
                                <li onclick="searchList(<?php echo $category_two['id']; ?>)">
                                    <?php echo $category_two['name']; ?>
                                </li>
                                <li class="active" onclick="searchList(<?php echo $category_info['id']; ?>)">
                                    <?php echo $category_info['name']; ?>
                                </li>
                                <?php
                            }
                            ?>
                        </ol>
                    </div>

                    <div class="col-sm-12">
                        <!-- 搜索条件过滤box开始 -->
                        <div class="search-filter-box">
                            <div class="tags-box" onselectstart="return false;">
                                <?php
                                if ($category_info['level'] == 1) {
                                    foreach ($category_two as $key=>$item) {

                                        ?>
                                        <span class="tag-span" filter="tag" value="<?php echo $item['id'];?>" onclick="searchList(<?php echo $item['id']; ?>)">
                                            <?php echo $item['name'];?>
                                        </span>
                                        <?php
                                    }
                                }elseif ($category_info['level'] == 2) {
                                    foreach ($category_three as $key=>$item) {
                                        ?>
                                        <span class="tag-span" filter="tag" value="<?php echo $item['id']; ?>" onclick="searchList(<?php echo $item['id']; ?>)">
                                            <?php echo $item['name']; ?>
                                        </span>
                                        <?php
                                    }
                                }
                                ?>

                            </div>

                            <ul class="list-group">
                                <li class="list-group-item search-filter-item">
                                    <ul class="search-filter-ul ul-h-flex">
                                        <li class="search-filter-li first" onselectstart="return false;">
                                            <span class="search-filter-name">厂家品牌：</span>
                                        </li>
                                        <li class="search-filter-li second" onselectstart="return false;">
                                            <div class="search-filter-opt-box">
                                                <?php
                                                foreach ($brands1_active as $key=>$item) {
                                                    ?>
                                                    <span class="search-filter-opt <?php if ($key == 0 ) echo 'active';?>" filter="factory"
                                                          value="<?php echo $item['id']?>"><?php echo $item['name'];?></span>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </li>
                                        <li class="search-filter-li third" onselectstart="return false;">
                                            <a class="search-more-btn" data-toggle="collapse"
                                                data-target="#more-factory" aria-expanded="false"
                                                aria-controls="more-factory">
                                                更多 <i class="fa fa-fw fa-angle-down"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="collapse" id="more-factory">
                                        <div class="well">
                                            <div class="search-filter-opt-box" onselectstart="return false;">
                                                <?php
                                                foreach ($brands1_inactive as $item) {

                                                    ?>
                                                    <span class="search-filter-opt" filter="factory" value="<?php echo $item['id']?>">
                                                        <?php echo $item['name'];?>
                                                    </span>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item search-filter-item">
                                    <ul class="search-filter-ul ul-h-flex">
                                        <li class="search-filter-li first" onselectstart="return false;">
                                            <span class="search-filter-name">车型品牌：</span>
                                        </li>
                                        <li class="search-filter-li second" onselectstart="return false;">
                                            <div class="search-filter-opt-box">
                                                <?php
                                                foreach ($brands2_active as $key=>$item) {
                                                    ?>
                                                    <span class="search-filter-opt <?php if ($key == 0) echo 'active';?>" filter="model" value="<?php echo $item['id'];?>"><?php echo $item['name'];?></span>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </li>
                                        <li class="search-filter-li third" onselectstart="return false;">
                                            <a class="search-more-btn" data-toggle="collapse" data-target="#more-model"
                                                aria-expanded="false" aria-controls="more-model">
                                                更多 <i class="fa fa-fw fa-angle-down"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="collapse" id="more-model">
                                        <div class="well">
                                            <div class="search-filter-opt-box" onselectstart="return false;">
                                                <?php
                                                foreach ($brands2_inactive as $item) {
                                                    ?>
                                                    <span class="search-filter-opt" filter="model" value="<?php echo $item['id'];?>">
                                                    <?php echo $item['name'];?></span>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item search-filter-item">
                                    <ul class="search-filter-ul ul-h-flex">
                                        <li class="search-filter-li first" onselectstart="return false;">
                                            <span class="search-filter-name">机型品牌：</span>
                                        </li>
                                        <li class="search-filter-li second" onselectstart="return false;">
                                            <div class="search-filter-opt-box">
                                                <?php
                                                foreach ($brands3_active as $key=>$item) {
                                                    ?>
                                                    <span class="search-filter-opt <?php if ($key == 0) echo 'active'?>" filter="moto"
                                                          value="<?php echo $item['id']?>"><?php echo $item['name'];?></span>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </li>
                                        <li class="search-filter-li third" onselectstart="return false;">
                                            <a class="search-more-btn" type="button" data-toggle="collapse"
                                                data-target="#more-moto" aria-expanded="false"
                                                aria-controls="more-moto">
                                                更多 <i class="fa fa-fw fa-angle-down"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="collapse" id="more-moto">
                                        <div class="well">
                                            <div class="search-filter-opt-box" onselectstart="return false;">
                                                <?php
                                                foreach ($brands3_inactive as $item) {
                                                    ?>
                                                    <span class="search-filter-opt" filter="moto"
                                                          value="<?php echo $item['id']?>"><?php echo $item['name'];?></span>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- 搜索条件过滤box结束 -->
                    </div>

                    <div class="col-sm-12">
                        <div class="search-sort-box">
                            <ul class="search-sort-ul ul-h-flex">
                                <li class="search-sort-li col-sm-6">
                                    <ul class="sort-by-ul">
                                        <li class="sort-by-li active" sort="synth" orderBy="asc"
                                            onselectstart="return false;">
                                            综合排序 <i class="fa fa-fw fa-caret-up"></i>
                                        </li>
                                        <li class="sort-by-li" sort="sales" orderBy="desc"
                                            onselectstart="return false;">
                                            销量 <i class="fa fa-fw fa-caret-down"></i>
                                        </li>
                                        <li class="sort-by-li" sort="price" orderBy="desc"
                                            onselectstart="return false;">
                                            价格 <i class="fa fa-fw fa-caret-down"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="search-sort-li col-sm-6">
                                    <div class="search-result-preview" onselectstart="return false;">
                                        <span class="count-info">共<span class="total-count"><?php echo $total;?></span>个商品</span>
                                        <span class="page-info">
                                            <span class="current-count"><?php echo $pageNum;?></span> / <span class="total-page"> <?php echo round($total/$pageSize);?></span>
                                        </span>

                                        <span class="page-item <?php if ($pageNum == 1) echo 'disabled';?>" onclick="prevPage()">
                                            <i class="fa fa-fw fa-angle-left"></i>
                                        </span>
                                        <span class="page-item <?php if ($pageNum == ceil($total/$pageSize)) echo 'disabled';?>" onclick="nextPage()">
                                            <i class="fa fa-fw fa-angle-right"></i>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="search-result-box">
            <div class="container">
                <div class="row">
                    <ul class="search-result-ul">
                        <?php
                        if ($products == null){
                            echo '<h4 class="text-center">没有产品。</h4>';
                        }else {
                            foreach ($products as $item) {
                                ?>
                                <li class="search-result-li v-center">
                                    <div class="pro-item v-center text-center"
                                         onclick="goods_detail(this, <?php echo $item['id']; ?>)">
                                        <img src="<?php echo $item['images'][0]; ?>" width="180" height="160">
                                        <p><?php echo $item['name']; ?></p>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="pager">
                            <page-helper @jumpPage="1" :page-number="<?php echo $pageNum;?>"></page-helper>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript">
    // var category_id = $("#category_id").val();
    var category_id = document.getElementById('category_id').value;
    var pageNum = document.getElementById('page_num').value;
    var pageSize = document.getElementById('page_size').value;
    var totalPages = document.getElementById('total_counts').value;
    var page_counts = Math.round(totalPages/pageSize);
    function nextPage() {
        if (parseInt(pageNum) == page_counts){
            searchList(category_id, parseInt(pageNum));
        } else {
            searchList(category_id, parseInt(pageNum)+1);
        }
    }
    function prevPage() {
        if (parseInt(pageNum) == 1){
            searchList(category_id, parseInt(pageNum));
        } else {
            searchList(category_id, parseInt(pageNum)-1);
        }
    }
</script>