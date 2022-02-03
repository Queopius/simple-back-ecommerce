@props([
    'route',
    'trashed' => '',
])

@php
    $classes = Request::routeIs($route) ? 'bg-primary ' : '';
@endphp

<a href="{{ route($route) }}"
    type="button"
    {{ $attributes->merge(['class' => "btn btn-sm float-end bg-light rounded-6 border-0 shadow-sm me-2 px-3 my-2 my-sm-0 " . $classes ]) }}
    title="{{ trans('Trashed') }}"
>
    @if ($trashed)
        @include('vendor.material.icons.trashed-filled')
    @else
        @include('vendor.material.icons.trashed')
    @endif

    {{ trans('Trashed') }}

    @if ($trashed <= 99)
        @if ($trashed > 0)
        <span class="badge text-dark rounded-7 px-2 shadow-sm">
            {{ $trashed }}
        </span>
        @endif
    @else
    <span class="badge rounded-7 px-2 shadow-sm">
        99+
    </span>
    @endif
</a>
