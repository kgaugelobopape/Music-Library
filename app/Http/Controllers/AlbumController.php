<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use Validator, File;

class AlbumController extends Controller
{
    public function index()
    {
        return view('index', ['albums' => Album::all()]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $form_data = $request->all();
        $rules = [
            'name' => 'required',
            'cover' => 'required',
            'genre' => 'required',
            'year' => 'required',
            'artist' => 'required'
        ];

        $validator = Validator::make($form_data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasfile('cover')) {
            $file = $request->file('cover');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/covers/', $name);
        }

        $album = new Album;
        $album->name = $request->get('name');
        $album->cover = $name;
        $album->genre = $request->get('genre');
        $album->year = $request->get('year');
        $album->artist = $request->get('artist');
        $album->save();

        return redirect()->route('list')->with('success', 'New album has been added!');
    }

    public function show($id)
    {
        return view('show', ['album' => Album::find($id)]);
    }

    public function edit($id)
    {
        return view('edit', ['album' => Album::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $form_data = $request->all();
        $rules = [
            'name' => 'required',
            'genre' => 'required',
            'year' => 'required',
            'artist' => 'required'
        ];

        $validator = Validator::make($form_data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $album = Album::find($id);
        $old_file = public_path().'/covers/'.$album->cover;

        if ($request->hasfile('cover')) {
            if(File::exists($old_file)){
                File::delete($old_file);
            }
            $file = $request->file('cover');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/covers/', $name);
            $album->cover = $name;
        }

        $album->name = $request->get('name');
        $album->genre = $request->get('genre');
        $album->year = $request->get('year');
        $album->artist = $request->get('artist');
        $album->save();

        return redirect()->route('list')->with('success', 'Album has been updated');
    }

    public function destroy($id)
    {
        $album = Album::find($id);
        $album->reviews()->delete();
        $album->delete();
        unlink(public_path().'/covers/'.$album->cover);

        return redirect()->route('list')->with('success', 'Album has been deleted');
    }
}
