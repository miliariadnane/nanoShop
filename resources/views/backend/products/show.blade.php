@extends('layouts.backend.main')
@section('content')
@push('css')

<style>
    .status-danger{
        border: 1px solid #ea9d28;
        padding: 5px 10px;
        border-radius: 5px;
        color: #ea9d28;
    }
    .status-success{
        border: 1px solid #23ce57;
        padding: 5px 10px;
        border-radius: 5px;
        color: #28a745;
    }
    .badge > a {
        color: #fff;
    }
    ..avatar {
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
                                <a href="{{ route('products.index') }}" class="breadcrumb-link">Produits</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Détail du produit
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
                    <h6 class="m-0 font-weight-bold text-primary">{{$product->name}}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Action:</div>
                            <form action="" method="POST">
                            <a class="dropdown-item" href="{{route('products.edit',$product->id)}}">Modifier</a>
                            <span class="dropdown-item" id="remove-user">Supprimer</span>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @if($product->image_product && file_exists('storage/'.$product->image->url()))
                            <img alt="" src="{{ $product->image->url() }}" height="350px" class="card-img-top">
                            @else
                            <img alt="" src="/admin/img/product.png" height="350px" class="card-img-top">
                            @endif
                        </div>
                        <div class="col-12 mt-2">
                            <ul class="list-group text-center">
                                <li class="list-group-item list-group-item-primary mt-4">
                                    <h6 class="text-dark">Catégorie</h6>
                                    <h4 class="font-weight-bold">
                                        {{$product->category->name}}
                                    </h4>
                                </li>
                                <li class="list-group-item list-group-item-secondary mt-3">
                                    <h6 class="text-dark">Type catégorie</h6>
                                    <h4 class="font-weight-bold">
                                        {{$product->category->type->libelle}}
                                    </h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 order-sm-2">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Plus de détails</h6>
                    @if($product->status)
                    <span class="d-none d-sm-inline-block status-success" target="_blank">
                        Disponible
                    </span>
                    @else
                    <span class="d-none d-sm-inline-block status-danger" target="_blank">
                        Non disponible
                    </span>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 bg-light p-2 rounded">
                            <span class="font-weight-bold h5 text-dark">
                                {{ $product->meta_title }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            {{ $product->meta_description }}
                        </div>
                    </div>
                    <hr class="sidebar-divider">
                    <div class="row">
                        <div class="col-xl-12 bg-light p-2 rounded mb-2">
                            <span class="font-weight-bold h5 text-dark">
                                Tags
                            </span>
                        </div>
                        <div class="col-xl-12 my-auto">
                            <x-tags :tags="$product->tags"></x-tags>
                        </div>
                    </div>
                    <hr class="sidebar-divider">
                    <div class="row">
                        <div class="col-xl-6 my-3">
                            <div class="row">
                                <div class="col-xl-6 bg-light p-2 rounded">
                                    <span class="font-weight-bold h5 text-dark">
                                        Quantité produit
                                    </span>
                                </div>
                                <div class="col-xl-6 my-auto">
                                    <span class="text">{{ $product->product_quantity }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 my-3">
                            <div class="row">
                                <div class="col-xl-6 bg-light p-2 rounded">
                                    <span class="font-weight-bold h5 text-dark">
                                        Unité
                                    </span>
                                </div>
                                <div class="col-xl-6 my-auto">
                                    <span class="text">{{ $product->unit }}</span>
                                </div>
                            </div>
                        </div>
                        <hr class="sidebar-divider">
                        <div class="col-xl-6 my-3">
                            <div class="row">
                                <div class="col-xl-6 bg-light p-2 rounded">
                                    <span class="font-weight-bold h5 text-dark">
                                        Prix produit
                                    </span>
                                </div>
                                <div class="col-xl-6 my-auto">
                                    <span class="text">{{ $product->price }} Dhs</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 my-3">
                            <div class="row">
                                <div class="col-xl-6 bg-light p-2 rounded">
                                    <span class="font-weight-bold h5 text-dark">
                                        Prix de vente
                                    </span>
                                </div>
                                <div class="col-xl-6 my-auto">
                                    <span class="text">{{ $product->sale_price }} Dhs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="row">
                    <div class="col my-3">
                        <h5 class="font-weight-bold text-white p-3" style="background-color: #23ce57; margin-left:2%; margin-right:2%">
                        Détails
                        </h5>
                        <div class="border rounded text-dark p-2" style="margin-left:2%; margin-right:2%">
                            {{ $product->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header align-items-center">
                    <h6 class="badge badge-primary p-3">Comments</h6>
    
                    <x-comment-form :action="route('products.comments.store', ['product' => $product->id])"></x-comment-form>
                    
                    <hr>
                    <div class="row border border-secondary rounded">
                        <div class="col-10 mx-auto">
                            <x-comment-list :comments="$product->comments"></x-comment-list>
                        </div>
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
