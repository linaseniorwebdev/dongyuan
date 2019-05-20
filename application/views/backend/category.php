<!-- BEGIN::Body -->
<?php

?>
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
				<h3 class="content-header-title mb-0 d-inline-block">分类清单</h3>
				<div class="row breadcrumbs-top d-inline-block">
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a>
							</li>
							<li class="breadcrumb-item"><a href="#">Components</a>
							</li>
							<li class="breadcrumb-item active">Callout
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="content-header-right col-md-6 col-12">
				<div class="btn-group float-md-right">
					<input type="hidden" value="<?=$level?>" />
					<input type="hidden" value="<?=$id?>" />
					<a href="javascript:void(0)" class="btn btn-info" style="font-size: 18px;" onclick="addItem(this)"><i class="la la-plus"></i> 添加</a>
				</div>
			</div>
		</div>
		<div class="content-body">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<div class="row">
							<table class="table table-striped table-hover mb-0">
								<thead>
								<tr>
									<th>#</th>
									<th>名称</th>
									<th class="text-center">状态</th>
									<th class="text-center">操作</th>
								</tr>
								</thead>
								<tbody>
								<?php
								if ($rows) {
									$idx = 0;
									foreach ($rows as $row) {
										$idx++;
										echo '<tr>';
										echo '<td>' . $idx . '</td>';
										echo '<td>' . $row['name'] . '</td>';
										echo '<td class="text-center">' . (((int)$row['status'] === 1)?'<i class="la la-check text-success"></i>':'<i class="la la-times text-danger"></i>') . '</td>';
										echo '<td class="text-center"><input type="hidden" value="' . $row['id'] . '" /><a href="javascript:void(0)" class="btn btn-sm btn-success"><i class="la la-pencil"></i></a></td>';
										echo '</tr>';
									}
								} else {
									echo '<tr><td class="text-center" colspan="4">没有找到匹配的记录</td></tr>';
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Model for Add New Category -->
<div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">添加新项目</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="item_name_new">分类名称</label>
					<input class="form-control" id="item_name_new" placeholder="请输入分类名称" />
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">取消</button>
				<button type="button" class="btn btn-outline-primary" onclick="addItemConfirm()">确认</button>
			</div>
		</div>
	</div>
</div>
<!-- END::Body -->