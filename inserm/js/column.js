function flipflop() {
    var container;
    var i = 0;
    var numCols = 2;
    var useScreen = $('#pageContent').width();
    if (useScreen < 1071) {
    	numCols =1;
    	$('#columnSite').css('width', '310px');
    	$('#pageSites').css('justify-content', 'center');
    }
    var colCount = Math.ceil($('.siteThematique').length / numCols);
    console.log(colCount);


    $('.siteThematique').each(function () {
        if (i % colCount === 0) {
            container = $('<div class="siteCol"></div>').appendTo("#columnSite");
        }
        $(this).appendTo(container);
        i++;
    });

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