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
				<h3 class="content-header-title mb-0 d-inline-block">资讯编辑</h3>
			</div>
			<div class="content-header-right col-md-6 col-12">
				<div class="btn-group float-md-right">
					<a href="<?php echo base_url('admin/notice'); ?>" class="btn btn-info" style="font-size: 18px;">退回</a>
				</div>
			</div>
		</div>
		<div class="content-body">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<form action="<?php echo base_url('api/notice/update'); ?>" method="post">
							<input type="hidden" name="notice_id" value="<?php echo $row['id']; ?>" />
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">资讯主题</span>
								</div>
								<div class="col-10">
									<input type="text" class="form-control" name="notice_title" value="<?php echo $row['title']; ?>" required />
								</div>
							</div>
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">资讯详情</span>
								</div>
								<div class="col-10">
									<textarea class="summernote" name="notice_detail">
										<?php echo $row['detail']; ?>
									</textarea>
								</div>
							</div>
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 4px;">
									<span style="font-size: 16px;">资讯状态</span>
								</div>
								<div class="col-10">
									<div class="switchery-container">
										<input type="checkbox" id="switchery" class="switchery" data-size="sm"/>
										<label for="switchery" class="font-medium-2 text-bold-600 ml-1">Switchery Default</label>
									</div>
								</div>
								<input type="hidden" name="notice_status" value="<?php echo $row['status']; ?>" />
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
