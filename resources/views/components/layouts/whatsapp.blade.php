<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Dashboard by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">


    <!-- Bootstrap 5 -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="{{ asset('whatsapp-assets/vendor/choices.js/public/assets/styles/choices.min.css') }}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{ asset('whatsapp-assets/vendor/overlayscrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('whatsapp-assets/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('whatsapp-assets/css/custom.css') }}css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('whatsapp-assets/img/favicon.ico') }}">




    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
        <!-- Sidebar Header    -->
        <div class="sidebar-header d-flex align-items-center justify-content-center p-3 mb-3">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><img class="img-fluid rounded-circle avatar mb-3"
                    src="{{ asset('whatsapp-assets/img/me.jpg') }}" alt="person">
                <h2 class="h5 text-white text-uppercase mb-0">Nathan Andrews</h2>
                <p class="text-sm mb-0 text-muted">Web Developer</p>
            </div>
            <!-- Small Brand information, appears on minimized sidebar--><a class="brand-small text-center"
                href="#">
                <p class="h1 m-0">BD</p>
            </a>
        </div>
        <!-- Sidebar Navigation Menus--><span
            class="text-uppercase text-gray-500 text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Main</span>
        <ul class="list-unstyled">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.home') }}">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                        <use xlink:href="#real-estate-1"> </use>
                    </svg>Home </a>
            </li>

            {{-- <li class="sidebar-item"><a class="sidebar-link" href="forms.html">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                        <use xlink:href="#survey-1"> </use>
                    </svg>Forms </a>
            </li>

            <li class="sidebar-item"><a class="sidebar-link" href="charts.html">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                        <use xlink:href="#sales-up-1"> </use>
                    </svg>Charts </a>
            </li>

            <li class="sidebar-item"><a class="sidebar-link" href="tables.html">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                        <use xlink:href="#portfolio-grid-1"> </use>
                    </svg>Tables </a>
            </li> --}}

            <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                        <use xlink:href="#browser-window-1"> </use>
                    </svg>Whats App </a>
                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                    <li><a class="sidebar-link" href="{{ route('admin.bots') }}">Bots</a></li>
                    <li><a class="sidebar-link" href="{{ route('admin.users') }}">Users</a></li>
                    {{-- <li><a class="sidebar-link" href="#">Page</a></li> --}}
                </ul>
            </li>

            {{-- <li class="sidebar-item"><a class="sidebar-link" href="login.html">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                        <use xlink:href="#disable-1"> </use>
                    </svg>Login page </a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#!">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy me-xl-2">
                        <use xlink:href="#imac-screen-1"> </use>
                    </svg>Demo
                    <div class="badge bg-warning">6 New</div>
                </a>
            </li> --}}

        </ul>
        {{-- <span class="text-uppercase text-gray-500 text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Second menu</span>
        <ul class="list-unstyled py-4">
            <li class="sidebar-item"> <a class="sidebar-link" href="#!">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy me-xl-2">
                        <use xlink:href="#chart-1"> </use>
                    </svg>Demo</a></li>
            <li class="sidebar-item"> <a class="sidebar-link" href="">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy me-xl-2">
                        <use xlink:href="#imac-screen-1"> </use>
                    </svg>Demo
                    <div class="badge bg-info">Special</div>
                </a></li>
            <li class="sidebar-item"> <a class="sidebar-link" href="">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy me-xl-2">
                        <use xlink:href="#quality-1"> </use>
                    </svg>Demo</a></li>
            <li class="sidebar-item"> <a class="sidebar-link" href="">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy me-xl-2">
                        <use xlink:href="#security-shield-1"> </use>
                    </svg>Demo</a></li>
        </ul> --}}
    </nav>




    <div class="page">
        <!-- navbar-->
        <header class="header">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="d-flex align-items-center"><a
                                class="menu-btn d-flex align-items-center justify-content-center p-2 bg-gray-900"
                                id="toggle-btn" href="#">
                                <svg class="svg-icon svg-icon-sm svg-icon-heavy text-white">
                                    <use xlink:href="#menu-1"> </use>
                                </svg></a><a class="navbar-brand ms-2" href="#">
                                <div class="brand-text d-none d-md-inline-block text-uppercase letter-spacing-0"><span
                                        class="text-white fw-normal text-xs">Bootstrap </span><strong
                                        class="text-primary text-sm">Dashboard</strong></div>
                            </a></div>
                        <ul class="nav-menu mb-0 list-unstyled d-flex flex-md-row align-items-md-center">
                            <!-- Notifications dropdown-->
                            <li class="nav-item dropdown"> <a class="nav-link text-white position-relative"
                                    id="notifications" rel="nofollow" data-bs-target="#" href="#"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                        <use xlink:href="#chart-1"> </use>
                                    </svg><span class="badge bg-warning">12</span></a>
                                <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm"
                                    aria-labelledby="notifications">
                                    <li><a class="dropdown-item py-3" href="#!">
                                            <div class="d-flex">
                                                <div class="icon icon-sm bg-blue">
                                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                        <use xlink:href="#envelope-1"> </use>
                                                    </svg>
                                                </div>
                                                <div class="ms-3"><span
                                                        class="h6 d-block fw-normal mb-1 text-xs text-gray-600">You
                                                        have 6 new
                                                        messages </span><small class="small text-gray-600">4 minutes
                                                        ago</small></div>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item py-3" href="#!">
                                            <div class="d-flex">
                                                <div class="icon icon-sm bg-green">
                                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                        <use xlink:href="#chats-1"> </use>
                                                    </svg>
                                                </div>
                                                <div class="ms-3"><span
                                                        class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2
                                                        WhatsApp
                                                        messages</span><small class="small text-gray-600">4 minutes
                                                        ago</small></div>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item py-3" href="#!">
                                            <div class="d-flex">
                                                <div class="icon icon-sm bg-orange">
                                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                        <use xlink:href="#checked-window-1"> </use>
                                                    </svg>
                                                </div>
                                                <div class="ms-3"><span
                                                        class="h6 d-block fw-normal mb-1 text-xs text-gray-600">Server
                                                        Rebooted</span><small class="small text-gray-600">8 minutes
                                                        ago</small></div>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item py-3" href="#!">
                                            <div class="d-flex">
                                                <div class="icon icon-sm bg-green">
                                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                        <use xlink:href="#chats-1"> </use>
                                                    </svg>
                                                </div>
                                                <div class="ms-3"><span
                                                        class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2
                                                        WhatsApp
                                                        messages</span><small class="small text-gray-600">10 minutes
                                                        ago</small></div>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item all-notifications text-center" href="#!"> <strong
                                                class="text-xs text-gray-600">view all notifications </strong></a></li>
                                </ul>
                            </li>
                            <!-- Messages dropdown-->
                            <li class="nav-item dropdown"> <a class="nav-link text-white position-relative"
                                    id="messages" rel="nofollow" data-bs-target="#" href="#"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                        <use xlink:href="#envelope-1"> </use>
                                    </svg><span class="badge bg-info">10</span></a>
                                <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm"
                                    aria-labelledby="messages">
                                    <li><a class="dropdown-item d-flex py-3" href="#!"> <img
                                                class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0"
                                                src="{{ asset('whatsapp-assets/img/avatar-1.jpg') }}" alt="..."
                                                width="45">
                                            <div class="ms-3"><span
                                                    class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason
                                                    Doe</span><small class="small text-gray-600"> Sent You
                                                    Message</small>
                                                <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2014
                                                </p>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item d-flex py-3" href="#!"> <img
                                                class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0"
                                                src="{{ asset('whatsapp-assets/img/avatar-2.jpg') }}" alt="..."
                                                width="45">
                                            <div class="ms-3"><span
                                                    class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason
                                                    Doe</span><small class="small text-gray-600"> Sent You
                                                    Message</small>
                                                <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2014
                                                </p>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item d-flex py-3" href="#!"> <img
                                                class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0"
                                                src="{{ asset('whatsapp-assets/img/avatar-3.jpg') }}" alt="..."
                                                width="45">
                                            <div class="ms-3"><span
                                                    class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason
                                                    Doe</span><small class="small text-gray-600"> Sent You
                                                    Message</small>
                                                <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2014
                                                </p>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item text-center" href="#!"> <strong
                                                class="text-xs text-gray-600">Read all
                                                messages </strong></a></li>
                                </ul>
                            </li>
                            <!-- Languages dropdown    -->
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-white text-sm"
                                    id="languages" rel="nofollow" data-bs-target="#" href="#"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                        src="{{ asset('whatsapp-assets/img/flags/16/GB.png') }}" alt="English"><span
                                        class="d-none d-sm-inline-block ms-2">English</span></a>
                                <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm"
                                    aria-labelledby="languages">
                                    <li><a class="dropdown-item" rel="nofollow" href="#!"> <img class="me-2"
                                                src="{{ asset('whatsapp-assets/img/flags/16/DE.png') }}"
                                                alt="English"><span>German</span></a></li>
                                    <li><a class="dropdown-item" rel="nofollow" href="#!"> <img class="me-2"
                                                src="{{ asset('whatsapp-assets/img/flags/16/FR.png') }}"
                                                alt="English"><span>French </span></a></li>
                                </ul>
                            </li>
                            <!-- Log out-->
                            <li class="nav-item"><a class="nav-link text-white text-sm ps-0" href="login.html"> <span
                                        class="d-none d-sm-inline-block">Logout</span>
                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                        <use xlink:href="#security-1"> </use>
                                    </svg></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        {{ $slot }}

        <footer class="main-footer w-100 position-absolute bottom-0 start-0 py-2" style="background: #222">
            <div class="container-fluid">
                <div class="row text-center gy-3">
                    <div class="col-sm-6 text-sm-start">
                        <p class="mb-0 text-sm text-gray-600">Your company &copy; 2017-2021</p>
                    </div>
                    <div class="col-sm-6 text-sm-end">
                        <p class="mb-0 text-sm text-gray-600">Design by <a
                                href="https://bootstrapious.com/p/bootstrap-4-dashboard"
                                class="external">Bootstrapious</a></p>
                        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
                    </div>
                </div>
            </div>
        </footer>

    </div>


    <!-- JavaScript files-->
    <script src="{{ asset('whatsapp-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('whatsapp-assets/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('whatsapp-assets/vendor/just-validate/js/just-validate.min.js') }}"></script>
    <script src="{{ asset('whatsapp-assets/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('whatsapp-assets/vendor/overlayscrollbars/js/OverlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('whatsapp-assets/js/charts-home.js') }}"></script>
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
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}

</body>

</html>
