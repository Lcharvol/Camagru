const emailres = document.getElementById('emailres')
const errorContainer1 = document.getElementById('errorContainer1')

const checkemailres = () => {
    if (emailres.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
    {
        emailres.style.backgroundColor = "FFFFFF";
        errorContainer1.innerHTML = "";
        return(true);
    }
    else
    {
        emailres.style.backgroundColor = "D91E41";
        errorContainer1.innerHTML = "Invalid email";
        return(false);
    }
}

emailres.addEventListener('keyup', checkemailres)

