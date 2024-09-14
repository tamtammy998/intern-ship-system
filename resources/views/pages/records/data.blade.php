<form method="POST" action="{{ route('record.update', $records->id) }}" class="needs-validation" novalidate>
@csrf
@method('PUT')

            <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                            
                            <tr>
                                <th scope="row">Student ID :</th>
                                <td>{{ $records->student->student_id  }}</td>
                            </tr>

                            <tr>
                                <th scope="row">Full Name :</th>
                                <td>{{ ucwords($records->student->first_name . ' ' .$records->student->middle_name. ' ' .$records->student->last_name ) }}</td>
                            </tr>

                            <tr>
                                <th scope="row">Campus :</th>
                                <td>{{ $records->campus->name  }}</td>
                            </tr>

                            <tr>
                                <th scope="row">Program :</th>
                                <td>{{ $records->programs->abbreviation  }}</td>
                            </tr>


                        </tbody>
                    </table>
                </div><br>

                <div class="mb-3">
                    <label class="control-label">Hours</label>
                    <input type="number" name="hours" class="form-control" value="{{ $records->hours}}" placeholder="Enter Hours" required>
                </div>

                <div class="mb-3">
                    <label class="control-label">Attachement : </label>
                    <a 
                        href="#" 
                        title="View" 
                        onclick="handleDownload(event, {{ $records->id }})">
                        
                        {{  $records->document_name }}
                    </a>
                </div>
                <div>

                <div class="mb-3">
                <label class="control-label">Status : </label>
                    <select class="form-control select2" name="status" >
                        <option>Select</option>
                        <option value="pending" {{ @$records->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved"{{ @$records->status == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="reject"{{ @$records->status == 'reject' ? 'selected' : '' }}>Reject</option>
                    </select>
                </div>

            <button type="submit" class="btn btn-primary w-md float-right">Submit</button>
    </div>
</form>