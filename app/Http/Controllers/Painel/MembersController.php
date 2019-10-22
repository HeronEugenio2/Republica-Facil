<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Invitations\Invitation;
use App\Models\User;
use App\Notifications\RequestInvitation;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

/**
 * Class MembersController
 * @package App\Http\Controllers\Painel
 */
class MembersController extends Controller
{
    private $invitationMember;
    private $userModel;

    /**
     * MembersController constructor.
     * @param Invitation $invitation
     * @param User $user
     */
    public function __construct(Invitation $invitation, User $user)
    {
        $this->invitationMember = $invitation;
        $this->userModel        = $user;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        try {
            $republic    = auth()->user()->republic;
            $invitations = [];
            if (!empty($republic)) {
                $invitations = $this->invitationMember->where('republic_id', $republic->id)->get();

                $members = $this->userModel->where('republic_id', $republic->id)->get();

                return view('Painel.Members.index', compact('invitations', 'members'));
            } else {
                return view('Painel.Members.index');
            }
        } catch (Exception $e) {
            Log::warning('Erro ao buscar dados membros da republica');
            report($e);

            return view('Painel.Members.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try {
            if (!empty($request->input('email'))) {
                $user = $this->userModel->where('email', $request->input('email'))->whereNotNull('republic_id')
                                        ->first();
                if (!$user) {
                    $verifyEmail = $this->invitationMember->where('email', $request->input('email'))->first();

                    if (!$verifyEmail) {

                        $invitationSaved = $this->invitationMember->create([
                                                                               'email'       => $request->input('email'),
                                                                               'user_id'     => auth()->user()->id,
                                                                               'republic_id' => auth()->user()->republic_id,
                                                                           ]);

                        if ($invitationSaved) {
                            $data = [
                                'userName'     => auth()->user()->name,
                                'republicName' => auth()->user()->republic->name,
                            ];
                            Notification::route('mail', $invitationSaved->email)
                                        ->notify(new RequestInvitation($data));

                            return redirect()->route('painel.member.index')
                                             ->with('success', 'Convite enviado com sucesso');
                        } else {
                            return redirect()->route('painel.member.index')->with('error', 'Erro ao enviar convite');
                        }
                    } else {
                        return redirect()->route('painel.member.index')
                                         ->with('error', 'Já existe um convite para esse email');
                    }
                } else {
                    return redirect()->route('painel.member.index')
                                     ->with('error', 'Este usuário já é  membro de uma república');
                }
            } else {
                return redirect()->route('painel.member.index')->with('error', 'Erro ao enviar convite');
            }
        } catch (Exception $e) {
            Log::warning('Erro ao tentar salvar convite');
            report($e);

            return redirect()->route('painel.member.index')->with('error', 'Erro ao enviar convite');
        }
    }

    /**
     * Display the specified resource.
     * @param \App\Invitations\Invitation $invitation
     * @return Response
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Invitations\Invitation $invitation
     * @return Response
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param \App\Invitations\Invitation $invitation
     * @return Response
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Invitations\Invitation $invitation
     * @return Response
     */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
