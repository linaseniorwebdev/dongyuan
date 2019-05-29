
$(document).ready(function() {
	changeCheckbox = document.querySelector('.switchery');
	changeCheckbox.onchange = function() {
		this.previousElementSibling.value = (this.checked)?1:0;
	};
	let elems = $('.switchery');
	$.each( elems, function( key, value ) {
		let switchery = new Switchery($(this)[0], { className: "switchery", color: "#37BC9B" });
	});
});
