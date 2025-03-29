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
        @foreach($blogs as $blog)
            <tr>
                <td><img style="max-width:100px" src="{{ asset("uploads/blog") }}/{{ $blog->image }}" alt=""></td>
                <td>{{ $blog->title }}</td>
                <td>
                    <input 
                        data-app-btn="blog-status-update"
                        data-blog-id="{{ $blog->id }}"
                        @if($blog->status == 1) checked @endif
                        type="checkbox" data-toggle="switchbutton" data-onstyle="danger"
                    >
                </td>
                <td>
                    <a href="{{ route("admin.blog.edit.view",["blog_id"=>$blog->id]) }}" class="btn btn-primary"><i data-feather="edit"></i></a>
                    <a data-blog-id="{{ $blog->id }}" data-app-btn="blog-delete" href="" class="btn btn-danger blog_delete"><i data-feather="trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>