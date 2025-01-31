<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class SiswasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $siswas = Siswa::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Instansiasi model Student
        $siswa = new Siswa;

        // Tetapkan nilai ke atribut model
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->jenis_kelamin = $request->jenis_kelamin;

        // Proses file cover jika ada
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/siswa', $name);

            // Tetapkan nama file ke atribut cover
            $siswa->cover = $name;
        } else {
            // Jika file cover tidak diunggah, beri nilai default atau null
            $siswa->cover = null;
        }

        // Simpan data ke database
        $siswa->save();

        // Berikan notifikasi atau umpan balik
        toast('Student has been registered', 'success');

        Alert::success('Action Success!', 'Student has been registered.');

        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
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
        $siswa = Siswa::findOrFail($id);

        // Tetapkan nilai ke atribut model
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->jenis_kelamin = $request->jenis_kelamin;

        // Proses file cover jika ada
        if ($request->hasFile('cover')) {
            $siswa->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/siswa', $name);

            // Tetapkan nama file ke atribut cover
            $siswa->cover = $name;
        } else {
            // Jika file cover tidak diunggah, beri nilai default atau null
            $siswa->cover = null;
        }

        // Simpan data ke database
        $siswa->save();
        toast('Student has been updated.', 'info');

        Alert::success('Action Success!', 'Student has been updated.');


        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa  berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        toast('Data siswa  berhasil dihapus ', 'warning');


        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa  berhasil dihapus');
    }
}
