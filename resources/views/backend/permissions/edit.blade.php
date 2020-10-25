@extends('layouts.backend.main')
@section('pageTitle', 'Modification d\'une permission')
@push('css')
<link rel="stylesheet" href="{{ asset('backend/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('backend/css/bootstrap-datetimepicker.min.css') }}">
@endpush

@section('content')
<div class="content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Modification d'une permission</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/" class="breadcrumb-link">Tableau de bord</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/permissions" class="breadcrumb-link">Permissions</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                modifier une permission
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <x-errors my-class="danger"></x-errors>
    
    <div class="row">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group form-float">
                    <div class="col-6 mx-auto">
                        <label class="form-label">Nom de la permission</label>
                        <input name="_method" type="hidden" value="PUT">
                        <input type="text" class="form-control" name="name" value="{{ $permission->name }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="mx-auto">
                        <button type="submit" class="btn btn-warning btn-fill pull-right"><i class="fa fa-fw fa-paper-plane"></i>Modifier</button>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('backend/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/js/moment.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap-datetimepicker.min.js') }}"></script>
@endpush