<?php

namespace App\Http\Controllers;

use App\Models\Telepon;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Pengguna::all();
        $title = 'Delete Pengguna!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('telepon.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('telepon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'telepon' => 'required|max:15'
        ]);

        $pengguna = Pengguna::create([
            'nama' => $validatedData['nama'],
        ]);


        $pengguna->telepon()->create([
            'nomor' => $validatedData['telepon'],
            'id_pengguna' => $pengguna->id,
        ]);

        toast('Pengguna  has been registrated', 'success');
        Alert::success('Action Success!', 'Pengguna has been registered.');
        return redirect()->route('pengguna.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengguna = Pengguna::findOrFail($id);

        return view('telepon.show', compact('pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);

        return view('telepon.edit', compact('pengguna'));
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
        // $validatedData = $request->validate([
        //     'nama' => 'required|max:50'
        // ]);



        $pengguna = Pengguna::findOrFail($id);

        // $pengguna->update($request->all());

        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'telepon' => 'required|max:15'
        ]);

        $pengguna->update([
            'nama' => $validatedData['nama'],
        ]);


        $pengguna->telepon()->update([
            'nomor' => $validatedData['telepon'],
            'id_pengguna' => $pengguna->id,
        ]);


        toast('Pengguna data has been updated', 'info');

        return redirect()->route('telepon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Pengguna::findOrFail($id);
        $siswa->delete();


        toast('Pengguna data has been deleted ', 'warning');
        return redirect()->route('telepon.index')
            ->with('success', 'Pengguna data has been deleted');
    }
}
