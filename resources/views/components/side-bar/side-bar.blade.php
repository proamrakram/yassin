    <!-- Side Navbar -->
    <nav class="side-navbar">
        <!-- Sidebar Header    -->
        <div class="sidebar-header d-flex align-items-center justify-content-center p-3 mb-3">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><img class="img-fluid rounded-circle avatar mb-3"
                    src="/whatsapp-assets/img/me.jpg" alt="person">
                <h2 class="h5 text-white text-uppercase mb-0">Nathan Andrews</h2>
                <p class="text-sm mb-0 text-muted">Web Developer</p>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->

            <a class="brand-small text-center" href="#">
                <p class="h1 m-0">BD</p>
            </a>
        </div>

        <!-- Sidebar Navigation Menus-->

        <span class="text-uppercase text-gray-500 text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Main</span>

        <ul class="list-unstyled">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.home') }}">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                        <use xlink:href="#real-estate-1"> </use>
                    </svg>Home </a>
            </li>

            <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                        <use xlink:href="#browser-window-1"> </use>
                    </svg>Whats App </a>
                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                    <li><a class="sidebar-link" href="{{ route('admin.bots') }}">Bots</a></li>
                    <li><a class="sidebar-link" href="{{ route('admin.users') }}">Users</a></li>
                </ul>
            </li>
        </ul>
    </nav>
