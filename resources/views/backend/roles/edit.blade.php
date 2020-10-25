@extends('layouts.backend.main')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Modification d'un role</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}" class="breadcrumb-link">Tableau de bord</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('roles.index') }}" class="breadcrumb-link">Rôles</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                modifier un rôle
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
                    <h4 class="card-header-title">Modififcation rôle</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        <div class="form-group form-float">
                            <div class="col-6 mx-auto">
                                <input name="_method" type="hidden" value="PUT">
                                <label class="form-label">Nom du role</label>
                                <input type="text" class="form-control" name="name" value="{{ $role->name }}" required>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="col-6 mx-auto">
                                <label class="form-label">Permission à affecter</label>
                                <select class="form-control show-tick selectpicker" id="your-select" name="permissions[]" multiple>
                                    <optgroup label="Permissions" data-max-options="2">
                                        @foreach($permissions as $permission)
                                    <option value="{{$permission->id}}" @foreach($role->permissions as $p) @if($p->id == $permission->id) selected @endif @endforeach>
                                        {{ $permission->name }}
                                    </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-warning btn-fill pull-right"><i class="fa fa-fw fa-paper-plane"></i> Modifier</button>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop