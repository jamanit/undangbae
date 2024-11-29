@extends('invitation.sideright-template.V-sideright-layout')

@section('content')
    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        $event_date_1 = $invitation->event->event_date_1 ?? null;
        $event_date_2 = $invitation->event->event_date_2 ?? null;
        $event_date_3 = $invitation->event->event_date_3 ?? null;
        $dates = [Carbon::parse($event_date_1), Carbon::parse($event_date_2), Carbon::parse($event_date_3)];
        $future_dates = array_filter($dates, function ($date) {
            return $date->isFuture();
        });
        $nearest_date = !empty($future_dates) ? min($future_dates) : null;
        $formatted_nearest_date = $nearest_date ? $nearest_date->translatedFormat('d F Y') : 'Tidak ada atau acara sudah selesai';
    @endphp

    <div class="flex flex-col md:flex-row">
        <!-- main cover large section -->
        <section class="fixed z-50 hidden h-screen w-full sm:w-1/2 md:block lg:w-2/3">
            @if ($invitation->cover)
                <img src="{{ Storage::url($invitation->cover->cover_image) }}" class="absolute h-full w-full object-cover" />
            @endif
            <div class="absolute inset-x-0 bottom-0 z-10 h-1/2 bg-gradient-to-b from-transparent to-black opacity-100">
            </div>
            <div class="relative z-10 flex h-full flex-col items-start justify-end pb-12 pl-8 text-primary-green-tosca-400">
                <div data-aos="fade-right">
                    <p class="mb-4 text-lg sm:text-2xl lg:text-4xl">{{ $invitation->transaction->template->template_type->template_type_name ?? '' }}</p>
                    <h2 class="mb-4 font-sacramento text-lg font-semibold sm:text-4xl lg:text-6xl">{{ $invitation->wedding_couple ? $invitation->wedding_couple->bride_nickname . ' & ' . $invitation->wedding_couple->groom_nickname : 'Wanita & Pria' }}</h2>
                    <p class="text-base sm:text-lg md:text-xl lg:text-2xl">Tanggal Acara: {{ $formatted_nearest_date }}</p>
                </div>
            </div>
        </section>

        <!-- audio button -->
        <button id="toggle-audio" class="mt-4 hidden rounded-full bg-primary-green-tosca-500 px-4 py-2 text-sm text-white hover:bg-primary-green-tosca-600">
            <i class="fas fa-pause"></i>
        </button>
        <audio id="background-audio" loop="">
            @if ($invitation->audio)
                <source src="{{ url('/invitations/sideright-template/play-audio/' . $invitation->audio->audio_file) }}" type="audio/mpeg">
                Your browser does not support the audio element.
            @endif
        </audio>

        <div id="content" class="ml-auto h-screen w-full overflow-y-hidden sm:w-1/2 lg:w-1/3">
            <!-- main cover small section -->
            <section class="relative h-screen w-full">
                <img src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/image/green-tosca/main-image.jpg" class="absolute h-full w-full object-cover" alt="Background Image" />

                <div class="relative z-10 flex h-full flex-col items-center justify-center text-center text-primary-green-tosca-400">
                    <div data-aos="fade-down">
                        <p class="text-base">{{ $invitation->transaction->template->template_type->template_type_name ?? '' }}</p>
                        <p class="mt-2 font-sacramento text-3xl font-semibold">{{ $invitation->wedding_couple ? $invitation->wedding_couple->bride_nickname . ' & ' . $invitation->wedding_couple->groom_nickname : 'Wanita & Pria' }}</p>
                    </div>
                    <div data-aos="fade-left">
                        <p class="mt-20 text-base">Kepada Yth,</p>
                        <p class="text-base">Bapak/Ibu/Saudara/i</p>
                        <p class="text-base">{{ $guest_name ? strtoupper($guest_name) : 'KAMU DAN PARTNER' }}</p>
                    </div>
                    <div data-aos="fade-up">
                        <button id="open-invitation" class="mx-auto mt-6 rounded-full bg-primary-green-tosca-500 px-4 py-2 text-base text-white hover:bg-primary-green-tosca-600">
                            <i class="fas fa-envelope"></i> BUKA UNDANGAN
                        </button>
                    </div>
                </div>
            </section>

            <!-- quote section -->
            @if ($invitation->quote)
                <section id="secondary-section" class="relative h-screen w-full">
                    <div class="relative h-full w-full overflow-hidden">
                        <div class="relative z-20 flex h-full items-center px-4 pb-20 text-right">
                            <div class="text-base text-primary-green-tosca-400" data-aos="fade-left" style="z-index: 20">
                                {!! $invitation->quote->quote_text !!}
                            </div>
                        </div>
                        <img src="{{ Storage::url($invitation->quote->background_image_1) }}" class="slide absolute inset-0 h-full w-full object-cover" />
                        <img src="{{ Storage::url($invitation->quote->background_image_2) }}" class="slide absolute inset-0 h-full w-full object-cover" />
                        <img src="{{ Storage::url($invitation->quote->background_image_3) }}" class="slide absolute inset-0 h-full w-full object-cover" />
                        <div class="absolute inset-0 z-10 bg-black opacity-50"></div>
                    </div>
                </section>
            @endif

            <!-- wedding couple section -->
            @if ($invitation->wedding_couple)
                <section class="relative h-full w-full bg-white">
                    <img src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/image/green-tosca/flower-1.png" class="absolute top-0 z-10 w-full object-cover" />

                    <div class="relative px-4 py-44 text-center text-primary-green-tosca-400 overflow-hidden">
                        <div data-aos="fade-down">
                            <p class="mb-4 font-sacramento text-2xl font-semibold">{!! nl2br(e($invitation->wedding_couple->opening_greeting)) !!}</p>

                            <p class="mb-4 text-lg text-gray-500">
                                {!! nl2br(e($invitation->wedding_couple->text_greeting)) !!}
                            </p>
                        </div>

                        <div data-aos="fade-right">
                            <img src="{{ Storage::url($invitation->wedding_couple->bride_photo) }}" class="mx-auto h-[400px] w-2/3 rounded-b-[30%] rounded-t-[30%] border-4 border-primary-green-tosca-400 object-cover" />
                            <p class="mt-4 font-sacramento text-4xl font-semibold">{{ $invitation->wedding_couple->bride_nickname }}</p>
                            <p class="text-lg">{{ $invitation->wedding_couple->bride_full_name }}</p>
                            <p class="text-base text-gray-500">Putri ke {{ $invitation->wedding_couple->bride_child_number }} dari</p>
                            <p class="text-base text-gray-500">{{ $invitation->wedding_couple->bride_father_name . ' & ' . $invitation->wedding_couple->bride_mother_name }}</p>
                        </div>

                        <div data-aos="fade-left">
                            <p class="my-8 font-sacramento text-4xl">&</p>

                            <img src="{{ Storage::url($invitation->wedding_couple->groom_photo) }}" class="mx-auto h-[400px] w-2/3 rounded-b-[30%] rounded-t-[30%] border-4 border-primary-green-tosca-400 object-cover" />
                            <p class="mt-4 font-sacramento text-4xl font-semibold">{{ $invitation->wedding_couple->groom_nickname }}</p>
                            <p class="text-lg">{{ $invitation->wedding_couple->groom_full_name }}</p>
                            <p class="text-base text-gray-500">Putri ke {{ $invitation->wedding_couple->groom_child_number }} dari</p>
                            <p class="text-base text-gray-500">{{ $invitation->wedding_couple->groom_father_name . ' & ' . $invitation->wedding_couple->groom_mother_name }}</p>
                        </div>
                    </div>

                    <div class="relative">
                        <img src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/image/green-tosca/flower-4.png" class="absolute bottom-0 z-10 w-full object-cover" />
                    </div>
                </section>
            @endif

            <!-- event section -->
            @if ($invitation->event)
                <section class="relative h-full w-full bg-gradient-to-l from-black to-gray-800">
                    <img src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/image/green-tosca/flower-2.png" class="absolute w-full object-cover" />
                    <img src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/image/green-tosca/layer-1a.png" class="relative z-10 w-full object-cover px-2 pt-2" />

                    <div class="relative z-10 text-primary-green-tosca-400 overflow-hidden">
                        <img src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/image/green-tosca/layer-1b.png" class="absolute h-full w-full px-2" />

                        <div class="relative z-20 px-8 text-center text-primary-green-tosca-400">
                            @if (!empty(trim($invitation->event->event_date_1)))
                                <div data-aos="fade-right">
                                    <p class="mb-2 font-sacramento text-4xl font-semibold">{{ $invitation->event->event_type_1 }}</p>
                                    <p class="text-2xl">{{ \Carbon\Carbon::parse($invitation->event->event_date_1)->translatedFormat('l, d F Y') }}</p>
                                    <p class="text-2xl">{{ \Carbon\Carbon::parse($invitation->event->event_date_1)->translatedFormat('H:i') }} WIB</p>
                                    <p class="text-base">{{ $invitation->event->location_1 }}</p>
                                    <p class="text-base">
                                        {{ $invitation->event->address_1 }}
                                    </p>
                                    <a href="{{ $invitation->event->map_url_1 }}" target="_blank">
                                        <button class="mx-auto mt-1 rounded-full bg-primary-green-tosca-500 px-4 py-2 text-sm text-white hover:bg-primary-green-tosca-600">
                                            <i class="fas fa-location-dot"></i> Lihat Lokasi
                                        </button>
                                    </a>
                                </div>
                            @endif

                            @if (!empty(trim($invitation->event->event_date_2)))
                                <div class="mb-12"></div>
                                <div data-aos="fade-right">
                                    <p class="mb-2 font-sacramento text-4xl font-semibold">{{ $invitation->event->event_type_2 }}</p>
                                    <p class="text-2xl">{{ \Carbon\Carbon::parse($invitation->event->event_date_2)->translatedFormat('l, d F Y') }}</p>
                                    <p class="text-2xl">{{ \Carbon\Carbon::parse($invitation->event->event_date_2)->translatedFormat('H:i') }} WIB</p>
                                    <p class="text-base">{{ $invitation->event->location_2 }}</p>
                                    <p class="text-base">
                                        {{ $invitation->event->address_2 }}
                                    </p>
                                    <a href="{{ $invitation->event->map_url_2 }}" target="_blank">
                                        <button class="mx-auto mt-1 rounded-full bg-primary-green-tosca-500 px-4 py-2 text-sm text-white hover:bg-primary-green-tosca-600">
                                            <i class="fas fa-location-dot"></i> Lihat Lokasi
                                        </button>
                                    </a>
                                </div>
                            @endif

                            @if (!empty(trim($invitation->event->event_date_3)))
                                <div class="mb-12"></div>
                                <div data-aos="fade-right">
                                    <p class="mb-2 font-sacramento text-4xl font-semibold">{{ $invitation->event->event_type_3 }}</p>
                                    <p class="text-2xl">{{ \Carbon\Carbon::parse($invitation->event->event_date_3)->translatedFormat('l, d F Y') }}</p>
                                    <p class="text-2xl">{{ \Carbon\Carbon::parse($invitation->event->event_date_3)->translatedFormat('H:i') }} WIB</p>
                                    <p class="text-base">{{ $invitation->event->location_3 }}</p>
                                    <p class="text-base">
                                        {{ $invitation->event->address_3 }}
                                    </p>
                                    <a href="{{ $invitation->event->map_url_3 }}" target="_blank">
                                        <button class="mx-auto mt-1 rounded-full bg-primary-green-tosca-500 px-4 py-2 text-sm text-white hover:bg-primary-green-tosca-600">
                                            <i class="fas fa-location-dot"></i> Lihat Lokasi
                                        </button>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <img src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/image/green-tosca/layer-1c.png" class="relative z-10 w-full object-cover px-2 pb-2" />
                    <img src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/image/green-tosca/flower-3.png" class="absolute bottom-0 w-full object-cover" />
                </section>
            @endif

            <!-- gallery section -->
            @if (!$invitation->galleries->isEmpty())
                <section class="relative h-full w-full bg-gradient-to-l from-black to-gray-800">
                    <div class="px-4 py-8">
                        <div data-aos="flip-left">
                            <p class="mb-4 text-center font-sacramento text-4xl font-semibold text-primary-green-tosca-400">
                                Galeri
                            </p>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            @foreach ($invitation->galleries as $item)
                                <a href="{{ Storage::url($item->photo) }}" data-fancybox="gallery" class="group relative">
                                    <div data-aos="flip-left">
                                        <div class="transform overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">
                                            <img src="{{ Storage::url($item->photo) }}" alt="Image 1" class="h-[300px] w-full object-cover" />
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif

            <!-- Streaming Section -->
            @if ($invitation->streaming)
                <section class="relative h-full w-full bg-gradient-to-l from-black to-gray-800">
                    <div class="px-4 py-8">
                        <div data-aos="flip-left">
                            <p class="mb-4 text-center font-sacramento text-4xl font-semibold text-primary-green-tosca-400">
                                Streaming
                            </p>
                        </div>
                        <div data-aos="flip-left">
                            <div class="flex justify-center">
                                <iframe class="rounded-lg" width="560" height="315" src="https://www.youtube.com/embed/{{ $invitation->streaming->youtube_url_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            <!-- love story section -->
            @if (!$invitation->love_stories->isEmpty())
                <section class="relative h-full w-full bg-gradient-to-l from-black to-gray-800">
                    <div class="px-4 py-8">
                        <div data-aos="zoom-in">
                            <p class="mb-4 text-center font-sacramento text-4xl font-semibold text-primary-green-tosca-400">
                                Kisah
                                Cinta
                            </p>
                        </div>
                        @foreach ($invitation->love_stories as $index => $item)
                            <div class="{{ $loop->last ? '' : 'mb-4' }}" data-aos="zoom-in">
                                <div class="mx-auto max-w-4xl rounded-3xl border-2 border-primary-green-tosca-400 bg-white p-4 shadow-lg">
                                    <p class="mb-4 text-center font-sacramento text-2xl font-semibold text-primary-green-tosca-400">
                                        {{ $item->title }}
                                    </p>
                                    <p class="text-justify text-base text-gray-500">
                                        {{ $item->story }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- gift section -->
            @if (!$invitation->gifts->isEmpty())
                <section class="relative h-full w-full bg-gradient-to-l from-black to-gray-800">
                    <div class="px-4 py-8">
                        <div data-aos="flip-right">
                            <p class="mb-4 text-center font-sacramento text-4xl font-semibold text-primary-green-tosca-400">
                                Hadiah
                            </p>
                        </div>
                        <div data-aos="flip-right">
                            <div class="mx-auto max-w-4xl rounded-3xl border-2 border-primary-green-tosca-400 bg-white p-6 shadow-lg">
                                <p class="text-justify text-base text-gray-500">
                                    Bagi yang ingin memberikan tanda kasih, dapat mengirimkan melalui fitur di bawah ini:
                                </p>

                                <button id="open-modal" class="mt-4 w-full rounded-full bg-primary-green-tosca-500 p-3 text-base text-white hover:bg-primary-green-tosca-600">
                                    <i class="fas fa-gift"></i> KIRIM HADIAH
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <div id="gift-modal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
                    <div class="relative mx-4 max-h-[90vh] w-full max-w-md overflow-hidden rounded-3xl bg-white">
                        <div class="flex p-4">
                            <p class="font-sacramento text-4xl font-semibold text-primary-green-tosca-400">Hadiah</p>
                            <button id="close-modal" class="ml-auto text-3xl font-semibold text-gray-600 hover:text-gray-900">
                                &times;
                            </button>
                        </div>
                        <hr class="border-gray-300" />
                        <div class="max-h-[70vh] overflow-y-auto px-4 pb-8 pt-4">
                            <p class="mb-8 text-base font-semibold">
                                Silahkan transfer hadiah melalui nomor rekening maupun dompet digital berikut:
                            </p>

                            @php
                                $bankAccounts = [];
                                $other_gifts = [];
                                foreach ($invitation->gifts as $item) {
                                    if ($item->gift_type_name === 'Rekening Bank') {
                                        $bankAccounts[] = $item;
                                    } else {
                                        $other_gifts[] = $item;
                                    }
                                }
                            @endphp

                            @foreach ($bankAccounts as $item)
                                <div class="relative mb-4">
                                    <img src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/image/green-tosca/card-money.jpg" class="h-40 w-full rounded-3xl border-2 border-primary-green-tosca-400 object-cover" />
                                    <div class="absolute inset-0 flex flex-col items-start justify-center pl-4">
                                        <p class="px-4 py-1 text-2xl font-semibold text-primary-green-tosca-400">{{ $item->account_name }}</p>
                                        <p class="px-4 py-1 text-2xl">
                                            {{ $item->account_number }}
                                            <i id="copy-icon" class="fa-regular fa-copy cursor-pointer hover:text-primary-green-tosca-400" onclick="copyToClipboard('bg-primary-green-tosca-500', '{{ $item->account_number }}')"></i>
                                        </p>
                                        <p class="px-4 py-1 text-2xl">{{ $item->account_holder }}</p>
                                    </div>
                                </div>
                            @endforeach

                            @foreach ($other_gifts as $item)
                                <div class="relative mb-4">
                                    <div class="flex rounded-3xl border-2 border-primary-green-tosca-400 p-2">
                                        <div class="flex items-center px-4">
                                            <i class="fas fa-gift text-3xl text-primary-green-tosca-400"></i>
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <p class="px-1 py-1 text-2xl">{{ $item->recipient_name }}</p>
                                            <p class="base px-1 py-1 text-gray-500">{{ $item->recipient_phone_number }}</p>
                                            <p class="px-1 py-1 text-base">
                                                <span class="text-base text-gray-500">{{ $item->recipient_address }}</span>
                                                <i id="copy-icon" class="fa-regular fa-copy cursor-pointer text-2xl hover:text-primary-green-tosca-400" onclick="copyToClipboard('bg-primary-green-tosca-500', '{{ $item->recipient_name . ' / ' . $item->recipient_phone_number . ' / ' . $item->recipient_address }}')"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="relative mt-8">
                                <p class="text-base font-semibold">Perhatian!</p>
                                <ul class="list-disc pl-4 text-sm text-gray-500">
                                    <li>
                                        Pastikan nama dan nomor rekening sudah sesuai dengan nama mempelai ketika
                                        melakukan proses transfer.
                                    </li>
                                    <li>
                                        Mohon untuk melakukan konfirmasi hadiah anda dengan mengirim bukti transfer/resi
                                        pengiriman kepada mempelai melalui personal message. Terima kasih.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Message Section -->
            <section class="relative h-full w-full bg-gradient-to-l from-black to-gray-800">
                <div class="px-4 py-8">
                    <div data-aos="flip-left">
                        <p class="mb-4 text-center font-sacramento text-4xl font-semibold text-primary-green-tosca-400">
                            Ucapan
                        </p>
                    </div>
                    <div data-aos="flip-left">
                        <div class="mx-auto max-w-4xl rounded-3xl border-2 border-primary-green-tosca-400 bg-white p-6 shadow-lg">
                            <form id="message-form" onsubmit="sendMessage(event, 'bg-primary-green-tosca-500')">
                                <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}" />
                                <div class="mb-4">
                                    <label for="name" class="mb-2 block text-left text-sm font-semibold text-gray-500">Nama</label>
                                    <input type="text" name="name" id="name" placeholder="Masukkan nama Anda" class="w-full rounded-md border border-primary-green-tosca-400 p-3 focus:outline-none focus:ring-2 focus:ring-primary-green-tosca-400" />
                                </div>
                                <div class="mb-4">
                                    <label for="message" class="mb-2 block text-left text-sm font-semibold text-gray-500">Pesan</label>
                                    <textarea name="message" id="message" placeholder="Berikan ucapan serta doa restu Anda" class="w-full rounded-md border border-primary-green-tosca-400 p-3 focus:outline-none focus:ring-2 focus:ring-primary-green-tosca-400" rows="4"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="presence_confirm" class="mb-2 block text-left text-sm font-semibold text-gray-500">Konfirmasi
                                        Kehadiran</label>
                                    <div class="flex space-x-4 text-gray-500">
                                        <label class="flex items-center">
                                            <input type="radio" name="presence_confirm" value="Hadir" class="mr-2" onclick="toggleGuestInput(true)" />
                                            Hadir
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" name="presence_confirm" value="Maaf, saya tidak bisa hadir" class="mr-2" onclick="toggleGuestInput(false)" />
                                            Maaf, saya tidak bisa hadir
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-4" id="guest_input" style="display: none;">
                                    <label for="guest_totals" class="mb-2 block text-left text-sm font-semibold text-white">Jumlah
                                        Tamu</label>
                                    <input type="number" name="guest_totals" id="guest_totals" placeholder="Masukkan jumlah tamu (orang)" class="w-full rounded-md border border-primary-green-tosca-400 p-3 focus:outline-none focus:ring-2 focus:ring-primary-green-tosca-400" />
                                </div>
                                <button type="submit" class="mt-4 w-full rounded-full bg-primary-green-tosca-500 p-3 text-base text-white hover:bg-primary-green-tosca-600">
                                    <i class="fas fa-messages"></i> KIRIM UCAPAN
                                </button>
                            </form>

                            <div id="messages" data-color="text-primary-green-tosca-500" class="mt-8 max-h-96 overflow-y-auto space-y-4 rounded-lg border border-gray-300 p-2">
                                <!-- Pesan akan ditampilkan di sini -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- closing section -->
            @if ($invitation->closing)
                <section class="relative h-full w-full bg-gradient-to-l from-black to-gray-800">
                    <div data-aos="fade-up">
                        <div class="px-4 pt-8 text-center text-primary-green-tosca-400 relative z-20">
                            <p class="mb-16 text-base">
                                {!! nl2br(e($invitation->closing->closing_text)) !!}
                            </p>
                            <p class="mb-4 text-base font-semibold">{!! nl2br(e($invitation->closing->closing_greeting)) !!}</p>
                            <p class="pb-32 font-sacramento text-3xl font-semibold">{{ $invitation->wedding_couple ? $invitation->wedding_couple->bride_nickname . ' & ' . $invitation->wedding_couple->groom_nickname : 'Wanita & Pria' }}</p>
                        </div>
                    </div>
                    <img src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/image/green-tosca/flower-5.png" class="absolute bottom-0 z-10 w-full object-cover" />
                </section>
            @endif

            <!-- footer -->
            <footer class="bg-gradient-to-l from-black to-gray-800">
                <div class="container mx-auto px-4 py-6">
                    <div class="flex flex-col items-center text-white">
                        @if (!$contacts->isEmpty())
                            <div class="mb-4 flex space-x-4">
                                @foreach ($contacts as $item)
                                    <a href="{{ $item->url }}" class="hover:text-primary-green-tosca-400" title="{{ $item->platform }}" target="_blank">
                                        <i class="{{ $item->icon }} text-2xl"></i>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                        @if ($business_profile)
                            <div class="text-center">
                                <p class="text-sm">
                                    Copyright &copy; {{ date('Y', strtotime($business_profile->brand_founding_date)) }} <span class="font-semibold text-primary-green-tosca-400">{{ $business_profile->brand_name }}</span>. All rights reserved.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
