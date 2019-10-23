<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementRequest;
use App\Models\Advertisement;
use App\Models\AdvertisementCategory;
use App\Models\Resource;
use App\Models\ResourceRepublic;
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
    private $advertisementCategoryModel;
    private $resourceModel;
    private $resourceRepublicModel;

    /**
     * AdvertisementController constructor.
     * @param Advertisement $advertisement
     * @param AdvertisementCategory $advertisementCategory
     * @param Resource $resource
     * @param ResourceRepublic $resourceRepublic
     */
    public function __construct(Advertisement $advertisement, AdvertisementCategory $advertisementCategory, Resource $resource, ResourceRepublic $resourceRepublic)
    {
        $this->advertisementModel = $advertisement;
        $this->advertisementCategoryModel = $advertisementCategory;
        $this->resourceModel = $resource;
        $this->resourceRepublicModel = $resourceRepublic;
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
     * @param AdvertisementRequest $advRequest
     * @return RedirectResponse
     */
    public function store(AdvertisementRequest $advRequest)
    {
        try {
            $advRequest->value = str_replace('.', '', $advRequest->value);
            $advRequest->value = str_replace(',', '.', $advRequest->value);
            $data = array_filter(
                [
                    'image' => $advRequest->image ?? 'https://www.nato-pa.int/sites/default/files/default_images/default-image.jpg',
                    'description' => $advRequest->description,
                    'title' => $advRequest->title,
                    'value' => $advRequest->value,
                    'category_id' => $advRequest->category_id,
                    'user_id' => $advRequest->user_id,
                    'cep' => $advRequest->cep,
                    'address' => $advRequest->address,
                    'street' => $advRequest->street,
                    'city' => $advRequest->city,
                    'state' => $advRequest->state,
                ]
            );
            $dataSaved = $this->advertisementModel->create($data);
            $advRequest['anuncio'] = $dataSaved->id;
            if ($dataSaved) {
//                $response = $this->createResourceAnuncio($advRequest->all());

                return redirect()->route('painel.advertisement.index')->with('toast_success', 'Salvo com sucesso');
            } else {
                return redirect()->back()->with('toast_error', 'Ocorreu um erro');
            }
        } catch (Exception $e) {
            report($e);
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    private function createResourceAnuncio($resources)
    {
        foreach ($resources as $resource) {
            if (!empty($resources['Câmeras'])) {

                $this->resourceRepublicModel->create([
                    'resource_id' => $resource->id,
                    'anuncio_id' => $resources['anuncio'],
                ]);

                unset($resource);
            }
            if (!empty($resources['Mobiliado'])) {
                $resource = $this->resourceModel->where('name', 'like', '%' . $resources['Mobiliado'] . '%')->first();

                if (!empty($resource)) {

                    $this->resourceRepublicModel->create([
                        'resource_id' => $resource->id,
                        'anuncio_id' => $resources['anuncio'],
                    ]);
                }
                unset($resource);
            }
            if (!empty($resources['Próximo ao ônibus'])) {
                $resource = $this->resourceModel->where('name', 'like', '%' . $resources['Próximo ao ônibus'] . '%')
                    ->first();

                if (!empty($resource)) {
                    $this->resourceRepublicModel->create([
                        'resource_id' => $resource->id,
                        'anuncio_id' => $resources['anuncio'],
                    ]);
                }
                unset($resource);
            }
            if (!empty($resources['Quarto individual'])) {
                $resource = $this->resourceModel->where('name', 'like', '%' . $resources['Quarto individual'] . '%')
                    ->first();

                if (!empty($resource)) {
                    $this->resourceRepublicModel->create([
                        'resource_id' => $resource->id,
                        'anuncio_id' => $resources['anuncio'],
                    ]);
                }
                unset($resource);
            }
            if (!empty($resources['Televisão'])) {
                $resource = $this->resourceModel->where('name', 'like', '%' . $resources['Televisão'] . '%')->first();

                if (!empty($resource)) {
                    $this->resourceRepublicModel->create([
                        'resource_id' => $resource->id,
                        'anuncio_id' => $resources['anuncio'],
                    ]);
                }
                unset($resource);
            }
            if (!empty($resources['Wi-fi / Internet'])) {
                $resource = $this->resourceModel->where('name', 'like', '%' . $resources['Wi-fi / Internet'] . '%')
                    ->first();

                if (!empty($resource)) {
                    $this->resourceRepublicModel->create([
                        'resource_id' => $resource->id,
                        'anuncio_id' => $resources['anuncio'],
                    ]);
                }
                unset($resource);
            }
            if (!empty($resources['Lavanderia'])) {
                $resource = $this->resourceModel->where('name', 'like', '%' . $resources['Lavanderia'] . '%')->first();

                if (!empty($resource)) {
                    $this->resourceRepublicModel->create([
                        'resource_id' => $resource->id,
                        'anuncio_id' => $resources['anuncio'],
                    ]);
                }
                unset($resource);
            }
            if (!empty($resources['Próximo ao Metrô'])) {
                $resource = $this->resourceModel->where('name', 'like', '%' . $resources['Próximo ao Metrô'] . '%')
                    ->first();

                if (!empty($resource)) {
                    $this->resourceRepublicModel->create([
                        'resource_id' => $resource->id,
                        'anuncio_id' => $resources['anuncio'],
                    ]);
                }
                unset($resource);
            }
            if (!empty($resources['Quarto Compartilhado'])) {
                $resource = $this->resourceModel->where('name', 'like', '%' . $resources['Quarto Compartilhado'] . '%')
                    ->first();

                if (!empty($resource)) {
                    $this->resourceRepublicModel->create([
                        'resource_id' => $resource->id,
                        'anuncio_id' => $resources['anuncio'],
                    ]);
                }
                unset($resource);
            }
            if (!empty($resources['Quintal'])) {
                $resource = $this->resourceModel->where('name', 'like', '%' . $resources['Quintal'] . '%')->first();

                if (!empty($resource)) {
                    $this->resourceRepublicModel->create([
                        'resource_id' => $resource->id,
                        'anuncio_id' => $resources['anuncio'],
                    ]);
                }
                unset($resource);
            }
            if (!empty($resources['Todas as contas inclusas'])) {
                $resource = $this->resourceModel->where('name', 'like', '%' . $resources['Todas as contas inclusas'] . '%')
                    ->first();

                if (!empty($resource)) {
                    $this->resourceRepublicModel->create([
                        'resource_id' => $resource->id,
                        'anuncio_id' => $resources['anuncio'],
                    ]);
                }
                unset($resource);
            }
            if (!empty($resources['Ventilador'])) {
                $resource = $this->resourceModel->where('name', 'like', '%' . $resources['Ventilador'] . '%')->first();
                if (!empty($resource)) {
                    $this->resourceRepublicModel->create([
                        'resource_id' => $resource->id,
                        'anuncio_id' => $resources['anuncio'],
                    ]);
                }
                unset($resource);
            }
        }

        return true;
        /* $resource = $this->resourceModel->where('name', $item)->first();

         $this->resourceRepublicModel->create([
             'republic_id' => $dataSaved->id,
             'resource_id' => $resource->id
         ]);*/
    }

    /**
     * @return Factory|RedirectResponse|View
     */
    public function create()
    {
        try {
            $user = auth()->user();
            $republic = $user->republic;
            $advCategories = $this->advertisementCategoryModel->all();
            $resources = $this->resourceModel->all();

            return view('Painel.Advertisement.Create', compact('republic', 'user', 'advCategories', 'resources'));
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
                    return redirect()->back()
                        ->with('toast_error', 'Erro ao remover anuncio, tente novamente mais tarde');
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
