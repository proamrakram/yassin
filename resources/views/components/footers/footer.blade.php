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
{{-- <script src="{{ asset('whatsapp-assets/js/charts-home.js') }}"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- Main File-->
<script src="{{ asset('whatsapp-assets/js/front.js') }}"></script>

<!-- Toastr Js -->
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>

<style>
    .toast-center-center {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<script>
    // Display an info toast with no title
    // toastr.info('Are you the 6 fingered man?')
    // // Display a warning toast, with no title
    // toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!')
    // // Display a success toast, with a title
    // toastr.success('Have fun storming the castle!', 'Miracle Max Says')
    // // Display an error toast, with a title
    // toastr.error('I do not think that word means what you think it means.', 'Inconceivable!')
    // // Immediately remove current toasts without using animation
    // toastr.remove()
    // // Remove current toasts using animation
    // toastr.clear()
    // // Override global options
    // toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {
    //     timeOut: 5000
    // })
    // toastr.options.escapeHtml = true;
    // toastr.options.closeButton = true;
    // toastr.options.closeHtml = '<button><i class="icon-off"></i></button>';
    // toastr.options.closeMethod = 'fadeOut';
    // toastr.options.closeDuration = 300;
    // toastr.options.closeEasing = 'swing';
    // toastr.options.newestOnTop = false;

    // Define a callback for when the toast is shown/hidden/clicked
    // toastr.options.onShown = function() {
    //     console.log('hello');
    // }
    // toastr.options.onHidden = function() {
    //     console.log('goodbye');
    // }
    // toastr.options.onclick = function() {
    //     console.log('clicked');
    // }
    // toastr.options.onCloseClick = function() {
    //     console.log('close button clicked');
    // }

    // toastr.options.showEasing = 'swing';
    // toastr.options.hideEasing = 'linear';
    // toastr.options.closeEasing = 'linear';
    // toastr.options.showEasing = 'easeOutBounce';
    // toastr.options.hideEasing = 'easeInBack';
    // toastr.options.closeEasing = 'easeInBack';
    // toastr.options.showMethod = 'slideDown';
    // toastr.options.hideMethod = 'slideUp';
    // toastr.options.closeMethod = 'slideUp';
    // toastr.options.preventDuplicates = true;
    // toastr.options.timeOut = 30; // How long the toast will display without user interaction
    // toastr.options.extendedTimeOut = 60; // How long the toast will display after a user hovers over it
    // toastr.options.timeOut = 0;
    // toastr.options.extendedTimeOut = 0;
    // toastr.options.progressBar = true;
    //

    // Show at the bottom, top is the default.

    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-center-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    // Toaster Response
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if (Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif

    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif



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


<x-scripts.create-template></x-scripts.create-template>


























{{-- <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}


</body>

</html>
