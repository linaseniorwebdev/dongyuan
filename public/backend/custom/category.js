let curLevel, curID, switchery, changeCheckbox;

$(document).ready(function() {
	changeCheckbox = document.querySelector('.switchery');
	changeCheckbox.onchange = function() {
		$("label[for='switchery']").html((changeCheckbox.checked === true)?"可用":"未用");
		$('input[name="item_status_edit"]').val((changeCheckbox.checked === true)?1:0);
	};
});

function addItem(obj) {
	curLevel = obj.previousElementSibling.previousElementSibling.value;
	curID    = obj.previousElementSibling.value;
	$('#addModal').modal('toggle');
}

function addItemConfirm() {
	let name = $('#item_name_new').val();
	if (name.length < 1) {
		swal({
			title: "警告",
			text: "”名称“不能为空",
			icon: "warning",
			buttons: {
				confirm: {
					text: "确定",
					value: true,
					visible: true,
					className: "",
					closeModal: true
				}
			}
		});
		return;
	}

	$.post(
		'../api/category/create',
		{
			level   : curLevel,
			parent  : curID,
			name    : name
		},
		function(respond) {
			location.reload();
		}
	);
}

function editItem(obj) {
	$('.switchery-container > span').remove();
	$('input[name="item_id_edit"]').val(obj.previousElementSibling.previousElementSibling.previousElementSibling.value);
	$('input[name="item_name_edit"]').val(obj.previousElementSibling.previousElementSibling.value);
	$('input[name="item_status_edit"]').val(obj.previousElementSibling.value);
	changeCheckbox.checked = (parseInt(obj.previousElementSibling.value) === 1);
	switchery = new Switchery($('#switchery').get(0), {color: "#37BC9B"});
	changeCheckbox.onchange();
	$('#editModal').modal('toggle');
}

function deleteItem(obj) {
	let delID = obj.parentElement.firstElementChild.value;

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
				'../api/category/delete',
				{
					id  : delID
				},
				function (respond) {
					location.reload();
				}
			);
		}
	});
}