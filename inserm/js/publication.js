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
    var prochaine;
    var encours = 1;
    $('#titre-'+encours).toggleClass('active');
    $('#text-'+encours).toggleClass('noshow');
    $('#liensPublication-'+encours).toggleClass('noshow');

    $('.titreOutils').click(function(e) { 
        prochaine = $(e.target).attr('id').split("-")[1];
        anime_menu();
    });
}
window.onload = publication;