$(document).ready(function(){
    $('#companySubmit').click(function() {
        $.ajax({
            type: "POST",
            url: "companyajax.php",
            data: $("#companyForm").serialize(),
            dataType: "json",

            success: function(msg){
                $("#formResponse").removeClass('error');
                $("#formResponse").removeClass('success');
                $("#formResponse").addClass(msg.status);
                $("#formResponse").html(msg.message);
            // window.location = msg.redirect;
            },
            error: function(msg){
                if(msg.status == 200) {                                           
                    $("#formResponse").removeClass('error');
                    $("#formResponse").removeClass('success');
                    $("#formResponse").addClass('success');
                    $("#formResponse").html("Company Information Updated Successfully");
                                        
                }
                else {
                    alert(msg.status);                                        
                    $("#formResponse").removeClass('success');
                    $("#formResponse").addClass('error');
                    $("#formResponse").html("There was an error submitting the form. Please try again.");
                }
            }
        });

        //make sure the form doesn't post
        return false;

    });

});