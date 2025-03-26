<table class="datatables table table-bordered dt-responsive table-responsive nowrap">
    <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $service)
            <tr>
                <td><img style="max-width:100px" src="{{ asset("uploads/service") }}/{{ $service->image }}" alt=""></td>
                <td>{{ $service->title }}</td>
                <td>
                    <input 
                        data-app-btn="service-status-update"
                        data-service-id="{{ $service->id }}"
                        @if($service->status == 1) checked @endif
                        type="checkbox" data-toggle="switchbutton" data-onstyle="danger"
                    >
                </td>
                <td>
                    <a href="{{ route("admin.service.edit.view",["service_id"=>$service->id]) }}" class="btn btn-primary"><i data-feather="edit"></i></a>
                    <a data-service-id="{{ $service->id }}" data-app-btn="service-delete" href="" class="btn btn-danger service_delete"><i data-feather="trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>