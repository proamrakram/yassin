<header class="header">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between w-100">

                <div class="d-flex align-items-center">

                    <a class="menu-btn d-flex align-items-center justify-content-center p-2 bg-gray-900" id="toggle-btn"
                        href="#">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy text-white">
                            <use xlink:href="#menu-1"> </use>
                        </svg>
                    </a>

                    <a class="navbar-brand ms-2" href="#">
                        <div class="brand-text d-none d-md-inline-block text-uppercase letter-spacing-0">

                            <span class="text-white fw-normal text-xs">Bootstrap </span>
                            <strong class="text-primary text-sm">Dashboard</strong>
                        </div>

                    </a>
                </div>


                <ul class="nav-menu mb-0 list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Notifications dropdown-->
                    <li class="nav-item dropdown">

                        <a class="nav-link text-white position-relative" id="notifications" rel="nofollow"
                            data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">

                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                <use xlink:href="#chart-1"> </use>
                            </svg>

                            <span class="badge bg-warning">12</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm" aria-labelledby="notifications">

                            <li>
                                <a class="dropdown-item py-3" href="#!">
                                    <div class="d-flex">
                                        <div class="icon icon-sm bg-blue">
                                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                <use xlink:href="#envelope-1"> </use>
                                            </svg>
                                        </div>

                                        <div class="ms-3">
                                            <span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">You have 6 new
                                                messages </span><small class="small text-gray-600">
                                                4 minutes ago
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item py-3" href="#!">
                                    <div class="d-flex">
                                        <div class="icon icon-sm bg-green">
                                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                <use xlink:href="#chats-1"> </use>
                                            </svg>
                                        </div>
                                        <div class="ms-3">
                                            <span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2
                                                WhatsApp messages
                                            </span>
                                            <small class="small text-gray-600">
                                                4 minutes ago
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item py-3" href="#!">
                                    <div class="d-flex">
                                        <div class="icon icon-sm bg-orange">
                                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                <use xlink:href="#checked-window-1"> </use>
                                            </svg>
                                        </div>

                                        <div class="ms-3">
                                            <span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">
                                                Server Rebooted
                                            </span>
                                            <small class="small text-gray-600">
                                                8 minutes ago
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item py-3" href="#!">
                                    <div class="d-flex">
                                        <div class="icon icon-sm bg-green">
                                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                <use xlink:href="#chats-1"> </use>
                                            </svg>
                                        </div>
                                        <div class="ms-3">
                                            <span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">
                                                New 2 WhatsApp messages
                                            </span>
                                            <small class="small text-gray-600">
                                                10 minutes ago
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item all-notifications text-center" href="#!">
                                    <strong class="text-xs text-gray-600">view all notifications </strong>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Messages dropdown-->
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white position-relative" id="messages" rel="nofollow"
                            data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">

                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                <use xlink:href="#envelope-1"> </use>
                            </svg>

                            <span class="badge bg-info">10</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm" aria-labelledby="messages">
                            <li>
                                <a class="dropdown-item d-flex py-3" href="#!">
                                    <img class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0"
                                        src="{{ asset('whatsapp-assets/img/avatar-1.jpg') }}" alt="..."
                                        width="45">
                                    <div class="ms-3">
                                        <span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">
                                            Jason Doe
                                        </span>
                                        <small class="small text-gray-600">
                                            Sent You Message
                                        </small>

                                        <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2014

                                        </p>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item d-flex py-3" href="#!">
                                    <img class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0"
                                        src="{{ asset('whatsapp-assets/img/avatar-2.jpg') }}" alt="..."
                                        width="45">
                                    <div class="ms-3">
                                        <span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">
                                            Jason Doe
                                        </span>
                                        <small class="small text-gray-600">
                                            Sent You Message</small>
                                        <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2014
                                        </p>
                                    </div>
                                </a>
                            </li>

                            <li><a class="dropdown-item d-flex py-3" href="#!">
                                    <img class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0"
                                        src="{{ asset('whatsapp-assets/img/avatar-3.jpg') }}" alt="..."
                                        width="45">
                                    <div class="ms-3">
                                        <span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">
                                            Jason Doe
                                        </span>
                                        <small class="small text-gray-600">
                                            Sent You Message
                                        </small>

                                        <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2014 </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-center" href="#!">
                                    <strong class="text-xs text-gray-600">
                                        Read all messages
                                    </strong>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Languages dropdown    -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white text-sm" id="languages" rel="nofollow"
                            data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">

                            <img src="{{ asset('whatsapp-assets/img/flags/16/GB.png') }}" alt="English">

                            <span class="d-none d-sm-inline-block ms-2">English</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm" aria-labelledby="languages">
                            <li>
                                <a class="dropdown-item" rel="nofollow" href="#!">
                                    <img class="me-2" src="{{ asset('whatsapp-assets/img/flags/16/DE.png') }}"
                                        alt="English"><span>
                                        German</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" rel="nofollow" href="#!">
                                    <img class="me-2" src="{{ asset('whatsapp-assets/img/flags/16/FR.png') }}"
                                        alt="English"><span>
                                        French
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Log out-->
                    <li class="nav-item">
                        <a class="nav-link text-white text-sm ps-0" href="login.html">
                            <span class="d-none d-sm-inline-block">Logout</span>
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                <use xlink:href="#security-1"> </use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
