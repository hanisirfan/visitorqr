@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('QR Scanner') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <div id="reader" width="1000px" class="border border-dark border-2"></div>
                    </div>
                    <p class="mt-5 text-center text-danger fw-bold" hidden id="qr-error">{{ __('QR code format not recognised.') }}</p>
                    <p class="mt-5 text-center">{{ __('Please allow the request to access your device camera in order to scan QR codes.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
@vite(['resources/js/scanner.js'])
@endsection
