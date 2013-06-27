
//Allgemeine RefreshFunction
     
 function refresh(obj){
    var height = jQuery(obj).height();
    jQuery(obj).append("<div class='refresh' style='height:"+height+"px'><div>'")
}

//Spezifische RefreshFunction
//@ToDo Doppelte Editboxen fixen

function refreshContent(){
     refresh(".sidebox");
     refresh("#map");
    var target = jQuery(".refreshLink a").attr("href");

    jQuery.post(target, function(data){
        jQuery(".buchungen").remove();
        jQuery(data).find(".buchungen").prependTo(".sidebox");
        editForm();
         jQuery(data).find(".buchungenForMap .buchung").each(function(){
             var target = jQuery(this).find(".tisch").text();
               
             var table = jQuery(".table-"+target);
             table.addClass("reserved").attr("data-target",target)
             jQuery(this).dialog();
         });
      
        
            jQuery(".refresh").remove();
            
  
    })
}

