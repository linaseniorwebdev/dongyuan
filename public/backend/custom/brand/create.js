let imageURL;

$(document).ready(function() {

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