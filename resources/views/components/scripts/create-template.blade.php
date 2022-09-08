<script>
    $(document).ready(function() {
        //Fields
        var selectedHeader = $('#selectedHeader').on();
        var textField = $('#text-div');
        var imageField = $('#image-div');
        textField.hide();
        imageField.hide();

        selectedHeader.on('change', function() {

            if (selectedHeader.val() == "text") {
                imageField.hide();
                textField.show();
                return true;
            }

            if (selectedHeader.val() == "image") {
                textField.hide();
                imageField.show();
                return true;
            }

            textField.hide();
            imageField.hide();

            return true;
        });
    });
</script>
