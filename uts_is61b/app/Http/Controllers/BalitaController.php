<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $bal = Balita::all();
        return view('balita.index',compact('nomor','bal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('balita.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jur = new Balita();
        $jur->kode = $request->kode;
        $jur->jurusan = $request->nama;
        $jur->save();

        return redirect('/balita/');
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
        $jur = Balita::find($id);
        return view('balita.edit',compact('bal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bal = Balita::find($id);
        $bal->kode = $request->kode;
        $bal-> nama = $request->nama;
        $bal-> alamat = $request->alamat;
        $bal-> bb = $request->bb;
        $bal-> tb = $request->tb;
        $bal-> status = $request->status;
        $bal->save();

        return redirect('/balita/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bal = Balita::find($id);
        $bal->delete();

        return redirect('/balita/');
    }
}