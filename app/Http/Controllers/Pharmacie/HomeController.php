<?php

namespace App\Http\Controllers\Pharmacie;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/pharmacie/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('pharmacie.auth:pharmacie');
    }

    /**
     * Show the Pharmacie dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('pharmacie.home');
    }

}