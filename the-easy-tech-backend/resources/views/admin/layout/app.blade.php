@include("admin.layout.header")


<div id="app-layout">
    <!--=================
        NAVIGATION
    =================-->
    @include("admin.layout.nav")
    <!--=================
        NAVIGATION
    =================-->

    <!--=================
            SIDEBAR
    =================-->
    @include("admin.layout.sidebar")
    <!--=================
            SIDEBAR
    =================-->

    <div class="content-page">
        <!--=================
                CONTENT
        =================-->
            @yield("content")
        <!--=================
                CONTENT
        =================-->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col fs-13 text-muted text-center">
                        &copy; <script>document.write(new Date().getFullYear())</script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">Easy Tech</a> 
                    </div>
                </div>
            </div>
        </footer>

        <!--=================
                FOOTER
        =================-->
        @include("admin.layout.footer")
        <!--=================
                FOOTER
        =================-->
    </div>
</div>









