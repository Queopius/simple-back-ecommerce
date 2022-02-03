@props(['target'])

<a {{ $attributes->merge(
        ['class' => "float-end  mt-2 "]
    )}}
    href="#"
    type="button"
    data-bs-toggle="modal"
    data-bs-target="#destroy{{ $target }}"
>
    @include('vendor.material.icons.destroy')
</a>
