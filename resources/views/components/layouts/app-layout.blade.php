<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <title>HORIZONS</title>
</head>

<body>

    <header class="container-fluid px-lg-0">
        <div class="container py-4">
            <div class="row flex-nowrap justify-content-between align-items-center">

                <div class="col-auto">
                    <a href="">
                        <img src="{{ asset('assets/images/logo.svg') }}" height="46" alt="logo">
                    </a>
                </div>

                <div class="col-auto links">
                    <a href="#home" class="me-3 me-lg-4 mb-3 mb-lg-0">
                        Home
                    </a>
                    <a href="#whatis" class="me-3 me-lg-4 mb-3 mb-lg-0">
                        What is the game?
                    </a>
                    <a href="#information" class="me-3 me-lg-4 mb-3 mb-lg-0">
                        Information
                    </a>
                    <a href="#InvestmentSystem" class="me-3 me-lg-4 mb-3 mb-lg-0">
                        Investment System
                    </a>
                    <a href="#faq" >
                        FAQ
                    </a>
                </div>
                <div class="over"></div>

                <div class="col-auto">
                    <a href="#Subscribe" class="btn-sm">
                        Subscribe
                    </a>
                    <a class="ms-3 d-lg-none toggle-menu" href="javascript:void(0)">
                        <svg id="Menu" xmlns="http://www.w3.org/2000/svg" width="22.177" height="15.246"
                            viewBox="0 0 22.177 15.246">
                            <path id="Path_39" data-name="Path 39"
                                d="M.693,61.538H21.484a.693.693,0,1,0,0-1.386H.693a.693.693,0,1,0,0,1.386Z"
                                transform="translate(0 -60.152)" fill="#fff" />
                            <path id="Path_40" data-name="Path 40"
                                d="M21.484,180.455H.693a.693.693,0,1,0,0,1.386H21.484a.693.693,0,1,0,0-1.386Z"
                                transform="translate(0 -173.525)" fill="#fff" />
                            <path id="Path_41" data-name="Path 41"
                                d="M21.484,300.758H.693a.693.693,0,0,0,0,1.386H21.484a.693.693,0,0,0,0-1.386Z"
                                transform="translate(0 -286.898)" fill="#fff" />
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </header>

    {{ $slot }}

    <footer class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 py-3">
                    <div>
                        <p>
                            © Copyright 2022 Yassin- All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
