$(document).ready(function() 
{
	$("#FirstName").after("<span>Required Field.</span>");	
	$("#LastName").after("<span>Required Field.</span>");	
	$("#DoB").after("<span>Required Field.</span>");
	$("#email").after("<span>Required Field.</span>");
	$("#password").after("<span>Required Field.</span>");
	$("#SSN").after("<span>Optional Field.</span>");
	$("#Address").after("<span>Required Field.</span>");
	$("#PhoneNumber").after("<span>Required Field.</span>");
	$("span").hide();

	$('#FirstName').focus('input', function() 
	{
	$(this).next("span").text("Required Field").addClass("info").show();
	});
	
  	$('#LastName').focus('input', function() 
	{
	$(this).next("span").text("Required Field").addClass("info").show();
	});
	
	$('#DoB').focus('input', function() 
	{
	$(this).next("span").text("Required Field").addClass("info").show();
	});
	
    $('#email').focus('input', function() 
	{
	$(this).next("span").text("Required Field (Enter a valid id)").addClass("info").show();
	});
	
	$('#password').focus('input', function() 
	{
	$(this).next("span").text("Required Field (Enter 6 characters minimum)").addClass("info").show();
	});
	
	$('#SSN').focus('input', function() 
	{
	$(this).next("span").text("Optional").addClass("info").show();
	});
	
	$('#Address').focus('input', function() 
	{
	$(this).next("span").text("Required Field").addClass("info").show();
	});
	
	$('#PhoneNumber').focus('input', function() 
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
	
		$('#DoB').blur('input', function() 
	{
		$(this).next("span").hide();
		$(this).next("span").removeClass("info ok error");
    
		var format=/^[0-9][0-9]+-[0-9][0-9]+-[0-9][0-9][0-9][0-9]$/; 
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
		//if(firstname.match(format))
		//{
			$(this).next("span").text("ok");
			$(this).next("span").show().addClass("ok");
		
		//}
		//else
		//{
			//$(this).next("span").text("Error!");
			//$(this).next("span").show().addClass("error");		
		//}
	});
	
		$('#PhoneNumber').blur('input', function() 
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

    $('#password').blur('input', function() 
	{    	
		$(this).next("span").hide();
		$(this).next("span").removeClass("info ok error");    
    
		var input=$(this);
		var pass=input.val();
		if(pass.length > 6)
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
});
