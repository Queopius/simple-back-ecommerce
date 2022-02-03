@props(['name' => '', 'type', 'label' => '', 'value'])

<div {{ $attributes->merge(['class' => 'form-group col-md-6 col-sm-12 mt-3 ']) }}>
    <label for="{{ $name }}"
        class="tw-text-gray-800">
        {{ trans($label) }}
    </label>
    <input type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ trans($name) }}"
        autocomplete="{{ $name }}"
        aria-describedby="{{ $name }}"
        class="form-control  @error($name) is-invalid @enderror"
        value="{{ $value }}"
    >
</div>
