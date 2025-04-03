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
        @foreach($caseStudies as $caseStudy)
            <tr>
                <td><img style="max-width:100px" src="{{ asset("uploads/caseStudy") }}/{{ $caseStudy->image }}" alt=""></td>
                <td>{{ $caseStudy->title }}</td>
                <td>
                    <input 
                        data-app-btn="caseStudy-status-update"
                        data-casestudy-id="{{ $caseStudy->id }}"
                        @if($caseStudy->status == 1) checked @endif
                        type="checkbox" data-toggle="switchbutton" data-onstyle="danger"
                    >
                </td>
                <td>
                    <a href="{{ route("admin.caseStudy.edit.view",["caseStudy_id"=>$caseStudy->id]) }}" class="btn btn-primary"><i data-feather="edit"></i></a>
                    <a data-casestudy-id="{{ $caseStudy->id }}" data-app-btn="caseStudy-delete" href="" class="btn btn-danger caseStudy_delete"><i data-feather="trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>