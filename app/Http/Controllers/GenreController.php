<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return view('genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            ['genre' => 'required|string|max:100']
        );

        $genre = Genre::create([
            'genre' => $data['genre'],
        ]);

        // dd($penerbit);

        toast('Genre  has been registrated', 'success');
        Alert::success('Action Success!', 'Genre has been registered.');
        return redirect()->route('genre.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = Genre::findOrFail($id);
        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            ['genre' => 'required|string|max:100']
        );
        $genre = Genre::findOrFail($id);
        $genre->update($data);

        Alert::success('Success', 'Genre updated successfully');
        return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Mencari order berdasarkan ID
        $genre = Genre::findOrFail($id);

        // Menghapus penerbit
        $genre->delete();

        // Menampilkan pesan sukses dengan SweetAlert
        Alert::success('Success', 'Genre deleted successfully');
        return redirect()->route('genre.index');
    }
}