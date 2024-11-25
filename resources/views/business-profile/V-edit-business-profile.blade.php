@extends('layouts.app-dashboard')

@push('title')
    Business Profile
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Business Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Business Profile</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        @if (session('success') || session('error'))
                            <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                        @endif

                        <form action="{{ route('business-profiles.update', $business_profile->uuid) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <x-input-file type="file" name="logo" :value="$business_profile->logo" label="Logo" placeholder="Enter Logo" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input type="text" name="owner_name" :value="$business_profile->owner_name" label="Owner Name" placeholder="Enter Owner Name" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input type="text" name="business_name" :value="$business_profile->business_name" label="Business Name" placeholder="Enter Business Name" />
                                            </div>
                                            <div class="mb-3">
                                                <x-textarea name="address" :value="$business_profile->address" label="Address" placeholder="Enter Address" rows="2" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <x-input type="text" name="brand_name" :value="$business_profile->brand_name" label="Brand Name" placeholder="Enter Brand Name" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input type="date" name="brand_founding_date" :value="$business_profile->brand_founding_date" label="Brand Founding Date" placeholder="Enter Brand Founding Date" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input type="email" name="brand_email" :value="$business_profile->brand_email" label="Brand Email" placeholder="Enter Brand Email" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input type="url" name="brand_website" :value="$business_profile->brand_website" label="Brand Website" placeholder="Enter Brand Website" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <x-textarea name="google_maps" :value="$business_profile->google_maps" label="Google Maps" placeholder="Enter Google Maps" rows="5" />
                                        <small class="text-info">Use the embed map feature from Google Maps.</small>
                                    </div>
                                    <div class="mb-3">
                                        <x-textarea type="text" name="about" :value="$business_profile->about" label="About" placeholder="Enter About" class="ckeditor1" rows="5" />
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
