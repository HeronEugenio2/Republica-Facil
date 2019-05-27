<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementRequest;
use App\Models\Advertisement;
use App\Models\AdvertisementCategory;
use App\Models\User;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user     = auth()->user();
        $republic = $user->republic;
        $spents   = $republic->spents;
        $adverts = Advertisement::all();
//        dd($adverts);
        return view('Painel.Advertisement.Index', compact('adverts', 'republic', 'spents'));
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advert = Advertisement::find($id)->with('user')->get()->first();
//        dd($advert);

        return view('Painel.Advertisement.Show', compact('advert'));
    }

    /**
     * @param Advertisement $advertisement
     * @param Request $advRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Advertisement $advertisement, Request $advRequest)
    {

        try {
            $data = array_filter(
                [
//                    'image'       => $advRequest->input('name'),
                    'description' => $advRequest->input('description'),
                    'title'       => $advRequest->input('title'),
                    'value'       => $advRequest->input('value'),
                    'republic_id' => $advRequest->input('republic_id'),
                    'category_id' => $advRequest->input('category_id'),
                    'user_id'     => $advRequest->input('user_id'),
//                    'image_id'    => $advRequest->input('name'),
//                    'active'      => $advRequest->input('name'),
                ]
            );

            $dataSaved = $advertisement->create($advRequest->all());
//            dd($dataSaved);
            if($dataSaved){
                return redirect()->route('painel.advertisement.index');
            }
            else{
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user          = auth()->user();
        $republic      = $user->republic;
        $advCategories = AdvertisementCategory::all();

        //        dd($advCategories);
        return view('Painel.Advertisement.Create', compact('republic', 'user', 'advCategories'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
