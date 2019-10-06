<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Vinkla\Hashids\Facades\Hashids;

class UserController extends Controller
{
    public function show($id)
    {
        try {
            $userId = current(Hashids::decode($id));
            $user   = auth()->user();

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
            $id              = current(Hashids::decode($id));
            $user            = auth()->user();

            if (!empty($id) && $user->id == $id) {
                $phone = preg_replace('/[^0-9]/', '', $requestValidate['phone']);

                if (!empty($requestValidate['profile_photo'])) {
                    $avatar   = $request->file('profile_photo');
                    $fileName = time() . '.' . $avatar->getClientOriginalExtension();
                    $path     = public_path('/images/uploads/avatars/' . $fileName);
                    Image::make($avatar->getRealPath())->resize(300, 300)->save($path);


                    $user->update([
                                      "image" => '/images/uploads/avatars/' . $fileName,
                                  ]);
                } else {
                    $imageName = $user->image;
                }

                $userUpdate = $user->update([
                                                "name"  => $requestValidate['name'],
                                                "phone" => $phone,
                                            ]);

                if ($userUpdate) {
                    return back()
                        ->with('success', 'Salvo com sucesso')
                        ->with('user', $user);
                } else {
                    return back()
                        ->with('error', 'Ocorreu um erro')
                        ->with('user', $user);
                }
            } else {
                return back()
                    ->with('error', 'Ocorreu um erro')->with('user', auth()->user());
            }
        } catch (Exception $e) {
            Log::warning('Erro ao tentar atualizar dados do usuario');
            report($e);

            return back()
                ->with('error', 'Ocorreu um erro')->with('user', auth()->user());
        }
    }
}
