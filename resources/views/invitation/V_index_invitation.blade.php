@extends('layouts.app_dashboard')

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
                                <a href="{{ route('invitations.template') }}" class="btn btn-primary btn-sm">Buat Undangan</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-costume">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th>Kode Undangan</th>
                                                <th>Jenis Templat</th>
                                                <th>Nama Templat</th>
                                                <th>Status Undangan</th>
                                                <th>Kadaluarsa Undangan</th>
                                                <th>Aksi</th>
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

    @include('invitation.V_delete_invitation')
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
                        data: 'invitation_code',
                        name: 'invitation_code'
                    }, {
                        data: 'template_type_name',
                        name: 'template_type_name'
                    }, {
                        data: 'template_name',
                        name: 'template_name'
                    }, {
                        data: 'invitation_status_name',
                        name: 'invitation_status_name'
                    }, {
                        data: 'expired_date',
                        name: 'expired_date'
                    },
                    {
                        data: 'uuid',
                        class: 'text-nowrap width-1',
                        "render": function(data, type, row) {
                            let paymentButton = '';
                            let editButton = '';
                            let deleteButton = '';

                            let button_access = '{{ Auth::user()->role->button_access }}';
                            if (button_access == 1) {
                                paymentButton = `
                                    <a href="/invitations/edit_transaction/${row.transaction_uuid}" class="btn btn-primary btn-sm">
                                        Pembayaran
                                    </a>
                                `;
                                editButton = `
                                    <a href="/invitations/${row.parameter}/edit/${data}" class="btn btn-warning btn-sm">
                                        Ubah Undangan
                                    </a>
                                `;
                                deleteButton = `
                                    <a href="#" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteModal" data-id="${data}" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                `;
                            } else {
                                if (row.invitation_status_id === 1 || row.invitation_status_id === 2 || row.invitation_status_id === 4) {
                                    paymentButton = `
                                    <a href="/invitations/edit_transaction/${row.transaction_uuid}" class="btn btn-primary btn-sm">
                                        Pembayaran
                                    </a>
                                `;
                                }

                                if (row.invitation_status_id === 3) {
                                    editButton = `
                                    <a href="/invitations/${row.parameter}/edit/${data}" class="btn btn-warning btn-sm">
                                        Ubah Undangan
                                    </a>
                                `;
                                }
                            }

                            return `
                                ${paymentButton}
                                ${editButton} 
                                ${deleteButton}
                            `;
                        }
                    },
                ]
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
