<x-layout-petugas :title="'Profile |' . $petugas->username" :isSidebar="true">

    {{-- PROFILE PAGE - PETUGAS --}}
    <section class="container-fluid  py-4">

        {{-- Header --}}
        <div class="mb-4">
            <h4 class="fw-semibold cl-utama mb-1">
                <i class="bi bi-person-badge-fill me-2 cl-proses"></i>
                Profil Petugas
            </h4>
            <p class="text-muted small mb-0">
                Informasi akun dan status operasional petugas
            </p>
        </div>

        <div class="row g-4">

            {{-- LEFT PANEL : IDENTITY --}}
            <div class="col-xl-3 col-lg-4">

                <div class="bg-kartu-gradient text-white rounded-4 shadow-utama p-4 h-100">

                    <div class="text-center mb-4">
                        <div class="mx-auto mb-2 rounded-circle bg-kartu shadow-utama
                                d-flex align-items-center justify-content-center"
                            style="width:90px;height:90px;">
                            <i class="bi bi-person-badge fs-1 cl-utama"></i>
                        </div>

                        <h6 class="fw-semibold mb-0 cl-utama">
                            {{ $petugas->username ?? 'Nama Petugas' }}
                        </h6>
                        <span class="small opacity-75 cl-utama">
                            Petugas Lapangan
                        </span>
                    </div>

                    <hr class="opacity-25">

                    <div class="small cl-utama">

                        <div class="mb-2 d-flex justify-content-between">
                            <span class="opacity-75">ID Petugas</span>
                            <strong>#PTG-001</strong>
                        </div>

                        <div class="mb-2 d-flex justify-content-between">
                            <span class="opacity-75">Unit</span>
                            <strong>Lapangan</strong>
                        </div>

                        <div class="mb-2 d-flex justify-content-between">
                            <span class="opacity-75">Status</span>
                            <span class="badge bg-sukses-gradient shadow-sukses">
                                Aktif
                            </span>
                        </div>

                    </div>

                </div>

            </div>

            {{-- CENTER PANEL : DETAIL --}}
            <div class="col-xl-6 col-lg-8">

                <div class="bg-kartu rounded-4 shadow-kartu p-4 h-100">

                    <h6 class="fw-semibold cl-utama mb-3">
                        Data Petugas
                    </h6>

                    <div class="row g-3 small">

                        <div class="col-md-6">
                            <label class="text-muted mb-1">Nama Lengkap</label>
                            <div class="p-2 bg-abu rounded-3">
                                {{ $petugas->username ?? '-' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted mb-1">Email</label>
                            <div class="p-2 bg-abu rounded-3">
                                {{ $petugas->email ?? '-' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted mb-1">No. Telepon</label>
                            <div class="p-2 bg-abu rounded-3">
                                {{ $petugas->phone ?? '-' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted mb-1">Hak Akses</label>
                            <div class="p-2 bg-proses-gradient shadow-proses text-dark rounded-3">
                                Petugas
                            </div>
                        </div>

                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <a href="#" class="btn bg-utama-gradient text-white shadow-utama">
                            <i class="bi bi-pencil-square me-1"></i>
                            Edit Data
                        </a>

                        <a href="#" class="btn bg-proses-gradient shadow-proses text-dark">
                            <i class="bi bi-shield-check me-1"></i>
                            Verifikasi
                        </a>
                        <button class="btn bg-urgent-gradient text-white shadow-urgent btn-sm"data-bs-toggle="modal"
                            data-bs-target="#logoutModal">
                            <i class="bi bi-door-closed"></i>
                            logout
                        </button>
                    </div>

                </div>

            </div>

            {{-- RIGHT PANEL : STAT & PERFORMANCE --}}
            <div class="col-xl-3">

                <div class="bg-kartu rounded-4 shadow-kartu p-4 h-100">

                    <h6 class="fw-semibold cl-utama mb-3">
                        Statistik Tugas
                    </h6>

                    <div class="mb-3 p-3 rounded-3 bg-sukses-gradient text-white shadow-sukses">
                        <div class="small opacity-75">Laporan Selesai</div>
                        <div class="fs-4 fw-semibold">128</div>
                    </div>

                    <div class="mb-3 p-3 rounded-3 bg-proses-gradient text-dark shadow-proses">
                        <div class="small opacity-75">Dalam Proses</div>
                        <div class="fs-4 fw-semibold">7</div>
                    </div>

                    <div class="p-3 rounded-3 bg-urgent-gradient text-white shadow-urgent">
                        <div class="small opacity-75">Urgent</div>
                        <div class="fs-4 fw-semibold">2</div>
                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- MODAL start --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="logoutModalLabel">Are you sure</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p>Apakah Anda yakin ingin keluar dari akun ini?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('petugas.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-layout-petugas>
