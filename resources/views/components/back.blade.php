@props(['route'])

<a type="button"
    href="{{ url($route) }}"
    {{ $attributes->merge(['class' => "btn btn-sm float-end bg-light rounded-6 border-0 shadow-sm text-gray-300 me-2 px-3 my-2 my-sm-0 " ]) }}
>
    @include('vendor.material.icons.back')
    {{ Str::title(trans('back')) }}
</a>
