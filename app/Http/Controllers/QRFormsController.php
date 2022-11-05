<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRFormsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('qrforms.list');
    }

    public function create()
    {
        return view('qrforms.add');
    }
}
