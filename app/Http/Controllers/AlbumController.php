<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', ['albums' => Album::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Album $album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('show', ['album' => Album::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit', ['album' => Album::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Album $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        $album->name = $request->get('name');
        $album->genre = $request->get('genre');
        $album->year = $request->get('year');
        $album->artist = $request->get('artist');

        $album->save();
        return redirect()->route('list')->with('success', 'Album has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->reviews()->delete();
        $album->delete();
        return redirect()->route('list')->with('success', 'Album has been deleted');
    }
}
