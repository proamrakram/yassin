<a data-bs-toggle="modal" href="#mainButton{{ $message->id }}" role="button"> <img
        src="{{ asset('whatsapp-assets/svg/read-message.svg') }}" width="30" height="20" alt="read-message.svg">
</a>

<div class="modal fade" id="mainButton{{ $message->id }}" aria-hidden="true"
    aria-labelledby="mainTitle{{ $message->id }}" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">


            <div class="modal-header">
                <h5 class="modal-title" id="mainTitle{{ $message->id }}">Message from: </h5>
                <span>   {{ $message->senderMessage->name }}</span>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                {{ $message->body }}

            </div>



            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-toggle="modal"data-bs-dismiss="modal">Reply Message</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
            </div>

        </div>
    </div>
</div>
