{{-- halamana ini untuk menampilkan 1 laporan berdasarkan katagory ID  --}}
<x-layout-admin :title="$laporan_id->judul">
    <div class="container my-4">

        <div class="card shadow bg-kartu">
            <div class="card-header bg-utama cl-kartu d-flex justify-content-between">
                <h4 class="mb-0">
                    <i class="bi bi-file-earmark-text"></i> Detail Laporan
                </h4>

                <a href="{{ url()->previous() }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card-body">

                <!-- USER & PETUGAS -->
                <div class="row mb-4">

                    <div class="col-md-6">
                        <h6 class="cl-utama">Pelapor</h6>
                        <p class="fw-bold">
                            {{ $laporan_id->user->name ?? '-' }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <h6 class="cl-utama">Petugas yang Menangani</h6>
                        <p class="fw-bold">
                            {{ $laporan_id->petugas->name ?? '-' }}
                        </p>
                    </div>

                </div>

                <!-- JUDUL, KATEGORI, STATUS -->
                <div class="row mb-4">

                    <div class="col-md-4">
                        <h6 class="cl-utama">Judul Laporan</h6>
                        <p>{{ $laporan_id->judul }}</p>
                    </div>

                    <div class="col-md-4">
                        <h6 class="cl-utama">Kategori</h6>
                        <span class="badge bg-sidebar">{{ $laporan_id->kategori }}</span>
                    </div>

                    <div class="col-md-4">
                        <h6 class="cl-utama">Status</h6>

                        @php
                            $statusClass =
                                [
                                    'pending' => 'bg-urgent',
                                    'diproses' => 'bg-proses',
                                    'ditugaskan' => 'bg-sidebar',
                                    'selesai' => 'bg-sukses',
                                ][$laporan->status] ?? 'bg-abu';
                        @endphp

                        <span class="badge {{ $statusClass }}">
                            {{ ucfirst($laporan_id->status) }}
                        </span>
                    </div>

                </div>

                <!-- DESKRIPSI -->
                <div class="mb-4">
                    <h6 class="cl-utama">Deskripsi Laporan</h6>
                    <div class="p-3 bg-abu rounded">
                        {!! nl2br(e($laporan_id->deskripsi ?? '-')) !!}
                    </div>
                </div>

                <!-- LOKASI & TANGGAL -->
                <div class="row mb-4">

                    <div class="col-md-6">
                        <h6 class="cl-utama">Lokasi</h6>
                        <p><i class="bi bi-geo-alt"></i> {{ $laporan_id->lokasi ?? '-' }}</p>
                    </div>

                    <div class="col-md-6">
                        <h6 class="cl-utama">Tanggal Laporan</h6>
                        <p><i class="bi bi-calendar3"></i>
                            {{ $laporan_id->tanggal_laporan ?? '-' }}
                        </p>
                    </div>

                </div>

                <!-- FILE -->
                <div class="mb-4">
                    <h6 class="cl-utama">File Lampiran</h6>

                    @if ($laporan_id->file)
                        <a href="{{ asset('storage/' . $laporan->file) }}" class="btn bg-sidebar cl-kartu"
                            target="_blank">
                            <i class="bi bi-download"></i> Download File
                        </a>
                    @else
                        <p class="text-muted">Tidak ada file</p>
                    @endif
                </div>

            </div>
        </div>

    </div>

@endsection
</x-layout-admin>
