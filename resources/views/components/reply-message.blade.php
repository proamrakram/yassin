<a class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
    data-bs-target="#replyMessage{{ $message->id }}">Reply</a>

<div class="modal fade text-start" id="replyMessage{{ $message->id }}" tabindex="-1"
    aria-labelledby="replyMessageTitle{{ $message->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="replyMessageTitle{{ $message->id }}">Reply to Message's </h5>
                <span class="ms-2"> {{ $message->senderMessage->name }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="#">

                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="phonenumber">Phone Number</label>
                                <input class="form-control" id="phonenumber" type="tel"
                                    aria-describedby="emailHelp">
                                <div class="form-text" id="emailHelp">We'll never share your email with anyone else.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" id="password" type="password">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="button">Reply</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>
