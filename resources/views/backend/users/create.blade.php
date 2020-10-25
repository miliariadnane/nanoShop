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
                                Ajouter un utilisateur
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
                    <h4 class="card-header-title">Ajouter un utilisateur</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Prénom <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="firstName" value="{{ old('firstName') }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nom <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="lastName" value="{{ old('lastName') }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nom d'utilisateur <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="username" value="{{ old('username') }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Mot de passe <span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Confirmez le mot de passe <span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date de naissance <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="date" class="form-control datetimepicker" name="birthDate" value="{{ old('birthDate') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Téléphone <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="phoneNumber" value="{{ old('phoneNumber') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <div class="profile-upload">
                                            <div class="upload-input">
                                                <input type="file" class="form-control" name="avatar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Rôles <span class="text-danger">*</span></label>
                                        <select class="form-control show-tick" name="roles" required>
                                            <optgroup label="Roles">
                                                <option disabled selected>Sélectionner</option>
                                                @foreach($roles as $role)
                                                    <option>{{ $role }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                            @if ($errors->has('roles'))
                                            <label id="name-error" class="error">{{ $errors->first('roles') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Adresse</label>
                                                <input type="text" class="form-control " name="address" value="{{ old('address') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Sexe : <span class="text-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="sexe" class="form-check-input" value="H" @if (old('sexe') == "H") {{ 'checked' }} @endif>Masculin
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="sexe" class="form-check-input" value="F" @if (old('sexe') == "F") {{ 'checked' }} @endif>Féminin
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="display-block">Statut : <span class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="doctor_active" value="1" @if (old('status') == "1") {{ 'checked' }} @endif>
                                        <label class="form-check-label" for="patient_active">
                                        Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="0" @if (old('status') == "0") {{ 'checked' }} @endif>
                                        <label class="form-check-label" for="patient_inactive">
                                        Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center mt-4">
                                <button class="btn btn-primary submit-btn">Ajouter</button>
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
