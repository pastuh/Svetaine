<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Invisnik\LaravelSteamAuth\SteamAuth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class AuthController extends Controller
{
    /**
     * The SteamAuth instance.
     *
     * @var SteamAuth
     */
    protected $steam;

    /**
     * The redirect URL.
     *
     * @var string
     */
    protected $redirectURL = '/profile';

    /**
     * AuthController constructor.
     *
     * @param SteamAuth $steam
     */
    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    /**
     * Redirect the user to the authentication page
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectToSteam()
    {
        return $this->steam->redirect();
    }

    /**
     * Get user info and link
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();

            if (!is_null($info)) {
                $steamID = User::where('steamid', '=', $info->steamID64)->first();
                /* Jeigu identisko Steam ID nera bazeje*/
                if ($steamID === null) {
                    $user = Auth::user();

                    /* Jeigu USER nera linkines Steam, sulinkinam */
                    if ($user->steam_status == 0) {

                        $user->steam_status = 1;
                        $user->nickname = $info->personaname;
                        $user->avatar = $info->avatarfull;
                        $user->steamid = $info->steamID64;
                        $user->save();

                        /*Uzregistravus STEAM, uzregistruojamas kaip MEMBER*/
                        if($user->hasRole('lurker')){
                            $user->syncRoles(7);
                        }

                        return redirect($this->redirectURL);
                    } else {
                        Session::flash('status', 'Negali naudoti STEAM Link antrą kartą.');
                        return redirect($this->redirectURL);
                    }

                } else {
                    if (Auth::user()->steamid == $info->steamID64) {
                        Session::flash('success', 'Nurodytas STEAM ACC sulinkintas');
                        return redirect($this->redirectURL);
                    } else {
                        Session::flash('status', 'Nurodyta STEAM ACC jau naudoja kitas medžiotojas');
                        return redirect($this->redirectURL);
                    }

                }
            }
        }
        return $this->redirectToSteam();
    }
}