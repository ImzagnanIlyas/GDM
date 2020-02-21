<?php

namespace App\Http\Controllers\Examinateur;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/examinateur/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('examinateur.auth:examinateur');
    }

    /**
     * Show the Examinateur dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('examinateur.home');
    }

}