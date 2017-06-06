
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
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest')
    xhr.send()
}

function    like_request_less(image)
{
    var xhr = getHttpRequest();
    xhr.open('GET', 'del_like.php?image=' + image, true);
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest')
    xhr.send()
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

function  show_upload()
{
  var to_show = document.getElementById('minigallery');
  var to_hide = document.getElementById('aff_minigallery');
  to_show.style.top = "0px";
  to_hide.style.top = "-250px";
}

function      get_filtre()
{
  var filtre = document.getElementsByClassName('filtres_visu2');
  if (filtre != null)
    return(filtre[0].id);
  else
    return("");
}

function      add_to_mini_gallery(img)
{
  var mini_gallery = document.getElementById('appercu_gallery');
  mini_gallery.innerHTML = "<div class=\"mini_image\" style=\"height:0px;background-image:url(" + img + ");\" ></div>" + mini_gallery.innerHTML;
  setTimeout(function(){ mini_gallery.children[0].style.height = "145px"; }, 1000);
}

function      save_photo()
{
  var canvas = document.getElementById('canvas');
  var image = canvas.toDataURL("image/png");
  var button_save = document.getElementsByClassName('photo_save');
  var type_filtre = get_filtre();
  var filtre;
  var xhr = getHttpRequest();
  if (type_filtre == 'filter_marron')
    filtre = 'marron';
  else if (type_filtre == 'filter_licornes')
    filtre = 'licornes';
  else if (type_filtre == 'filter_masque')
    filtre = 'masque';
  else if (type_filtre == 'filter_chat')
    filtre = 'chat';
  else
    filtre = "";
  xhr.open('POST', 'save_snap.php', true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send('img=' + image + '&filtre=' + filtre);
  xhr.onreadystatechange = () => {
    if(xhr.readyState == 4)
    {
      button_save[0].style.width = 0;
      add_to_mini_gallery(xhr.responseText);
    }
  };
}

function      wich_filtre()
{
  var chat = document.getElementsByClassName('chat');
  var masque = document.getElementsByClassName('masque');
  var licornes = document.getElementsByClassName('licornes ');
  var marron = document.getElementsByClassName('marron');
  var filtre = document.getElementsByClassName('filtres_visu');
  var button = document.getElementsByClassName('buttonSnap');
  if (chat[0].checked == true)
  {
    filtre[0].style.backgroundImage = "url(imgs/cadre_chaton.png)";
    button[0].style.display = "block";
  }
  else if (masque[0].checked == true)
  {
    filtre[0].style.backgroundImage = "url(imgs/masque_paul.png)";
    button[0].style.display = "block";
  }
  else if (licornes[0].checked == true)
  {
    filtre[0].style.backgroundImage = "url(imgs/cadre_licorne.png)";
    button[0].style.display = "block";
  }
  else if (marron[0].checked == true)
  {
    filtre[0].style.backgroundImage = "url(imgs/blue_filtre.png)";
    button[0].style.display = "block";
  }
  else
  {
    filtre[0].style.backgroundImage = "none";
  }
}

function aff_filtres()
{
  var filtre = wich_filtre();
}

var filtres = document.getElementById('filtres');
filtres.addEventListener('change', aff_filtres, false);