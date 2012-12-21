$(document).ready(function(){
	$('#applicationSubmit').click(function() {
			$.ajax({
				type: "POST",
				url: "applicationajax.php",
                                enctype: 'multipart/form-data',
				data: $("#applicationForm").serialize(),
				dataType: "json",

				success: function(msg){
					$("#formResponse").removeClass('error');
					$("#formResponse").removeClass('success');
					$("#formResponse").addClass(msg.status);
					$("#formResponse").html(msg.message);

				},
				error: function(){
					$("#formResponse").removeClass('success');
					$("#formResponse").addClass('error');
					$("#formResponse").html("There was an error submitting the form. Please try again.");
				}
			});

			//make sure the form doesn't post
			return false;

		});

	});