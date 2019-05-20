let curLevel, curID;

$(document).ready(function() {

});

function addItem(obj) {
	curLevel = obj.previousElementSibling.previousElementSibling.value;
	curID    = obj.previousElementSibling.value;
	$('#addModal').modal('toggle');
	console.log(curLevel);
	console.log(curID);
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
