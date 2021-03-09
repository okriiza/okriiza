@extends('layouts.app')

@section('title')
    Login - Okriiza  
@endsection

@section('content')
<section class="section-login">
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body align-items-center">
                        <div class="text-center">
                            <img src="https://assets.okriiza.my.id/themes/frontend/assets/image/logo2.png" width="100" height="100" alt="Logo Okriiza"
                                loading="lazy">
                            <p class="text-welcome mt-4">Welcome Back!</p>
                        </div>
                        
                        <form action="{{ route('login') }}" method="POST" class="form-signin">
                            @csrf
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    placeholder="Email address" value="{{ old('email') }}" required autofocus>
                                <label for="inputEmail">Email address</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-label-group">
                                <input type="password" name="password" id="inputPassword" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between mb-3" style="font-size: 12px">
                                {{-- <span>Don't have an account?</span>
                                <span>Forgot Your Password?</span> --}}

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class=" text-dark underline"><span>Don't have an account?</span></a>
                                @endif
                                @if (Route::has('password.request'))
                                    <a class="text-dark" href="{{ route('password.request') }}">
                                        <Span> Forgot Your Password?</Span>
                                    </a>
                                @endif
                            </div>
    
                            <button type="submit" class="mx-auto btn btn-lg btn-bg-biru btn-block">Login</button>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
