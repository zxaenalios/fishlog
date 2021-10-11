<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $katalogs = Katalog::all();
        return response()->json([
            'success' => 200,
            'message' =>'List Semua Katalog Ikan',
            'ikan'    => $katalogs
        ], 200);
        // return response()->json('Berhasil');
    }

    public function getTotalKatalog()
    {
        //
        $katalogs = Katalog::all()->count();
        return response()->json([
            'success' => 200,
            'message' =>'Jumlah Total Katalog Ikan',
            'total'    => $katalogs
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
        Katalog::create($request->all());
        return response()->json([
            'success' => 200,
            'message' =>'Katalog Berhasil Ditambahkan',
            'ikan'    => $request->all()
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
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $katalogs = Katalog::where('id', $id)->get();
        return response()->json([
            'success' => 200,
            'message' => 'Detail Ikan',
            'ikan'    => $katalogs
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Katalog $katalog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Katalog::where('id', $id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Update Katalog',
            'ikan' => $request->all()
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Katalog::where('id', $id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Hapus Katalog',
        ], 201);
    }
}
