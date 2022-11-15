@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="bi bi-plus"></i> {{ __('Add Visitor') }}</div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="visitor-name" name="visitor-name" placeholder="name">
                            <label for="visitor-name"><i class="bi bi-fonts"></i> {{ __('Name') }}</label>
                        </div>
                        @error('visitor-name')
                            <div class="alert alert-danger">
                                {{ __('Visitor name is required!') }}
                            </div>
                        @enderror

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="visitor-ic-number" name="visitor-ic-number" placeholder="ic number">
                            <label for="visitor-ic-number"><i class="bi bi-person-badge"></i> {{ __('IC Number') }}</label>
                        </div>
                        @error('visitor-ic-number')
                            <div class="alert alert-danger">
                                {{ __('Visitor IC number is required!') }}
                            </div>
                        @enderror

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="visitor-vehicle-plate-number" name="visitor-vehicle-plate-number" placeholder="vehicle plate number">
                            <label for="visitor-vehicle-plate-number"><i class="bi bi-car-front"></i> {{ __('Vehicle Plate Number') }}</label>
                        </div>
                        @error('visitor-vehicle-plate-number')
                            <div class="alert alert-danger">
                                {{ __('Visitor vehicle plate number is required!') }}
                            </div>
                        @enderror

                        <div class="form-floating mb-3">
                            <input type="datetime-local" class="form-control" id="visitor-datetime" name="visitor-datetime" placeholder="access date & time">
                            <label for="visitor-datetime"><i class="bi bi-clock"></i> {{ __('Visit Date & Time') }}</label>
                        </div>
                        @error('visitor-datetime')
                            <div class="alert alert-danger">
                                {{ __('Visit date & time is required!') }}
                            </div>
                        @enderror

                        <button type="submit" class="btn btn-dark mt-3"><i class="bi bi-plus"></i> {{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
