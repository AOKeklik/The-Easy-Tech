@extends("admin.layout.app")
@section("title", "Testimonial")
@section("content")
<div class="content">
    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Data Tables</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Data Tables</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Basic Datatable</h5>
                        <a href="{{ route("admin.testimonial.add.view") }}" class="btn btn-primary">Add</a>
                    </div><!-- end card header -->
                    <div class="card-body" data-app-section="testimonial-table">
                        @include("admin.testimonial.table")
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection
@push("scripts")
    <script>
        $(document).ready(function(){
            $(document)
                .on("change","[data-app-btn=testimonial-status-update]",handlerStatusUpdate)
                .on("click","[data-app-btn=testimonial-delete]",handlerDelete)


            async function handlerStatusUpdate (e) {
                try {
                    e.preventDefault()

                    const formData=new FormData()

                    const csrf_token=await uptdateCSRFToken()

                    formData.append("_token",csrf_token)
                    formData.append("testimonial_id",$(this).data("testimonial-id"))
                    formData.append("status",$(this).prop("checked") ? 1 : 0)
                    
                    const update=await submit(formData)

                    await showNotification(update)
                }catch(err){
                    console.log(err)
                }finally{
                    hideOverlay()
                }
            }

            async function handlerDelete (e) {
                try {
                    e.preventDefault()

                    const formData=new FormData()

                    const csrf_token=await uptdateCSRFToken()

                    formData.append("_token",csrf_token)
                    formData.append("testimonial_id",$(this).data("testimonial-id"))
                    
                    const update=await deleteTestimonial(formData)
                    await fetchCartSidebar()

                    await showNotification(update)
                }catch(err){
                    console.log(err)
                }finally{
                    hideOverlay()
                }
            }

            async function submit(formData){
                try {
                    await showOverlay()
                    await delay(1000)

                    const result = await $.ajax({
                        type: "POST",
                        url: "{{ route('admin.testimonial.status.update') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                    });

                    return result
                } catch (err) {
                    throw err.responseJSON
                }
            }

            async function deleteTestimonial(formData){
                try {
                    await showOverlay()
                    await delay(1000)

                    const result = await $.ajax({
                        type: "POST",
                        url: "{{ route('admin.testimonial.delete') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                    });

                    return result
                } catch (err) {
                    throw err.responseJSON
                }
            }

            function fetchCartSidebar(){
                $.ajax({
                    type:"GET",
                    url:"{{ route('admin.testimonial.table.view') }}",
                    success:function(res){
                        $("[data-app-section=testimonial-table]").html(res)
                        reloadJqueryPlugins ()
                    },
                    error: function(xhr) {
                        console.log(xhr.responseJSON)
                    }
                })
            }

            async function uptdateCSRFToken() {
                try {
                    const response = await $.get("{{ route('csrf.token.refresh') }}")
                    return response.token
                } catch (error) {
                    console.error("Failed to refresh CSRF token", error)
                    return null
                }
            }

            function showNotification(res){
                // console.log(res)
                iziToast.show({
                    title: res.error?.message ?? res.success?.message ?? res.message,
                    position: "topRight",
                    color: res.error ?? res.message ? "red" : "green"
                })
            }

            function showOverlay(){
                $('.overlay-container').removeClass('d-none')
                $('.overlay').addClass('active')
            }

            function hideOverlay(){
                $('.overlay-container').addClass('d-none');
                $('.overlay').removeClass('active')
            }

            function delay(ms) {
                return new Promise(resolve => setTimeout(resolve, ms))
            }

            function reloadJqueryPlugins () {
                feather.replace()// Reinitialize Feather icons
                $("[data-toggle=switchbutton]").each(function() {
                    $(this)[0].switchButton()
                })// Reinitialize switch
                $('.datatables').DataTable({
                    order: [],
                    paging: true,
                    searching: true, 
                })// Reinitialize datatable
                
                // $('#select_js4').niceSelect()
                $('.niceSelect').niceSelect('destroy').niceSelect()
            }
        })
    </script>
@endpush