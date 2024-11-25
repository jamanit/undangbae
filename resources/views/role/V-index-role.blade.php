@extends('layouts.app-dashboard')

@push('title')
    Roles
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Roles</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Roles</div>
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
                                                <th>Role Name</th>
                                                <th>Button Access</th>
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

    @include('role.V-modal-role')
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
                ajax: "{{ route('roles.index') }}",
                columns: [{
                    data: 'uuid',
                    class: 'width-1 text-nowrap',
                    "render": function(data, type, row) {
                        return `
                                <a href="/menu-accesses/${data}" class="btn btn-info btn-sm" title="Akses Menu">
                                    <i class="fa fa-shield"></i>
                                </a>
                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#formModal" data-id="${data}" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteModal" data-id="${data}" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            `;
                    }
                }, {
                    data: 'role_name',
                    name: 'role_name'
                }, {
                    data: 'button_access',
                    name: 'button_access'
                }, {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data) {
                        return data ? moment(data).format('YYYY-MM-DD HH:mm') : '';
                    }
                }],
                drawCallback: function(settings) {
                    $('.btn').tooltip();
                }
            });

            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var itemId = button.data('id');
                var modaTitle = $('.modal-title');
                var form = $(this).find('#deleteForm');

                modaTitle.text('Delete Role');
                form.attr('action', '/roles/' + itemId);
            });

            $('#formModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var itemId = button.data('id');
                var modaTitle = $('.modal-title');
                var btnSubmit = $('.btn-submit');
                var form = $(this).find('#modalForm');

                if (typeof itemId === 'undefined') {
                    modaTitle.text('Add Role');
                    btnSubmit.text('Save');
                    form.attr('action', '/roles');
                    form.append('<input type="hidden" name="_method" value="POST">');

                    form.find('.modal-body input[type="text"]').val('');
                    form.find('.modal-body input[type="radio"]').prop('checked', false);
                    form.find('#button_access_no').prop('checked', true);
                } else {
                    modaTitle.text('Edit Role');
                    btnSubmit.text('Update');
                    form.attr('action', '/roles/' + itemId);
                    form.append('<input type="hidden" name="_method" value="PUT">');

                    $.ajax({
                        url: '/roles/' + itemId + '/edit',
                        method: 'GET',
                        success: function(data) {
                            form.find('#role_name').val(data.role_name);
                            if (data.button_access === 1) {
                                form.find('#button_access_yes').prop('checked', true);
                            } else {
                                form.find('#button_access_no').prop('checked', true);
                            }
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
