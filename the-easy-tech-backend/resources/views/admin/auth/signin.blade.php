@include("admin.layout.header")
@section("title","Signin")
<div class="account-page">
    <div class="container-fluid p-0">
        <div class="row align-items-center g-0">
            <div class="col-xl-5">
                <div class="row">
                    <div class="col-md-7 mx-auto">
                        <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
                            <div class="mb-4 p-0">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{ asset("assets-admin/images/logo-dark.png") }}" alt="logo-dark" class="mx-auto" height="28" />
                                </a>
                            </div>

                            <div class="pt-0">

                                <form data-app-form="signin-submit" class="my-4">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input value="{{ old("email") }}" class="form-control" type="email" id="email" name="email" placeholder="Enter your email">
                                        <small data-app-alert="signin-submit-email" class="form-text text-danger"></small>
                                    </div>
        
                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input value="{{ old("password") }}" class="form-control" type="password" id="password" name="password" placeholder="Enter your password">
                                        <small data-app-alert="signin-submit-password" class="form-text text-danger"></small>
                                    </div>
        
                                    <div class="form-group d-flex mb-3">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <a class='text-muted fs-14' href='{{ route("admin.view.forget") }}'>Forgot password?</a>                             
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-0 row">
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button data-app-btn="signin-submit" class="btn btn-primary" type="submit"> Log In </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-7">
                <div class="account-page-bg p-md-5 p-4">
                    <div class="text-center">
                        <h3 class="text-dark mb-3 pera-title">Quick, Effective, and Productive With Tapeli Admin Dashboard</h3>
                        <div class="auth-image">
                            <img src="{{ asset("assets-admin/images/authentication.svg") }}" class="mx-auto img-fluid"  alt="images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push("scripts")
    <script>
        /* //////////////////////
            SIGNIN SUBMIT FORM
        \\\\\\\\\\\\\\\\\\\\\\\\ */
        $(document).ready(function(){
            $(document)
                .on("click","[data-app-btn=signin-submit]",handlerSubmitSignin)


            async function handlerSubmitSignin (e) {
                try {
                    e.preventDefault()

                    const formData=new FormData()
                    const form = $("[data-app-form=signin-submit]")

                    const csrf_token=await uptdateCSRFToken()

                    formData.append("_token",csrf_token)
                    formData.append("email",form.find("#email").val())
                    formData.append("password",form.find("#password").val())
                    
                    const submit=await submitSignin(formData)

                    if(submit.form_error)
                        return showFormErrorMessages(submit) 

                    await resetForm(form)
                    await showNotification(submit)
                    redirect(submit)
                }catch(err){
                    console.log(err)
                }finally{
                    hideOverlay()
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

            async function submitSignin(formData){
                try {
                    await showOverlay()
                    await delay(1000)

                    const result = await $.ajax({
                        type: "POST",
                        url: "{{ route('admin.signin.submit') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                    });

                    return result
                } catch (err) {
                    throw err.responseJSON
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

            function resetForm(formSelector) {
                $("[data-app-alert]").prev().removeClass("is-invalid")

                $(formSelector)[0].reset()
                $(formSelector).find("[data-app-alert]").html("")
            }

            async function redirect(res) {
                // console.log(res);

                if (res.success?.redirect || res.error?.redirect) {
                    await delay(2000)
                    window.location.href = res.success?.redirect ?? res.error?.redirect;
                }
            }

            function showFormErrorMessages(res) {
                // console.log(res)

                if(!res.form_error) return 

                $("[data-app-alert]").html("")
                $("[data-app-alert]").prev().addClass("is-invalid")

                Object.keys(res.form_error.message).forEach(key => {
                    const message = res.form_error.message[key][0]
                    $("[data-app-alert$=-"+key+"]").html(message)
                })
            }
        })
        
    </script>
@endpush
@include("admin.layout.footer")