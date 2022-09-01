<a data-bs-toggle="modal" href="#message{{$message->id}}">
    <img src="{{ asset('whatsapp-assets/svg/read-message.svg') }}" width="30" height="20" alt="read-message.svg">
</a>


<div class="modal fade" id="message{{$message->id}}" aria-hidden="true" aria-labelledby="header{{$message->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="header{{$message->id}}"> Name: {{$message->senderMessage->name }} Phone Number: {{$message->from_phone_number}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{$message->body}}
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#message{{$message->id + 1}}" data-bs-toggle="modal">Open second
                    modal</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="message{{$message->id + 1}}" aria-hidden="true" aria-labelledby="message{{$message->id + 1}}"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="message{{$message->id + 1}}">Modal 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Hide this modal and show the first with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to
                    first</button>
            </div>
        </div>
    </div>
</div>
