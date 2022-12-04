@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="bi bi-box-arrow-right"></i> {{ __('Visitor Check In') }}</div>
                <div class="card-body">
                    @if(session()->has('verifyVisitorCheckInSuccess'))
                        <span>
                            <div class="alert alert-success w-100 ml-1">
                                <p class="fw-bold">{{ session('verifyVisitorCheckInSuccess') }}</p>
                            </div>
                        </span>
                    @endif
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
                        <i class="bi bi-clock"></i> <span class="fw-bold">{{ __('Access Requested') }}</span> <span>: <x-carbon :date="$visitor->date_time" format="d/m/Y h:i A" /></span>
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold"><i class="bi bi-person fw-normal"></i> {{ __('Added by') }}: <span class="fw-normal">{{ $visitor->addedByUser->name }}</span></p>
                    </div>

                    <hr>

                    @if(!empty($visitor->check_in_date_time_carbon))

                        <div class="alert alert-danger w-100 ml-1">
                            <p class="fw-bold">{{ __('Visitor is already checked in!') }}</p>
                            @if (!empty($visitor->check_in_date_time_carbon))
                                <p class="fw-bold"><i class="bi bi-clock fw-normal"></i> {{ __('Date & Time') }}: <x-carbon class="fw-normal" :date="$visitor->check_in_date_time_carbon" format="d/m/Y h:i A" /></p>
                            @endif
                            @if (!empty($visitor->check_in_verified_by))
                                <p class="fw-bold"><i class="bi bi-person fw-normal"></i> {{ __('Verified by') }}: <span class="fw-normal">{{ $visitor->checkInVerifiedByUser->name }}</span></p>
                            @endif
                        </div>

                    @else

                        <form action="" method="POST" class="mt-3">
                            @csrf
                            <div class="mb-1">
                                <button type="submit" class="btn btn-success"><i class="bi bi-check"></i> {{ __('Verify Visitor Check In') }}</button>
                            </div>
                        </form>

                    @endif
                    <div class="mb-3">
                        <a href="{{ route('home') }}" class="btn btn-dark mt-3"><i class="bi bi-arrow-return-left"></i> {{ __('Back to home') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
