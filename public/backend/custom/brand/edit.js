let imageURL, switchery, changeCheckbox;

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

$('.file-chooser').on('click', 'button', function () {
	$(".file-chooser > .file-container").click();
	return false;
});

$('.file-chooser > .file-container').on('change', function() {
	let file = $(this).prop('files')[0];
	let url = URL.createObjectURL(file);
	$(".img-container img").fadeIn().prop('src', url).cropper({
		viewMode: 1,
		aspectRatio: 1
	});
	$(".file-chooser").fadeOut("fast", function() {
		$(".file-confirm").fadeIn("fast");
	});
});

$(".file-confirm button").click(function() {
	let cropper = $(".img-container img").data('cropper');
	let imageCanvas = cropper.getCroppedCanvas();
	imageURL = imageCanvas.toDataURL();
	$("input[name='brand_image']").val(imageURL);
	$(".file-confirm").fadeOut("fast");
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