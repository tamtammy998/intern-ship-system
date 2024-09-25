<x-app-layout>
<div id="error-messages"></div>
<div id="success-message" style="display: none"></div>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>

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
                                                <h5 class="font-size-15 text-truncate">{{ ucwords($intern->first_name . ' ' .$intern->middle_name. ' ' .$intern->last_name ) }}</h5>
                                                <p class="text-muted mb-0 text-truncate">Intern</p>
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="pt-4">
                                                   @if(Auth::user()->usertype == 'Student')
                                                   <div class="row">
                                                        <div class="col-6">
                                                        <h5 class="font-size-15">{{ $intern->completion }} Hrs</h5>
                                                        <p class="text-muted mb-0">Completion</p>
                                                        </div>

                                                        <div class="col-6">
                                                            <h5 class="font-size-15">{{ $totalHours }} Hrs</h5>
                                                            <p class="text-muted mb-0">Rendered</p>
                                                        </div>
                                                    </div>
                                                   @else
                                                   @endif
                                            
                                               
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h4 class="card-title mb-0">Personal Information</h4>
                                            <button class="btn btn-secondary" type="button"  onclick="get_data({{ $intern->id }})">Edit User</button>
                                        </div>

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
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                     <!-- end card -->
                                     <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4 ml-4"> In case of Emergency</h4> 
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
<br>
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
                                                        {{ @$document->upload->status ?  $document->upload->status : 'Not yet' }}
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
                        <!-- end row -->
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasRightLabel"></h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="px-0 pb-0 tab-campus-content">

                                </div>   
                            </div>
                        </div>
</x-app-layout>

<script>
        const appUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
    function get_data(id)
    {
        $('#offcanvasRight').offcanvas('show');
        $.ajax({
            type: "POST",
            url:appUrl + '/user/profile_edit',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                id: id // Your data
            },
            success: function(data) {
                $(".tab-campus-content").show().html(data);
            }
        });
    }
</script>