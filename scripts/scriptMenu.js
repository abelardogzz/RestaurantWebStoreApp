$(document).ready(function(){


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
});