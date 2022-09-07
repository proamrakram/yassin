{{-- <a type="button" data-bs-toggle="modal" data-bs-target="#createTemplate">
    <img src="{{ asset('whatsapp-assets/svg/read-message.svg') }}" width="30" height="20" alt="read-message.svg">
</a> --}}

<div class="col-lg">
    <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#createTemplate">Create
        Template</button>
</div>

<div class="modal fade text-start" id="createTemplate" tabindex="-1" aria-labelledby="createTemplateTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="createTemplateTitle">Creating Message</h5>
                {{-- <span class="ms-2">{{ '(' . 'body' . ')' }}</span> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('bot.create-template') }}" method="POST">

                @csrf

                <div class="modal-body">
                    <p><strong>Creating Whats app template Messages</strong></p>

                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label" for="header_message"><strong>Header Message</strong></label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="sender_message_name">Format Type</label>
                                <select class="form-select" id="inlineFormSelectPref">
                                    <option selected>Choose...</option>
                                    <option value="text">Text</option>
                                    <option value="image">Image</option>
                                    <option value="video">Video</option>
                                    <option value="document">Document</option>
                                    <option value="location">Location</option>
                                </select>
                                <div class="form-text" id="emailHelp">We'll never share your email with anyone else.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="header_text_template">Text</label>
                                <input class="form-control" name="header_text_template" id="header_text_template"
                                    type="tel" aria-describedby="emailHelp" value="body" disabled>
                                <div class="form-text" id="emailHelp">We'll never share your email with anyone else.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <hr class="bg-danger border-2 border-top border-danger">
                    </div>



                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label" for="body_message_template">Body Message</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <textarea style="width: inherit;" name="body_message_template" id="body_message_template" rows="5" disabled>body</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label" for="footer_text_template">Footer Message</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="footer_text_template">Text</label>
                                <input class="form-control" name="footer_text_template" id="footer_text_template"
                                    type="tel" aria-describedby="emailHelp" value="body" disabled>
                                <div class="form-text" id="emailHelp">We'll never share your email with anyone else.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-warning" type="submit">Create Template</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>
