@extends("admin.layout.app")
@section("title", "Gatewaytwo Edit")
@section("content")
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">General Elements</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">General Elements</li>
                </ol>
            </div>
        </div>

        <!-- General Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Input Type</h5>
                        <button data-app-btn="gatewaytwo-store" type="submit" class="btn btn-primary">Submit</button>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form data-app-form="gatewaytwo-store">
                            <div class="mb-3">
                                <label for="title" class="form-label">Slug*</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ $gatewaytwo->slug }}">
                                <small data-app-alert="gatewaytwo-store-slug" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                                <small data-app-alert="gatewaytwo-store-image" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title*</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $gatewaytwo->title }}">
                                <small data-app-alert="gatewaytwo-store-title" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Project*</label>
                                <input type="text" class="form-control" id="project" name="project" value="{{ $gatewaytwo->project }}">
                                <small data-app-alert="gatewaytwo-store-project" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Review*</label>
                                <input type="text" class="form-control" id="review" name="review" value="{{ $gatewaytwo->review }}">
                                <small data-app-alert="gatewaytwo-store-review" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Experience*</label>
                                <input type="text" class="form-control" id="experience" name="experience" value="{{ $gatewaytwo->experience }}">
                                <small data-app-alert="gatewaytwo-store-experience" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Status</label>
                                <div>
                                    <input 
                                    id="status"
                                    data-gatewaytwo-id="{{ $gatewaytwo->id }}"
                                    @if($gatewaytwo->status == 1) checked @endif
                                    type="checkbox" data-toggle="switchbutton" data-onstyle="danger"
                                >
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Desc</label>
                                <textarea id="desc" name="desc" class="summernote form-control" rows="5" spellcheck="false">{!! $gatewaytwo->desc !!}</textarea>
                                <small data-app-alert="gatewaytwo-store-desc" class="form-text text-danger"></small>
                            </div> 
                        </form>
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
                .on("click","[data-app-btn=gatewaytwo-store]",handlerSubmit)
                .on("change","#slug",handlerChangeTitle)


            function handlerChangeTitle (e) {
                let val = $(e.target)
                    .val()
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, "")
                    .replace(/\s+/g, "-")
                    .replace(/-+$/g, "")

                $(e.target).val(val)
            }
            async function handlerSubmit (e) {
                try {
                    e.preventDefault()

                    const formData=new FormData()
                    const form = $("[data-app-form=gatewaytwo-store]")

                    const csrf_token=await uptdateCSRFToken()

                    formData.append("_token",csrf_token)
                    formData.append("image",form.find("#image")[0].files[0])
                    formData.append("title",form.find("#title").val())
                    formData.append("project",form.find("#project").val())
                    formData.append("review",form.find("#review").val())
                    formData.append("experience",form.find("#experience").val())
                    formData.append("desc",form.find("#desc").val())
                    formData.append("slug",form.find("#slug").val())
                    formData.append("status",form.find("#status").prop("checked") ? 1 : 0)
                    
                    const store=await submit(formData)

                    if(store.form_error)
                        return showFormErrorMessages(store) 

                    await showNotification(store)
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
                        url: "{{ route('admin.gatewaytwo.update') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                    });

                    return result
                } catch (err) {
                    throw err.responseJSON
                }
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

            function showFormErrorMessages(res) {
                // console.log(res)

                if(!res.form_error) return 

                $("[data-app-alert]").html("")
                $("[data-app-alert]").prev().removeClass("is-invalid")

                Object.keys(res.form_error.message).forEach(key => {
                    const message = res.form_error.message[key][0]
                    $("[data-app-alert$=-"+key+"]").html(message)
                    $("[data-app-alert$=-"+key+"]").prev().addClass("is-invalid")
                })
            }
        })
    </script>
@endpush