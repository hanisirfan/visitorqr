<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index(Request $request)
    {
        if ($request->isMethod('get')) {
            $pagination = 5;

            $visitors = Visitor::orderBy('created_at', 'DESC')->paginate($pagination)->withQueryString();

            return view('home')->with(['visitors' => $visitors]);
        }

    }
}
