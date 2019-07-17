function outils() {
	function flipflop(id) {
		var element = document.getElementById("flipText");
		if (!document.getElementById(id).style.display || document.getElementById(id).style.display == "none") {
			document.getElementById(id).style.display = "block";
			$("img[title='moreText']").css("display", "none");
			$("img[title='lessText']").css("display", "inline-block");
		}
		else {
			document.getElementById(id).style.display = "none";
			$("img[title='moreText']").css("display", "inline-block");
			$("img[title='lessText']").css("display", "none");
		}
	}
	$("img[title='lessText']").css("display", "none");
	$('.imgClick').click(function(e){ 
		flipflop('frame'); 
		return false; 
	});

}
window.onload = outils;