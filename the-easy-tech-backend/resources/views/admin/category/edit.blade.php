@extends("admin.layout.app")
@section("title", "Category Edit")
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
                        <button data-app-btn="category-store" type="submit" class="btn btn-primary">Submit</button>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form data-app-form="category-store">
                            <input type="hidden" id="category_id" name="category_id" value="{{ request("category_id") }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name*</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                                <small data-app-alert="category-store-name" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Parent</label>
                                <select class="form-select form-select-lg"  name="parent_id" id="parent_id">
                                    <option value="">Select one</option>
                                    @foreach($categories as $cat)
                                        <option  @if($cat->id == $category->id) selected @endif value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <small data-app-alert="category-store-type" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug*</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}">
                                <small data-app-alert="category-store-slug" class="form-text text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Type*</label>
                                <select class="form-select form-select-lg"  name="type" id="type">
                                    <option selected>Select one</option>
                                    <option @if($category->type == "page") selected @endif value="page">Page</option>
                                    <option @if($category->type == "blog") selected @endif value="blog">Blog</option>
                                    <option @if($category->type == "study") selected @endif value="study">Study</option>
                                </select>
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
                .on("click","[data-app-btn=category-store]",handlerSubmit)


            async function handlerSubmit (e) {
                try {
                    e.preventDefault()

                    const formData=new FormData()
                    const form = $("[data-app-form=category-store]")

                    const csrf_token=await uptdateCSRFToken()

                    formData.append("_token",csrf_token)
                    formData.append("category_id",form.find("#category_id").val())
                    formData.append("parent_id",form.find("#parent_id").val() ?? "")
                    formData.append("name",form.find("#name").val())
                    formData.append("slug",form.find("#slug").val())
                    formData.append("type",form.find("#type").val())
                    
                    const store=await submit(formData)

                    if(store.form_error)
                        return showFormErrorMessages(store) 

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
                        url: "{{ route('admin.category.update') }}",
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