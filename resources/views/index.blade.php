@extends('layouts.app')
@section('title', 'List of albums')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ URL::route('create')}}" class="btn btn-warning  pull-right">New Album</a>
        </div>
    </div>
    <br/>
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Cover</th>
            <th>Name</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Artist</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($albums as $album)
            @php
                $date=date('Y-m-d', $album['create_at']);
            @endphp
            <tr>
                <td width="10%">
                    <img src="{{URL::asset('covers/'.$album['cover'])}}" class="img-responsive img-thumbnail">
                </td>
                <td>{{$album['name']}}</td>
                <td>{{$album['genre']}}</td>
                <td>{{$album['year']}}</td>
                <td>{{$album['artist']}}</td>
                <td class="text-center">
                    <div class="btn-group btn-group-sm">
                        <a href="{{URL::route('show',['id'=>$album['id']])}}" class="btn btn-default">View</a>
                        <a href="{{URL::route('edit',['id'=>$album['id']])}}" class="btn btn-warning">Edit</a>
                        <a href="{{URL::route('destroy',['id'=>$album['id']])}}" class="btn btn-danger">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection