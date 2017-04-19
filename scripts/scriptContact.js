$(document).ready(function(){


    //Redirect to Login page
    $("#LoginPage").on("click",function(){
        window.location.replace("Loginindex.php");
    });

    //Redirect to Contact/information about restautant page
    $("#HomePage").on("click",function(){
        window.location.replace("PublicHome.php");
    });

    //Redirects to Public Menu Page
    $("#MenuPage").on("click",function(){
        window.location.replace("MenuPage.php");
    });




});
