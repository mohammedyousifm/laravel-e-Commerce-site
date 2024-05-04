@extends('layout.admin')
@section('title', 'Products')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title">Categories </h4>
                <div class="d-flex">
                    <div class="mr-5">
                        <div style="position: relative;">
                            <input style="border: 2px solid blue; padding-right: 30px;" type="text"
                                class="search form-control">
                            <i style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"
                                class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>

                    <div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProducts">Add
                            Category</button>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-praimery">{{ session('error') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row mt-5 text-center">
                    @foreach ($products as $prod)
                        <div class="col-md-2 mt-2">

                            <style>
                                .Cate-change-img {
                                    position: absolute;
                                    cursor: pointer;
                                    color: white;
                                    top: 2%;
                                    left: 10%;
                                    font-size: 25px;
                                }
                            </style>
                            <div class="bodycard card-prod bg-primary">
                                <h6 class="text-light pt-1">{{ $prod->name }}</h6><br>
                                <a href="{{ route('show_single.category', $prod->id) }}"><i
                                        class="fa-solid Cate-change-img fa-pen-to-square"></i></a>
                                <img class="btn-img" src="{{ asset($prod->image) }}" alt="" loading="lazy">
                                <hr>
                                <div class="text-center">
                                    <button class="btn delete-product btn-danger"
                                        data-product-id="{{ $prod->id }}">Delete</button>
                                    <a href="{{ route('view.single.product', $prod->id) }}"><button
                                            class="btn btn-success">View</button></a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

                <!-- add Modal -->
                <div class="modal fade" id="addProducts" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fs-5" id="exampleModalLabel">Add Categories </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="add_products" action="{{ route('add.products') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="name">
                                    </div>
                                    <div class="mb-3">
                                        <textarea name="description" class="form-control" id="description" cols="30" rows="3"
                                            placeholder="description"></textarea>
                                    </div>
                                    <div class="mb-3 img">
                                        <label for="Main_image">Min Image</label>
                                        <input type="file" name="Main_image" accept="image/*" class="form-control"
                                            id="image" placeholder="Main Image">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn add-product btn-primary">add Category </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


<style>
    .btn-img {
        border-radius: 10px;
        max-width: 80px;
        min-width: 80px;
        max-height: 80px;
        min-height: 80px;
    }

    .card-prod {
        border-radius: 10px;
        padding: 10px;
    }

    .fa-add {
        font-size: 80px
    }

    #image {
        background-color: rgb(239, 239, 239);
        border: none;
    }
</style>
