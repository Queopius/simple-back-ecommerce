@props([
    'route',
    'title' => '',
])

@php
    $classes = Request::routeIs($route) ? 'tw-bold ' : '';
@endphp

<li class="nav-item">
    <a href="{{ $route }}"
        {{ $attributes->merge(['class' => "nav-link " . $classes ]) }}
    >
        {{ $slot }}
        {{ trans($title) }}
    </a>
</li>
