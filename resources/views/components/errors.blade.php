@if (\Session::has('alert-success'))
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast show bg-success fade" data-bs-autohide="false">
        <div class="toast-header">
            <strong class="me-auto">Sucesso!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ \Session::get('alert-success') }}
        </div>
    </div>
@endif

@if (\Session::has('alert-warning'))
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast show bg-warning fade" data-bs-autohide="false">
        <div class="toast-header">
            <strong class="me-auto">Atenção!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ \Session::get('alert-warning') }}
        </div>
    </div>
@endif
@if (\Session::has('alert-danger'))
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast show bg-danger fade" data-bs-autohide="false">
        <div class="toast-header">
            <strong class="me-auto">Erro!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ \Session::get('alert-danger') }}
        </div>
    </div>
@endif
