function philippePreProcess(myForm) {
    if ( ($('#searchboxedsid1').css('display') !== 'none') && ($('#searchboxedsid2').css('display') === 'none') && ($('#searchboxedsid3').css('display') === 'none')  ){ 
        myForm.bquery.value = myForm.search_prefix.value + myForm.uquery.value;
    }
    if ( ($('#searchboxedsid1').css('display') !== 'none') && ($('#searchboxedsid2').css('display') !== 'none') && ($('#searchboxedsid3').css('display') === 'none')  ) { 
        myForm.bquery.value = "( "+myForm.search_prefix.value + myForm.uquery.value +" ) " + myForm.search_bool_2.value   +" ( "+myForm.search_prefix_2.value + myForm.uquery_2.value +" ) " ;
    }
    if ( ($('#searchboxedsid1').css('display') !== 'none') && ($('#searchboxedsid2').css('display') !== 'none') && ($('#searchboxedsid3').css('display') !== 'none')  ) { 
        if((myForm.search_bool_2.value=="OR")&&(myForm.search_bool_3.value=="AND")) {
            myForm.bquery.value = "(( "+myForm.search_prefix.value + myForm.uquery.value +" ) " + myForm.search_bool_2.value   +" ( "+myForm.search_prefix_2.value + myForm.uquery_2.value +" )) " + myForm.search_bool_3.value   +" ( "+myForm.search_prefix_3.value + myForm.uquery_3.value +" ) " ;
        }
        else {
            myForm.bquery.value = "( "+myForm.search_prefix.value + myForm.uquery.value +" ) " + myForm.search_bool_2.value   +" ( "+myForm.search_prefix_2.value + myForm.uquery_2.value +" ) " + myForm.search_bool_3.value   +" ( "+myForm.search_prefix_3.value + myForm.uquery_3.value +" ) " ;
        }
    }
}
function philippeHideSecondLine() {
    if ( $('#searchboxedsid3').css('display') !== 'none' ) { 
        return;
    }
    else 
    {
        $('#searchboxedsid2').hide();
        $('#boolselectboxedsid2').hide();
        $('#targetselectboxedsid2').hide();
        $('#plus-button-id2').hide();
        $('#minus-button-id2').hide();
        $('#SearchTerm2-clear').hide();
    }
}
function philippeHideThirdLine() {
    $('#searchboxedsid3').hide();
    $('#boolselectboxedsid3').hide();
    $('#targetselectboxedsid3').hide();
    $('#plus-button-id3').hide();
    $('#minus-button-id3').hide();
    $('#SearchTerm3-clear').hide();
}
function philippeShowThirdLine(myForm) {
    $('#searchboxedsid2').show();
    $('#boolselectboxedsid2').show();
    $('#targetselectboxedsid2').show();
    $('#searchboxedsid3').show();
    $('#boolselectboxedsid3').show();
    $('#targetselectboxedsid3').show();
}
function philippeShowSecondLine(myForm) {
    $('#searchboxedsid2').show();
    $('#boolselectboxedsid2').show();
    $('#targetselectboxedsid2').show();
    $('#plus-button-id2').css({"display": "inline-block"});
    $('#minus-button-id2').css({"display": "inline-block"});
    $('#SearchTerm2-clear').show();
}
function philippeShowThirdLine(myForm) {
    $('#searchboxedsid3').show();
    $('#boolselectboxedsid3').show();
    $('#targetselectboxedsid3').show();
    $('#plus-button-id3').css({"display": "inline-block"});
    $('#minus-button-id3').css({"display": "inline-block"});
    $('#SearchTerm3-clear').show();
}
function philippeClearLine1(myForm) {
    $('#searchboxedsid').val('');
}
function philippeClearLine2(myForm) {
    $('#searchboxedsid2').val('');
}
function philippeClearLine3(myForm) {
    $('#searchboxedsid3').val('');
}
//patrick ajout
function patrickClearRev(myForm) {
    $('#searchboxholdingsid').val('');
}

//##### Required Variables #####
//ID of form for submission of terms to search
var searchformideds = 'searchformedsid';
//ID of search box input field
var searchboxideds = 'searchboxedsid';
//ID of div or span that the autocomplete results will appear below
var appenddiveds = 'edsSearchWrapper';
//determines if search happens when autocomplete term is clicked
var searchOnClickeds = false;
//##### End Variables #####
//##### Required Variables #####
//ID of form for submission of terms to search
var searchformid = 'searchformholdingsid';
//ID of search box input field
var searchboxid = 'searchboxholdingsid';
//ID of div or span that the autocomplete results will appear below
var appenddiv = 'holdingsSearchWrapper';
//determines if search happens when autocomplete term is clicked
var searchOnClick = false;
//##### End Variables #####


// patrick
$('#tag-1').css({"background-color": "#66a8be", "color": "#fff"});
$('#content-1').css({"display": "block"});
$('.changeSort').click(function() {
  var myID = $(this).attr('id');
  var number = myID.split("-")[1];
  var testimonialElements = $(".changeSort");
  for(var i=0; i<testimonialElements.length; i++){
    var element = testimonialElements.eq(i);
    element.css({"background-color":"white", "color":" #333333"});
  }
  var contentElements = $(".formContent")
  for(var j=0; j<contentElements.length; j++){
    var IDcontent = contentElements.eq(j);
    IDcontent.css({"display": "none"});
  }  
  $(this).css({"background-color": "#66a8be", "color": "#fff"});
  $('#content-'+number).css({"display": "block"});
});
