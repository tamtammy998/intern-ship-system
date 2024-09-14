<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-primary-subtle">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">Welcome Back !</h5>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="pt-4">
                            
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="font-size-15">20 Hrs</h5>
                                    <p class="text-muted mb-0">Rendered</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="font-size-15">{{ $intern->completion }} Hrs</h5>
                                    <p class="text-muted mb-0">Completion</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- end card -->
            <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Personal Information</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Full Name :</th>
                                <td>{{ ucwords($intern->first_name . ' ' .$intern->middle_name. ' ' .$intern->last_name ) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Mobile :</th>
                                <td>{{ $intern->ccontact }}</td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail :</th>
                                <td>{{ $intern->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Program :</th>
                                <td>{{ isset($intern->programs) ? ucwords($intern->programs->abbreviation) : 'No programs assigned' }}</td>
                            </tr>

                            <tr>
                                <th scope="row">Campus Location :</th>
                                <td>{{ isset($intern->campus) ? $intern->campus->location : 'No campus assigned' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div><br>
                <h4 class="card-title mb-4"> In case of Emergency</h4> 
                <table class="table table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Full Name :</th>
                                <td>{{ ucwords($intern->mname) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Mobile :</th>
                                <td>{{ $intern->fname }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Contact Number:</th>
                                <td>{{ $intern->ccontact }}</td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
        <!-- end card -->
    </div>  
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">My Requirements</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Requirements</th>
                                <th scope="col">Date Submitted</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents as $document)
                                <tr>
                                    <td>{{ $document->name }}</td>
                                    <td> 
                                    {{ @$document->upload->created_at ? date('m/d/Y g:i A', strtotime($document->upload->created_at)) : 'Not yet' }}
                                </td>
                                
                                <td>
                                        @if(@$document->upload->status)
                                        <select class="form-control select2" name="gender" onchange="change_status({{ $document->upload->id }}, this.value)">
                                            <option>Select</option>
                                            <option value="pending" {{ @$document->upload->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved"{{ @$document->upload->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="reject"{{ @$document->upload->status == 'reject' ? 'selected' : '' }}>Reject</option>
                                        </select>
                                        @else
                                        Not yet
                                        @endif
                                </td>
                                <td>
                                    @if(@$document->upload->status)
                                    <div class="d-flex justify-content-center">
                                        @if(in_array(strtolower($document->upload->document_extension), ['jpg', 'jpeg', 'pdf']))
                                            <a class="btn btn-primary btn-sm me-2" 
                                                href="#" 
                                                title="View" 
                                                onclick="handlePreview(event, '{{ asset('storage/'. $document->upload->document_path) }}', {{ $document->upload->id }})">
                                                <i class="bx bx-file"></i>
                                            </a>
                                        @endif
                                        
                                        <a class="btn btn-success btn-sm me-2" 
                                            href="#" 
                                            title="Download" 
                                            onclick="handleDownload(event, {{ $document->upload->id }})">
                                            <i class="bx bxs-download"></i>
                                        </a>
                                    </div>
                                    @else

                                    @endif
                                
                                </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function change_status(id)
    {
        var status = $("select[name='status']").val();

        $.ajax({
            type: "POST",
            url:appUrl + '/intern/status',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                id: id,
                status: status,// Your data
            },
            success: function(data) {
            }
        });

    }

    async function handlePreview(event, imageUrl, documentId) {
    event.preventDefault(); // Prevent default anchor navigation

    try {
        // Create a temporary link element to view file in new tab
        const link = document.createElement('a');
        link.href = imageUrl;
        link.target = '_blank';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        // Reload the page to refresh the table
        // setTimeout(() => { window.location.reload(); }, 100);
    } catch (error) {
        console.error('Error:', error);
    }
}

async function handleDownload(event, documentId) {
    event.preventDefault(); // Prevent default anchor behavior

    try {
        // Create a hidden form to trigger the file download
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = `/requirement/documents/${documentId}/download`; // Corrected to match the route
        form.style.display = 'none';

        // Append the form to the body and submit it
        document.body.appendChild(form);
        form.submit();

        // Optional: Reload the page to refresh the table
        // setTimeout(() => {
        //     window.location.reload();
        // }, 600);
    } catch (error) {
        console.error('Error during download:', error);
    }
}

    function change_status(id,status)
    {
        $.ajax({
            type: "POST",
            url: appUrl + '/intern/status',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                 id: id,
                 status:status
                 },
            success: function(data) {
                // $(".intern-profile").show().html(data);
            }
        });
    }
</script>