var playButton = $('#play');
var nextButton = $('#next');
var previousButton = $('#previous');
var audio = $('#audio')[0];

var current = 0;
var isplayed = false;

function main(){
	SetupSong();
}
$(document).ready(main);

function SetupSong() {
	var currentSong = songs[current];
	$('#title').text(currentSong.name);
	$('#artist').text(currentSong.artist);
	$('#cover').attr("src", currentSong.cover_url);
	$('#source').attr("src", currentSong.audio_url);
	audio.load();
}

function ChangeNextSong() {
    if((current + 1) != songs.length ){
        isplayed = false;
        playButton.html("Play");
		current++;
		SetupSong();
	}
}

function ChangePreviousSong() {
	if(current != 0){
	    isplayed = false;
        playButton.html("Play");
		current--;
		SetupSong();
	}
}

playButton.on('click', function(event) {
	switch(isplayed){
		case false:
			audio.play();
			playButton.html("Pause");
			break;
		case true:
			audio.pause();
			playButton.html("Play");
			break;
	}
	isplayed = !isplayed;
});

nextButton.on('click', function(event) {
    ChangeNextSong();
})

previousButton.on('click', function(event) {
    ChangePreviousSong();
})

audio.addEventListener("ended", function(){
    ChangeNextSong();
    audio.play();
});