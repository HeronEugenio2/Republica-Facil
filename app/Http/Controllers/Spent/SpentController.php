<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpentRequest;
use App\Http\Service\Service;
use App\Models\Republic;
use App\Models\Spent;
use App\Models\SpentHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index()
    {
        $now = new Carbon();
        $month = date_format($now, 'm');
        $user = auth()->user();
        $republic = $user->republic;
        $spents = $republic->spents;
        if (count($spents) > 0) {
            $spents = Spent::where('republic_id', $republic->id)->where('close', 0)->whereMonth('dateSpent', '=', $month)
                ->get();
        }
        $histories = SpentHistory::where('user_id', $user->id)->orderBy('month')
            ->get();

        $sql = "SELECT h.value
                , h.month
                , buy
                , s.description       
                , h.user_id       
                , s.close
                , h.year
                FROM spent_histories as h
                INNER JOIN spents as s on h.spent_id = s.id
                WHERE h.user_id = $user->id AND s.close = 0
                ORDER BY h.month";
        $myDebits = DB::select($sql);

        if ($spents) {
            $result = $this->calcSpent($republic->id, $user->id);
            $spentsTotal = $result['total'];
            $spentsIndividual = $result['individual'];
            $media = $result['media'];
            $result = $result['result'];
        }
        //GRAFICO
        if (isset($histories)) {
            $value1 = 0;
            $value2 = 0;
            $value3 = 0;
            $value4 = 0;
            $value5 = 0;
            $value6 = 0;
            $value7 = 0;
            $value8 = 0;
            $value9 = 0;
            $value10 = 0;
            $value11 = 0;
            $value12 = 0;
            foreach ($histories as $key => $history) {
                switch ($history->month) {
                    case 1:
                        $mes = 'janeiro';
                        $value1 += $history->value;
                        break;
                    case 2:
                        $mes = 'fevereiro';
                        $value2 += $history->value;
                        break;
                    case 3:
                        $mes = 'março';
                        $value3 += $history->value;
                        break;
                    case 4:
                        $mes = 'abril';
                        $value4 += $history->value;
                        break;
                    case 5:
                        $mes = 'maio';
                        $value5 = $media;
                        //                        $value5 = $media;
                        break;
                    case 6:
                        $mes = 'junho';
                        $value6 += $history->value;
                        break;
                    case 7:
                        $mes = 'julho';
                        $value7 += $history->value;
                        break;
                    case 8:
                        $mes = 'agosto';
                        $value8 += $history->value;
                        break;
                    case 9:
                        $mes = 'setembro';
                        $value9 += $history->value;
                        break;
                    case 10:
                        $mes = 'outubro';
                        $value10 += $history->value;
                        break;
                    case 11:
                        $mes = 'novembro';
                        $value11 = $result * -1;
                        break;
                    case 12:
                        $mes = 'dezembro';
                        $value12 += $history->value;
                        break;
                }
            }
        }

        return view('Painel.Spents.Index',
            compact('republic', 'spents', 'republic', 'spentsTotal', 'media', 'spentsIndividual', 'result',
                'dataSpents', 'histories', 'value1', 'value2', 'value3', 'value4', 'value5', 'value6',
                'value7', 'value8', 'value9', 'value10', 'value11', 'value12', 'myDebits'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::with('republic', 'republic . spents')->first();
        $republic = $user->republic;
        $spents = $republic->spents;

        return view('Painel.Spents.Create', compact('spents', 'republic'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpentRequest $spentRequest)
    {
        try {
            $data = array_filter([
                'description' => $spentRequest->input('description') ?? null,
                'dateSpent' => $spentRequest->input('dateSpent') ?? null,
                'value' => $spentRequest->input('value'),
                'republic_id' => $spentRequest->input('republic_id'),
                'user_id' => $spentRequest->input('user_id'),
            ]);
            $data['value'] = str_replace('.', '', $data['value']);
            $data['value'] = str_replace(',', '.', $data['value']);

            $saveSpent = Spent::create($data);
            //            $now       = new Carbon();
            //            $month     = date('m');

            $month = Carbon::parse($saveSpent['dateSpent'])->format('m');

            if ($saveSpent) {
                //IF SAVED SPENT, SAVE HISTORY SPENT
                if ($spentRequest->buy == "1") {
                    $data = array_filter([
                        'month' => $month ?? null,
                        'value' => $saveSpent->value,
                        'republic_id' => $saveSpent->republic_id ?? null,
                        'user_id' => $saveSpent->user_id ?? null,
                        'spent_id' => $saveSpent->id,
                        'buy' => $spentRequest->buy,
                    ]);
                } else {
                    $data = array_filter([
                        'month' => $month ?? null,
                        'value' => $saveSpent->value,
                        'republic_id' => $saveSpent->republic_id ?? null,
                        'user_id' => $saveSpent->user_id ?? null,
                        'spent_id' => $saveSpent->id,
                    ]);
                }
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
     * @param \App\Spent $spent
     * @return \Illuminate\Http\Response
     */
    public function show(Spent $spent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Spent $spent
     * @return \Illuminate\Http\Response
     */
    public function edit(Spent $spent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Spent $spent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spent $spent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Spent $spent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spent = Spent::find($id);
        $deleted = $spent->delete();
        if ($deleted) {
            $spentHistory = SpentHistory::where('spent_id', $id)->first();
            $spentHistory->delete();
        }

        return redirect()->route('painel.spent.index');
    }

    public function extractList(Request $request)
    {
        $user = auth()->user();
        $republic = $user->republic;
        $spents = $republic->spents;
        if (count($spents) > 0) {
            $extractSpents = Spent::where('republic_id', $request->republic_id)
                ->with('history')
                ->whereMonth('dateSpent', '=', $request->month)
                ->whereYear('dateSpent', $request->year)
                ->get();
            $spentsTotal = 0;
            foreach ($extractSpents as $e) {
                $spentsTotal += $e->value;
            }
        }

        return view('Painel.Spents.IncludeExtract', compact('extractSpents', 'spentsTotal'))->render();
    }

    public function spendingResult(Request $request)
    {
        $now = new Carbon();
        $month = date_format($now, 'm');
        $users = User::where('republic_id', $request->republic_id)->get();
        $arrayData = collect();
        foreach ($users as $user) {
            $result = $this->calcSpent($request->republic_id, $user->id);
            $arrayData[] = ([
                'user_name' => $user->name,
                'result' => $result,
                'date' => date_format($now, 'm/y'),
            ]);
        }
        return view('Painel.Spents.IncludeClose', compact('arrayData'))->render();
    }


    /**
     * @param $republicId
     * @param $userId
     * @return array
     * @author $Heron
     */
    public function calcSpent($republicId, $userId)
    {
        $now = new Carbon();
        $month = date_format($now, 'm');
        $user = User::where('id', $userId)->first();
        $republic = Republic::where('id', $republicId)->first();
        $spents = Spent::where('republic_id', $republicId)
            ->where('close', 0)
            ->whereMonth('dateSpent', '=', $month)
            ->get();
        $userSpents = Spent::where('republic_id', $republicId)
            ->where('user_id', $userId)
            ->whereMonth('dateSpent', '=', $month)
            ->where('close', 0)
            ->get();
        $spentsTotal = 0;
        $spentsIndividual = 0;
//        $month = $spents[0]->dateSpent;
        foreach ($spents as $spent) {
            $spentsTotal += $spent->value;
        }
        foreach ($userSpents as $spent) {
            $spentsIndividual += $spent->value;
        }
        if ($republic->qtdMembers == 0) {
            $media = $spentsTotal;
        } else {
            $media = $spentsTotal / $republic->qtdMembers;
        }
        $result = -$media + $spentsIndividual;
        $data =
            [
                'total' => $spentsTotal,
                'individual' => $spentsIndividual,
                'media' => $media,
                'result' => $result,
            ];
        return $data;
    }

    public function spentHistoryStore(Request $request)
    {
        $now = new Carbon();
        $month = date_format($now, 'm');
        $spentsHistories = SpentHistory::where('month', Carbon::now()->month)
            ->where('republic_id', $request->republic_id)
            ->where('close', 0)
            ->get();
        $spents = Spent::where('republic_id', $request->republic_id)
            ->where('close', 0)
            ->whereMonth('dateSpent', '=', $month)
            ->get();

        foreach ($spentsHistories as $spentsHistory) {
            $spentsHistory->close = 1;
            $spentsHistory->save();
        }
        foreach ($spents as $spent) {
            $spent->close = 1;
            $spent->save();
        }
        return redirect()->back();
    }

    public function listSpents(Request $request)
    {
        $users = User::where('republic_id', $request->republic_id)->get();
        $arrayData = collect();
        foreach ($users as $user) {
            $result = $this->calcSpent($request->republic_id, $user->id);
            $arrayData[] = ([
                'user_name' => $user->name,
                'result' => $result,
                'buy' => 0
            ]);
        }
//        $arrayData = SpentHistory::where('republic_id', $request->republic_id)
//            ->where('user_id', '=', null)->get();
//            ->where('year', $request->year)
        return view('Painel.Spents.IncludeListSpents', compact('arrayData'))->render();

    }
}
