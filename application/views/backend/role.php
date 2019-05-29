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
		<div class="content-body">
			<div class="card">
				<div class="card-header card-head-inverse bg-primary">
					<h4 class="card-title text-white">角色列表</h4>
					<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="close"><i class="ft-x"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-body pt-1 pb-1">
					<table class="table table-striped table-bordered" id="roles">
						<thead>
						<tr>
							<th>#</th>
							<th>角色名称</th>
							<th>角色管理</th>
							<th>广告管理</th>
							<th>咨询管理</th>
							<th>品牌管理</th>
							<th>用户管理</th>
							<th>分类管理</th>
							<th>地址管理</th>
							<th>库存管理</th>
							<th>订货管理</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
			<div class="card">
				<div class="card-header card-head-inverse bg-info">
					<h4 class="card-title text-white">管理员列表</h4>
					<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="close"><i class="ft-x"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-body pt-1 pb-1">
					<table class="table table-striped table-bordered" id="admins">
						<thead>
						<tr>
							<th>#</th>
							<th>头像</th>
							<th>管理员名</th>
							<th>角色名称</th>
							<th>注册日期</th>
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
	</div>
</div>
<!-- END::Body -->