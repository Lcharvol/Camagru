
var video = document.getElementById('video');
var canvas = document.getElementById('canvas');
var videoStream = null;
var preLog = document.getElementById('preLog');
var i = 1;

function getstatic()
{
	if ( typeof getstatic.counter == 'undefined' ) {
        getstatic.counter = 1;
    }
    else
	 getstatic.counter++;
	return(getstatic.counter)
}

function log(text)
{
	if (preLog) preLog.textContent += ('\n' + text);
	else alert(text);
}

function snapshot()
{
	canvas.width = video.videoWidth;
	canvas.height = video.videoHeight;
	canvas.getContext('2d').drawImage(video, 0, 0);
	var appercu = document.getElementById('photo');
	appercu.style.position = 'relative';
	appercu.style.visibility = 'visible';
	appercu.style.display = 'inline-block';
}
function save()
{
	if (canvas.width != "640")
		return(false);
	var gallery = document.getElementById('side');
	var id = getstatic();
	gallery.innerHTML += "<canvas class=\"imgside\" id =\"imgside" + id + "\"></canvas>"
	var imgside = document.getElementById('imgside' + id);
	imgside.width = video.videoWidth;
	imgside.height = video.videoHeight;
	imgside.getContext('2d').drawImage(canvas, 0, 0);	
}

function noStream()
{

}


function gotStream(stream)
{
	var myButton = document.getElementById('buttonStart');
	if (myButton) myButton.disabled = true;
	videoStream = stream;
	video.onerror = function ()
	{
	
		if (video) stop();
	};
	stream.onended = noStream;
	if (window.URL) video.src = window.URL.createObjectURL(stream);
	else if (video.mozSrcObject !== undefined)
	{
		video.mozSrcObject = stream;
		video.play();
	}
	else if (navigator.mozGetUserMedia)
	{
		video.src = stream;
		video.play();
	}
	else if (window.URL) video.src = window.URL.createObjectURL(stream);
	else video.src = stream;
	myButton = document.getElementById('buttonSnap');
	if (myButton) myButton.disabled = false;
	myButton = document.getElementById('buttonStop');
	if (myButton) myButton.disabled = false;
}

function start()
{
  if ((typeof window === 'undefined') || (typeof navigator === 'undefined')) log('Cette page requiert un navigateur Web avec les objets window.* et navigator.* !');
  else
  {
    if (navigator.getUserMedia) navigator.getUserMedia({video:true}, gotStream, noStream);
    else if (navigator.oGetUserMedia) navigator.oGetUserMedia({video:true}, gotStream, noStream);
    else if (navigator.mozGetUserMedia) navigator.mozGetUserMedia({video:true}, gotStream, noStream);
    else if (navigator.webkitGetUserMedia) navigator.webkitGetUserMedia({video:true}, gotStream, noStream);
    else if (navigator.msGetUserMedia) navigator.msGetUserMedia({video:true, audio:false}, gotStream, noStream);
    else log('getUserMedia() n’est pas disponible depuis votre navigateur !');
  }
}
start();
