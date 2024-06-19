<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alimentos = Alimento::all();
        return view('alimento.index', compact('alimentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $alimento = new Alimento;
        $alimento->nombre= $request->input('nombre');
        $alimento->precio= $request->input('precio');
        $alimento->cantidad= $request->input('cantidad');
        $alimento->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Alimento $alimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $alimento = Alimento::find($id);
        $alimento->nombre= $request->input('nombre');
        $alimento->precio= $request->input('precio');
        $alimento->cantidad= $request->input('cantidad');
        $alimento->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alimento = Alimento::find($id);
        $alimento->delete();
        return redirect()->back();
    }
}
