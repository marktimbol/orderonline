<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;

use App\Commands\AdminRegisterCommand;
use App\Http\Requests\UserRegisterRequest;

use App\Http\Requests\AuthLoginRequest;

use Laracasts\Flash\Flash;

class AuthController extends Controller {

	public function getLogin() {

		$pageTitle = "Login";

		if( Auth::check() ) {
			return redirect('dashboard');
		} else {
			$body_class = 'login';
			return view('auth.login', compact('body_class', 'pageTitle'));	
		}	

	}

	public function postLogin( AuthLoginRequest $request ) {

		$credentials = [
			'email' => $request->email,
			'password'	=> $request->password
		];

		if( Auth::attempt( $credentials ) ) {

			return redirect()->intended('dashboard');
		
		} else {

			Flash::error("The email and password combination didn't match our records. Please try again.");

			return redirect()->back()->withInput();
		}

	}

	public function getRegister() {

		$pageTitle = "Login";

		if( Auth::check() ) {
			return redirect('dashboard');
		} else {
			$body_class = 'login';
			return view('auth.register', compact('body_class', 'pageTitle'));		
		}

	}

	public function postRegister( UserRegisterRequest $request ) {

		$this->dispatchFrom(
			AdminRegisterCommand::class, $request
			);

		flash()->success('You have successfully registered. Please asked the admin to set your permissions.');

		return redirect()->route('auth.login');

	}


	public function getLogout() {

		Auth::logout();

		Flash::info('You have successfully logged-out.');

		return redirect()->route('auth.login');

	}	
}
