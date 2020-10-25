@extends('layouts.backend.main')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-datetimepicker.min.css') }}">
@endpush

<div class="content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('users.index') }}" class="breadcrumb-link">Utilisateurs</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                modifier un utilisateur
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <x-errors my-class="danger"></x-errors>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h4 class="card-header-title">Modifier l'utilisateur</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
							@csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Prénom </label>
                                        <input class="form-control" type="text" name="firstName" value="{{ $user->firstName }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input class="form-control" type="text" name="lastName" value="{{ $user->lastName }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nom d'utilisateur </label>
                                        <input class="form-control" type="text" name="username" value="{{ $user->username }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Mot de passe</label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Confirmez le mot de passe</label>
                                        <input class="form-control" type="password" name="password_confirmation">
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date de naissance</label>
                                        <div class="cal-icon">
                                            <input type="date" class="form-control datetimepicker" name="birthDate" value="{{ $user->birthDate }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Téléphone </label>
                                        <input class="form-control" type="text" name="phoneNumber" value="{{$user->phoneNumber}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <div class="profile-upload">
                                        @if($user->avatar && file_exists('storage/'.$user->avatar))
                                            <div class="upload-img">
                                                <img alt="" src="{{ asset('storage/'.$user->avatar) }}">
                                            </div>
                                        @endif
                                            <div class="upload-input">
                                                <input type="file" class="form-control" name="avatar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Rôles</label>
                                        <select class="form-control show-tick" name="roles" id="you" required>
                                            <optgroup label="Roles" data-max-options="2">
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->name }}" {{$user->roles->contains($role->id) ? 'selected' : ''}}>{{ $role->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                            @if ($errors->has('roles'))
                                            <label id="name-error" class="error" for="email">{{ $errors->first('roles') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Adresse</label>
												<input type="text" class="form-control" name="address" value="{{ $user->address }}">
											</div>
										</div>
									</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Sexe:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="sexe" class="form-check-input" value="H" @if ($user->sexe == "H") {{ 'checked' }} @endif> Masculin
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="sexe" class="form-check-input" value="F" @if ($user->sexe == "F") {{ 'checked' }} @endif>Féminin
											</label>
										</div>
									</div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="display-block">Statut</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="user_active" value="1" @if ($user->status == "1") {{ 'checked' }} @endif>
                                        <label class="form-check-label" for="user_active">
                                        Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="user_inactive" value="0" @if ($user->status == "0") {{ 'checked' }} @endif>
                                        <label class="form-check-label" for="user_inactive">
                                        Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-warning submit-btn"><i class="fa fa-fw fa-paper-plane"></i>Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/moment.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-datetimepicker.min.js') }}"></script>
@endpush