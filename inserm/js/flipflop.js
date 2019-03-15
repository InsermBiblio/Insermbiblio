function flipflop(id)
{
	var element = document.getElementById("flipText");
	if (!document.getElementById(id).style.display || document.getElementById(id).style.display == "none") {
		document.getElementById(id).style.display = "block";
		element.classList.remove("moreText");
		element.classList.add("lessText");
	}
	else {
		document.getElementById(id).style.display = "none";
		element.classList.remove("lessText");
		element.classList.add("moreText");
	}
}