// JavaScript Document
$(document).ready(function (e) {
	$(".mainmu").mouseover(
		function () {
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		function () {
			$(this).children(".mw").hide()
		}
	)
});
function lo(x) {
	location.replace(x)
}
function op(x, y, url) {
	// x會淡入
	$(x).fadeIn()
	if (y)
		$(y).fadeIn()
	if (y && url)
		$(y).load(url)
}
function cl(x) {
	// x會淡出
	$(x).fadeOut();
}