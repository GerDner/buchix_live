/*
 *    Project:	buchix - buchix
 *    Version:	1.0.0
 *    Date:		15.01.2013 20:53:04
 *    Author:	gerdner 
 *
 *    Coded with Netbeans!
 */
#page.headerData {
# 10= TEXT
#10.value (
#  <link href="bucher/fileadmin/templates/css/tx_bucher.css" rel="stylesheet">
#<script src="bucher/fileadmin/templates/scripts/functions.js" type="text/javascript"></script>
#  <script src="bucher/fileadmin/templates/scripts/fancybox/jquery.fancybox-1.3.4.js" type="text/javascript"></script>
#   <link href="bucher/fileadmin/templates/scripts/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
#  <link href="bucher/fileadmin/templates/css/jquery-ui-1.9.2.custom.min.css" rel="stylesheet">
#  
#  <script src="http://fgnass.github.com/spin.js/dist/spin.min.js" type="text/javascript"></script>
#  <script src="fileadmin/templates/scripts/tx_bucher_controller.js" type="text/javascript"></script>
#  <script src="fileadmin/templates/scripts/tx_bucher_view.js" type="text/javascript"></script>
#  <script src="fileadmin/templates/scripts/tx_bucher_index.js" type="text/javascript"></script>
#)
#}

page.10 = FLUIDTEMPLATE 
page.10 {
   file = fileadmin/templates/tx_bucher.html
   partialRootPath = fileadmin/templates/partials/
   layoutRootPath = fileadmin/templates/layouts/
   variables {

   }
}

ajaxcontent = PAGE
ajaxcontent {
   typeNum = 11223344
   10 < tt_content.list.20.bucher_ajax

   10.persistence.storagePid = 23


   config {
    disableAllHeaderCode = 1
    additionalHeaders = Content-type:text/html;charset=utf-8
    xhtml_cleaning = 0
    admPanel = 0
   }
}
config.absRefPrefix = / 

