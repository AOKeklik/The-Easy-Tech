<table class="datatables table table-bordered dt-responsive table-responsive nowrap">
    <thead>
        <tr>
            <th>Name</th>
            <th>Subject</th>
            <th>Email</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->created_at->format('Y-m-d H:i:s'); }}</td>
                <td>
                    <a href="{{ route("admin.contact.detail.view",["contact_id"=>$contact->id]) }}" class="btn btn-primary"><i data-feather="eye"></i></a>
                    <a data-contact-id="{{ $contact->id }}" data-app-btn="contact-delete" href="" class="btn btn-danger slide_delete"><i data-feather="trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>