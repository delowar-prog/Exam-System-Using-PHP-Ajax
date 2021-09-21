$(function(){
	//user Registration
	$("#Submit").click(function(){
		var name 	 = $("#name").val();
		var username = $("#username").val();
		var password = $("#password").val();
		var email 	 = $("#email").val();
		var DataString= "name="+name+"&username="+username+"&password="+password+"&email="+email;

		$.ajax({
			type: "POST",
			url : "getregistar.php",
			data: DataString,
			success:function(data){ 
				$("#msg").html(data);
				setTimeout(function(){
						$("#msg").fadeOut();
					}, 4000);
			}
		});
		return false;
	});

	//user login
	$("#userlogin").click(function(){
		var email 	 = $("#email").val();
		var password = $("#password").val();
		var DataString= "email="+email+"&password="+password;

		$.ajax({
			type: "POST",
			url : "getLogin.php",
			data: DataString,
			success:function(data){ 
				if($.trim(data)=='empty'){
					$(".empty").show();
					setTimeout(function(){
						$(".empty").fadeOut();
					}, 4000);
				}else if($.trim(data)=='error'){
					$(".error").show();
					setTimeout(function(){
						$(".error").fadeOut();
					}, 4000);
				}else if($.trim(data)=='disable'){
					$(".disable").show();
					setTimeout(function(){
						$(".disable").fadeOut();
					}, 4000);
				}else{
					window.location='exam.php';
				}
			}
		});
		return false;
	});

	//user login
	
});