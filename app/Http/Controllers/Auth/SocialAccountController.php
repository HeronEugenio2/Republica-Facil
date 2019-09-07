<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Socialite;

class SocialAccountController extends Controller
{
    //
    /**
     * @param $provider
     * @return mixed
     */
    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(SocialAccountController $accountService, $provider){
        try{
            $user = Socialite::with($provider)->user();
        } catch (Exception $e){
            return redirect('/login');
        }


        $authUser = $accountService->findOrCreate($user, $provider);
        auth()->login($authUser, true);

        return redirect()->to('/home');
    }
}
