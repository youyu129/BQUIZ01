// JavaScript Document
$(document).ready(function (e) {
	// 當滑鼠移到mainmu的時候，他下面有一個mw的項目會被顯示出來
	$(".mainmu").mouseover(
		function () {
			$(this).children(".mw").stop().show()
		}
	)
	// 當滑鼠離開mainmu的時候，他下面有一個mw的項目會被隱藏
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