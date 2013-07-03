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
        "prevText": "«",
        
        //Pagerefresh nach dem Datumswechsel
        onSelect : function(){refreshContent();}
    });
}


//Navbarfunction
//erzeugt den Dropdownarrow und blendet die Buchungen ein.
//@ToDo der Arrow rotiert noch nicht.

function sidebarArrow(){
    jQuery("#navbar").mouseenter(function(){
        jQuery("#navbar").stop(true,false).delay(800).animate({
            height : '438'
            
        },400);
        jQuery("#navbar").addClass("opened").removeClass("closed");
    
      jQuery("#navbar .buchung").delay(400).fadeIn(0);
       
    });
     jQuery("#navbar").mouseleave(function(){
         jQuery("#navbar").stop(true,false).animate({
            height : '68'
        },400);
            jQuery("#navbar").addClass("closed").removeClass("opened");
           jQuery("#navbar .buchung").fadeOut(0);
     
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
    jQuery("#navbar .buchung").animate({width:"221"});
    jQuery(".sperrer").show();
    jQuery(".editBar").fadeOut(200);
    //entsperren
     
    current.find(".sperrer").hide();
     current.animate({width:"271"});
      current.find(".editBar").show();
      current.addClass("opened");
     }
});


}
function newNote(title,text,time,contact){

var output = "<div class=' alert alert-info'><div class='note-title row-fluid'> <span> "+title+"</span> <span class='pull-right' > "+time+"</span></div><hr><div class='row-fluid'><div class='note-text span6 '><span class=''><img src='fileadmin/templates/img/table.png' width='20px'/></span> "+text+"</div><div class='span6'> <div class='badge badge-inverse pull-right '>"+contact+"</div></div></div></div>";
jQuery(".notifier").prepend(output);
jQuery(".notifier .note").last().hide();
jQuery(".notifier .note").last().show(400);
jQuery(".notifier .note").live("click",function(){
    jQuery(this).fadeOut(400,function(){
        jQuery(this).remove();
    });
});

}

//Datum hinzufügen
function newInfo(content){
var output = "<div class='alert alert-success'>"+content+"</div>";
jQuery(".notifier").append(output);
}
function newError(content){
var output = "<div class='alert alert-error'>"+content+"</div>";
jQuery(".notifier").append(output);
}
function postEditForm(formclass,formDiv){
        var target =  jQuery(formDiv).attr("action");
        console.log("target:"+target);
       jQuery.post(target, jQuery("form" + formDiv).serialize(), function(data){
           console.log( jQuery("form" + formDiv).serialize());
           if(data == "1") {
      newInfo("Reservierung wurde geändert");
           }else {
               
               newError("Editieren fehlgeschlagen. Die Buchung ist invalide!");
           }
           
           
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
             if(data == "1") {
                 jQuery(formDiv).dialog("close");
                 
                 //Info Anlegen
                 newInfo("<div class='badge badge-inverse'>Status</div> Neue Reservierung angelegt");
               jQuery(formDiv + ".ui-dialog-content").find("input.text").each(function(){
                   jQuery(this).removeClass("f3-form-error");
                   jQuery(this).find("li.alert.alert-error").remove();
                   jQuery(this).attr("value","");
                   
                   //content refreshen
                   refreshContent();
                   
               });
              jQuery(formDiv + ".ui-dialog-content").find("textarea.text").attr("value","");
//                refreshContent();
             }else{
                     jQuery(formDiv + ".ui-dialog-content .FormErrors ").html(jQuery(response).find(".error").html());
             }
       
         
           return false;
       });

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
 jQuery(".alert.alert-error").remove();
 jQuery("select.tables option").removeAttr("selected");
jQuery(".table.selected").not(".reserved").each(function(){

   var number =  jQuery(this).find(".uid").text();
   var table =  jQuery(this).find(".title").text();
  
   jQuery(".newFormDiv.ui-dialog-content .tables").find("option[value='"+number+"']").attr("selected","selected");
     jQuery(".newFormDiv.ui-dialog-content label[for='tisch']").after("<div class='tablebutton badge badge-info'>"+table+"</div>");
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
           
       
           

}

function ask(url) {

          jQuery( ".dialogBox" ).dialog({
            resizable: false,
            height:140,
            title:"Bitte bestätigen",
            modal: false,

            buttons: {
                "Löschen": function() {
                    jQuery.post(url,function(data){
                      
                          refreshContent();
                          newInfo("Buchung wurde gelöscht");
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
            jQuery(".ui-dialog-titlebar-close").click();
        });
    }
