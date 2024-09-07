<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Register | IRMS - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        @include('layouts.style')
    </head>

    <body>
        
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5" style="width: 100%;">
                        <div class="card overflow-hidden">
                            <div class="bg-primary-subtle">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Free Register</h5>
                                            <p>Get your free IRMS account now.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.html" class="auth-logo-dark">
                                            <div class="avatar-md profile-user-wid mb-4">
                                                <span class="avatar-title rounded-circle bg-light" style="margin-left: 30%;">
                                                    <img src="{{ asset('assets/images/logo.png') }}" alt="" class="rounded-circle" height="124">
                                                </span>
                                            </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <div class="row">
                                        <div class="col-md-2 mb-3">
                                            <span class="mb-5"><strong>Basic Information</strong></span><br>
                                        </div>
                                        <div class="col-md-10 mb-3">
                                        <hr>
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                        <!-- Row for form fields -->
                                        <div class="row">
                                            <!-- Column 1: Email -->
                                            <div class="col-md-4 mb-3">
                                                <label  class="form-label">Student ID</label>
                                                <input type="text" class="form-control" name="student_id" placeholder="Student ID" required>
                                                <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
                                                <div class="invalid-feedback">
                                                    Please your Student ID
                                                </div>
                                            </div>

                                            <!-- Column 2: Username -->
                                            <div class="col-md-4 mb-3">
                                        
                                            </div>

                                            <!-- Column 3: Password -->
                                            <div class="col-md-4 mb-3">
                                       
                                            </div>

                                        </div>

                                        <div class="row">
                                            <!-- Column 1: Email -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                                <div class="invalid-feedback">
                                                    Please Enter First Name
                                                </div>
                                            </div>

                                            <!-- Column 2: Username -->
                                            <div class="col-md-4 mb-3">
                                                <label  class="form-label">Middle Name</label>
                                                <input type="text" name="middle_name" class="form-control" placeholder="Enter Middle Name" >
                                                <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
                                                <div class="invalid-feedback">
                                                    Please Enter Middle Name
                                                </div>
                                            </div>

                                            <!-- Column 3: Password -->
                                            <div class="col-md-4 mb-3">
                                                <label  class="form-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control"  placeholder="Enter Last Name" required>
                                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                                <div class="invalid-feedback">
                                                    Please Enter Last Name
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <!-- Column 1: Email -->
                                            <div class="col-md-4 mb-3">
                                                <label class="control-label">Gender</label>
                                                <select class="form-control select2" name="gender">
                                                    <option>Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                            </div>

                                            <!-- Column 2: Username -->
                                            <div class="col-md-4 mb-3">
                                                <label class="control-label">Programs</label>
                                                <select class="form-control select2" name="courses_id" required>
                                                    <option value="">Select</option>
                                                    @foreach ($programs as $program)
                                                        <option value="{{ $program->id }}">{{ $program->abbreviation }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('courses_id')" class="mt-2" />
                                            </div>

                                            <!-- Column 3: Password -->
                                            <div class="col-md-4 mb-3">
                                                <label  class="form-label">Required Hour Completion</label>
                                                <input type="text" class="form-control" name="completion"  placeholder="Enter Required Hour Completion" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Required Hour Completion
                                                </div>
                                                <x-input-error :messages="$errors->get('completion')" class="mt-2" />
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <!-- Column 1: Email -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control"  placeholder="Enter email" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Email
                                                </div>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <!-- Column 3: Password -->
                                            <div class="col-md-4 mb-3">
                                                <label  class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control"  placeholder="Enter password" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Password
                                                </div>
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>


                                            <div class="col-md-4 mb-3">
                                                <label  class="form-label">Phone #. :</label>
                                                <input type="text" name="contact" class="form-control" placeholder="Enter Phone" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Password
                                                </div>
                                                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                                            </div>
                                            
                                            <div class="col-md-8 mb-3">
                                                <label class="control-label">Campuses</label>
                                                <select class="form-control select2" name="campus_id" required>
                                                    <option value="">Select</option>
                                                    @foreach ($campuses as $campus)
                                                        <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('campus_id')" class="mt-2" />
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label  class="form-label">Internship Start</label>
                                                <input type="date" class="form-control" name="intern_start"  placeholder="Please Enter Internship Start" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Internship Start
                                                </div>
                                                <x-input-error :messages="$errors->get('intern_start')" class="mt-2" />
                                            </div>

                                     

                                        </div>
                                        <!-- Row for Register button -->
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <span class="mb-5"><strong>Parent/Guardian Information - Contact Person</strong></span><br>
                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <hr>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label  class="form-label">Mother's Name</label>
                                                <input type="text" class="form-control" name="mname"  placeholder="Please Enter Mother's Name" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Mother's Name
                                                </div>
                                                <x-input-error :messages="$errors->get('mname')" class="mt-2" />
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label  class="form-label">Father's Name</label>
                                                <input type="text" class="form-control" name="fname"  placeholder="Please Enter Father's Name" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Father's Name
                                                </div>
                                                <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label  class="form-label">Emergency Contact Number</label>
                                                <input type="text" class="form-control" name="ccontact"  placeholder="In case of Emergency" required>
                                                <div class="invalid-feedback">
                                                    Please Emergency Contact Number
                                                </div>
                                                <x-input-error :messages="$errors->get('ccontact')" class="mt-2" />
                                            </div>
                                            <div class="col-md-8 mb-3">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="row mt-4">
                                                    <div class="col-12 d-grid">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <!-- Row for Terms of Use -->
                                        <div class="row mt-4 text-center">
                                            <div class="col-12">
                                                <p class="mb-0">By registering you agree to the IRMS <a href="#" class="text-primary">Terms of Use</a></p>
                                            </div>
                                        </div>


                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>Already have an account ? <a href="{{ route('login') }}" class="fw-medium text-primary"> Login</a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> IRMS. Crafted with <i class="mdi mdi-heart text-danger"></i> by IRMS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.script')
    </body>
</html>

