<footer class="main-footer w-100 position-absolute bottom-0 start-0 py-2" style="background: #222">
    <div class="container-fluid">
        <div class="row text-center gy-3">
            <div class="col-sm-6 text-sm-start">
                <p class="mb-0 text-sm text-gray-600">Your company &copy; 2017-2021</p>
            </div>
            <div class="col-sm-6 text-sm-end">
                <p class="mb-0 text-sm text-gray-600">Design by <a
                        href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">Bootstrapious</a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
        </div>
    </div>
</footer>

</div>


<!-- JavaScript files-->
<script src="{{ asset('whatsapp-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- <script src="{{ asset('whatsapp-assets/vendor/chart.js/Chart.min.js') }}"></script> --}}
<script src="{{ asset('whatsapp-assets/vendor/just-validate/js/just-validate.min.js') }}"></script>
<script src="{{ asset('whatsapp-assets/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
<script src="{{ asset('whatsapp-assets/vendor/overlayscrollbars/js/OverlayScrollbars.min.js') }}"></script>
<script src="{{ asset('whatsapp-assets/js/charts-home.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- Main File-->
<script src="{{ asset('whatsapp-assets/js/front.js') }}"></script>


<script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }
    // this is set to BootstrapTemple website as you cannot
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
</script>


<script>
    $(document).ready(function() {

        //Messages
        $('#message_store_title').removeClass("invisible");

        //Fields
        var selectedHeader = $('#selectedHeader');
        var textField = $('#header_text_template');
        var imageField = $('#header_image_template');
        console.log(textField);
        if (selectedHeader.val() == "text") {
            imageField.hide();
            textField.show();
        }

        if (selectedHeader.val() == "image") {
            textField.hide();
            imageField.show();
        }
    });
</script>


























{{-- <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}


</body>

</html>
