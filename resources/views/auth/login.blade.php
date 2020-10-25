@extends('layouts.backend.app')

@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">{{ __('Adresse E-mail') }}</label>
                                        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('Mot de passe') }}</label>
                                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mr-5">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="remember">{{ __('Remember me') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Se connecter') }}
                                        </button>
                                    </div>
                                    <div class="form-group text-right">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublié?') }}
                                        </a>
                                        @endif
                                    </div>
                                    <div class="text-center register-link">
                                            Vous avez pas de compte? 
                                        <a href="{{ route('register') }}">
                                            Inscrivez-vous maintenant
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
