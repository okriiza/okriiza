@extends('layouts.app')
@section('title')
    Reset Password - Okriiza
@endsection

@section('content')
<section class="section-login">
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 80px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="font-weight-bold mb-5 mt-3 text-center">{{ __('Reset Password') }}</h4>
                        <img src="https://assets.okriiza.my.id/themes/frontend/assets/image/forgot-password.svg" alt="forgot-password" width="100%" height="200">

                        <form method="POST" action="{{ route('password.update') }}" class="form-signin">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-label-group">
                                <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    placeholder="Email address" value="{{ $email ?? old('email') }}" required autofocus autocomplete="email">
                                <label for="email">Email address</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                                <label for="password">Password</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-label-group">
                                <input type="password" name="password_confirmation" id="password-confirm" class="form-control form-control-lg"
                                    placeholder="Confirm Password" required autocomplete="new-password">
                                <label for="password-confirm">Confirm Password</label>
                            </div>
                            <button type="submit" class="btn btn-bg-biru">
                                {{ __('Reset Password') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
