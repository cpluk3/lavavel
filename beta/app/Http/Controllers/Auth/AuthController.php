<?php namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller {

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

	//use AuthenticatesAndRegistersUsers;
	protected $user;
	protected $auth;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, User $user)
	{
		$this->user = $user;
		$this->auth = $auth;
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getLogin()
	{
		//auth/login
		return view('auth.login');
	}

	public function postLogin(LoginRequest $request){
		if($this->auth->attempt($request->only('name', 'password'))){
			return redirect('/admin/main/dashboard');
		}
		return redirect('/auth/login')->withErrors('name','The credentials you entered did not match our records. Try again?');
	}

	public function getLogout(){
		$this->auth->logout();
		return redirect('/auth/login');
	}
}
