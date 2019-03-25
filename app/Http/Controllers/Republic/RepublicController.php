<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepublicRequest;
use App\Republic;
use Illuminate\Http\Request;

class RepublicController extends Controller
{
    //    private $republic;
    //    public function __construct(Republic $republic)
    //    {
    //        $this->republic = $republic;
    //    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $republic = Republic::with('User', 'type', 'address')->where('user_id', auth()->user()->id)->get()->first();

        //                        dd($republic);
        return view('Painel.Republic.Republic', compact('republic'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Painel.Republic.RepublicCreate');
    }

    /**
     * @param RepublicRequest $republic
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RepublicRequest $republicRequest)
    {
        //        dd($request);
        //        try {
        //            $newRepublic = $this->republic->create(
        //                [
        //                    'user_id'      => auth()->user()->id,
        //                    'name'         => 'name',
        //                    'email'        => 'email',
        //                    'description'  => 'description',
        //                    'qtdMembers'   => 'member',
        //                    'qtdVacancies' => 'vacancy',
        //                    'type_id'      => 'type_id',
        //                    'address_id'   => 1,
        //                ]);
        //            if ($newRepublic) {
        //                return redirect()->route('products.show', [$newRepublic->code])
        //                                 ->with('success', __('definitions.message.save.success'));
        //            } else {
        //                //erro ao cadastrar
        //                return redirect()->route('products.store')->with('error', __('definitions.message.save.error'))
        //                                 ->withInput();
        //            }
        //        } catch (Exception $e) {
        //            //algum outro problema, analisar com cuidado
        //            report($e);
        //
        //            return redirect()->back()->with('error', __('definitions.message.save.error'));
        //        }

        //                try {
        //                    $data = [
        //                        'name'         => $republicRequest->input('name'),
        //                        'email'        => $republicRequest->input('name'),
        //                        'description'  => $republicRequest->input('name'),
        //                        'qtdMembers'   => $republicRequest->input('name'),
        //                        'qtdVacancies' => $republicRequest->input('name'),
        //                        'type_id'      => $republicRequest->input('name'),
        //        //                'address_id'   => $republicRequest->input('name'),
        //                    ];
        //
        //                    $dataSavedCategory = Republic::create($data);
        //
        //                    if ($dataSavedCategory) {
        //                        return redirect()->route('painel.republic.index')->with('success', 'Republica salva com sucesso!');
        //                    } else {
        //                        return redirect()->back()->with('error', 'Ocorreu um erro ao tentar salvar a República!');
        //                    }
        //                } catch (Exception $e) {
        //                    report($e);
        //                    Log::error($e->getMessage());
        //
        //                    return redirect()->back()->with('error', $e->getMessage());
        //                }
    }

    /**
     * Display the specified resource.
     * @param  \App\Republic $republic
     * @return \Illuminate\Http\Response
     */
    public
    function show(Republic $republic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Republic $republic
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Republic $republic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Republic $republic
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Republic $republic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Republic $republic
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Republic $republic)
    {
        //
    }
}
