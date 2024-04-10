@if (session()->has('success'))
    <div class="flash-notif d-flex justify-content-center w-100">

        <div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif
@error('content')
    <div class="flash-notif d-flex justify-content-center w-100">
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="myAlert">
            <p>Post can't be empty!</p>
        </div>
    </div>
@enderror
<script>
    $(document).on('click', function(event) {
        // Check if the clicked element is not inside the alert
        if (!$(event.target).closest('#myAlert').length) {
            // If not, close the alert
            $('#myAlert').alert('close');
        }
    });
    $(document).ready(function() {
        // Function to close the alert after 3 seconds
        function autoCloseAlert() {
            setTimeout(function() {
                $('#myAlert').alert('close');
            }, 3000); // 3 seconds
        }
        autoCloseAlert();
    });
</script>
