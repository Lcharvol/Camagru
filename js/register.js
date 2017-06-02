const formreg = document.getElementById('register-form')
const emailreg = document.getElementById('emailreg')
const loginreg = document.getElementById('loginreg')
const passwordreg = document.getElementById('passwordreg')
const errorContainer3 = document.getElementById('errorContainer3')

const checkemailreg = () => {
    if (emailreg.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
    {
        emailreg.style.backgroundColor = "FFFFFF";
        errorContainer3.innerHTML = "";
        return(true);
    }
    else
    {
        emailreg.style.backgroundColor = "D91E41";
        errorContainer3.innerHTML = "Invalid email";
        return(false);
    }
}

const checkpasswordreg = () => {
    if (passwordreg.value .length > 3)
    {
        passwordreg.style.backgroundColor = "FFFFFF";
        errorContainer3.innerHTML = "";
        return(true);
    }
    else
    {
        passwordreg.style.backgroundColor = "D91E41";
        errorContainer3.innerHTML = "Invalid password";
        return(false);
    }
}

const checkloginreg = () => {
    if (loginreg.value .length > 3)
    {
        loginreg.style.backgroundColor = "FFFFFF";
        errorContainer3.innerHTML = "";
        return(true);
    }
    else
    {
    	loginreg.style.backgroundColor = "D91E41";
        errorContainer3.innerHTML = "Name too short";
        return(false);
    }
}

function isValidregister()
{
	if (!checkloginreg() || !checkemailreg() || !checkpasswordreg())
		return false;
	return true;
}

loginreg.addEventListener('keyup', checkloginreg)
emailreg.addEventListener('keyup', checkemailreg)
passwordreg.addEventListener('keyup', checkpasswordreg)
