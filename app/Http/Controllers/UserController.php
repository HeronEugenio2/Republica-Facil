<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return view('Painel.User.Perfil', compact('user'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return void
     */
    public function update($id, UserRequest $request)
    {
        $requestValidate = $request->validated();

        $user = User::find($id);
        $phone = preg_replace('/[^0-9]/', '', $requestValidate['phone']);

        if (!empty($requestValidate['profile_photo'])) {
            $imageName = time() . '.' . $requestValidate['profile_photo']->getClientOriginalExtension();
            $requestValidate['profile_photo']->move(public_path('images'), $imageName);
        } else {
            $imageName = $user->image;
        }


        $user->update([
            "image" => $imageName,
            "name" => $requestValidate['name'],
            "phone" => $phone,
        ]);

        return back()
            ->with('success', 'Salvo com sucesso')
            ->with('user', $user);
    }
}
