<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    protected $redirectTo ='home';

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        $login = $request->input('email');
        $pass = $request->input('password');
        //echo "<pre>";
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'usuario';
        //$field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'usuario' : 'email' ;

        /*return [
            $field => $login,
            'password' => $request->get('password'),
        ];*/
        //print_r([$field => $login, 'password' => $pass]);
        //print_r($request->only('email', 'password'));
        //echo "</pre>";die();

        return [$field => $login, 'password' => $pass];
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required', 'password' => 'required',
        ]);

        $credentials = $this->getCredentials($request);

        if (auth()->attempt($credentials, $request->has('remember'))) {
            return redirect()->intended($this->redirectPath());
        }

        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);
    }




    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'vch_usuario' => 'required|max:255|unique:tbl_usuario',
            'name' => 'required|max:255',
            'vch_email' => 'required|email|max:255|unique:tbl_usuario',
            'vch_password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'usuario' => $data['vch_usuario'],
            'vch_nombres' => $data['name'],
            'vch_apellidos' => $data['lastname'],
            'email' => $data['vch_email'],
            'password' => bcrypt($data['vch_password']),
            'int_tipo' => $data['type'],
            'vch_pais' => $data['country'],
            'int_sexo' => $data['sex'],
        ]);
    }
}
