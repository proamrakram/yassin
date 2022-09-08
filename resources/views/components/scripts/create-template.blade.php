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
                    header_image_template: headerTextField.val(),

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
                        console.log(response.errors);
                    });
                }
            });
        });




    });
</script>
