@props([
        'href' => '',
        'title' => ''
    ])

<a {{ $attributes->merge(['class' => "text-decoration-none btn btn-sm rounded-5 bg-light border-0 shadow-sm d-inline"]) }}
    type="button"
    href="{{ $href }}"
    title="{{ trans($title) }}"
    {{-- style="font-size: 20px;" --}}
>
    <span class="px-3">{{ trans('Yes') }}</span>
    {{-- @include('vendor.material.icons.restore') --}}
</a>
