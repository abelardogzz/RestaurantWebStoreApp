$(document).ready(function(){
	
var jsonToSend = {
                "action" : "LOADPROFILE"
        };

    $.ajax({
            url:"data/applicationLayer.php",
            type: "POST", <!--GET|POST|PUT-->
            data: jsonToSend,
            dataType: "json",
            contentType : "application/x-www-form-urlencoded", /** Espesify bc default xml and it reads diferently*/
            success: function(jsonData){
                /*On success, it returns an array of objects*/
                console.log(jsonData);
                
                    var newhtml ="";
                    newhtml += " <b>Name:</b> "+ jsonData.fName + " "+
                                 jsonData.lName + "</br> "+
                                " <b>User Name:</b> " + jsonData.username + "</br> "+
                                " <b>Email:</b> " +jsonData.email + "</br> ";
                    

                    newhtml+= "<b>Address:</b>" + jsonData.address ;

                    $("#UserProfile").append(newhtml);
                
                    //Agregar los datos para la lista historica de ORDENES
                    //NO OLVIDAR
                    //IMPORTANTE
                    //RELEVANTE
                    //UGH que flojera 
            },
            error: function(errMessage){
                alert("ERROR IN PROFILE");
                    //alert(errorMessage.responseText);
                alert(errMessage.statusText);
                console.log(errMessage);
                
            }
    });



    $("#PrivateHomePage").on("click",function(){
        window.location.replace("PrivateHome.php");
    });

    $("#PrivateMenuPage").on("click",function(){
        window.location.replace("PrivateMenuPage.php");
    });

    $("#PrivateContactPage").on("click",function(){
        window.location.replace("PrivateContact.php");
    });

    

});
