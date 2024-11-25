@extends('layouts.app-dashboard')

@push('title')
    Daftar Undangan
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Undangan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Daftar Undangan</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        @if (session('success') || session('error'))
                            <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('transactions.template') }}" class="btn btn-primary btn-sm">Buat Undangan</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-costume">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th>Aksi</th>
                                                <th>Status Transaksi</th>
                                                <th>Kode Transaksi</th>
                                                <th>Jenis Templat</th>
                                                <th>Nama Templat</th>
                                                <th>Kedaluarsa Undangan</th>
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

    @include('invitation.V-delete-invitation')
@endsection

@push('styles')
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#table-costume").DataTable({
                processing: true,
                serverSide: true,
                order: [],
                ajax: "{{ route('invitations.index') }}",
                columns: [{
                    data: 'uuid',
                    class: 'text-nowrap width-1',
                    "render": function(data, type, row) {
                        let paymentButton = '';
                        let editButton = '';
                        let showInvitationButton = '';
                        let deleteButton = '';

                        let button_access = '{{ Auth::user()->role->button_access }}';
                        const currentDate = new Date();
                        const expiredDate = new Date(row.invitation_expired_date);

                        if (button_access == 0) {
                            paymentButton = `
                                    <a href="/transactions/edit-transaction/${row.transaction_uuid}" class="btn btn-primary btn-sm">
                                        Transaksi
                                    </a>
                                `;

                            if (row.transaction_status_id == 1 && currentDate < expiredDate) {
                                editButton = `
                                    <a href="/invitations/${row.parameter}/edit/${data}" class="btn btn-warning btn-sm">
                                        Lengkapi Data Undangan
                                    </a>
                                `;
                            }

                            if (currentDate > expiredDate) {
                                showInvitationButton = `
                                    <a href="/${row.show_invitation_url}" class="btn btn-info btn-sm" target="_blank">
                                        Lihat Undangan
                                    </a>
                                `;
                            }
                        }

                        if (button_access == 1) {
                            paymentButton = `
                                    <a href="/transactions/edit-transaction/${row.transaction_uuid}" class="btn btn-primary btn-sm">
                                        Transaksi
                                    </a>
                                `;
                            editButton = `
                                    <a href="/invitations/${row.parameter}/edit/${data}" class="btn btn-warning btn-sm">
                                        Lengkapi Data Undangan
                                    </a>
                                `;
                            showInvitationButton = `
                                    <a href="/${row.show_invitation_url}" class="btn btn-info btn-sm" target="_blank">
                                        Lihat Undangan
                                    </a>
                                `;
                            deleteButton = `
                                    <a href="#" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteModal" data-id="${data}" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                `;
                        }

                        return `
                                ${paymentButton}
                                ${editButton} 
                                ${showInvitationButton}
                                ${deleteButton}
                            `;
                    }
                }, {
                    data: 'transaction_status_name',
                    name: 'transaction_status_name',
                    class: 'text-nowrap'
                }, {
                    data: 'transaction_code',
                    name: 'transaction_code',
                    class: 'text-nowrap'
                }, {
                    data: 'template_type_name',
                    name: 'template_type_name',
                    class: 'text-nowrap'
                }, {
                    data: 'template_name',
                    name: 'template_name',
                    class: 'text-nowrap'
                }, {
                    data: 'invitation_expired_date',
                    name: 'invitation_expired_date',
                    class: 'text-nowrap'
                }],
                drawCallback: function(settings) {
                    $('.btn').tooltip();
                }
            });

            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var itemId = button.data('id');
                var form = $(this).find('#deleteForm');
                form.attr('action', '/invitations/' + itemId);
            });
        });
    </script>
@endpush
