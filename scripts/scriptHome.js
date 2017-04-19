$(document).ready(function(){




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
 
///Private Versions
    //Redirect to HOME PAGE Private about restautant page
    $("#PrivateContactPage").on("click",function(){
        window.location.replace("PrivateContact.php");
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
