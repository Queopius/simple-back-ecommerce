@props([
    'action',
    'title',
    'id' => '',
    'array',
    'name' => '',
    'model' => '',
])

<div class="modal fade"
    aria-labelledby="status{{ $id }}"
    aria-hidden="true"
    id="status{{ $id }}"
    tabindex="-1"
    >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="status{{ $id }}">
                {{ trans('Change status') }} &nbsp;
                {{ $slot }}
            </h5>
            <button type="button"
                class="btn-close"
                data-dismiss="modal"
                aria-label="Close"
            ></button>
        </div>
        <form action="{{ $action }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        {{ trans('Select a status') }}
                    </div>
                    <div class="col-xs-12 mb-3">
                        <div class="form-group form-group-sm">
                            <select id="{{ $name }}"
                                name="{{ $name }}"
                                class="form-select rounded-3 form-select-sm"
                            >
                                @foreach($array as $value => $text)
                                    <option for="{{ $name }}" value="{{ $value }}"
                                        {{ $model->status == $value ? ' selected' : '' }}
                                    >
                                        {{ $text }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- @if ($model->programmed) --}}
                            <div class="form-group form-group-sm mt-2">
                                {{ trans('Select a date') }}
                                <div class="input-group date input-group-sm" style="font-size: 14px;">
                                    <input type="text"
                                        class="form-control"
                                        placeholder="Publish date"
                                        autocomplete="off"
                                        name="published_at"
                                        id="published_at"
                                        value="{{ old('published_at') ?? $model->published_at }}"
                                        size="12"
                                        aria-label="Search"
                                    >
                                    <span class="input-group-append input-group-sm">
                                        <span class="input-group-text bg-white d-block">
                                            @include('vendor.material.icons.calendar')
                                        </span>
                                    </span>
                                </div>
                            </div>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"
                    class="btn btn-default"
                    data-dismiss="modal"
                >
                    {{ trans('Close') }}
                </button>
                <button type="submit"
                    class="btn btn-primary btn-sm px-3 rounded-6"
                >
                    {{ trans('Save changes') }}
                </button>
            </div>
        </form>
    </div>
</div>
