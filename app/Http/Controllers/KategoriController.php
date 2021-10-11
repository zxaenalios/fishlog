<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategoris = Kategori::all();
        return response()->json([
            'success' => 200,
            'message' =>'Daftar Semua Kategori',
            'data'    => $kategoris
        ], 200);
    }

    public function getTotalKategori()
    {
        //
        $kategoris = Kategori::all()->count();
        return response()->json([
            'success' => 200,
            'message' =>'Jumlah Total Kategori',
            'total'    => $kategoris
        ], 200);
        // return response()->json('Berhasil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        Kategori::create($request->all());
        return response()->json([
            'success' => 200,
            'message' =>'Kategori Berhasil Ditambahkan',
            'data'    => $request->all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $kategoris = Kategori::all()->where('id_ikan', $id)->first();
        return response()->json([
            'success' => 200,
            'message' => 'Kategori By id_ikan',
            'data'    => $kategoris
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Kategori::where('id', $id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Update Kategori',
            'data' => $request->all()
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Kategori::where('id', $id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Hapus Kategori',
        ], 200);
    }
}
