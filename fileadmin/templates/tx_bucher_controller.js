 
 //DatePicker
 //Erzeugt den Datepicker und belegt ihn mit Standardwerten
 //@ToDo Pagerefresh auslösen
 
function datePicker(){
        var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!

var yyyy = today.getFullYear();
if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = dd+'.'+mm+'.'+yyyy;
 jQuery("#datepicker input").val(today);
    jQuery("#datepicker input").datepicker({
        "dayNamesMin" :[ "So", "Mo", "Di", "Mi", "Do", "Fr", "Sa" ],
        "dateFormat": "dd.mm.yy",
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
            
        },1000);
        jQuery("#navbar").addClass("opened");
     setTimeout(function(){
      jQuery("#navbar .buchung").each(function(){
          var thisBuchung =  jQuery(this);
          setTimeout(function(){
               thisBuchung.fadeIn(800);
        },intervall);
        intervall = intervall + 200;

      });
          },800);
           jQuery(this).find(".down").css({"-webkit-transform": "rotate(180deg)" });
    }, function(){
         jQuery("#navbar").stop(true,true).animate({
            height : '-=250'
        },1000); 
            jQuery("#navbar").addClass("closed");
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
// jQuery(".editForm").dialog({"width":700,autoOpen:false,title:"Diese Reservierung editieren"});
// jQuery(".edit").click(function(e){
//
//    e.preventDefault();
//      var target =  jQuery(this).attr("data-uid");
//      jQuery("." + target).dialog("open");
//});
jQuery(".delete.editBarIcon").live("click",function(e){
    e.preventDefault();
    var deleteLink = jQuery(this).attr("href");
    ask(deleteLink);
});
//jQuery(".edit.editBarIcon").live("click",function(e){
//    e.preventDefault();
//    jQuery(this).parent("form").submit();
//});
jQuery("#navbar .buchung").live("click", function(){
    //alle Sperrer aktivieren
    var current = jQuery(this);
   if(!current.hasClass("opened")){
       jQuery("#navbar .buchung").removeClass("opened");
    jQuery("#navbar .buchung").animate({width:"180px"});
    jQuery(".sperrer").show();
    jQuery(".editBar").fadeOut(200);
    //entsperren
     
    current.find(".sperrer").hide();
     current.animate({width:"220px"});
      current.find(".editBar").show();
      current.addClass("opened");
     }
});


}
function newNote(title,text){
        var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!

var yyyy = today.getFullYear();
if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = dd+'.'+mm+'.'+yyyy;
var uhr = new Date();
var minuten = uhr.getMinutes();
var stunden = uhr.getHours();
var output = "<div class='note box'><div class='note-title'>"+title+"<span>   "+today+" "+stunden+":"+minuten+" Uhr</span></div><div class='note-text'>"+text+"</div></div>";
jQuery(".notifier").append(output);
jQuery(".notifier .note").last().hide();
jQuery(".notifier .note").last().show(400);
jQuery(".notifier .note").live("click",function(){
    jQuery(this).fadeOut(400,function(){
        jQuery(this).remove();
    });
});

}
function postEditForm(formclass,formDiv){
        var target =  jQuery(formDiv).attr("action");
       jQuery.post(target, jQuery("form" + formDiv).serialize(), function(data){
      newNote("Status",data);
//        jQuery(".dialogBoxOk").html(data);
//        jQuery(".dialogBoxOk").dialog({
//            resizable: false,
//            title:"Status",
//            modal: false,
//            buttons: {
//                Ok: function() {
//                    jQuery( this ).dialog( "close" );
//                }
//            }
//        });
       
         
           return false;
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
                 newNote("Status","Reservierung wurde erfolgreich eingetragen");
               jQuery(formDiv + ".ui-dialog-content").find("input.text").each(function(){
                   jQuery(this).removeClass("f3-form-error");
                   jQuery(this).attr("value","");
                   
               });
              jQuery(formDiv + ".ui-dialog-content").find("textarea.text").attr("value","");
//                refreshContent();
             }else{
                     jQuery(formDiv + ".ui-dialog-content").html(response);
             }
       
         
           return false;
       });
 return false;
 return false;
  }  

  
//NewFormularFunctrion
//erzeugt das NewFormularFunctrion
//erzeugt den Dialogbox Klickhandler
  
  function newBuchung(){
    jQuery(".newFormDiv").dialog({"width":700,autoOpen:false,title:"Neue Reservierung anlegen"});
    jQuery(".message").dialog({autoOpen:false});
jQuery(".newBuchung").click(function(e){
    var datum = jQuery("#datepicker input").attr("value");
     jQuery(".newFormDiv.ui-dialog-content .datum").datepicker({
        "dayNamesMin" :[ "So", "Mo", "Di", "Mi", "Do", "Fr", "Sa" ],
        "dateFormat": "dd.mm.yy",
        "monthNames": [ "Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember" ],
        "nextText": "»",
        "prevText": "«"
    });
     jQuery(".newFormDiv.ui-dialog-content .datum").val(datum);
     //entfernt alle alten Tische aus dem Formular
 jQuery(".tablebutton").remove();
jQuery(".table.selected").each(function(){

   var number =  jQuery(this).find(".uid").text();
   var table =  jQuery(this).find(".title").text();
  
   jQuery(".newFormDiv.ui-dialog-content .tables").find("option[value='"+number+"']").attr("selected","selected");
     jQuery(".newFormDiv.ui-dialog-content label[for='tisch']").after("<button class='tablebutton'>"+table+"</button>");
});
    e.preventDefault();
    jQuery(".newFormDiv.ui-dialog-content .tablebutton ").click(function(){
       var number = jQuery(this).text();
       jQuery(this).remove();
       jQuery(".newFormDiv.ui-dialog-content .tables").find("option[value='"+number+"']").removeAttr("selected");
    });
       jQuery(".newFormDiv").dialog("open");
});
   
         
}


//Doppelklickfunction

function tableclick(){
           jQuery(".table").toggle(function(){
               jQuery(this).animate({backgroundColor: '#6495ed'}, 300);
               jQuery(this).addClass("selected");
           }, function(){
               jQuery(this).animate({backgroundColor: '#ffa500'}, 300);
                 jQuery(this).removeClass("selected");
           });
           
           jQuery(".table").dblclick(function(){
               alert("dpclick-event");
               
           });
           

}

function ask(url) {

          jQuery( ".dialogBox" ).dialog({
            resizable: false,
            height:140,
            title:"Bitte bestätigen",
            modal: false,
            buttons: {
                "Löschen": function() {
                    jQuery.get(url,function(){
                          refreshContent();
                    });
                    jQuery( this ).dialog( "close" );
                  
                },
                Abbruch: function() {
                    jQuery( this ).dialog( "close" );
                }
            }
        });
    }
    
    function cancelNewForm(){
        jQuery(".newFormAbrechen").live("click",function(){
            jQuery(".ui-icon-closethick").click();
        });
    }