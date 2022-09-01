<div class="modal fade" id="main{{ $message->id }}" aria-hidden="true" aria-labelledby="mainTogle{{ $message->id }}"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mainTogle{{ $message->id }}">+{{ $message->from_phone_number }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $message->body }}
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-bs-toggle="modal" href="#second{{ $message->id }}" role="button">
                    Send a reply message
                </a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="second{{ $message->id }}" aria-hidden="true"
    aria-labelledby="secondTogle{{ $message->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="secondTogle{{ $message->id }}">Sending Replying Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" value="Enter your message here to send it ot the user">
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-bs-toggle="modal" href="#main{{ $message->id }}" role="button">
                    Submit
                </a>
                {{-- <button class="btn btn-primary" data-bs-target="#main{{ $message->id }}"
                    data-bs-toggle="modal">Submit</button> --}}
            </div>
        </div>
    </div>
</div>

<a data-bs-toggle="modal" href="#main{{ $message->id }}" role="button">
    <img src="{{ asset('whatsapp-assets/svg/read-message.svg') }}" width="30" height="20"
        alt="read-message.svg">
</a>
