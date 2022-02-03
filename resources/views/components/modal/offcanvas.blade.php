@props(['title' => '', 'position' => '', 'id' => ''])

<div class="offcanvas offcanvas-{{ $position }}"
    tabindex="-1"
    id="{{ $id }}"
    aria-labelledby="offcanvasRightLabel"
    style="width: 600px;"
>
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">
            {{ $title}}
        </h5>
        <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        {{ $slot }}
    </div>
</div>
