<!-- BEGIN::Body -->
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-body">
			<?php
			$id   = $_GET['id'];
			$name = $_GET['name'];
			$stat = $_GET['data'];

			$comments = array(
				'permission' => '角色管理',
				'ad'         => '广告管理',
				'notice'     => '咨询管理',
				'brand'      => '品牌管理',
				'user'       => '用户管理',
				'category'   => '分类管理',
				'address'    => '地址管理',
				'inventory'  => '库存管理',
				'order'      => '订货管理',
			);
			?>
			<div class="card">
				<div class="card-header card-head-inverse bg-success">
					<h4 class="card-title text-white">角色列表</h4>
					<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="close"><i class="ft-x"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-body">
					<form action="<?php echo base_url('api/role/update'); ?>" method="post">
						<input type="hidden" name="id" value="<?php echo $id; ?>" />
						<div class="form-group row">
							<div class="col-2 text-right pr-1" style="padding-top: 8px;">
								<span style="font-size: 16px;">角色名称</span>
							</div>
							<div class="col-10">
								<input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END::Body -->