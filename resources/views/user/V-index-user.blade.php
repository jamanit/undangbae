@extends('layouts.app-dashboard')

@push('title')
    Users
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Users</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Users</div>
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
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Add</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-serverside">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th>Actions</th>
                                                <th>User ID</th>
                                                <th>Full Name</th>
                                                <th>Nickname</th>
                                                <th>Email</th>
                                                <th>Role Name</th>
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

    @include('user.V-delete-user')
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
                ajax: "{{ route('users.index') }}",
                columns: [{
                    data: 'uuid',
                    class: 'text-nowrap width-1',
                    "render": function(data, type, row) {
                        return `
                                <a href="/users/${data}/edit" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteModal" data-id="${data}" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            `;
                    }
                }, {
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'full_name',
                    name: 'full_name'
                }, {
                    data: 'nick_name',
                    name: 'nick_name'
                }, {
                    data: 'email',
                    name: 'email'
                }, {
                    data: 'role_name',
                    name: 'role_name'
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
                var form = $(this).find('#deleteForm');
                form.attr('action', '/users/' + itemId);
            });
        });
    </script>
@endpush
