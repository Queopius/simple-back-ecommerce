@props([
    'href' => '',
    'title' => '',
    'target' => '',
    ])

<a href="{{ $href }}"
    type="button"
    data-bs-toggle="modal"
    data-bs-target="#{{ $target }}"
    title="{{ trans($title) }}"
    class="mt-2 text-decoration-none me-2"
>
    @include('vendor.material.icons.edit')
</a>
