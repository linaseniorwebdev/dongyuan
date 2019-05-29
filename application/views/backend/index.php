<!-- BEGIN::Body -->
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-body">
			<section id="minimal-statistics">
				<div class="row">
					<div class="col-xl-4 col-lg-6 col-12">
						<div class="card pull-up">
							<div class="card-content">
								<div class="card-body">
									<div class="media d-flex">
										<div class="media-body text-left">
											<h3 class="info"><?php echo $users['total']; ?></h3>
											<span>总用户</span>
										</div>
										<div class="align-self-center">
											<i class="icon-users info font-large-2 float-right"></i>
										</div>
									</div>
									<div class="progress mt-1 mb-0" style="height: 7px;">
										<div class="progress-bar bg-info" role="progressbar" style="width: <?php if ($users['total'] > 0) echo (double)$users['7days'] * 100.0 / (double)$users['total']; else echo '0'; ?>%"></div>
									</div>
									<div class="text-right pt-1">
										<span style="float: left;"><?php echo $users['7days']; ?></span>
										<span>过去7天</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-12">
						<div class="card pull-up">
							<div class="card-content">
								<div class="card-body">
									<div class="media d-flex">
										<div class="media-body text-left">
											<h3 class="warning"><?php echo $products['total']; ?></h3>
											<span>总库存</span>
										</div>
										<div class="align-self-center">
											<i class="icon-support warning font-large-2 float-right"></i>
										</div>
									</div>
									<div class="progress mt-1 mb-0" style="height: 7px;">
										<div class="progress-bar bg-warning" role="progressbar" style="width: <?php if ($products['total'] > 0) echo (double)$products['7days'] * 100.0 / (double)$products['total']; else echo '0'; ?>%"></div>
									</div>
									<div class="text-right pt-1">
										<span style="float: left;"><?php echo $products['total']; ?></span>
										<span>过去7天</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-12">
						<div class="card pull-up">
							<div class="card-content">
								<div class="card-body">
									<div class="media d-flex">
										<div class="media-body text-left">
											<h3 class="danger"><?php echo $orders['total']; ?></h3>
											<span>总订单</span>
										</div>
										<div class="align-self-center">
											<i class="icon-basket-loaded danger font-large-2 float-right"></i>
										</div>
									</div>
									<div class="progress mt-1 mb-0" style="height: 7px;">
										<div class="progress-bar bg-danger" role="progressbar" style="width: <?php if ($orders['total'] > 0) echo (double)$orders['7days'] * 100.0 / (double)$orders['total']; else echo '0'; ?>%"></div>
									</div>
									<div class="text-right pt-1">
										<span style="float: left;"><?php echo $orders['7days']; ?></span>
										<span>过去7天</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<!-- END::Body -->