function go()
{
    var filtre1 = document.getElementsByClassName('filtres_visu');
    var filtre2 = document.getElementsByClassName('filtres_visu2');
    var div = document.getElementById("all");
    var chat = document.getElementsByClassName('chat');
    var masque = document.getElementsByClassName('masque');
    var licornes = document.getElementsByClassName('licornes');
    var marron = document.getElementsByClassName('marron');
    var appercue = document.getElementsByClassName('filtres_visu2');
    var button_save = document.getElementsByClassName('photo_save');
    if (chat[0].checked == true)
    {
      appercue[0].id = "filter_chat";
    }
    if (masque[0].checked == true)
    {
      appercue[0].id = "filter_masque";
    }
    if (licornes[0].checked == true)
    {
      appercue[0].id = "filter_licornes";
    }
    if (marron[0].checked == true)
    {
      appercue[0].id = "filter_marron";
    }
    div.scrollTop = div.scrollHeight - div.clientHeight;
    filtre2[0].style.backgroundImage = filtre1[0].style.backgroundImage;
    button_save[0].style.width = "50px";
}
