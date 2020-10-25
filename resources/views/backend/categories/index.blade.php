@extends('layouts.backend.main')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.min.css') }}">
<style type="text/css" layout:fragment="csscustom">
    #tableCategory .actions a:hover,
    #tableCategory .actions a:visited,
    #tableCategory .actions a:link,
    #tableCategory .actions a:active{
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
    
</style>
@endpush


<div class="content">
    
    <x-head-index 
        href1="{{ route('dashboard') }}"
        title1="Liste des categories"
        title2="Dashboard"
        title3="Liste des categories">
    </x-head-index>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Catégories</h6>
            <a href="{{route('categories.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Nouvel categorie
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tableCategory" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Catégorie</th>
                            <th>Slug catégorie</th>
                            <th>Type catégorie</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $categorie)
                        <tr>
                            <td>{{$categorie->name}}</td>
                            <td>{{$categorie->category_slug}}</td>
                            <td>
                                {{$categorie->type->libelle}}
                            </td>
                            <td>
                                @if($categorie->status)
                                    <x-badge type="primary">Disponible</x-badge>
                                @else
                                    <x-badge type="warning">Non-Disponible</x-badge>
                                @endif
                            </td>
                            <td class="actions text-center">
                                <form action="" method="POST">
                                    <a class="mr-3" href="{{route('categories.show',$categorie->id)}}">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                    <a href="{{route('categories.edit',$categorie->id)}}">
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
      var table = $('#tableCategory').DataTable();
  });
</script>
<script>
    //Supprimer un utilisateur avec Ajax
    $(".remove-item").on("click", function() {
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
