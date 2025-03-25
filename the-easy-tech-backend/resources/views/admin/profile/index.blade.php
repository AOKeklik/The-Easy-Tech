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
                                <img src="{{ asset("uploads/user") }}/{{ auth()->user()->avatar }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">

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

                                    <div class="card-body">
                                        <div class="form-group mb-3 row">
                                            <label class="form-label">First Name</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control" type="text" value="Charles">
                                            </div>
                                        </div>

                                        <div class="form-group mb-3 row">
                                            <label class="form-label">Last Name</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control" type="text" value="Buncle">
                                            </div>
                                        </div>

                                        <div class="form-group mb-3 row">
                                            <label class="form-label">Email Address</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                                    <input type="text" class="form-control" value="CharlesBuncle@dayrep.com" placeholder="Email" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-body-->
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

                                    <div class="card-body mb-0">
                                        <div class="form-group mb-3 row">
                                            <label class="form-label">Old Password</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control" type="password" placeholder="Old Password">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label">New Password</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control" type="password" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label">Confirm Password</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control" type="password" placeholder="Confirm Password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-12 col-xl-12">
                                                <button type="submit" class="btn btn-primary">Change Password</button>
                                                <button type="button" class="btn btn-danger">Cancel</button>
                                            </div>
                                        </div>

                                    </div><!--end card-body-->
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