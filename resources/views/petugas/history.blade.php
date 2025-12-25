<x-layout-petugas :title="'Petugas | PetugasSignUp'" isSidebar='true'>

    <div class="container py-4">

        <h3 class="fw-bold mb-4 cl-utama">Riwayat </h3>
        <div class="row">
            <h4 class="text-center cl-kartu">History</h4>

            {{-- nantik rencananya akan di simpan di table khusu untuk history agar lebih banyak tidka hanya laporan aja  --}}
            @if ($laporan_status->count() <= 0)
                <p class="text-center cl-utama">Belum ada riwayat tugas yang selesaikan.</p>
            @else
                <div class="d-flex flex-column gap-3">
                    @foreach ($laporan_status as $laporan)
                        <div class="card shadow-sm border-0 rounded-3" @class([
                            'bg-success text-white' => $laporan->status == 'selesai',
                            // 'bg-warning text-dark' => $laporan->status == 'pending',
                            'bg-primary text-white' => $laporan->status == 'ditugaskan',
                        ])>
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title fw-bold mb-1">{{ $laporan->judul }}</h5>
                                    <p class="card-text mb-0 small">Tanggal: {{ $laporan->tanggal_laporan }}</p>
                                </div>
                                <span
                                    class="badge rounded-pill cl-kartu 
                    @if ($laporan->status == 'selesai') bg-success 
                 @elseif($laporan->status == 'ditugaskan') bg-sidebar
                    @else bg-urgent @endif
                fw-semibold px-3 py-2">
                                    {{ ucfirst($laporan->status) }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

            @endif

        </div>

    </div>

</x-layout-petugas>
