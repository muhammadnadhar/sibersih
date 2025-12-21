<x-layout-base :title="'Main'" :js="'/resource/js/base/index.js'" css="css/base/index.css" :isSidebar='true'>

    <div class="container-index container-fluid mt-2">


        <main class="text-center d-flex flex-column align-items-center justify-content-center">

            <div class="mb-3 mt-5">
                <h2 class="fw-bold">SIBERSIH</h2>
                <img src="" class="w-2 h-2" alt="SIBERSIH">
            </div>

            <div class="col-md-8 mt-5 d-flex align-items-center justify-content-center mx-auto">
                <div class="row w-75">

                    <a href="{{ route('admin.dashboard') }}" class="col-md-4 mb-4 text-decoration-none">
                        <div class="card-style">
                            <div class="card border-0 rounded-4 shadow-sm text-center p-4">
                                <i class="bi bi-person-rolodex fs-1 mb-2"></i>
                                <h5 class="fw-semibold mb-3">Admin</h5>
                            </div>
                        </div>
                    </a>

                    <!-- User Card (tanpa link) -->

                    <a href="{{ route('user.dashboard') }}" class="col-md-4 mb-4 text-decoration-none">
                        <div class="card-style ">
                            <div class="card border-0 rounded-4 shadow-sm text-center p-4">
                                <i class="bi bi-person-fill fs-1 mb-2"></i>
                                <h5 class="fw-semibold mb-3">User</h5>
                            </div>
                        </div>
                    </a>

                    <!-- Petugas Card -->
                    <a href="{{ route('petugas.dashboard') }}" class="col-md-4 mb-4 text-decoration-none">
                        <div class="card-style">
                            <div class="card border-0 rounded-4 shadow-sm text-center p-4">
                                <i class="bi bi-person-vcard-fill fs-1 mb-2"></i>
                                <h5 class="fw-semibold mb-3">Petugas</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

        </main>
    </div>
</x-layout-base>
