<?php


namespace App\Http\Controllers\Painel;


use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    private $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function index()
    {

    }


    public function store()
    {

    }

    public function edit()
    {
        $user = $this->userModel->find(auth()->id());
        return view('Painel.User.Perfil', compact('user'));
    }

    public function update()
    {

    }

}
