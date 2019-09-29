<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepublicRequest;
use App\Models\Invitations\Invitation;
use App\Models\Republic;
use App\Models\Type;
use App\Models\User;
use App\Notifications\RequestInvitation;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class RepublicController extends Controller
{
    //    private $republic;
    //    public function __construct(Republic $republic)
    //    {
    //        $this->republic = $republic;
    //    }
    /**
     * Display a listing of the resource.
     * @return Response
     * @author Heron Eugenio
     */
    public function index()
    {
        $user = auth()->user();
        $republic = $user->republic;
        $invitations = [];
        if (!empty($republic = $user->republic)) {
            $invitations = Invitation::where('republic_id', $user->republic->id)->get();
        }
        if ($republic != null) {
            $members = User::where('republic_id', $republic->id)->get();
            return view('Painel.Republic.Index', compact('republic', 'user', 'invitations', 'members'));
        }
        return view('Painel.Republic.Index', compact('republic', 'user', 'invitations'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     * @author Heron Eugenio
     */
    public function create()
    {
        $types = Type::all();

        return view('Painel.Republic.Create', compact('types'));
    }

    /**
     * @param RepublicRequest $republicRequest
     * @return RedirectResponse
     * @author Heron Eugenio
     */
    public function store(Request $republicRequest)
    {
        dd($republicRequest->all());
        try {
            $data = array_filter(
                [
                    'name' => $republicRequest->input('name'),
                    'email' => $republicRequest->input('email'),
                    'qtdMembers' => $republicRequest->input('qtdMembers'),
                    'qtdVacancies' => $republicRequest->input('qtdVacancies'),
                    'value' => $republicRequest->input('value'),
                    'type_id' => $republicRequest->input('type_id'),
                    'description' => $republicRequest->input('description') ?? null,
                    'street' => $republicRequest->input('street') ?? null,
                    'neighborhood' => $republicRequest->input('neighborhood') ?? null,
                    'cep' => $republicRequest->input('cep') ?? null,
                    'city' => $republicRequest->input('city') ?? null,
                    'state' => $republicRequest->input('state') ?? null,
                    'number' => $republicRequest->input('number') ?? null,
                    'user_id' => auth()->user()->id,
                ]
            );
            $savedRepublic = Republic::create($data);
            if ($savedRepublic) {
                $user = auth()->user();
                $user->republic_id = $savedRepublic->id;
                $user->save();

                return redirect()->route('painel.republic.index', ['id' => auth()->user()->id])
                    ->with('success', 'Republica salva com sucesso!');
            } else {
                return redirect()->back()->with('error', 'Ocorreu um erro ao tentar salvar a República!');
            }
        } catch (Exception $e) {
            report($e);
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Ocorreu um erro');
        }
    }

    /**
     * Display the specified resource.
     * @param Republic $id
     * @return Response
     */
    public function show(Republic $id)
    {
        //
    }

    /**
     * @param $id
     * @return Factory|View
     * @author Heron Eugenio
     */
    public function edit($id)
    {
        $republic = Republic::find($id);
        $types = Type::all();

        return view('Painel.Republic.Create', compact('republic', 'types'));
    }

    /**
     * Update the specified resource in storage.
     * @param RepublicRequest $republicRequest
     * @param $id
     * @return Response
     * @author Heron Eugenio
     */
    public function update(RepublicRequest $republicRequest, $id)
    {
        $republicRequestValidate = $republicRequest->validated();

        $republic = Republic::find($id);

        $republicUpdated = $republic->update($republicRequestValidate);


        if ($republicUpdated) {
            $invitations = Invitation::where('republic_id', $republic->id)->get();
            $members = User::where('republic_id', $republic->id)->get();
            return redirect()->route('painel.republic.index', ['republic' => $republic, 'invitations' => $invitations, 'members' => $members])
                ->with('success', 'Republica salva com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Ocorreu um erro ao tentar atualizar  República!');
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param Republic $republic
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $republic = Republic::find($id);
        $republic->delete();
        // redirect
        $republic = Republic::with('User', 'type')->where('user_id', auth()->user()->id)->get()->first();

        return view('Painel.Republic.Republic', compact('republic'));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function invitation(Request $request)
    {


        $invitatonSaved = Invitation::create([
            'email' => $request->input('email'),
            'user_id' => $request->input('user_id'),
            'republic_id' => $request->input('republic_id')
        ]);


        if ($invitatonSaved) {

            $data = [
                'userName' => Auth::user()->name,
                'republicName' => Auth::user()->republic->name,
            ];

            Notification::route('mail', $invitatonSaved->email)
                ->notify(new RequestInvitation($data));

            return redirect()->route('painel.republic.index')->with('success', 'Convite enviado com sucesso');
        } else {
            return redirect()->route('painel.republic.index')->with('error', 'Erro ao enviar convite');

        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function invitationAccept($id)
    {
        $invitation = Invitation::find($id);

        if (isset($invitation)) {
            $user = User::findOrFail(Auth::user()->id);
            $user->republic_id = $invitation->republic_id;
            $user->save();
            $invitation = Invitation::find($id);
            $invitation->delete();

            return redirect()->back()->with('success', 'Você agora está participando da república!');
        }

        return redirect()->back()->with('error', 'Houve algum erro no cadastro');
    }

    public function invitationDeny($id)
    {
        $invitation = Invitation::find($id);
        if (isset($invitation)) {
            $invitation->delete();
            return redirect()->back()->with('success', 'Solicitação negada!');
        }

        return redirect()->back()->with('error', 'Erro ao excluir');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function debitStore(Request $request)
    {
        $user = '<div>' . $request->user . '</div>';

        return $user;
    }


}
