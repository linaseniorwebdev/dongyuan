<!-- BEGIN::Body -->
<style>
	.upload-btn-wrapper {
		position: relative;
		overflow: hidden;
		display: inline-block;
	}
	
	.cbtn {
		border: 2px solid gray;
		color: gray;
		background-color: white;
		padding: 8px 20px;
		border-radius: 8px;
		font-size: 15px;
		font-weight: bold;
	}
	
	.upload-btn-wrapper input[type=file] {
		font-size: 100px;
		position: absolute;
		left: 0;
		top: 0;
		opacity: 0;
	}
</style>
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
				<h3 class="content-header-title mb-0 d-inline-block">创建新广告</h3>
			</div>
			<div class="content-header-right col-md-6 col-12">
				<div class="btn-group float-md-right">
					<a href="<?php echo base_url('admin/slider'); ?>" class="btn btn-info" style="font-size: 18px;">退回</a>
				</div>
			</div>
		</div>
		<div class="content-body">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<form action="<?php echo base_url('api/slider/update'); ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="ad_id" value="<?php echo $row['id']; ?>" />
							<input type="hidden" name="default" value="<?php echo $row['image']; ?>" />
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">广告详情</span>
								</div>
								<div class="col-10">
									<input type="text" class="form-control" name="ad_name" value="<?php echo $row['title']; ?>" required />
								</div>
							</div>
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">广告图像</span>
								</div>
								<div class="col-10">
									<div class="upload-btn-wrapper">
										<button class="cbtn">选择图像文件</button>
										<input type="file" name="userfile" onchange="readURL(this);" accept="image/*" />
										<span>&nbsp;&nbsp;&nbsp;建议图像宽高比应为16:9</span>
									</div>
									<div class="mt-2">
										<img id="preview" src="<?php echo base_url('public/uploads/sliders/' . $row['image']) ?>" alt="Preview" style="max-width: 500px; margin-left: auto; margin-right: auto; display: block;" />
										<input type="hidden" name="image_changed" value="no" />
									</div>
								</div>
							</div>
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 4px;">
									<span style="font-size: 16px;">广告状态</span>
								</div>
								<div class="col-10">
									<div class="switchery-container">
										<input type="checkbox" id="switchery" class="switchery" data-size="sm"/>
										<label for="switchery" class="font-medium-2 text-bold-600 ml-1">Switchery Default</label>
									</div>
								</div>
								<input type="hidden" name="ad_status" value="<?php echo $row['status']; ?>" />
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
