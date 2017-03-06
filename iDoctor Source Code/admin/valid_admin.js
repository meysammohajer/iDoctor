$(document).ready(function() 
{
	$("#FirstName").after("<span>Required Field.</span>");	
	$("#LastName").after("<span>Required Field.</span>");	
	$("#Specialization").after("<span>Required Field.</span>");
	$("#email").after("<span>Required Field.</span>");
	$("#offhours").after("<span>Required Field.</span>");
	$("#PhoneNumber").after("<span>Required Field.</span>");
	$("#Address").after("<span>Required Field.</span>");
	$("#City").after("<span>Required Field.</span>");
	$("#State").after("<span>Required Field.</span>");
	$("#Zip").after("<span>Required Field.</span>");
	$("span").hide();

	$('#FirstName').focus('input', function() 
	{
	$(this).next("span").text("Required Field").addClass("info").show();
	});
	
  	$('#LastName').focus('input', function() 
	{
	$(this).next("span").text("Required Field").addClass("info").show();
	});
	
	$('#Specialization').focus('input', function() 
	{
	$(this).next("span").text("Required Field").addClass("info").show();
	});
	
    $('#email').focus('input', function() 
	{
	$(this).next("span").text("Required Field (Enter a valid id)").addClass("info").show();
	});
	
	$('#offhours').focus('input', function() 
	{
	$(this).next("span").text("Required Field(Enter Office hours)Format: 22:22-22:22").addClass("info").show();
	});
	
	$('#PhoneNumber').focus('input', function() 
	{
	$(this).next("span").text("Optional").addClass("info").show();
	});
	
	$('#Address').focus('input', function() 
	{
	$(this).next("span").text("Required Field").addClass("info").show();
	});
	
	$('#City').focus('input', function() 
	{
	$(this).next("span").text("Required Field").addClass("info").show();
	});
	
	$('#State').focus('input', function() 
	{
	$(this).next("span").text("Required Field").addClass("info").show();
	});
	
	$('#Zip').focus('input', function() 
	{
	$(this).next("span").text("Required Field").addClass("info").show();
	});


    $('#FirstName').blur('input', function() 
	{
		$(this).next("span").hide();
		$(this).next("span").removeClass("info ok error");
    
		var format=/^[a-zA-Z0-9]+$/;
		var input=$(this);
		var firstname=input.val();	
		if(firstname.match(format))
		{
			$(this).next("span").text("ok");
			$(this).next("span").show().addClass("ok");
		
		}
		else
		{
			$(this).next("span").text("Error!");
			$(this).next("span").show().addClass("error");		
		}
	});
	
	$('#LastName').blur('input', function() 
	{
		$(this).next("span").hide();
		$(this).next("span").removeClass("info ok error");
    
		var format=/^[a-zA-Z0-9]+$/;
		var input=$(this);
		var firstname=input.val();	
		if(firstname.match(format))
		{
			$(this).next("span").text("ok");
			$(this).next("span").show().addClass("ok");
		
		}
		else
		{
			$(this).next("span").text("Error!");
			$(this).next("span").show().addClass("error");		
		}
	});
	
		$('#Specialization').blur('input', function() 
	{
		$(this).next("span").hide();
		$(this).next("span").removeClass("info ok error");
    
		var format=/^[a-zA-Z0-9]+$/; 
		var input=$(this);
		var firstname=input.val();	
		if(firstname.match(format))
		{
			$(this).next("span").text("ok");
			$(this).next("span").show().addClass("ok");
		
		}
		else
		{
			$(this).next("span").text("Error!");
			$(this).next("span").show().addClass("error");		
		}
	});
	
		$('#Address').blur('input', function() 
	{
		$(this).next("span").hide();
		$(this).next("span").removeClass("info ok error");
    
		var format=/^[a-zA-Z0-9]+$/;
		var input=$(this);
		var firstname=input.val();	
		if(firstname.match(format))
		{
			$(this).next("span").text("ok");
			$(this).next("span").show().addClass("ok");
		
		}
		else
		{
			$(this).next("span").text("Error!");
			$(this).next("span").show().addClass("error");		
		}
	});
	
		$('#PhoneNumber').blur('input', function() 
	{
		$(this).next("span").hide();
		$(this).next("span").removeClass("info ok error");
    
		var format=/^\+[Z0-9]+[Z0-9]+$/;
		var input=$(this);
		var firstname=input.val();	
		if(firstname.match(format))
		{
			$(this).next("span").text("ok");
			$(this).next("span").show().addClass("ok");
		
		}
		else
		{
			$(this).next("span").text("Error!");
			$(this).next("span").show().addClass("error");		
		}
	});

    $('#City').blur('input', function() 
	{    	
		$(this).next("span").hide();
		$(this).next("span").removeClass("info ok error");
    
		var format=/^[a-zA-Z0-9]+$/; 
		var input=$(this);
		var firstname=input.val();	
		if(firstname.match(format))
		{
			$(this).next("span").text("ok");
			$(this).next("span").show().addClass("ok");
		
		}
		else
		{
			$(this).next("span").text("Error!");
			$(this).next("span").show().addClass("error");		
		}
	});

    $('#email').blur('input', function() 
	{    	
		$(this).next("span").hide();
		$(this).next("span").removeClass("info ok error");    
    
		var format1=/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
		var input=$(this);
		var email=input.val();
	
		if(email.match(format1))
		{
			$(this).next("span").text("ok");
			$(this).next("span").show().addClass("ok");
		}
		else if(!email)
		{
		    $(this).next("span").hide();
		}
		else
		{
			$(this).next("span").text("Error!");
			$(this).next("span").show().addClass("error")
		}
	});
	
    $('#offhours').blur('input', function() 
	{    	
		$(this).next("span").hide();
		$(this).next("span").removeClass("info ok error");    
    
		var format1=/^[Z0-9]+[Z0-9]+\:[Z0-9]+[Z0-9]+\-+[Z0-9]+[Z0-9]+\:[Z0-9]+[Z0-9]$/i;
		var input=$(this);
		var offhours=input.val();
	
		if(offhours.match(format1))
		{
			$(this).next("span").text("ok");
			$(this).next("span").show().addClass("ok");
		}
		else if(!offhours)
		{
		    $(this).next("span").hide();
		}
		else
		{
			$(this).next("span").text("Error!");
			$(this).next("span").show().addClass("error")
		}
	});
	
    $('#State').blur('input', function() 
	{    	
		$(this).next("span").hide();
		$(this).next("span").removeClass("info ok error");
    
		var format=/^[a-zA-Z0-9]+$/; 
		var input=$(this);
		var firstname=input.val();	
		if(firstname.match(format))
		{
			$(this).next("span").text("ok");
			$(this).next("span").show().addClass("ok");
		
		}
		else
		{
			$(this).next("span").text("Error!");
			$(this).next("span").show().addClass("error");		
		}
	});
	
    $('#Zip').blur('input', function() 
	{    	
		$(this).next("span").hide();
		$(this).next("span").removeClass("info ok error");
    
		var format=/^[Z0-9]+$/; 
		var input=$(this);
		var firstname=input.val();	
		if(firstname.match(format))
		{
			$(this).next("span").text("ok");
			$(this).next("span").show().addClass("ok");
		
		}
		else
		{
			$(this).next("span").text("Error!");
			$(this).next("span").show().addClass("error");		
		}
	});
});
