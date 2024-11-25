@extends('layouts.app-dashboard')

@push('title')
    Hubungi Kami
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Hubungi Kami</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Hubungi Kami</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <x-alert :type="'info'" :message="'Jika Anda mengalami kendala, silakan hubungi kontak di bawah ini. Kami siap membantu Anda setiap hari mulai pukul 09:00 - 20:00 WIB.'" />

                                <ul class="list-group">
                                    <div class="row">
                                        @foreach ($contacts as $contact)
                                            <div class="col-md-6 mb-3">
                                                <li class="list-group-item d-flex align-items-center">
                                                    <div class="d-flex align-items-center mr-4">
                                                        <a href="{{ $contact->url }}" target="_blank">
                                                            <i class="{{ $contact->icon }}" style="font-size: 24px;" title="{{ $contact->platform }}"></i>
                                                        </a>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <strong>{{ $contact->platform }}</strong><br>
                                                        <a href="{{ $contact->url }}" target="_blank">
                                                            <span>{{ $contact->username_number }}</span>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <i class="{{ $contact->icon_class }}" title="{{ $contact->platform }}" style="font-size: 24px;"></i>
                                                    </div>
                                                </li>
                                            </div>
                                        @endforeach
                                    </div>
                                </ul>
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
