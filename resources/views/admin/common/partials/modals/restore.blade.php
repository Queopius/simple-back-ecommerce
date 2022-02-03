{{-- <x-modal.restore
    href="{{ route('settings.security.roles.restore', $role->id) }}"
    title="{{ $role->name }}"></x-modal.restore> --}}
<div class="modal fade"
    id="restore"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
    >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    Modal title
                </h5>
                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button"
                class="btn btn-sm btn-secondary rounded-6 px-4"
                data-bs-dismiss="modal"
            >
                {{ trans('Close') }}
            </button>
            <button type="button" class="btn btn-primary">
                Understood
            </button>
        </div>
        </div>
    </div>
</div>
