<script>
    $(document).ready(function() {
        //Fields
        var selectedHeaderType = $('#selectedHeaderType');
        var selectedBodyType = $('#selectedBodyType');
        var selectedFooterType = $('#selectedFooterType');

        //Fields Header
        var headerTextField = $('#header-text-div');
        var headerImageField = $('#header-image-div');

        //Fields Body
        var bodyTextField = $("#body-text-div");
        var bodyImageField = $("#body-image-div");

        //Fields Footer
        var footerTextField = $("#footer-text-div");
        var footerImageField = $("#footer-image-div");



        //Hide Elements
        headerTextField.hide();
        headerImageField.hide();

        bodyTextField.hide();
        bodyImageField.hide();

        footerTextField.hide();
        footerImageField.hide();

        //Messages

        var header_type_message = $('#header_type_message');
        var header_text_message = $('#header_text_message');
        var header_image_message = $('#header_image_message');
        var body_type_message = $('#body_type_message');
        var body_text_message = $('#body_text_message');
        var body_image_message = $('#body_image_message');
        var footer_type_message = $('#footer_type_message');
        var footer_text_message = $('#footer_text_message');
        var footer_image_message = $('#footer_image_message');


        //Hide Messages
        header_type_message.hide();
        header_text_message.hide();
        header_image_message.hide();
        body_type_message.hide();
        body_text_message.hide();
        body_image_message.hide();
        footer_type_message.hide();
        footer_text_message.hide();
        footer_image_message.hide();


        selectedHeaderType.on('change', function() {

            if (selectedHeaderType.val() == "text") {
                headerImageField.hide();
                headerTextField.show();
                return true;
            }

            if (selectedHeaderType.val() == "image") {
                headerTextField.hide();
                headerImageField.show();
                return true;
            }

            headerTextField.hide();
            headerImageField.hide();

            return true;
        });

        selectedBodyType.on('change', function() {

            if (selectedBodyType.val() == "text") {
                bodyImageField.hide();
                bodyTextField.show();
                return true;
            }

            if (selectedBodyType.val() == "image") {
                bodyTextField.hide();
                bodyImageField.show();
                return true;
            }

            bodyTextField.hide();
            bodyImageField.hide();

            return true;
        });

        selectedFooterType.on('change', function() {

            if (selectedFooterType.val() == "text") {
                footerImageField.hide();
                footerTextField.show();
                return true;
            }

            if (selectedFooterType.val() == "image") {
                footerTextField.hide();
                footerImageField.show();
                return true;
            }

            footerTextField.hide();
            footerImageField.hide();

            return true;
        });


        $("#create_template_form").submit(function(e) {

            e.preventDefault();

            $.ajax({
                url: "{{ route('bot.create-template') }}",
                method: 'POST',
                data: {
                    header_format: selectedHeaderType.val(),
                    body_format: selectedBodyType.val(),
                    footer_format: selectedFooterType.val(),

                    //Header
                    header_text_template: headerTextField.val(),
                    header_image_template: headerImageField.val(),

                    //Body
                    body_text_template: bodyTextField.val(),
                    body_image_template: bodyImageField.val(),

                    //Footer
                    footer_text_template: footerTextField.val(),
                    footer_image_template: footerImageField.val(),

                    _token: $('meta[name="csrf-token"]').attr('content'),
                    lang: "{{ app()->getLocale() }}"
                },

                success: function(data) {

                    // location.reload(true);
                },

                error: function(reject) {

                    var response = $.parseJSON(reject.responseText);

                    $.each(response.errors, function(key, val) {
                        console.log(key);
                        if (key == "header_format") {
                            selectedHeaderType.css("border-color", "red");
                            header_type_message.show();
                            header_type_message.text(val[0]);
                        }

                        if (key == "body_format") {
                            selectedBodyType.css("border-color", "red");
                            body_type_message.show();
                            body_type_message.text(val[0]);
                        }

                        if (key == "footer_format") {
                            selectedFooterType.css("border-color", "red");
                            footer_type_message.show();
                            footer_type_message.text(val[0]);
                        }

                        if (key == "header_text_template") {
                            headerTextField.css("border-color", "red");
                            header_text_message.show();
                            header_text_message.text(val[0]);
                        }

                        if (key == "header_image_template") {
                            headerImageField.css("border-color", "red");
                            header_image_message.show();
                            header_image_message.text(val[0]);
                        }

                        if (key == "body_text_template") {
                            bodyTextField.css("border-color", "red");
                            body_text_message.show();
                            body_text_message.text(val[0]);
                        }

                        if (key == "body_image_template") {
                            bodyImageField.css("border-color", "red");
                            body_image_message.show();
                            body_image_message.text(val[0]);
                        }

                        if (key == "footer_text_template") {
                            footerTextField.css("border-color", "red");
                            footer_text_message.show();
                            footer_text_message.text(val[0]);
                        }

                        if (key == "footer_image_template") {
                            footerImageField.css("border-color", "red");
                            footer_image_message.show();
                            footer_image_message.text(val[0]);
                        }
                    });
                }
            });
        });
    });
</script>
