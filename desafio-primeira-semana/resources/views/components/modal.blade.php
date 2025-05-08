<div>
    <div class="modal fade" id="{{ $id }}" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close btn-modal" data-bs-dismiss="modal" aria-label="Fechar">
                        <img src="{{ asset('img/x-circle.svg') }}" alt="">
                    </button>              
                </div>
                <div class="modal-body">
                    <p>{{ $message }}</p>
                </div>
            </div>
        </div>
    </div>
</div>