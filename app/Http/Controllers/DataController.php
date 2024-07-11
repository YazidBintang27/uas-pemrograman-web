<?php

namespace App\Http\Controllers;

use App\Models\data_buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataController extends Controller
{
    public function index()
    {
        $data = data_buku::orderBy('judul', 'desc')->paginate(4);
        return view('pages.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('penulis', $request->penulis);
        Session::flash('jumlah', $request->jumlah);

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'jumlah' => 'required|numeric'
        ],[
            'judul.required' => 'Judul harus diisi',
            'penulis.required' => 'Penulis harus diisi',
            'jumlah.required' => 'Jumlah harus diisi',
            'jumlah.numeric' => 'Jumlah harus berupa angka'
        ]);
        $data = [
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'jumlah' => $request->jumlah
        ];
        data_buku::create($data);
        return redirect()->to('buku')->with('success', 'Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = data_buku::where('judul', $id)->first();
        return view('pages.edit')->with('data', $data);
    } 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'jumlah' => 'required'
        ],[
            'judul.required' => 'Judul harus diisi',
            'penulis.required' => 'Nama harus diisi',
            'jumlah.required' => 'Jumlah harus diisi'
        ]);
        $data = [
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'jumlah' => $request->jumlah
        ];
        data_buku::where('judul', $id)->update($data);
        return redirect()->to('buku')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        data_buku::where('judul', $id)->delete();
        return redirect()->to('buku')->with('Berhasil menghapus data');
    }
}
