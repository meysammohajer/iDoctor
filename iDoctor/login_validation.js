$(document).ready(function() 
{	
	$("#password").after("<span>Required Field.(Should be atleast 6 characters long).</span>");
	$("#email").after("<span>Required Field.(Enter a valid id).</span>");	
	$("span").hide();

  	$('#password').focus('input', function() 
	{
	$(this).next("span").text("Required Field.(Should be atleast 8 characters long).").addClass("info").show();
	});

    $('#email').focus('input', function() 
	{
	$(this).next("span").text("Required Field.(Enter a valid id).").addClass("info").show();
	});

    $('#password').blur('input', function() 
	{    	
		$(this).next("span").hide();
		$(this).next("span").removeClass("info ok error");    
    
		var input=$(this);
		var pass=input.val();
		if(pass.length > 5)
		{
			$(this).next("span").text("ok");
			$(this).next("span").show().addClass("ok");
		}
		else if(!pass)
		{
				$(this).next("span").hide();
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
