@props([
    'href' => '',
    'title' => ''
])

<a href="{{ $href }}"
    title="{{ trans('Copy') }}"
    data-toggle="tooltip"
    data-placement="top"
    aria-haspopup="true"
    aria-expanded="false"
    class="me-2 text-decoration-none"
    style="font-size: 18px;"
>
    <span class="badge rounded-5 bg-gray-600 text-white px-3 d-inline">
        <svg class="me-1"
            width="16" height="16"
            viewBox="0 0 28 28" fill="none"
            stroke="currentColor"  stroke-width="2"
            stroke-linecap="round"  stroke-linejoin="round"
            >
                <rect x="9" y="9" width="13" height="13" rx="2" ry="2" />
                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
        </svg>
        {{ trans('Copy') }}
    </span>
</a>

