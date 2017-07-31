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