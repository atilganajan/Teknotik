@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <div class="d-flex justify-content-center mt-3">
            <div class="alert alert-info w-50 text-center">
                <p>
                    <i class="fa fa-check"></i> {{ session('message') }}
                </p>
            </div>
        </div>
    </div>
@endif
