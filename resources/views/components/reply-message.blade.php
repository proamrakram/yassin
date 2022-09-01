<a class="btn btn-sm btn-primary" data-bs-toggle="modal" href="#replyMessage{{ $message->id }}" role="button">Reply</a>

<div class="modal fade" id="replyMessage{{ $message->id }}" aria-hidden="true"
    aria-labelledby="replyMessageTitle{{ $message->id }}" tabindex="0">

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
                    <button type="submit" class="btn btn-sm btn-primary">Reply</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        aria-label="Close">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>





<!-- Modal Form-->

{{-- <div class="card-body text-center">
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#myModal">Form in
        simple modal </button>
    <!-- Modal-->


    <div class="modal fade text-start" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modal Form</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="modalInputEmail1">Email address</label>
                            <input class="form-control" id="modalInputEmail1" type="email"
                                aria-describedby="emailHelp">
                            <div class="form-text" id="emailHelp">We'll never share your email with anyone else.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="modalInputPassword1">Password</label>
                            <input class="form-control" id="modalInputPassword1" type="password">
                        </div>
                    </form>
                </div>



                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Save changes</button>
                </div>


            </div>
        </div>
    </div>
</div> --}}
