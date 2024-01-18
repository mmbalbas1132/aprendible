<?php

namespace App\Http\Controllers;

use App\Models\Ring;
use Illuminate\Http\Request;

class RingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rings.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
//   Aquí es donde almaceno el ring y lo almaceno en la DB
    public function store(Request $request)
    {
        Ring::create([
            'mensaje' => $request->get('mensaje'),
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('rings.index')->with('status', 'Ring created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ring $ring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ring $ring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ring $ring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ring $ring)
    {
        //
    }
}
