$('#login_button').ready(function() {
	if($("#login_button").not(".clickadded")){
		
		$("#login_button").click(function(){
			if($('#layout_login').is(":visible")){
				$('#layout_login').hide();
			}
			else{
				$('#layout_login').show();
			}
		    if($("#login_button").val() == 'Log in')
		    	$("#login_button").val('Close');
		    
		    if($("#login_button").val() == 'Close')
		    	$("#login_button").val('Log in');
		    
		    if($("#login_button").val() == 'Registracija')
		    	$("#login_button").val('Odjava');
		    
		    if($("#login_button").val() == 'Odjava')
		    	$("#login_button").val('Registracija');
		});
		$("#login_button").addClass("clickadded");
	
	}
});
