<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Intervention\Image\Image;

class UserProfileController extends Controller
{
    private $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    /**
     * @param User $user
     * @return Factory|View
     */
    public function edit(User $user)
    {
        $user = $this->userModel->find(auth()->id());
        return view('Painel.User.Perfil', compact('user'));
    }

    public function update(UserProfileUpdateRequest $request, $id)
    {

        $requestData = $request->validated();

        $requestData['phone'] = $phone = preg_replace("/[^0-9]/", "", $requestData['phone']);
        $user = $this->userModel->find(auth()->user()->id);

        if (!empty($user)) {
            $fileName = '';
            dd($request->input('file'));
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $filename = auth()->user()->id . time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save(storage_path('/storage/app/uploads/public/' . $filename));
                $fileName = $filename;
                dd($fileName);

            };



            $user->update([
                'name' => $requestData['name'],
                'email' => $requestData['email'],
                'phone' => $requestData['phone'],
                'image' => $fileName
            ]);

            return view('Painel.User.Perfil', compact('user'));
        } else {
            return view('Painel.User.Perfil', compact('user'));
        }
    }
}
