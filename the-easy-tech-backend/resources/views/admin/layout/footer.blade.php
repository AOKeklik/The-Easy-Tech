       <!--=============================
                    LOADER
        ==============================-->
        <div class="overlay-container d-none">
            <div class="overlay">
                <span class="loader"></span>
            </div>
        </div>
        <!--=============================
                    LOADER
        ==============================-->

        {{-- basic --}}
        <script src="{{ asset("assets-admin/libs/jquery/jquery.min.js") }}"></script>
        <script src="{{ asset("assets-admin/libs/bootstrap/js/bootstrap.bundle.min.js") }}"></script> 
        <script src="{{ asset("assets-admin/libs/simplebar/simplebar.min.js") }}"></script>
        <script src="{{ asset("assets-admin/libs/node-waves/waves.min.js") }}"></script>
        <script src="{{ asset("assets-admin/libs/waypoints/lib/jquery.waypoints.min.js") }}"></script>
        <script src="{{ asset("assets-admin/libs/jquery.counterup/jquery.counterup.min.js") }}"></script>
        <script src="{{ asset("assets-admin/libs/feather-icons/feather.min.js") }}"></script>
        {{-- analytics --}}
        <script src="{{ asset("assets-admin/libs/apexcharts/apexcharts.min.js") }}"></script>
        <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
        <script src="{{ asset("assets-admin/js/pages/analytics-dashboard.init.js") }}"></script>
        {{-- datatable --}}
        <script src="{{ asset("assets-admin/libs/datatables.min.js") }}"></script>
        {{-- izitoast --}}
        <script src="{{ asset("assets-admin/libs/iziToast.min.js") }}" type="text/javascript"></script>
        {{-- switch button --}}
        <script src="{{ asset("assets-admin/libs/bootstrap-switch-button.min.js") }}" type="text/javascript"></script>
        {{-- editor --}}
        <script src="{{ asset("assets-admin/libs/summernote-0.9.0-dist/summernote-bs5.js") }}" type="text/javascript"></script>


        <!-- App js-->
        <script src="{{ asset("assets-admin/js/app.js") }}"></script>

        <!-- Session Messages -->
        @if(Session::has("error"))
        <script>
                iziToast.show({
                title: "{{ Session::get("error") }}",
                position: "topRight",
                color: "red"
            })
        </script>
        @endif
        @if(Session::has("success"))
        <script>
                iziToast.show({
                title: "{{ Session::get("success") }}",
                position: "topRight",
                color: "green"
            })
        </script>
        @endif

        @include("admin.layout.global-js")
        
        @stack("scripts")
    </body>
</html>