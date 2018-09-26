@extends('layouts.app')
@section('title', 'List of albums')
@section('content')
    <h2 class="page-header">Edit album: "{{$album->name}}"</h2><br/>
    @if (\Session::has('errors'))
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{URL::route('update', ['id'=>$album->id])}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{$album->name}}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="genre">Genre</label>
                <select name="genre" class="form-control">
                    <option value="Pop" @if($album->genre=="Pop") selected @endif>Pop</option>
                    <option value="Jazz" @if($album->genre=="Jazz") selected @endif>Jazz</option>
                    <option value="RnB" @if($album->genre=="Rnb") selected @endif>RnB</option>
                    <option value="Rap" @if($album->genre=="Rap") selected @endif>Rap</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="year">Year</label>
                <input type="number" class="form-control" name="year" value="{{$album->year}}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="artist">Artist</label>
                <input type="text" class="form-control" name="artist" value="{{$album->artist}}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="cover">Album Cover:({{$album->cover}})</label>
                <input type="file" name="cover">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <input type="hidden" name="_method" value="PUT">
                <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
            </div>
        </div>
    </form>
@endsection