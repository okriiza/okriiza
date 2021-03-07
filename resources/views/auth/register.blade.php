@extends('layouts.app')

@section('title')
    Login — Okriiza  
@endsection

@section('content')

<section class="section-login">
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body align-items-center">
                        <div class="text-center">
                            <img src="{{ url('themes/frontend/assets/image/logo2.png') }}" width="100" height="100" alt="Logo Okriiza"
                                loading="lazy">
                            <p class="text-welcome mt-4">Welcome Back!</p>
                        </div>
                        
                        <form action="{{ route('register') }}" method="POST" class="form-signin">
                            @csrf
                            <div class="form-label-group">
                                <input type="text" id="name" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    placeholder="Name" value="{{ old('name') }}" required autofocus>
                                <label for="name">Name</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="username" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror"
                                    placeholder="Email address" value="{{ old('username') }}" required autofocus>
                                <label for="username">Username</label>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-label-group">
                                <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    placeholder="Email address" value="{{ old('email') }}" required autofocus>
                                <label for="email">Email address</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-label-group">
                                <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-label-group">
                                <input type="password" name="password_confirmation" id="password-confirm" class="form-control form-control-lg"
                                    placeholder="Confirm Password" required>
                                <label for="password-confirm">Confirm Password</label>
                            </div>
    
                            <button type="submit" class="mx-auto btn btn-lg btn-bg-biru btn-block">Register</button>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection