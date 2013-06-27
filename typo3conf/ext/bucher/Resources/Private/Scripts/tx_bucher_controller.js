 
 //DatePicker
 //Erzeugt den Datepicker und belegt ihn mit Standardwerten
 //@ToDo Pagerefresh auslösen
 
function datePicker(){
        var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!

var yyyy = today.getFullYear();
if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = dd+'-'+mm+'-'+yyyy;
 jQuery("#datepicker input").val(today);
    jQuery("#datepicker input").datepicker({
        "dayNamesMin" :[ "So", "Mo", "Di", "Mi", "Do", "Fr", "Sa" ],
        "dateFormat": "dd-mm-yy",
        "monthNames": [ "Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember" ],
        "nextText": "»",
        "prevText": "«"
    });
}


//Navbarfunction
//erzeugt den Dropdownarrow und blendet die Buchungen ein.
//@ToDo der Arrow rotiert noch nicht.

function sidebarArrow(){
    jQuery(".arrow").toggle(function(){
            var intervall = 0;
        jQuery("#navbar").animate({
            height : '+=250'
            
        },1000,"easeInOutBack");
     setTimeout(function(){
      jQuery("#navbar .buchung").each(function(){
          var thisBuchung =  jQuery(this);
          setTimeout(function(){
               thisBuchung.fadeIn(800);
        },intervall);
        intervall = intervall + 200;

      });
          },800);
    }, function(){
         jQuery("#navbar").stop(true,true).animate({
            height : '-=250'
        },1000,"easeInOutBack");
           jQuery("#navbar .buchung").fadeOut(400);
           jQuery(this).find(".down").css({"-webkit-transform": "rotate(0deg)" });
    });
}

//EditFormFunction
//erzeugt die Dialogboxen für die EditFormulare
//erzeugt den Clickhandler für die Dialogboxen
//@Todo Clickhandler neu belegen
//@ToDo Editboxen öffnen sich bei Pagerefresh doppelt

function editForm(){
 jQuery(".editForm").dialog({"width":700,autoOpen:false});
 jQuery(".edit").click(function(e){

    e.preventDefault();
      var target =  jQuery(this).attr("data-uid");
      jQuery("." + target).dialog("open");
});

}

//HauptformularFunction 
//@ToDo Qualitätscheck

function form(formclass,formDiv){

        var target = jQuery("form" + formclass).attr("action");
       jQuery.post(target, jQuery("form" + formclass).serialize(), function(data){
                var response = "";
              response = jQuery(data).find(formDiv).html();
             if(response == null) {
                 jQuery(formDiv).dialog("close");
               jQuery(".message .info").text(data);
               jQuery(".message").dialog("open");
               jQuery(formDiv + ".ui-dialog-content").find("input.text").each(function(){
                   jQuery(this).removeClass("f3-form-error");
                   jQuery(this).attr("value","");
                   
               });
              jQuery(formDiv + ".ui-dialog-content").find("textarea.text").attr("value","");
                refreshContent();
             }else{
                     jQuery(formDiv + ".ui-dialog-content").html(response);
             }
       
         
           return false;
       });
 return false;
  }  

  
//NewFormularFunctrion
//erzeugt das NewFormularFunctrion
//erzeugt den Dialogbox Klickhandler
  
  function newBuchung(){
    jQuery(".newFormDiv").dialog({"width":700,autoOpen:false});
    jQuery(".message").dialog({autoOpen:false});
jQuery(".newBuchung").click(function(e){

    e.preventDefault();
       jQuery(".newFormDiv").dialog("open");
});
   
         
}


//Doppelklickfunction

function tableclick(){
           jQuery(".table").toggle(function(){
               jQuery(this).animate({backgroundColor: '#6495ed'}, 300);
           }, function(){
               jQuery(this).animate({backgroundColor: '#ffa500'}, 300);
           });
           
           jQuery(".table").dblclick(function(){
               alert("dpclick-event");
               
           });
           

}