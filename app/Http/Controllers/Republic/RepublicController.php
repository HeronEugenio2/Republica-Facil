<?php

namespace App\Http\Controllers;

use App\Republic;
use Illuminate\Http\Request;

class RepublicController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $republics = Republic::with('type')->get();

        //        dd($republics);
        return view('Painel.Republic.Republic', compact('republics'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Painel.Republic.RepublicCreate');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  \App\Republic $republic
     * @return \Illuminate\Http\Response
     */
    public function show(Republic $republic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Republic $republic
     * @return \Illuminate\Http\Response
     */
    public function edit(Republic $republic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Republic $republic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Republic $republic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Republic $republic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Republic $republic)
    {
        //
    }
}
