<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Models\Advertisement;
use App\Models\Republic;
use App\Models\User;
use App\Vote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Class PortalController
 * @package App\Http\Controllers
 * @author  Heron Eugenio
 */
class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @author Heron Eugenio
     */
    public function index()
    {
        $republics = Republic::where('active_flag', 1)->paginate(14);
        $advertisements = Advertisement::where('active_flag', 1)->paginate(7);

        return view('Portal.welcome', compact('republics', 'advertisements'));
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @author Heron Eugenio
     */
    public function indexRepublics()
    {
        //TODO ta faltando with('categories')
        $republics = Republic::where('active_flag', 1)->get();
        $advertisements = Advertisement::where('active_flag', 1)->paginate(45);

        return view('Portal.Republic.Index', compact('republics', 'advertisements'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function indexAdvertisement()
    {
        $advertisementes = Advertisement::where('active_flag', 1)->paginate(45);
        $sql = "SELECT id, title, icon 
                    FROM advertisement_categories                    
                    ORDER BY title, id, icon";
        $categories = DB::select($sql);

        return view('Portal.Advertisement.Index', compact('advertisementes', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('republic_id', $id)->first();
        $republic = Republic::with('user')->where('id', $id)->first();
        return view('Portal.Republic.Show2', compact('republic', 'user'));
    }

    public function showAdvertisement($id)
    {
        $advertisement = Advertisement::with('category', 'user')->find($id);

        return view('Portal.Advertisement.Show', compact('republic', 'advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function search(Request $request)
    {
        $value = $request->input(['search']);
        //        dd($request->request);

        $republics = Republic::where('active_flag', 1)->where('city', 'like', '%' . $value . '%')->take(100)->get();

        return view('Portal.Republic.Index', compact('republics', 'value'));
    }

    public function ajaxSearch(Request $request)
    {
        $value = $request->input('value');
        $type = $request->input('type');
        $valueSearch = $request->input('valueSearch');

        if ($value == 'all') {
            if (!isset($valueSearch)) {
                $republics = Republic::where('type_id', $type)
                    ->where('value', '>', 500)
                    ->where('active_flag', 1)
                    ->take(20)->get();

                return view('Portal.Republic.IncludeSearch', compact('republics', 'value'))->render();
            }
            $republics = Republic::where('city', 'like', '%' . $valueSearch . '%')
                ->where('active_flag', 1)
                ->where('type_id', $type)
                ->where('value', '>', 500)->take(20)->get();

            return view('Portal.Republic.IncludeSearch', compact('republics', 'value'))->render();
        }
        if (!isset($valueSearch)) {
            $republics = Republic::where('type_id', $type)
                ->whereBetween('value', [$value - 99, $value])
                ->where('active_flag', 1)->take(20)->get();

            return view('Portal.Republic.IncludeSearch', compact('republics', 'value'))->render();
        }
        $republics = Republic::where('city', 'like', '%' . $valueSearch . '%')
            ->where('active_flag', 1)
            ->where('type_id', $type)
            ->whereBetween('value', [$value - 99, $value])->take(20)->get();

        return view('Portal.Republic.IncludeSearch', compact('republics', 'value'))->render();
    }

    /**
     * Faz a busca por categoria
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|View
     * @author Heron
     */
    public function searchCategory($id)
    {
        $advertisementes = Advertisement::with('category')
            ->where('category_id', $id)
            ->where('active_flag', 1)
            ->paginate(25);
        $sql = "SELECT id, title, icon 
                    FROM advertisement_categories                    
                    ORDER BY title, id, icon";
        $categories = DB::select($sql);

        return view('Portal.Advertisement.Index', compact('advertisementes', 'categories'));
    }

    /**
     * Sistema de votação em repúblicas
     * @param VoteRequest $request
     * @param $republic_id
     * @param Vote $vote
     * @return RedirectResponse
     * @author Heron
     */
    public function vote(VoteRequest $request, $republic_id, Vote $vote)
    {
        $data = array_filter(
            [
                'cpf' => $request->cpf,
                'type_vote' => $request->optionVote,
            ]
        );
        $validateCpf = $this->validaCPF($data['cpf']);
        if (!$validateCpf) {
            $message = 'Cpf inválido!';
            return redirect()->back()->with($message);
        }
        $data = [
            'cpf' => $validateCpf,
            'value' => 1,
            'republic_id' => intval($republic_id),
            'type_vote' => $data['type_vote'],
        ];
        $voteCreated = $vote->create($data);

        if ($voteCreated) {
            $republic = Republic::find($republic_id);
            if ($data['type_vote'] == "up") {
                $republic->up = $republic->up + 1;
                $republic->save();
            } elseif ($data['type_vote'] == "down") {
                $republic->down = $republic->down + 1;
                $republic->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Valida CPF
     * @param $cpf
     * @return bool
     * @author Heron
     */
    public function validaCPF($cpf)
    {
        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return $cpf;
            }
        }
        return $cpf;
    }
}
