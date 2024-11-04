@extends('layouts.app-dashboard')

@push('title')
    Setting
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Setting</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Setting</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        @if (session('success') || session('error'))
                            <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                        @endif

                        <form action="{{ route('settings.update', $setting->uuid) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <x-input-file type="file" name="auth_background" :value="$setting->auth_background" label="Auth Background" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input-file type="file" name="home_cover_image" :value="$setting->home_cover_image" label="Home Cover Image" />
                                            </div>
                                            <div class="mb-3">
                                                <x-textarea name="home_cover_text" :value="$setting->home_cover_text" label="Home Cover Text" placeholder="Enter Home Cover Text" class="ckeditor1" rows="5" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke">
                                    <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Loading">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
