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
                                <a href="{{ route('users.index') }}" class="breadcrumb-link">Utilisateurs</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Profil utilisateur
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ucfirst($user->lastName). " ".$user->firstName }}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Action:</div>
                            <form action="" method="POST">
                            <a class="dropdown-item" href="{{route('users.edit',$user->id)}}">Modifier</a>
                            <span class="dropdown-item" id="remove-user">Supprimer</span>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @if($user->avatar && file_exists('storage/'.$user->avatar))
                            <img alt="" src="{{ asset('storage/'.$user->avatar) }}" height="350px" class="card-img-top">
                            @else
                            <img alt="" src="/admin/img/user-06.jpg" height="350px" class="card-img-top">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 order-sm-2">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Plus de détails</h6>
                    @if($user->status)
                    <span class="d-none d-sm-inline-block status-success" target="_blank">
                    Activé</span>
                    @else
                    <span class="d-none d-sm-inline-block status-danger" target="_blank">
                    Désactivé</span>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 my-3">
                            <div class="row">
                                <div class="col-xl-6 bg-light p-2 rounded">
                                    <span class="font-weight-bold h5 text-dark">
                                        Nom
                                    </span>
                                </div>
                                <div class="col-xl-6 my-auto">
                                    <span class="text">{{ $user->lastName }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 my-3">
                            <div class="row">
                                <div class="col-xl-6 bg-light p-2 rounded">
                                    <span class="font-weight-bold h5 text-dark">
                                        Prénom
                                    </span>
                                </div>
                                <div class="col-xl-6 my-auto">
                                    <span class="text">{{ $user->firstName }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 my-3">
                            <div class="row">
                                <div class="col-xl-6 bg-light p-2 rounded">
                                    <span class="font-weight-bold h5 text-dark">
                                        Date Naissance
                                    </span>
                                </div>
                                <div class="col-xl-6 my-auto">
                                    <span class="text">{{ $user->birthDate }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 my-3">
                            <div class="row">
                                <div class="col-xl-6 bg-light p-2 rounded">
                                    <span class="font-weight-bold h5 text-dark">
                                        Genre
                                    </span>
                                </div>
                                <div class="col-xl-6 my-auto">
                                    <span class="text">
                                        @if($user->sexe == "H")
                                        Homme
                                        @else
                                        Femme
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 my-3">
                            <div class="row">
                                <div class="col-xl-6 bg-light p-2 rounded">
                                    <span class="font-weight-bold h5 text-dark">
                                        Téléphone
                                    </span>
                                </div>
                                <div class="col-xl-6 my-auto">
                                    <span class="text">{{ $user->phoneNumber }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 my-3">
                            <div class="row">
                                <div class="col-xl-6 bg-light p-2 rounded">
                                    <span class="font-weight-bold h5 text-dark">
                                        Email
                                    </span>
                                </div>
                                <div class="col-xl-6 my-auto">
                                    <span class="text">
                                        <a href="mailto:{{ $user->email }}">
                                            {{ $user->email }}
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-xl-3 bg-light p-2 rounded">
                                    <span class="font-weight-bold h5 text-dark">
                                        Adresse
                                    </span>
                                </div>
                                <div class="col-xl-9 my-auto">
                                    @if($user->address)
                                        {{ $user->address }}
                                    @else
                                        ---
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    <div class="row">
                        <div class="col my-3">
                            <h5 class="font-weight-bold bg-info text-white p-3">
                            Roles
                            </h5>
                            <div class="border rounded text-dark p-2">
                                @foreach($user->roles()->pluck('name') as $role)                  
                                <ul>
                                    <li>{{ $role }}</li>
                                </ul>
                                @endforeach
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
            text: "De supprimer ce utilisateur ?",
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
