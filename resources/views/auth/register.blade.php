@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form method="POST" action="{{ route('register') }}" class="user">
                            @csrf
                            <x-errors my-class="danger"></x-errors>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstName">{{ __('Prènom') }}</label>
                                        <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>
                                        @error('firstName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastName">{{ __('Nom') }}</label>
                                        <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>
                                        @error('lastName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username">{{ __('Nom d\'utilisateur') }}</label>
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">{{ __('Adresse E-mail') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password">{{ __('Mot de passe') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password">{{ __('Confirmation mot de passe') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date">{{ __('Date naissance') }}</label>
                                        <input id="date" type="date" class="form-control datetimepicker @error('birthDate') is-invalid @enderror" name="birthDate" value="{{ old('birthDate') }}" required autocomplete="date" autofocus>
                                        @error('birthDate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phoneNumber">{{ __('Numréro téléphone') }}</label>
                                        <input id="phoneNumber" type="phone" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="phoneNumber" autofocus>
                                        @error('phoneNumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="address">{{ __('Adresse') }}</label>
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">{{ __('Sexe') }}:</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="sexe" class="form-check-input" value="H" @if (old('sexe') == "H") {{ 'checked' }} @endif>Masculin
                                                @error('sexe')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="sexe" class="form-check-input" value="F" @if (old('sexe') == "F") {{ 'checked' }} @endif>Féminin
                                                @error('sexe')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group checkbox">
                                        <label>
                                            <input type="checkbox"> I have read and agree the Terms & Conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary account-btn" type="submit">
                                            {{ __('S\'inscrire') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-center login-link">
                                        You have already account ? <a href="{{ route('login') }}">Login</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
