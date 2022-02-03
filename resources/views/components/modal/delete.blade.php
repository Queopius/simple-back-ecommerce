@props(['action', 'title', 'id' => ''])

<div class="modal fade"
    id="delete{{ $id }}"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    aria-labelledby="staticModelDestroy"
    aria-hidden="true"
    tabindex="-1"
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
                <h4 class="mt-3">
                    @include('vendor.material.icons.alerts.danger')
                    {{ trans('Are you sure you want to delete?') }}
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
            <form action="{{ $action }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PATCH')
                <x-delete title="Delete"></x-delete>
            </form>
        </div>
    </div>
</div>
