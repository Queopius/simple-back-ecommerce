@props(['title' => ''])

<div class="modal fade"
    id="delete-all"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticModelDestroy"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModelDestroy">
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
                @include('vendor.material.icons.alerts.danger')
                <h4 class="mt-3">
                    {{ trans('Are you sure you want to delete all datas?') }}
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

            <x-delete-all title="Delete" />

        </div>
    </div>
</div>
