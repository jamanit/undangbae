@extends('layouts.app_dashboard')

@push('title')
    Show Message
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Show Message</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('messages') }}">Messages</a></div>
                    <div class="breadcrumb-item">Show Message</div>
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
                                            <x-input type="text" name="name" label="Name" :value="$message->name" placeholder="Enter Name" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <x-input type="email" name="email" label="Email" :value="$message->email" placeholder="Enter Email" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <x-textarea name="message" :value="$message->message" label="Meesage" placeholder="Enter Meesage" rows="5" readonly />
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
