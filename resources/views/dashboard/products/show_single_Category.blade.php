@extends('layout.admin')
@section('title', 'Product')
@section('content')

    <div class="main-panel">
        <div class="content">
            <h5 class=" text-head">Product {{ $Category->name }}</h5>
            <div class="container-fluid">
                <div class="row view-single-product">
                    <div class="col-lg-12">

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

                        <div class="d-flex">

                            <div class="form-image">
                                <form id="edit_single_category_img" action="{{ route('edit_single.category') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="image ">
                                        <div class="text-center">
                                            <div class="image-container">
                                                <label for="main-image-upload" class="camera-icon">
                                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                                </label>
                                                <input type="hidden" name="form_type" value="form1">
                                                <input type="hidden" name="id" value="{{ $Category->id }}">
                                                <input type="file" name="image" id="main-image-upload"
                                                    style="display:none;" accept="image/*">
                                                <img id="main-image-preview" src="{{ asset($Category->image) }}"
                                                    alt="Main Image" class="input-img product-image">
                                            </div>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <button type="submit"
                                                class="btn edit-single-category-img btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="product-info">
                                <div class="row">

                                    <div class="col-lg-3 col-sm-12 col-md-6">
                                        <div class="card card-stats card-success">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="icon-big text-center">

                                                            <i style="font-size: 30px"
                                                                class="fa-solid fa-arrow-up-wide-short"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-9 d-flex align-items-center">
                                                        <div class="numbers">
                                                            <p style="font-size: 12px" class="card-category">Total Sales
                                                            </p>
                                                            <h3 style="font-size: 12px" class="card-title">$ 1,345</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12 col-md-6">
                                        <div class="card card-stats card-info">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="icon-big text-center">

                                                            <i style="font-size: 20px" class="fa-solid fa-money-bill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-9 d-flex align-items-center">
                                                        <div class="numbers">
                                                            <p style="font-size: 12px"class="card-category">Total Profit
                                                            </p>
                                                            <h3 style="font-size: 12px" class="card-title">$ 1,345</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12 col-md-6">
                                        <div class="card card-stats card-primary">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="icon-big text-center">
                                                            <i style="font-size: 20px"class="fa-solid fa-cart-shopping"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-9 d-flex align-items-center">
                                                        <div class="numbers">
                                                            <p style="font-size: 12px" class="card-category">Total
                                                                Orders</p>
                                                            <h3 style="font-size: 12px" class="card-title">$ 10.2</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12 col-md-6">
                                        <div class="card card-stats card-danger">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="icon-big text-center">
                                                            <i style="font-size: 20px"
                                                                class="fa-brands fa-product-hunt"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-9 d-flex align-items-center">
                                                        <div class="numbers">
                                                            <p style="font-size: 12px" class="card-category">Available
                                                                Quantity</p>
                                                            <h3 style="font-size: 12px" class="card-title">$
                                                                {{-- {{ $id-> }} --}} 55
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="form">
                                            <form id="edit_single_category" action="{{ route('edit_single.category') }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                <div class="mt-2">
                                                    <label for="name">name</label>
                                                    <input type="text" name="name" value="{{ $Category->name }}"
                                                        class="form-control">
                                                    <input type="hidden" name="form_type" value="form2">
                                                    <input type="hidden" name="id" value="{{ $Category->id }}">
                                                </div>
                                                <div class="mt-2">
                                                    <label for="description">description</label>
                                                    <textarea name="description" class="form-control" id="description" cols="30" rows="2"
                                                        placeholder="description">{{ $Category->description }}</textarea>
                                                </div>

                                                <div class="mt-2">
                                                    <button type="submit"
                                                        class="btn edit-single-category  btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
<style>
    .view-single-product .product-info {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 10px;
        margin-left: 50px
    }

    .view-single-product .image {
        background-color: #fff;
        padding: 10px;
        margin-top: 10px;
    }


    .view-single-product .product-image {
        border-radius: 10px;
        margin-bottom: 20px;
        padding: 15px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        min-width: 50px !important;
        max-height: 120px;
    }

    .btn-edit,
    .btn-delete {
        width: 150px;
        margin-top: 20px;
    }

    .view-single-product .btn-edit {
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    .view-single-product .btn-delete {
        background-color: #dc3545;
        color: #fff;
        border: none;
    }

    .view-single-product h1 {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .view-single-product .total-info p {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .view-single-product .total-info p span {
        font-weight: bold;
        color: #007bff;
    }

    .view-single-product .upload-text {
        display: block;
        text-align: center;
        margin-top: 5px;
        font-size: 12px;
    }

    .view-single-product .image-upload-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        cursor: pointer;
        margin-right: 10px;

    }

    .view-single-product .image-upload-label img {
        display: block;
    }

    .view-single-product .file-name {
        display: block;
        margin-top: 5px;
        text-align: center;
    }

    .view-single-product .upload-image {
        border: 2px solid #ddd;
        border-radius: 5px;
        transition: border-color 0.3s ease;
    }

    .view-single-product .upload-image:hover {
        border-color: #999;
    }

    .view-single-product .image img {
        min-width: 120px;
        max-width: 120px;
    }

    .view-single-product .text-head {
        background-color: #fff;
        padding: 5px;
        border-radius: 5px;
    }

    .view-single-product .image-container {
        position: relative;
        display: inline-block;
    }

    .view-single-product .image-container img {
        display: block;
        width: 100%;
        height: auto;
    }

    .view-single-product .image-container i {
        position: absolute;
        top: 0;
        left: 10%;
        transform: translateX(-50%);
        background-color: rgba(255, 255, 255, 0.7);
        padding: 5px;
        border-radius: 50%;
    }
</style>
