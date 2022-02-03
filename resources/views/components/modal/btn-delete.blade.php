@props(['target'])

<a {{ $attributes->merge(
        ['class' => "float-end mt-2 "]
    )}}
    href="#"
    type="button"
    data-bs-toggle="modal"
    data-bs-target="#delete{{ $target }}"
    data-bs-tooltip="tooltip"
    title="Delete"
>
    @include('vendor.material.icons.delete')
</a>
