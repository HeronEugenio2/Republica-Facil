<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpentRequest;
use App\Models\Spent;
use App\Models\User;
use Illuminate\Http\Request;

class SpentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user             = auth()->user();
        $republic         = $user->republic;
        $spents           = $republic->spents;
        $spentsTotal      = 0;
        $spentsIndividual = 0;

        foreach ($spents as $spent) {
            $spentsTotal += $spent->value;
        }
        foreach ($user->spents as $spent) {
            $spentsIndividual += $spent->value;
        }
        if ($republic->qtdMembers == 0) {
            $media = $spentsTotal;
        } else {
            $media = $spentsTotal / $republic->qtdMembers;
        }
        $result = -$media + $spentsIndividual;

        //dd($user);
        return view('Painel.Spents.Index', compact('spents', 'republic', 'spentsTotal', 'media', 'spentsIndividual', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user     = User::with('republic', 'republic.spents')->first();
        $republic = $user->republic;
        $spents   = $republic->spents;

        return view('Painel.Spents.Create', compact('spents', 'republic'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpentRequest $spentRequest)
    {
        try {
            $data = array_filter([
                                     'description' => $spentRequest->input('description') ?? null,
                                     'dateSpent'   => $spentRequest->input('dateSpent') ?? null,
                                     'value'       => $spentRequest->input('value'),
                                     'republic_id' => $spentRequest->input('republic_id'),
                                     'user_id'     => $spentRequest->input('user_id'),
                                 ]);
            //            dd($data);
            $saveSpent = Spent::create($data);

            if ($saveSpent) {
                return redirect()->route('painel.spent.index', ['id' => auth()->user('id')])
                                 ->with('success', 'Gasto salvo com sucesso!');
            } else {
                return redirect()->back()->with('error', 'Ocorreu um erro ao tentar salvar gasto!');
            }
        } catch (Exception $e) {
            report($e);
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     * @param  \App\Spent $spent
     * @return \Illuminate\Http\Response
     */
    public function show(Spent $spent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Spent $spent
     * @return \Illuminate\Http\Response
     */
    public function edit(Spent $spent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Spent $spent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spent $spent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Spent $spent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spent = Spent::find($id);
        $spent->delete();

        return redirect()->route('painel.spent.index');
    }
}
