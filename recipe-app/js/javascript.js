//send ajax call to send form data to signup.php file
$("#signupform").submit(function(event){
   event.preventDefault();
//    saving form data in variable
   var dataform = $(this).serializeArray();
    $.ajax({
       url: "signup.php",
       type: "post",
       data: dataform,
       success: function(data){
           if(data){
//               show message or data from php file
               $("#signupmessage").html(data);}
       },
        error: function(){
//            show error if ajax call failed
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error occured calling ajax request</div>")
        }
    });
});