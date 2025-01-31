<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Genre;
use App\Models\Pembeli;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $penerbits = Penerbit::all();
        return view('buku.create', compact('genres', 'penerbits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Buku();
        $product->id = $request->id;
        $product->nama_buku = $request->nama_buku;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->id_penerbit = $request->id_penerbit;
        $product->tanggal_terbit = $request->tanggal_terbit;
        $product->id_genre = $request->id_genre;

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $product->image = $name;
        } else {
            $product->image = null;
        }

        $product->save();

        return redirect()->route('buku.index')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Buku::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Buku::findOrFail($id);
        return view('product.edit', compact('product'));
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
        $product = Buku::findOrFail($id);
        $product->name_product = $request->name_product;
        $product->merk = $request->merk;
        $product->price = $request->price;
        $product->stock = $request->stock;
        if ($request->hasFile('cover')) {
            $product->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/product', $name);

            $product->cover = $name;
        } else {
            $product->cover = null;
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Buku::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Data has been deleted');
    }
}