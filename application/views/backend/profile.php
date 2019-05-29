<!-- BEGIN::Body -->
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-body">
			<div class="card">
				<div class="card-header card-head-inverse bg-success">
					<h4 class="card-title text-white">账户管理</h4>
					<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="close"><i class="ft-x"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-body">
					<?php
					if (isset($message)) {
						?>
						<div class="bs-callout-success callout-border-left mb-2 p-1">
							<p><?php echo $message; ?></p>
						</div>
						<?php
					}
					?>
					<?php
					if (isset($error)) {
						?>
						<div class="bs-callout-danger callout-border-left mb-2 p-1">
							<p><?php echo $error; ?></p>
						</div>
						<?php
					}
					?>
					<form class="form" action="<?php echo base_url('admin/profile'); ?>" method="post">
						<input type="hidden" name="id" value="<?php echo $id; ?>" />
						<div class="form-group row">
							<div class="col-md-2 text-right pr-1" style="padding-top: 8px;">
								<span style="font-size: 16px;">输入密码</span>
							</div>
							<div class="col-md-10">
								<input type="password" class="form-control" name="ps" value="" required />
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-md-2 text-right pr-1" style="padding-top: 8px;">
								<span style="font-size: 16px;">重复输入</span>
							</div>
							<div class="col-md-10">
								<input type="password" class="form-control" name="rp" value="" required />
							</div>
						</div>
						<div class="form-actions text-center pb-0" >
							<button type="submit" class="btn btn-primary font-medium-2">提 交</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END::Body -->