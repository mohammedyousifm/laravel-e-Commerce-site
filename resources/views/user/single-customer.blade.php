@extends('layout.admin')
@section('title', 'customers')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title">Customer</h4>
                <div class="container-xl px-4 mt-4">
                    =

                    <div class="row">
                        <div class="col-xl-7">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">
                                    <form>
                                        <!-- Form Group (username)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputUsername">Username (how your name will
                                                appear to other users on the site)</label>
                                            <input class="form-control" id="inputUsername" type="text"
                                                placeholder="Enter your username" value="******">
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputFirstName">First name</label>
                                                <input class="form-control" id="inputFirstName" type="text"
                                                    placeholder="Enter your first name" value="Valerie">
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Last name</label>
                                                <input class="form-control" id="inputLastName" type="text"
                                                    placeholder="Enter your last name" value="Luna">
                                            </div>
                                        </div>
                                        <!-- Form Row        -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (organization name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputOrgName">Organization name</label>
                                                <input class="form-control" id="inputOrgName" type="text"
                                                    placeholder="Enter your organization name" value="Start Bootstrap">
                                            </div>
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLocation">Location</label>
                                                <input class="form-control" id="inputLocation" type="text"
                                                    placeholder="Enter your location" value="San Francisco, CA">
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                            <input class="form-control" id="inputEmailAddress" type="email"
                                                placeholder="Enter your email address" value="{{ $user->email }}">
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (phone number)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                                <input class="form-control" id="inputPhone" type="tel"
                                                    placeholder="Enter your phone number" value="555-123-4567">
                                            </div>
                                            <!-- Form Group (birthday)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                                <input class="form-control" id="inputBirthday" type="text"
                                                    name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">

                            <div class="row">
                                <div class="col-lg-5 col-sm-12 col-md-6">
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
                                <div class="col-lg-5 col-sm-12 col-md-6">
                                    <div class="card card-stats card-primary">
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
                                <div class="col-lg-5 col-sm-12 col-md-6">
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
                                <div class="col-lg-5 col-sm-12 col-md-6">
                                    <div class="card card-stats card-danger">
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
                                                        <p style="font-size: 12px" class="card-category">Last Payment
                                                        </p>
                                                        <h3 style="font-size: 12px" class="card-title">$1,345</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="table-responsive">
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

                                </tr>
                                <tr class="warning no-result">
                                    <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>

</style>
