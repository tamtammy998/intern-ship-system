
        
        <!-- Responsive examples -->

        <!-- Datatable init js -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>  

<script src="assets/js/dataTables.bootstrap4.min.js"></script>  

<script src="assets/js/dataTables.buttons.min.js"></script> 
<script src="assets/js/buttons.bootstrap4.min.js"></script> 
<script src="assets/js/jszip.min.js"></script> 
<script src="assets/js/pdfmake.min.js"></script> 
<script src="assets/js/vfs_fonts.js"></script>  

<script src="assets/js/buttons.html5.min.js"></script>  
<script src="assets/js/buttons.print.min.js"></script>  
<script src="assets/js/buttons.colVis.min.js"></script>  

<script src="assets/js/dataTables.responsive.min.js"></script>  
<script src="assets/js/responsive.bootstrap4.min.js"></script>  

<script src="assets/js/datatables.init.js"></script>  

<script src="{{ asset('assets/js/pages/apexcharts.init.js') }}"></script>

<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>

<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/apexcharts.init.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script>
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
     
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const errorMessagesDiv = document.getElementById('error-messages');
        if (errorMessagesDiv) {
            let errorMessageHtml = `
                <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            errorMessagesDiv.innerHTML = errorMessageHtml;

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1800,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "Something went wrong!!"
            });
        }
    });
</script>
@endif

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successMessageDiv = document.getElementById('success-message');
        if (successMessageDiv) {
            const successMessage = @json(session('success')); // Retrieve the success message from the session

            let successMessageHtml = `
                <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
                    <div>${successMessage}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            successMessageDiv.innerHTML = successMessageHtml;

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1800,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: successMessage
            });
        }
    });
</script>
@endif
