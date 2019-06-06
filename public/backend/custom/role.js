let table1, table2;

$(document).ready(function() {
	table1 = $('#roles').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		autoWidth: false,
		order: [],
		ajax: {
			url : "../api/role/list",
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
					if (parseInt(data) === 1) {
						return '<i class="la la-check text-success"></i>';
					}
					return '<i class="la la-times text-danger"></i>';
				},
				orderable: false
			},
			{
				targets: [3],
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
					if (parseInt(data) === 1) {
						return '<i class="la la-check text-success"></i>';
					}
					return '<i class="la la-times text-danger"></i>';
				},
				orderable: false
			},
			{
				targets: [6],
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
				targets: [7],
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
				targets: [8],
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
				targets: [9],
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
				targets: [10],
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
				targets: [11],
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
				targets: [12],
				className: 'text-center',
				render: function(data, type, row) {
					if (parseInt(row[13]) > 1) {
						let buffer = row[2];
						for (let i = 3; i < 11; i++) {
							buffer += (':' + row[i]);
						}
						buffer = '<input type="hidden" value="' + buffer + '" />';
						buffer += ('<input type="hidden" value="' + row[1] + '" />');
						buffer += ('<input type="hidden" value="' + row[13] + '" />');
						buffer += ('<button type="button" class="btn btn-info round box-shadow-1" onclick="modifyRole(this)">编辑</button>');
						return buffer;
					}
					return '';
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

	table2 = $('#admins').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		autoWidth: false,
		order: [],
		ajax: {
			url : "../api/admin/list",
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
					if (parseInt(data) === 1) {
						return '<i class="la la-check text-success"></i>';
					}
					return '<i class="la la-times text-danger"></i>';
				},
				orderable: false
			},
			{
				targets: [6],
				className: 'text-center',
				render: function(data, type, row) {
					let buffer = '<input type="hidden" value="' + row[5] + '" />';
					buffer += '<input type="hidden" value="' + row[7] + '" />';
					if (parseInt(row[7]) > 1) {
						if (parseInt(row[5]) === 1) {
							buffer += ('<button type="button" class="btn btn-secondary round box-shadow-1 mr-1" onclick="modifyAdmin(this)">停用</button>');
						} else {
							buffer += ('<button type="button" class="btn btn-success round box-shadow-1 mr-1" onclick="modifyAdmin(this)">允用</button>');
						}
						buffer += ('<button type="button" class="btn btn-danger round box-shadow-1" onclick="deleteAdmin(this)">删除</button>');
					}
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

function modifyRole(obj) {
	let userID = obj.previousElementSibling.value;
	let name   = obj.previousElementSibling.previousElementSibling.value;
	let status = obj.previousElementSibling.previousElementSibling.previousElementSibling.value;
	location.href = 'role/edit?id=' + userID + '&name=' + name + '&data=' + status;
}

function modifyAdmin(obj) {
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
					table2.ajax.reload( null, false );
					swal("更改成功!", "", "success");
				}
			);
		}
	});
}

function deleteAdmin(obj) {
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
					table2.ajax.reload( null, false );
					swal("删除成功!", "", "success");
				}
			);
		}
	});
}
