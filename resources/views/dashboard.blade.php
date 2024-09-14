<x-app-layout>
<script src="{{ asset('assets/js/pages/echarts.init.js') }}"></script>
@if(Auth::user()->usertype == 'Admin')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">IRMS</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">IRMS</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle img-thumbnail">
                            </div>
                            <div class="flex-grow-1 align-self-center">
                                <div class="text-muted">
                                <p class="mb-2">Welcome to IRMS </p>
                                    <h5 class="mb-1">{{ Auth::user()->first_name }}</h5>
                                    <p class="mb-0">{{ Auth::user()->usertype }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 align-self-center">
                        <div class="text-lg-center mt-4 mt-lg-0">
                            <div class="row">
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Total Interns</p>
                                        <h5 class="mb-0">{{ @$userCount }}</h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Campuses</p>
                                        <h5 class="mb-0">{{  @$campusCount }}</h5>

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Programs</p>
                                        <h5 class="mb-0">{{ $programsCount }}</h5>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">OJT Coordinator's</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Campus</th>
                                <th scope="col">Program</th>
                            </tr>
                        </thead>
                        <tbody>

                        <tbody>
                            @foreach($coordinators as $coordinator)
                                <tr>
                                    <td>{{ ucwords(@$coordinator->first_name.' '.@$coordinator->middle_name.' '.@$coordinator->last_name.' ')}}</td>
                                    <td>{{ ucwords(@$coordinator->campus->name) }}</td>
                                    <td>{{ ucwords(@$coordinator->programs->abbreviation) }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Submitted Requirements</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Requirements</th>
                            </tr>
                        </thead>
                        <tbody>

                        <tbody>
                            @foreach($requirements as $requirement)
                                <tr>
                                    <td>{{ $requirement->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="col-xl-8">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Intern Daily Time Record History</h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr> 
                                        <th  class="align-middle">Intern</th>
                                        <th  class="align-middle">Campus</th>
                                        <th  class="align-middle">Program</th>
                                        <th  class="align-middle">Date Range</th>
                                        <th  class="align-middle">Hours</th>
                                        <th  class="align-middle">Status</th>
                                        <th  class="align-middle">Date Uploaded</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($records as $record)
                                    <tr>
                                     <td>{{ ucwords($record->student->first_name.' '.$record->student->middle_name.' '.$record->student->last_name.' ')}}</td>
                                     <td>{{ $record->campus->name }}</td>
                                     <td>{{ $record->programs->abbreviation }}</td>
                                        <td><a href="javascript: void(0);" class="text-body fw-bold"></a> {{ date('F j, Y', strtotime($record->date_from)) }} - {{ date('F j, Y', strtotime($record->date_to)) }}</td>
                                        <td>{{ $record->hours }}</td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-primary font-size-11">{{ $record->status }}</span>
                                        </td>
                                        <td>
                                            {{ date('F j, Y', strtotime($record->created_at)) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- end row -->

@elseif(Auth::user()->usertype == 'ojt_in_charge')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">IRMS</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">IRMS</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle img-thumbnail">
                            </div>
                            <div class="flex-grow-1 align-self-center">
                                <div class="text-muted">
                                    <p class="mb-2">Welcome to IRMS </p>
                                    <h5 class="mb-1">{{ Auth::user()->first_name }}</h5>
                                    <p class="mb-0">
                                        <storng> ( {{ $user->programs->abbreviation }} )</storng> 
                                        @if(Auth::user()->usertype == 'ojt_in_charge')
                                        OJT COORDINATOR 
                                        @else
                                        @endif
                                    </p>

                                    <p class="mb-0">
                                        {{ $user->campus->name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 align-self-center">
                    </div>
                    <div class="col-lg-4 align-self-center">
                        <div class="text-lg-center mt-4 mt-lg-0">
                            <div class="row">
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Total Interns</p>
                                        <h5 class="mb-0">{{ @$userCount }}</h5>
                                    </div>
                                </div>
                       
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Intern Requirements</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Requirements</th>
                            </tr>
                        </thead>
                        <tbody>

                        <tbody>
                            @foreach($requirements as $requirement)
                                <tr>
                                    <td>{{ $requirement->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Intern Daily Time Record History</h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr> 
                                        <th  class="align-middle">Intern</th>
                                        <th  class="align-middle">Campus</th>
                                        <th  class="align-middle">Program</th>
                                        <th  class="align-middle">Date Range</th>
                                        <th  class="align-middle">Hours</th>
                                        <th  class="align-middle">Status</th>
                                        <th  class="align-middle">Date Uploaded</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($records as $record)
                                    <tr>
                                        <td>{{ ucwords($record->student->first_name.' '.$record->student->middle_name.' '.$record->student->last_name.' ')}}</td>
                                        <td>{{ $record->campus->name }}</td>
                                        <td>{{ $record->programs->abbreviation }}</td>
                                        <td><a href="javascript: void(0);" class="text-body fw-bold"></a> {{ date('F j, Y', strtotime($record->date_from)) }} - {{ date('F j, Y', strtotime($record->date_to)) }}</td>
                                        <td>{{ $record->hours }}</td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-primary font-size-11">{{ $record->status }}</span>
                                        </td>
                                        <td>
                                            {{ date('F j, Y', strtotime($record->created_at)) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">IRMS</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">IRMS</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle img-thumbnail">
                            </div>
                            <div class="flex-grow-1 align-self-center">
                                <div class="text-muted">
                                    <p class="mb-2">Welcome to IRMS </p>
                                    <h5 class="mb-1">{{ Auth::user()->first_name }}</h5>
                                    <p class="mb-0">{{ Auth::user()->usertype }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 align-self-center">
                        <div class="text-lg-center mt-4 mt-lg-0">
                            <div class="row">
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Completion</p>
                                        <h5 class="mb-0">{{ Auth::user()->completion }}</h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Rendered</p>
                                        <h5 class="mb-0">{{ @$totalHours }}</h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Remaining</p>
                                        <h5 class="mb-0">{{ @$remaining }}</h5>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">INTERNSHIP STATUS</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="text-muted">Rendered</p>
                        <h3>{{ $totalHours }}</h3>
                        <p class="text-muted">Total Hours Rendered</p>

                        
                    </div>
                    <div class="col-sm-6">
                        <div class="mt-4 mt-sm-0">
                            <div id="radialBar-chart" data-colors='["--bs-primary"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Submitted Requirements</h4>
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="col-xl-8">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Daily Time Record </h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th  class="align-middle">Date Range</th>
                                        <th  class="align-middle">Hours</th>
                                        <th  class="align-middle">Attachment</th>
                                        <th  class="align-middle">Status</th>
                                        <th  class="align-middle">Date Uploaded</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($records as $record)
                                    <tr>
                                     
                                        <td><a href="javascript: void(0);" class="text-body fw-bold"></a> {{ date('F j, Y', strtotime($record->date_from)) }} - {{ date('F j, Y', strtotime($record->date_to)) }}</td>
                                        <td>{{ $record->hours }}</td>
                                        <td>
                                            <a 
                                                href="#" 
                                                title="View" 
                                                onclick="handleDownload(event, {{ $record->id }})">
                                                
                                                {{  $record->document_name }}
                                            </a>
                                        </td>
                               
                                        <td>
                                            <span class="badge badge-pill badge-soft-primary font-size-11">{{ $record->status }}</span>
                                        </td>
                                        <td>
                                            {{ date('F j, Y', strtotime($record->created_at)) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif

</x-app-layout>
<script>
    async function handleDownload(event, documentId) {
    event.preventDefault(); // Prevent default anchor behavior

    try {
        // Create a hidden form to trigger the file download
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = `/record/documents/${documentId}/download`; // Corrected to match the route
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
    var radialbarColors = getChartColorsArray("radialBar-chart");
if (radialbarColors) {
    var options = {
        chart: {
            height: 200,
            type: 'radialBar',
            offsetY: -10
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                dataLabels: {
                    name: {
                        fontSize: '13px',
                        color: undefined,
                        offsetY: 60
                    },
                    value: {
                        offsetY: 22,
                        fontSize: '16px',
                        color: undefined,
                        formatter: function (val) {
                            return val + "%";
                        }
                    }
                }
            }
        },
        colors: radialbarColors,
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                shadeIntensity: 0.15,
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 65, 91]
            },
        },
        stroke: {
            dashArray: 4,
        },
        series: [{{ $percent }}],
        labels: ['Series A'],

    }

    var chart = new ApexCharts(
        document.querySelector("#radialBar-chart"),
        options
    );

    chart.render();
}
</script>
