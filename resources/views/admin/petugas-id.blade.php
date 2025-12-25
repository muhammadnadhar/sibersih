{{-- di sini tugaskan petugas dan update Laporan berdasarkan id petugas  --}}
<x-layout-admin :isSidebar="true" :admin="'nama petugas | PETUGAS'">


    <div class="container py-5">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col text-center">
                <h1 class="cl-utama">Detail Petugas</h1>
                <p class="cl-sidebar">Admin dapat mengelola petugas </p>
            </div>
        </div>

        <!-- Kartu Profil Petugas -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-kartu shadow">
                    <div class="card-body text-center">
                        <img src="{{ $petugas->avatar }}" class="rounded-circle mb-3" alt="Foto Petugas">
                        <h3 class="cl-utama">{{ $petugas->fullname ?? 'belum di isi' }}</h3>
                        <p class="cl-sidebar"><i class="bi bi-telephone"></i>
                            {{ $petugas->phone ?? 'petugas belum mengisi nomor' }}</p>
                        <p class="cl-sukses"><i class="bi bi-geo-alt"></i>
                            {{ $petugas->address ?? 'petugas belum mengisi lokasi' }}</p>
                        <p class="cl-proses"><i class="bi bi-clock"></i> Status: aktive</p> {{-- -sementara aja --}}
                        <p class="cl-urgent"><i class="bi bi-exclamation-triangle"></i> Prioritas: Tinggi</p>
                        {{-- -sementara aja --}}



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
                            <li class="list-group-item bg-kartu cl-utama">Email:
                                {{ $petugas->email ?? 'petugas belum mengisi email' }}</li>
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
