$(document).ready(function(){

// Loads Additional Information to the web page
    var jsonToSend = {
                "action" : "LOADMENU",
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

/// Public Versions
    // Redirect to Login page
    //--------------------------------------------------------------
    $("#LoginPage").on("click",function(){
        window.location.replace("Loginindex.php");
    });
    //--------------------------------------------------------------

    // Redirect to Contact/information about restautant page
    //--------------------------------------------------------------
    $("#HomePage").on("click",function(){
        window.location.replace("PublicHome.php");
    });
    //--------------------------------------------------------------

    // Redirects to Public Menu Page
    //--------------------------------------------------------------
    $("#ContactPage").on("click",function(){
        window.location.replace("Contact.php");
    });
    //--------------------------------------------------------------

/// Private Versions
    //Redirect to HOME PAGE Private about restaurant page
    //--------------------------------------------------------------
    $("#PrivateContactPage").on("click",function(){
        window.location.replace("PrivateContact.php");
    });
    //--------------------------------------------------------------

    //Redirect to MENU PAGE Private about restaurant page
    //--------------------------------------------------------------
    $("#PrivateHomePage").on("click",function(){
        window.location.replace("PrivateHome.php");
    });
    //--------------------------------------------------------------

    //Redirect to Profile page
    //--------------------------------------------------------------
    $("#ProfilePage").on("click",function(){
        window.location.replace("Profile.php");
    });
    //--------------------------------------------------------------

    $("#PublicFoodSearchbtn").on("click",function(){
        var jsonToSend = {
                "action" : "SEARCHFOOD",
                "food" : $("#FoodSearchBox").val()
        };

        $.ajax({
            url:"data/applicationLayer.php",
            type: "POST", <!--GET|POST|PUT-->
            data: jsonToSend,
            dataType: "json",
            contentType : "application/x-www-form-urlencoded", /** Espesify bc default xml and it reads diferently*/
            success: function(jsonData){
                /*On success, it returns an array of objects*/
                if (jsonData.status != "PLATE NOT FOUND"){
                    alert("LOOK AT that PLATE!!");
                    console.log(jsonData);
                    
                        var newhtml ="";
                        newhtml += "<li>" +
                                    " <b>Name:</b> "+ jsonData.name + " "+
                                    " <b>Description:</b> " + jsonData.description + "</br> "+
                                    " <b>Price:</b> " +jsonData.price + "</br> ";
                        // DONT ADD a BTN FOR THE REQuEST FUNCTIONALITY
                        //newhtml += "<input id=\"AddToOrderbtn\" type=\"submit\" value=\"Add to Order\"/>";
                        //newhtml += "<input type=\"hidden\" id=\"userFood\" value=" +jsonData.name +"> ";
                        newhtml += "</li>";

                        $("#SearchFoodOptions").append(newhtml);
                }
                else{
                    alert("Sorry");
                    alert(jsonData.status);
                }
            },
            error: function(errMessage){
                alert("ERROR IN FOOD FINDER");
                    //alert(errorMessage.responseText);
                alert(errMessage.statusText);
                console.log(errMessage);
                
            }
        });
    });


    $("#PrivateFoodSearchbtn").on("click",function(){
        var jsonToSend = {
                "action" : "SEARCHFOOD",
                "food" : $("#FoodSearchBox").val()
        };

        $.ajax({
            url:"data/applicationLayer.php",
            type: "POST", <!--GET|POST|PUT-->
            data: jsonToSend,
            dataType: "json",
            contentType : "application/x-www-form-urlencoded", /** Espesify bc default xml and it reads diferently*/
            success: function(jsonData){
                /*On success, it returns an array of objects*/
                if (jsonData.status != "PLATE NOT FOUND"){
                    alert("LOOK AT that PLATE!!");
                    console.log(jsonData);
                    
                        var newhtml ="";
                        newhtml += "<li>" +
                                    " <b>Name:</b> "+ jsonData.name + " "+
                                    " <b>Description:</b> " + jsonData.description + "</br> "+
                                    " <b>Price:</b> " +jsonData.price + "</br> ";
                        //ADD a BTN FOR THE REQuEST FUNCTIONALITY
                        newhtml += "<input id=\"AddToOrderbtn\" type=\"submit\" value=\"Add to Order\"/>";
                        newhtml += "<input type=\"hidden\" id=\"userFood\" value=" +jsonData.name +"> ";
                        newhtml += "</li>";

                        $("#SearchFoodOptions").append(newhtml);
                }
                else{
                    alert("Sorry");
                    alert(jsonData.status);
                }
            },
            error: function(errMessage){
                alert("ERROR IN FOOD FINDER");
                    //alert(errorMessage.responseText);
                alert(errMessage.statusText);
                console.log(errMessage);
                
            }
        });
    });







});