<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Vinkla\Hashids\Facades\Hashids;
use Aws\S3\S3Client;

class UserController extends Controller
{
    private $s3;

    public function __construct()
    {
        $this->s3 = App::make('aws')->createClient('s3');
    }

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

                    /*if (!empty($user->image)) {

                        $url = explode('/', $user->image);
                        $dd  = $this->s3->deleteObject([
                                                           'Bucket' => env('AWS_BUCKET'),
                                                           'Key'    => $url[3] . '/' . $url[4],
                                                       ]);
                    }*/

                    $url = 'https://' . env('AWS_BUCKET') . '.s3-' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/';

                    $file     = $request->file('profile_photo');
                    $name     = time() . $file->getClientOriginalName();
                    $filePath = 'images/' . $name;
                    Storage::disk('s3')->put($filePath, file_get_contents($file));
                    $user->update([
                                      "image" => $url . $filePath,
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
