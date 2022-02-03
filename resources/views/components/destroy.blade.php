@props(['title' => ''])
<button type="submit"
    class="btn btn-sm rounded-6 bg-light border-0 shadow-sm d-inline"
    title="{{ trans($title) }}"
>
    <span class="px-3">{{ trans('Yes') }}</span>
</button>
