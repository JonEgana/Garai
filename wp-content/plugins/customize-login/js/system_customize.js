function autofillchecknew(id)
{           
	var anew = document.getElementById('wpspandntcuslogin[enable]').checked;

	switch(anew)
	{
		case true:
		  document.getElementById('divonenew').style.display = 'inline';
		  break;

		case false:
		  document.getElementById('divonenew').style.display = 'none';
		  break;
		
		default: 'code to be executed if n is different from case 1 and 2';	
	}
}

function changeurlandpage(rads)
{
	switch(rads)
	{
		case 'fulllogo':
		  document.getElementById('rdpages').style.display = 'inline';
		  document.getElementById('rdurl').style.display = 'none';
		  break;

		case 'iconlogo':
		  document.getElementById('rdpages').style.display = 'none';
		  document.getElementById('rdurl').style.display = 'inline';
		  break;
		
		default: 'code to be executed if n is different from case 1 and 2';
	}            
}

jQuery(document).ready(function($) {   
	$('#cuslog_imagecolor').wpColorPicker();
	$('#cuslog_bgtxtcolor').wpColorPicker();
	$('#cuslog_bgtxtshcolor').wpColorPicker();
	$('#cuslog_innerimagecolor').wpColorPicker();
	$('#cuslog_errormsgcolor').wpColorPicker();
	$('#cuslog_errormsgtxtcolor').wpColorPicker();
	$('#cuslog_bgtxtlinkcolor').wpColorPicker();
	$('#cuslog_bgtxtlinkshcolor').wpColorPicker();
	$('#cuslog_bgtxtlinkhovercolor').wpColorPicker();
	$('#cuslog_bgtxtlinkshhovercolor').wpColorPicker();
});   