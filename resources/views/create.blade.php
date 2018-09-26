@extends('layouts.app')
@section('title', 'Create new album')
@section('content')
    <h2 class="page-header">Create New Album</h2><br/>
    @if (\Session::has('errors'))
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{URL::route('store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Album Name:</label>
                <input type="text" class="form-control" name="name">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="genre">Genre:</label>
                <select name="genre" class="form-control">
                    <option value="Pop">Pop</option>
                    <option value="Jazz">Jazz</option>
                    <option value="RnB">RnB</option>
                    <option value="Rap">Rap</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="year">Year:</label>
                <input type="number" class="form-control" name="year">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="artist">Artist:</label>
                <input type="text" class="form-control" name="artist">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="cover">Album Cover:</label>
                <input type="file" name="cover">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>
    </form>
@endsection
