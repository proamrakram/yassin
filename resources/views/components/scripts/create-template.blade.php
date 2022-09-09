<script>
    $(document).ready(function() {
        //Fields
        var selectedHeaderType = $('#selectedHeaderType');
        var selectedBodyType = $('#selectedBodyType');
        var selectedFooterType = $('#selectedFooterType');

        //Divs Header
        var headerTextDiv = $('#header-text-div');
        var headerImageDiv = $('#header-image-div');

        //Divs Body
        var bodyTextDiv = $("#body-text-div");
        var bodyImageDiv = $("#body-image-div");

        //Divs Footer
        var footerTextDiv = $("#footer-text-div");
        var footerImageDiv = $("#footer-image-div");


        //Fields
        var header_text_template = $("#header_text_template");
        var header_image_template = $("#header_image_template");

        var body_text_template = $("#body_text_template");
        var body_image_template = $("#body_image_template");

        var footer_text_template = $("#footer_text_template");
        var footer_image_template = $("#footer_image_template");


        //Template Message
        var template_name = $('#template_name');
        var selectedTemplateType = $('#selectedTemplateType');
        var selectedTemplateLanguage = $('#selectedTemplateLanguage');

        selectedHeaderType.val("null").change();
        selectedBodyType.val("null").change();
        selectedFooterType.val("null").change();
        selectedTemplateType.val("null").change();
        selectedTemplateLanguage.val("null").change();

        //Hide Elements
        headerTextDiv.hide();
        headerImageDiv.hide();

        bodyTextDiv.hide();
        bodyImageDiv.hide();

        footerTextDiv.hide();
        footerImageDiv.hide();

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

        var template_language_message = $('#template_language_message');
        var template_name_message = $('#template_name_message');
        var template_type_message = $('#template_type_message');


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

        template_language_message.hide();
        template_name_message.hide();
        template_type_message.hide();


        selectedHeaderType.on('change', function() {

            if (selectedHeaderType.val() == "text") {
                headerImageDiv.hide();
                headerTextDiv.show();
                return true;
            }

            if (selectedHeaderType.val() == "image") {
                headerTextDiv.hide();
                headerImageDiv.show();
                return true;
            }

            headerTextDiv.hide();
            headerImageDiv.hide();

            return true;
        });

        selectedBodyType.on('change', function() {

            if (selectedBodyType.val() == "text") {
                bodyImageDiv.hide();
                bodyTextDiv.show();
                return true;
            }

            if (selectedBodyType.val() == "image") {
                bodyTextDiv.hide();
                bodyImageDiv.show();
                return true;
            }

            bodyTextDiv.hide();
            bodyImageDiv.hide();

            return true;
        });

        selectedFooterType.on('change', function() {

            if (selectedFooterType.val() == "text") {
                footerImageDiv.hide();
                footerTextDiv.show();
                return true;
            }

            if (selectedFooterType.val() == "image") {
                footerTextDiv.hide();
                footerImageDiv.show();
                return true;
            }

            footerTextDiv.hide();
            footerImageDiv.hide();

            return true;
        });


        $("#create_template_form").submit(function(e) {

            e.preventDefault();

            $.ajax({
                url: "{{ route('bot.create-template') }}",
                method: 'POST',
                data: {
                    template_name: template_name.val(),
                    template_category: selectedTemplateType.val(),
                    template_language: selectedTemplateLanguage.val(),

                    bot_id: $('#bot_id').val(),
                    header_format: selectedHeaderType.val(),
                    body_format: selectedBodyType.val(),
                    footer_format: selectedFooterType.val(),

                    //Header
                    header_text_template: header_text_template.val(),
                    header_image_template: header_image_template.val(),

                    //Body
                    body_text_template: body_text_template.val(),
                    body_image_template: body_image_template.val(),

                    //Footer
                    footer_text_template: footer_text_template.val(),
                    footer_image_template: footer_image_template.val(),

                    _token: $('meta[name="csrf-token"]').attr('content'),
                    lang: "{{ app()->getLocale() }}"
                },

                success: function(data) {
                    location.reload(true);
                },

                error: function(reject) {

                    var response = $.parseJSON(reject.responseText);

                    $.each(response.errors, function(key, val) {

                        if (key == "template_name") {
                            template_name.css("border-color", "red");
                            template_name_message.show();
                            template_name_message.text(val[0]);
                        }

                        if (key == "template_category") {
                            template_category.css("border-color", "red");
                            template_type_message.show();
                            template_type_message.text(val[0]);
                        }

                        if (key == "template_language") {
                            template_language.css("border-color", "red");
                            template_language_message.show();
                            template_language_message.text(val[0]);
                        }

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
                            header_text_template.css("border-color", "red");
                            header_text_message.show();
                            header_text_message.text(val[0]);
                        }

                        if (key == "header_image_template") {
                            header_image_template.css("border-color", "red");
                            header_image_message.show();
                            header_image_message.text(val[0]);
                        }

                        if (key == "body_text_template") {
                            body_text_template.css("border-color", "red");
                            body_text_message.show();
                            body_text_message.text(val[0]);
                        }

                        if (key == "body_image_template") {
                            body_image_template.css("border-color", "red");
                            body_image_message.show();
                            body_image_message.text(val[0]);
                        }

                        if (key == "footer_text_template") {
                            footer_text_template.css("border-color", "red");
                            footer_text_message.show();
                            footer_text_message.text(val[0]);
                        }

                        if (key == "footer_image_template") {
                            footer_image_template.css("border-color", "red");
                            footer_image_message.show();
                            footer_image_message.text(val[0]);
                        }
                    });
                }
            });
        });
    });
</script>
