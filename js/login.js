const form = document.getElementById('login-form')
const emaillog = document.getElementById('emaillog')
const passwordlog = document.getElementById('passwordlog')
const errorContainer2 = document.getElementById('errorContainer2');

const checkpasswordlog = () => {
    if (passwordlog.value .length > 3)
    {
        passwordlog.style.backgroundColor = "FFFFFF";
        errorContainer2.innerHTML = "";
        return(true);
    }
    else
    {
        passwordlog.style.backgroundColor = "D91E41";
        errorContainer2.innerHTML = "Invalid password";
        return(false);
    }
}

function isValidlog()
{
   if (!checkpasswordlog())
		  return false;
	 return true;
}

passwordlog.addEventListener('keyup', checkpasswordlog)