@include("admin.layout.header")
@section("title","Reset Password")
<div class="account-page">
    <div class="container-fluid p-0">
        <div class="row align-items-center g-0">
            <div class="col-xl-5">
                <div class="row">
                    <div class="col-md-7 mx-auto">
                        <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
                            <div class="mb-4 p-0">
                                <a class="auth-logo">
                                    <img src="{{  asset("assets-admin/images/logo-dark.png") }}" alt="logo-dark" class="mx-auto" height="28" />
                                </a>
                            </div>

                            <div class="pt-0">
                                <form data-app-form="reset-submit" class="my-4">
                                    <input type="hidden" id="email" name="email" value="{{ request("email") }}">
                                    <input type="hidden" id="token" name="token" value="{{ request("token") }}">
                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password">
                                        <small data-app-alert="reset-submit-password" class="form-text text-danger"></small>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="confirm_password" class="form-label">Confirm Password</label>
                                        <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="Enter your password">
                                        <small data-app-alert="reset-submit-confirm_password" class="form-text text-danger"></small>
                                    </div>
                                    
                                    <div class="form-group mb-0 row">
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button data-app-btn="reset-submit" class="btn btn-primary" type="submit"> Unlock </button>
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
                            <img src="{{  asset("assets-admin/images/authentication.svg") }}" class="mx-auto img-fluid"  alt="images">
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
            RESET SUBMIT FORM
        \\\\\\\\\\\\\\\\\\\\\\\\ */
        $(document).ready(function(){
            $(document)
                .on("click","[data-app-btn=reset-submit]",handlerSubmitReset)


            async function handlerSubmitReset (e) {
                try {
                    e.preventDefault()

                    const formData=new FormData()
                    const form = $("[data-app-form=reset-submit]")

                    const csrf_token=await uptdateCSRFToken()

                    formData.append("_token",csrf_token)
                    formData.append("email",form.find("#email").val())
                    formData.append("token",form.find("#token").val())
                    formData.append("password",form.find("#password").val())
                    formData.append("confirm_password",form.find("#confirm_password").val())
                    
                    const submit=await submitReset(formData)

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

            async function submitReset(formData){
                try {
                    await showOverlay()
                    await delay(1000)

                    const result = await $.ajax({
                        type: "POST",
                        url: "{{ route('admin.submit.reset') }}",
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