
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

function    like_request_plus(image)
{
    var xhr = getHttpRequest();
    xhr.open('GET', 'add_like.php?image=' + image, true);
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
    xhr.send();
}

function    like_request_less(image)
{
    var xhr = getHttpRequest();
    xhr.open('GET', 'del_like.php?image=' + image, true);
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
    xhr.send();
}

function    up_like(image)
{
    var nb_like = document.getElementsByClassName('nb_like_' + image);
    nb_like[0].textContent = parseInt(nb_like[0].textContent) + 1;
}

function    down_like(image)
{
    var nb_like = document.getElementsByClassName('nb_like_' + image);
    nb_like[0].textContent = parseInt(nb_like[0].textContent) - 1;
}

function    like(image)
{
    var coeur = document.getElementsByClassName('like' + image);
    if (coeur[0].src.search('imgs/coeur.png') === -1)
    {
      coeur[0].src = 'imgs/coeur.png';
      up_like(image);
      like_request_plus(image);
    }
    else
    {
        like_request_less(image);
        coeur[0].src = 'imgs/unlike.png';
        down_like(image);
    }
}

function      aff_more_image()
{
  var gallery = document.getElementById('maingallery').children;
  var $i2 = 0;
  for (i = 0; i< gallery.length; i++) {
      if ($i2 < 10 && gallery[i].style.display == 'none')
      {
        gallery[i].style.display = 'inline-block';
        $i2++;
      }
    }
}
