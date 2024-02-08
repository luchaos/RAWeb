<?php
$id ??= 'modal';
?>
<div class="modal" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if($title ?? false)
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $id }}ModalLabel">
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="modal-body">
                {{ $slot }}
            </div>
            @if($footer ?? false)
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
