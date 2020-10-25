@extends('layouts.backend.main')
@section('content')
@push('css')

<style>
    .status-danger{
        border: 1px solid #dc3545;
        padding: 5px 10px;
        border-radius: 5px;
        color: #dc3545;
    }
    .status-success{
        border: 1px solid #28a745;
        padding: 5px 10px;
        border-radius: 5px;
        color: #28a745;
    }
    
</style>
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
                                Détail catégorie
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="border border-dark rounded p-1 text-center">
                                <h4 class="bg-light p-2 rounded text-center text-dark">Etat catégorie</h4>
                                @if($categorie->status)
                                <span class="d-none d-sm-inline-block status-success" target="_blank">
                                    Disponible
                                </span>
                                @else
                                <span class="d-none d-sm-inline-block status-danger" target="_blank">
                                    Non disponible
                                </span>
                                @endif
                            </div>
                            <div class="border border-dark rounded p-2 text-center mt-1">
                                {{-- <span><strong >Photo produit fini</strong></span> --}}
                                <h4 class="bg-light p-2 rounded text-center text-dark">Illustration catégorie</h4>
                                @if($categorie->category_image && file_exists('storage/'.$categorie->image->url()))
                                <img alt="" class="p-2" src="{{ asset('storage/'.$categorie->image->url()) }}" width="35%">
                                @else
                                <img alt="" src="/admin/img/unnamed.png" width="35%">
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 mt-1">
                                    <div class="border border-dark rounded p-2 text-center">
                                        <h4 class="bg-light p-2 rounded text-center text-dark">Libelle catégorie</h4>
                                        <h5 class="mt-1">{{ $categorie->name }}</h5>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="border border-dark rounded p-2 text-center">
                                        <h4 class="bg-light p-2 rounded text-center text-dark">Slug catégorie</h4>
                                        <h5 class="mt-1">{{ $categorie->category_slug }}</h5>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="border border-dark rounded p-2 text-center">
                                        <h4 class="bg-light p-2 rounded text-center text-dark">Type catégorie</h4>
                                        <h5 class="mt-1">{{$categorie->type->libelle}}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script>
    //Supprimer un utilisateur avec Ajax
    $("#remove-user").on("click", function() {
        swal({
            title: 'Etes vous sûr?',
            text: "De supprimer cette catégorie ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, Supprimer!'
        }).then((result) => {
            if (result.value) {
               $(this).closest("form").submit();
            }
        })
    });
</script>
@endpush
