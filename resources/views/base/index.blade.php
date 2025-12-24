<x-layout-base :title="'Main'" :js="'/resource/js/base/index.js'" css="css/base/index.css" :isSidebar='true'>
    <div class=" container-fluid min-vh-100 d-flex align-items-center justify-content-center">

        <div class="text-center border-0 rounded-4 shadow-lg p-5" style="max-width: 1000px; width: 100%;">

            <div class="d-flex flex-column align-items-center text-center">

                <div class="d-flex align-items-center gap-2 mb-5">
                    <img src="{{ asset('favicon.ico') }}" alt="SIBERSIH" class="rounded-circle shadow-sm"
                        style="width: 42px; height: 42px; object-fit: cover;">
                    <h2 class="fw-bold mb-0 fs-4 letter-spacing">SIBERSIH</h2>
                </div>

                <!-- Cards -->
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">

                        <!-- Admin -->
                        <a href="{{ route('admin.dashboard') }}" class="col text-decoration-none">
                            <div class="card card-hover border-0 rounded-4 shadow-sm h-100 p-4 text-center">
                                <i class="bi bi-person-rolodex fs-1 mb-3"></i>
                                <h5 class="fw-semibold mb-0">Admin</h5>
                            </div>
                        </a>

                        <!-- User -->
                        <a href="{{ route('user.dashboard') }}" class="col text-decoration-none">
                            <div class="card card-hover border-0 rounded-4 shadow-sm h-100 p-4 text-center">
                                <i class="bi bi-person-fill fs-1 mb-3"></i>
                                <h5 class="fw-semibold mb-0">User</h5>
                            </div>
                        </a>

                        <!-- Petugas -->
                        <a href="{{ route('petugas.dashboard') }}" class="col text-decoration-none">
                            <div class="card card-hover border-0 rounded-4 shadow-sm h-100 p-4 text-center">
                                <i class="bi bi-person-vcard-fill fs-1 mb-3"></i>
                                <h5 class="fw-semibold mb-0">Petugas</h5>
                            </div>
                        </a>

                    </div>
                </div>

            </div>

            <div class="d-flex mt-2 justify-content-center gap-3">
                <a href="{{ route('about') }}" class="text-decoration-none text-primary" title="Website">
                    <i class="bi bi-info-square-fill"></i>
                </a>
                <small class="text-muted d-block mb-2">about</small>
                {{-- <a href="#" class="text-decoration-none text-success" title="Email">
                        <i class="bi bi-envelope fs-5"></i>
                    </a>
                    <a href="#" class="text-decoration-none text-info" title="Phone">
                        <i class="bi bi-telephone fs-5"></i>
                    </a>
                    <a href="#" class="text-decoration-none text-warning" title="Location">
                        <i class="bi bi-geo-alt fs-5"></i>
                    </a> --}}
            </div>

        </div>

    </div>


</x-layout-base>
