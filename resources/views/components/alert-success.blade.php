@if(session('success'))

    <div class="alert alert-success mt-3 alert-dismissible fade show">
        {{session('success')}}
        <button type="button" class="btn-close m-0 pt-2" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif