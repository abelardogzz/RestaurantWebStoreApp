$(document).ready(function(){
/*
    //Loads Additional Information to the web page
    var jsonToSend = {
                "action" : "LOADHOME",
                "username" : "abelardogzz"
        };
    $.ajax({

        
            url:"data/applicationLayer.php",
            type: "POST", <!--GET|POST|PUT-->
            data: jsonToSend,
            dataType: "json",
            contentType : "application/x-www-form-urlencoded",
            success: function(data){
                var newhtml = "";

                for (var x in data){
                    newhtml += "<li>" 
                                + data[x].fName + " " + data[x].lName + "<br/>"
                                + "<b>User Name:</b> " + data[x].username +"<br/>" 
                                + "Email: " + data[x].email  + "<br/>"
                                + "Comment: " + data[x].comment
                                + "</li>"
                                ;
                }

                $("#CommentList").append(newhtml);
            },
            error: function(errorMsg){
                alert("ERROR IN HOME");
                    //alert(errorMessage.responseText);
                alert(errorMsg.statusText);
                console.log(errorMsg);
            }
    });
*/



    //Redirect to Login page
    $("#LoginPage").on("click",function(){
        window.location.replace("Loginindex.php");
    });

    //Redirect to Contact/information about restautant page
    $("#ContactPage").on("click",function(){
        window.location.replace("Contact.php");
    });

    //Redirects to Public Menu Page
    $("#MenuPage").on("click",function(){
        window.location.replace("MenuPage.php");
    });

    

/*
    $("#Logoutbtn").on("click",function(){
        var jsonToSend = {
                        "action" : "LOGOUT"
                    };
        $.ajax({
            

            url:"data/applicationLayer.php",
            type: "POST", <!--GET|POST|PUT-->
            data: jsonToSend,
            dataType: "json",
            contentType : "application/x-www-form-urlencoded",
            success: function(data){
                alert(data.message);
                window.location.replace("Loginindex.php");
            },
            error: function(errorMsg){
                alert("ERROR IN LOGOUT");
                    //alert(errorMessage.responseText);
                alert(errorMsg.statusText);
                console.log(errorMsg);
            }


        });
    });
*/



});
