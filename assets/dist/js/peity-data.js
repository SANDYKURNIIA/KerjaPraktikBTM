<<<<<<< HEAD
/*Piety Init*/
  
$(document).ready(function() {
	"use strict";
	
	if( $('.pie').length > 0 ){
		/*pie*/
		$("span.pie").peity("pie",{
			width: 50,
			height: 50 
		});
    }    
	
	if( $('.donut').length > 0 ){
		/*donut*/
		$("span.donut").peity("donut",{
			width: 50,
			height: 50 
		});
	}
	
	if( $('.peity-line').length > 0 ){
		/*line*/
		$('.peity-line').each(function() {
			$(this).peity("line", $(this).data());
		});
	}
	
	if( $('.peity-bar').length > 0 ){
		/*bar*/
		$('.peity-bar').each(function() {
			$(this).peity("bar", $(this).data());
		});	
	}	
=======
/*Piety Init*/
  
$(document).ready(function() {
	"use strict";
	
	if( $('.pie').length > 0 ){
		/*pie*/
		$("span.pie").peity("pie",{
			width: 50,
			height: 50 
		});
    }    
	
	if( $('.donut').length > 0 ){
		/*donut*/
		$("span.donut").peity("donut",{
			width: 50,
			height: 50 
		});
	}
	
	if( $('.peity-line').length > 0 ){
		/*line*/
		$('.peity-line').each(function() {
			$(this).peity("line", $(this).data());
		});
	}
	
	if( $('.peity-bar').length > 0 ){
		/*bar*/
		$('.peity-bar').each(function() {
			$(this).peity("bar", $(this).data());
		});	
	}	
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
});