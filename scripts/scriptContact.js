$(document).ready(function(){


    //Redirect to Login page
    $("#LoginPage").on("click",function(){
        window.location.replace("Loginindex.php");
    });

    //Redirect to HOME PAGE about restautant page
    $("#HomePage").on("click",function(){
        window.location.replace("PublicHome.php");
    });

    //Redirects to Public Menu Page
    $("#MenuPage").on("click",function(){
        window.location.replace("MenuPage.php");
    });

///Private Versions
    //Redirect to HOME PAGE Private about restautant page
    $("#PrivateHomePage").on("click",function(){
        window.location.replace("PrivateHome.php");
    });

    //Redirect to MENU PAGE Private about restautant page
    $("#PrivateMenuPage").on("click",function(){
        window.location.replace("PrivateMenuPage.php");
    });

    //Redirect to Login page
    $("#ProfilePage").on("click",function(){
        window.location.replace("Profile.php");
    });


});
