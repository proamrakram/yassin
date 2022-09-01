<a data-bs-toggle="modal" href="#message{{ $message->id }}">
    <img src="{{ asset('whatsapp-assets/svg/read-message.svg') }}" width="30" height="20" alt="read-message.svg">
</a>


<div class="modal fade" id="message{{ $message->id }}" aria-hidden="true" aria-labelledby="area{{ $message->id }}"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="area{{ $message->id }}">+{{ $message->from_phone_number}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $message->body }}
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#message{{ $message->id + 1 }}"
                    data-bs-toggle="modal">Send a reply message</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="message{{ $message->id + 1 }}" aria-hidden="true" aria-labelledby="area{{ $message->id +1 }}"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="area{{ $message->id +1 }}">Sending Replying Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="input-group-text" value="Enter your message here to send it ot the user">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#message{{ $message->id }}" data-bs-toggle="modal">Submit</button>
            </div>
        </div>
    </div>
</div>
