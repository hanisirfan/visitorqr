@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="bi bi-list"></i> {{ __('QR Form List') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-light table-bordered table-hover">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col" class="align-top">{{ __('No') }}</th>
                                <th scope="col" class="align-top">{{ __('UID') }}</th>
                                <th scope="col" class="align-top">{{ __('Added On') }}</th>
                                <th scope="col" class="align-top">{{ __('View') }}</th>
                                <th scope="col" class="align-top">{{ __('Update') }}</th>
                                <th scope="col" class="align-top">{{ __('Delete') }}</th>
                              </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 10; $i++)
                                    <tr>
                                        <th scope="row">{{ $i + 1 }}</th>
                                        {{-- Temporary UID placeholder --}}
                                        <td>
                                            <a href="" class="text-dark">{{ Str::limit(Str::random(30), 15) }}</a>
                                        </td>
                                        <td>
                                            <p>XX/XX/XXXX XX:XX XX</p>
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
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
