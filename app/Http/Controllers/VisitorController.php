<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use chillerlan\QRCode\QRCode;
use Illuminate\Support\Facades\Auth;

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
    public function index(Request $request, $uuid)
    {
        if ($request->isMethod('get')) {
            // Check if visitor exists.
            if (Visitor::where('uuid', $uuid)->first()) {
                $visitor = Visitor::where('uuid', $uuid)->first();

                return view('visitors.view')->with(['visitor' => $visitor]);
            } else {
                return abort(404);
            }
        }
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

            $uuid = (string) Str::uuid();
            $name = $request->input('visitor-name');
            $icNumber = $request->input('visitor-ic-number');
            $plateNumber = $request->input('visitor-vehicle-plate-number');
            $accessDateTime = $request->input('visitor-datetime');
            $userName = Auth::user()->name;

            $visitor = Visitor::create([
                'uuid' => $uuid,
                'name' => $name,
                'ic_number' => $icNumber,
                'vehicle_plate_number' => $plateNumber,
                'visit_datetime' => $accessDateTime,
                'added_by' => $userName,
            ]);

            $request->session()->flash('addVisitorSuccess', 'Visitor successfully added!');

            $request->session()->flash('qrCode', $visitor->qr);
            $request->session()->flash('uuid', $uuid);

            return back();
        }

        if ($request->isMethod('get')) {
            return view('visitors.add');
        }
    }
}
