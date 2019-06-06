let table, status, colors, curID, curState, curOption;

$(document).ready(function() {
	status = ['待付款', '待发货', '待收货', '已完成', '已关闭', '已取消'];
	colors = ['secondary', 'info', 'primary', 'success', 'warning', 'danger'];
	status[51] = '请求取消(待发货)';
	status[52] = '请求取消(待收货)';
	colors[51] = 'warning';
	colors[52] = 'warning';
	table = $('#orders').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		autoWidth: false,
		order: [],
		ajax: {
			url : "../api/order/list",
			type: "POST",
			error: function (xhr, ajaxOptions, thrownError) {
				console.log(xhr);
			}
		},
		columnDefs: [
			{
				targets: [0],
				className: 'text-center',
				orderable: false
			},
			{
				targets: [1],
				className: 'text-center',
				orderable: false
			},
			{
				targets: [2],
				className: 'text-center',
				orderable: false
			},
			{
				targets: [3],
				className: 'text-center',
				orderable: false
			},
			{
				targets: [4],
				className: 'text-center',
				orderable: false
			},
			{
				targets: [5],
				className: 'text-center',
				render: function(data, type, row) {
					return '<div class="badge badge-pill badge-' + colors[parseInt(data)] + '">' + status[parseInt(data)] + '</div>';
				},
				orderable: false
			},
			{
				targets: [6],
				className: 'text-center',
				render: function(data, type, row) {
					if (parseInt(row[5]) > 2) {
						return '';
					}
					let buffer = '<button type="button" class="btn btn-primary round box-shadow-1 mr-1" onclick="updateOrder(this)">更 新</button>';
					buffer += ('<input type="hidden" value="' + row[7] + '" />');
					buffer += ('<input type="hidden" value="' + row[5] + '" />');
					buffer += ('<input type="hidden" value="' + row[8] + '" />');
					return buffer;
				},
				orderable: false
			}
		],
		language: {
			"decimal":        ",",
			"emptyTable":     "表中数据为空",
			"info":           "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
			"infoEmpty":      "显示第 0 至 0 项结果，共 0 项",
			"infoFiltered":   "(由 _MAX_ 项结果过滤)",
			"infoPostFix":    "",
			"lengthMenu":     "显示_MENU_条目",
			"loadingRecords": "载入中...",
			"processing":     "处理中...",
			"search":         "搜索:",
			"zeroRecords":    "没有匹配结果",
			"paginate": {
				"first":      "首页",
				"last":       "末页",
				"next":       "下页",
				"previous":   "上页"
			},
			"aria": {
				"sortAscending":  ": 以升序排列此列",
				"sortDescending": ": 以降序排列此列"
			}
		}
	});
});

