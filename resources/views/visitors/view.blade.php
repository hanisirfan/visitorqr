@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="bi bi-card-text"></i> {{ __('Visitor Details') }}</div>
                <div class="card-body">
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

                    @if(!empty($visitor->check_in_date_time_carbon))

                        <hr>

                        <div class="my-2">
                            <p class="text-decoration-underline"><i class="bi bi-box-arrow-right"></i> <span class="fw-bold">{{ __('Checked In') }}</span></p>
                            @if (!empty($visitor->check_in_date_time_carbon))
                                <p class="fw-bold"><i class="bi bi-clock fw-normal"></i> {{ __('Date & Time') }}: <x-carbon class="fw-normal" :date="$visitor->check_in_date_time_carbon" format="d/m/Y h:i A" /></p>
                            @endif
                            @if (!empty($visitor->check_in_verified_by))
                                <p class="fw-bold"><i class="bi bi-person fw-normal"></i> {{ __('Verified by') }}: <span class="fw-normal">{{ $visitor->checkInVerifiedByUser->name }}</span></p>
                            @endif
                        </div>

                        @if(!empty($visitor->check_out_date_time_carbon))

                            <hr>

                            <div class="my-2">
                                <p class="text-decoration-underline"><i class="bi bi-box-arrow-left"></i> <span class="fw-bold">{{ __('Checked Out') }}</span></p>
                                @if (!empty($visitor->check_out_date_time_carbon))
                                    <p class="fw-bold"><i class="bi bi-clock fw-normal"></i> {{ __('Date & Time') }}: <x-carbon class="fw-normal" :date="$visitor->check_out_date_time_carbon" format="d/m/Y h:i A" /></p>
                                @endif
                                @if (!empty($visitor->check_out_verified_by))
                                    <p class="fw-bold"><i class="bi bi-person fw-normal"></i> {{ __('Verified by') }}: <span class="fw-normal">{{ $visitor->checkOutVerifiedByUser->name }}</span></p>
                                @endif
                            </div>

                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
