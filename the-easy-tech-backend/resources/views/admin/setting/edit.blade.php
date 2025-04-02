@extends("admin.layout.app")
@section("title", "Setting Edit")
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
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="settingTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">General</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab">Images</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="link-tab" data-bs-toggle="tab" data-bs-target="#link" type="button" role="tab">Links</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="settingTabsContent">
                            <!-- General Settings -->
                            <form data-app-form="setting-general-update" class="tab-pane fade show active" id="general" role="tabpanel">
                                <div class="mb-3 text-end">
                                    <button data-app-btn="setting-general-update" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Name*</label>
                                    <input type="text" class="form-control" id="site_name" name="site_name" value="{{ setting('site_name') }}">
                                    <small data-app-alert="setting-general-update-site_name" class="form-text text-danger"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Email*</label>
                                    <input type="text" class="form-control" id="site_email" name="site_email" value="{{ setting("site_email") }}">
                                    <small data-app-alert="setting-general-update-site_email" class="form-text text-danger"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Phone*</label>
                                    <input type="text" class="form-control" id="site_phone" name="site_phone" value="{{ setting("site_phone") }}">
                                    <small data-app-alert="setting-general-update-site_phone" class="form-text text-danger"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Address*</label>
                                    <input type="text" class="form-control" id="site_address" name="site_address" value="{{ setting("site_address") }}">
                                    <small data-app-alert="setting-general-update-site_address" class="form-text text-danger"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Copy*</label>
                                    <input type="text" class="form-control" id="site_copy" name="site_copy" value="{{ setting("site_copy") }}">
                                    <small data-app-alert="setting-general-update-site_copy" class="form-text text-danger"></small>
                                </div>
                            </form>
                            <form data-app-form="setting-image-update" class="tab-pane fade" id="image" role="tabpanel">
                                <div class="mb-3 text-end">
                                    <button data-app-btn="setting-image-update" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Favicon*</label>
                                    <div class="mb-3">
                                        <img style="max-width: 250px" src="{{ asset("uploads/setting") }}/{{ setting("site_favicon") }}" alt="">
                                    </div>
                                    <input class="form-control" type="file" id="site_favicon" name="site_favicon">
                                    <small data-app-alert="setting-link-update-site_favicon" class="form-text text-danger"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Logo*</label>
                                    <div class="mb-3">
                                        <img style="max-width: 250px" src="{{ asset("uploads/setting") }}/{{ setting("site_logo") }}" alt="">
                                    </div>
                                    <input class="form-control" type="file" id="site_logo" name="site_logo">
                                    <small data-app-alert="setting-link-update-site_logo" class="form-text text-danger"></small>
                                </div>
                            </form>
                            <form data-app-form="setting-link-update" class="tab-pane fade" id="link" role="tabpanel">
                                <div class="mb-3 text-end">
                                    <button data-app-btn="setting-link-update" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Faceboo*</label>
                                    <input type="text" class="form-control" id="link_facebook" name="link_facebook" value="{{ setting("link_facebook") }}">
                                    <small data-app-alert="setting-link-update-link_facebook" class="form-text text-danger"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Linkedin*</label>
                                    <input type="text" class="form-control" id="link_linkedin" name="link_linkedin" value="{{ setting("link_linkedin") }}">
                                    <small data-app-alert="setting-link-update-link_linkedin" class="form-text text-danger"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Twitter*</label>
                                    <input type="text" class="form-control" id="link_twitter" name="link_twitter" value="{{ setting("link_twitter") }}">
                                    <small data-app-alert="setting-link-update-link_twitter" class="form-text text-danger"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Instagram*</label>
                                    <input type="text" class="form-control" id="link_instagram" name="link_instagram" value="{{ setting("link_instagram") }}">
                                    <small data-app-alert="setting-link-update-link_instagram" class="form-text text-danger"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Youtube*</label>
                                    <input type="text" class="form-control" id="link_youtube" name="link_youtube" value="{{ setting("link_youtube") }}">
                                    <small data-app-alert="setting-link-update-link_youtube" class="form-text text-danger"></small>
                                </div>
                            </form>
                        </div>
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
                .on("click","[data-app-btn=setting-general-update]",handlerGeneralSubmit)
                .on("click","[data-app-btn=setting-image-update]",handlerImageSubmit)
                .on("click","[data-app-btn=setting-link-update]",handlerLinkSubmit)
                .on("change","[type=file]",handlerChangeImage)

            function handlerChangeImage (e) {
                const parent = $(e.target).closest(".mb-3")
                const img = parent.find("img")
                const files = e.target.files

                if(files.length === 0) return

                img.attr("src", URL.createObjectURL(files[0]))
            }

            async function handlerGeneralSubmit (e) {
                try {
                    e.preventDefault()

                    const formData=new FormData()
                    const form = $("[data-app-form=setting-general-update]")

                    const csrf_token=await uptdateCSRFToken()

                    formData.append("_token",csrf_token)
                    formData.append("site_name",form.find("#site_name").val())
                    formData.append("site_email",form.find("#site_email").val())
                    formData.append("site_phone",form.find("#site_phone").val())
                    formData.append("site_address",form.find("#site_address").val())
                    formData.append("site_copy",form.find("#site_copy").val())
                    
                    const store=await generalSubmit(formData)

                    if(store.form_error)
                        return showFormErrorMessages(store) 

                    await showNotification(store)
                    resetForm(form)
                }catch(err){
                    console.log(err)
                }finally{
                    hideOverlay()
                }
            }

            async function handlerImageSubmit (e) {
                try {
                    e.preventDefault()

                    const formData=new FormData()
                    const form = $("[data-app-form=setting-image-update]")

                    const csrf_token=await uptdateCSRFToken()

                    formData.append("_token",csrf_token)
                    formData.append("site_favicon",form.find("#site_favicon")[0].files[0] ?? "")
                    formData.append("site_logo",form.find("#site_logo")[0].files[0] ?? "")
                    
                    const update=await imageSubmit(formData)

                    if(update.form_error)
                        return showFormErrorMessages(update) 

                    await showNotification(update)
                    resetForm(form)
                }catch(err){
                    console.log(err)
                }finally{
                    hideOverlay()
                }
            }

            async function handlerLinkSubmit (e) {
                try {
                    e.preventDefault()

                    const formData=new FormData()
                    const form = $("[data-app-form=setting-link-update]")

                    const csrf_token=await uptdateCSRFToken()

                    formData.append("_token",csrf_token)
                    formData.append("link_facebook",form.find("#link_facebook").val())
                    formData.append("link_linkedin",form.find("#link_linkedin").val())
                    formData.append("link_twitter",form.find("#link_twitter").val())
                    formData.append("link_instagram",form.find("#link_instagram").val())
                    formData.append("link_youtube",form.find("#link_youtube").val())
                    
                    const update=await linkSubmit(formData)

                    if(update.form_error)
                        return showFormErrorMessages(update) 

                    await showNotification(update)
                    resetForm(form)
                }catch(err){
                    console.log(err)
                }finally{
                    hideOverlay()
                }
            }

            async function generalSubmit(formData){
                try {
                    await showOverlay()
                    await delay(1000)

                    const result = await $.ajax({
                        type: "POST",
                        url: "{{ route('admin.setting.general.update') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                    });

                    return result
                } catch (err) {
                    throw err.responseJSON
                }
            }

            async function imageSubmit(formData){
                try {
                    await showOverlay()
                    await delay(1000)

                    const result = await $.ajax({
                        type: "POST",
                        url: "{{ route('admin.setting.image.update') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                    });

                    return result
                } catch (err) {
                    throw err.responseJSON
                }
            }

            async function linkSubmit(formData){
                try {
                    await showOverlay()
                    await delay(1000)

                    const result = await $.ajax({
                        type: "POST",
                        url: "{{ route('admin.setting.link.update') }}",
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

            function resetForm(formSelector) {
                $("[data-app-alert]").prev().removeClass("is-invalid")
                $(formSelector).find("[data-app-alert]").html("")
            }
        })
    </script>
@endpush