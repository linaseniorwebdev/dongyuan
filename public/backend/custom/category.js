let curLevel, curID, switchery;

$(document).ready(function() {
	switchery = new Switchery($('#switchery').get(0), {className: "switchery", color: "#37BC9B"});
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

function editItem(obj) {
	// curLevel = obj.previousElementSibling.previousElementSibling.value;
	// curID    = obj.previousElementSibling.value;
	$('#editModal').modal('toggle');
	// console.log(curLevel);
	// console.log(curID);
}