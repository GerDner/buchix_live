     jQuery.noConflict();
     
function error(error){
         throw new Error(error);
}   

jQuery(document).ready(function() {
	  jQuery(".refresher").click(function(){refreshContent();});
	  datePicker();
	  sidebarArrow();
	  newBuchung();
	  editForm();
	  tableclick();
	  jQuery("#ui-datepicker-div").appendTo("#tx-bucher-main");
});
