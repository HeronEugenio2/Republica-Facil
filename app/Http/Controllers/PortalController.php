<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Models\Advertisement;
use App\Models\Republic;
use App\Models\User;
use App\Vote;
use Exception;
use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

/**
 * Class PortalController
 * @package App\Http\Controllers
 * @author  Heron Eugenio
 */
class PortalController extends Controller
{
    private $gmp;
    private $republicModel;
    private $advertisementModel;

    /**
     * PortalController constructor.
     * @param Republic $republic
     * @param Advertisement $advertisement
     */
    public function __construct(Republic $republic, Advertisement $advertisement)
    {
        $this->gmp = new GMaps();
        $this->republicModel = $republic;
        $this->advertisementModel = $advertisement;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     * @author Heron Eugenio
     */
    public function index()
    {
        $republics = $this->republicModel->where('active_flag', 1)->paginate(14);
        $advertisements = $this->advertisementModel->where('active_flag', 1)->paginate(7);

        return view('Portal.welcome', compact('republics', 'advertisements'));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     * @author Heron Eugenio
     */
    public function indexRepublics()
    {
        //TODO ta faltando with('categories')
        $republics = $this->republicModel->where('active_flag', 1)->get();
        $advertisements = $this->advertisementModel->where('active_flag', 1)->paginate(45);

        return view('Portal.Republic.Index', compact('republics', 'advertisements'));
    }

    /**
     * @return Factory|View
     */
    public function indexAdvertisement()
    {
        $advertisementes = $this->advertisementModel->where('active_flag', 1)->paginate(45);
        $sql = "SELECT id, title, icon 
                    FROM advertisement_categories                    
                    ORDER BY title, id, icon";
        $categories = DB::select($sql);

        return view('Portal.Advertisement.Index', compact('advertisementes', 'categories'));
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::where('republic_id', $id)->first();
        $republic = $this->republicModel->with('user')->where('id', $id)->first();
        return view('Portal.Republic.Show2', compact('republic', 'user'));
    }

    public function showAdvertisement($id)
    {
        try {

            $advertisement = $this->advertisementModel->with('category', 'user.republic')->find($id);
            $advertisements = $this->advertisementModel->where('category_id', $advertisement->category->id)->limit(8)->get();

            $config['map_height'] = '500px';
            $config['map_width'] = '70%';
            $config['directions'] = true;
            $config['directionsStart'] = "$advertisement->street, $advertisement->city , $advertisement->state  ";
            $config['directionsEnd'] = "$advertisement->street , $advertisement->city , $advertisement->state  ";
            $config['directionsDivID'] = 'directionsDiv';
            $this->gmp->initialize($config);
            $map = $this->gmp->create_map();


            return view('Portal.Advertisement.Show2', compact('republic', 'advertisement', 'advertisements', 'map'));
        } catch (Exception $e) {
            Log::warning('Ocorreu um erro (showAdvertisement)');
            report($e);

            return redirect()->back()->with('toast_success', 'Ocorreu um error');
        }
    }


    /**
     * @param Request $request
     * @return Factory|View
     */
    public function search(Request $request)
    {
        $value = $request->input(['search']);
        //        dd($request->request);

        $republics = $this->republicModel->where('active_flag', 1)->where('city', 'like', '%' . $value . '%')->take(100)->get();

        return view('Portal.Republic.Index', compact('republics', 'value'));
    }

    /**
     * @param Request $request
     * @return array|string
     * @throws \Throwable
     */
    public function ajaxSearch(Request $request)
    {
        $value = $request->input('value');
        $type = $request->input('type');
        $valueSearch = $request->input('valueSearch');

        if ($value == 'all') {
            if (!isset($valueSearch)) {
                $republics = $this->republicModel->where('type_id', $type)
                    ->where('value', '>', 500)
                    ->where('active_flag', 1)
                    ->take(20)->get();

                return view('Portal.Republic.IncludeSearch', compact('republics', 'value'))->render();
            }
            $republics = $this->republicModel->where('city', 'like', '%' . $valueSearch . '%')
                ->where('active_flag', 1)
                ->where('type_id', $type)
                ->where('value', '>', 500)->take(20)->get();

            return view('Portal.Republic.IncludeSearch', compact('republics', 'value'))->render();
        }
        if (!isset($valueSearch)) {
            $republics = $this->republicModel->where('type_id', $type)
                ->whereBetween('value', [$value - 99, $value])
                ->where('active_flag', 1)->take(20)->get();

            return view('Portal.Republic.IncludeSearch', compact('republics', 'value'))->render();
        }
        $republics = $this->republicModel->where('city', 'like', '%' . $valueSearch . '%')
            ->where('active_flag', 1)
            ->where('type_id', $type)
            ->whereBetween('value', [$value - 99, $value])->take(20)->get();

        return view('Portal.Republic.IncludeSearch', compact('republics', 'value'))->render();
    }

    /**
     * Faz a busca por categoria
     * @param $id
     * @return Factory|View
     * @author Heron
     */
    public function searchCategory($id)
    {
        $advertisementes = $this->advertisementModel->with('category')
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
        $voteCreated = $vote->updateOrCreate($data);

        if ($voteCreated) {
            $republic = $this->republicModel->find($republic_id);
            if ($data['type_vote'] == "up") {
                $republic->up = $vote->where('republic_id', intval($republic_id))->where('type_vote', 'up')->sum('value');
                $republic->save();
            } elseif ($data['type_vote'] == "down") {
                $republic->down = $vote->where('republic_id', intval($republic_id))->where('type_vote', 'down')->sum('value');
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
