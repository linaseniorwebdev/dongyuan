<!-- BEGIN::Body -->
<style>
	div.dataTables_wrapper div.dataTables_filter label {
		margin-top: 0;
	}

	table.dataTable tbody td, th {
		vertical-align: middle;
	}

	.badge[class*='badge-'] span {
		bottom: 0;
		font-size: 1rem;
	}

	.table td {
		padding: 0.75rem 1.5rem;
	}

	.content-wrapper table.dataTable.dtr-inline.collapsed > tbody > tr > td:first-child:before, .content-wrapper table.dataTable.dtr-inline.collapsed > tbody > tr > th:first-child:before {
		top: 50%;
		left: 10%;
		transform: translateY(-50%);
	}
</style>
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
				<h3 class="content-header-title mb-0 d-inline-block">库存清单</h3>
			</div>
			<div class="content-header-right col-md-6 col-12">
				<div class="btn-group float-md-right">
					<a href="<?php echo base_url('admin/inventory/create'); ?>" class="btn btn-info" style="font-size: 18px;"><i class="la la-plus"></i> 添加</a>
				</div>
			</div>
		</div>
		<div class="content-body">
			<table class="table table-striped table-bordered" id="inventories">
				<thead>
				<tr>
					<th>#</th>
					<th>分类</th>
					<th>名称</th>
					<th>描述</th>
					<th>图片</th>
					<th>品牌</th>
					<th>型号</th>
					<th>更新日期</th>
					<th>状态</th>
					<th>操作</th>
				</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- END::Body -->