<!-- BEGIN::Body -->
<style>
	input[type=number]::-webkit-inner-spin-button,
	input[type=number]::-webkit-outer-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}
</style>
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
				<h3 class="content-header-title mb-0 d-inline-block">添加新库存</h3>
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
						<form action="<?=base_url('api/inventory/create')?>" method="post" enctype="multipart/form-data">
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">选择类型</span>
								</div>
								<div class="col-9">
									<div class="row">
										<div class="col-4">
											<input type="hidden" name="level1" value="<?=$levels[0]['id']?>" />
											<select class="select2 form-control" id="level1">
												<?php
												foreach ($levels as $level) {
													echo '<option value="' . $level['id'] . '">' . $level['name'] . '</option>';
												}
												?>
											</select>
										</div>
										<div class="col-4">
											<input type="hidden" name="level2" />
											<select class="select2 form-control" id="level2"></select>
										</div>
										<div class="col-4">
											<input type="hidden" name="level3" />
											<select class="select2 form-control" id="level3"></select>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">库存名称</span>
								</div>
								<div class="col-9">
									<input type="text" class="form-control" name="i_name" required />
								</div>
							</div>

							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">库存描述</span>
								</div>
								<div class="col-9">
									<input type="text" class="form-control" name="i_brief" required />
								</div>
							</div>

							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">库存图片</span>
								</div>
								<div class="col-10">
									<input type="file" id="images" name="images[]" onchange="preview_image();" accept="image/*" multiple/>
									<div class="row mt-3" id="image_preview"></div>
								</div>
							</div>

							<input type="hidden" name="brand1" value="<?=$brands1[0]['id']?>" />
							<input type="hidden" name="brand2" value="<?=$brands2[0]['id']?>" />
							<input type="hidden" name="brand3" value="<?=$brands3[0]['id']?>" />
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">选择品牌</span>
								</div>
								<div class="col-9">
									<div class="row">
										<div class="col-4">
											<select class="select2 form-control" id="brand1">
												<?php
												foreach ($brands1 as $level) {
													echo '<option value="' . $level['id'] . '">' . $level['name'] . '</option>';
												}
												?>
											</select>
										</div>
										<div class="col-4">
											<input type="hidden" name="level2" />
											<select class="select2 form-control" id="brand2">
												<?php
												foreach ($brands2 as $level) {
													echo '<option value="' . $level['id'] . '">' . $level['name'] . '</option>';
												}
												?>
											</select>
										</div>
										<div class="col-4">
											<input type="hidden" name="level3" />
											<select class="select2 form-control" id="brand3">
												<?php
												foreach ($brands3 as $level) {
													echo '<option value="' . $level['id'] . '">' . $level['name'] . '</option>';
												}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<!-- Branches -->
							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">规格/价格</span>
								</div>
								<div class="col-10">
									<div class="form-group row no-gutters">
										<div class="col-5 pr-1">
											<input type="text" name="i_models[]" class="form-control" onkeypress="keyClicked(this)" placeholder="规格" />
										</div>
										<div class="col-5 pl-1">
											<input type="number" name="i_prices[]" class="form-control" step="any" placeholder="价格" />
										</div>
										<div class="col-2" style="padding-top: 0.8rem; padding-left: 0.8rem;">
											<a href="javascript:void(0)" onclick="clickedMe(this)" style="display: none;"><i class="la la-times text-danger"></i></a>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group row no-gutters" style="margin-top: -1.5rem;">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">库存型号</span>
								</div>
								<div class="col-9">
									<input type="text" class="form-control" name="i_serial_no" required />
								</div>
							</div>

							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">选择区域</span>
								</div>
								<div class="col-9">
									<input type="hidden" name="i_place_of" />
									<select class="select2 form-control" id="cities" multiple>
										<?php
										$first = true;
										foreach ($cities as $city) {
											if (strpos($city['id'], '-') === false) {
												if ($first === false) {
													echo '</optgroup>';
												} else {
													$first = false;
												}
												echo '<optgroup label="' . $city['name'] . '">';
											} else {
												echo '<option value="' . $city['id'] . '">' . $city['name'] . '</option>';
											}
										}
										echo '</optgroup>';
										?>
									</select>
								</div>
							</div>

							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">相关推荐</span>
								</div>
								<div class="col-9">
									<input type="hidden" name="i_related" />
									<select class="select2 form-control" id="inventories" multiple>
										<?php
										foreach ($inventories as $inventory) {
											echo '<option value="' . $inventory['id'] . '">' . $inventory['name'] . '</option>';
										}
										?>
									</select>
								</div>
							</div>

							<div class="form-group row no-gutters">
								<div class="col-2 text-right pr-1" style="padding-top: 8px;">
									<span style="font-size: 16px;">相关推荐</span>
								</div>
								<div class="col-10">
									<div class="form-group row no-gutters">
										<div class="col-10">
											<input type="url" name="i_links[]" class="form-control" onkeypress="keyPressed(this)" placeholder="网址" />
										</div>
										<div class="col-2" style="padding-top: 0.8rem; padding-left: 0.8rem;">
											<a href="javascript:void(0)" onclick="clickedMe(this)" style="display: none;"><i class="la la-times text-danger"></i></a>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group text-center mb-0">
								<button type="submit" class="btn btn-success btn-glow box-shadow-1 font-medium-3" onclick="return beforeSubmit()">提 交</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END::Body -->