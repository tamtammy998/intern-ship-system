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
                                    <th scope="col">#</th>
                                    <th scope="col">Requirements</th>
                                    <th scope="col">Date Submitted</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Resume</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th scope="row">2</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>