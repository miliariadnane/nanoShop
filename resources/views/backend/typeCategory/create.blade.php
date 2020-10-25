@extends('layouts.backend.main')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">L'ajout d'un type de categorie</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}" class="breadcrumb-link">Tableau de bord</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('types.index') }}" class="breadcrumb-link">Types catégorie</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                ajouter un type catégorie
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
                    <h4 class="card-header-title">Création types catégorie</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('types.store') }}" method="POST">
                        @csrf

                        @include('backend.typeCategory._form')

                        <div class="row">
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary btn-fill pull-right"><i class="fa fa-fw fa-paper-plane"></i> Ajouter</button>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop