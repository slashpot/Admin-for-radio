@extends('layouts.layout')

@section('content')
    <div class='vaporwave palm-trees example'>
     <div class='resizable window center-it'>
      <div class='header'>
        <img class='icon' src='css/icons/exe.gif'/> 音楽プレーヤー.exe
      </div>
      <div class='content'>
        <audio id="audio" preload="auto" loop="false">
          <source id="source" >
        </audio>
        <h3 id='name'>{{$song->name}}</h3>
        <p id='artist'>{{$song->artist}}</p>
        <button id='play'>Play</button>
        <button id='next'>Next</button>
        <button id='previous'>Previous</button>
      </div>
    </div>
  </div>

  <div class='vaporwave statues example'>
    <div class='resizable window center-it'>
      <div class='header'>
        <img class='icon' src='css/icons/exe.gif' /> Album.JPG
      </div>
      <div class='content'>
        <center>
          <img id='cover' height="250" width="250"/>
        </center>
      </div>
    </div>
  </div>

  <script type="text/javascript" src='js/foo.js'></script>
@endsection