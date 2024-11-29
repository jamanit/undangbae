@extends('invitation.calm-template.V-calm-layout')

@push('body-classes')
    bg-blue-400
@endpush

@section('content')
    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    @endphp

    <div class="flex h-screen w-full items-center justify-center bg-primary-blue-400 font-worksans">
        <!-- main background -->
        <div class="fixed z-0 h-screen w-full lg:w-1/3">
            <img src="{{ asset('/') }}invitation-templates/jm-calm/storage/cover/blue-cover-image.jpg" class="inset-0 z-0 h-full w-full object-cover" alt="Cover Image" />
            <div class="absolute inset-0 z-10 h-full w-full bg-black opacity-25"></div>
        </div>

        <!-- footer -->
        <footer id="bottom-footer" class="fixed bottom-0 z-40 flex hidden w-full flex-col items-center px-2">
            <!-- Audio Button -->
            <div class="mb-2 flex w-full justify-end overflow-hidden lg:w-1/3">
                <button id="toggle-audio" onclick="toggleAudio()" class="rounded-full bg-blue-500 px-4 py-2 text-sm text-white hover:bg-blue-600" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                    <i class="fas fa-pause"></i>
                </button>
                <audio id="background-audio" loop="">
                    @if ($invitation->audio)
                        <source src="{{ url('/invitations/calm-template/play-audio/' . $invitation->audio->audio_file) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    @endif
                </audio>
            </div>

            <!-- Bottom Menu -->
            <div id="menu" class="flex w-full overflow-x-auto rounded-lg bg-gray-800 py-2 text-white lg:w-1/3" data-aos="fade-up" data-aos-offset="50" data-aos-duration="500">
                <div class="flex space-x-4 px-4">
                    <div class="menu-item flex w-20 cursor-pointer flex-col items-center rounded-lg bg-gray-700 text-blue-400 transition duration-300 hover:bg-gray-700 hover:text-blue-400" onclick="setActive(this, 'cover-section', 'text-blue-400')">
                        <i class="fas fa-envelope text-base"></i>
                        <span class="text-base">Cover</span>
                    </div>
                    <div class="menu-item flex w-20 cursor-pointer flex-col items-center rounded-lg transition duration-300 hover:bg-gray-700 hover:text-blue-400" onclick="setActive(this, 'quote-section', 'text-blue-400')">
                        <i class="fas fa-quote-left text-base"></i>
                        <span class="text-base">Kutipan</span>
                    </div>
                    <div class="menu-item flex w-20 cursor-pointer flex-col items-center rounded-lg transition duration-300 hover:bg-gray-700 hover:text-blue-400" onclick="setActive(this, 'wedding-couple-section', 'text-blue-400')">
                        <i class="fas fa-heart text-base"></i>
                        <span class="text-base">Mempelai</span>
                    </div>
                    <div class="menu-item flex w-20 cursor-pointer flex-col items-center rounded-lg transition duration-300 hover:bg-gray-700 hover:text-blue-400" onclick="setActive(this, 'event-section', 'text-blue-400')">
                        <i class="fas fa-calendar-alt text-base"></i>
                        <span class="text-base">Acara</span>
                    </div>
                    <div class="menu-item flex w-20 cursor-pointer flex-col items-center rounded-lg transition duration-300 hover:bg-gray-700 hover:text-blue-400" onclick="setActive(this, 'message-section', 'text-blue-400')">
                        <i class="fas fa-message text-base"></i>
                        <span class="text-base">Ucapan</span>
                    </div>
                    <div class="menu-item flex w-20 cursor-pointer flex-col items-center rounded-lg transition duration-300 hover:bg-gray-700 hover:text-blue-400" onclick="setActive(this, 'love-story-section', 'text-blue-400')">
                        <i class="fas fa-sticky-note text-base"></i>
                        <span class="text-base">Cerita</span>
                    </div>
                    <div class="menu-item flex w-20 cursor-pointer flex-col items-center rounded-lg transition duration-300 hover:bg-gray-700 hover:text-blue-400" onclick="setActive(this, 'gallery-section', 'text-blue-400')">
                        <i class="fas fa-image text-base"></i>
                        <span class="text-base">Galeri</span>
                    </div>
                    <div class="menu-item flex w-20 cursor-pointer flex-col items-center rounded-lg transition duration-300 hover:bg-gray-700 hover:text-blue-400" onclick="setActive(this, 'streaming-section', 'text-blue-400')">
                        <i class="fas fa-video text-base"></i>
                        <span class="text-base">Streaming</span>
                    </div>
                    <div class="menu-item flex w-20 cursor-pointer flex-col items-center rounded-lg transition duration-300 hover:bg-gray-700 hover:text-blue-400" onclick="setActive(this, 'gift-section', 'text-blue-400')">
                        <i class="fas fa-gift text-base"></i>
                        <span class="text-base">Hadiah</span>
                    </div>
                    <div class="menu-item flex w-20 cursor-pointer flex-col items-center rounded-lg transition duration-300 hover:bg-gray-700 hover:text-blue-400" onclick="setActive(this, 'closing-section', 'text-blue-400')">
                        <i class="fas fa-door-closed text-base"></i>
                        <span class="text-base">Penutup</span>
                    </div>
                    <div class="menu-item flex w-20 cursor-pointer flex-col items-center rounded-lg transition duration-300 hover:bg-gray-700 hover:text-blue-400" onclick="setActive(this, 'cr-section', 'text-blue-400')">
                        <i class="fas fa-copyright text-base"></i>
                        <span class="text-base">Copyright</span>
                    </div>
                </div>
            </div>
        </footer>

        <!-- main content -->
        <div class="relative z-20 h-full w-full lg:w-1/3">
            <!-- cover section -->
            <section id="cover-section" class="relative h-auto w-full overflow-hidden">
                <div class="relative w-full">
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-1.png" class="absolute left-0 top-0 z-20 w-2/6" data-aos="fade-right" />
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-2.png" class="absolute right-0 top-0 z-20 w-2/6" data-aos="fade-left" />
                </div>

                <div class="relative z-30 mx-4 my-4 flex h-screen flex-col items-center justify-center">
                    <div class="text-center" data-aos="fade-down">
                        <p class="mb-4 text-base text-white">{{ $invitation->transaction->template->template_type->template_type_name ?? '' }}</p>
                        <p class="mb-16 font-sacramento text-4xl font-semibold text-blue-400">{{ $invitation->wedding_couple ? $invitation->wedding_couple->bride_nickname . ' & ' . $invitation->wedding_couple->groom_nickname : 'Wanita & Pria' }}</p>
                    </div>

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

                    <div id="countdown" data-countdown="{{ $nearest_date }}" class="flex justify-center gap-2 mb-4" data-aos="zoom-in">
                        <div class="bg-white/50 border-2 border-blue-500 rounded-lg p-2 shadow-lg w-15 text-center">
                            <span id="days" class="text-xl font-bold text-blue-500">00</span>
                            <div class="text-sm text-white">Hari</div>
                        </div>
                        <div class="bg-white/50 border-2 border-blue-500 rounded-lg p-2 shadow-lg w-15 text-center">
                            <span id="hours" class="text-xl font-bold text-blue-500">00</span>
                            <div class="text-sm text-white">Jam</div>
                        </div>
                        <div class="bg-white/50 border-2 border-blue-500 rounded-lg p-2 shadow-lg w-15 text-center">
                            <span id="minutes" class="text-xl font-bold text-blue-500">00</span>
                            <div class="text-sm text-white">Menit</div>
                        </div>
                        <div class="bg-white/50 border-2 border-blue-500 rounded-lg p-2 shadow-lg w-15 text-center">
                            <span id="seconds" class="text-xl font-bold text-blue-500">00</span>
                            <div class="text-sm text-white">Detik</div>
                        </div>
                    </div>

                    <div class="text-center" data-aos="fade-up">
                        <p class="text-base text-white">Kepada Yth,</p>
                        <p class="text-base text-white">Bapak/Ibu/Saudara/i</p>
                        <p class="text-base text-white">{{ $guest_name ? strtoupper($guest_name) : 'KAMU DAN PARTNER' }}</p>
                        <button onclick="openInvitation('text-blue-400')" class="mx-auto mt-6 rounded-full bg-blue-500 px-4 py-2 text-base text-white hover:bg-blue-600">
                            <i class="fas fa-envelope"></i> BUKA UNDANGAN
                        </button>
                    </div>
                </div>
            </section>

            <!-- quote section -->
            <section id="quote-section" class="relative hidden h-auto w-full overflow-hidden">
                <div class="relative w-full">
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-1.png" class="absolute left-0 top-0 z-20 w-2/6" data-aos="fade-right" />
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-2.png" class="absolute right-0 top-0 z-20 w-2/6" data-aos="fade-left" />
                </div>

                <div class="relative z-30 mx-4 my-4 mb-28 flex h-screen flex-col items-center justify-center">
                    @if ($invitation->quote)
                        <div class="text-right text-base text-white" data-aos="fade-left">
                            {!! $invitation->quote->quote_text !!}
                        </div>
                    @endif
                </div>
            </section>

            <!-- wedding couple section -->
            <section id="wedding-couple-section" class="relative hidden h-auto w-full overflow-hidden">
                <div class="relative w-full">
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-1.png" class="absolute left-0 top-0 z-20 w-2/6" data-aos="fade-right" />
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-2.png" class="absolute right-0 top-0 z-20 w-2/6" data-aos="fade-left" />
                </div>

                <div class="relative z-30 mx-4 my-4 mb-28 flex h-full flex-col items-center">
                    @if ($invitation->wedding_couple)
                        <div class="flex flex-col items-center" data-aos="fade-down">
                            <img src="{{ Storage::url($invitation->wedding_couple->bride_photo) }}" class="mb-2 h-24 w-24 rounded-full border-4 border-blue-400 object-cover" />
                            <p class="font-sacramento text-4xl font-semibold text-blue-400">{{ $invitation->wedding_couple->bride_nickname }}</p>
                            <p class="text-base text-white">{{ $invitation->wedding_couple->bride_full_name }}</p>
                            <p class="text-base text-white">Putri ke {{ $invitation->wedding_couple->bride_child_number }} dari</p>
                            <p class="text-base text-white">{{ $invitation->wedding_couple->bride_father_name . ' & ' . $invitation->wedding_couple->bride_mother_name }}</p>
                        </div>
                        <div class="flex flex-col items-center" data-aos="fade-up">
                            <p class="my-6 font-sacramento text-4xl font-semibold text-blue-400">&</p>

                            <img src="{{ Storage::url($invitation->wedding_couple->groom_photo) }}" class="mb-2 h-24 w-24 rounded-full border-4 border-blue-400 object-cover" />
                            <p class="font-sacramento text-4xl font-semibold text-blue-400">{{ $invitation->wedding_couple->groom_nickname }}</p>
                            <p class="text-base text-white">{{ $invitation->wedding_couple->groom_full_name }}</p>
                            <p class="text-base text-white">Putra ke {{ $invitation->wedding_couple->groom_child_number }} dari</p>
                            <p class="text-base text-white">{{ $invitation->wedding_couple->groom_father_name . ' & ' . $invitation->wedding_couple->groom_mother_name }}</p>
                        </div>
                    @endif
                </div>
            </section>

            <!-- event section -->
            <section id="event-section" class="relative hidden h-auto w-full overflow-hidden">
                <div class="relative w-full">
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-1.png" class="absolute left-0 top-0 z-20 w-2/6" data-aos="fade-right" />
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-2.png" class="absolute right-0 top-0 z-20 w-2/6" data-aos="fade-left" />
                </div>

                <div class="relative z-30 mx-4 my-4 mb-28 mt-10 flex h-full flex-col items-center">
                    @if ($invitation->event && !empty(trim($invitation->event->event_date_1)))
                        <div class="mb-4 w-full rounded-lg border-2 border-blue-400 bg-white/75 p-6 text-center text-gray-600 shadow-lg" data-aos="zoom-in">
                            <p class="mb-2 font-sacramento text-4xl font-semibold text-blue-400">{{ $invitation->event->event_type_1 }}</p>
                            <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($invitation->event->event_date_1)->translatedFormat('l, d F Y') }}</p>
                            <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($invitation->event->event_date_1)->translatedFormat('H:i') }} WIB</p>
                            <p class="text-base">{{ $invitation->event->location_1 }}</p>
                            <p class="mb-4 text-base">
                                {{ $invitation->event->address_1 }}
                            </p>
                            <a href="{{ $invitation->event->map_url_1 }}" target="_blank">
                                <button class="mx-auto mt-1 rounded-full bg-blue-500 px-4 py-2 text-sm text-white hover:bg-blue-600">
                                    <i class="fas fa-location-dot"></i> Lihat Lokasi
                                </button>
                            </a>
                        </div>
                    @endif
                    @if ($invitation->event && !empty(trim($invitation->event->event_date_2)))
                        <div class="mb-4 w-full rounded-lg border-2 border-blue-400 bg-white/75 p-6 text-center text-gray-600 shadow-lg" data-aos="zoom-in">
                            <p class="mb-2 font-sacramento text-4xl font-semibold text-blue-400">{{ $invitation->event->event_type_2 }}</p>
                            <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($invitation->event->event_date_2)->translatedFormat('l, d F Y') }}</p>
                            <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($invitation->event->event_date_2)->translatedFormat('H:i') }} WIB</p>
                            <p class="text-base">{{ $invitation->event->location_2 }}</p>
                            <p class="mb-4 text-base">
                                {{ $invitation->event->address_2 }}
                            </p>
                            <a href="{{ $invitation->event->map_url_2 }}" target="_blank">
                                <button class="mx-auto mt-1 rounded-full bg-blue-500 px-4 py-2 text-sm text-white hover:bg-blue-600">
                                    <i class="fas fa-location-dot"></i> Lihat Lokasi
                                </button>
                            </a>
                        </div>
                    @endif
                    @if ($invitation->event && !empty(trim($invitation->event->event_date_3)))
                        <div class="mb-4 w-full rounded-lg border-2 border-blue-400 bg-white/75 p-6 text-center text-gray-600 shadow-lg" data-aos="zoom-in">
                            <p class="mb-2 font-sacramento text-4xl font-semibold text-blue-400">{{ $invitation->event->event_type_3 }}</p>
                            <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($invitation->event->event_date_3)->translatedFormat('l, d F Y') }}</p>
                            <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($invitation->event->event_date_3)->translatedFormat('H:i') }} WIB</p>
                            <p class="text-base">{{ $invitation->event->location_3 }}</p>
                            <p class="mb-4 text-base">
                                {{ $invitation->event->address_3 }}
                            </p>
                            <a href="{{ $invitation->event->map_url_3 }}" target="_blank">
                                <button class="mx-auto mt-1 rounded-full bg-blue-500 px-4 py-2 text-sm text-white hover:bg-blue-600">
                                    <i class="fas fa-location-dot"></i> Lihat Lokasi
                                </button>
                            </a>
                        </div>
                    @endif
                </div>
            </section>

            <!-- message section -->
            <section id="message-section" class="relative hidden h-auto w-full overflow-hidden">
                <div class="relative w-full">
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-1.png" class="absolute left-0 top-0 z-20 w-2/6" data-aos="fade-right" />
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-2.png" class="absolute right-0 top-0 z-20 w-2/6" data-aos="fade-left" />
                </div>

                <div class="relative z-30 mx-4 my-4 mb-28 mt-10 flex h-full flex-col items-center">
                    <div class="mb-4 w-full rounded-lg border-2 border-blue-400 bg-white/75 p-6 shadow-lg" data-aos="flip-left">
                        <form id="message-form" onsubmit="sendMessage(event, 'bg-blue-500')">
                            <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id }}" />
                            <div class="mb-4">
                                <label for="name" class="mb-2 block text-left text-sm font-semibold text-gray-600">Nama</label>
                                <input type="text" name="name" id="name" placeholder="Masukkan nama Anda" class="w-full rounded-lg border border-blue-400 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                            </div>
                            <div class="mb-4">
                                <label for="message" class="mb-2 block text-left text-sm font-semibold text-gray-600">Pesan</label>
                                <textarea name="message" id="message" placeholder="Berikan ucapan serta doa restu Anda" class="w-full rounded-lg border border-blue-400 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400" rows="2"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="presence_confirm" class="mb-2 block text-left text-sm font-semibold text-gray-600">Konfirmasi
                                    Kehadiran</label>
                                <div class="flex space-x-4 text-gray-600">
                                    <label class="flex items-center">
                                        <input type="radio" name="presence_confirm" id="presence_confirm" value="Hadir" class="mr-2" onclick="toggleGuestInput(true)" />
                                        Hadir
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="presence_confirm" id="presence_confirm" value="Maaf, saya tidak bisa hadir" class="mr-2" onclick="toggleGuestInput(false)" />
                                        Maaf, saya tidak bisa hadir
                                    </label>
                                </div>
                            </div>
                            <div class="mb-4" id="guest_input" style="display: none">
                                <label for="guest_totals" class="mb-2 block text-left text-sm font-semibold text-gray-600">Jumlah Tamu</label>
                                <input type="number" name="guest_totals" id="guest_totals" placeholder="Masukkan jumlah tamu (orang)" class="w-full rounded-lg border border-blue-400 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                            </div>
                            <button type="submit" class="mt-4 w-full rounded-full bg-blue-500 p-2 text-base text-white hover:bg-blue-600">
                                <i class="fas fa-message"></i> KIRIM UCAPAN
                            </button>
                        </form>

                        <div id="messages" data-color="text-blue-500" class="mt-8 max-h-96 overflow-y-auto space-y-4 rounded-lg border border-gray-300 p-2">
                            <!-- Pesan akan ditampilkan di sini -->
                        </div>
                    </div>
                </div>
            </section>

            <!-- love story section -->
            <section id="love-story-section" class="relative hidden h-auto w-full overflow-hidden">
                <div class="relative w-full">
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-1.png" class="absolute left-0 top-0 z-20 w-2/6" data-aos="fade-right" />
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-2.png" class="absolute right-0 top-0 z-20 w-2/6" data-aos="fade-left" />
                </div>

                <div class="relative z-30 mx-4 my-4 mb-28 mt-10 flex h-full flex-col items-center">
                    @if (!$invitation->love_stories->isEmpty())
                        @foreach ($invitation->love_stories as $item)
                            <div class="mb-4 w-full rounded-lg border-2 border-blue-400 bg-white/75 p-6 text-center text-gray-600 shadow-lg" data-aos="fade-up">
                                <p class="mb-4 text-center font-sacramento text-2xl font-semibold text-blue-400">
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

            <!-- gallery section -->
            <section id="gallery-section" class="relative hidden h-auto w-full overflow-hidden">
                <div class="relative w-full">
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-1.png" class="absolute left-0 top-0 z-20 w-2/6" data-aos="fade-right" />
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-2.png" class="absolute right-0 top-0 z-20 w-2/6" data-aos="fade-left" />
                </div>

                <div class="relative z-30 mx-4 my-4 mb-28 mt-10 flex h-full flex-row items-center justify-center">
                    <!-- Ubah grid-cols-2 menjadi grid-cols-3 untuk 3 kolom -->
                    <div class="grid grid-cols-2 gap-6">
                        @if (!$invitation->galleries->isEmpty())
                            @foreach ($invitation->galleries as $item)
                                <a href="{{ Storage::url($item->photo) }}" data-fancybox="gallery" class="group relative">
                                    <div data-aos="flip-left">
                                        <div class="transform overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">
                                            <img src="{{ Storage::url($item->photo) }}" alt="Image 1" class="h-[200px] w-[200px] object-cover" />
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>

            <!-- streaming section -->
            <section id="streaming-section" class="relative hidden h-auto w-full overflow-hidden">
                <div class="relative w-full">
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-1.png" class="absolute left-0 top-0 z-20 w-2/6" data-aos="fade-right" />
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-2.png" class="absolute right-0 top-0 z-20 w-2/6" data-aos="fade-left" />
                </div>
                <div class="relative z-30 mx-4 my-4 mb-28 flex h-screen flex-col items-center justify-center">
                    @if ($invitation->streaming)
                        <iframe class="rounded-lg" width="100%" height="315" src="https://www.youtube.com/embed/{{ $invitation->streaming->youtube_url_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen data-aos="zoom-in">
                        </iframe>
                    @endif
                </div>
            </section>

            <!-- gift section -->
            <section id="gift-section" class="relative hidden h-auto w-full overflow-hidden">
                <div class="relative w-full">
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-1.png" class="absolute left-0 top-0 z-20 w-2/6" data-aos="fade-right" />
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-2.png" class="absolute right-0 top-0 z-20 w-2/6" data-aos="fade-left" />
                </div>

                <div class="relative z-30 mx-4 my-4 mb-28 mt-10 flex h-screen flex-col items-center justify-center">
                    @if (!$invitation->gifts->isEmpty())
                        <div class="mb-4 w-full rounded-lg border-2 border-blue-400 bg-white/75 p-6 shadow-lg" data-aos="fade-up">
                            <p class="mb-8 text-justify text-base text-gray-600">
                                Bagi yang ingin memberikan tanda kasih, dapat mengirimkan melalui fitur di bawah ini:
                            </p>
                            <button id="open-modal" class="w-full rounded-full bg-blue-500 p-2 text-base text-white hover:bg-blue-600">
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
                            <p class="font-sacramento text-4xl font-semibold text-blue-400">Hadiah</p>
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
                                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/card-money.jpg" class="h-40 w-full rounded-3xl border-2 border-blue-400 object-cover" />
                                    <div class="absolute inset-0 flex flex-col items-start justify-center pl-4">
                                        <p class="px-4 py-1 text-2xl font-semibold text-blue-400">{{ $item->account_name }}</p>
                                        <p class="px-4 py-1 text-2xl">
                                            {{ $item->account_number }}
                                            <i id="copy-icon" class="fa-regular fa-copy cursor-pointer hover:text-blue-400" onclick="copyToClipboard('bg-blue-500', '{{ $item->account_number }}')"></i>
                                        </p>
                                        <p class="px-4 py-1 text-2xl">{{ $item->account_holder }}</p>
                                    </div>
                                </div>
                            @endforeach

                            @foreach ($other_gifts as $item)
                                <div class="relative mb-4">
                                    <div class="flex rounded-3xl border-2 border-blue-400 p-2">
                                        <div class="flex items-center px-4">
                                            <i class="fas fa-gift text-3xl text-blue-400"></i>
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <p class="px-1 py-1 text-2xl">{{ $item->recipient_name }}</p>
                                            <p class="base px-1 py-1 text-gray-600">{{ $item->recipient_phone_number }}</p>
                                            <p class="px-1 py-1 text-base">
                                                <span class="text-base text-gray-600">{{ $item->recipient_address }}</span>
                                                <i class="fa-regular fa-copy cursor-pointer text-2xl hover:text-blue-400" onclick="copyToClipboard('bg-blue-500', '{{ $item->recipient_name . ' / ' . $item->recipient_phone_number . ' / ' . $item->recipient_address }}')">
                                                </i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="relative mt-8">
                                <p class="text-base font-semibold">Perhatian!</p>
                                <ul class="list-disc pl-4 text-sm text-gray-600">
                                    <li>
                                        Pastikan nama dan nomor rekening sudah sesuai dengan nama mempelai ketika melakukan proses
                                        transfer.
                                    </li>
                                    <li>
                                        Mohon untuk melakukan konfirmasi hadiah anda dengan mengirim bukti transfer/resi pengiriman
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
            <section id="closing-section" class="relative hidden h-auto w-full overflow-hidden">
                <div class="relative w-full">
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-1.png" class="absolute left-0 top-0 z-20 w-2/6" data-aos="fade-right" />
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-2.png" class="absolute right-0 top-0 z-20 w-2/6" data-aos="fade-left" />
                </div>

                <div class="relative z-30 mx-4 my-4 mb-28 flex h-screen flex-col items-center justify-center text-center">
                    @if ($invitation->closing)
                        <p class="mb-16 text-base text-white" data-aos="fade-down">
                            {!! nl2br(e($invitation->closing->closing_text)) !!}
                        </p>
                        <div data-aos="fade-up">
                            <p class="mb-4 text-base font-semibold text-white">{!! nl2br(e($invitation->closing->closing_greeting)) !!}</p>
                            <p class="pb-32 font-sacramento text-4xl font-semibold text-blue-400">{{ $invitation->wedding_couple ? $invitation->wedding_couple->bride_nickname . ' & ' . $invitation->wedding_couple->groom_nickname : 'Wanita & Pria' }}</p>
                        </div>
                    @endif
                </div>
            </section>

            <!-- cr section -->
            <section id="cr-section" class="relative hidden h-auto w-full overflow-hidden">
                <div class="relative w-full">
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-1.png" class="absolute left-0 top-0 z-20 w-2/6" data-aos="fade-right" />
                    <img src="{{ asset('/') }}invitation-templates/jm-calm/dist/assets/image/blue-flower-2.png" class="absolute right-0 top-0 z-20 w-2/6" data-aos="fade-left" />
                </div>

                <div class="relative z-30 mx-4 my-4 mb-28 flex h-screen flex-col items-center justify-center">
                    @if (!$contacts->isEmpty())
                        <div class="mb-4 flex space-x-4 text-white" data-aos="zoom-in">
                            @foreach ($contacts as $item)
                                <a href="{{ $item->url }}" class="hover:text-blue-400" title="{{ $item->platform }}" target="_blank">
                                    <i class="{{ $item->icon }} text-2xl"></i>
                                </a>
                            @endforeach
                        </div>
                    @endif
                    @if ($business_profile)
                        <div class="text-center text-white" data-aos="zoom-in">
                            <p class="text-base">
                                Copyright &copy; {{ date('Y', strtotime($business_profile->brand_founding_date)) }} <span class="font-semibold text-blue-400">{{ $business_profile->brand_name }}</span>. All rights reserved.
                            </p>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>
@endsection
