<a class="btn btn-primary" data-bs-toggle="modal" href="#mainButton{{ $message->id }}" role="button"> <img
        src="{{ asset('whatsapp-assets/svg/read-message.svg') }}" width="30" height="20" alt="read-message.svg">
</a>

<div class="modal fade" id="mainButton{{ $message->id }}" aria-hidden="true"
    aria-labelledby="mainTitle{{ $message->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mainTitle{{ $message->id }}">Modal 1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $message->body }}
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#secondButton{{ $message->id }}" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Reply Message</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="secondButton{{ $message->id }}" aria-hidden="true"
    aria-labelledby="secondTitle{{ $message->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="secondTitle{{ $message->id }}">Modal 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Here you can add a replying message
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#mainButton{{ $message->id }}" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Back to first</button>
            </div>
        </div>
    </div>
</div>