function updateOrder(obj) {
	curID = parseInt(obj.nextElementSibling.value);
	curState = parseInt(obj.nextElementSibling.nextElementSibling.value);
	$("#remark").val(obj.nextElementSibling.nextElementSibling.nextElementSibling.value);
	curOption = curState + 1;

	if (curState > 5) {
		$("#option1").fadeOut("fast");
		$("#option2").click();
	} else {
		$("#option1").fadeIn("fast").click();
	}

	let $st_div_1 = $("#option1 .media:eq(0) > div");
	let $st_div_2 = $("#option1 .media:eq(1) > div");
	let $st_txt_1 = $("#option1 .media:eq(0) > div > h5");
	let $st_txt_2 = $("#option1 .media:eq(1) > div > h5");
	let $ed_div_1 = $("#option2 .media:eq(0) > div");
	let $ed_div_2 = $("#option2 .media:eq(1) > div");
	let $ed_txt_1 = $("#option2 .media:eq(0) > div > h5");
	let $ed_txt_2 = $("#option2 .media:eq(1) > div > h5");
	let classes   = null;

	switch (curState) {
		case 0:
			classes = $st_div_1.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$st_div_1.removeClass(v);
			});
			$st_div_1.addClass('bg-gradient-x-blue-grey');
			$st_txt_1.html(status[0]);

			classes = $st_div_2.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$st_div_2.removeClass(v);
			});
			$st_div_2.addClass('bg-gradient-x-' + colors[1]);
			$st_txt_2.html(status[1]);

			classes = $ed_div_1.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$ed_div_1.removeClass(v);
			});
			$ed_div_1.addClass('bg-gradient-x-blue-grey');
			$ed_txt_1.html(status[0]);

			classes = $ed_div_2.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$ed_div_2.removeClass(v);
			});
			$ed_div_2.addClass('bg-gradient-x-' + colors[5]);
			$ed_txt_2.html(status[5]);
			break;
		case 1:
			classes = $st_div_1.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$st_div_1.removeClass(v);
			});
			$st_div_1.addClass('bg-gradient-x-' + colors[1]);
			$st_txt_1.html(status[1]);

			classes = $st_div_2.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$st_div_2.removeClass(v);
			});
			$st_div_2.addClass('bg-gradient-x-' + colors[2]);
			$st_txt_2.html(status[2]);

			classes = $ed_div_1.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$ed_div_1.removeClass(v);
			});
			$ed_div_1.addClass('bg-gradient-x-' + colors[1]);
			$ed_txt_1.html(status[1]);

			classes = $ed_div_2.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$ed_div_2.removeClass(v);
			});
			$ed_div_2.addClass('bg-gradient-x-' + colors[5]);
			$ed_txt_2.html(status[5]);
			break;
		case 2:
			classes = $st_div_1.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$st_div_1.removeClass(v);
			});
			$st_div_1.addClass('bg-gradient-x-' + colors[2]);
			$st_txt_1.html(status[2]);

			classes = $st_div_2.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$st_div_2.removeClass(v);
			});
			$st_div_2.addClass('bg-gradient-x-' + colors[3]);
			$st_txt_2.html(status[3]);

			classes = $ed_div_1.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$ed_div_1.removeClass(v);
			});
			$ed_div_1.addClass('bg-gradient-x-' + colors[2]);
			$ed_txt_1.html(status[2]);

			classes = $ed_div_2.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$ed_div_2.removeClass(v);
			});
			$ed_div_2.addClass('bg-gradient-x-' + colors[5]);
			$ed_txt_2.html(status[5]);
			break;
		case 51:
			classes = $ed_div_1.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$ed_div_1.removeClass(v);
			});
			$ed_div_1.addClass('bg-gradient-x-' + colors[1]);
			$ed_txt_1.html(status[1]);

			classes = $ed_div_2.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$ed_div_2.removeClass(v);
			});
			$ed_div_2.addClass('bg-gradient-x-' + colors[5]);
			$ed_txt_2.html(status[5]);
			break;
		case 52:
			classes = $ed_div_1.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$ed_div_1.removeClass(v);
			});
			$ed_div_1.addClass('bg-gradient-x-' + colors[2]);
			$ed_txt_1.html(status[2]);

			classes = $ed_div_2.attr("class").split(" ");
			$.each(classes, function(i, v) {
				if (v.indexOf('bg-') >= 0)
					$ed_div_2.removeClass(v);
			});
			$ed_div_2.addClass('bg-gradient-x-' + colors[5]);
			$ed_txt_2.html(status[5]);
			break;
		default:
			break;
	}
	$("#updateModal").modal({backdrop: 'static', keyboard: false});
}

function confirmUpdate() {
	$.post(
		'../api/order/update',
		{
			id: curID,
			status: curOption,
			remark: $("#remark").val()
		},
		function (data) {
			table.ajax.reload( null, false );
			swal("处理成功!", "", "success");
			$("#updateModal").modal("toggle");
		}
	);
}

$("#option1").click(function() {
	curOption = curState + 1;
	if ($(this).hasClass("selected"))
		return;
	$("#option2").removeClass("selected");
	$("#option1").addClass("selected");
});

$("#option2").click(function() {
	curOption = 5;
	if ($(this).hasClass("selected"))
		return;
	$("#option1").removeClass("selected");
	$("#option2").addClass("selected");
});
