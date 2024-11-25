    @extends('layouts.app-dashboard')

    @push('title')
        Template
    @endpush

    @section('content')
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Template</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                        <div class="breadcrumb-item">Template</div>
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
                                    <a href="{{ route('templates.create') }}" class="btn btn-primary btn-sm">Add</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-serverside">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th>Actions</th>
                                                    <th>Image</th>
                                                    <th>Template Type Name</th>
                                                    <th>Template Code</th>
                                                    <th>Parameter</th>
                                                    <th>Template Name</th>
                                                    <th>Price</th>
                                                    <th>Percent Discount</th>
                                                    <th>Total Amount</th>
                                                    <th>Publication Status</th>
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

        @include('template.V-delete-template')
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
                    ajax: "{{ route('templates.index') }}",
                    columns: [{
                        data: 'uuid',
                        class: 'width-1 text-nowrap',
                        "render": function(data, type, row) {
                            return ` 
                                <a href="/templates/${data}/edit" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteModal" data-id="${data}" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            `;
                        }
                    }, {
                        data: 'image',
                        render: function(data, type, row) {
                            const imageUrl = `{{ Storage::url('') }}` + data;
                            return ` 
                                    <a href="${imageUrl}" target="_blank" data-fancybox="gallery-2">
                                        <img src="${imageUrl}" class="img-thumbnail img-list" />
                                    </a> 
                                    `;
                        }
                    }, {
                        data: 'template_type_name',
                        name: 'template_type_name',
                    }, {
                        data: 'template_code',
                        name: 'template_code',
                    }, {
                        data: 'parameter',
                        name: 'parameter',
                    }, {
                        data: 'template_name',
                        name: 'template_name',
                    }, {
                        data: 'price',
                        name: 'price',
                        render: function(data, type, row) {
                            return data ? 'Rp. ' + parseInt(data).toLocaleString('id-ID') : '';
                        }
                    }, {
                        data: 'percent_discount',
                        name: 'percent_discount',
                        render: function(data, type, row) {
                            return data ? data + '%' : '';
                        }
                    }, {
                        data: 'total_amount',
                        name: 'total_amount',
                        render: function(data, type, row) {
                            return data ? 'Rp. ' + parseInt(data).toLocaleString('id-ID') : '';
                        }
                    }, {
                        data: 'publication_status',
                        name: 'publication_status',
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
                    form.attr('action', '/templates/' + itemId);
                });
            });
        </script>
    @endpush
