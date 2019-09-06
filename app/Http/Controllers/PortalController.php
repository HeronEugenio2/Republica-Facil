<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Republic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $republics      = Republic::where('active_flag', 1)->paginate(14);
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
        $republics      = Republic::where('active_flag', 1)->get();
        $advertisements = Advertisement::where('active_flag', 1)->paginate(45);

        return view('Portal.Republic.Index', compact('republics', 'advertisements'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexAdvertisement()
    {
        $advertisementes = Advertisement::where('active_flag', 1)->paginate(45);
        $sql             = "SELECT id, title, icon 
                    FROM advertisement_categories                    
                    ORDER BY title, id, icon";
        $categories      = DB::select($sql);

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  int $id
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
        $value       = $request->input('value');
        $type        = $request->input('type');
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

    public function searchCategory($id)
    {
        $advertisementes = Advertisement::with('category')
                                        ->where('category_id', $id)
                                        ->where('active_flag', 1)
                                        ->paginate(25);
        $sql             = "SELECT id, title, icon 
                    FROM advertisement_categories                    
                    ORDER BY title, id, icon";
        $categories      = DB::select($sql);

        return view('Portal.Advertisement.Index', compact('advertisementes', 'categories'));
    }
}
