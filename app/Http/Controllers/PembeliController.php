<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelis = Pembeli::all();
        return view('pembeli.index', compact('pembelis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembeli.create');
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
            [
                'nama_pembeli' => 'required|string|max:100',
                'jenis_kelamin' => 'required|string|max:40',
                'telepon' => 'required'
            ]
        );

        $pembeli = Pembeli::create([
            'nama_pembeli' => $data['nama_pembeli'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'telepon' => $data['telepon']
        ]);

        // dd($pembeli);

        toast('Pembeli  has been registrated', 'success');
        Alert::success('Action Success!', 'Pembeli has been registered.');
        return redirect()->route('pembeli.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.show', compact('pembeli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.edit', compact('pembeli'));
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
            [
                'nama_pembeli' => 'required|string|max:100',
                'jenis_kelamin' => 'required|string|max:40',
                'telepon' => 'required'
            ]
        );
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->update([
            'nama_pembeli' => $data['nama_pembeli'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'telepon' => $data['telepon']
        ]);

        toast('Pembeli  has been updated', 'success');
        Alert::success('Action Success!', 'Pembeli has been updated.');
        return redirect()->route('pembeli.index');
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
        $pembelu = Pembeli::findOrFail($id);

        // Menghapus pembelu
        $pembelu->delete();

        // Menampilkan pesan sukses dengan SweetAlert
        Alert::success('Success', 'Pembeli deleted successfully');
        return redirect()->route('pembeli.index');
    }
}