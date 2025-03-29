<table class="datatables table table-bordered dt-responsive table-responsive nowrap">
    <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Type</th>
            <th>Parent</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->type }}</td>
                <td>{{ $category->parent->name ?? "" }}</td>
                <td>
                    <input 
                        data-app-btn="category-status-update"
                        data-category-id="{{ $category->id }}"
                        @if($category->status == 1) checked @endif
                        type="checkbox" data-toggle="switchbutton" data-onstyle="danger"
                    >
                </td>
                <td>
                    <a href="{{ route("admin.category.edit.view",["category_id"=>$category->id]) }}" class="btn btn-primary"><i data-feather="edit"></i></a>
                    <a data-category-id="{{ $category->id }}" data-app-btn="category-delete" href="" class="btn btn-danger category_delete"><i data-feather="trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>