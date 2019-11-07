<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\Service;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Vinkla\Hashids\Facades\Hashids;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    private $s3;
    /**
     * @var Service
     */
    private $service;

    /**
     * UserController constructor.
     */
    public function __construct(Service $service)
    {
        $this->s3 = App::make('aws')->createClient('s3');
        $this->service = $service;
    }

    /**
     * @param $id
     * @return Factory|RedirectResponse|View
     */
    public function show($id)
    {
        try {
            $userId = current(Hashids::decode($id));
            $user = auth()->user();

            if (!empty($userId) && $userId == $user->id) {

                return view('Painel.User.Perfil', compact('user'));
            } else {
                return redirect()->back()
                    ->with('error', 'Ocorreu um erro');
            }
        } catch (Exception $e) {
            Log::warning('Erro ao tentar buscar dados do usuario');
            report($e);

            return back()
                ->with('error', 'Ocorreu um erro')
                ->with('user', $user);
        }
    }

    /**
     * @param $id
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function update($id, UserRequest $request)
    {
        try {
            $requestValidate = $request->validated();
            $id = current(Hashids::decode($id));
            $user = auth()->user();

            if (!empty($id) && $user->id == $id) {
                $phone = preg_replace('/[^0-9]/', '', $requestValidate['phone']);
                if (!empty($requestValidate['image'])) {

                    $this->service->saveImg($request, $user);
                }

                $userUpdate = $user->update([
                    "name" => $requestValidate['name'],
                    "phone" => $phone,
                ]);

                if ($userUpdate) {
                    return back()
                        ->with('toast_success', 'Salvo com sucesso')
                        ->with('user', $user);
                } else {
                    return back()
                        ->with('toast_error', 'Ocorreu um erro')
                        ->with('user', $user);
                }
            } else {
                return back()
                    ->with('toast_error', 'Ocorreu um erro')->with('user', auth()->user());
            }
        } catch (Exception $e) {
            Log::warning('Erro ao tentar atualizar dados do usuario');
            report($e);

            return back()
                ->with('error', 'Ocorreu um erro')->with('user', auth()->user());
        }
    }
}
