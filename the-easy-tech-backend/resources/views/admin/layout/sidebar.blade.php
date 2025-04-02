<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <div class="logo-box">
                <a href="{{ route("admin.view") }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset("assets-admin/images/logo-sm.png") }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset("assets-admin/images/logo-light.png") }}" alt="" height="24">
                    </span>
                </a>
                <a href="{{ route("admin.view") }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset("assets-admin/images/logo-sm.png") }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset("uploads/setting") }}/{{ setting("site_logo") }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Genearal</li>

                <li>
                    <a href="{{ route("admin.view") }}" class="tp-link">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route("admin.contact.view") }}" class="tp-link">
                        <i data-feather="mail"></i>
                        <span> Contact </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route("admin.setting.edit.view") }}" class="tp-link">
                        <i data-feather="settings"></i>
                        <span> Setting </span>
                    </a>
                </li>

                <li>
                    <a href="#category" data-bs-toggle="collapse">
                        <i data-feather="tag"></i>
                        <span> Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route("admin.category.view") }}" class="tp-link">Categories</a>
                            </li>
                            <li>
                                <a href="{{ route("admin.category.add.view") }}" class="tp-link">Add Category</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title">Sections</li>

                <li>
                    <a href="#slider" data-bs-toggle="collapse">
                        <i data-feather="sliders"></i>
                        <span> Slider </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="slider">
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
                    <a href="#service" data-bs-toggle="collapse">
                        <i data-feather="tool"></i>
                        <span> Service </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="service">
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
                    <a href="#gateway" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span> Getaway </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="gateway">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route("admin.gatewayone.edit.view") }}" class="tp-link">Getawayone</a>
                            </li>
                            <li>
                                <a href="{{ route("admin.gatewaytwo.edit.view") }}" class="tp-link">Getewaytwo</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#testimonial" data-bs-toggle="collapse">
                        <i data-feather="message-circle"></i>
                        <span> Testimonial </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="testimonial">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route("admin.testimonial.view") }}" class="tp-link">Testimonials</a>
                            </li>
                            <li>
                                <a href="{{ route("admin.testimonial.add.view") }}" class="tp-link">Add Testimonial</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Pages</li>

                <li>
                    <a href="#blog" data-bs-toggle="collapse">
                        <i data-feather="file-text"></i>
                        <span> Blog </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="blog">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route("admin.blog.view") }}" class="tp-link">Blogs</a>
                            </li>
                            <li>
                                <a href="{{ route("admin.blog.add.view") }}" class="tp-link">Add Blog</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route("admin.about.edit.view") }}" class="tp-link">
                        <i data-feather="users"></i>
                        <span> About </span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
</div>