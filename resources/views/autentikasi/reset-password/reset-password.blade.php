@extends('autentikasi.index_login')
@section('content')
    <div class="page login-page">
        <div>

            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto mt-7">
                <div class="text-center">
                    <img src="{{ url('/assets') }}/images/polindra.png" class="header-brand-img img-fluid" alt="Polindra Logo"
                        style="height: 100px; width: auto;">
                    <h1 class="h4 mt-3">Sibatik</h1>
                </div>
            </div>
            <div class="container-login100">
                <div class="row">
                    <div class="col col-login mx-auto">
                        <form action="{{ route('reset-password.process') }}" class="card shadow-none" method="post">
                            @csrf
                            <div class="card-body">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if (session('warning'))
                                    <div class="alert alert-warning">
                                        {{ session('warning') }}
                                    </div>
                                @endif
                                @if (session('danger'))
                                    <div class="alert alert-danger">
                                        {{ session('danger') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="text-center">
                                    <span class="login100-form-title">
                                        Forgot Password
                                    </span>
                                    <p class="text-muted">Masukkan alamat email yang terdaftar di akun Anda</p>
                                </div>
                                <div class="pt-3" id="forgot">
                                    <div class="form-group">
                                        <label class="form-label">E-Mail</label>
                                        <input class="form-control" id="email" name="email"
                                            placeholder="Enter Your Email" type="email" value="{{ old('email') }}">
                                    </div>
                                    <div class="submit">
                                        <button type="submit" class="btn btn-primary d-grid">Submit</button>
                                    </div>
                                    <div class="text-center mt-4">
                                        <p class="text-dark mb-0">Forgot It?<a class="text-primary ms-1"
                                                href="javascript:void(0);">Send me Back</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center my-3">
                                    <a href="" class="social-login  text-center me-4">
                                        <i class="fa fa-google"></i>
                                    </a>
                                    <a href="" class="social-login  text-center me-4">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="" class="social-login  text-center">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
@endsection
