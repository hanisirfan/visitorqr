@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="bi bi-plus"></i> {{ __('QR Form Add') }}</div>
                <div class="card-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="form-name" class="form-label fw-bold">Form Name</label>
                            <input type="text" class="form-control" id="form-name" placeholder="Enter the QR Form name">
                        </div>
                        <hr>
                        {{-- Field groups --}}
                        <button class="btn btn-success mb-3"><i class="bi bi-collection"></i> Add Field Group</button>

                        <div id="field-groups" class="my-3">
                            <div class="row row-cols-2 row-cols-lg-4 g-3 border border-1 pb-3 rounded">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <a class="btn btn-info" data-bs-toggle="collapse" href="#field-group-0" role="button" aria-expanded="false" aria-controls="field-group-0">
                                        <i class="bi bi-arrows-collapse"></i> Open group
                                    </a>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <button class="btn btn-warning">
                                        <i class="bi bi-arrow-up-circle"></i> Order up
                                    </button>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <button class="btn btn-warning">
                                        <i class="bi bi-arrow-down-circle"></i> Order down
                                    </button>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <button class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Remove group
                                    </button>
                                </div>
                            </div>
                            <div class="collapse" id="field-group-0">
                                <div class="card card-body">
                                    <div class="mb-3">
                                        <label for="field-group-name" class="form-label fw-semibold">Field Group Name</label>
                                        <input type="text" class="form-control" id="field-group-name" placeholder="Enter the Field Group name">
                                    </div>
                                    <hr>

                                    <button class="btn btn-success mb-3"><i class="bi bi-collection"></i> Add Field</button>
                                    {{-- Fields start here --}}
                                    <div id="fields" class="mb-3">
                                        <div class="card card-body">
                                            <p class="fw-bold">Name: <span class="fw-normal">Test Field</span></p>
                                            <p class="fw-bold">Type: <span class="fw-normal">Text</span></p>
                                            <div class="row row-cols-1 row-cols-lg-3 g-3">
                                                <div class="col d-flex justify-content-center align-items-center">
                                                    <button class="btn btn-warning">
                                                        <i class="bi bi-arrow-up-circle"></i> Order up
                                                    </button>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center">
                                                    <button class="btn btn-warning">
                                                        <i class="bi bi-arrow-down-circle"></i> Order down
                                                    </button>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center">
                                                    <button class="btn btn-danger">
                                                        <i class="bi bi-trash"></i> Remove field
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-body">
                                            <p class="fw-bold">Name: <span class="fw-normal">Test Field</span></p>
                                            <p class="fw-bold">Type: <span class="fw-normal">Text</span></p>
                                            <div class="row row-cols-1 row-cols-lg-3 g-3">
                                                <div class="col d-flex justify-content-center align-items-center">
                                                    <button class="btn btn-warning">
                                                        <i class="bi bi-arrow-up-circle"></i> Order up
                                                    </button>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center">
                                                    <button class="btn btn-warning">
                                                        <i class="bi bi-arrow-down-circle"></i> Order down
                                                    </button>
                                                </div>
                                                <div class="col d-flex justify-content-center align-items-center">
                                                    <button class="btn btn-danger">
                                                        <i class="bi bi-trash"></i> Remove field
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Submit btn --}}
                        <button type="submit" class="btn btn-dark mt-3"><i class="bi bi-plus"></i> Add QR Form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
