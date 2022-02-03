@props([
    'target' => '',
])

<a {{ $attributes->merge(
        ['class' => "btn btn-sm bg-100 float-end rounded-5 border-0 mt-2 shadow-sm "]
    )}}
    href="#"
    type="button"
    data-bs-toggle="modal"
    data-bs-target="#{{ $target }}"
    {{-- style="font-size: 20px;" --}}
>
    {{ $slot }}
</a>
