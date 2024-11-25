@extends('layouts.app-dashboard')

@push('title')
    Edit User
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('users') }}">Users</a></div>
                    <div class="breadcrumb-item">Edit User</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        <form action="{{ route('users.update', $user->uuid) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <x-input type="text" name="full_name" label="Full Name" :value="$user->full_name" placeholder="Enter Full Name" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input type="text" name="nick_name" label="Nickname" :value="$user->nick_name" placeholder="Enter Nickname" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input type="email" name="email" label="Email" :value="$user->email" placeholder="Enter Email" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <x-input type="password" name="password" label="Password" placeholder="Enter Password" class="pwstrength" data-indicator="pwindicator" autocomplete="new-password" />
                                            </div>
                                            <div class="mb-3">
                                                <x-input type="password" name="password_confirmation" label="Confirm Password" placeholder="Confirm Password" autocomplete="new-password" />
                                            </div>
                                            <div class="mb-3">
                                                <x-select name="role_id" label="Role Name" :options="$roles" :selected="$user->role_id" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke">
                                    <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Loading">Update</button>
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
