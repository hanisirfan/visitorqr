<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use chillerlan\QRCode\QRCode;
use Illuminate\Support\Carbon;
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
            $userId = Auth::user()->id;

            $visitor = Visitor::create([
                'uuid' => $uuid,
                'name' => $name,
                'ic_number' => $icNumber,
                'vehicle_plate_number' => $plateNumber,
                'visit_datetime' => $accessDateTime,
                'added_by' => $userId,
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

    public function delete(Request $request) {
        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'delete-visitor-uuid' => ['required', 'uuid'],
            ]);

            $visitorUuid = $request->input('delete-visitor-uuid');
            Visitor::destroy($visitorUuid);

            $request->session()->flash('deleteVisitorSuccess', 'Visitor successfully deleted!');
            $request->session()->flash('uuid', $visitorUuid);

            return back();
        } else {
            return redirect()->route('home');
        }
    }

    public function checkInVerify(Request $request, $uuid) {
        if ($request->isMethod('post')) {
            if (Visitor::where('uuid', $uuid)->first()) {

                $visitor = Visitor::where('uuid', $uuid)->first();
                // Checks if visitor check in already verified.
                if (!empty($visitor->check_in_date_time_carbon)) {

                    return redirect()->route('visitors.check.in.verify', ['uuid' => $uuid]);

                } else {

                    $dateTimeNow = Carbon::now();

                    Visitor::where('uuid', $uuid)
                    ->update([
                        'check_in_datetime' => $dateTimeNow,
                        'check_in_verified_by' => Auth::user()->id
                    ]);

                    $request->session()->flash('verifyVisitorCheckInSuccess', 'Visitor check in is successfully verified!');

                    return back();

                }

            } else {
                return abort(404);
            }
        }

        if ($request->isMethod('get')) {
            // Check if visitor exists.
            if (Visitor::where('uuid', $uuid)->first()) {
                $visitor = Visitor::where('uuid', $uuid)->first();

                return view('visitors.check.in')->with(['visitor' => $visitor]);
            } else {
                return abort(404);
            }
        }
    }

    public function checkOutVerify(Request $request, $uuid) {
        if ($request->isMethod('post')) {
            if (Visitor::where('uuid', $uuid)->first()) {

                $visitor = Visitor::where('uuid', $uuid)->first();
                // Checks if visitor check out already verified.
                if (!empty($visitor->check_out_date_time_carbon)) {

                    return redirect()->route('visitors.check.out.verify', ['uuid' => $uuid]);

                } else {

                    $dateTimeNow = Carbon::now();

                    Visitor::where('uuid', $uuid)
                    ->update([
                        'check_out_datetime' => $dateTimeNow,
                        'check_out_verified_by' => Auth::user()->id
                    ]);

                    $request->session()->flash('verifyVisitorCheckOutSuccess', 'Visitor check out is successfully verified!');

                    return back();

                }

            } else {
                return abort(404);
            }
        }

        if ($request->isMethod('get')) {
            // Check if visitor exists.
            if (Visitor::where('uuid', $uuid)->first()) {
                $visitor = Visitor::where('uuid', $uuid)->first();

                return view('visitors.check.out')->with(['visitor' => $visitor]);
            } else {
                return abort(404);
            }
        }
    }

}
