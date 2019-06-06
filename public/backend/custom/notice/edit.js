let switchery, changeCheckbox;

$(document).ready(function() {
	changeCheckbox = document.querySelector('.switchery');
	changeCheckbox.onchange = function() {
		$("label[for='switchery']").html((changeCheckbox.checked === true)?"可用":"未用");
		$('input[name="notice_status"]').val((changeCheckbox.checked === true)?1:0);
	};
	changeCheckbox.checked = (parseInt($('input[name="notice_status"]').val()) === 1);
	switchery = new Switchery($('#switchery').get(0), {color: "#37BC9B"});
	changeCheckbox.onchange();

	$('.summernote').summernote({
		height: 450,
		lang: 'zh-CN'
	});
});
