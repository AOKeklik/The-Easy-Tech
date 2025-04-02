@extends("admin.layout.app")
@section("title", "Contact")
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
                        <a href="{{ route("admin.contact.view") }}" class="btn btn-primary">Back</a>
                    </div><!-- end card header -->
                    <div class="card-body" data-app-section="contact-table">
                        <h6><strong>Name:</strong> {{ $contact->name }}</h6>
                        <h6><strong>Email:</strong> {{ $contact->email }}</h6>
                        <h6><strong>Subject:</strong> {{ $contact->subject }}</h6>
                        <p><strong>Message:</strong></p>
                        <p>{!! nl2br(e($contact->message)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection