<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Pembeli;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::all();
        $bukus = Buku::all();
        $pembelis = Pembeli::all();
        return view('transaksi.index', compact('transaksis', 'bukus', 'pembelis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksis = Transaksi::all();
        $bukus = Buku::all();
        $pembelis = Pembeli::all();
        return view('transaksi.create', compact('transaksis', 'bukus', 'pembelis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'required|exists:bukus,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_transaksi' => 'required|date',
            'id_pembeli' => 'required|exists:pembelis,id',
        ]);

        Transaksi::create([
            'id_buku' => $request->id_buku,
            'jumlah' => $request->jumlah,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'id_pembeli' => $request->id_pembeli,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Data has been added');
    }

    public function edit(Transaksi $transaksi)
    {
        $bukus = Buku::all();
        $pembelis = Pembeli::all();
        return view('transaksi.edit', compact('transaksi', 'bukus', 'pembelis'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'id_buku' => 'required|exists:bukus,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_transaksi' => 'required|date',
            'id_pembeli' => 'required|exists:pembelis,id',
        ]);

        $transaksi->update([
            'id_buku' => $request->id_buku,
            'jumlah' => $request->jumlah,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'id_pembeli' => $request->id_pembeli,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Data has been updated');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Data has been deleted');
    }
}