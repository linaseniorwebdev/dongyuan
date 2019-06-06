let switchery, changeCheckbox;

$(document).ready(function() {
	changeCheckbox = document.querySelector('.switchery');
	changeCheckbox.onchange = function() {
		$("label[for='switchery']").html((changeCheckbox.checked === true)?"可用":"未用");
		$('input[name="ad_status"]').val((changeCheckbox.checked === true)?1:0);
	};
	changeCheckbox.checked = (parseInt($('input[name="ad_status"]').val()) === 1);
	switchery = new Switchery($('#switchery').get(0), {color: "#37BC9B"});
	changeCheckbox.onchange();
});

function readURL(input) {
	if (input.files && input.files[0]) {
		let reader = new FileReader();

		reader.onload = function (e) {
			$('#preview').attr("src", e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
		$("input[name='image_changed']").val("yes");
	} else {
		$('#preview').attr("src", "../public/uploads/sliders/" + $("input[name='default']").val());
		$("input[name='image_changed']").val("no");
	}
}
