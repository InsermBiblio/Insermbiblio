function outils() {
    function anime_menu(){
        $('#text-'+encours).toggleClass('noshow');
        $('#titre-'+encours).toggleClass('active'); 
        $('#text-'+prochaine).toggleClass('noshow');
        $('#titre-'+prochaine).toggleClass('active'); 
        encours = prochaine;        
    }
    var prochaine;
    var encours;

    $('.titreOutils').click(function(e) { 
        prochaine = $(e.target).attr('id').split("-")[1];
        anime_menu();
    });
}
window.onload = outils;