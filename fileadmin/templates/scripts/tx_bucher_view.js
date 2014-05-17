//Allgemeine RefreshFunction
     
// function refresh(){
//             var opts = {
//  lines: 13, // The number of lines to draw
//  length: 7, // The length of each line
//  width: 4, // The line thickness
//  radius: 10, // The radius of the inner circle
//  corners: 1, // Corner roundness (0..1)
//  rotate: 0, // The rotation offset
//  color: '#000', // #rgb or #rrggbb
//  speed: 1, // Rounds per second
//  trail: 60, // Afterglow percentage
//  shadow: false, // Whether to render a shadow
//  hwaccel: false, // Whether to use hardware acceleration
//  className: 'spinner', // The CSS class to assign to the spinner
//  zIndex: 2e9, // The z-index (defaults to 2000000000)
//  top: 'auto', // Top position relative to parent in px
//  left: 'auto' // Left position relative to parent in px
//};
//var target = document.getElementById('refreshbox');
//
//}


  

//Spezifische RefreshFunction
//@ToDo Doppelte Editboxen fixen

function refreshContent(){

//alle reserved Klassen entfernen
jQuery(".reserved").removeClass("reserved");

jQuery(".table.selected").removeClass('selected').animate({backgroundColor: '#ffa500'}, 300);;
jQuery('.voll').remove();


//neues Refresh Datum setzen
        var date = jQuery("#datepicker input").val();
        jQuery("form.refreshForm input.date").attr("value",date);
        
//Schichttyp bestimmen
         var type  = jQuery(".schichtType").attr("data-type");
        jQuery("form.refreshForm input.type").attr("value",type);
        
 //Target bestimmen
        var target = jQuery("form.refreshForm").attr("action");

       jQuery.post(target, jQuery("form.refreshForm").serialize(), function(data){
 
//   var elements = []
//  
//    jQuery(data).each(function(index,elem){
//        elements[index][""] = jQuery(this).find()
//    });

       
//alten Buchungen entfernen
         jQuery(".buchungen").remove();
         jQuery(".table").attr("title","");
         jQuery(".notifier div").remove();
//@TODO Bessere Klasse
 jQuery(".alert.alert-info",".alert.alert-success",".alert.alert-error").remove();
//          jQuery(data).find(".buchungen").prependTo("#navbar");
//         editForm();

jQuery("#navbar").prepend(data);
var tableSelected = [];
jQuery("#navbar .buchungen .buchung").each(function(){
if(jQuery(this).find("textarea.notizfield").val() != "") {
	var notizfield = "Notiz!";
	}else {
		var notizfield = "";
	}
    newNote(jQuery(this).find(".buchung-title-3 input").attr("value"),jQuery(this).find(".tableNumber").html(),jQuery(this).find("input.uhrzeit").attr("value"),notizfield);
    jQuery(this).find(".tables option").each(function(){
       tableSelected.push(jQuery(this).attr("value"));
    });

    jQuery(this).find(".tables").multiSelect();
     jQuery(this).find(".ms-container").append("<i class='icon-remove'></i>")
});

jQuery(".buchungen .buchung").each(function(){
    jQuery('.voll').remove();
    //Jedem Reservierten Tisch einen name zuweisen
  var name = jQuery(this).find(".buchung-title-3 input").attr("value");

    //jeden reservierten Tisch markieren
    jQuery(".tische .badge.badge-info").each(function(){
       var number = jQuery(this).text();
       jQuery(".table-"+number).attr("title",name);

       jQuery(".table-"+number).addClass("reserved");
    });
  
});

if(jQuery("#navbar").hasClass("opened")){
  
      jQuery("#navbar .buchung").fadeIn(200);

}

// @toDo Falls Navbar offen müssen sie auch angezeigt werden.
          
       
if(jQuery('.table.reserved').length>4){
	  jQuery('#map').append('<div class="alert voll alert-error">Voll reserviert!</div>');
  }
           return false;
       });
       jQuery('.table.selected').removeClass('selected').animate({backgroundColor: '#ffa500'}, 300);
}

//Regelt die den Schichttyp
//@todo sollte einen Refresh auslösen 

function schichtType(){
    jQuery(".schichtType").toggle(function(){
        jQuery(this).fadeOut(200,function(){
            jQuery(this).text("Frühschicht");
            jQuery(this).attr("data-type","0");
            jQuery(this).fadeIn(200,function(){
                refreshContent();
            });
        });
        
    },function(){
          jQuery(this).fadeOut(200,function(){
            jQuery(this).text("Spätschicht");
             jQuery(this).attr("data-type","1");
            jQuery(this).fadeIn(200,function(){
                   refreshContent();
            });
         
        });
    });
}