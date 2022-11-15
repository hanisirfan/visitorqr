<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
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
        // return view('qrforms.list');
    }

    public function create(Request $request)
    {

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'visitor-name' => ['required'],
                'visitor-ic-number' => ['required'],
                'visitor-vehicle-plate-number' => ['required'],
                'visitor-datetime' => ['required'],
            ]);

            dd($request);
        }

        if ($request->isMethod('get')) {
            return view('visitors.add');
        }
    }
}
