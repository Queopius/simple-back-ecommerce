<div class="row mt-2 px-3">
    <div class="col-md-3 pl-3 pt-4">
        <div>
            <h5 class="text-lg">
                {{ trans('Personal information') }}
            </h5>
            <p class="mt-1 text-sm tw-text-gray-600">
                {{ trans('Use a permanent address where you can receive mail.') }}
            </p>
        </div>
    </div>
    <div class="col-md-9 p-md-4 bg-white rounded-lg shadow-sm">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-2 flex items-center mb-3">
                    <span class="overflow-hidden tw-bg-gray-100">
                        <label for="avatar"></label>
                        <img src="{{ $user->avatar_path }}" class="rounded-circle" width="120" height="120" id="preview_img">
                    </span>
                    <input
                        type="file"
                        name="avatar"
                        id="inputGroupFile02"
                        accept="image/*"
                        onchange="loadPreview(this)"
                        class="ml-5 bg-white py-2 px-3 border text-sm rounded"
                    >
                </div>
            </div>

            <x-form.field name="username"
                type="text"
                label="Username"
                value="{{ old('username', $user->username ?? '' ) }}"
            />

            <x-form.field name="first_name"
                type="text"
                label="First name"
                value="{{ old('first_name', $user->first_name ?? '' ) }}"
            />

            <x-form.field name="last_name"
                type="text"
                label="First name"
                value="{{ old('last_name', $user->last_name ?? '' ) }}"
            />

            <x-form.field name="email"
                type="text"
                label="Email"
                value="{{ old('email', $user->email ?? '' ) }}"
            />

        </div>
    </div>
</div>
