@extends('layouts.admin.master')

@section('board')
    <h1 class="page-header">Song</h1> 
     <div class="table-responsive">
            <table class="table table-striped">
              <thead>

                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Album</th>
                  <th>Artist</th>
                </tr>

              </thead>
              <tbody>

                @foreach($songs as $song)
                  <tr>
                    <td>{{$song->id}}</td>
                    <td>{{$song->name}}</td>
                    <td>{{$song->album}}</td>
                    <td>{{$song->artist}}</td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
@endsection