@extends('layout.admin')
@section('title', 'customers')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title">Customers</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex">
                            <div class="mr-5">
                                <div style="position: relative;">
                                    <input style="border: 2px solid blue; padding-right: 30px;" type="text"
                                        class="search form-control" placeholder="Search customers..">
                                    <i style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"
                                        class="fa-solid fa-magnifying-glass"></i>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary">Add admin</button>
                            </div>
                        </div>
                        <span class="counter pull-right"></span>
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
                                        <th scope="col">Name</th>

                                        <th scope="col">Email</th>
                                        <th scope="col">Position</th>
                                        <th scope="col">created at</th>
                                        <th scope="col">Last login</th>
                                        <th scope="col" style="width: 50px;">View</th>
                                        <th scope="col" style="width: 50px;">Delete</th>
                                        <th scope="col" style="width: 50px;">Message</th>


                                    </tr>
                                    <tr class="warning no-result">
                                        <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <th scope="row" class="ps-4">{{ $customer->id }}
                                                <div class="form-check font-size-16"><input type="checkbox"
                                                        class="form-check-input" id="contacusercheck1" /><label
                                                        class="form-check-label" for="contacusercheck1"></label></div>
                                            </th>
                                            <td>
                                                <i class="fa fa-user" style="font-size: 20px"></i>
                                                {{ $customer->name }}s
                                            </td>

                                            </td>
                                            <td>{{ $customer->email }}</td>
                                            <td><span class="badge badge-soft-success mb-0">{{ $customer->position }}</span>
                                            <td>{{ \carbon\carbon::parse($customer->created_at)->format('Y-M') }}</td>
                                            <td>{{ \carbon\carbon::parse($customer->updated_at)->format('Y-M') }}</td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ route('single.customer', $customer->id) }}"><i
                                                        class="fa-solid fa-eye"></i></a></td>
                                            <td><a class="btn btn-danger" href=""><i
                                                        class="fa-solid fa-trash-can"></i></a></td>
                                            <td><a class="btn btn-success" href=""><i
                                                        class="fa-solid fa-message"></i></a></td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .results tr[visible='false'],
    .no-result {
        display: none;
    }

    .results tr[visible='true'] {
        display: table-row;
    }

    .counter {
        padding: 8px;
        color: #ccc;
    }
</style>
