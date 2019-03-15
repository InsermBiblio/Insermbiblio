function flipflop() {
    function anime_text(){
        if (encours === before) {
	        $('#text-'+encours).toggleClass('noshow siteText');
		    $('#arrow-'+encours).toggleClass('moreText lessText');
		}
		else {
	        $('#text-'+encours).removeClass('noshow');
	        $('#text-'+encours).addClass('siteText');
		    $('#arrow-'+encours).removeClass('moreText');
		    $('#arrow-'+encours).addClass('lessText');
	        $('#text-'+before).removeClass('siteText'); 
	        $('#text-'+before).addClass('noshow'); 
	        $('#arrow-'+before).removeClass('lessText');
	        $('#arrow-'+before).addClass('moreText');
    	}
        before = encours;
    }
    var encours;
    var before = 0;
    $('.changeText').click(function(e) { 
        encours = $(e.target).attr('id').split("-")[1];
        anime_text();
    });
}
window.onload = flipflop;