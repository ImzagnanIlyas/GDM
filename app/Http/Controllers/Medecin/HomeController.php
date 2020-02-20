<?php

namespace App\Http\Controllers\Medecin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/medecin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('medecin.auth:medecin');
    }

    /**
     * Show the Medecin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('medecin.home');
    }

}