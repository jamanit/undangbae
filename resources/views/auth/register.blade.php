@extends('layouts.app_auth')

@push('title')
    Registration
@endpush

@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary mt-5 radius-10" style="opacity: 0.8;">
                        <div class="card-header">
                            <a href="{{ url('/') }}">
                                <img src="{{ Storage::url($business_profile->logo) }}" alt="logo" width="50" class="rounded">
                            </a>
                            <h3 class="ml-auto">Registration</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="full_name">Full Name</label>
                                        <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" placeholder="Enter Full Name" class="form-control @error('full_name') is-invalid @enderror">
                                        @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="nick_name">Nickname</label>
                                        <input type="text" id="nick_name" name="nick_name" value="{{ old('nick_name') }}" placeholder="Enter Nickname" class="form-control @error('nick_name') is-invalid @enderror" autofocus>
                                        @error('nick_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input type="password" name="password" id="password" placeholder="Enter Pasword" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password-confirm" class="d-block">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password-confirm" placeholder="Confirm Password" class="form-control @error('password_confirmation') is-invalid @enderror" autocomplete="new-password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" id="agree" class="custom-control-input @error('agree') is-invalid @enderror" value="1" {{ old('agree') == '1' ? 'checked' : '' }} required>
                                        <label class="custom-control-label" for="agree">I agree to the terms and conditions.</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Registration
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="mb-4 text-muted text-center">
                            Already have an account? <a href="{{ url('login') }}">login</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
