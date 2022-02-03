@props(['route'])

<a type="button"
    href="{{ $route }}"
    {{ $attributes->merge(['class' => "btn btn-primary btn-sm float-end rounded-6 border-0 shadow-sm px-3 my-2 my-sm-0 "]) }}
    title="{{ trans('Create') }}"
>
    {{ trans('Create') }}
</a>
