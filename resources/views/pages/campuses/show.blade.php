<x-app-layout>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Campuses</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Campuses</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div id="error-messages"></div>
<div id="success-message" style="display: none"></div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <center>
                <div class="col-md-3 mb-3">
                    <label class="control-label">Campuses</label>
                    <select class="form-control select2" name="campus_id" required>
                        <option value="">Select</option>
                        @foreach ($campuses as $campus)
                            <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div
                    id="myChart" style="width:100%; max-width:600px; height:500px;">
                </div>
                </center>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


</x-app-layout>
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  const data = google.visualization.arrayToDataTable([
    ['Country', 'Mhl'],
    ['Italy',54.8],
    ['France',48.6],
    ['Spain',44.4],
    ['USA',23.9],
    ['Argentina',14.5]
  ])

  // Loop through the countries
  for (let i = 1; i < data.getNumberOfRows(); i++) {
    const country = data.getValue(i, 0);
    const mhl = data.getValue(i, 1);
    console.log(`Country: ${country}, Mhl: ${mhl}`);
  }

  const options = {
    title:'Bohol Island State Campuses',
    is3D:true
  };

  const chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>