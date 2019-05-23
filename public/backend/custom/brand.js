
$(document).ready(function() {

});

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
			$.post(
				'../api/brand/delete',
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