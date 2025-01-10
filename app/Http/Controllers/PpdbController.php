<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ppdb = Ppdb::all();
        // dd($ppdb);
        $title = 'Delete Student!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('ppdb.index', compact('ppdb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ppdb.create');
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
            'nama_lengkap' => 'required|max:50',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|max:15',
            'asal_sekolah' => 'required|min:3|max:75',
        ]);

        Ppdb::create($validatedData);

        toast('Student has been registrated', 'success');
        Alert::success('Action Success!', 'Student has been registered.');
        return redirect()->route('ppdb.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Ppdb::findOrFail($id);

        return view('ppdb.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Ppdb::findOrFail($id);

        return view('ppdb.edit', compact('siswa'));
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
        $request->validate([
            'nama_lengkap' => 'required|max:50',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|max:15',
            'asal_sekolah' => 'required|min:3|max:75',
        ]);



        $siswa = Ppdb::findOrFail($id);

        $siswa->update($request->all());

        toast('Student data has been updated', 'info');

        return redirect()->route('ppdb.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Ppdb::findOrFail($id);
        $siswa->delete();


        toast('Student data has been deleted ', 'warning');
        return redirect()->route('ppdb.index')
            ->with('success', 'Student data has been deleted');
    }
}
