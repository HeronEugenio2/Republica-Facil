<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepublicRequest;
use App\Republic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Type;
use Symfony\Component\Console\Input\Input;

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
     * @author Heron Eugenio
     */
    public function index()
    {
        $republic = Republic::with('User', 'type')->where('user_id', auth()->user()->id)->get()->first();

        return view('Painel.Republic.Republic', compact('republic'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     * @author Heron Eugenio
     */
    public function create()
    {
        $types = Type::all();

        return view('Painel.Republic.RepublicCreate', compact('types'));
    }

    /**
     * @param RepublicRequest $republicRequest
     * @return \Illuminate\Http\RedirectResponse
     * @author Heron Eugenio
     */
    public function store(RepublicRequest $republicRequest)
    {
        try {
            $data          = array_filter([
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

                                          ]);
            $savedRepublic = Republic::create($data);

            if ($savedRepublic) {
                return redirect()->route('painel.republic.index', ['id' => auth()->user('id')])
                                 ->with('success', 'Republica salva com sucesso!');
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
    function show(Republic $id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Heron Eugenio
     */
    public
    function edit($id)
    {
        $republic = Republic::find($id);
        $types    = Type::all();

        return view('Painel.Republic.RepublicCreate', compact('republic', 'types'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Republic $republic
     * @return \Illuminate\Http\Response
     * @author Heron Eugenio
     */
    public
    function update(RepublicRequest $republicRequest, $id)
    {
        $input = $republicRequest->all();
        $republicRequest->validated([
                                        $data = [
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
                                        ],
                                    ]);
        // store
        $republic               = Republic::find($id);
        $republic->name         = $input['name'];
        $republic->email        = $input['email'];
        $republic->qtdMembers   = $input['qtdMembers'];
        $republic->qtdVacancies = $input['qtdVacancies'];
        $republic->type_id      = $input['type_id'];
        $republic->description  = $input['description'];
        $republic->street       = $input['street'];
        $republic->neighborhood = $input['neighborhood'];
        $republic->cep          = $input['cep'];
        $republic->city         = $input['city'];
        $republic->state        = $input['state'];
        $republic->number       = $input['number'];
        //        dd($input);
        $updatedRepublic = $republic->save();
        if ($updatedRepublic) {
            return view('Painel.Republic.Republic', compact('republic'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Republic $republic
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        // delete
        $republic = Republic::find($id);
        $republic->delete();

        // redirect
        $republic = Republic::with('User', 'type')->where('user_id', auth()->user()->id)->get()->first();

        return view('Painel.Republic.Republic', compact('republic'));
    }
}
