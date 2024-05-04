@extends('layout.website')

@section('content')
    <!-- breadcrumb-section -->
    {{-- <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>NEW AND ORGANIC</p>
                        <h1>user account</h1>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid profile">
        <div class="container">
            <div class="user-account">
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
                <div class="main-body">
                    <h4 class="page-title">my profile</h4>
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column">
                                        <div class="profile-img">
                                            <h4 class=""><img src="{{ asset('assets/img/profile-pic.svg') }}"
                                                    alt="">
                                                {{ auth()->user()->name }}
                                            </h4>
                                            <hr class="dropdown-divider">
                                        </div>
                                        <div class="mt-3">
                                            <h6><a href=""><i class="fa-solid fa-cart-shopping"></i> My order</a>
                                            </h6>
                                            <hr class="dropdown-divider">
                                        </div>
                                        <div class="mt-3 account-settings">
                                            <h6><a href=""><i class="fa-solid fa-user"></i> Account Settings</a></a>
                                            </h6>
                                            <ul>
                                                <li>
                                                    <a href=""> Profile Information</a>
                                                </li>
                                                <li>
                                                    <a class="show-manage-addresses"> Manage Addresses</a>
                                                </li>
                                            </ul>
                                            <hr class="dropdown-divider">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-8 profile-information">
                            <h6>Profile Information</h6>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h5>Personal Information <span class="edit">Edit</span></h5>
                                            <form action="">
                                                <div class="mt-2">
                                                    <input type="text" value="{{ Auth::user()->name }}"
                                                        class="form-control p-4" readonly>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h5>Email Address <span class="edit">Edit</span></h5>
                                            <form action="">
                                                <div class="mt-2">
                                                    <input type="text" value="{{ Auth::user()->email }}"
                                                        class="form-control p-4" readonly>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h5>Mobile Number <span class="edit">Edit</span></h5>
                                            <form action="">
                                                <div class="mt-2">
                                                    <input type="text" value="{{ Auth::user()->email }}"
                                                        class="form-control p-4" readonly>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 manage-addresses">

                            <h6>Manage Addresses</h6>
                            <div class="card p-3">
                                <h6 class="add-new-addresses"><i class="fa-solid fa-plus" style="font-size: 20px"></i> Add a
                                    New Address</h6>
                            </div>

                            <div class="new-addresses">
                                <div class="card mt-2  p-3 ">
                                    <form action="{{ route('update.address') }}" method="POST">
                                        @csrf
                                        <h4>Add a New Address</h4>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name">
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="pincode">Pincode</label>
                                                <input type="text" name="pincode" class="form-control" id="pincode">
                                            </div>
                                            <input type="text" name="user_id" value="{{ $user_address_id }}" hidden>
                                            <div class="form-group col-md-6">
                                                <label for="state">State</label>
                                                <select id="state" class="form-control" name="state">
                                                    <option selected>Khartoum</option>
                                                    <option>Port Sudan</option>
                                                    <option>Khartoum North</option>
                                                    <option>El Obeid</option>
                                                    <option>Kosti</option>
                                                    <option>Nyala</option>
                                                    <option>Kassala</option>
                                                    <option>Shendi</option>
                                                    <option>Omdurman</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address (Area and Street)</label>
                                            <input type="text" name="address" class="form-control" id="address">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone Number </label>
                                            <input type="text" name="phonenumber" class="form-control" id="phone">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="state">Address Type</label>
                                            <select id="state" class="form-control" name="address_type">
                                                <option selected>Home</option>
                                                <option>work</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary mr-2">Save</button>
                                            <button type="button" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </form>
                                </div>

                            </div>


                            @foreach ($user_address as $item)
                                <div class="card mt-2 p-3">
                                    <span class="name-addresses text-center  mt-2 mb-3">{{ $item->address_type }}</span>
                                    <div class="d-flex">
                                        <h6><span>{{ $item->name }}</span> {{ $item->phonenumber }}</h6>
                                        <i class="fa-solid edit-icon mr-2 fa-ellipsis-vertical"></i>
                                    </div>
                                    <p><span>{{ $item->address }}</span>,
                                        <span>{{ $item->state }}</span> -
                                        <span>{{ $item->pincode }}</span>
                                    </p>
                                </div>
                            @endforeach

                            <div class="edit-address">
                                <div class="card mt-2  p-3 ">
                                    <form action="{{ route('update.address') }}" method="POST">
                                        @csrf
                                        <h4>Edit a New Address</h4>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                value="{{ $name }}">
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="pincode">Pincode</label>
                                                <input type="text" name="pincode" class="form-control" id="pincode"
                                                    value="{{ $pincode }}">
                                            </div>
                                            <input type="text" name="user_id" value="{{ $user_address_id }}" hidden>
                                            <div class="form-group col-md-6">
                                                <label for="state">State</label>
                                                <select id="state" class="form-control" name="state">
                                                    <option selected>{{ $state }}</option>
                                                    <option>Khartoum</option>
                                                    <option>Port Sudan</option>
                                                    <option>Khartoum North</option>
                                                    <option>El Obeid</option>
                                                    <option>Kosti</option>
                                                    <option>Nyala</option>
                                                    <option>Kassala</option>
                                                    <option>Shendi</option>
                                                    <option>Omdurman</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address (Area and Street)</label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                value="{{ $address }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone Number </label>
                                            <input type="text" name="phonenumber" class="form-control" id="phone"
                                                value="{{ $phonenumber }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="state">Address Type</label>
                                            <select id="state" class="form-control" name="address_type">
                                                <option selected>{{ $address_type }}</option>
                                                <option>work</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary mr-2">Save</button>
                                            <button type="button" class="btn btn-secondary">Cancel</button>
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
@endsection

<style>
    .user-account {
        padding-top: 10rem;
    }

    #sticker {
        background-color: rgb(4, 4, 4);
    }

    .profile .edit {
        color: #0800ff;
    }

    .profile a {
        color: #000000;
    }


    .account-settings ul li {
        list-style-type: none;
    }

    .profile-img {
        box-shadow: 0px 0px 3px black;
        border-radius: 5px;
        padding: 5px;
    }

    .profile-information {
        display: none;
    }

    .new-addresses {
        display: none;
    }

    .edit-address {
        display: none;
    }

    .add-new-addresses {
        cursor: pointer;
    }

    .manage-addresses .edit-icon {
        position: absolute;
        font-size: 20px;
        cursor: pointer;
        right: 0;
    }

    .manage-addresses .name-addresses {
        background-color: #ecc100;
        width: 50px;
        border-radius: 5px;
    }

    .profile .main-body {
        padding: 15px;
    }

    .profile .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .profile .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .profile .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .profile .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .profile .gutters-sm>.col,
    .profile .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .profile .mb-3,
    .profile .my-3 {
        margin-bottom: 1rem !important;
    }

    .profile .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .profile .h-100 {
        height: 100% !important;
    }

    .profile .shadow-none {
        box-shadow: none !important;
    }
</style>
