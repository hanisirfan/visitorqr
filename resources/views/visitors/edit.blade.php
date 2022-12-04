@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="bi bi-pen"></i> {{ __('Edit Visitor') }}</div>
                <div class="card-body">
                    @if(session()->has('editVisitorSuccess'))
                        <span>
                            <div class="alert alert-success w-100 ml-1">
                                <p class="fw-bold">{{ session('editVisitorSuccess') }}</p>
                                <p class="fw-bold">{{ __('UUID') }}: <span class="fw-normal">{{ session('uuid') }}</span></p>
                            </div>
                        </span>
                    @endif
                    {{-- Visitor can't be edited if they already checked in. --}}
                    @if (!empty($visitor->check_in_date_time_carbon))
                    <div class="alert alert-danger w-100 ml-1">
                        <p class="fw-bold">{{ __('Visitor cannot be edited after they checked in!') }}</p>
                        <p class="fw-bold">{{ __('UUID') }}: <span class="fw-normal">{{ $visitor->uuid }}</span></p>
                    </div>
                    @else
                        <form action="" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="visitor-name" name="visitor-name" placeholder="name" value="{{ old('visitor-name', $visitor->name); }}">
                                <label for="visitor-name"><i class="bi bi-fonts"></i> {{ __('Name') }}</label>
                            </div>
                            @error('visitor-name')
                                <div class="alert alert-danger">
                                    {{ __('Visitor name is required!') }}
                                </div>
                            @enderror

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="visitor-ic-number" name="visitor-ic-number" placeholder="ic number" value="{{ old('visitor-ic-number', $visitor->ic_number ); }}">
                                <label for="visitor-ic-number"><i class="bi bi-person-badge"></i> {{ __('IC Number') }}</label>
                            </div>
                            @error('visitor-ic-number')
                                <div class="alert alert-danger">
                                    {{ __('Visitor IC number is required!') }}
                                </div>
                            @enderror

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="visitor-vehicle-plate-number" name="visitor-vehicle-plate-number" placeholder="vehicle plate number" value="{{ old('visitor-vehicle-plate-number', $visitor->vehicle_plate_number ); }}">
                                <label for="visitor-vehicle-plate-number"><i class="bi bi-car-front"></i> {{ __('Vehicle Plate Number') }}</label>
                            </div>
                            @error('visitor-vehicle-plate-number')
                                <div class="alert alert-danger">
                                    {{ __('Visitor vehicle plate number is required!') }}
                                </div>
                            @enderror

                            <div class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="visitor-datetime" name="visitor-datetime" placeholder="access date & time" value="{{ old('visitor-datetime', $visitor->visit_datetime ); }}">
                                <label for="visitor-datetime"><i class="bi bi-clock"></i> {{ __('Visit Date & Time') }}</label>
                            </div>
                            @error('visitor-datetime')
                                <div class="alert alert-danger">
                                    {{ __('Visit date & time is required!') }}
                                </div>
                            @enderror

                            <button type="submit" class="btn btn-dark mt-3"><i class="bi bi-pen"></i> {{ __('Edit') }}</button>
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
