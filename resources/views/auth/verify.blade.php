@extends('layouts.app')
@section('title')
Verify Your Email Address - Okriiza
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 80px">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-5 font-weight-bold">{{ __('Verify Your Email Address') }}</h4>
                    <img src="https://assets.okriiza.my.id/themes/frontend/assets/image/mail.svg" alt="email" width="100%" height="200" class="mb-5">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
