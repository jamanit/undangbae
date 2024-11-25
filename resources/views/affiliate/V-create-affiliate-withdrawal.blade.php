<div class="modal fade" tabindex="-1" role="dialog" id="createModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tarik Komisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('affiliates.store-affiliate-withdrawal') }}">
                @csrf
                <div class="modal-body">
                    <p>Minimal total komisi Rp. 50.000 untuk melakukan penarikan!</p>
                    <div class="mb-3">
                        <x-input type="text" name="account_name" label="Nama Rekening" placeholder="Masukkan Nama Rekening" />
                    </div>
                    <div class="mb-3">
                        <x-input type="text" name="account_number" label="Nomor Rekening" placeholder="Masukkan Nomor Rekening" />
                    </div>
                    <div class="mb-3">
                        <x-input type="text" name="account_holder" label="Nama Pemilik" placeholder="Masukkan Nama Pemilik" />
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary btn-loading btn-submit" data-loading-text="Memuat">Lanjut</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
