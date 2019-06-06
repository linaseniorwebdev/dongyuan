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
			<div class="content-header-left col-md-6 col-12 mb-2">
				<h3 class="content-header-title mb-0 d-inline-block">用户列表</h3>
			</div>
		</div>
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
				<table class="table table-striped table-bordered" id="users">
				<thead>
				<tr>
					<th>#</th>
					<th>头像</th>
					<th>用户名</th>
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