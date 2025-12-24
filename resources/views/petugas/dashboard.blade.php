<x-layout-petugas :isSidebar="true" :title="'dashboard'" :css="'resource/css/petugas/dashboard.css'" :js="'resource/js/petugas/dahsboard.js ?>'">

    <section class="container-fluid  py-4">

        {{-- HEADER --}}
        <div class="mb-4">
            <h4 class="cl-utama fw-semibold mb-1">
                Dashboard Petugas
            </h4>
            <p class="text-muted small mb-0">
                Ringkasan tugas dan aktivitas laporan yang ditangani
            </p>
        </div>

        {{-- STAT CARDS --}}
        <div class="row g-3 mb-4">

            <div class="col">
                <div class="card border-0 rounded-4 shadow-sidebar bg-sidebar-gradient text-white p-3">
                    <div class="small opacity-75">Laporan Di tugaskan</div>
                    <div class="fs-3 fw-semibold">{{ $total_laporan_ditugaskan }}</div>
                </div>
            </div>

            <div class="col">
                <div class="card border-0 rounded-4 shadow-proses bg-proses-gradient text-dark p-3">
                    <div class="small opacity-75">Dalam Proses</div>
                    <div class="fs-3 fw-semibold">{{ $total_laporan_pending }}</div>
                </div>
            </div>

            {{-- <div class="col">
                <div class="card border-0 rounded-4 shadow-urgent bg-urgent-gradient text-white p-3">
                    <div class="small opacity-75">Urgent</div>
                    <div class="fs-3 fw-semibold">3</div>
                </div>
            </div> --}}

            <div class="col">
                <div class="card border-0 rounded-4 shadow-sukses bg-sukses-gradient text-white p-3">
                    <div class="small opacity-75">Selesai</div>
                    <div class="fs-3 fw-semibold">{{ $total_laporan_selesai }}</div>
                </div>
            </div>

        </div>

        {{-- MAIN CONTENT --}}
        <div class="row g-4">

            {{-- TASK LIST --}}
            <div class="col-lg-7">

                <div class="card border-0 rounded-4 shadow-kartu bg-kartu p-4 h-100">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-semibold cl-utama mb-0">
                            Tugas Terbaru
                        </h6>
                        <span class="badge bg-sidebar-gradient shadow-sidebar">
                            Hari ini
                        </span>
                    </div>

                    <table class="table table-bordered table-striped mb-0 align-middle">
                        <thead class="bg-utama-gradient text-white">
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Prioritas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#1021</td>
                                <td class="fw-semibold cl-utama">Lampu Jalan Mati</td>
                                <td>
                                    <span class="badge bg-proses-gradient shadow-proses">
                                        Proses
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-urgent-gradient shadow-urgent">
                                        Tinggi
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>#1018</td>
                                <td class="fw-semibold cl-utama">Saluran Air Tersumbat</td>
                                <td>
                                    <span class="badge bg-sukses-gradient shadow-sukses">
                                        Selesai
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-sidebar-gradient shadow-sidebar">
                                        Normal
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>#1013</td>
                                <td class="fw-semibold cl-utama">Jalan Rusak</td>
                                <td>
                                    <span class="badge bg-proses-gradient shadow-proses">
                                        Proses
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-urgent-gradient shadow-urgent">
                                        Tinggi
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>

            {{-- ACTIVITY CHART --}}
            <div class="col-lg-5">

                <div class="card border-0 rounded-4 shadow-kartu bg-kartu-gradient p-4 h-100">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-semibold cl-utama mb-0">
                            Aktivitas Laporan
                        </h6>
                        <span class="badge bg-sidebar-gradient shadow-sidebar">
                            Mingguan
                        </span>
                    </div>

                    <canvas id="chartPetugasDashboard"></canvas>

                </div>

            </div>

        </div>

    </section>

</x-layout-petugas>
