<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller {

	public function __construct() {
		
	}

	public function index() {
		return 'index';
	}

	public function dashboard() {
		return view('dashboard.index');
	}

	public function forbidden() {
		return view('dashboard.forbidden');
	}	

}
