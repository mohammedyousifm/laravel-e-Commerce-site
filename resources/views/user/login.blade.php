@extends('layout.website')
@section('title', 'login in')

@section('content')
    <div class="container p-5">
        <h3 class="text-center">Seal Tech Store</h3>
        <div class="row">
            <div class="col-md-6 mb-5 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Sign in</h4>
                    </div>
                    <div class="card-body">
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
                        <form class="" action="{{ route('login.DB') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter your own email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter your password ">
                            </div>
                            <button type="submit" class="btn btn-button btn-primary">Submit</button>
                            <div class="mt-3">
                                <p class="" style="font-size: 12px">if you don't have account ? <a
                                        href="{{ route('register.index') }}">clik here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .top-header-area {
        display: none !important;
    }

    .footer-area,
    .copyright {
        display: none !important;
    }
</style>
