<!-- BEGIN::Body -->
<style>
	.file-container {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;
	}
</style>
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
				<h3 class="content-header-title mb-0 d-inline-block">添加新品牌</h3>
			</div>
			<div class="content-header-right col-md-6 col-12">
				<div class="btn-group float-md-right">
					<a href="<?=base_url('admin/brand')?>" class="btn btn-info" style="font-size: 18px;">退回</a>
				</div>
			</div>
		</div>
		<div class="content-body">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<form action="<?=base_url('api/brand/create')?>" method="post" enctype="multipart/form-data">
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">品牌名称</span>
								</div>
								<div class="col-10">
									<input type="tel" class="form-control" name="brand_name" required />
								</div>
							</div>
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">品牌分类</span>
								</div>
								<div class="col-10">
									<select class="form-control" name="brand_type">
										<option value="1">厂家品牌</option>
										<option value="2">车型品牌</option>
										<option value="3">机型品牌</option>
									</select>
								</div>
							</div>
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">品牌形象</span>
								</div>
								<div class="col-10">
									<div class="img-container overflow-hidden image-preview mb-2">
										<img src="" alt="图片" style="display: none;" />
									</div>
									<div class="text-center file-chooser">
										<input type="file" accept="image/*" class="file-container" />
										<button type="button" class="btn btn-primary btn-glow box-shadow-1">选择图片</button>
									</div>
									<div class="text-center file-confirm" style="display: none;">
										<button type="button" class="btn btn-primary btn-glow box-shadow-1">确认</button>
									</div>
									<input type="hidden" name="brand_image" />
								</div>
							</div>
							<div class="form-group text-center mb-0">
								<button type="submit" class="btn btn-success btn-glow box-shadow-1 font-medium-3">提 交</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END::Body -->