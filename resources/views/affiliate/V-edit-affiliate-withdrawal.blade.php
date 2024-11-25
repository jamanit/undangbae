@extends('layouts.app-dashboard')

@push('title')
    Masukkan Bukti Pembayaran
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Masukkan Bukti Pembayaran</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('affiliates') }}">Affiliates</a></div>
                    <div class="breadcrumb-item">Masukkan Bukti Pembayaran</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        @if (session('success') || session('error'))
                            <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                        @endif

                        <form action="{{ route('affiliates.update-affiliate-withdrawal', $affiliate_withdrawal->uuid) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Data Afiliasi</label>
                                                <div class="border p-3">
                                                    <div>{{ $affiliate_withdrawal->user->full_name }}</div>
                                                    <div>{{ $affiliate_withdrawal->user->email }}</div>
                                                    <div>
                                                        {{ $affiliate_withdrawal->account_name }} -
                                                        {{ $affiliate_withdrawal->account_number }} -
                                                        {{ $affiliate_withdrawal->account_holder }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <x-input-file type="file" name="payment_receipt" label="Bukti Pembayaran" :value="$affiliate_withdrawal->payment_receipt" />
                                            </div>
                                            <div class="mb-3">
                                                <x-textarea name="remark" :value="$affiliate_withdrawal->remark" label="Keterangan" placeholder="Masukkan Keterangan" rows="3" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke">
                                    <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Perbarui</button>
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
