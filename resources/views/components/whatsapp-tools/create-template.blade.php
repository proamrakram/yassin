<button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#createTemplate">Create Template
    Message</button>


<div class="modal fade text-start" id="createTemplate" tabindex="-1" aria-labelledby="createTemplateTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-secondary">
                <h5 class="modal-title text-white" id="createTemplateTitle">Creating Template Message</h5>
                {{-- <span class="ms-2">{{ '(' . 'body' . ')' }}</span> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="create_template_form" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label" for="header_message"><strong>Header Style Message</strong></label>
                        </div>
                    </div>


                    {{-- Header Style --}}

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="sender_message_name">Header Format Type</label>

                                <select class="form-select" id="selectedHeaderType">
                                    <option value="null" selected>Choose...</option>
                                    <option value="text">Text</option>
                                    <option value="image">Image</option>
                                    <option value="video">Video</option>
                                    <option value="document">Document</option>
                                    <option value="location">Location</option>
                                </select>

                                <div class="form-text text-danger" id="header_type_message"></div>

                            </div>
                        </div>

                        <div class="col-lg-12" id="header-text-div">
                            <div class="mb-3">
                                <label class="form-label" for="header_text_template">Text</label>
                                <input class="form-control" name="header_text_template" id="header_text_template"
                                    type="text" aria-describedby="emailHelp" value="body">
                                <div class="form-text text-danger" id="header_text_message"></div>
                            </div>
                        </div>

                        <div class="col-lg-12" id="header-image-div">
                            <div class="mb-3">
                                <label class="form-label" for="header_image_template">Image</label>
                                <input class="form-control" name="header_image_template" id="header_image_template"
                                    type="file" aria-describedby="emailHelp">
                                <div class="form-text text-danger" id="header_image_message"></div>
                            </div>
                        </div>
                    </div>



                    {{-- Body Style --}}
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="form-label" for="body_message_template">
                                    <strong>Body Style Message</strong>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="sender_message_name">Body Format Type</label>

                                <select class="form-select" id="selectedBodyType">
                                    <option value="null" selected>Choose...</option>
                                    <option value="text">Text</option>
                                    <option value="image">Image</option>
                                    <option value="video">Video</option>
                                    <option value="document">Document</option>
                                    <option value="location">Location</option>
                                </select>

                                <div class="form-text text-danger" id="body_type_message"></div>

                            </div>
                        </div>

                        <div class="col-lg-12" id="body-text-div">
                            <label class="form-label" for="body_image_template">Body</label>
                            <textarea style="width: inherit;" name="body_message_template" id="body_text_template" rows="3">Enter Your Body Message</textarea>

                            <div class="form-text text-danger" id="body_text_message"></div>
                        </div>

                        <div class="col-lg-12" id="body-image-div">
                            <div class="mb-3">
                                <label class="form-label" for="body_image_template">Image</label>
                                <input class="form-control" name="body_image_template" id="body_image_template"
                                    type="file" aria-describedby="emailHelp">
                                <div class="form-text text-danger" id="body_image_message"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Footer Style --}}
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="form-label" for="footer_message_template">
                                    <strong>Footer Style Message</strong>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="sender_message_name">Footer Format Type</label>
                                <select class="form-select" id="selectedFooterType">
                                    <option value="null" selected>Choose...</option>
                                    <option value="text">Text</option>
                                    <option value="image">Image</option>
                                    <option value="video">Video</option>
                                    <option value="document">Document</option>
                                    <option value="location">Location</option>
                                </select>

                                <div class="form-text text-danger" id="footer_type_message"></div>

                            </div>
                        </div>

                        <div class="col-lg-12" id="footer-text-div">
                            <div class="mb-3">
                                <label class="form-label" for="footer_text_template">Text</label>
                                <input class="form-control" name="footer_text_template" id="footer_text_template"
                                    type="text" aria-describedby="emailHelp" value="body">
                                <div class="form-text text-danger" id="footer_text_message"></div>
                            </div>
                        </div>

                        <div class="col-lg-12" id="footer-image-div">
                            <div class="mb-3">
                                <label class="form-label" for="footer_image_template">Image</label>
                                <input class="form-control" name="footer_image_template" id="footer_image_template"
                                    type="file" aria-describedby="emailHelp">
                                <div class="form-text text-danger" id="footer_image_message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Create Template</button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    </div>

            </form>
        </div>
    </div>
</div>













{{-- <hr style="border: 2px solid black;">

<div class="row">
    <div class="col-lg-6">
        <label class="form-label" for="footer_text_template"><strong>Footer Message</strong></label>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label" for="footer_text_template">Text</label>
            <input class="form-control" name="footer_text_template" id="footer_text_template"
                type="tel" aria-describedby="emailHelp" value="body">
            <div class="form-text text-danger" id="emailHelp">We'll never share your email with anyone else.
            </div>
        </div>
    </div>
</div>

<hr style="border: 2px solid black;">


<div class="row">
    <div class="col-lg-6">
        <label class="form-label" for="body_message_template"><strong>Buttons
                Message</strong></label>
    </div>
</div>


<div class="row">

    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label" for="sender_message_name">Button Type</label>
            <select class="form-select" id="inlineFormSelectPref">
                <option value="null" selected>Choose...</option>
                <option value="QUICK_REPLY">Quick Reply</option>
                <option value="URL">URL</option>
                <option value="PHONE_NUMBER">Phone Number</option>
            </select>
            <div class="form-text text-danger" id="emailHelp">We'll never share your email with anyone else.
            </div>
        </div>
    </div>


    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label" for="button_text_template">Text</label>
            <input class="form-control" name="button_text_template" id="button_text_template"
                type="text" aria-describedby="emailHelp" value="body">
            <div class="form-text text-danger" id="emailHelp">We'll never share your email with anyone else.
            </div>
        </div>
    </div>
</div> --}}
