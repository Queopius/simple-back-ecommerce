@props([
    'model' => '',
    'count' => '',
    'title' => '',
])

<div class="col-md-3 mt-3">
    <div class="card card-body border-top-0 border-bottom-0 border-right-0 rounded-5 shadow-sm"
        style="border-left-color: #766df4; border-left-width: 7px;">
        <div class="row justify-content-between">
            <div class="col-md-6"><h4>{{ $model }}</h4></div>
            <div class="col-md-6 text-end"><h4>{{ $count }}</h4></div>
        </div>
        <div class="row justify-content-between">
            <div class="col-6">{{ $title }}</div>
            <div class="col-6 text-end">{{ $slot }}</div>
        </div>
    </div>
</div>
