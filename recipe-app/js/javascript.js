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
//            show error if aj6x call failed
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error occured calling ajax request</div>")
        }
    });
});


//login form

$("#loginform").submit(function(event){
    event.preventDefault();
    var dataform = $(this).serializeArray();
    $.ajax({
        url:'login.php',
        type: 'post',
        data: dataform,
        success: function(data){
            if(data == 'success'){
                window.location = "profile.php";
            } else{
                $("#loginmessage").html(data);
            }
            
        },
        error: function(){
            $("#loginmessage").html("<div class='alert alert-danger'>There was problem calling ajax call please try again</div>");
        }
        
    });
});

//add new catagory form

$("#add_catagory").submit(function(event){
    event.preventDefault();
    var dataform = $(this).serializeArray();
    $.ajax({
        url:'add_catagory.php',
        type: 'post',
        data: dataform,
        success: function(data){
            if(data){
                $("#catmessage").html(data);
            }
            
        },
        error: function(){
            $("#catmessage").html("<div class='alert alert-danger'>There was problem calling ajax call please try again</div>");
        }
        
    });
});
//leaving comments ajax call
$(document).ready(function(){
    $("#comments-form").on('submit', function(event){
        event.preventDefault();
        var formData = $(this).serializeArray();
        $.ajax({
            
            url:"comments.php",
            type: "post",
            data: formData,
            success: function(data){
                if(data== "success"){
                    location.reload();      
                } else {
                    $("#comment-area").html(data);
                }
            },
            error: function(){
                $("#comment-area").html("<div class='alert alert-danger'>There was an error leaving comments please try again</div>");
            }
        })
    });
});


//add new post
//$(document).ready(function(){
//    
//
//$("#add_new_post").on('submit',function(event){
//    event.preventDefault();
//    var dataform = new dataform(this);
//    $.ajax({
//        url:'add_new_post.php',
//        type: 'post',
//        
//        data: dataform,
//        cache:false,
//        contentType: false,
//        processData: false,
//        success: function(data){
//            if(data){
//                $("#postmessage").html(data);
//            }
//            
//        },
//        error: function(){
//            $("#postmessage").html("<div class='alert alert-danger'>There was problem calling ajax call please try again</div>");
//        }
//        
//    });
//});
//
//$("#post_pic").on("change", function() {
//        $("#add_new_post").submit();
//    });
//
//});
//rating
//var logID = 'log',
//  log = $('<div id="'+logID+'"></div>');
//$('body').append(log);
//  $('[type*="radio"]').change(function () {
//    var me = $(this);
//    log.html(me.attr('value'));
//  });

$(document).ready(function(){
        $("input[type='radio']").click(function(){
            var rating = $("input[name='star']:checked").val();
            var post = $("input[name='post']").val();
            var user = $("input[name='user']").val();
            if(rating){
               $.ajax({
                   type: 'post',
                   url: 'rating.php',
                   data: {rate: rating, post: post, user: user },
                   success: function(data){
                        $('.info').html(data)
               },
                   error: function(){
                       $(".info").html("<div class='alert alert-danger'>error sending rating</div>");
                   }
               })
                
            }
        });
        
    });