<?php

namespace App\Http\Controllers;

use App\Models\Republic;
use Illuminate\Http\Request;

/**
 * Class PortalController
 * @package App\Http\Controllers
 * @author Heron Eugenio
 */
class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @author Heron Eugenio
     */
    public function index()
    {
        $republics = Republic::paginate(6);
        return view('Portal.welcome', compact('republics'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @author Heron Eugenio
     */
    public function indexRepublics()
    {
        $republics = Republic::all();
        return view('Portal.Republic.Index', compact('republics'));

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $republic = Republic::find($id);
        return view('Portal.Republic.Show', compact('republic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
//        dd($request->request);
        $value = $request->input(['search']);

        $republics = Republic::where('city','like','%'.$value.'%')->get();
        return view('Portal.Republic.Index', compact('republics'));
    }

    public function ajaxSearch (Request $request){
        $value = $request->input('value');
        $type = $request->input('type');
    }
}
