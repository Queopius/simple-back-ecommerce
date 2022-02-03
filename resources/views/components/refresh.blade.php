@props(['route', 'title' => ''])

<a href="{{ url($route) }}"
    {{ $attributes->merge(['class' => "btn btn-sm float-end bg-light text-gray-400 rounded-6 border-0 shadow-sm me-2 px-3 my-2 my-sm-0 " ]) }}
    title="{{ trans($title) }}"
>
    @include('vendor.material.icons.reload')
</a>
