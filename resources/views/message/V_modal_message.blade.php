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
                    <button type="submit" class="btn btn-danger btn-loading" data-loading-text="Loading">Yes</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="showModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="namew">das</div>
                <div class="mb-3">
                    <x-input type="text" name="name" label="Platform" placeholder="Enter Platform" />
                </div>
                <div class="mb-3">
                    <x-input type="text" name="email" label="Username/Number" placeholder="Enter Username/Number" />
                </div>
                <div class="mb-3">
                    <x-input type="text" name="message" label="Icon" placeholder="Enter Icon" bottomtext="text-info|Use the Font Awesome Icons free class. For examples, check their official website." />
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
