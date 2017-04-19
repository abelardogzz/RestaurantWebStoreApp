$(document).ready(function(){

/*
    //Loads Additional Information to the web page
    var jsonToSend = {
                "action" : "LOADMENU",
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
                                + data[x].Name +  "<br/>"
                                + "<b>Description:</b> " + data[x].description +"<br/>" 
                                + "Price: " + data[x].price  + "<br/>"
                                + "</li>"
                                ;
                }

                $("#FoodOptions").append(newhtml);
            },
            error: function(errorMsg){
                alert("ERROR IN Menu");
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
    $("#HomePage").on("click",function(){
        window.location.replace("PublicHome.php");
    });

    //Redirects to Public Menu Page
    $("#ContactPage").on("click",function(){
        window.location.replace("Contact.php");
    });

///Private Versions
    //Redirect to HOME PAGE Private about restautant page
    $("#PrivateContactPage").on("click",function(){
        window.location.replace("PrivateContact.php");
    });

    //Redirect to MENU PAGE Private about restautant page
    $("#PrivateHomePage").on("click",function(){
        window.location.replace("PrivateHome.php");
    });

    //Redirect to Login page
    $("#ProfilePage").on("click",function(){
        window.location.replace("Profile.php");
    });



});