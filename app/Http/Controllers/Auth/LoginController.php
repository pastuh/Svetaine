<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected function redirectTo() {
        if (Auth::user()->hasRole('superadministrator'))
            return '/manage/dashboard';
        else
            return '/profile';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => 'required|captcha',
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the needed authorization credentials from the request. (Overwritinu is AuthenticateUsers)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(count($user)){
            if($user->status == 0) {
                return ['email'     => 'Inactive',
                        'password'  => 'Jūsų prisijungimas deaktyvuotas administratoriaus. (Banned)'];
            } else {
                return ['email'     =>  $request->email,
                        'password'  => $request->password,
                        'status'    => 1];
            }
        }
        return $request->only($this->username(), 'password');
    }

    /**
     * Get the failed login response instance. (Overwritinu is AuthenticateUsers)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {

        $fields = $this->credentials($request);
        if ($fields['email'] == 'Inactive'){
            $errors = $fields['password'];
        } else {
            $errors = [$this->username() => trans('auth.failed')];
        }


        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }


}
