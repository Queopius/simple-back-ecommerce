@props([
    'route',
    'trashed' => '',
    ])

@php
    $classes = Request::routeIs($route) ? 'bg-primary text-white ' : '';
@endphp

<a href="{{ route($route) }}"
    type="button"
    {{ $attributes->merge(['class' => "btn btn-sm float-end bg-light rounded-6 border-0 shadow me-2 px-3 my-2 my-sm-0 " . $classes ]) }}
    title="{{ trans('Trashed') }}"
    {{-- style="font-size: 20px;" --}}
>
    @if ($trashed)
        @include('vendor.material.icons.trashed-filled')
    @else
        @include('vendor.material.icons.trashed')
    @endif

    {{ trans('Trashed') }}

    @if ($trashed <= 99)
        @if ($trashed > 0)
        <span class="badge rounded-7 bg-300 text-600 px-2 shadow">
            {{ $trashed }}
        </span>
        @endif
    @else
    <span class="badge rounded-7 bg-300 text-600 px-2 shadow">
        99+
    </span>
    @endif
</a>
