<a type="button"
    {{ $attributes->merge(['class' => "btn btn-sm float-end rounded-6 border-0 shadow px-3 my-2 my-sm-0 "]) }}
    title="{{ trans('Create') }}"
    data-bs-toggle="modal"
    data-bs-target="#{{ $target }}"
>
    {{ trans('Create') }}
</a>
