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


function    delete_image(image)
{
  var div = image.parentNode.parentNode;
  var larg = (window.innerWidth);
  if (larg < 1070)
  {
    div.style.height = "0px";
    setTimeout(function() { div.style.display = "none"; }, 1000);
  }
  else
  {
    var taille = (larg - 250) / 2;
    div.style.width = "0%";
    div.style.backgroundSize = taille + "px";
    setTimeout(function() { div.style.display = "none"; }, 1000);
  }
  var img_name = image.className;
  var img_name = img_name.substr(12, undefined);
  var xhr = getHttpRequest();
  xhr.open('POST', 'delete_image.php', true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send('img=' + img_name);
}
