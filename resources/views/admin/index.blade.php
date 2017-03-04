@extends('layouts.admin.master')

@section('board')

    @foreach($playlists as $playlist)

        <div id="table">
            <h2 class="sub-header">{{$playlist->name ." ". $playlist->created_at->toDateString()}}</h2>
            <div class="table-responsive">
                <table class="table table-striped" id="{{$playlist->name}}">

                    <thead class=>
                        <tr>
                            <th>Name</th>
                            <th>Album</th>
                            <th>Artist</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($playlist->songs as $song)
                            <tr>
                                <td>{{$song->name}}</td>
                                <td>{{$song->album}}</td>
                                <td>{{$song->artist}}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                <!-- Indicates a dangerous or potentially negative action -->
                <button type="button" class="btn btn-danger" id="{{$playlist->id}}">Delete</button>

            </div>
        </div>
        
    @endforeach

    <script>
        var ids = [];

        @foreach($playlists as $playlist)
            ids.push("{{$playlist->id}}");
        @endforeach 

    </script>

    <script src="js/overview.js"></script>

@endsection