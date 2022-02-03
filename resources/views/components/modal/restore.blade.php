@props(['href', 'title', 'id' => ''])

<div class="modal fade"
    id="restore{{ $id }}"
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
                    {{ $title }}
                </h5>
                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
        <div class="modal-body">
            <div class="text-center">
                <h4 class="mt-3">
                    @include('vendor.material.icons.alerts.atention')
                    {{ trans('Are you sure you want to restore?') }}
                </h4>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button"
                class="btn btn-sm btn-secondary rounded-6 px-4"
                data-bs-dismiss="modal"
            >
                {{ trans('Close') }}
            </button>
            {{-- Aqui button restore --}}
            <x-restore
                href="{{ $href }}"
                title="Restore"></x-restore>
        </div>
    </div>
</div>
