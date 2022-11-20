@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="bi bi-list"></i> {{ __('Visitor List') }}</div>
                <div class="card-body">

                    @if(session()->has('deleteVisitorSuccess'))
                        <span>
                            <div class="alert alert-success w-100 ml-1">
                                <p class="fw-bold">{{ session('deleteVisitorSuccess') }}</p>
                                <p class="fw-bold">{{ __('UUID') }}: <span class="fw-normal">{{ session('uuid') }}</span></p>
                            </div>
                        </span>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-light table-bordered table-hover">
                            @if ($visitors->count() > 0)
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col" class="align-top">{{ __('QR Code') }}</th>
                                    <th scope="col" class="align-top">{{ __('UUID') }}</th>
                                    <th scope="col" class="align-top">{{ __('Name') }}</th>
                                    <th scope="col" class="align-top">{{ __('Access Date & Time') }}</th>
                                    <th scope="col" class="align-top">{{ __('View') }}</th>
                                    <th scope="col" class="align-top">{{ __('Update') }}</th>
                                    <th scope="col" class="align-top">{{ __('Delete') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visitors as $visitor)
                                        <tr>
                                            <td>
                                                <a download="{{ $visitor->uuid }}.png" href="{{ $visitor->qr }}" title="{{ $visitor->uuid }}">
                                                    <img alt="{{ $visitor->uuid }}" src="{{ $visitor->qr }}" class="img-fluid" style="width: 12em">
                                                </a>
                                            </td>
                                            <td>
                                                <p>{{ $visitor->uuid }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $visitor->name }}</p>
                                            </td>
                                            <td>
                                                <x-carbon :date="$visitor->date_time" format="d/m/Y h:i A" />
                                            </td>
                                            <td>
                                                <a href="{{ route('visitors.view', $visitor->uuid) }}" class="btn btn-dark"><i class="bi bi-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-secondary"><i class="bi bi-pen"></i></a>
                                            </td>
                                            <td>
                                                <x-visitors.delete :visitor-uuid="$visitor->uuid"/>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <p>{{ __('No visitors found.') }}</p>
                            @endif
                        </table>
                        {{ $visitors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
