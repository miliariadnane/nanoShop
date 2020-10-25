@extends('layouts.backend.main')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.min.css') }}">
<style type="text/css" layout:fragment="csscustom">
    #tableUsers .actions a:hover,
    #tableUsers .actions a:visited,
    #tableUsers .actions a:link,
    #tableUsers .actions a:active{
        text-decoration: none;
    }
    .remove-item{
        cursor: pointer;
    }
    .roles{
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .roles li{
        margin-bottom: 5px;
        text-align: center;
    }
    
    .avatar {
	background-color: #aaa;
	border-radius: 50%;
	color: #fff;
	display: inline-block;
	font-weight: 500;
	height: 38px;
	line-height: 38px;
	margin: 0 10px 0 0;
	overflow: hidden;
	text-align: center;
	text-decoration: none;
	text-transform: uppercase;
	vertical-align: middle;
	width: 38px;
	position: relative;
	white-space: nowrap;
    }
    .avatar:hover {
        color: #fff;
    }
    .avatar > img {
        width: 100%;
        display: block;
        height: 100%;
    }
</style>
@endpush


<div class="content">
   
    <x-head-index 
        href1="{{ route('dashboard') }}"
        title1="Liste des utilisateurs"
        title2="Dashboard"
        title3="Liste des utilisateurs">
    </x-head-index>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Utilisateurs</h6>
            <a href="{{route('users.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Nouvel utilisateur
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tableUser" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom & Prenom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                            <a href="{{route('users.show',$user->id)}}">
                                @if($user->avatar && file_exists('storage/'.$user->avatar))
                                <img alt="" class="avatar" src="{{ asset('storage/'.$user->avatar) }}">
                                @else
                                <img alt="" class="avatar" src="admin/img/user.jpg" >
                                @endif
                            </a>
                            {{ucfirst($user->lastName). " ".$user->firstName }}
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phoneNumber}}</td>
                            <td>
                                @foreach($user->roles()->pluck('name') as $role)                  
                                <ul>
                                    <li style="list-style: none;">{{ $role }}</li>
                                </ul>
                                @endforeach
                            </td>
                            <td>
                                @if($user->status)
                                    <x-badge type="success">Activer</x-badge>
                                @else
                                    <x-badge type="danger">Désactiver</x-badge>
                                @endif
                            </td>
                            <td class="actions text-center">
                                <form action="" method="POST">
                                    <a class="mr-3" href="{{route('users.show',$user->id)}}">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                    <a href="{{route('users.edit',$user->id)}}">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </a>
                                    <span class="btn remove-item">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </span>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
      var table = $('#tableUser').DataTable();
  });
</script>
<script>
    //Supprimer un utilisateur avec Ajax
    $(".remove-item").on("click", function() {
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
