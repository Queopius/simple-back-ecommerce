<div class="row py-2 px-3">
    <div class="col-md-3 pl-3 pt-4">
        <div>
            <h5 class="text-lg">
                {{ trans('Password') }}
            </h5>
            <p class="mt-1 text-sm tw-text-gray-600">
                {{ trans('Create a strong password.') }}
            </p>
        </div>
    </div>
    <div class="col-md-9 p-md-4 bg-white rounded-lg shadow-sm">
        <div class="row">
            <div class="form-group mt-3 col-6">
                <label for="password"
                    class="tw-text-gray-700">
                    {{ __('global.password') }}
                </label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="{{ __('global.password') }}"
                    autocomplete="given-name"
                    class="form-control password1 @error('password') is-invalid @enderror"
                >
                <span class="far fa-fw fa-eye password-icon show-password"></span>
                @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3 col-6">
                <label for="password_confirmation"
                  class="tw-text-gray-700">
                    {{ __('global.confirm_password') }}
                </label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="{{ __('global.confirm_password') }}"
                    autocomplete="family-name"
                    class="form-control password2 @error('password_confirmation') is-invalid @enderror"
                >
                @error('password_confirmation')
                    <div class="border-red-500">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
