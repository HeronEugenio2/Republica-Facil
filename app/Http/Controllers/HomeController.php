<?php

namespace App\Http\Controllers;

use App\Models\Invitations\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user        = Auth::user();
        $invitations = Invitation::with('republic', 'user')->where('email', $user->email)->get();

        return view('home', compact('invitations'));
    }

    public function addMember(Request $request)
    {
        dump($request->all());
        $user = Auth::user();

        return view('home', compact('invitations'));
    }
}
