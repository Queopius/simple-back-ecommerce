@props([
    'method' => 'POST',
    'action' => '',
    'onsubmit' => ''
])

<form method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    action="{{ $action }}" {{ $attributes }}
    accept-charset="utf-8"
    enctype="multipart/form-data"
    onsubmit="{{ $onsubmit }}"
>
    @csrf

    @if (! in_array($method, ['GET', 'POST']))
        @method($method)
    @endif

    {{ $slot }}
</form>
