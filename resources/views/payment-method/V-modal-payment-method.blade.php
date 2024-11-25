<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to continue?</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-loading" data-loading-text="Loading">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="formModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modalForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <x-input type="text" name="account_name" label="Account Name" placeholder="Enter Account Name" />
                    </div>
                    <div class="mb-3">
                        <x-input type="text" name="account_number" label="Account Number" placeholder="Enter Account Number" />
                    </div>
                    <div class="mb-3">
                        <x-input type="text" name="account_holder" label="Account Holder" placeholder="Enter Account Holder" />
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary btn-loading btn-submit" data-loading-text="Loading"></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
