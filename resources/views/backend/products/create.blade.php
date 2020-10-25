@extends('layouts.backend.main')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/fileinput.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-datetimepicker.min.css') }}">
@endpush
<div class="content">

    <x-head 
        href1="{{ route('dashboard') }}"
        href2="{{ route('products.index') }}" 
        title1="Dashboard"
        title2="Produits"
        title3="Liste des produits">
    </x-head>

    <x-errors my-class="danger"></x-errors>
    
    <form action="{{ route('products.index') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Générale
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Titre produit<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Quantité produit<span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="product_quantity" value="{{ old('product_quantity') }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Unité produit<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="unit" value="{{ old('unit') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>prix produit<span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="price" value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Prix de vente<span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="sale_price" value="{{ old('sale_price') }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Catégorie produit<span class="text-danger">*</span></label>
                                    <select class="form-control show-tick" name="category" id="categories">
                                        <option disabled selected>Sélectionner</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}">
                                                    {{ $categorie->name }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="display-block">Statut : </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="1" @if (old('status') == "1") {{ 'checked' }} @endif>
                                    <label class="form-check-label" for="product_active">
                                    Disponible
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive" value="0" @if (old('status') == "0") {{ 'checked' }} @endif>
                                    <label class="form-check-label" for="product_inactive">
                                    Non disponible
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Image produit</label>
                                    <div class="profile-upload">
                                        <div class="upload-input">
                                            <input type="file" class="form-control" id="input-id" name="image_product">
                                            <label style="font-size: 11px; color:#d02727;">dimension : 860 * 900</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-sm-2">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Ajouter description
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description produit</label>
                                    <textarea type="text" class="form-control " name="description" id="product_descr">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Divider -->
                        <hr class="sidebar-divider">
                        
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Meta Data
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Meta titre</label>
                                    <input class="form-control" type="text" name="meta_title" value="{{ old('meta_title') }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Meta description</label>
                                    <textarea type="text" rows="4" class="form-control " name="meta_description">{{ old('meta_description') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 order-sm-2">
                <div class="card">
                    <div class="row mx-auto">
                        <div class="m-t-20 text-center p-3">
                            <button class="btn btn-primary submit-btn"><i class="fa fa-fw fa-paper-plane"></i>Ajouter</button>
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop
@push('scripts')
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/moment.min.js') }}"></script>
<script src="{{ asset('admin/js/fileinput.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.2.0/tinymce.min.js"></script>
<script src="{{ asset('admin/js/bootstrap-datetimepicker.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#input-id").fileinput({
            browseClass: "btn btn-primary btn-block",
            showCaption: false,
            showRemove: false,
            showUpload: false,
            maxFileCount: 1,
            maxImageHeight: 10,
        });
    });
    tinymce.init({
        selector: '#product_descr',
        height: 405
    });
</script>
@endpush
