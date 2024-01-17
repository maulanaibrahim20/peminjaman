@extends('superadmin.dashboard')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Create Admin</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Admin</li>
            </ol>
        </div>
    </div>
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ url('/superadmin/create/admin') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Nama Admin</label>
                        <input type="text" name="name" class="form-control" id="validationCustom01" value=""
                            placeholder="asd" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Email</label>
                        <input type="email" name="email" class="form-control" id="validationCustom02" value=""
                            placeholder="asd@mail.com" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Password</label>
                        <input type="password" name="password" class="form-control" id="validationCustom02" value=""
                            placeholder="asddd" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    {{-- <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Posisi</label>
                        <input type="password" name="position" class="form-control" id="validationCustom02" value=""
                            placeholder="asddd" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div> --}}
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ url('/superadmin/create/admin') }}" type="submit" class="btn btn-warning"><i
                                    class="fa fa-arrow-left"></i>Back</a>
                            <button type="submit" class="btn btn-primary ms-2">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
