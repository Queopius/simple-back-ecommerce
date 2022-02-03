@props([
    'route',
    'title' => '',
    'role' => ''
    ])

@php
    $classes = Request::routeIs($route) ? 'text-red-400' : '';
@endphp

<a href="{{ route($route) }}"
    type="button"
    {{ $attributes->merge(['class' => "btn btn-sm float-end bg-light rounded-6 border-0 shadow-sm text-red-400 me-2 px-3 my-2 my-sm-0 " . $classes ]) }}
    title="{{ trans('Trash All') }}"
    id="delete-all"
>
    @include('vendor.material.icons.trashed')
    {{ trans('Trash All') }}
</a>
