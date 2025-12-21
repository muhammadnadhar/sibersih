<x-layout-base :title="'History | ' . ($user->name ?? 'User')" :isSidebar="true">

    <div class="container py-4">

        <h3 class="fw-bold mb-4 cl-utama">Riwayat Pelaporan</h3>
        <div class="row">
            <h4 class="text-center">History</h4>
            <!-- Item 1 (Sukses) -->
            @if (empty($laporan_users) || count($laporan_users) == 0)
                <p class="text-center cl-utama">Belum ada riwayat pelaporan.</p>
            @else
                <div class="col-md-12 mb-3">
                    <div
                        class="card border-0 rounded-4 shadow-sm p-3 d-flex flex-row justify-content-between align-items-center bg-sukses cl-kartu">
                        @foreach ($laporan_users as $laporan)
                            <div>
                                <h5 class="fw-semibold mb-1">{{ $laporan->judul }}</h5>
                                <p class="mb-0 small">Tanggal : {{ $laporan->tanggal_laporan }}</p>
                            </div>
                            <span class="badge bg-white text-success fw-semibold px-3 py-2 rounded-3">
                                {{ $laporan->status }}
                            </span>
                        @endforeach

                    </div>
                </div>
            @endif

        </div>

    </div>

</x-layout-base>
