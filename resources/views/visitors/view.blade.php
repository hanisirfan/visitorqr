@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="bi bi-card-text"></i> {{ __('Visitor Details') }}</div>
                <div class="card-body">
                    {{-- @if(session()->has('addVisitorSuccess'))
                        <span>
                            <div class="alert alert-success w-100 ml-1">
                                <p class="fw-bold">{{ session('addVisitorSuccess') }}</p>
                                <div>
                                    <a download="{{ session('uuid') }}.png" href="{{ session('qrCode') }}" title="{{ session('uuid') }}">
                                        <img alt="{{ session('uuid') }}" src="{{ session('qrCode') }}">
                                    </a>
                                    <p>{{ __('Click on the QR code to download it.') }}</p>
                                </div>
                            </div>
                        </span>
                    @endif --}}
                    <div class="mb-3">
                        <i class="bi bi-fonts"></i> <span class="fw-bold">{{ __('Name') }}</span> <span>: {{ $visitor->name }}</span>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-person-badge"></i> <span class="fw-bold">{{ __('IC Number') }}</span> <span>: {{ $visitor->ic_number }}</span>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-car-front"></i> <span class="fw-bold">{{ __('Vehicle Plate Number') }}</span> <span>: {{ $visitor->vehicle_plate_number }}</span>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-clock"></i> <span class="fw-bold">{{ __('Visit Date & Time') }}</span> <span>: <x-carbon :date="$visitor->date_time" format="d/m/Y h:i A" /></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
