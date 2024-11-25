@extends('layouts.app-dashboard')

@push('title')
    Add Template
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Template</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('templates') }}">Templates</a></div>
                    <div class="breadcrumb-item">Add Template</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        <form action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <x-input-file type="file" name="image" label="Image" />
                                            </div>
                                            <div class="mb-3">
                                                <x-select name="template_type_id" label="Template Type" :options="$template_type_list" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input type="text" name="template_code" label="Template Code" placeholder="Enter Template Code" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input type="text" name="parameter" label="Parameter" placeholder="Enter Parameter" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input type="text" name="template_name" label="Template Name" placeholder="Enter Template Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <x-input type="text" name="example_url" label="Example URL" placeholder="Enter Example URL" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input type="number" name="price" label="Price" placeholder="Enter Price" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input type="number" name="percent_discount" label="Percent Discount" placeholder="Enter Percent Discount" />
                                            </div>
                                            <div class="mb-3">
                                                <x-select name="publication_status" label="Publication Status" :options="$publication_status_list" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke">
                                    <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Loading">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
