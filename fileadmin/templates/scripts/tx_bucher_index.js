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
