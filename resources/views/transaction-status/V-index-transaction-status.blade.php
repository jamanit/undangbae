@extends('layouts.app-dashboard')

@push('title')
    Transaction Status
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Transaction Status</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Transaction Status</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">

                        @if (session('success') || session('error'))
                            <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModal">Add</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-serverside">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th>Actions</th>
                                                <th>ID</th>
                                                <th>Transaction Status Name</th>
                                                <th>Description Status</th>
                                                <th>Created At</th>
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

    @include('transaction-status.V-modal-transaction-status')
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
                ajax: "{{ route('transaction-statuses.index') }}",
                columns: [{
                        data: 'uuid',
                        class: 'width-1 text-nowrap',
                        "render": function(data, type, row) {
                            return ` 
                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#formModal" data-id="${data}" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a> 
                            `;
                        }
                    }, {
                        data: 'id',
                        name: 'id'
                    }, {
                        data: 'transaction_status_name',
                        name: 'transaction_status_name'
                    },
                    {
                        data: 'description_status',
                        name: 'description_status'
                    }, {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data) {
                            return data ? moment(data).format('YYYY-MM-DD HH:mm') : '';
                        }
                    }
                ],
                drawCallback: function(settings) {
                    $('.btn').tooltip();
                }
            });

            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var itemId = button.data('id');
                var modaTitle = $('.modal-title');
                var form = $(this).find('#deleteForm');

                modaTitle.text('Delete Transaction Status');
                form.attr('action', '/transaction-statuses/' + itemId);
            });

            $('#formModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var itemId = button.data('id');
                var modaTitle = $('.modal-title');
                var btnSubmit = $('.btn-submit');
                var form = $(this).find('#modalForm');

                if (typeof itemId === 'undefined') {
                    modaTitle.text('Add Transaction Status');
                    btnSubmit.text('Save');
                    form.attr('action', '/transaction-statuses');
                    form.append('<input type="hidden" name="_method" value="POST">');

                    form.find('.modal-body input').val('');
                    form.find('.modal-body textarea').val('');
                } else {
                    modaTitle.text('Edit Transaction Status');
                    btnSubmit.text('Update');
                    form.attr('action', '/transaction-statuses/' + itemId);
                    form.append('<input type="hidden" name="_method" value="PUT">');

                    $.ajax({
                        url: '/transaction-statuses/' + itemId + '/edit',
                        method: 'GET',
                        success: function(data) {
                            form.find('#transaction_status_name').val(data.transaction_status_name);
                            form.find('#description_status').val(data.description_status);
                        },
                        error: function(xhr) {
                            console.error("Error fetching data:", xhr);
                        }
                    });
                }
            });
        });
    </script>
@endpush
