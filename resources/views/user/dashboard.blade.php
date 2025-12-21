<x-layout-user :title="'SIBERSIH'" :isSidebar="true" :css="'resource/js/user/dahsboard.js'">

    <div class="container my-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
            <div>
                <h3 class="fw-bold text-dark">Dashboard Pelaporan Sampah</h3>
                <p class="text-muted small mb-0">Selamat datang di sistem koordinasi kebersihan</p>
            </div>
            <div class="text-md-end mt-3 mt-md-0">
                <span class="fw-semibold text-dark">{{ $user->username }}</span><br>
                <span class="text-muted small">Regular User</span>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <h6 class="text-secondary mb-1">Total Laporan</h6>
                        <h3 class="fw-bold text-primary mb-1"> {{ $total_laporan ?? 'Kosong' }}</h3>
                        <p class="text-success small mb-0">+12% dari minggu lalu</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <h6 class="text-secondary mb-1">Laporan Selesai</h6>
                        <h3 class="fw-bold text-success mb-1">{{ $total_laporan_selesai ?? 'Kosong' }}</h3>
                        <!-- ini reward nya nantik simpan ke database -->
                        <p class="text-success small mb-0">+8% dari minggu lalu</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <h6 class="text-secondary mb-1">Petugas Aktif</h6>
                        <h3 class="fw-bold text-info mb-1">24</h3>
                        <p class="text-warning small mb-0">2 sedang bertugas</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <h6 class="text-secondary mb-1">Area Terdampak</h6>
                        <h3 class="fw-bold text-danger mb-1">12</h3>
                        <p class="text-danger small mb-0">3 prioritas tinggi</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik -->
        <div class="row g-4 mb-4">
            <div class="col-12 col-md-6">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <h6 class="fw-semibold text-secondary mb-3">Laporan Mingguan</h6>
                        <canvas id="laporanChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <h6 class="fw-semibold text-secondary mb-3">Status Laporan</h6>
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laporan Terbaru & Petugas -->
        <div class="row g-4">
            <!-- Laporan Terbaru -->
            <div class="col-12 col-md-6">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <h6 class="fw-semibold text-secondary mb-3">Laporan Terbaru</h6>

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-dark">Sampah di Jl. Sudirman</span>
                            <span class="badge bg-danger rounded-pill">Urgent</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-dark">Tumpukan Sampah Pasar</span>
                            <span class="badge bg-warning text-white rounded-pill">Proses</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark">Pembersihan Taman</span>
                            <span class="badge bg-success rounded-pill">Selesai</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Petugas Aktif -->
            <div class="col-12 col-md-6">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <h6 class="fw-semibold text-secondary mb-3">Petugas Aktif</h6>

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-dark">Ahmad Rizki (Area: Sudirman)</span>
                            <span class="text-success fw-semibold">Online</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-dark">Budi Santoso (Area: Thamrin)</span>
                            <span class="text-warning fw-semibold">Bertugas</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark">Citra Dewi (Area: Menteng)</span>
                            <span class="text-success fw-semibold">Online</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</x-layout-user>
