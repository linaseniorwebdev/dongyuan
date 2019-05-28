let table;

$(document).ready(function() {
	table = $('#inventories').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		autoWidth: false,
		order: [],
		ajax: {
			url : "../api/inventory/list",
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
				orderable: false
			},
			{
				targets: [2],
				orderable: false
			},
			{
				targets: [3],
				orderable: false
			},
			{
				targets: [4],
				orderable: false
			},
			{
				targets: [5],
				orderable: false
			},
			{
				targets: [6],
				orderable: false
			},
			{
				targets: [7],
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
				render: function(data, type, row) {
					let buffer = '<input type="hidden" value="' + row[0] + '" />';
					buffer += ('<input type="hidden" value="' + row[10] + '" />');
					buffer += ('<button type="button" class="btn btn-info round box-shadow-1" onclick="modifyItem(this)">编辑</button>');
					buffer += ('<button type="button" class="btn btn-danger round box-shadow-1" onclick="deleteItem(this)">删除</button>');
					return buffer;
				},
				orderable: false
			}
		],
		language: {
			"decimal":        "",
			"emptyTable":     "没有数据",
			"info":           "显示_START_到_END_的_TOTAL_个条目",
			"infoEmpty":      "显示0个条目中的0到0",
			"infoFiltered":   "(从_MAX_总条目中过滤掉)",
			"infoPostFix":    "",
			"thousands":      ",",
			"lengthMenu":     "显示_MENU_条目",
			"loadingRecords": "载入中...",
			"processing":     "处理中...",
			"search":         "搜索:",
			"zeroRecords":    "没有找到匹配的记录",
			"paginate": {
				"first":      "最初",
				"last":       "最后",
				"next":       "下一页",
				"previous":   "上一页"
			},
			"aria": {
				"sortAscending":  ": 激活以对列升序进行排序",
				"sortDescending": ": 激活以按列降序排序"
			}
		}
	});
});

function modifyItem(obj) {
	console.log(obj.previousElementSibling.value);
}

function deleteItem(obj) {
	let delID = obj.previousElementSibling.value;

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
			// $.post(
			// 	'../api/brand/delete',
			// 	{
			// 		id  : delID
			// 	},
			// 	function (respond) {
			// 		location.reload();
			// 	}
			// );
		}
	});
}