@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="bi bi-list"></i> {{ __('Visitor List') }}</div>

                <div class="card-body">
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
                                            <td class="align-middle">
                                                <p>{{ $visitor->uuid }}</p>
                                            </td>
                                            <td class="align-middle">
                                                <p>{{ $visitor->name }}</p>
                                            </td>
                                            <td class="align-middle">
                                                <p>{{ $visitor->visit_datetime }}</p>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-dark"><i class="bi bi-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-dark"><i class="bi bi-pen"></i></a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <p>No visitors added.</p>
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
