<a type="button" data-bs-toggle="modal" data-bs-target="#replyMessage{{ $message->id }}">
    <img src="{{ asset('whatsapp-assets/svg/read-message.svg') }}" width="30" height="20" alt="read-message.svg">
</a>

<div class="modal fade text-start" id="replyMessage{{ $message->id }}" tabindex="-1"
    aria-labelledby="replyMessageTitle{{ $message->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-success">
                <h5 class="modal-title" id="replyMessageTitle{{ $message->id }}">Reply to Message's </h5>
                <span class="ms-2">{{ '('.$message->senderMessage->name.')' }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.reply-to-message', $message->id) }}" method="POST">

                @csrf

                <div class="modal-body">
                    <p>Whats App User Data and Replying Message</p>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="sender_message_name">Whats App's Name</label>
                                <input class="form-control" name="sender_message_name" id="sender_message_name" type="tel"
                                    aria-describedby="emailHelp" value="{{ $message->senderMessage->name }}" disabled>
                                <div class="form-text" id="emailHelp">We'll never share your email with anyone else.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="phone_number">Phone Number</label>
                                <input class="form-control" name="phone_number" id="phone_number" type="tel"
                                    aria-describedby="emailHelp" value="{{ $message->from_phone_number }}" disabled>
                                <div class="form-text" id="emailHelp">We'll never share your email with anyone else.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="message_date">Message Date</label>
                                <input class="form-control" name="message_date" id="message_date" type="tel"
                                    aria-describedby="emailHelp" value="{{ $message->message_timestamp }}" disabled>
                                <div class="form-text" id="emailHelp">We'll never share your email with anyone else.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="whats_app_message_id">Whats App Message ID</label>
                                <input class="form-control" name="whats_app_message_id" id="whats_app_message_id" type="text" aria-describedby="emailHelp" value="{{ $message->message_id }}" disabled>
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
                            <textarea style="width: inherit;" name="message_body" id="message_body{{ $message->id }}" rows="5" disabled>{{ $message->body }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label" for="message_reply{{ $message->id }}">Your Replying to the
                                Message: </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <textarea style="width: inherit;" name="message_reply" id="message_reply{{ $message->id }}" rows="5"
                                placeholder="Enter your text message to reply on the above message from whatsapp user!!">{{ old('message_reply') }}</textarea>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" >Reply</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>
