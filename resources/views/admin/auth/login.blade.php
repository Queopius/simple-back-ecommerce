<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Test Project') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    {{-- <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/login.css') }}">
</head>
<body>
    <div id="app">
        <div class="container mb-5">
            <div class="row justify-content-center mt-5 pt-3">
                <div class="col-md-6 mb-4">
                    <form class="form-signin needs-validation rounded-5 shadow-sm bg-100 border py-5 px-5 mb-5"
                        method="POST"
                        action="{{ route('admin.login') }}"
                    >
                        @csrf
                        <div class="text-centermb-4">
                            <h1 class="mt-2 mb-2 fs-4">
                                {{ trans('Sign in') }}
                            </h1>
                        </div>

                        <div class="form-label-group">
                            <input type="email"
                                name="email"
                                id="inputEmail"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email address"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                autofocus
                                required
                            >
                            <label for="inputEmail">
                                {{ __('E-Mail Address') }}
                            </label>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group">
                            <div class="form-label-group w-100">
                                <input type="password"
                                    name="password"
                                    id="inputPassword"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Password"
                                    autocomplete="current-password"
                                    required
                                >
                                <label for="inputPassword">
                                    {{ __('Password') }}
                                </label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input type="checkbox"
                                    class="form-check-input"
                                    value="remember-me"
                                    name="remember"
                                    id="keep-signed"
                                    {{ old('remember') ? 'checked' : '' }}
                                >
                                <label class="form-check-label fs-sm" for="keep-signed" style="font-size: 0.875rem;">
                                    {{ __('Keep me signed in') }}
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-lg btn-primary d-block w-100 text-white mb-2" type="submit">
                            {{ trans('Sign in') }}
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</html>
