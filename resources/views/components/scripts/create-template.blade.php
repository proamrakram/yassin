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
    });
</script>
