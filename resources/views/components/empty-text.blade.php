@props([
    'view' => ''
])

<div class="container mt-5">
    <div class="row mt-5">
        <div class="col text-center text-400 mt-5">

            @if($view == 'index')
                <span>
                    <svg width="200" height="200"
                        viewBox="0 0 24 24" stroke-width="1"
                        stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round"
                    >
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <circle cx="12" cy="12" r="9" />
                        <path d="M10 10l4 4m0 -4l-4 4" />
                    </svg>
                </span>
            @elseif($view == 'trash')
                <span>
                    <svg width="200" height="200"
                        viewBox="0 0 28 28"
                        fill="none" stroke="currentColor"
                        stroke-width="1"  stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <polyline points="3 6 5 6 21 6" />
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                    </svg>
                </span>
            @endif

            <div class="text-center">
                @if($view == 'index')
                    <h1 class="mt-1 ms-n3 text-500">
                        {{ trans('There is no record') }}
                    </h1>
                @elseif($view == 'trash')
                    <h1 class="mt-1 ms-n3 text-500">
                        {{ trans('Trash is empty') }}
                    </h1>
                @endif
            </div>

        </div>
    </div>
</div>
