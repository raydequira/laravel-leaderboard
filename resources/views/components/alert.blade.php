@if ($message = session()->has('success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        {{ session()->get('success') }}
    </div>
@endif
@if ($message = session()->has('error'))
    <div class="alert alert-danger" role="alert">
    {{ session()->get('error') }}
    </div>
@endif
