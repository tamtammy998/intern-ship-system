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
                    <select class="form-control select2" name="campus_id" required onchange="get_campus(this.value)">
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
    const appUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
    google.charts.load('current', {'packages':['corechart']});
    // google.charts.setOnLoadCallback(drawChart);

    function get_campus(id) {
    $.ajax({
        type: "POST",
        url: appUrl + '/campuses/program',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: {
            id: id // The campus ID to fetch the program data
        },
        success: function(response) {
            const chartElement = document.getElementById('myChart');
            
            // Ensure response has valid data
            if (response && response.length > 0) {
                const chartData = [['Program Abbreviation', 'Campus ID']];
                
                // Loop through response and push data to chartData
                response.forEach(function(item) {
                    chartData.push([item[0], item[1]]);
                });

                const googleData = google.visualization.arrayToDataTable(chartData);

                // Logging the values
                for (let i = 1; i < googleData.getNumberOfRows(); i++) {
                    const program = googleData.getValue(i, 0);
                    const campusId = googleData.getValue(i, 1);
                    console.log(`Program: ${program}, Campus ID: ${campusId}`);
                }

                // Chart options
                const options = {
                    title: 'Bohol Island State Campuses',
                    is3D: true
                };

                // Draw the chart
                const chart = new google.visualization.PieChart(chartElement);
                chart.draw(googleData, options);
            } else {
                // Clear the chart if no data is received
                const emptyData = [['Program Abbreviation', 'Campus ID']];
                const emptyGoogleData = google.visualization.arrayToDataTable(emptyData);
                
                // Draw an empty chart
                const options = {
                    title: 'No Data Available',
                    is3D: true
                };

                        const chart = new google.visualization.PieChart(chartElement);
                        chart.draw(emptyGoogleData, options);

                        console.warn("No data received from the server. The chart has been reset.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("An error occurred: " + error);
                }
            });
    }





$(document).ready(function() {
  $('.campus_id').change(function() {
    var selectedValue = $(this).val();
    console.log(selectedValue); // Outputs the selected value
  });
});

</script>