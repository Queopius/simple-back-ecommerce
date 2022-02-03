@props(['target'])

<a {{ $attributes->merge(
        ['class' => "btn btn-sm float-end bg-light rounded-6 border-0 shadow-sm text-red-400 me-2 px-3 my-2 my-sm-0 "]
    )}}
    href="#"
    type="button"
    id="btn_del"
    data-bs-toggle="modal"
    data-bs-target="#delete-all"
>
    @include('vendor.material.icons.trashed')
    {{ trans('Delete All') }}
</a>
