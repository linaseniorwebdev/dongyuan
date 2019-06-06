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

	.rotate_180 {
		-moz-transform: rotate(180deg);
		-webkit-transform: rotate(180deg);
		-o-transform: rotate(180deg);
		-ms-transform: rotate(180deg);
		transform: rotate(180deg);
	}

	.png-arrow {
		width: 75%;
		position:absolute;
		left: 50%;
		top: 50%;
		-webkit-transform: translateX(-50%) translateY(-50%);
		-moz-transform:translateX(-50%) translateY(-50%);
		-ms-transform:translateX(-50%) translateY(-50%);
		-o-transform:translateX(-50%) translateY(-50%);
		transform:translateX(-50%) translateY(-50%);
	}

	.selected {
		border: 1px solid #1EB549 ;
	}
</style>
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
				<h3 class="content-header-title mb-0 d-inline-block">订货清单</h3>
			</div>
		</div>
		<div class="content-body">
			<div class="card">
				<div class="card-body">
					<table class="table table-striped table-bordered" id="orders">
						<thead>
						<tr>
							<th>#</th>
							<th>订货号</th>
							<th>用户名</th>
							<th>总价格</th>
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
	</div>
</div>

<div class="modal animated slideInDown text-left" id="updateModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">更新订单状态</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div id="option1" class="selected p-1">
						<div class="row no-gutters">
							<div class="col-5">
								<div class="card mb-0">
									<div class="card-content">
										<div class="media align-items-stretch">
											<div class="p-2 bg-gradient-x-danger text-white media-body rounded-right text-center">
												<h5 class="text-white mb-0">New Users</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-2">
								<img class="png-arrow" src="public/backend/images/arrow-green.png" draggable="false" />
							</div>
							<div class="col-5">
								<div class="card mb-0">
									<div class="card-content">
										<div class="media align-items-stretch">
											<div class="p-2 bg-gradient-x-danger text-white media-body rounded-left text-center rotate_180">
												<h5 class="text-white mb-0 rotate_180">New Users</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="option2" class="p-1">
						<div class="row no-gutters">
							<div class="col-5">
								<div class="card mb-0">
									<div class="card-content">
										<div class="media align-items-stretch">
											<div class="p-2 bg-gradient-x-danger text-white media-body rounded-right text-center">
												<h5 class="text-white mb-0">New Users</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-2">
								<img class="png-arrow" src="public/backend/images/arrow-green.png" draggable="false" />
							</div>
							<div class="col-5">
								<div class="card mb-0">
									<div class="card-content">
										<div class="media align-items-stretch">
											<div class="p-2 bg-gradient-x-danger text-white media-body rounded-left text-center rotate_180">
												<h5 class="text-white mb-0 rotate_180">New Users</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group mb-0">
					<label for="remark">备注:</label>
					<textarea class="form-control" id="remark" rows="6" placeholder="请在这里留言" style="resize: none;"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">取消</button>
				<button type="button" class="btn btn-outline-primary" onclick="confirmUpdate()">确认</button>
			</div>
		</div>
	</div>
</div>
<!-- END::Body -->
