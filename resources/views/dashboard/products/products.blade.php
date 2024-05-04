@extends('layout.admin')
@section('title', 'Products')
@section('content')

    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h3>Proudacts</h3>
                <div class="row">
                    <div class="col-lg-12">
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
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">Add
                                    Product</button>
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
                        <span class="counter pull-right"></span>
                        <div class="table-responsive table-show-data">
                            <table
                                class="table table-hover table-bordered results  project-list-table table-nowrap align-middle table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col" class="ps-4" style="width: 50px;">
                                            <div class="form-check font-size-16"><input type="checkbox"
                                                    class="form-check-input" id="contacusercheck" /><label
                                                    class="form-check-label" for="contacusercheck"></label>
                                            </div>
                                        </th>
                                        <th scope="col">Name</th>
                                        <th scope="col">price</th>
                                        <th scope="col">Available Quantity</th>
                                        <th scope="col">description</th>
                                        <th scope="col">Main Image</th>
                                        <th scope="col">Additional Image</th>
                                        <th scope="col">Creation Date</th>
                                        <th scope="col">Last Updated</th>
                                        <th scope="col" style="width: 50px;">View</th>
                                        <th scope="col" style="width: 50px;">Delete</th>

                                    </tr>
                                    <tr class="warning no-result">
                                        <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($product->isEmpty())
                                        <td colspan="11">
                                            <h5 class=" text-center p-5 primary">no data to show <br> <br>
                                                <img style="width: 100px" src="{{ asset('assets/img/empty-18.png') }}"
                                                    loading="lazy" alt="">
                                            </h5>
                                        </td>
                                    @else
                                        @foreach ($product as $prodkind)
                                            <tr class="product-row" data-product-id="{{ $prodkind->id }}">
                                                <th scope="row" class="ps-2">{{ $prodkind->id }}</th>
                                                <td>{{ $prodkind->name }}</td>
                                                <td class="text-center">{{ $prodkind->price }}</td>
                                                <td class="text-center">{{ $prodkind->available_Quantity }}</td>
                                                <td class="description">
                                                    <span class="short-text">{{ $prodkind->description }}</span>
                                                    <span class="full-text">{{ $prodkind->description }}</span>
                                                </td>
                                                <td class="text-center"><img class="show_image"
                                                        src="{{ asset($prodkind->main_image) }}" loading="lazy"
                                                        alt="img">
                                                </td>
                                                <td class="text-center"><img class="show_image"
                                                        src="{{ asset($prodkind->additional_image) }}" loading="lazy"
                                                        alt="img">
                                                </td>

                                                <td>{{ \Carbon\Carbon::parse($prodkind->created_at)->format('Y-M') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($prodkind->updated_at)->format('Y-M') }}</td>
                                                <td><a class="btn btn-primary"
                                                        href="{{ route('view.product', $prodkind->id) }}"><i
                                                            class="fa-solid fa-eye"></i></a></td>
                                                <td><button class="btn dele-single-product btn-danger"
                                                        data-delete-single="{{ $prodkind->id }}"><i
                                                            class="fa-solid fa-trash-can"></i></button></td>


                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- add Modal -->
                <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title fs-5" id="exampleModalLabel">Add Product</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="add_single_products" action="{{ route('add.product') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2">
                                        <input type="hidden" name="prod_type" class="form-control" id="type"
                                            value="{{ $prod_id }}" placeholder="link">

                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" name="Available_Quantity" class="form-control"
                                            id="name" placeholder="Available Quantity">
                                    </div>

                                    <div class="mb-3">
                                        <input type="number" name="price" class="form-control" id="price"
                                            placeholder="price">
                                    </div>

                                    <div class="mb-3">
                                        <textarea name="description" class="form-control" id="description" cols="30" rows="3"
                                            placeholder="description"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Main_image">Min Image</label>
                                        <input type="file" name="Main_image" accept="image/*" class="form-control"
                                            id="image" placeholder="Main Image">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Additional_image">Additional Image</label>
                                        <input type="file" name="Additional_image" accept="image/*"
                                            class="form-control" id="image_2" placeholder="Additional Image">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn add-single-product btn-primary">Add
                                            Product</button>
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
