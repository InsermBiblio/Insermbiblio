function actus() {
    var next = 1; //nombre de fois apparition voir plus avant lien vers archive
    var grpnext = 2;
    var grp = 1;
    var postperpagenext = 6; //nb post par page a reporter dans loop.index(+1)de actus.twig
    Math.trunc = Math.trunc || function(x) {
        if (isNaN(x)) {
            return NaN;
        }
        if (x > 0) {
            return Math.floor(x);
        }
            return Math.ceil(x);
    };
    var elems = $(".actus");
    var pagenext = Math.ceil(elems.length/postperpagenext);
    if (grp == pagenext) {
        $( "#nextAction" ).hide();
    }
    for (var i = 6; i < elems.length; i+=postperpagenext) {
        $('.actus').hide();
        elems.slice(i, i+postperpagenext).wrapAll('<div class="actusNextGroup" id="grpNext-'+grpnext+'">');
        grpnext = grpnext + 1;
    }
    $('#grpNext-1 .actus').show();

    $('#nextAction').click(function(){
        grp = grp +1;
        $("#grpNext-"+grp+" .actus").show();
        if (grp == pagenext) {
            $( "#nextAction" ).hide();
        }
        if (grp == (next + 1)) {
            document.getElementById('nextAction').innerHTML ='<a href="/category/actus?show=archives">Toutes les archives</a> ';
        }
     });
}
window.onload = actus;