    @extends('layouts.app-dashboard')

    @push('title')
        Afiliasi
    @endpush

    @section('content')
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Afiliasi</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                        <div class="breadcrumb-item">Afiliasi</div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-money"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Saldo Komisi</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            Rp. {{ number_format($total_commission) }}
                                            <a href="#" class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#createModal">Tarik Komisi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($affiliate_voucher)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body" style="padding: 10px;">
                                        <div class="d-flex">
                                            <div class="bg-info p-4 rounded text-white d-flex align-items-center">
                                                <i class="fas fa-ticket fa-xl"></i>
                                            </div>
                                            <div class="ml-3">
                                                <div class="mb-1" style="font-size: 13px; font-weight: 600; letter-spacing: .5px; color: #98a6ad;">Voucher Anda</div>
                                                <div class="d-flex mb-1">
                                                    <div class="font-weight-bold" style="font-size: 18px; color: #34395e;">Diskon {{ $affiliate_voucher->percent_discount }}%</div>
                                                    <div class="font-weight-bold ml-auto" style="font-size: 18px; color: #34395e;">
                                                        {{ $affiliate_voucher->voucher_code }}
                                                        <i class="fas fa-copy fa-lg" style="cursor: pointer" title="Salin" id="copy_voucher_code" data-text="{{ $affiliate_voucher->voucher_code }}"></i>
                                                    </div>
                                                </div>
                                                <div class="border p-2 rounded text-justify mb-1">
                                                    Dengan menyebarkan dan orang lain menggunakan kode ini saat bertransaksi maka Anda mendapatkan komisi <strong>Rp. {{ number_format($affiliate_voucher->affiliate_commission) }}</strong>
                                                </div>
                                                <div class="small text-right"> Kedaluwarsa {{ date('d-m-Y', strtotime($affiliate_voucher->expired_date)) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            @if (session('success') || session('error'))
                                <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                            @endif

                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-serverside">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th>Kode Penarikan</th>
                                                    <th>Jumlah Komisi</th>
                                                    <th>Rekening</th>
                                                    <th>Status</th>
                                                    <th>Bukti Pembayaran</th>
                                                    <th>Keterangan</th>
                                                    <th>Dibuat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>

        @include('affiliate.V-create-affiliate-withdrawal')
    @endsection

    @push('styles')
    @endpush

    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#table-serverside").DataTable({
                    processing: true,
                    serverSide: true,
                    order: [],
                    ajax: "{{ route('affiliates.index') }}",
                    columns: [{
                        data: 'withdrawal_code',
                        name: 'withdrawal_code',
                    }, {
                        data: 'commission_amount',
                        name: 'commission_amount',
                        render: function(data, type, row) {
                            return data ? 'Rp. ' + parseInt(data).toLocaleString('id-ID') : '';
                        }
                    }, {
                        data: null,
                        className: 'text-nowrap',
                        render: function(data, type, row) {
                            return row.account_name + ' - ' + row.account_number + ' - ' + row.account_holder;
                        }
                    }, {
                        data: 'status',
                        name: 'status',
                    }, {
                        data: 'payment_receipt',
                        render: function(data, type, row) {
                            // Tentukan variabel untuk menyimpan HTML gambar
                            let imageHtml = '';

                            // Cek apakah ada data gambar
                            if (data) {
                                const imageUrl = `{{ Storage::url('') }}${data}`;
                                imageHtml = `
                                                <a href="${imageUrl}" target="_blank" data-fancybox="gallery-2">
                                                    <img src="${imageUrl}" class="img-thumbnail img-list" />
                                                </a>
                                            `;
                            }

                            // Cek apakah button_access = 1, jika ya, tampilkan tombol
                            let buttonEdit = '';
                            let buttonAccess = '{{ Auth::user()->role->button_access }}';
                            if (buttonAccess == 1) { // Cek jika button_access = 1
                                buttonEdit = `
                                                <a href="/affiliates/edit-affiliate-withdrawal/${row.uuid}" class="btn btn-warning btn-sm ml-2" title="Masukkan Bukti Pembayaran">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            `;
                            }

                            // Gabungkan gambar dan tombol dalam satu div
                            return `
                                    <div class="d-flex align-items-center">
                                        <!-- Gambar hanya ditampilkan jika ada -->
                                        ${imageHtml}
                                        <!-- Tombol selalu ditampilkan jika button_access = 1 -->
                                        ${buttonEdit}
                                    </div>
                                `;
                        }
                    }, {
                        data: 'remark',
                        name: 'remark',
                        className: 'text-nowrap'
                    }, {
                        data: 'created_at',
                        name: 'created_at',
                        className: 'text-nowrap',
                        render: function(data) {
                            return data ? moment(data).format('YYYY-MM-DD HH:mm') : '';
                        }
                    }],
                    drawCallback: function(settings) {
                        $('.btn').tooltip();
                    }
                });

            });
        </script>

        <script>
            $('#copy_voucher_code').on('click', function() {
                var voucherCode = $(this).data('text');

                navigator.clipboard.writeText(voucherCode).then(function() {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Kode diskon berhasil disalin!',
                        showConfirmButton: false,
                        toast: true,
                        showCloseButton: true,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                }).catch(function(err) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Gagal menyalin kode!',
                        showConfirmButton: false,
                        toast: true,
                        showCloseButton: true,
                        timer: 3000,
                        timerProgressBar: true
                    });
                });
            });
        </script>
    @endpush
