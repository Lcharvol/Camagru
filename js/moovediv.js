function moove()
{
    var loginform = document.getElementById('loginform');
    var registerform = document.getElementById('registerform');
    if (loginform.style.left == "0%")
    {
        loginform.style.cssText = "left:-100%;";
        registerform.style.cssText = "left:0%;";
    }
    else
    {
        loginform.style.left = "0%";
        registerform.style.left = "100%";
    }
}

function moove2()
{
    var loginform = document.getElementById('loginform');
    var resetpassword = document.getElementById('resetpassword');
    if (loginform.style.left == "0%")
    {
        loginform.style.cssText = "left:100%;";
        resetpassword.style.cssText = "left:0%;";
    }
    else
    {
        loginform.style.left = "0%";
        resetpassword.style.left = "-100%";
    }
}