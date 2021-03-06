<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>vaporadio</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  
    <link rel='stylesheet' href='css/vapor/vaporwave.css'>
    <link rel='stylesheet' href='css/vapor/win98.css'>
    <link rel='stylesheet' href='css/vapor/vapor.css'>
  </head>

  <body>
    <div class='vaporwave palm-trees example'>
     <div class='resizable window center-it'>
      <div class='header'>
        <img class='icon' src='css/vapor/icons/exe.gif'/> 音楽プレーヤー.exe
      </div>
      <div class='content'>
        <audio id="audio" preload="auto">
          <source id="source" type="audio/mpeg" >
        </audio>
        <h3 id='title'></h3>
        <p id='artist'></p>
        <button id='play'>Play</button>
        <button id='next'>Next</button>
        <button id='previous'>Previous</button>
      </div>
     </div>
   </div>

  <div class='vaporwave statues example'>
    <div class='resizable window center-it'>
      <div class='header'>
        <img class='icon' src='css/vapor/icons/exe.gif' /> Album.JPG
      </div>
      <div class='content'>
        <center>
          <img id='cover' height="250" width="250"/>
        </center>
      </div>
    </div>
  </div>



  <script>
    var Song = function(name, album, artist, cover_url, audio_url) {
      this.name = name;
      this.album = album;
      this.artist = artist;
      this.cover_url = cover_url;
      this.audio_url = audio_url;
    }

    var songs = new Array();

    @foreach($songs as $song)
        var current = new Song(
          '{{$song->name}}', 
          '{{$song->albim}}', 
          '{{$song->artist}}', 
          '{{$song->cover_url}}', 
          '{{$song->audio_url}}'
        );

        songs.push(current);
    @endforeach

  </script> 

  <script type="text/javascript" src='js/radio/index.js'></script>
</body>