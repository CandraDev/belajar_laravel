<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbits = Penerbit::all();

        return view('penerbit.index', compact('penerbits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerbit.create');
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
            ['nama_penerbit' => 'required|string|max:100']
        );

        $penerbit = Penerbit::create([
            'nama_penerbit' => $data['nama_penerbit'],
        ]);

        // dd($penerbit);

        toast('Penerbit  has been registrated', 'success');
        Alert::success('Action Success!', 'Penerbit has been registered.');
        return redirect()->route('penerbit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('penerbit'));
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
            ['nama_penerbit' => 'required|string|max:100']
        );
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($data);

        Alert::success('Success', 'Penerbit updated successfully');
        return redirect()->route('penerbit.index');
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
        $penerbit = Penerbit::findOrFail($id);

        // Menghapus penerbit
        $penerbit->delete();

        // Menampilkan pesan sukses dengan SweetAlert
        Alert::success('Success', 'Penerbit deleted successfully');
        return redirect()->route('penerbit.index');
    }
}