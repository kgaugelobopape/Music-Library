@extends('layouts.app')
@section('title', $album->name)
@section('content')
    <h2 class="page-header">{{$album->name}}</h2><br/>
    <div class="row">
        <div class="col-md-3">
            <img src="{{URL::asset('covers/'.$album['cover'])}}" class="img-responsive img-thumbnail">
        </div>
        <div class="col-md-9">
            <ul class="list-unstyled">
                <li><p>Name: {{$album->name}}</p></li>
                <li><p>Genre: {{$album->genre}}</p></li>
                <li><p>Year: {{$album->year}}</p></li>
                <li><p>Artist: {{$album->artist}}</p></li>
            </ul>
        </div>

        <div class="col-md-12">
            <h4 class="page-header">Reviews</h4>
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @endif
            @foreach($album->reviews as $review)
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="https://placeholder.pics/svg/50">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <strong>{{$review['name']}}</strong>
                        </h4>
                        <p>{{$review['review']}}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-12">
            <h4 class="page-header">Added Review</h4>
            <form method="post" action="{{URL::route('review')}}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="review">Review:</label>
                        <textarea class="form-control" name="review"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4" style="margin-top:60px">
                        <input type="hidden" name="album_id" value="{{$album->id}}">
                        <button type="submit" class="btn btn-success" style="margin-left:38px">Added Review</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection