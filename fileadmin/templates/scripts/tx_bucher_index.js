     jQuery.noConflict();

function error(error){
         throw new Error(error);
}   
jQuery(function() {
    jQuery( document ).tooltip();
  });
  jQuery(document).ajaxSend(function() {
  jQuery( ".bar" ).animate({width:"70%"},400);
});
  jQuery(document).ajaxStart(function() {
  jQuery( ".bar" ).animate({width:"30%"},400);
});

 jQuery(document).ajaxSuccess(function() {
  jQuery( ".bar" ).animate({width:"100%"},400,function(){
      jQuery( ".bar" ).css("width","0");
  });
  
});

jQuery(document).ready(function() {

jQuery(".table-8 .title").text("Scheune");
    jQuery(document).live("click",function(){
         jQuery("input.text.time").timepicker({
             'step': 15 ,
             'timeFormat': 'H:i',
             'minTime': '9:00',
	'maxTime': '19:30'
         });
    });
    jQuery("#ui-datepicker-div td").live("click",function(){
        refreshContent();
    });
   
	  jQuery(".refresher").click(function(){refreshContent();});
	  datePicker();
	  sidebarArrow();
	  
	  
	  jQuery(window).bind('beforeunload', function(){
		return ' \n';
	});
	  
	  newBuchung();
	  editForm();
	  tableclick();
	  jQuery("#ui-datepicker-div").appendTo("#tx-bucher-main");
          	jQuery('.switch').css('background', 'url("switch.png")');
	jQuery('.on_off').css('display','none');
	jQuery('.on, .off').css('text-indent','-10000px');

    jQuery("input[name=on_off]").change(function() {
      var button = jQuery(this).val();
	  
		if(button == 'off'){ jQuery('.switch').css('background-position', 'right'); }
		if(button == 'on'){ jQuery('.switch').css('background-position', 'left'); }	 
		  	  
		 jQuery('.result span').html(button); 
		 jQuery('.result').fadeIn();

   });
schichtType();
refreshContent();
cancelNewForm();

jQuery(".tableNumber span").live("click",function(){

   jQuery(this).closest(".buchung").find(".ms-container").show();
   
});
jQuery(".ms-container .icon-remove").live("click",function(){

    jQuery(this).closest(".buchung").find(".ms-container").hide();
   
});
jQuery(".notizfieldOpener").live("click",function(){
    var thisBuchung = jQuery(this).closest(".buchung");
   
//    thisBuchung.find(".control-group").not(".closed").fadeOut();
    thisBuchung.find(".notizfield").fadeIn();
     thisBuchung.find(".closeNotizfield").fadeIn();
      thisBuchung.find(".editBar").fadeOut();
});
jQuery(".closeNotizfield").live("click",function(){
    var thisBuchung = jQuery(this).closest(".buchung");
   
//    thisBuchung.find(".control-group").not(".closed").fadeOut();
    thisBuchung.find(".notizfield").fadeOut();
     thisBuchung.find(".editBar").fadeIn();
     thisBuchung.find(".closeNotizfield").fadeOut();
});

});
     jQuery(function(){
	
	 var modal = '<div class="modal hide fade" id="myModal"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3>Nicht dein Ernst oder?</h3></div><div class="modal-body"><p>Finger weg von der rechten Maustaste - Hirni!</p></div><div class="modal-footer"><div  class=" lol btn">Habs kapiert!</div><div class="btn lol btn-primary">Mir doch egal</div></div></div>';
jQuery('body').append(modal);
});
jQuery(".lol").live('click',function(){
	jQuery("#myModal").modal('toggle');
	
});
jQuery(document).bind("contextmenu",function(e){
    
       jQuery('#myModal').modal('toggle');
       
        return false;
            });
