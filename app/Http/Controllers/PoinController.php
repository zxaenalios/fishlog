<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Poin;
use Illuminate\Http\Request;

class PoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getTotalPoin()
    {
        //
        $poin = Poin::all()->sum('poin');
        return response()->json([
            'success' => 200,
            'message' =>'Jumlah Total Kategori',
            'total'    => $poin
        ], 200);
        // return response()->json('Berhasil');
    }

    public function getIdUserMaxPoin()
    {
        //
        $maxpoin = Poin::max('poin');
        $id_user = Poin::where('poin', $maxpoin)->value('id_user');
        return response()->json([
            'success' => 200,
            'message' =>'Get id_user Dengan Poin Maksimum',
            'data'    => $id_user,
            'maxpoin' => $maxpoin
        ], 200);
        // return response()->json('Berhasil');
    }

    public function getIdUserMinPoin()
    {
        //
        $minpoin = Poin::min('poin');  
        $id_user = Poin::where('poin', $minpoin)->value('id_user');
        return response()->json([
            'success' => 200,
            'message' =>'Get id_user Dengan Poin Minimum',
            'id_user' => $id_user,
            'minpoin' => $minpoin
        ], 200);
        // return response()->json('Berhasil');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Poin  $poin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $poins = Poin::all()->where('id_user', $id)->first();
        return response()->json([
            'success' => 200,
            'message' => 'Poin By id_user',
            'data'    => $poins
        ], 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poin  $poin
     * @return \Illuminate\Http\Response
     */
    public function edit(Poin $poin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poin  $poin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Poin::where('id_user', $id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Update Poin By id_user',
            'data' => $request->all()
        ], 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poin  $poin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poin $poin)
    {
        //
    }
}
