<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepublicRequest;
use App\Models\Invitations\Invitation;
use App\Models\Republic;
use App\Models\Type;
use App\Models\User;
use App\Notifications\RequestInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class RepublicController extends Controller
{

    public function index()
    {
        $userModel = new User();

        $user = auth()->user();
        if ($user->republic) {
            $republic = $user->republic;
            $members = $userModel->where('republic_id', $user->id)->get();
        }
        return view('Painel.Republic.Index', compact('republic', 'user', 'invitations', 'members'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     * @author Heron Eugenio
     */
    public function create()
    {
        $types = Type::all();

        return view('Painel.Republic.Create', compact('types'));
    }

    /**
     * @param RepublicRequest $republicRequest
     * @return \Illuminate\Http\RedirectResponse
     * @author Heron Eugenio
     */
    public function store(RepublicRequest $republicRequest)
    {
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
                ]
            );
            $savedRepublic = Republic::create($data);
            //            dd($savedRepublic->id);
            if ($savedRepublic) {
                $user = auth()->user();
                $user->republic_id = $savedRepublic->id;
                $user->save();

                return redirect()->route('painel.republic.index', ['id' => auth()->user('id')])
                    ->with('success', 'Republica salva com sucesso!');
            } else {
                return redirect()->back()->with('error', 'Ocorreu um erro ao tentar salvar a República!');
            }
        } catch (Exception $e) {
            report($e);
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     * @param \App\Models\Republic $id
     * @return \Illuminate\Http\Response
     */
    public function show(Republic $id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @param \Illuminate\Http\Request $request
     * @param \App\Republic $republic
     * @return \Illuminate\Http\Response
     * @author Heron Eugenio
     */
    public function update(RepublicRequest $republicRequest, $id)
    {
        $input = $republicRequest->all();
        $republicRequest->validated([
            $data = [
                'name' => $republicRequest->input('name'),
                'email' => $republicRequest->input('email'),
                'qtdMembers' => $republicRequest->input('qtdMembers'),
                'qtdVacancies' => $republicRequest->input('qtdVacancies'),
                'type_id' => $republicRequest->input('type_id'),
                'description' => $republicRequest->input('description') ?? null,
                'street' => $republicRequest->input('street') ?? null,
                'district' => $republicRequest->input('neighborhood') ?? null,
                'cep' => $republicRequest->input('cep') ?? null,
                'city' => $republicRequest->input('city') ?? null,
                'state' => $republicRequest->input('state') ?? null,
                'number' => $republicRequest->input('number') ?? null,
                'user_id' => $republicRequest->input('user_id') ?? null,
            ],
        ]);
        // store
        $republic = Republic::find($id);
        $republic->name = $input['name'];
        $republic->email = $input['email'];
        $republic->qtdMembers = $input['qtdMembers'];
        $republic->qtdVacancies = $input['qtdVacancies'];
        $republic->value = $input['value'];
        $republic->type_id = $input['type_id'];
        $republic->description = $input['description'];
        $republic->street = $input['street'];
        $republic->district = $input['district'];
        $republic->cep = $input['cep'];
        $republic->city = $input['city'];
        $republic->state = $input['state'];
        $republic->number = $input['number'];
        //        dd($input);
        $updatedRepublic = $republic->save();
        if ($updatedRepublic) {
            $user = User::with('republic', 'republic.type')->first();
            $republic = $user->republic;
            $invitations = [];
            if (!empty($republic = $user->republic)) {
                $invitations = Invitation::where('republic_id', $user->republic->id)->get();
            }
            return view('Painel.Republic.Index', compact('republic', 'user', 'invitations'));
            $members = User::where('republic_id', $republic->id)->get();

            return view('Painel.Republic.Index', compact('republic', 'user', 'members'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Republic $republic
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function invitation(Request $request)
    {
        $user = auth()->user();
        $republic = $user->republic;
        $invitations = [];
        $members = User::where('republic_id', $republic->id)->get();
        if (!empty($republic)) {
            $invitations = Invitation::where('republic_id', $republic->id)->get();
        }
        $invitationEqual = Invitation::where('republic_id', $request['republic_id'])->where('email', $request['email'])
            ->get();
        $data = [
            'userName' => Auth::user()->name,
            'republicName' => Auth::user()->republic->name,
        ];
        if ($invitationEqual == []) {
            $invitationCreated = Invitation::create(
                [
                    'republic_id' => $request['republic_id'],
                    'user_id' => $request['user_id'],
                    'email' => $request['email'],
                ]
            );
        } else {
            $updateOrCreate = Invitation::updateOrCreate(
                ['email' => $request['email']],
                [
                    'republic_id' => $request['republic_id'],
                    'user_id' => $request['user_id'],
                    'email' => $request['email'],
                ]
            );
        }
        //        if($user == null){
        //            return Redirect::back()->withErrors(['O usuário não está cadastrado na plataforma', 'The Message']);
        //        }
        $invitation = Notification::route('mail', $updateOrCreate->email)
            ->notify(new RequestInvitation($data));

        return view('Painel.Republic.Index', compact('republic', 'user', 'invitations', 'members'));
    }

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
}
