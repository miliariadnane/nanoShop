@extends('layouts.backend.main')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.min.css') }}">
<style type="text/css" layout:fragment="csscustom">
    #tableType .actions a:hover,
    #tableType .actions a:visited,
    #tableType .actions a:link,
    #tableType .actions a:active{
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
        title1="Liste des types de cotegories"
        title2="Dashboard"
        title3="Listes des types">
    </x-head-index>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Rôles</h6>
            <a href="{{route('types.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Ajouter un type de categorie
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-border table-striped custom-table mb-0" id="tableType">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Type</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($types as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->libelle }}</td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('types.edit',$type->id)}}"><i class="fa fa-pencil m-r-5"></i> Editer</a>
                                        <a class="dropdown-item removedType" href="#" data-toggle="modal" data-target="#delete_permission" data-id="{{ $type->id }}"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="delete_permission" class="modal fade Supprimer-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{ asset('backend/img/sent.png') }}" alt="" width="50" height="46">
                <h3>Voulez-vous vraiment supprimer ce type de catégorie ?</h3>
                <div class="m-t-20">
                <form method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <a href="#" class="btn btn-white" data-dismiss="modal">Annuler</a>
                    <button type="button" class="btn btn-danger" id="removedType">Supprimer</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>
    var id_type;
    $(document).on('click', '.removedType', function() {
        id_type = $(this).data('id');
    });
    $(document).on('click', '#removedType', function() {
        let formDelete = this.parentElement;
        let url = 'types/'+id_type;
        formDelete.action = url;
        formDelete.submit();
    });
</script>
<script type="text/javascript">
    $(function () {
      var table = $('#tableType').DataTable();
  });
</script>
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush
