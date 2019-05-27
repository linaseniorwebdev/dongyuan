<!-- BEGIN::Body -->
<style>
	.table td, .table th {
		vertical-align: middle;
	}
</style>
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
				<h3 class="content-header-title mb-0 d-inline-block">品牌清单</h3>
			</div>
			<div class="content-header-right col-md-6 col-12">
				<div class="btn-group float-md-right">
					<a href="<?=base_url('admin/brand/create')?>" class="btn btn-info" style="font-size: 18px;"><i class="la la-plus"></i> 添加</a>
				</div>
			</div>
		</div>
		<div class="content-body">
			<div class="card mb-0">
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
										echo '<td class="text-center"><a href="' . base_url('admin/brand/edit/' . $row['id']) . '" class="btn btn-sm btn-success""><i class="la la-pencil"></i></a> <input type="hidden" value="' . $row['id'] . '" /> <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="deleteItem(this)"><i class="la la-trash"></i></a></td>';
										echo '</tr>';
									}
								} else {
									echo '<tr><td class="text-center" colspan="4">没有找到匹配的记录</td></tr>';
								}
								?>
								</tbody>
							</table>
						</div>
						<div class="w-100">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END::Body -->