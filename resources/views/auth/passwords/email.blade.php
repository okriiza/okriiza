@extends('layouts.app')
@section('title')
Reset Password - Okriiza
@endsection
@section('content')
<section class="section-login">
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 80px">
            <div class="col-md-6">
                <div class="card bordered">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4 class="font-weight-bold mb-5 mt-3 text-center">{{ __('Reset Password') }}</h4>
                        <img src="{{ url('themes/frontend/assets/image/forgot-password.svg') }}" alt="forgot-password" width="100%" height="200" class="mb-3">
                        
                        <form method="POST" action="{{ route('password.email') }}" class="form-signin">
                            @csrf
                            <div class="form-group row">
                                <div class="col">
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            placeholder="Email address" value="{{ old('email') }}" required autofocus autocomplete="email">
                                        <label for="inputEmail">Email address</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-bg-biru">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
