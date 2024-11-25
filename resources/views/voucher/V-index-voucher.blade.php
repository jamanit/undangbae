@extends('layouts.app-dashboard')

@push('title')
    Vouchers
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Vouchers</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Vouchers</div>
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
                                                <th>Voucher Code</th>
                                                <th>Expired Date</th>
                                                <th>Percent Discount</th>
                                                <th>User ID (Affiliate)</th>
                                                <th>Affiliate Commission</th>
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

    @include('voucher.V-modal-voucher')
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
                ajax: "{{ route('vouchers.index') }}",
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
                    data: 'voucher_code',
                    name: 'voucher_code'
                }, {
                    data: 'expired_date',
                    name: 'expired_date'
                }, {
                    data: 'percent_discount',
                    name: 'percent_discount',
                    render: function(data) {
                        return data ? data + '%' : '';
                    }
                }, {
                    data: 'affiliate_name',
                    name: 'affiliate_name'
                }, {
                    data: 'affiliate_commission',
                    name: 'affiliate_commission',
                    render: function(data, type, row) {
                        return data ? 'Rp. ' + parseInt(data).toLocaleString('id-ID') : '';
                    }
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

                modaTitle.text('Delete Discount');
                form.attr('action', '/vouchers/' + itemId);
            });

            $('#formModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var itemId = button.data('id');
                var modaTitle = $('.modal-title');
                var btnSubmit = $('.btn-submit');
                var form = $(this).find('#modalForm');

                if (typeof itemId === 'undefined') {
                    modaTitle.text('Add Discount');
                    btnSubmit.text('Save');
                    form.attr('action', '/vouchers');
                    form.append('<input type="hidden" name="_method" value="POST">');

                    form.find('.modal-body input[type="text"]').val('');
                    form.find('.modal-body input[type="date"]').val('');
                    form.find('.modal-body input[type="number"]').val('');
                } else {
                    modaTitle.text('Edit Discount');
                    btnSubmit.text('Update');
                    form.attr('action', '/vouchers/' + itemId);
                    form.append('<input type="hidden" name="_method" value="PUT">');

                    $.ajax({
                        url: '/vouchers/' + itemId + '/edit',
                        method: 'GET',
                        success: function(data) {
                            form.find('#voucher_code').val(data.voucher_code);
                            form.find('#expired_date').val(data.expired_date);
                            form.find('#percent_discount').val(data.percent_discount);
                            form.find('#user_affiliate_id').val(data.user_affiliate_id);
                            form.find('#affiliate_commission').val(data.affiliate_commission);
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
