@extends('layouts.app-dashboard')

@push('title')
    Show Contact Form
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Show Contact Form</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('contact_forms') }}">Contact Forms</a></div>
                    <div class="breadcrumb-item">Show Contact Form</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <x-input type="text" name="name" label="Name" :value="$contact_form->name" placeholder="Enter Name" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <x-input type="email" name="email" label="Email" :value="$contact_form->email" placeholder="Enter Email" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <x-textarea name="message" :value="$contact_form->message" label="Meesage" placeholder="Enter Meesage" rows="5" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <x-input type="text" name="created_at" label="Created At" :value="date('Y-d-m H:i', strtotime($contact_form->created_at))" placeholder="Enter Email" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
