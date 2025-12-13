{{-- di sini tugaskan petugas dan update Laporan berdasarkan id petugas  --}}
<x-layout-admin :isSidebar="true" :admin="'nama petugas | PETUGAS'">


    <div class="container py-5">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col text-center">
                <h1 class="cl-utama">Detail Petugas</h1>
                <p class="cl-sidebar">Admin dapat mengelola petugas dan menugaskan mereka</p>
            </div>
        </div>

        <!-- Kartu Profil Petugas -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-kartu shadow">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/120" class="rounded-circle mb-3" alt="Foto Petugas">
                        <h3 class="cl-utama">John Doe</h3>
                        <p class="cl-sidebar"><i class="bi bi-telephone"></i> 0812-3456-7890</p>
                        <p class="cl-sukses"><i class="bi bi-geo-alt"></i> Lokasi: Jakarta</p>
                        <p class="cl-proses"><i class="bi bi-clock"></i> Status: Sedang Bertugas</p>
                        <p class="cl-urgent"><i class="bi bi-exclamation-triangle"></i> Prioritas: Tinggi</p>

                        <!-- Tombol Tugaskan Petugas -->
                        <a href="{{ route('admin.petugas.id.post', ['id' => $petugas_id]) }}">
                            <button class="btn bg-sidebar text-white mt-3">
                                <i class="bi bi-person-plus"></i> Tugaskan Petugas
                            </button>

                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Tambahan Petugas -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card bg-abu shadow">
                    <div class="card-body">
                        <h5 class="cl-utama"><i class="bi bi-info-circle"></i> Detail Petugas</h5>
                        <ul class="list-group list-group-flush mt-2">
                            <li class="list-group-item bg-kartu cl-utama">Email: john.doe@mail.com</li>
                            <li class="list-group-item bg-kartu cl-utama">Unit Kerja: Keamanan</li>
                            <li class="list-group-item bg-kartu cl-utama">Pengalaman: 5 Tahun</li>
                            <li class="list-group-item bg-kartu cl-utama">Tugas Saat Ini: Patroli Area</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>




</x-layout-admin>
