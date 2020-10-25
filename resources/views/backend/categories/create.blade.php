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
                                <a href="{{ route('categories.index') }}" class="breadcrumb-link">Categories</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Ajouter une categorie
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
                    <h4 class="card-header-title">Ajouter une categorie</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Libelle catégorie <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Slug catégorie <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="category_slug" value="{{ old('category_slug') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Type catégorie <span class="text-danger">*</span></label>
                                        <select class="form-control show-tick" name="type" id="types">
                                            <option disabled selected>Sélectionner</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">
                                                    {{ $type->libelle }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Image category</label>
                                        <div class="profile-upload">
                                            <div class="upload-input">
                                                <input type="file" class="form-control" name="category_image">
                                                <label style="font-size: 11px; color:#d02727;">dimension : 400 * 400</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="display-block">Statut : </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="category_active" value="1" @if (old('status') == "1") {{ 'checked' }} @endif>
                                        <label class="form-check-label" for="category_active">
                                        Disponible
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="category_inactive" value="0" @if (old('status') == "0") {{ 'checked' }} @endif>
                                        <label class="form-check-label" for="category_inactive">
                                        Non disponible
                                        </label>
                                    </div>
                                </div>
                            <div class="row mt-4">
                                <div class="m-t-20 text-center mt-4">
                                    <button class="btn btn-primary submit-btn"><i class="fa fa-fw fa-paper-plane"></i>Ajouter</button>
                                </div>
                            <div>
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
