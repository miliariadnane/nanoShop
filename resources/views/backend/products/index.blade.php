@extends('layouts.backend.main')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.min.css') }}">
<style type="text/css" layout:fragment="csscustom">
    #tableProducts .actions a:hover,
    #tableProducts .actions a:visited,
    #tableProducts .actions a:link,
    #tableProducts .actions a:active{
        text-decoration: none;
    }
    .remove-item{
        cursor: pointer;
    }
</style>
@endpush


<div class="content">

    <x-head-index 
        href1="{{ route('dashboard') }}"
        title1="Liste des produits"
        title2="Dashboard"
        title3="Liste des produits">
    </x-head-index>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Produits</h6>
            <a href="{{route('products.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Nouvel produit
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tableProducts" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom produit</th>
                            <th>Catégorie</th>
                            <th>Type</th>
                            <th>Quantité</th>
                            <th>prix</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->category->type->libelle}}</td>
                            <td>{{$product->product_quantity}}</td>
                            <td>{{$product->sale_price}} Dhs</td>
                            <td>
                                @if($product->status)
                                    <x-badge type="success">Activer</x-badge>
                                @else
                                    <x-badge type="danger">Désactiver</x-badge>
                                @endif
                            </td>
                            <td class="actions text-center">
                                <form action="" method="POST">
                                    <a class="mr-3" href="{{route('products.show',$product->id)}}">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                    <a href="{{route('products.edit',$product->id)}}">
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
      var table = $('#tableProducts').DataTable();
  });
</script>
<script>
    //Supprimer un utilisateur avec Ajax
    $(".remove-item").on("click", function() {
        swal({
            title: 'Etes vous sûr?',
            text: "De supprimer ce produit ?",
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
