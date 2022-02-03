<div class="col-3 mb-3">
    <div class="card-body bg-white rounded-5 shadow">
        <div>
            <h5 class="text-lg">
                {{ trans('Update role') }} <b>{{ $role->name }}</b>
            </h5>
            <p class="mt-1 text-sm text-gray-600">
                {{ trans('Añada o cambie el nombre del rol de la siguiente forma: si són compuestas ej. "Super Admin", si són simple ej. "Técnico".
                Para el título también se deberá seguir el mismo esquema por una questión de estilo.') }}
            </p>
        </div>
        <div class="form-row">
            <x-form.field class="col-sm-12 mt-3"
                name="name"
                label="name"
                type="text"
                placeholder="name"
                autocomplete="name"
                value="{{ old('name', $role->name ?? '' ) }}">
            </x-form.field>
        </div>

        <div class="form-row mb-3">
            <x-form.field class="col-sm-12 mt-3"
                name="description"
                label="description"
                type="text"
                placeholder="description"
                autocomplete="description"
                value="{{ old('description', $role->description ?? '' ) }}">
            </x-form.field>
        </div>

        <div class="form-group col-md-12 col-sm-12 mb-3">
            <label for="guard_name"
                class="text-gray-700">
                {{ __('global.guard_name') }}
            </label>
            <select name="guard_name"
                class="form-control"
                id="guard_name"
                style="width: 100%;"
            >
                @foreach(trans('auth.guard_name') as $value => $text)
                    <option value="{{ $value }}"
                        {{ $role->guard_name == $value ? ' selected' : '' }}
                    >
                        {{ $text }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="status"
                class="text-gray-700">
                {{ __('global.status') }}
            </label>
            <select id="status"
                name="status"
                class="form-control bg-gray-200"
                style="width: 100%;"
            >
                @foreach(trans('management.statuses.role') as $value => $text)
                    <option value="{{ $value }}"
                        {{ $role->status == $value ? ' selected' : '' }}
                    >
                        {{ $text }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

