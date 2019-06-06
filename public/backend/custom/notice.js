let table;

$(document).ready(function() {
	table = $('#users').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		autoWidth: false,
		order: [],
		ajax: {
			url : "../api/notice/list",
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
				render: function(data, type, row) {
					return '<a href="javascript:void(0)" onclick="showDialog(this)">查看详情</a>';
				},
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
				render: function(data, type, row) {
					if (parseInt(data) === 1) {
						return '<i class="la la-check text-success"></i>';
					}
					return '<i class="la la-times text-danger"></i>';
				},
				orderable: false
			},
			{
				targets: [5],
				className: 'text-center',
				render: function(data, type, row) {
					let buffer = '<input type="hidden" value="' + row[6] + '" />';
					buffer += ('<button type="button" class="btn btn-success round box-shadow-1 mr-1" onclick="modifyItem(this)">编辑</button>');
					buffer += ('<button type="button" class="btn btn-danger round box-shadow-1" onclick="deleteItem(this)">删除</button>');
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
			"lengthMenu":     "显示 _MENU_ 项结果",
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

function modifyItem(obj) {
	let userID = obj.previousElementSibling.value;
	let status = 1 - parseInt(obj.previousElementSibling.previousElementSibling.value);

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
				closeModal: false
			}
		}
	}).then(isConfirm => {
		if (isConfirm) {
			$.post(
				'../api/user/update',
				{
					id    : userID,
					status: status
				},
				function (respond) {
					table.ajax.reload( null, false );
					swal("更改成功!", "", "success");
				}
			);
		}
	});
}

function deleteItem(obj) {
	let userID = obj.previousElementSibling.previousElementSibling.value;

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
				closeModal: false
			}
		}
	}).then(isConfirm => {
		if (isConfirm) {
			$.post(
				'../api/user/delete',
				{
					id  : userID
				},
				function (respond) {
					table.ajax.reload( null, false );
					swal("删除成功!", "", "success");
				}
			);
		}
	});
}
