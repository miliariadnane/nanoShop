@extends('layouts.backend.main')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/fileinput.min.css') }}">
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
                                <a href="{{ route('products.index') }}" class="breadcrumb-link">Produits</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Modifier produit
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <x-errors my-class="danger"></x-errors>
    
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
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
                                    <input class="form-control" type="text" name="name" value="{{ $product->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Quantité produit<span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="product_quantity" value="{{ $product->product_quantity }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Unité produit<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="unit" value="{{ $product->unit }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>prix produit<span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="price" value="{{ $product->price }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Prix de vente<span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="sale_price" value="{{ $product->sale_price }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Catégorie produit<span class="text-danger">*</span></label>
                                    <select class="form-control show-tick" name="category_id" id="categories">
                                        <option disabled selected>Sélectionner</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{$categorie->id}}" {{ (collect($product->category_id)->contains($categorie->id)) ? 'selected':'' }}>
                                                    {{ $categorie->name }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="display-block">Statut : </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="1" @if ($product->status == "1") {{ 'checked' }} @endif>
                                    <label class="form-check-label" for="product_active">
                                    Disponible
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive" value="0" @if ($product->status == "0") {{ 'checked' }} @endif>
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
                                    <textarea type="text" class="form-control " name="description" id="product_descr">{{ $product->description }}</textarea>
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
                                    <input class="form-control" type="text" name="meta_title" value="{{ $product->meta_title }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Meta description</label>
                                    <textarea type="text" rows="4" class="form-control " name="meta_description">{{ $product->meta_description }}"</textarea>
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
                            <button class="btn btn-warning submit-btn"><i class="fa fa-fw fa-paper-plane"></i>Modifier</button>
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
