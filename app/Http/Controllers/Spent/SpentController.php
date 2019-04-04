<?php

namespace App\Http\Controllers;

use App\Spent;
use Illuminate\Http\Request;

class SpentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Painel.Spents.Spents');
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
     * @param  \App\Spent  $spent
     * @return \Illuminate\Http\Response
     */
    public function show(Spent $spent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spent  $spent
     * @return \Illuminate\Http\Response
     */
    public function edit(Spent $spent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spent  $spent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spent $spent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spent  $spent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spent $spent)
    {
        //
    }
}
