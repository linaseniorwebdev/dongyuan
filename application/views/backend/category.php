<!-- BEGIN::Body -->
<style>
	.table td, .table th {
		vertical-align: middle;
	}

	.switchery {
		margin-bottom: 4px;
	}
</style>
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
				<h3 class="content-header-title mb-0 d-inline-block">分类清单</h3>
				<div class="row breadcrumbs-top d-inline-block">
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<?php
							$len =count($title) + 1;
							if ($len === 1) {
								echo '<li class="breadcrumb-item active">【主类别】</li>';
							} else {
								for ($idx = 1; $idx < $len; $idx++) {
									if ($len === $idx + 1) {
										echo '<li class="breadcrumb-item active">' . $title[$idx] . '</li>';
									} else {
										echo '<li class="breadcrumb-item"><a href="' . $crumb[$idx] . '">' . $title[$idx] . '</a></li>';
									}
								}
							}
							?>
						</ol>
					</div>
				</div>
			</div>
			<div class="content-header-right col-md-6 col-12">
				<div class="btn-group float-md-right">
					<input type="hidden" value="<?php echo $level; ?>" />
					<input type="hidden" value="<?php echo $id; ?>" />
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
										if ((int)$level === 3) {
											echo '<td>' . $row['name'] . '</td>';
										} else {
											echo '<td><a href="' . base_url('admin/category?l=' . (1 + (int)$level) . '&i=' . $row['id']) . '">' . $row['name'] . '</a></td>';
										}
										echo '<td class="text-center">' . (((int)$row['status'] === 1)?'<i class="la la-check text-success"></i>':'<i class="la la-times text-danger"></i>') . '</td>';
										echo '<td class="text-center"><input type="hidden" value="' . $row['id'] . '" /><input type="hidden" value="' . $row['name'] . '" /><input type="hidden" value="' . $row['status'] . '" /><a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="editItem(this)"><i class="la la-pencil"></i></a> <a href="javascript:void(0)" class="btn btn-sm btn-danger"  onclick="deleteItem(this)"><i class="la la-trash"></i></a></td>';
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
<!-- END::Modal -->

<!-- Model for Edit Category -->
<div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?php echo base_url('api/category/update'); ?>" method="post">
				<div class="modal-header">
					<h4 class="modal-title">项目编辑</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="redirect_uri" value="<?php echo $this->uri->uri_string() . '?l=' . $level . '&i=' . $id; ?>" />
					<input type="hidden" name="item_id_edit" />
					<input type="hidden" name="item_status_edit" />
					<div class="form-group">
						<label for="item_name_edit">分类名称</label>
						<input class="form-control" id="item_name_edit" name="item_name_edit" placeholder="请输入分类名称" />
					</div>
					<div class="form-group switchery-container">
						<input type="checkbox" id="switchery" class="switchery" data-size="sm"/>
						<label for="switchery" class="font-medium-2 text-bold-600 ml-1">Switchery Default</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">取消</button>
					<button type="submit" class="btn btn-outline-primary">确认</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END::Modal -->

<!-- END::Body -->