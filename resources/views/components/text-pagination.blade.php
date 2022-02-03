@props(['text' => '', 'links' => ''])

<div class="col-3">
    <h6 class="ps-2">
        {{ $text }}
    </h6>
</div>
<div class="col-9">
    <div class="float-end mt-n2">
        {{ $links->onEachSide(3)->links() }}
    </div>
</div>
