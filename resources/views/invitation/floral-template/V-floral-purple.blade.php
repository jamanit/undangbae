@extends('invitation.floral-template.V-floral-layout')

@push('body-classes')
    bg-purple-400
@endpush

@section('content')
    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    @endphp

    <!-- bottom footer -->
    <div id="bottom-footer" class="z-50 fixed bottom-10 right-0 flex hidden flex-col items-end">
        <div class="flex flex-col w-full justify-end overflow-hidden px-2" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
            <div class="mb-4">
                <button id="toggle-audio" onclick="toggleAudio()" class="rounded-full bg-purple-500 px-4 py-2 text-sm text-white hover:bg-purple-600">
                    <i class="fas fa-pause"></i>
                </button>
                <audio id="background-audio" loop="">
                    @if ($invitation->audio)
                        <source src="{{ url('/invitations/floral-template/play-audio/' . $invitation->audio->audio_file) }}" type="audio/mp3" />
                        Your browser does not support the audio element.
                    @endif
                </audio>
            </div>

            <button id="scrollUp" onclick="scrollUp()" class="rounded-full bg-purple-500 px-4 py-2 text-sm text-white hover:bg-purple-600">
                <i class="fas fa-arrow-up"></i>
            </button>
        </div>
    </div>

    <!-- main background -->
    <div class="z-0 lg:w-1/3 fixed bottom-0 right-0 h-screen w-full">
        <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/0.png" class="inset-0 h-full w-full object-cover" alt="Cover Image" />
    </div>

    <!-- main content -->
    <div id="content" class="z-10 relative h-screen overflow-y-hidden lg:w-1/3">
        <!-- cover section -->
        <section id="cover-section" class="z-10 relative h-screen w-full overflow-hidden">
            <div class="absolute h-full w-full flex justify-start items-center">
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/21.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/22.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/23.png" class="z-20 absolute w-full inset-x-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/24.png" class="z-10 absolute w-full inset-x-0" data-aos="fade-left" />

                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/25.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-up" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/26.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-up" />
            </div>

            <div class="z-30 relative h-full w-full flex items-center justify-center flex-col">
                <p class="mb-4 text-base text-purple-400 font-semibold" data-aos="fade-down">{{ $invitation->transaction->template->template_type->template_type_name ?? '' }}</p>

                <div class="flex flex-col items-center justify-center mb-4">
                    <div class="z-40 absolute flex flex-col text-center" data-aos="zoom-in">
                        <p class="font-sacramento text-4xl font-semibold text-purple-400">{{ $invitation->wedding_couple ? $invitation->wedding_couple->bride_nickname : 'Wanita' }}</p>
                        <p class="font-sacramento text-4xl font-semibold text-purple-400">&</p>
                        <p class="font-sacramento text-4xl font-semibold text-purple-400">{{ $invitation->wedding_couple ? $invitation->wedding_couple->groom_nickname : 'Pria' }}</p>
                    </div>
                    <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/11.png" class="z-30 w-full h-full" data-aos="zoom-in" />
                </div>

                <div data-aos="fade-up" data-aos-offset="50">
                    <div class="text-center border-2 border-purple-500 rounded-lg p-2 bg-white/75">
                        <p class="text-base text-gray-600">Kepada Yth,</p>
                        <p class="text-base text-gray-600">Bapak/Ibu/Saudara/i</p>
                        <p class="text-base text-gray-600">{{ $guest_name ? strtoupper($guest_name) : 'KAMU DAN PARTNER' }}</p>
                    </div>

                    <button onclick="openInvitation()" class="mx-auto mt-6 rounded-full bg-purple-500 px-4 py-2 text-base text-white hover:bg-purple-600">
                        <i class="fas fa-envelope"></i> BUKA UNDANGAN
                    </button>
                </div>
            </div>
        </section>

        <!-- quote section -->
        <section id="quote-section" class="z-10 relative min-h-screen w-full overflow-hidden">
            <div class="absolute h-full w-full flex justify-start items-center">
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
            </div>

            <div class="z-30 relative min-h-screen w-full px-4 py-8 flex flex-col items-center justify-center">
                <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-purple-400" data-aos="fade-right">
                    Kutipan
                </p>
                <div class="px-2">
                    @if ($invitation->quote)
                        <div class="mb-4 text-base text-purple-400 text-justify" data-aos="fade-right">
                            {!! $invitation->quote->quote_text !!}
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- wedding couple section -->
        <section id="wedding-couple-section" class="z-10 relative min-h-screen w-full overflow-hidden">
            <div class="absolute h-full w-full flex justify-start items-center">
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
            </div>

            <div class="z-30 px-4 py-8 relative min-h-screen w-full flex flex-col items-center justify-center">
                <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-purple-400" data-aos="fade-down">
                    Mempelai
                </p>
                <div class="px-2">
                    @if ($invitation->wedding_couple)
                        <div class="mb-4 text-center" data-aos="fade-down">
                            <p class="font-sacramento text-2xl font-semibold text-gray-600">{!! nl2br(e($invitation->wedding_couple->opening_greeting)) !!}</p>
                            <p class="text-base text-gray-600">{!! nl2br(e($invitation->wedding_couple->text_greeting)) !!}</p>
                        </div>

                        <div class="mb-4 flex items-center space-x-4 justify-start" data-aos="fade-right">
                            <img src="{{ Storage::url($invitation->wedding_couple->bride_photo) }}" class="mb-2 h-36 w-28 rounded-b-[30%] rounded-t-[30%] border-4 border-purple-400 object-cover" />
                            <div class="text-left">
                                <p class="font-sacramento text-4xl font-semibold text-purple-400">{{ $invitation->wedding_couple->bride_nickname }}</p>
                                <p class="text-base text-gray-600 font-semibold">{{ $invitation->wedding_couple->bride_full_name }}</p>
                                <p class="text-base text-gray-600">Putri ke {{ $invitation->wedding_couple->bride_child_number }} dari</p>
                                <p class="text-base text-gray-600 font-semibold">{{ $invitation->wedding_couple->bride_father_name . ' & ' . $invitation->wedding_couple->bride_mother_name }}</p>
                            </div>
                        </div>

                        <div data-aos="fade-left">
                            <div class="mb-4 flex justify-center">
                                <p class="font-sacramento text-4xl font-semibold text-purple-400">&</p>
                            </div>
                            <div class="mb-4 flex items-center space-x-4 justify-end">
                                <div class="text-right">
                                    <p class="font-sacramento text-4xl font-semibold text-purple-400">{{ $invitation->wedding_couple->groom_nickname }}</p>
                                    <p class="text-base text-gray-600 font-semibold">{{ $invitation->wedding_couple->groom_full_name }}</p>
                                    <p class="text-base text-gray-600">Putra ke {{ $invitation->wedding_couple->groom_child_number }} dari</p>
                                    <p class="text-base text-gray-600 font-semibold">{{ $invitation->wedding_couple->groom_father_name . ' & ' . $invitation->wedding_couple->groom_mother_name }}</p>
                                </div>
                                <img src="{{ Storage::url($invitation->wedding_couple->groom_photo) }}" class="mb-2 h-36 w-28 rounded-b-[30%] rounded-t-[30%] border-4 border-purple-400 object-cover" />
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- event section -->
        <section id="event-section" class="z-10 relative min-h-screen w-full overflow-hidden">
            <div class="absolute h-full w-full flex justify-start items-center">
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
            </div>

            <div class="z-30 relative px-4 py-8 min-h-screen w-full flex flex-col items-center justify-center">
                <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-purple-400" data-aos="fade-right">
                    Acara
                </p>

                @if ($invitation->event)
                    @php
                        $event_date_1 = $invitation->event->event_date_1 ?? null;
                        $event_date_2 = $invitation->event->event_date_2 ?? null;
                        $event_date_3 = $invitation->event->event_date_3 ?? null;
                        $dates = [Carbon::parse($event_date_1), Carbon::parse($event_date_2), Carbon::parse($event_date_3)];
                        $future_dates = array_filter($dates, function ($date) {
                            return $date->isFuture();
                        });
                        $nearest_date = !empty($future_dates) ? min($future_dates) : null;
                    @endphp

                    <div id="countdown" data-countdown="{{ $nearest_date }}" class="mb-4 flex justify-center gap-2" data-aos="fade-left">
                        <div class="bg-white/75 border-2 border-purple-500 rounded-lg p-2 shadow-lg w-15 text-center">
                            <span id="days" class="text-xl font-bold text-purple-500">00</span>
                            <div class="text-sm text-gray-600">Hari</div>
                        </div>
                        <div class="bg-white/75 border-2 border-purple-500 rounded-lg p-2 shadow-lg w-15 text-center">
                            <span id="hours" class="text-xl font-bold text-purple-500">00</span>
                            <div class="text-sm text-gray-600">Jam</div>
                        </div>
                        <div class="bg-white/75 border-2 border-purple-500 rounded-lg p-2 shadow-lg w-15 text-center">
                            <span id="minutes" class="text-xl font-bold text-purple-500">00</span>
                            <div class="text-sm text-gray-600">Menit</div>
                        </div>
                        <div class="bg-white/75 border-2 border-purple-500 rounded-lg p-2 shadow-lg w-15 text-center">
                            <span id="seconds" class="text-xl font-bold text-purple-500">00</span>
                            <div class="text-sm text-gray-600">Detik</div>
                        </div>
                    </div>

                    @if ($invitation->event && !empty(trim($invitation->event->event_date_1)))
                        <div class="mb-4 w-full rounded-lg border-2 border-purple-400 bg-white/75 p-4 text-center text-gray-600 shadow-lg" data-aos="fade-right">
                            <p class="mb-2 font-sacramento text-4xl font-semibold text-purple-400">{{ $invitation->event->event_type_1 }}</p>
                            <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($invitation->event->event_date_1)->translatedFormat('l, d F Y') }}</p>
                            <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($invitation->event->event_date_1)->translatedFormat('H:i') }} WIB</p>
                            <p class="text-base">{{ $invitation->event->location_1 }}</p>
                            <p class="mb-4 text-base"> {{ $invitation->event->address_1 }}</p>
                            <a href="{{ $invitation->event->map_url_1 }}" target="_blank">
                                <button class="mx-auto mt-1 rounded-full bg-purple-500 px-4 py-2 text-sm text-white hover:bg-purple-600">
                                    <i class="fas fa-location-dot"></i> Lihat Lokasi
                                </button>
                            </a>
                        </div>
                    @endif

                    @if ($invitation->event && !empty(trim($invitation->event->event_date_2)))
                        <div class="mb-4 w-full rounded-lg border-2 border-purple-400 bg-white/75 p-4 text-center text-gray-600 shadow-lg" data-aos="fade-left">
                            <p class="mb-2 font-sacramento text-4xl font-semibold text-purple-400">{{ $invitation->event->event_type_2 }}</p>
                            <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($invitation->event->event_date_2)->translatedFormat('l, d F Y') }}</p>
                            <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($invitation->event->event_date_2)->translatedFormat('H:i') }} WIB</p>
                            <p class="text-base">{{ $invitation->event->location_2 }}</p>
                            <p class="mb-4 text-base"> {{ $invitation->event->address_2 }}</p>
                            <a href="{{ $invitation->event->map_url_2 }}" target="_blank">
                                <button class="mx-auto mt-1 rounded-full bg-purple-500 px-4 py-2 text-sm text-white hover:bg-purple-600">
                                    <i class="fas fa-location-dot"></i> Lihat Lokasi
                                </button>
                            </a>
                        </div>
                    @endif

                    @if ($invitation->event && !empty(trim($invitation->event->event_date_3)))
                        <div class="mb-4 w-full rounded-lg border-2 border-purple-400 bg-white/75 p-4 text-center text-gray-600 shadow-lg" data-aos="fade-right">
                            <p class="mb-2 font-sacramento text-4xl font-semibold text-purple-400">{{ $invitation->event->event_type_3 }}</p>
                            <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($invitation->event->event_date_3)->translatedFormat('l, d F Y') }}</p>
                            <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($invitation->event->event_date_3)->translatedFormat('H:i') }} WIB</p>
                            <p class="text-base">{{ $invitation->event->location_3 }}</p>
                            <p class="mb-4 text-base"> {{ $invitation->event->address_3 }}</p>
                            <a href="{{ $invitation->event->map_url_3 }}" target="_blank">
                                <button class="mx-auto mt-1 rounded-full bg-purple-500 px-4 py-2 text-sm text-white hover:bg-purple-600">
                                    <i class="fas fa-location-dot"></i> Lihat Lokasi
                                </button>
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </section>

        <!-- gallery & streaming -->
        <section id="gallery-streaming-section" class="z-10 relative min-h-screen w-full overflow-hidden">
            <div class="absolute h-full w-full flex justify-start items-center">
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
            </div>

            <div class="z-30 relative px-4 py-8 min-h-screen w-full flex flex-col items-center justify-center">
                <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-purple-400" data-aos="flip-left">
                    Galeri
                </p>

                @if (!$invitation->galleries->isEmpty())
                    <div class="mb-4">
                        <div class="grid grid-cols-3 gap-6">
                            @foreach ($invitation->galleries as $item)
                                <a href="{{ Storage::url($item->photo) }}" data-fancybox="gallery" class="group relative">
                                    <div data-aos="flip-left">
                                        <div class="transform overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">
                                            <img src="{{ Storage::url($item->photo) }}" alt="Image 1" class="h-[150px] w-full object-cover" />
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-purple-400" data-aos="flip-left">
                    Streaming
                </p>
                @if ($invitation->streaming)
                    <div class="mb-4" data-aos="flip-left">
                        <iframe class="rounded-lg" width="100%" height="250" src="https://www.youtube.com/embed/{{ $invitation->streaming->youtube_url_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                    </div>
                @endif
            </div>
        </section>

        <!-- love story section -->
        <section id="love-story-section" class="z-10 relative min-h-screen w-full overflow-hidden">
            <div class="absolute h-full w-full flex justify-start items-center">
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
            </div>

            <div class="z-30 relative px-4 py-8 min-h-screen w-full flex flex-col items-center justify-center">
                <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-purple-400" data-aos="fade-up">
                    Kisah Cinta
                </p>

                @if (!$invitation->love_stories->isEmpty())
                    @foreach ($invitation->love_stories as $index => $item)
                        <div class="mb-4 w-full rounded-lg border-2 border-purple-400 bg-white/75 p-4 text-center text-gray-600 shadow-lg" data-aos="fade-up">
                            <p class="mb-4 text-center font-sacramento text-2xl font-semibold text-purple-400">
                                {{ $item->title }}
                            </p>
                            <p class="text-justify text-base">
                                {{ $item->story }}
                            </p>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        <!-- message & gift section -->
        <section id="message-gift-section" class="z-10 relative min-h-screen w-full overflow-hidden">
            <div class="absolute h-full w-full flex justify-start items-center">
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
            </div>

            <div class="z-30 relative px-4 py-8 min-h-screen w-full flex flex-col items-center justify-center">
                <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-purple-400" data-aos="zoom-in">
                    Ucapan
                </p>
                <div class="mb-4 w-full rounded-lg border-2 border-purple-400 bg-white/75 p-4 shadow-lg" data-aos="zoom-in">
                    <form id="message-form" onsubmit="sendMessage(event, 'bg-purple-500')">
                        <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}" />
                        <div class="mb-4">
                            <label for="name" class="mb-2 block text-left text-sm font-semibold text-gray-600">Nama</label>
                            <input type="text" name="name" id="name" placeholder="Masukkan nama Anda" class="w-full rounded-lg border border-purple-400 p-3 focus:outline-none focus:ring-2 focus:ring-purple-400" />
                        </div>
                        <div class="mb-4">
                            <label for="message" class="mb-2 block text-left text-sm font-semibold text-gray-600">Pesan</label>
                            <textarea name="message" id="message" placeholder="Berikan ucapan serta doa restu Anda" class="w-full rounded-lg border border-purple-400 p-3 focus:outline-none focus:ring-2 focus:ring-purple-400" rows="2"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="presence_confirm" class="mb-2 block text-left text-sm font-semibold text-gray-600">Konfirmasi
                                Kehadiran</label>
                            <div class="flex space-x-4 text-gray-600">
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
                        <div class="mb-4" id="guest_input" style="display: none">
                            <label for="guest_totals" class="mb-2 block text-left text-sm font-semibold text-gray-600">Jumlah Tamu</label>
                            <input type="number" name="guest_totals" id="guest_totals" placeholder="Masukkan jumlah tamu (orang)" class="w-full rounded-lg border border-purple-400 p-3 focus:outline-none focus:ring-2 focus:ring-purple-400" />
                        </div>
                        <button type="submit" class="mt-4 w-full rounded-full bg-purple-500 p-2 text-base text-white hover:bg-purple-600">
                            <i class="fas fa-message"></i> KIRIM UCAPAN
                        </button>
                    </form>

                    <div id="messages" class="mt-8 max-h-96 overflow-y-auto space-y-4 rounded-lg border border-gray-300 p-2">
                        <!-- Pesan akan ditampilkan di sini -->
                    </div>
                </div>

                <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-purple-400" data-aos="zoom-in">
                    Hadiah
                </p>
                @if (!$invitation->gifts->isEmpty())
                    <div class="mb-4 w-full rounded-lg border-2 border-purple-400 bg-white/75 p-4 shadow-lg" data-aos="zoom-in">
                        <p class="mb-8 text-justify text-base text-gray-600">
                            Bagi yang ingin memberikan tanda kasih, dapat mengirimkan melalui fitur di bawah ini:
                        </p>
                        <button id="open-modal" class="w-full rounded-full bg-purple-500 p-2 text-base text-white hover:bg-purple-600">
                            <i class="fas fa-gift"></i> KIRIM HADIAH
                        </button>
                    </div>
                @endif
            </div>
        </section>

        @if (!$invitation->gifts->isEmpty())
            <div id="gift-modal" class="fixed inset-0 z-50 flex hidden justify-center bg-black bg-opacity-50 py-4">
                <div class="relative mx-4 max-h-[80vh] w-full max-w-md overflow-hidden rounded-lg bg-white">
                    <div class="flex p-4">
                        <p class="font-sacramento text-4xl font-semibold text-purple-400">Hadiah</p>
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
                                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/card-money.jpg" class="h-40 w-full rounded-3xl border-2 border-purple-400 object-cover" />
                                <div class="absolute inset-0 flex flex-col items-start justify-center pl-4">
                                    <p class="px-4 py-1 text-2xl font-semibold text-purple-400">{{ $item->account_name }}</p>
                                    <p class="px-4 py-1 text-2xl">
                                        {{ $item->account_number }}
                                        <i id="copy-icosn" class="fa-regular fa-copy cursor-pointer hover:text-purple-400" onclick="copyToClipboard('bg-purple-500', '{{ $item->account_number }}')"></i>
                                    </p>
                                    <p class="px-4 py-1 text-2xl">{{ $item->account_holder }}</p>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($other_gifts as $item)
                            <div class="relative mb-4">
                                <div class="flex rounded-3xl border-2 border-purple-400 p-2">
                                    <div class="flex items-center px-4">
                                        <i class="fas fa-gift text-3xl text-purple-400"></i>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <p class="px-1 py-1 text-2xl">{{ $item->recipient_name }}</p>
                                        <p class="base px-1 py-1 text-gray-600">{{ $item->recipient_phone_number }}</p>
                                        <p class="px-1 py-1 text-base">
                                            <span class="text-base text-gray-600">{{ $item->recipient_address }}</span>
                                            <i class="fa-regular fa-copy cursor-pointer text-2xl hover:text-purple-400" onclick="copyToClipboard('bg-purple-500', '{{ $item->recipient_name . ' / ' . $item->recipient_phone_number . ' / ' . $item->recipient_address }}')"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="relative mt-8">
                            <p class="text-base font-semibold">Perhatian!</p>
                            <ul class="list-disc pl-4 text-sm text-gray-600">
                                <li>
                                    Pastikan nama dan nomor rekening sudah sesuai dengan nama mempelai ketika melakukan
                                    proses
                                    transfer.
                                </li>
                                <li>
                                    Mohon untuk melakukan konfirmasi hadiah anda dengan mengirim bukti transfer/resi
                                    pengiriman
                                    kepada
                                    mempelai melalui personal message. Terima kasih.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- closing section -->
        <section id="closing-section" class="z-10 relative h-full w-full overflow-hidden">
            <div class="absolute h-full w-full flex justify-start items-center">
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
            </div>

            <div class="z-30 relative px-4 py-8 flex flex-col items-center justify-center">
                <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-purple-400" data-aos="fade-down">
                    Penutup
                </p>
                <div class="px-2">
                    @if ($invitation->closing)
                        <div class="mb-4 text-center">
                            <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/45.png" class="z-20 w-full inset-x-0 mb-4" data-aos="fade-down" />
                            <p class="mb-16 text-base text-gray-600" data-aos="fade-down">
                                {!! nl2br(e($invitation->closing->closing_text)) !!}
                            </p>
                            <p class="mb-4 text-base font-semibold text-gray-600" data-aos="fade-up">{!! nl2br(e($invitation->closing->closing_greeting)) !!}</p>
                            <p class="mb-4 font-sacramento text-4xl font-semibold text-purple-400" data-aos="fade-up">
                                {{ $invitation->wedding_couple ? $invitation->wedding_couple->bride_nickname . ' & ' . $invitation->wedding_couple->groom_nickname : 'Wanita & Pria' }}
                            </p>
                            <img src="{{ asset('/') }}invitation-templates/jm-floral/dist/assets/image/purple/46.png" class="z-20 w-full inset-x-0 mb-4" data-aos="fade-up" />
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- footer -->
        <footer class="z-10 relative bg-gray-800">
            <div class="container mx-auto px-4 py-6">
                <div class="flex flex-col items-center text-white">
                    <div class="mb-4 flex space-x-4">
                        <a href="#" class="hover:text-purple-400" title="WhatsApp" target="_blank">
                            <i class="fab fa-whatsapp text-2xl"></i>
                        </a>
                        <a href="#" class="hover:text-purple-400" title="Instagram" target="_blank">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                        <a href="#" class="hover:text-purple-400" title="Website" target="_blank">
                            <i class="fas fa-globe text-2xl"></i>
                        </a>
                    </div>
                    <div class="text-center">
                        <p class="text-sm">
                            Copyright &copy; 2024 <span class="font-semibold text-purple-400">UndangBae</span>.
                            All
                            rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </div>
@endsection
