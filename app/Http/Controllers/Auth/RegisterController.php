<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $dataFormatted = [
            'name'                  => $data['name-register'],
            'email'                 => $data['email-register'],
            'password'              => $data['password-register'],
            'password_confirmation' => $data['password_confirmation'],
        ];

        return Validator::make($dataFormatted, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
                                   'name.required'      => 'O campo nome deve ser preenchido',
                                   'name.string'        => 'Caracteres inválidos no campo nome',
                                   'name.max'           => 'O campo nome permite apenas 255 caracteres',
                                   'email.required'     => 'O campo email deve ser preenchido',
                                   'email.string'       => 'Caracteres inválidos no campo email',
                                   'email.email'        => 'O campo email deve ser um email válido',
                                   'email.max'          => 'O campo email permite apenas 255 caracteres',
                                   'email.unique'       => 'O email informado já está sendo utilizado',
                                   'password.required'  => 'O campo senha é obrigatório',
                                   'password.string'    => 'Caracteres inválidos no campo senha',
                                   'password.min'       => 'O campo senha é obrigatório ter no minimo 6 caracteres',
                                   'password.confirmed' => 'O campo senha e o campo confirmação de senha estão incorretos',
                               ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function register(Request $request)
    {
        $requestValidate             = $this->validator($request->all())->validate();
        $requestValidate['image']    = 'https://republica-facil.s3-sa-east-1.amazonaws.com/uploads/user-default.png';
        $requestValidate['password'] = Hash::make($requestValidate['password']);
        $user                        = User::create($requestValidate);

        event(new Registered($user));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     * @return StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
