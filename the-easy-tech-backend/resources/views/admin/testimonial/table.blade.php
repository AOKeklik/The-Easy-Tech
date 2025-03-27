<table class="datatables table table-bordered dt-responsive table-responsive nowrap">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($testimonials as $testimonial)
            <tr>
                <td>{{ $testimonial->name }}</td>
                <td>{{ $testimonial->position }}</td>
                <td>
                    <input 
                        data-app-btn="testimonial-status-update"
                        data-testimonial-id="{{ $testimonial->id }}"
                        @if($testimonial->status == 1) checked @endif
                        type="checkbox" data-toggle="switchbutton" data-onstyle="danger"
                    >
                </td>
                <td>
                    <a href="{{ route("admin.testimonial.edit.view",["testimonial_id"=>$testimonial->id]) }}" class="btn btn-primary"><i data-feather="edit"></i></a>
                    <a data-testimonial-id="{{ $testimonial->id }}" data-app-btn="testimonial-delete" href="" class="btn btn-danger testimonial_delete"><i data-feather="trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>