<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementRequest;
use App\Models\Advertisement;
use App\Models\AdvertisementCategory;
use App\Models\Republic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user           = Auth::user();
        $advertisements = Advertisement::where('user_id', $user->id)->get();

        return view('Painel.Advertisement.Index', compact('user', 'advertisements'));
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advert = Advertisement::where('user_id', $id)->with('user')->first();

        return view('Painel.Advertisement.Show', compact('advert'));
    }

    /**
     * @param Advertisement $advertisement
     * @param AdvertisementRequest $advRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Advertisement $advertisement, AdvertisementRequest $advRequest)
    {
        try {
            $data = array_filter(
                [
                    'image'       => $advRequest->image ?? 'https://www.nato-pa.int/sites/default/files/default_images/default-image.jpg',
                    'description' => $advRequest->description,
                    'title'       => $advRequest->title,
                    'value'       => $advRequest->value,
                    'category_id' => $advRequest->category_id,
                    'user_id'     => $advRequest->user_id,
                    //                    'republic_id' => $advRequest->input('republic_id'),
                    //                    'image_id'    => $advRequest->input('name'),
                    //                    'active'      => $advRequest->input('name'),
                ]
            );

            $dataSaved = $advertisement->create($data);
            //            dd($dataSaved);
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
        $advert = Advertisement::find($id);
        $advert->delete();

        return redirect()->back()->with('success', 'Stock has been deleted Successfully');
    }
}
