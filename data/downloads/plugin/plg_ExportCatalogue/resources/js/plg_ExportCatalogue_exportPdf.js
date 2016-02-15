/**
 * 
 */
$(document).ready(function() {
  $('.btnExportToPDF').click(function() {
      var url = './export_catalogue_show.php?' + $('#form1').serialize();
	  $('.linkExportToPDF').attr('href', url);
	  $('.linkExportToPDF')[0].click();
  });
  
  $(".btnExportToPDF ").hover(
	  function () {
	      $(this).css('background-image', 'url(../user_data/packages/default/img/exportPdf/plg_ExportCatalogue_export_button_hover.png)');
	  },
	  function () {
		  $(this).css('background-image', 'url(../user_data/packages/default/img/exportPdf/plg_ExportCatalogue_export_button.png)');
	  }
  );
});