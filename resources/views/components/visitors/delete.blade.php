<div>
    <a class="btn btn-danger text-light" href="" data-bs-toggle="modal" data-bs-target="#{{ 'delete-visitor-modal-' . $visitorUuid}}"><i class="bi bi-trash"></i></a>

    <div class="modal text-dark fade" id="{{ 'delete-visitor-modal-' . $visitorUuid}}" tabindex="-1" aria-labelledby="{{ 'delete-visitor-modal-' . $visitorUuid . '-label'}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('visitors.delete') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="{{ 'delete-user-modal-' . $visitorUuid . '-label'}}">{{ __('Delete Visitor') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('You sure want to delete this visitors.') }}</p>

                        <p class="fw-bold">{{ __('UUID') }}: <span class="fw-normal">{{ $visitorUuid }}</span></p>
                        <p class="fw-bold">{{ __('Name') }}: <span class="fw-normal">{{ $visitorName }}</span></p>
                        <p class="fw-bold">{{ __('Access Date & Time') }}:
                            <span class="fw-normal">
                                <x-carbon :date="$visitorDateTime" format="d/m/Y h:i A" />
                            </span>
                        </p>

                        <input type="text" name="delete-visitor-uuid" id="delete-visitor-uuid" value="{{ $visitorUuid }}" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> {{ __('Yes') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
