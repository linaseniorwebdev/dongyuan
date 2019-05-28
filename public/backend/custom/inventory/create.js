let level1, level2, level3, tID;

$(document).ready(function() {
	$("#level1").select2({
		placeholder: "请选分类",
		allowClear: false
	});

	level1 = $("input[name='level1']").val();
	level2 = -1;
	level3 = -1;
	tID = -1;
	$.post("../../api/category/list", {level: 2, id: level1}, function(data) {
		data = JSON.parse(data);
		$.each(data, function (i, v) {
			if (tID < 0) tID = v.id;
			let buffer = '<option value="' + v.id + '">' + v.name + '</option>';
			$("#level2").append(buffer);
		});

		$("#level3").empty();
		if (tID > 0) {
			level2 = tID; level3 = -1;
			$.post("../../api/category/list", {level: 3, id: tID}, function(data) {
				data = JSON.parse(data);
				$.each(data, function (i, v) {
					if (level3 < 0) level3 = v.id;
					let buffer = '<option value="' + v.id + '">' + v.name + '</option>';
					$("#level3").append(buffer);
				});
			});
		}
	});

	$("#level2").select2({
		placeholder: "请选分类",
		allowClear: false
	});

	$("#level3").select2({
		placeholder: "请选分类",
		allowClear: false
	});

	$("#brand1").select2({
		placeholder: "请选品牌",
		allowClear: false
	});

	$("#brand2").select2({
		placeholder: "请选品牌",
		allowClear: false
	});

	$("#brand3").select2({
		placeholder: "请选品牌",
		allowClear: false
	});

	$("#cities").select2({
		placeholder: "请选分类",
		allowClear: false
	});

	$("#inventories").select2({
		placeholder: "请选库存",
		allowClear: false
	});
});

$('#level1').on('select2:select', function (e) {
	let data = e.params.data;
	let id = data.id;

	level1 = id;
	level2 = -1;
	level3 = -1;
	tID = -1;

	$("#level2").empty();
	$.post("../../api/category/list", {level: 2, id: id}, function(data) {
		data = JSON.parse(data);
		$.each(data, function (i, v) {
			if (tID < 0) tID = v.id;
			let buffer = '<option value="' + v.id + '">' + v.name + '</option>';
			$("#level2").append(buffer);
		});

		$("#level3").empty();
		if (tID > 0) {
			level2 = tID; level3 = -1;
			$.post("../../api/category/list", {level: 3, id: tID}, function(data) {
				data = JSON.parse(data);
				$.each(data, function (i, v) {
					if (level3 < 0) level3 = v.id;
					let buffer = '<option value="' + v.id + '">' + v.name + '</option>';
					$("#level3").append(buffer);
				});
			});
		}
	});

	$("#level2").select2({
		placeholder: "请选分类",
		allowClear: false
	});

	$("#level3").select2({
		placeholder: "请选分类",
		allowClear: false
	});
});

$('#level2').on('select2:select', function (e) {
	let data = e.params.data;
	let id = data.id;

	level2 = id;
	level3 = -1;

	$("#level3").empty();
	$.post("../../api/category/list", {level: 3, id: id}, function(data) {
		data = JSON.parse(data);
		$.each(data, function (i, v) {
			if (level3 < 0) level3 = v.id;
			let buffer = '<option value="' + v.id + '">' + v.name + '</option>';
			$("#level3").append(buffer);
		});
	});

	$("#level3").select2({
		placeholder: "请选分类",
		allowClear: false
	});
});

$('#level3').on('select2:select', function (e) {
	let data = e.params.data;
	let id = data.id;

	level3 = id;
});

$('#brand1').on('select2:select', function (e) {
	$("input[name='brand1']").val(e.params.data.id);
});

$('#brand2').on('select2:select', function (e) {
	$("input[name='brand2']").val(e.params.data.id);
});

$('#brand3').on('select2:select', function (e) {
	$("input[name='brand3']").val(e.params.data.id);
});

function keyPressed(obj) {
	let isLast = $(obj).parent().parent().is(':last-child');
	if (isLast === true) {
		let $clicker = $(obj).parent().next().children().eq(0);

		$clicker.fadeIn('fast');
		let $root = $(obj).parent().parent().parent();

		let buffer = '<div class="form-group row no-gutters">';
		buffer += '<div class="col-10">';
		buffer += '<input type="url" name="i_links[]" class="form-control" onkeypress="keyPressed(this)" placeholder="网址" />';
		buffer += '</div>';
		buffer += '<div class="col-2" style="padding-top: 0.8rem; padding-left: 0.8rem;">';
		buffer += '<a href="javascript:void(0)" onclick="clickedMe(this)" style="display: none;"><i class="la la-times text-danger"></i></a>';
		buffer += '</div>';
		buffer += '</div>';

		$root.append(buffer);

		$(obj).prop('required',true);
	}
}

function clickedMe(obj) {
	let $parent = $(obj).parent().parent();
	swal({
		title: "确定吗？",
		icon: "info",
		buttons: {
			cancel: {
				text: "取消",
				value: null,
				visible: true,
				className: "",
				closeModal: true,
			},
			confirm: {
				text: "确定",
				value: true,
				visible: true,
				className: "",
				closeModal: true
			}
		}
	}).then(isConfirm => {
		if (isConfirm) {
			$parent.remove();
		}
	});
}

function keyClicked(obj) {
	let isLast = $(obj).parent().parent().is(':last-child');
	if (isLast === true) {
		let $clicker = $(obj).parent().next().next().children().eq(0);

		$clicker.fadeIn('fast');
		let $root = $(obj).parent().parent().parent();

		let buffer = '<div class="form-group row no-gutters">';
		buffer += '<div class="col-5 pr-1">';
		buffer += '<input type="text" name="i_models[]" class="form-control" onkeypress="keyClicked(this)" placeholder="规格" />';
		buffer += '</div>';
		buffer += '<div class="col-5 pl-1">';
		buffer += '<input type="number" name="i_prices[]" class="form-control" step="any" placeholder="价格" />';
		buffer += '</div>';
		buffer += '<div class="col-2" style="padding-top: 0.8rem; padding-left: 0.8rem;">';
		buffer += '<a href="javascript:void(0)" onclick="clickedMe(this)" style="display: none;"><i class="la la-times text-danger"></i></a>';
		buffer += '</div>';
		buffer += '</div>';

		$root.append(buffer);

		$(obj).prop('required',true);
	}
}

function beforeSubmit() {
	$("input[name='level1']").val(level1);
	$("input[name='level2']").val(level2);
	$("input[name='level3']").val(level3);
	$("input[name='i_place_of']").val($('#cities').val());
	$("input[name='i_related']").val($('#inventories').val());
	if(document.getElementById("images").files.length == 0){
		return false;
	}
}

function preview_image() {
	$('#image_preview').empty();
	let count = document.getElementById("images").files.length;
	for (let i=0; i < count; i++) {
		$('#image_preview').append('<div class="col-md-3"><img src="' + URL.createObjectURL(event.target.files[i]) + '" style="width: 100%;" alt="Image" /></div>');
	}
}