@extends('layouts.app-dashboard')

@push('title')
    Data Undangan
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Undangan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('invitations') }}">Daftar Undangan</a></div>
                    <div class="breadcrumb-item">Data Undangan</div>
                </div>
            </div>
            <div class="section-body">

                <h2 id="cover" class="section-title">Cover</h2>
                @if (session('success#cover') || session('error#cover'))
                    <x-alert :type="session('success#cover') ? 'success' : 'danger'" :message="session('success#cover') ? session('success#cover') : session('error#cover')" />
                @endif
                <form action="{{ isset($invitation->cover) ? route('invitations.sideright-template.action-cover', $invitation->cover->uuid) : route('invitations.sideright-template.action-cover') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($invitation->cover))
                        @method('PUT')
                    @endif
                    <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                    <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input-file type="text" name="cover_image" label="Gambar Cover" :value="$invitation->cover->cover_image ?? ''" />
                                        <small class="text-info">Maximal ukuran 5MB.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Simpan</button>
                        </div>
                    </div>
                </form>

                <h2 id="wedding_couple" class="section-title">Mempelai</h2>
                @if (session('success#wedding_couple') || session('error#wedding_couple'))
                    <x-alert :type="session('success#wedding_couple') ? 'success' : 'danger'" :message="session('success#wedding_couple') ? session('success#wedding_couple') : session('error#wedding_couple')" />
                @endif
                <form action="{{ isset($invitation->wedding_couple) ? route('invitations.sideright-template.action-wedding-couple', $invitation->wedding_couple->uuid) : route('invitations.sideright-template.action-wedding-couple') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($invitation->wedding_couple))
                        @method('PUT')
                    @endif
                    <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                    <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @php
                                        $opening_greeting = "Assalamu'alaikum\nWarahmatullahi Wabarakatuh";
                                        $text_greeting = 'Dengan memohon Rahmat dan Ridho Allah SWT kami bermaksud untuk mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami:';
                                    @endphp
                                    <div class="mb-3">
                                        <x-textarea type="text" name="opening_greeting" label="Salam Pembuka" :value="$invitation->wedding_couple->opening_greeting ?? $opening_greeting" placeholder="Masukkan Salam Pembuka" rows="2" />
                                    </div>
                                    <div class="mb-3">
                                        <x-textarea type="text" name="text_greeting" label="Teks Pembuka" :value="$invitation->wedding_couple->text_greeting ?? $text_greeting" placeholder="Masukkan Teks Pembuka" rows="2" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input-file type="text" name="bride_photo" label="Foto Mempelai Wanita" :value="$invitation->wedding_couple->bride_photo ?? ''" />
                                        <small class="text-info">Maximal ukuran 5MB.</small>
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="bride_full_name" label="Nama Lengkap Mempelai Wanita" :value="$invitation->wedding_couple->bride_full_name ?? ''" placeholder="Masukkan Nama Lengkap Mempelai Wanita" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="bride_nickname" label="Nama Panggilan Mempelai Wanita" :value="$invitation->wedding_couple->bride_nickname ?? ''" placeholder="Masukkan Nama Panggilan Mempelai Wanita" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="number" name="bride_child_number" label="Anak Keberapa Mempelai Wanita" :value="$invitation->wedding_couple->bride_child_number ?? ''" placeholder="Masukkan Anak Keberapa Mempelai Wanita" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="bride_mother_name" label="Nama Ibu Mempelai Wanita" :value="$invitation->wedding_couple->bride_mother_name ?? ''" placeholder="Masukkan Nama Ibu Mempelai Wanita" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="bride_father_name" label="Nama Ayah Mempelai Wanita" :value="$invitation->wedding_couple->bride_father_name ?? ''" placeholder="Masukkan Nama Ayah Mempelai Wanita" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input-file type="text" name="groom_photo" label="Foto Mempelai Pria" :value="$invitation->wedding_couple->groom_photo ?? ''" />
                                        <small class="text-info">Maximal ukuran 5MB.</small>
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="groom_full_name" label="Nama Lengkap Mempelai Pria" :value="$invitation->wedding_couple->groom_full_name ?? ''" placeholder="Masukkan Nama Lengkap Mempelai Pria" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="groom_nickname" label="Nama Panggilan Mempelai Pria" :value="$invitation->wedding_couple->groom_nickname ?? ''" placeholder="Masukkan Nama Panggilan Mempelai Pria" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="number" name="groom_child_number" label="Anak Keberapa Mempelai Pria" :value="$invitation->wedding_couple->groom_child_number ?? ''" placeholder="Masukkan Anak Keberapa Mempelai Pria" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="groom_mother_name" label="Nama Ibu Mempelai Pria" :value="$invitation->wedding_couple->groom_mother_name ?? ''" placeholder="Masukkan Nama Ibu Mempelai Pria" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="groom_father_name" label="Nama Ayah Mempelai Pria" :value="$invitation->wedding_couple->groom_father_name ?? ''" placeholder="Masukkan Nama Ayah Mempelai Pria" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Simpan</button>
                        </div>
                    </div>
                </form>

                <h2 id="quote" class="section-title">Kutipan</h2>
                @if (session('success#quote') || session('error#quote'))
                    <x-alert :type="session('success#quote') ? 'success' : 'danger'" :message="session('success#quote') ? session('success#quote') : session('error#quote')" />
                @endif
                <form action="{{ isset($invitation->quote) ? route('invitations.sideright-template.action-quote', $invitation->quote->uuid) : route('invitations.sideright-template.action-quote') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($invitation->quote))
                        @method('PUT')
                    @endif
                    <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                    <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input-file type="text" name="background_image_1" label="Gambar Latar belakang 1" :value="$invitation->quote->background_image_1 ?? ''" />
                                        <small class="text-info">Maximal ukuran 5MB.</small>
                                    </div>
                                    <div class="mb-3">
                                        <x-input-file type="text" name="background_image_2" label="Gambar Latar belakang 2" :value="$invitation->quote->background_image_2 ?? ''" />
                                        <small class="text-info">Maximal ukuran 5MB.</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input-file type="text" name="background_image_3" label="Gambar Latar belakang 3" :value="$invitation->quote->background_image_3 ?? ''" />
                                        <small class="text-info">Maximal ukuran 5MB.</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <x-textarea type="text" name="quote_text" :value="$invitation->quote->quote_text ?? ''" label="Teks Kutipan" placeholder="Masukkan Teks Kutipan" class="ckeditor0" rows="3" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Simpan</button>
                        </div>
                    </div>
                </form>

                <h2 id="event" class="section-title">Acara</h2>
                @if (session('success#event') || session('error#event'))
                    <x-alert :type="session('success#event') ? 'success' : 'danger'" :message="session('success#event') ? session('success#event') : session('error#event')" />
                @endif
                <form action="{{ isset($invitation->event) ? route('invitations.sideright-template.action-event', $invitation->event->uuid) : route('invitations.sideright-template.action-event') }}" method="POST">
                    @csrf
                    @if (isset($invitation->event))
                        @method('PUT')
                    @endif
                    <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                    <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                    <input type="hidden" name="event_type_1" id="event_type_1" value="{{ $invitation->event->event_type_1 ?? 'Akad Nikah' }}">
                    <input type="hidden" name="event_type_2" id="event_type_2" value="{{ $invitation->event->event_type_2 ?? 'Resepsi' }}">
                    <input type="hidden" name="event_type_3" id="event_type_3" value="{{ $invitation->event->event_type_3 ?? 'Ngunduh Mantu' }}">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3"><span class="border-bottom">Akad Nikah</span></h5>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input type="datetime-local" name="event_date_1" :value="$invitation->event->event_date_1 ?? ''" label="Tanggal Acara" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="location_1" :value="$invitation->event->location_1 ?? ''" label="Lokasi" placeholder="Masukkan Lokasi" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input type="text" name="address_1" :value="$invitation->event->address_1 ?? ''" label="Alamat" placeholder="Masukkan Alamat" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="map_url_1" :value="$invitation->event->map_url_1 ?? ''" label="Map URL" placeholder="Masukkan Map URL" />
                                    </div>
                                </div>
                            </div>

                            <h5 class="mb-3"><span class="border-bottom">Resepsi</span></h5>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input type="datetime-local" name="event_date_2" :value="$invitation->event->event_date_2 ?? ''" label="Tanggal Acara" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="location_2" :value="$invitation->event->location_2 ?? ''" label="Lokasi" placeholder="Masukkan Lokasi" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input type="text" name="address_2" :value="$invitation->event->address_2 ?? ''" label="Alamat" placeholder="Masukkan Alamat" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="map_url_2" :value="$invitation->event->map_url_2 ?? ''" label="Map URL" placeholder="Masukkan Map URL" />
                                    </div>
                                </div>
                            </div>

                            <h5 class="mb-3"><span class="border-bottom">Ngunduh Mantu</span></h5>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input type="datetime-local" name="event_date_3" :value="$invitation->event->event_date_3 ?? ''" label="Tanggal Acara" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="location_3" :value="$invitation->event->location_3 ?? ''" label="Lokasi" placeholder="Masukkan Lokasi" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input type="text" name="address_3" :value="$invitation->event->address_3 ?? ''" label="Alamat" placeholder="Masukkan Alamat" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="map_url_3" :value="$invitation->event->map_url_3 ?? ''" label="Map URL" placeholder="Masukkan Map URL" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Simpan</button>
                        </div>
                    </div>
                </form>

                <h2 id="love_story" class="section-title">Cerita</h2>
                @if (session('success#love_story') || session('error#love_story'))
                    <x-alert :type="session('success#love_story') ? 'success' : 'danger'" :message="session('success#love_story') ? session('success#love_story') : session('error#love_story')" />
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('invitations.sideright-template.action-love-story') }}" method="POST">
                            @csrf
                            <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                            <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input type="text" name="title" label="Judul" placeholder="Masukkan Judul" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <x-textarea type="text" name="story" label="Cerita" placeholder="Masukkan Cerita" rows="3" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Tambah</button>
                        </form>
                        <div class="table-responsive mt-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Cerita</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($invitation->love_stories->isEmpty())
                                        <tr>
                                            <td colspan="2">Belum ada datanya.</td>
                                        </tr>
                                    @else
                                        @foreach ($invitation->love_stories as $item)
                                            <tr>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->story }}</td>
                                                <td class="text-nowrap width-1">
                                                    <form action="{{ route('invitations.sideright-template.action-love-story', $item->uuid) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                                                        <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h2 id="streaming" class="section-title">Streaming</h2>
                @if (session('success#streaming') || session('error#streaming'))
                    <x-alert :type="session('success#streaming') ? 'success' : 'danger'" :message="session('success#streaming') ? session('success#streaming') : session('error#streaming')" />
                @endif
                <form action="{{ isset($invitation->streaming) ? route('invitations.sideright-template.action-streaming', $invitation->streaming->uuid) : route('invitations.sideright-template.action-streaming') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($invitation->streaming))
                        @method('PUT')
                    @endif
                    <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                    <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <x-input type="text" name="youtube_url_id" :value="$invitation->streaming->youtube_url_id ?? ''" label="Youtube URL ID" placeholder="Masukkan Youtube URL ID" />
                                    <small class="text-info">Contoh ID: https://www.youtube.com/watch?v=ox0sy6ue3SI (ini bagian ID: ox0sy6ue3SI).</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Simpan</button>
                        </div>
                    </div>
                </form>

                <h2 id="gift" class="section-title">Hadiah</h2>
                @if (session('success#gift') || session('error#gift'))
                    <x-alert :type="session('success#gift') ? 'success' : 'danger'" :message="session('success#gift') ? session('success#gift') : session('error#gift')" />
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('invitations.sideright-template.action-gift') }}" method="POST">
                            @csrf
                            <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                            <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-select name="gift_type_name" label="Tipe Hadiah" :options="$gift_types" optionNull="- pilih -" />
                                    </div>
                                </div>
                            </div>
                            <div id="bank_account" class="row d-none">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input type="text" name="account_name" label="Nama Rekening" placeholder="Masukkan Nama Rekening" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input type="text" name="account_number" label="Nomor Rekening" placeholder="Masukkan Nomor Rekening" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input type="text" name="account_holder" label="Nama Pemilik" placeholder="Masukkan Nama Pemilik" />
                                    </div>
                                </div>
                            </div>
                            <div id="package_delivery" class="row d-none">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input type="text" name="recipient_name" label="Nama Penerima" placeholder="Masukkan Nama Penerima" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input type="text" name="recipient_phone_number" label="Nomor Telepon" placeholder="Masukkan Nomor Telepon" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input type="text" name="recipient_address" label="Alamat Penerima" placeholder="Masukkan Alamat" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Tambah</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive mt-4">
                            <div class="mb-3">
                                <h5>Rekening Bank</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Rekening</th>
                                            <th>Nomor Rekening</th>
                                            <th>Nama Pemilik</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $hasBankAccount = false;
                                        @endphp

                                        @foreach ($invitation->gifts as $item)
                                            @if ($item->gift_type_name === 'Rekening Bank')
                                                <tr>
                                                    <td>{{ $item->account_name }}</td>
                                                    <td>{{ $item->account_number }}</td>
                                                    <td>{{ $item->account_holder }}</td>
                                                    <td class="text-nowrap width-1">
                                                        <form action="{{ route('invitations.sideright-template.action-gift', $item->uuid) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                                                            <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @php
                                                    $hasBankAccount = true;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @if (!$hasBankAccount)
                                            <tr>
                                                <td colspan="3">Belum ada datanya.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <h5>Pengiriman Paket</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Penerima</th>
                                            <th>Nomor Telepon</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $hasPackageDelivery = false;
                                        @endphp

                                        @foreach ($invitation->gifts as $item)
                                            @if ($item->gift_type_name === 'Pengiriman Paket')
                                                <tr>
                                                    <td>{{ $item->recipient_name }}</td>
                                                    <td>{{ $item->recipient_phone_number }}</td>
                                                    <td>{{ $item->recipient_address }}</td>
                                                    <td class="text-nowrap width-1">
                                                        <form action="{{ route('invitations.sideright-template.action-gift', $item->uuid) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="invitation_id" value="{{ $invitation->id }}">
                                                            <input type="hidden" name="invitation_uuid" value="{{ $invitation->uuid }}">
                                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @php
                                                    $hasPackageDelivery = true;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @if (!$hasPackageDelivery)
                                            <tr>
                                                <td colspan="3">Belum ada datanya.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <h2 id="gallery" class="section-title">Galeri</h2>
                @if (session('success#gallery') || session('error#gallery'))
                    <x-alert :type="session('success#gallery') ? 'success' : 'danger'" :message="session('success#gallery') ? session('success#gallery') : session('error#gallery')" />
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('invitations.sideright-template.action-gallery') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                            <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input-file type="file" name="photo" label="Foto" />
                                        <small class="text-info">Maximal upload 10 foto dan max ukuran 5MB.</small>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Tambah</button>
                        </form>
                        <div class="mt-4">
                            @if ($invitation->galleries->isEmpty())
                                <div colspan="2">Belum ada datanya.</div>
                            @else
                                <div class="row">
                                    @foreach ($invitation->galleries as $item)
                                        <div class="col-4 col-sm-3 col-md-2 col-lg-2 position-relative mb-3">
                                            <a href="{{ Storage::url($item->photo) }}" target="_blank" data-fancybox="gallery-2">
                                                <img src="{{ Storage::url($item->photo) }}" class="img-thumbnail" style="object-fit: cover; width: 100%; height: 100px" />
                                            </a>
                                            <form action="{{ route('invitations.sideright-template.action-gallery', $item->uuid) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                                                <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                                                <button class="btn btn-sm btn-danger" style="position: absolute; top: 5px; right: 20px; cursor: pointer;" title="Hapus">
                                                    X
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <h2 id="audio" class="section-title">Audio</h2>
                @if (session('success#audio') || session('error#audio'))
                    <x-alert :type="session('success#audio') ? 'success' : 'danger'" :message="session('success#audio') ? session('success#audio') : session('error#audio')" />
                @endif
                <form action="{{ isset($invitation->audio) ? route('invitations.sideright-template.action-audio', $invitation->audio->uuid) : route('invitations.sideright-template.action-audio') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($invitation->audio))
                        @method('PUT')
                    @endif
                    <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                    <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input-file type="text" name="audio_file" label="File Musik" :value="$invitation->audio->audio_file ?? ''" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Simpan</button>
                        </div>
                    </div>
                </form>

                <h2 id="closing" class="section-title">Penutup</h2>
                @if (session('success#closing') || session('error#closing'))
                    <x-alert :type="session('success#closing') ? 'success' : 'danger'" :message="session('success#closing') ? session('success#closing') : session('error#closing')" />
                @endif
                <form action="{{ isset($invitation->closing) ? route('invitations.sideright-template.action-closing', $invitation->closing->uuid) : route('invitations.sideright-template.action-closing') }}" method="POST">
                    @csrf
                    @if (isset($invitation->closing))
                        @method('PUT')
                    @endif
                    <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                    <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                    <div class="card">
                        <div class="card-body">
                            <x-alert :type="'warning'" :message="'Konten akan ditampilkan setelah klik simpan.'" />

                            <div class="row">
                                <div class="col-md-12">
                                    @php
                                        $closing_text = 'Menjadi sebuah kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dalam hari bahagia ini. Terima kasih atas segala ucapan, doa, dan perhatian yang diberikan.';
                                        $closing_greeting = 'Sampai jumpa di hari besar kami!';
                                    @endphp
                                    <div class="mb-3">
                                        <x-textarea type="text" name="closing_text" label="Teks Penutup" :value="$invitation->closing->closing_text ?? $closing_text" placeholder="Masukkan Teks Penutup" rows="2" />
                                    </div>
                                    <div class="mb-3">
                                        <x-textarea type="text" name="closing_greeting" label="Salam Penutup" :value="$invitation->closing->closing_greeting ?? $closing_greeting" placeholder="Masukkan Salam Penutup" rows="2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Simpan</button>
                        </div>
                    </div>
                </form>

                <h2 id="guest" class="section-title">Tamu</h2>
                @if (session('success#guest') || session('error#guest'))
                    <x-alert :type="session('success#guest') ? 'success' : 'danger'" :message="session('success#guest') ? session('success#guest') : session('error#guest')" />
                @endif
                <div class="card">
                    <div class="card-body">
                        <x-alert :type="'warning'" :message="'Pastikan data undangan sudah dilengkapi!'" />

                        <form action="{{ route('invitations.sideright-template.action-guest') }}" method="POST">
                            @csrf
                            <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}">
                            <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="{{ $invitation->uuid }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <x-input type="text" name="guest_name" label="Nama Tamu" placeholder="Masukkan Nama Tamu" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Tambah</button>
                        </form>
                        <div class="mt-4">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-serverside-guests">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>Aksi</th>
                                            <th>Nama Tamu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 id="message" class="section-title">Ucapan</h2>
                @if (session('success#message') || session('error#message'))
                    <x-alert :type="session('success#message') ? 'success' : 'danger'" :message="session('success#message') ? session('success#message') : session('error#message')" />
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="mt-4">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-serverside-messages">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>Aksi</th>
                                            <th>Waktu</th>
                                            <th>Nama</th>
                                            <th>Pesan</th>
                                            <th>Kehadiran</th>
                                            <th>Jumlah Tamu (orang)</th>
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
        </section>
    </div>

    <!-- tombol show invitation mengambang -->
    @php
        $show_invitation_url = $invitation->id . '/' . ($invitation->wedding_couple ? $invitation->wedding_couple->bride_nickname . '&' . $invitation->wedding_couple->groom_nickname : '');
    @endphp

    <a href="#guest" class="btn btn-info" title="Kirim Undangan" style="position: fixed; bottom: 80px; right: 20px; z-index: 1001;">
        <i class="fas fa-paper-plane"></i>
    </a>

    <a href="{{ url($show_invitation_url) }}" class="btn btn-info" title="Lihat Undangan" target="_blank" style="position: fixed; bottom: 30px; right: 20px; z-index: 1000;">
        <i class="fas fa-eye"></i>
    </a>
