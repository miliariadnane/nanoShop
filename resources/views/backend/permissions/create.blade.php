@extends('layouts.backend.main')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">L'ajout d'une permission</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}" class="breadcrumb-link">Tableau de bord</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('permissions.index') }}" class="breadcrumb-link">Permissions</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                ajouter une permission
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
                    <h4 class="card-header-title">Création rôle</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <div class="form-group form-float">
                            <div class="col-6 mx-auto">
                                <label class="form-label">Nom de la permission</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                                @if ($errors->has('name'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('name') }}</label>
                                @endif
                            </div>
                        </div>
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