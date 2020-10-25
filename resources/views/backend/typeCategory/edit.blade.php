@extends('layouts.backend.main')
@section('pageTitle', 'Modification d\'une permission')

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
            <form action="{{ route('types.update', $type->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('backend.typeCategory._form')

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