<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementRequest;
use App\Models\Advertisement;
use App\Models\AdvertisementCategory;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

/**
 * Class AdvertisementController
 * @package App\Http\Controllers\Painel
 */
class AdvertisementController extends Controller
{
    private $advertisementModel;

    /**
     * AdvertisementController constructor.
     * @param Advertisement $advertisement
     */
    public function __construct(Advertisement $advertisement)
    {
        $this->advertisementModel = $advertisement;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        try {
            $user = Auth::user();
            $advertisements = $this->advertisementModel->where('user_id', $user->id);

            if ($request->has('name') && !empty($request->input('name'))) {
                $advertisements = $this->advertisementModel->where('title', $request->input('name'));
            }


            return view('Painel.Advertisement.Index', ['user' => $user, 'advertisements' => $advertisements->get()]);
        } catch (Exception $e) {
            Log::warning('Ocorreu um erro (index- AdvertisementController)');
            report($e);

            return redirect()->back()->with('toast_error', 'Ocorreu um erro!');
        }


    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $advert = $this->advertisementModel->find($id);

        return view('Painel.Advertisement.Show', compact('advert'));
    }

    /**
     * @param Advertisement $advertisement
     * @param AdvertisementRequest $advRequest
     * @return RedirectResponse
     */
    public function store(Advertisement $advertisement, AdvertisementRequest $advRequest)
    {
        try {

            $advRequest->value = preg_replace('/\D/', '', $advRequest->value);

            $data = array_filter(
                [
                    'image' => $advRequest->image ?? 'https://www.nato-pa.int/sites/default/files/default_images/default-image.jpg',
                    'description' => $advRequest->description,
                    'title' => $advRequest->title,
                    'value' => $advRequest->value,
                    'category_id' => $advRequest->category_id,
                    'user_id' => $advRequest->user_id,
                ]
            );

            $dataSaved = $advertisement->create($data);
            if ($dataSaved) {
                return redirect()->route('painel.advertisement.index');
            } else {
                return redirect()->back();
            }
        } catch (Exception $e) {
            report($e);
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @return Factory|RedirectResponse|View
     */
    public function create()
    {
        try {
            $user = auth()->user();
            $republic = $user->republic;
            $advCategories = AdvertisementCategory::all();

            return view('Painel.Advertisement.Create', compact('republic', 'user', 'advCategories'));
        } catch (Exception $e) {
            Log::warning('Ocorreu um erro (create- AdvertisementController)');
            report($e);

            return redirect()->back()->with('toast_error', 'Ocorreu um erro!');
        }

    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $advert = $this->advertisementModel->find($id);
            if (!empty($advert)) {
                $advertRemove = $advert->delete();
                if ($advertRemove) {
                    return redirect()->back()->with('toast_success', 'Removido com sucesso!');
                } else {
                    return redirect()->back()->with('toast_error', 'Erro ao remover anuncio, tente novamente mais tarde');
                }
            } else {
                return redirect()->back()->with('toast_error', 'Erro ao remover anuncio, tente novamente mais tarde');
            }
        } catch (Exception $e) {
            Log::warning('Erro ao remover anuncio');
            report($e);

            return redirect()->back()->with('toast_error', 'Erro ao remover anuncio, tente novamente mais tarde');
        }

    }
}
