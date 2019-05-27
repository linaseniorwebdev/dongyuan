let switchery, changeCheckbox;

$(document).ready(function() {
	changeCheckbox = document.querySelector('.switchery');
	changeCheckbox.onchange = function() {
		$("label[for='switchery']").html((changeCheckbox.checked === true)?"可用":"未用");
		$('input[name="brand_status"]').val((changeCheckbox.checked === true)?1:0);
	};
	changeCheckbox.checked = (parseInt($('input[name="brand_status"]').val()) === 1);
	switchery = new Switchery($('#switchery').get(0), {color: "#37BC9B"});
	changeCheckbox.onchange();
});


function changeImage() {
	$("input[name='image_changed']").val("yes");
	$("#original").fadeOut(function () {
		$("#newly").fadeIn("fast");
	})
}

function deleteImage() {
	$("input[name='image_changed']").val("yes");
	$("img.box-shadow-1").attr("src", "public/uploads/brands/no_image.png");
	$("button.btn-danger").fadeOut("fast");
}