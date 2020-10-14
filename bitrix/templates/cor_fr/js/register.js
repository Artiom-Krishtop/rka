/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {

	$(document).ready(function() {	
	$('#edit-field-user-node-und-0-default option').each(function () {
		$(this).text($(this).text().replace("специализированная юридическая консультация","спец. ЮК"))
		$(this).text($(this).text().replace("Специализированная юридическая консультация","Cпец. ЮК"))
		$(this).text($(this).text().replace("по обслуживанию субъектов предпринимательской деятельности при осуществлении ими внешнеэкономической деятельности","по внешнеэкономической деятельности"))
	})
var me=$('#edit-field-user-node-und-0-default option:first-child').clone()
	var arr81=[84,91,85,89,111,93,95,97,99,101,103,104,86,107,108,110,87,113,115];
			var arr82=[109,90,114,83,88,92,94,96,116,117,118,98,100,102,105,106,112,119,120,121,122,123,124,125,126];
			var arr71=[185,191,175,178,181,197,196,199,201,193,247,241,203,249,209,210,212,213,215,217,221,223,225,227,232,230,234,236,239,238];
			var arr127=[134,138,140,143,146,147,130,149,151,152,153,154,156,158,160,137,161,163,164,165,166,132,168,133,170];
			var arr128=[136,139,141,142,144,129,145,148,150,155,135,157,159,162,131,169,167,171,172,173,174];
			var arr216=[244,245,246,248,251,250,220,222,226,235,240,243,218,219,224,228,229,231,233,237,242]
			var arr176=[180,184,183,186,182,205,187,188,189,190,207,192,214,195,194,177,198,179,200,202,204,206,208,211]
			var options71=$('#edit-field-user-node-und-0-default option').filter(function(){
					return ($.inArray(parseInt(this.value), arr71 ) !=-1)
				}).detach()
			var options81=$('#edit-field-user-node-und-0-default option').filter(function(){
						return ($.inArray(parseInt(this.value), arr81 ) !=-1)
				}).detach()
			var options82=$('#edit-field-user-node-und-0-default option').filter(function(){
						return ($.inArray(parseInt(this.value), arr82 ) !=-1)
				}).detach()
			
			var options127=$('#edit-field-user-node-und-0-default option').filter(function(){
						return ($.inArray(parseInt(this.value), arr127 ) !=-1)
				}).detach()
			var options128=$('#edit-field-user-node-und-0-default option').filter(function(){
						return ($.inArray(parseInt(this.value), arr128 ) !=-1)
				}).detach()
			var options216=$('#edit-field-user-node-und-0-default option').filter(function(){
						return ($.inArray(parseInt(this.value), arr216 ) !=-1)
				}).detach()
			var options176=$('#edit-field-user-node-und-0-default option').filter(function(){
						return ($.inArray(parseInt(this.value), arr176) !=-1)
				}).detach()
			
			
	var drop2 = $('#edit-field-user-node-und-0-default option');
		$('#edit-field-user-node').hide()
		$('#edit-og-user-node-und-0-default').change(function(){
			var drop1selected = parseInt(this.value); //get drop1 's selected value
			
		if(!isNaN(drop1selected)&&drop1selected!=328){
			$('#edit-field-user-node').show();
			$('#edit-field-user-node-und-0-default option').detach();
			//alert(eval("options"+drop1selected))
			//alert(eval("options"+drop1selected))
			
			me.appendTo($('#edit-field-user-node-und-0-default'))
			eval("options"+drop1selected).appendTo($('#edit-field-user-node-und-0-default'))
			
			
		  }else{
			$('#edit-field-user-node').hide();
			$('#edit-field-user-node-und-0-default').val('_none')
		  }; 
		  
		});
	});


})(jQuery, Drupal, this, this.document);