@endsection

@push('styles')
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            let base_url = "{{ url('/') }}";
            let invitation_id = '{{ $invitation->id }}';
            let invitation_uuid = '{{ $invitation->uuid }}';
            let bride_nickname = '{{ $invitation->wedding_couple->bride_nickname ?? '' }}';
            let groom_nickname = '{{ $invitation->wedding_couple->groom_nickname ?? '' }}';

            $('#gift_type_name').change(function() {
                var selectedValue = $(this).val();
                $('#bank_account input, #package_delivery input').val('');
                $('#bank_account, #package_delivery').addClass('d-none');

                if (selectedValue === 'Rekening Bank') {
                    $('#bank_account').removeClass('d-none');
                } else if (selectedValue === 'Pengiriman Paket') {
                    $('#package_delivery').removeClass('d-none');
                }
            });

            $("#table-serverside-guests").DataTable({
                processing: true,
                serverSide: true,
                order: [],
                ajax: {
                    url: "/invitations/sideright-template/edit/" + invitation_uuid,
                    data: {
                        type: 'guests'
                    }
                },
                columns: [{
                    data: 'uuid',
                    class: 'width-1 text-nowrap',
                    "render": function(data, type, row) {
                        const linkUndangan = `${base_url}/${invitation_id}/${bride_nickname}&${groom_nickname}/${row.guest_name}`;
                        return `
                            <button class="btn btn-info btn-sm copy-link" data-link="${linkUndangan}">
                                Salin Link Undangan
                            </button> 
                            <form action="/invitations/sideright-template/action-guest/${row.uuid}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="invitation_id" id="invitation_id" value="${invitation_id}">
                                <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="${invitation_uuid}">
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button>
                            </form>
                        `;
                    }
                }, {
                    data: 'guest_name',
                    name: 'guest_name'
                }],
                drawCallback: function(settings) {
                    $('.btn').tooltip();
                }
            });

            $(document).on('click', '.copy-link', function() {
                const link = $(this).data('link'); // Ambil link dari data attribute

                // Coba salin link menggunakan Clipboard API
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(link).then(function() {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Link undangan disalin',
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 3000,
                            timerProgressBar: true
                        });
                    }).catch(function() {
                        // Jika gagal, tampilkan SweetAlert error
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal menyalin!',
                            text: 'Terjadi kesalahan saat menyalin link.',
                            confirmButtonText: 'OK'
                        });
                    });
                } else {
                    // Fallback untuk browser yang tidak mendukung Clipboard API
                    var textArea = document.createElement('textarea');
                    textArea.value = link;
                    document.body.appendChild(textArea);
                    textArea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textArea);

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Link undangan disalin',
                        showConfirmButton: false,
                        showCloseButton: true,
                        timer: 3000,
                        timerProgressBar: true
                    });
                }
            });

            $("#table-serverside-messages").DataTable({
                processing: true,
                serverSide: true,
                order: [],
                ajax: {
                    url: "/invitations/sideright-template/edit/" + invitation_uuid,
                    data: {
                        type: 'messages'
                    }
                },
                columns: [{
                    data: 'uuid',
                    class: 'width-1 text-nowrap',
                    "render": function(data, type, row) {
                        return ` 
                            <form action="/invitations/sideright-template/action-message/${row.uuid}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="invitation_id" id="invitation_id" value="${invitation_id}">
                                <input type="hidden" name="invitation_uuid" id="invitation_uuid" value="${invitation_uuid}">
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button>
                            </form>
                        `;
                    }
                }, {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data) {
                        return data ? moment(data).format('YYYY-MM-DD HH:mm') : '';
                    }
                }, {
                    data: 'name',
                    name: 'name'
                }, {
                    data: 'message',
                    name: 'message'
                }, {
                    data: 'presence_confirm',
                    name: 'presence_confirm'
                }, {
                    data: 'guest_totals',
                    name: 'guest_totals'
                }],
                drawCallback: function(settings) {
                    $('.btn').tooltip();
                }
            });

        });
    </script>
@endpush
