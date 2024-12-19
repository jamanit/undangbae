<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $business_profile->brand_name . ' - ' . ($invitation->wedding_couple ? $invitation->wedding_couple->bride_nickname . ' & ' . $invitation->wedding_couple->groom_nickname : 'Wanita & Pria') }}</title>
    <link rel="icon" href="{{ Storage::url($business_profile->logo) }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ Storage::url($business_profile->logo) }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />

    <link href="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/fortawesome/fontawesome-free/css/all.css" rel="stylesheet" />
    <link href="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/aos/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/fancyapps/ui/dist/fancybox/fancybox.css" rel="stylesheet" />
    <script src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link href="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/tailwind-output.css" rel="stylesheet" />
    <link href="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/custom-style.css" rel="stylesheet" />
</head>

<body class="font-worksans">

    @yield('content')

    <script src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/aos/dist/aos.js"></script>
    <script src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/fancyapps/ui/dist/fancybox/fancybox.umd.js"></script>
    <script src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('/') }}invitation-templates/jm-sideright/dist/assets/custom-script.js"></script>

    <script>
        // Fungsi send message
        function sendMessage(event, color) {
            event.preventDefault(); // Mencegah pengiriman form secara default

            const invitation_id = $("#invitation_id").val();
            const name = $("#name").val();
            const message = $("#message").val();
            const presence_confirm = $('input[name="presence_confirm"]:checked').val();
            const guest_totals = $("#guest_totals").val();

            // Cek apakah semua data sudah diisi
            if (!name || !message) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Harap isi semua data sebelum mengirim.",
                    customClass: {
                        confirmButton: color,
                    },
                });
                return; // Hentikan eksekusi jika ada data yang kosong
            }

            // Ambil jumlah pesan yang sudah dikirim dari localStorage
            let messageCount = localStorage.getItem("messageCount") ? parseInt(localStorage.getItem("messageCount")) : 0;

            // Cek apakah jumlah pesan sudah mencapai batas maksimum
            if (messageCount >= 3) {
                Swal.fire({
                    icon: "warning",
                    title: "Batas Tercapai",
                    text: "Anda telah mencapai batas maksimum pengiriman pesan (3 pesan).",
                    customClass: {
                        confirmButton: color,
                    },
                });
                return; // Hentikan eksekusi jika sudah mencapai batas
            }

            // Kirim data ke server
            $.ajax({
                url: '/invitations/sideright-template/send-message', // Ganti dengan endpoint yang sesuai
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    invitation_id: invitation_id,
                    name: name,
                    message: message,
                    presence_confirm: presence_confirm,
                    guest_totals: guest_totals
                }),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // Jika menggunakan Laravel
                },
                success: function(data) {
                    // Ambil data terbaru setelah berhasil mengirim
                    fetchLatestMessages();

                    Swal.fire({
                        icon: "success",
                        title: "Pesan Terkirim!",
                        text: "Pesan berhasil terkirim.",
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });

                    // Reset form setelah mengirim
                    $("#message-form").trigger("reset");

                    messageCount++;
                    localStorage.setItem("messageCount", messageCount);
                },
                error: function() {
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: "Pesan gagal dikirim ke server.",
                        customClass: {
                            confirmButton: color,
                        },
                    });
                }
            });
        }

        // Fungsi untuk mengambil data pesan terbaru
        function fetchLatestMessages() {
            const invitation_id = $("#invitation_id").val();
            const data_color = $("#messages").data("color");

            $.ajax({
                url: '/invitations/sideright-template/get-message/' + invitation_id,
                method: 'GET',
                success: function(data) {
                    const messagesContainer = $("#messages");
                    messagesContainer.empty(); // Menghapus pesan lama

                    // Menambahkan pesan baru ke dalam kontainer
                    $.each(data, function(index, item) {
                        const messageCard = `
                            <div class="bg-green-100 p-4 rounded-md shadow-md">
                                <p class="font-semibold ${data_color} text-sm">${item.name}</p>
                                <p class="text-gray-700 text-sm">${item.message}</p>
                            </div> 
                        `;
                        messagesContainer.append(messageCard);
                    });

                    // Tampilkan container pesan jika ada pesan
                    messagesContainer.removeClass("hidden"); // Menghapus kelas hidden untuk menampilkan pesan
                },
                error: function() {
                    console.error('Error fetching messages');
                }
            });
        }

        $(window).on('load', function() {
            fetchLatestMessages();

        });
    </script>
</body>

</html>
