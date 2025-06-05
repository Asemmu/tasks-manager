
    @if(session('success') )
    <div id="success-alert" class="alert alert-success position-absolute w-25 d-flex justify-content-between rounded-1" style="padding-top: 1rem;  
    right: 1rem;
    top: 6rem;
    margin: 0%;">
        <div id="progress-bar" style="
            position: absolute;
            top: 0;
            left: 0;
            height: 4px;
            background-color: #28a745;
            width: 100%;
            transition: width 10s linear;
        "></div>

        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

   <script>
        // Start shrinking the progress bar immediately
        const progressBar = document.getElementById('progress-bar');
        const alertBox = document.getElementById('success-alert');

        // Trigger CSS transition for width from 100% to 0%
        setTimeout(() => {
            progressBar.style.width = '0%';
        }, 10); // slight delay to apply transition

        // Remove alert after 10 seconds
        setTimeout(() => {
            if (alertBox) {
                // Use Bootstrap's alert dispose if you want
                // Or simply remove from DOM
                alertBox.remove();
            }
        }, 10000);
    </script>
@endif
