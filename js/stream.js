var songs = $(".song");
var title = '';
songs.on('click',function(event){
	title = event.target.text;
	httpGetAsync('stream_query.php',setSong,event.target.text);
});

function httpGetAsync(theUrl,callback, data)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
        	callback(xmlHttp.responseText);
    }
    xmlHttp.open("GET", theUrl+'?songTitle='+data, true);
    xmlHttp.send(null);
}

function setSong(url){
	$('#mainAudio').attr("src",url);
	$("#songLabel").text(title);
}