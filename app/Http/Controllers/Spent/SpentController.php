<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpentRequest;
use App\Models\Spent;
use App\Models\User;
use App\Models\SpentHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user      = auth()->user();
        $republic  = $user->republic;
        $spents    = $republic->spents;
        $histories = SpentHistory::where('user_id', $user->id)->orWhere('republic_id', $user->id)->orderBy('month')
                                 ->get();

        //GRAFICO
        if (isset($histories)) {
            $value1  = 0;
            $value2  = 0;
            $value3  = 0;
            $value4  = 0;
            $value5  = 0;
            $value6  = 0;
            $value7  = 0;
            $value8  = 0;
            $value9  = 0;
            $value10 = 0;
            $value11 = 0;
            $value12 = 0;
            foreach ($histories as $key => $history) {
                switch ($history->month) {
                    case 1:
                        $mes    = 'janeiro';
                        $value1 += $history->value;
                        break;
                    case 2:
                        $mes    = 'fevereiro';
                        $value2 += $history->value;
                        break;
                    case 3:
                        $mes    = 'março';
                        $value3 += $history->value;
                        break;
                    case 4:
                        $mes    = 'abril';
                        $value4 += $history->value;
                        break;
                    case 5:
                        $mes    = 'maio';
                        $value5 += $history->value;
                        break;
                    case 6:
                        $mes    = 'junho';
                        $value6 += $history->value;
                        break;
                    case 7:
                        $mes    = 'julho';
                        $value7 += $history->value;
                        break;
                    case 8:
                        $mes    = 'agosto';
                        $value8 += $history->value;
                        break;
                    case 9:
                        $mes    = 'setembro';
                        $value9 += $history->value;
                        break;
                    case 10:
                        $mes     = 'outubro';
                        $value10 += $history->value;
                        break;
                    case 11:
                        $mes     = 'novembro';
                        $value11 += $history->value;
                        break;
                    case 12:
                        $mes     = 'dezembro';
                        $value12 += $history->value;
                        break;
                }
            }
        }
        //CALC GASTOS
        if ($spents) {
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
        }

        return view('Painel.Spents.Index',
                    compact('spents', 'republic', 'spentsTotal', 'media', 'spentsIndividual', 'result',
                            'dataSpents', 'histories', 'value1', 'value2', 'value3', 'value4', 'value5', 'value6',
                            'value7', 'value8', 'value9', 'value10', 'value11', 'value12'
                    )
        );
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
            $data      = array_filter([
                                          'description' => $spentRequest->input('description') ?? null,
                                          'dateSpent'   => $spentRequest->input('dateSpent') ?? null,
                                          'value'       => $spentRequest->input('value'),
                                          'republic_id' => $spentRequest->input('republic_id'),
                                          'user_id'     => $spentRequest->input('user_id'),
                                      ]);
            $saveSpent = Spent::create($data);
            $now       = new Carbon();
            $month     = date('m');

            if ($saveSpent) {
                //IF SAVED SPENT, SAVE HISTORY SPENT
                $data             = array_filter([
                                                     'month'       => $month ?? null,
                                                     'value'       => $saveSpent->value,
                                                     'republic_id' => $saveSpent->republic_id ?? null,
                                                     'user_id'     => $saveSpent->user_id ?? null,
                                                     'spent_id'    => $saveSpent->id,
                                                 ]);
                $saveHistorySpent = SpentHistory::create($data);

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
        $spent   = Spent::find($id);
        $deleted = $spent->delete();
        if ($deleted) {
            $spentHistory = SpentHistory::where('spent_id', $id)->first();
            $spentHistory->delete();
        }

        return redirect()->route('painel.spent.index');
    }
}
