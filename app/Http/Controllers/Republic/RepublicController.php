<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepublicRequest;
use App\Republic;
use Illuminate\Http\Request;

class RepublicController extends Controller
{
    //    private $republic;
    //    public function __construct(Republic $republic)
    //    {
    //        $this->republic = $republic;
    //    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $republic = Republic::with('User', 'type')->where('user_id', auth()->user()->id)->get()->first();

        //                        dd($republic);
        return view('Painel.Republic.Republic', compact('republic'));
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
     * @param RepublicRequest $republicRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RepublicRequest $republicRequest)
    {
        try {
            $data              = [
                'name'         => $republicRequest->input('name'),
                'email'        => $republicRequest->input('email'),
                'qtdMembers'   => $republicRequest->input('qtdMembers'),
                'qtdVacancies' => $republicRequest->input('qtdVacancies'),
                'type_id'      => $republicRequest->input('type_id'),
                'description'  => $republicRequest->input('description') ?? null,
                'street'       => $republicRequest->input('street') ?? null,
                'neighborhood' => $republicRequest->input('neighborhood') ?? null,
                'cep'          => $republicRequest->input('cep') ?? null,
                'city'         => $republicRequest->input('city') ?? null,
                'state'        => $republicRequest->input('state') ?? null,
                'number'       => $republicRequest->input('number') ?? null,
                'user_id'      => $republicRequest->input('user_id') ?? null,
            ];
            $dataSavedCategory = Republic::create($data);

            if ($dataSavedCategory) {
                return redirect()->route('painel.republic.index')->with('success', 'Republica salva com sucesso!');
            } else {
                return redirect()->back()->with('error', 'Ocorreu um erro ao tentar salvar a República!');
            }
        } catch (Exception $e) {
            report($e);
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     * @param  \App\Republic $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
//        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Republic $republic
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Republic $republic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Republic $republic
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Republic $republic)
    {
        dd('veio heron');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Republic $republic
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Republic $republic)
    {
        //
    }
}
