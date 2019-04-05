<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        return view('');
    }

    /**
     * Display the specified resource.
     * @param  \App\Address $adress
     * @return \Illuminate\Http\Response
     */
    public function show(Address $adress)
    {
        //
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
     * Show the form for editing the specified resource.
     * @param  \App\Address $adress
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $adress)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Painel.Address.AddressCreate');
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Address $adress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $adress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Address $adress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $adress)
    {
        //
    }
}
