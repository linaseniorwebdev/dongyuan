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

	.switchery {
		margin-bottom: 4px;
	}
</style>
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
				<h3 class="content-header-title mb-0 d-inline-block">编辑品牌信息</h3>
			</div>
			<div class="content-header-right col-md-6 col-12">
				<div class="btn-group float-md-right">
					<a href="<?php echo base_url('admin/brand'); ?>" class="btn btn-info" style="font-size: 18px;">退回</a>
				</div>
			</div>
		</div>
		<div class="content-body">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<form action="<?php echo base_url('api/brand/update'); ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="brand_id" value="<?php echo $row['id']; ?>" />
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">品牌名称</span>
								</div>
								<div class="col-10">
									<input type="text" class="form-control" name="brand_name" value="<?php echo $row['name']; ?>" required />
								</div>
							</div>
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">品牌分类</span>
								</div>
								<div class="col-10">
									<select class="form-control" name="brand_type">
										<option value="1"<?php if ((int)$row['type'] === 1) echo ' selected'; ?>>厂家品牌</option>
										<option value="2"<?php if ((int)$row['type'] === 2) echo ' selected'; ?>>车型品牌</option>
										<option value="3"<?php if ((int)$row['type'] === 3) echo ' selected'; ?>>机型品牌</option>
									</select>
								</div>
							</div>
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">品牌形象</span>
								</div>
								<div class="col-10">
									<div class="w-100 text-center" id="original">
										<img class="box-shadow-1" src="<?php if ($row['image']) echo $row['image']; else echo base_url('public/uploads/brands/no_image.png') ?>" style="max-width: 300px;" alt="Image" /><br>
										<div class="mt-1">
											<button type="button" class="btn btn-primary btn-glow box-shadow-1" onclick="changeImage()">更换</button>
											<?php
											if ($row['image']) {
												echo '<button type="button" class="btn btn-danger btn-glow box-shadow-1 ml-1" onclick="deleteImage()">删除</button>';
											}
											?>
										</div>
									</div>
									<div class="w-100" id="newly" style="display: none;">
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
									</div>
									<input type="hidden" name="image_changed" value="no" />
									<input type="hidden" name="brand_image" />
								</div>
							</div>
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 4px;">
									<span style="font-size: 16px;">品牌状态</span>
								</div>
								<div class="col-10">
									<div class="switchery-container">
										<input type="checkbox" id="switchery" class="switchery" data-size="sm"/>
										<label for="switchery" class="font-medium-2 text-bold-600 ml-1">Switchery Default</label>
									</div>
								</div>
								<input type="hidden" name="brand_status" value="<?php echo $row['status']; ?>" />
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