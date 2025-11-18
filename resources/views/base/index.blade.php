<x-layout-base>

    <div class="container-fluid">
        <div class="row min-vh-100">

            <div class="col-md-8 d-flex align-items-center justify-content-center">
                <div class="row w-75">
                    <div class="col-md-4 mb-4">
                        <div class="card bg-card border-0 rounded-4 shadow-sm text-center p-4">
                            <div class="fs-1 mb-3">👤</div>
                            <h5 class="fw-semibold mb-3">User</h5>
                            <button class="btn btn-user w-100 fw-semibold rounded-3"><a
                                    href=" {{ route('user.dashboard') }}">user</a></button>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card bg-card border-0 rounded-4 shadow-sm text-center p-4">
                            <div class="fs-1 mb-3">🛠️</div>
                            <h5 class="fw-semibold mb-3">Admin</h5>
                            <button class="btn btn-admin w-100 fw-semibold rounded-3"><a
                                    href="{{ route('admin.dashboard') }}"></a></button>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card bg-card border-0 rounded-4 shadow-sm text-center p-4">
                            <div class="fs-1 mb-3">📋</div>
                            <h5 class="fw-semibold mb-3">Petugas</h5>
                            <button class="btn btn-petugas w-100 fw-semibold rounded-3"><a
                                    href="{{ route('petugas.dashboard') }}"></a></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout-base>
