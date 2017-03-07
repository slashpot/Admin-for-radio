@extends('layouts.admin.master') 

@section('board')

<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.5.2/jqueryiframe-transport.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.5.2/jquery.fileupload.min.js"></script>

<h1>Create Playlist</h1>

<form method="POST" action="/admin" enctype="multipart/form-data">

  <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">

  <hr>
  <div class="form-inline">

    <div class="form-group">

      <label for="list_name">Playlist</label>
      <input type="text" class="form-control" id="list_name" name="list_name" required>

    </div>
 
    <label class="mr-sm-2" for="inlineFormCustomSelect">Number</label>
    
    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
    </select>

  </div>

  <hr>

  <div class="form-inline" id="inlineForm">

    <div class="form-group">

      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name[]" required>

    </div>

    <div class="form-group">

      <label for="album">Album</label>
      <input type="text" class="form-control" id="album" name="album[]" required>

    </div>

    <div class="form-group">

      <label for="artist">Artist</label>
      <input type="text" class="form-control" id="artist" name="artist[]" required>

    </div>

    <div class="form-group">

      <label for="cover">Cover</label>
      <input type="file" class="file" name="cover[]" multiple required>

    </div>

    <div class="form-group">

      <label for="audio">Audio</label>
      <input type="file" class="file" name="audio[]" multiple required>

    </div>

    <hr>

  </div>

  <div id="form">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>

</form>

<script src="/js/admin/create.js"></script>

@endsection