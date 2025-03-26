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
        @foreach($slides as $slide)
            <tr>
                <td><img style="max-width:100px" src="{{ asset("uploads/slider") }}/{{ $slide->image }}" alt=""></td>
                <td>{{ $slide->title }}</td>
                <td>
                    <input 
                        data-app-btn="slider-status-update"
                        data-slider-id="{{ $slide->id }}"
                        @if($slide->status == 1) checked @endif
                        type="checkbox" data-toggle="switchbutton" data-onstyle="danger"
                    >
                </td>
                <td>
                    <a href="{{ route("admin.slider.edit.view",["slider_id"=>$slide->id]) }}" class="btn btn-primary"><i data-feather="edit"></i></a>
                    <a data-slider-id="{{ $slide->id }}" data-app-btn="slider-delete" href="" class="btn btn-danger slide_delete"><i data-feather="trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>