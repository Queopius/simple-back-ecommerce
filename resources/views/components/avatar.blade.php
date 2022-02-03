@props(['path', 'size' => 50])

<img src="{{ $path }}"
    alt="{{ $path }}"
    width="{{ $size }}"
    height="{{ $size }}"
    {{ $attributes->merge(['class' => "rounded-circle "]) }}
>
