@extends("admin.layout.app")
@section("title", "Profile")
@section("content")
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Profile</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Components</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>

        <!-- start row -->
        <!-- <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="assets/images/users/user-11.jpg" class="rounded-2 avatar-xxl" alt="image profile">

                                <div class="overflow-hidden ms-4">
                                    <h4 class="m-0 text-dark fs-20">Phoenix Baker</h4>
                                    <p class="my-1 text-muted fs-16">Passionate Software Engineer Crafting Innovative Solutions</p>
                                    <span class="fs-15"><i class="mdi mdi-message me-2 align-middle"></i>Speaks: <span>English <span class="badge bg-primary-subtle text-primary px-2 py-1 fs-13 fw-normal">native</span> , Spanish, Turkish </span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> -->
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <div class="align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <img data-app-img="avatar" src="{{ asset("uploads/user") }}/{{ auth()->user()->avatar }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">

                                <div class="overflow-hidden ms-4">
                                    <h4 class="m-0 text-dark fs-20">{{ auth()->user()->name }}</h4>
                                    <p class="my-1 text-muted fs-16">{{ auth()->user()->role }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="card border mb-0">

                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">                      
                                                <h4 class="card-title mb-0">Personal Information</h4>                      
                                            </div><!--end col-->                                                       
                                        </div>
                                    </div>

                                    <form data-app-form="profile-update" class="card-body">
                                        <div class="form-group mb-3 row">
                                            <label class="form-label">Avatar</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control" type="file" id="avatar" name="avatar">
                                                <small data-app-alert="profile-update-avatar" class="form-text text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3 row">
                                            <label class="form-label">Name</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control" type="text" id="name" name="name" value="{{ auth()->user()->name }}">
                                                <small data-app-alert="profile-update-name" class="form-text text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3 row">
                                            <label class="form-label">Email Address</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                                    <input type="text" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="Email">
                                                    <small data-app-alert="profile-update-email" class="form-text text-danger"></small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-12 col-xl-12">
                                                <button data-app-btn="profile-update" type="submit" class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </div>
                                    </form><!--end card-body-->
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-6">
                                <div class="card border mb-0">

                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">                      
                                                <h4 class="card-title mb-0">Change Password</h4>                      
                                            </div><!--end col-->                                                       
                                        </div>
                                    </div>

                                    <form data-app-form="profile-password-update" class="card-body mb-0">
                                        <div class="form-group mb-3 row">
                                            <label class="form-label">Old Password</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control" type="password" name="old_password" id="old_password" placeholder="Old Password">
                                                <small data-app-alert="profile-password-update-old_password" class="form-text text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label">New Password</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control" type="password" name="password" id="password" placeholder="New Password">
                                                <small data-app-alert="profile-password-update-password" class="form-text text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label">Confirm Password</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                                <small data-app-alert="profile-password-update-confirm_password" class="form-text text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-12 col-xl-12">
                                                <button data-app-btn="profile-password-update" type="submit" class="btn btn-primary">Change Password</button>
                                            </div>
                                        </div>

                                    </form><!--end card-body-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> 
    <!-- container-fluid -->
</div> 
@endsection
@push("scripts")
    <script>
        $(document).ready(function(){
            $(document)
                .on("click","[data-app-btn=profile-update]",handlerProfileUpdate)
                .on("click","[data-app-btn=profile-password-update]",handlerProfilePasswordUpdate)
                .on("change","[data-app-form=profile-update] [type=file]",handlerChangeImage)


            function handlerChangeImage (e) {
                const imgs = document.querySelectorAll("[data-app-img=avatar]")
                const files = e.target.files

                if(files.length === 0) return

                imgs.forEach(img => {
                    img.setAttribute("src", URL.createObjectURL(files[0]))
                    img.parentElement.style.display = "block"
                })
            }
            
            async function handlerProfileUpdate (e) {
                try {
                    e.preventDefault()

                    const formData=new FormData()
                    const form = $("[data-app-form=profile-update]")

                    const csrf_token=await uptdateCSRFToken()

                    formData.append("_token",csrf_token)
                    formData.append("avatar",$("#avatar")[0].files[0] ?? "")
                    formData.append("name",form.find("#name").val())
                    formData.append("email",form.find("#email").val())
                    
                    const update=await profileUpdate(formData)

                    if(update.form_error)
                        return showFormErrorMessages(update) 

                    await showNotification(update)
                }catch(err){
                    console.log(err)
                }finally{
                    hideOverlay()
                }
            }

            async function handlerProfilePasswordUpdate (e) {
                try {
                    e.preventDefault()

                    const formData=new FormData()
                    const form = $("[data-app-form=profile-password-update]")

                    const csrf_token=await uptdateCSRFToken()

                    formData.append("_token",csrf_token)
                    formData.append("old_password",form.find("#old_password").val())
                    formData.append("password",form.find("#password").val())
                    formData.append("confirm_password",form.find("#confirm_password").val())
                    
                    const update=await profilePasswordUpdate(formData)

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

            async function profileUpdate(formData){
                try {
                    await showOverlay()
                    await delay(1000)

                    const result = await $.ajax({
                        type: "POST",
                        url: "{{ route('admin.profile.update') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                    });

                    return result
                } catch (err) {
                    throw err.responseJSON
                }
            }

            async function profilePasswordUpdate(formData){
                try {
                    await showOverlay()
                    await delay(1000)

                    const result = await $.ajax({
                        type: "POST",
                        url: "{{ route('admin.profile.password.update') }}",
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

                $(formSelector)[0].reset()
                $(formSelector).find("[data-app-alert]").html("")
            }
        })
    </script>
@endpush