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
                    newhtml += " <b><h3><i>Name:</i></h3></b> "+ jsonData.fName + " "+
                                 jsonData.lName + "</br><br/> "+
                                " <b><h3><i>Username:</i></h3></b> " + jsonData.username + "</br><br/> "+
                                " <b><h3><i>Email:</i></h3></b> " +jsonData.email + "</br><br/> ";
                    

                    newhtml+= "<b><h3><i>Address:</i></h3></b>" + jsonData.address + "<br/>" ;

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


    $("#LoadOrdersHistorybtn").on("click",function(){
            var jsonToSend = {
                            "action" : "LOADUSERORDERS"
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
                                + "<b>Order Number:</b>" +data[x].orderID +  "<br/>"
                                + "<b>Total Price:</b> " + data[x].totalprice +"<br/>" 
                                + "Plates Ordered: " + data[x].plates  + "<br/>"
                               + "</li>"
                                ;
                    }
                    $("#OrdersHistory").append(newhtml);
                },
                error: function(errorMsg){
                    alert("ERROR IN LOGOUT");
                        //alert(errorMessage.responseText);
                    alert(errorMsg.statusText);
                    console.log(errorMsg);
                }


            });
    });


   


});
