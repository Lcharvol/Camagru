var getHttpRequest = function () {
  var httpRequest = false;

  if (window.XMLHttpRequest) { // Mozilla, Safari,...
    httpRequest = new XMLHttpRequest();
    if (httpRequest.overrideMimeType) {
      httpRequest.overrideMimeType('text/xml');
    }
  }
  else if (window.ActiveXObject) { // IE
    try {
      httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e) {
      try {
        httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e) {}
    }
  }

  if (!httpRequest) {
    alert('Abandon :( Impossible de créer une instance XMLHTTP');
    return false;
  }

  return httpRequest
}

function affcomment(image)
{
    var commentform = document.getElementById('comment');
    var commentimage= document.getElementById('image-comment-content');
    var hidden_input= document.getElementById('hiddeninput');
    var all_comm=new Array()
    var all_comm= document.getElementById('existent-comment').children;
    commentform.style.visibility = "visible";
    commentimage.style.backgroundImage = "url('img_gallery/" + image + "')";
    hidden_input.value = image;
    var i;
    var i2 = 0;
    for (i = 0; i< all_comm.length; i++) {
        if (typeof all_comm[i].children.hiddeninput != 'undefined')
        {
            if(all_comm[i].children.hiddeninput.name != image)
            {
                all_comm[i].style.visibility = 'hidden';
                all_comm[i].style.position = 'absolute';
            }
            else
            {
                all_comm[i].style.visibility = 'visible';
                all_comm[i].style.position = 'relative';
                i2++;
            }
        }
    }
    if (i2 == 0)
    {
        document.getElementById('no_comm').innerHTML = "Post the first comment!";
        document.getElementById('no_comm').style.visibility = 'visible';
    }
    else
        document.getElementById('no_comm').innerHTML = "";
    var nb_likes = document.getElementById('nb_likes');
}

function closecomment()
{
    var commentform = document.getElementById('comment');
    var comm= document.getElementById('existent-comment').children;
    commentform.style.visibility = "hidden";
     for (i = 0; i< comm.length; i++) {
            comm[i].style.visibility = 'hidden';
    }
}

function verif_comm()
{
}

function recherch()
{
    var recherch = document.getElementById('recherch_field').value;
    if (recherch == '')
    {
        var image = document.getElementsByClassName("imggallery");
        for (i = 0; i< image.length; i++) {
            image[i].style.visibility = "visible";
            image[i].style.position = "relative";
        }
    }
    else
    {
        var image = document.getElementsByClassName("imggallery");
        for (i = 0; i< image.length; i++) {
            image[i].style.visibility = "hidden";
            image[i].style.position = "absolute";
        }
        var allDiv = document.querySelectorAll('.imggallery');
        allDiv.forEach(function (elm){
            if (recherch === elm.className.slice(11).slice(0,recherch.length))
            {
                elm.style.visibility = "visible";
                elm.style.position = "relative";
            }
        })        
    }
}

function checklike(image)
{
    var coeur = document.getElementsByClassName('like' + image);
    coeur[0].src = "imgs/coeur.png";
}

function    where()
{
    var i = 0;
    var hauteur= document.getElementById("maingallery").offsetHeight;
    var  intElemScrollTop = document.getElementById('maingallery').scrollTop;
    var images = document.getElementsByClassName('imggallery');
    if (intElemScrollTop % 300 == 0)
    {
        while (images[i])
        {
            if (images[i].style.visibility == "visible")
            images[i].style.visibility = "visible";
            images[i].style.position = "relative";
            i++;
        }
    }
}

function escapeHtml(text) {
  return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
}

function    aff_fake_comm(comment)
{
    if (comment == "")
        return;
    comment = escapeHtml(comment);
    var comments = document.getElementById('existent-comment');
    var date = new Date().toLocaleString();
    if (document.getElementById('no_comm'))
    {
        var no_comm = document.getElementById('no_comm');
        no_comm.innerHTML = '';
    }
    comments.innerHTML = "<div id=\"comment-elem\" class=\"fake\" style=\"visibility: visible; position: relative;\">" +
    "<input id=\"hiddeninput\" type=\"hidden\" name=\"new_image_34.png\" value=\"\">"
    + "<p>" + comment + "</p>"
    + "<h1>From: user1 (" + date + ")</h1>"
    + "<form action=\"delete_comm.php\" method=\"post\"><button class=\"croix_comm\" name=\"comment_id\" value=\"36\"></button></form>"
    + "</div>" + comments.innerHTML;
    var fake_comm = document.getElementsByClassName('fake');
    fake_comm[0].style.width = "0%";
    setTimeout(function(){ fake_comm[0].style.width = "90%"; }, 10);
}

function    add_comment()
{
    var text = document.getElementById('input-text-comment').value;
    var image = document.getElementById('image-comment-content').style.backgroundImage;
    image = image.replace("url(\"img_gallery/",'');
    image = image.replace("\")",'');
    var xhr = getHttpRequest();
    xhr.open('POST', 'addcomment.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send('text=' + text + "&img=" + image);
    aff_fake_comm(text);
}

document.querySelector('#form_comment_submit').addEventListener('submit', function(e) {
    e.preventDefault();
    add_comment();
});
var img_count = 0;

maingallery.addEventListener('scroll', function (event) {
    if ((parseInt(maingallery.style.height) + maingallery.scrollTop) >= maingallery.scrollHeight - 20)
        { 
            var gallery = document.getElementById('maingallery');
            document.getElementById('maingallery').innerHTML += "<div class=\"imggallery lucas\">";
            img_count++;
        }
    });
