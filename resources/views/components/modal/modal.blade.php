@props([
    'title' => '',
    'id' => '',
    'text' => '',
])

<div class="modal"
    id="{{ $id }}"
    tabindex="-1"
    aria-labelledby="generalModal"
    aria-hidden="true"
>
    <div class="modal-dialog modal-xxl modal-dialog-centered">
        <div {{ $attributes->merge(['class' => "modal-content "]) }}>
            <div class="modal-header px-4">
                <h5 class="modal-title" id="generalModal">
                    {{ $title }}
                </h5>
                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                >
                </button>
            </div>

            {{ $slot }}

            <div class="modal-footer pe-3 py-3">
                <button type="submit"
                    class="btn btn-sm btn-primary rounded-6 border-0 px-5"
                    data-bs-target="#exampleModalToggle2"
                    data-bs-toggle="modal"
                >
                    {{ trans($text) }}
                </button>
                <button type="button"
                    class="btn btn-sm btn-secondary rounded-6 border-0 px-5 me-2"
                    data-bs-dismiss="modal"
                >
                    {{ trans('Close') }}
                </button>
            </div>
        </div>
    </div>
</div>
