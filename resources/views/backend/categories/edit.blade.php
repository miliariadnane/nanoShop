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
                                <a href="{{ route('categories.index') }}" class="breadcrumb-link">Catégories</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                modifier une Catégorie
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
                    <h4 class="card-header-title">Modifier catégorie</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('categories.update', $categorie->id) }}" method="POST" enctype="multipart/form-data">
							@csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Libelle catégorie <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" value="{{ $categorie->name }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Slug catégorie <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="category_slug" value="{{ $categorie->category_slug }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Type catégorie <span class="text-danger">*</span></label>
                                        <select class="form-control show-tick" name="type_id" id="types">
                                            @foreach ($types as $type)
                                            <option value="{{$type->id}}" {{ (collect($categorie->type_id)->contains($type->id)) ? 'selected':'' }}>
                                                {{$type->libelle}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Image category</label>
                                        <div class="profile-upload">
                                            <div class="profile-upload">
                                                @if($categorie->category_image && file_exists('storage/'.$categorie->category_image))
                                                    <div class="upload-img">
                                                        <img alt="" src="{{ asset('storage/'.$categorie->category_image) }}">
                                                    </div>
                                                @endif
                                                <div class="upload-input">
                                                    <input type="file" class="form-control" name="category_image">
                                                    <label style="font-size: 11px; color:#d02727;">dimension : 400 * 400</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="display-block">Statut</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="category_active" value="1" @if ($categorie->status == "1") {{ 'checked' }} @endif>
                                        <label class="form-check-label" for="category_active">
                                        Disponible
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="category_inactive" value="0" @if ($categorie->status == "0") {{ 'checked' }} @endif>
                                        <label class="form-check-label" for="category_inactive">
                                        Non diponible
                                        </label>
                                    </div>
                                </div>
                            <div class="row mt-4">
                                <div class="m-t-20 text-center">
                                    <button class="btn btn-warning submit-btn"><i class="fa fa-fw fa-paper-plane"></i>Modifier</button>
                                </div>
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