@extends("admin.layout.app")
@section("title", "Service Add")
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
                        <button data-app-btn="service-store" type="submit" class="btn btn-primary">Submit</button>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form data-app-form="service-store">
                            <div class="mb-3">
                                <label for="title" class="form-label">Slug*</label>
                                <input type="text" class="form-control" id="slug" name="slug" readonly>
                                <small data-app-alert="service-store-slug" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                                <small data-app-alert="service-store-image" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Icon*</label>
                                <input type="text" class="form-control" id="icon" name="icon">
                                <small data-app-alert="service-store-icon" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title*</label>
                                <input type="text" class="form-control" id="title" name="title">
                                <small data-app-alert="service-store-title" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Desc</label>
                                <textarea id="desc" name="desc" class="summernote form-control" rows="5" spellcheck="false"></textarea>
                                <small data-app-alert="service-store-desc" class="form-text text-danger"></small>
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
                .on("click","[data-app-btn=service-store]",handlerSubmit)
                .on("change","#title",handlerChangeTitle)


            function handlerChangeTitle (e) {
                $("input[name=slug]").val(
                    $(this)
                        .val()
                        .toLowerCase()
                        .trim()
                        .replace(/[^\w ]/g,"")
                        .replace(/[\s-]+/g,"-")
                        .replace(/-$/, "")
                )
            }
            async function handlerSubmit (e) {
                try {
                    e.preventDefault()

                    const formData=new FormData()
                    const form = $("[data-app-form=service-store]")

                    const csrf_token=await uptdateCSRFToken()

                    formData.append("_token",csrf_token)
                    formData.append("icon",form.find("#icon").val())
                    formData.append("image",form.find("#image")[0].files[0])
                    formData.append("title",form.find("#title").val())
                    formData.append("desc",form.find("#desc").val())
                    
                    const store=await submit(formData)

                    if(store.form_error)
                        return showFormErrorMessages(store) 

                    await resetForm(form)
                    await showNotification(store)
                    redirect(store)
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
                        url: "{{ route('admin.service.store') }}",
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
                console.log($('.overlay-container'))
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

            function resetForm(formSelector) {
                $("[data-app-alert]").prev().removeClass("is-invalid")

                $(formSelector)[0].reset()
                $(formSelector).find("[data-app-alert]").html("")
            }

            async function redirect(res) {
                // console.log(res);

                if (res.success?.redirect || res.error?.redirect) {
                    await delay(1000)
                    window.location.href = res.success?.redirect ?? res.error?.redirect;
                }
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