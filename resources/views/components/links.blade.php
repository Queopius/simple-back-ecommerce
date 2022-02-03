@props([
    'route',
    'title' => '',
])

@php
    $classes = Request::routeIs($route) ? 'text-indigo-500 ' : '';
@endphp

<li class="nav-item">
    <a href="{{ route($route) }}"
        {{ $attributes->merge(['class' => "nav-link mb-n2 " . $classes ]) }}
    >
        {{ $slot }}
        {{ trans($title) }}
    </a>
</li>
