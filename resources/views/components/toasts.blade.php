@session('success')
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="successToast" class="toast colored-toast bg-success-transparent fade hide" role="alert" aria-live="assertive"
            aria-atomic="true">

            <div class="toast-header bg-success text-fixed-white">
                <img class="bd-placeholder-img rounded me-2" src="{{ asset('assets/images/brand-logos/toggle-dark.png') }}" alt="...">
                <strong class="me-auto">{{ env('APP_NAME') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toastEl = document.querySelector('.toast');
            if (toastEl) {
                new bootstrap.Toast(toastEl).show();
            }
        });
    </script>
@endsession
