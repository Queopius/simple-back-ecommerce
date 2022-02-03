@props(['size' => 50])

<img src="{{ current_user()->avatarPath }}"
    alt="{{ current_user()->avatarPath }}"
    width="{{ $size }}"
    height="{{ $size }}"
    {{ $attributes->merge(['class' => "rounded-circle "]) }}
>
<span>
    <svg class="text-gray-700 mt-1"
        wight="24" height="24"
        viewBox="0 0 24 24"  fill="none"
        stroke="currentColor"  stroke-width="2"
        stroke-linecap="round"  stroke-linejoin="round"
    >
        <circle cx="12" cy="12" r="1" />
        <circle cx="12" cy="5" r="1" />
        <circle cx="12" cy="19" r="1" />
    </svg>
</span>
