<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <div class="logo-box">
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset("assets-admin/images/logo-sm.png") }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset("assets-admin/images/logo-light.png") }}" alt="" height="24">
                    </span>
                </a>
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset("assets-admin/images/logo-sm.png") }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset("assets-admin/images/logo-dark.png") }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route("admin.view") }}" class="tp-link">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
    
                <!-- <li>
                    <a href="landing.html" target="_blank">
                        <i data-feather="globe"></i>
                        <span> Landing </span>
                    </a>
                </li> -->

                <li class="menu-title">Pages</li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i data-feather="sliders"></i>
                        <span> Slider </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route("admin.slider.view") }}" class="tp-link">Slides</a>
                            </li>
                            <li>
                                <a href="{{ route("admin.slider.add.view") }}" class="tp-link">Add Slide</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i data-feather="tool"></i>
                        <span> Service </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route("admin.service.view") }}" class="tp-link">Services</a>
                            </li>
                            <li>
                                <a href="{{ route("admin.service.add.view") }}" class="tp-link">Add Service</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route("admin.gatewayone.edit.view") }}" class="tp-link">
                        <i data-feather="credit-card"></i>
                        <span> Getawayone </span>
                    </a>
                </li>

                <li class="menu-title mt-2">General</li>

                <li>
                    <a href="#sidebarBaseui" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Components </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBaseui">
                        <ul class="nav-second-level">
                            <li>
                                <a href="ui-accordions.html" class="tp-link">Accordions</a>
                            </li>
                            <li>
                                <a href="ui-alerts.html" class="tp-link">Alerts</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarMaps" data-bs-toggle="collapse">
                        <i data-feather="map"></i>
                        <span> Maps </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMaps">
                        <ul class="nav-second-level">
                            <li>
                                <a href="maps-google.html" class="tp-link">Google Maps</a>
                            </li>
                            <li>
                                <a href="maps-vector.html" class="tp-link">Vector Maps</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
</div>