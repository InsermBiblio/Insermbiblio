function publication() {
    function anime_menu(){
        $('#text-'+encours).toggleClass('noshow');
        $('#liensPublication-'+encours).toggleClass('noshow'); 
        $('#titre-'+encours).toggleClass('active'); 
        $('#text-'+prochaine).toggleClass('noshow');
        $('#liensPublication-'+prochaine).toggleClass('noshow'); 
        $('#titre-'+prochaine).toggleClass('active'); 
        encours = prochaine;        
    }
    var url = window.location.search;
    var encours = url.split("link=")[1];   
    var prochaine;
    if ( typeof encours === 'undefined') {
        $( ".menuOutil li:first-child" ).toggleClass('active');
        $( "#textPublications div:first-child" ).toggleClass('noshow');
        $( "#liensPublications div:first-child" ).toggleClass('noshow');
        encours = 1;
    }
    $('#titre-'+encours).toggleClass('active');
    $('#text-'+encours).toggleClass('noshow');
    $('#liensPublication-'+encours).toggleClass('noshow');

    $('.outilsBib').click(function(e) {
        if (encours == 1) {
            $( ".menuOutil li:first-child" ).toggleClass('active');
            $( "#textPublications div:first-child" ).toggleClass('noshow');
            $( "#liensPublications div:first-child" ).toggleClass('noshow');            
        }
        prochaine = $(e.target).attr('id').split("-")[1];
        anime_menu();
    });
}
window.onload = publication;