@extends('layouts.app-dashboard')

@push('title')
    Contacts
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Contacts</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Contacts</div>
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
                                                <th>Platform</th>
                                                <th>Username/Number</th>
                                                <th>Icon</th>
                                                <th>Url</th>
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

    @include('contact.V-modal-contact')
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
                ajax: "{{ route('contacts.index') }}",
                columns: [{
                        data: 'uuid',
                        class: 'width-1 text-nowrap',
                        "render": function(data, type, row) {
                            return ` 
                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#formModal" data-id="${data}" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteModal" data-id="${data}" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            `;
                        }
                    }, {
                        data: 'platform',
                        name: 'platform'
                    },
                    {
                        data: 'username_number',
                        name: 'username_number'
                    },
                    {
                        data: 'icon',
                        name: 'icon'
                    },
                    {
                        data: 'url',
                        name: 'url'
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

            $('[data-toggle="tooltip"]').tooltip();

            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var itemId = button.data('id');
                var modaTitle = $('.modal-title');
                var form = $(this).find('#deleteForm');

                modaTitle.text('Delete Contact');
                form.attr('action', '/contacts/' + itemId);
            });

            $('#formModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var itemId = button.data('id');
                var modaTitle = $('.modal-title');
                var btnSubmit = $('.btn-submit');
                var form = $(this).find('#modalForm');

                if (typeof itemId === 'undefined') {
                    modaTitle.text('Add Contact');
                    btnSubmit.text('Save');
                    form.attr('action', '/contacts');
                    form.append('<input type="hidden" name="_method" value="POST">');

                    form.find('.modal-body input').val('');
                } else {
                    modaTitle.text('Edit Contact');
                    btnSubmit.text('Update');
                    form.attr('action', '/contacts/' + itemId);
                    form.append('<input type="hidden" name="_method" value="PUT">');

                    $.ajax({
                        url: '/contacts/' + itemId + '/edit',
                        method: 'GET',
                        success: function(data) {
                            form.find('#platform').val(data.platform);
                            form.find('#username_number').val(data.username_number);
                            form.find('#icon').val(data.icon);
                            form.find('#url').val(data.url);
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
