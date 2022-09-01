<a type="button" data-bs-toggle="modal" data-bs-target="#replyMessage{{ $message->id }}">
    <img src="{{ asset('whatsapp-assets/svg/read-message.svg') }}" width="30" height="20" alt="read-message.svg">
</a>

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
                                <label class="form-label" for="sendermessagename">Whats App's Name</label>
                                <input class="form-control" id="sendermessagename" type="tel"
                                    aria-describedby="emailHelp" value="{{ $message->senderMessage->name }}" disabled>
                                <div class="form-text" id="emailHelp">We'll never share your email with anyone else.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="phone_number">Phone Number</label>
                                <input class="form-control" id="phone_number" type="tel"
                                    aria-describedby="emailHelp" value="{{ $message->from_phone_number }}" disabled>
                                <div class="form-text" id="emailHelp">We'll never share your email with anyone else.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="message_date">Message Date</label>
                                <input class="form-control" id="message_date" type="tel"
                                    aria-describedby="emailHelp" value="{{ $message->from_phone_number }}" disabled>
                                <div class="form-text" id="emailHelp">We'll never share your email with anyone else.
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label" for="message_body">Message Body</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea name="message_body" id="message_body" cols="20" rows="10" disabled>{{ $message->body }}</textarea>
                            </div>
                        </div>
                    </div>



                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <textarea name="message_body" id="message_body" cols="30" rows="10" disabled>{{ $message->body }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="password">Your Replying to the Message</label>
                                <textarea name="message_reply" id="message_reply" cols="30" rows="10"
                                    placeholder="Enter your text message to reply on the above message from whatsapp user!!"></textarea>
                            </div>
                        </div>
                    </div> --}}

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="button">Reply</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>
