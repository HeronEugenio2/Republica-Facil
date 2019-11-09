<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepublicRequest;
use App\Http\Requests\RepublicStoreRequest;
use App\Http\Requests\RepublicUpdateRequest;
use App\Models\Invitations\Invitation;
use App\Models\Republic;
use App\Models\Resource;
use App\Models\Type;
use App\Models\User;
use App\Notifications\RequestInvitation;
use App\Services\Service;
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
    private $republic;
    /**
     * @var Service
     */
    private $service;

    public function __construct(Republic $republic, Service $service)
    {
        $this->republic = $republic;
        $this->service = $service;
    }

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
        if (isset($republic->user_id) && $republic->user_id != null) {
            $owner = User::find($republic->user_id);
        }
        if (!empty($republic = $user->republic)) {
            $invitations = Invitation::where('republic_id', $user->republic->id)->get();
        }
        if ($republic != null) {
            $members = User::where('republic_id', $republic->id)->get();
            return view('Painel.Republic.Index', compact('republic', 'user', 'invitations', 'members', 'owner'));
        }
        return view('Painel.Republic.Index', compact('republic', 'user', 'invitations', 'owner'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     * @author Heron Eugenio
     */
    public function create()
    {
        $types = Type::all();
        $resources = Resource::all();

        return view('Painel.Republic.Create', compact('types', 'resources'));
    }

    /**
     * @param RepublicStoreRequest $republicRequest
     * @return RedirectResponse
     * @author Heron Eugenio
     */
    public function store(RepublicUpdateRequest $republicRequest)
    {
        try {
            $dataValidated = $republicRequest->validated();
            $republicRequest->value = str_replace('.', '', $republicRequest->value);
            $republicRequest->value = str_replace(',', '.', $republicRequest->value);
            $dataValidated['user_id'] = auth()->user()->id;
            $savedRepublic = Republic::create($dataValidated);
            if ($savedRepublic) {
                $user = auth()->user();
                $user->republic_id = $savedRepublic->id;
                $user->save();

                return redirect()->route('painel.republic.index', ['id' => auth()->user()->id])
                    ->with('toast_success', 'Republica salva com sucesso!');
            } else {
                return redirect()->back()->with('toast_error', 'Ocorreu um erro ao tentar salvar a República!');
            }
        } catch (Exception $e) {
            report($e);
            Log::error($e->getMessage());

            return redirect()->back()->with('toast_error', 'Ocorreu um erro, tente novamente mais tarde');
        }
    }

    /**
     * @param Republic $id
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
    public function update(RepublicUpdateRequest $republicRequest, $id)
    {
        $republicRequestValidate = $republicRequest->validated();
        $republic = Republic::find($id);
        $republicUpdated = $republic->update($republicRequestValidate);
        $republic->phone = $republicRequestValidate['phone'];
        $republic->save();
        if (!empty($republicRequestValidate['image'])) {
            $this->service->saveImg($republicRequest, $republic);
        }
        if ($republicUpdated) {
            $invitations = Invitation::where('republic_id', $republic->id)->get();
            $members = User::where('republic_id', $republic->id)->get();

            return redirect()->route('painel.republic.index', ['republic' => $republic, 'invitations' => $invitations, 'members' => $members])
                ->with('toast_success', 'Republica atualizada com sucesso!');
        } else {
            return redirect()->back()->with('toast_error', 'Ocorreu um erro ao tentar atualizar  República!');
        }

    }
    /**
     * @param $id
     * @return Factory|View
     */
    public function destroy($id)
    {
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

    public function alterOwner(Request $request)
    {
        $republic = Republic::find($request->republic_id);
        $republic->user_id = $request->member_id;
        $republic->save();
        return redirect()->back()->with('toast_success', 'Prorpietário alterado com sucesso!');

    }


}
