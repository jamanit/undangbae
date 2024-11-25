@extends('layouts.app-dashboard')

@push('title')
    Transaksi Undangan
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Transaksi Undangan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('invitations') }}">Daftar Undangan</a></div>
                    <div class="breadcrumb-item">Transaksi Undangan</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @if (session('success') || session('error'))
                            <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                        @endif

                        <div class="card">
                            <div class="card-body">
                                @if ($transaction->transaction_status)
                                    <x-alert :type="'info'" :message="$transaction->transaction_status->description_status" />
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <x-input type="text" name="" label="Nama" :value="$transaction->user->full_name" readonly />
                                        </div>
                                        <div class="mb-3">
                                            <x-input type="text" name="" label="Email" :value="$transaction->user->email" readonly />
                                        </div>
                                        <div class="mb-3">
                                            <x-input type="text" name="" label="Kode Transaksi" :value="$transaction->transaction_code" readonly />
                                        </div>
                                        <div class="mb-3">
                                            <x-input type="text" name="" label="Tanggal Transaksi" :value="$transaction->created_at" readonly />
                                        </div>
                                        <div class="mb-3">
                                            <x-input type="text" name="" label="Kedaluarsa Undangan" :value="$transaction->invitation_expired_date" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <x-input type="text" name="" label="Status Undangan" :value="$transaction->transaction_status->transaction_status_name" readonly />
                                        </div>
                                        <div class="mb-3">
                                            <x-input type="text" name="" label="Harga" :value="'Rp. ' . number_format($transaction->price)" readonly />
                                        </div>

                                        <form action="{{ route('transactions.update-percent-discount', $transaction->uuid) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="voucher_code">Voucher</label>
                                                <div class="d-flex">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="hidden" name="percent_discount" id="percent_discount" value="{{ $transaction->percent_discount . '%' }}">
                                                                Diskon {{ $transaction->percent_discount . '%' }}
                                                            </div>
                                                        </div>
                                                        <input type="text" name="voucher_code" id="voucher_code" placeholder="Masukkan Kode Voucher" class="form-control  @error('voucher_code') is-invalid @enderror">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary ml-1">Cek Kode</button>
                                                </div>
                                                @error('voucher_code')
                                                    <div class="text-danger small font-weight-bold" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </form>

                                        <div class="mb-3">
                                            <x-input type="text" name="" label="Total Harga" :value="'Rp. ' . number_format($transaction->total_amount)" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                        <h6 class="mb-3">Silakan membayar melalui daftar metode pembayaran berikut, dan kirimkan bukti gambar kepada kami:</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <ul class="list-group">
                                                        @foreach ($payment_methods as $item)
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <span>
                                                                    {{ $item->account_name . ' / ' . $item->account_number . ' / ' . $item->account_holder }}
                                                                </span>
                                                                <i class="fas fa-copy copy-icon" onclick="copyToClipboard('{{ $item->account_number }}')" title="Copy" style="cursor: pointer;"></i>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @php
                                                    // Menunggu Pembayaran, Dalam Proses, Pembayaran Gagal
                                                    $transaction_status_before = $transaction->transaction_status_id == 3 || $transaction->transaction_status_id == 4 || $transaction->transaction_status_id == 5;
                                                @endphp

                                                <form id="form_transaction" action="{{ route('transactions.update-transaction', $transaction->uuid) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    @if (Auth::user()->role->button_access == 0)
                                                        @if ($transaction_status_before)
                                                            <div class="mb-3">
                                                                <x-input-file type="file" name="payment_receipt" label="Bukti Pembayaran" :value="$transaction->payment_receipt" image />
                                                            </div>
                                                        @else
                                                            @if ($transaction->payment_receipt)
                                                                <div class="mb-3">
                                                                    <label for="">Bukti Pembayaran</label>
                                                                    <div>
                                                                        <a href="{{ Storage::url($transaction->payment_receipt) }}" target="_blank" data-fancybox="gallery-1">
                                                                            <img src="{{ Storage::url($transaction->payment_receipt) }}" alt="Image Preview" class="img-thumbnail img-input" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif

                                                        @if ($transaction->refund_receipt)
                                                            <div class="mb-3">
                                                                <label for="">Bukti Pengembalian Dana</label>
                                                                <div>
                                                                    <a href="{{ Storage::url($transaction->refund_receipt) }}" target="_blank" data-fancybox="gallery-1">
                                                                        <img src="{{ Storage::url($transaction->refund_receipt) }}" alt="Image Preview" class="img-thumbnail img-input" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif

                                                    @if (Auth::user()->role->button_access == 1)
                                                        @if ($transaction->payment_receipt)
                                                            <div class="mb-3">
                                                                <label for="">Bukti Pembayaran</label>
                                                                <div>
                                                                    <a href="{{ Storage::url($transaction->payment_receipt) }}" target="_blank" data-fancybox="gallery-1">
                                                                        <img src="{{ Storage::url($transaction->payment_receipt) }}" alt="Image Preview" class="img-thumbnail img-input" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="mb-3">
                                                                <p>Bukti Pembayaran belum dikirim.</p>
                                                            </div>
                                                        @endif

                                                        <div class="mb-3">
                                                            <x-input-file type="file" name="refund_receipt" label="Bukti Pengembalian Dana" :value="$transaction->refund_receipt" image />
                                                        </div>
                                                    @endif
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke d-flex">
                                @if (Auth::user()->role->button_access == 0)
                                    @if ($transaction_status_before)
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transactionConfirmModal">Kirim</button>
                                    @endif
                                @endif

                                @if (Auth::user()->role->button_access == 1)
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transactionConfirmModal">Kirim</button>

                                    <a href="#" class="btn btn-warning text-white ml-auto" data-toggle="modal" data-target="#paymentStatusModal">
                                        Ubah Status Transaksi
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="transactionConfirmModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Templat tidak dapat lagi diubah, pilih "Iya" untuk melanjutkan.</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-primary btn-loading" id="btn_transaction" data-loading-text="Memuat">Iya</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="paymentStatusModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Status Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Pilih status transaksi di bawah.</p>
                    @php
                        $btnClasses = ['1' => 'btn-success', '4' => 'btn-danger', '5' => 'btn-secondary', '6' => 'btn-warning'];
                    @endphp
                    @foreach ($transaction_status as $item)
                        <div class="mb-3">
                            @php
                                $btnClass = $btnClasses[$item->id] ?? 'btn-secondary';
                            @endphp
                            <form action="{{ url('transactions/update-transaction-status/' . $transaction->uuid) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="transaction_status_id" id="transaction_status_id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-block {{ $btnClass }} btn-loading" data-loading-text="Memuat">{{ $item->transaction_status_name }}</button>
                            </form>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .copy-icon {
            cursor: pointer;
            margin-left: 8px;
            transition: color 0.3s;
            font-size: 18px;
        }

        .copy-icon:hover {
            color: #6777ef;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function copyToClipboard(accountNumber) {
            const el = document.createElement('input');
            el.value = accountNumber;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Disalin',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 3000,
                timerProgressBar: true,
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#btn_transaction').on('click', function() {
                $('#form_transaction').submit();
            });
        });
    </script>
@endpush
