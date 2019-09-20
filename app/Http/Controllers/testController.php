<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index()
    {

        return view('test');
    }

    /**
     * Upload of images
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function uploadImage(Request $request)
    {
        $user = User::where('id', auth()->id())->first();
        $republic = $user->republic;
        $nameRandom = $this->str_random(20);
        if (($_FILES['my_file']['name'] != "")) {
            // Where the file is going to be stored
            $prefix = str_replace(' ', '', $user->republic->name) . '-';
            $target_dir = "images/";
            $file = $_FILES['my_file']['name'];
            $path = pathinfo($file);
            $filename = $prefix . $nameRandom;//$path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['my_file']['tmp_name'];
            $path_filename_ext = $target_dir . $filename . "." . $ext;
            // Check if file ja existe
            if (file_exists($path_filename_ext)) {
                $message = "Sorry, file already exists.";
            } else {
                move_uploaded_file($temp_name, $path_filename_ext);
                $message = "Congratulations! File Uploaded Successfully.";
                $republic->image = '/' . $path_filename_ext;
                $republic->save();
            }
        }
        return view('test', compact('message'));
    }

    /**
     * Gera string aleatória
     * @param $length
     * @return string
     */
    public function str_random($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function perfil()
    {
        $user = User::where('id', auth()->id())->first();
        return view('Painel.User.Perfil', compact('user'));
    }
}
