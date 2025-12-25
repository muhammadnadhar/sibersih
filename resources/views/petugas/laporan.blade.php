<x-layout-petugas :title="'update laporan'" :isSidebar="true" :js="'resources/js/petugas/laporan.js'">
    <div class="container mt-5">

        <div class="card shadow-md">
            <div id="bg-hijau-sukses" class="card-header text-white d-flex align-items-center">
                <i class="bi bi-clipboard-check-fill me-2"></i>
                <h5 class="mb-0 cl-utama">Laporan yang Ditugaskan </h5>
            </div>
            <div class="card-body">
                @if ($laporan_ditugaskan->count() >= 0)
                    @foreach ($laporan_ditugaskan as $item)
                        <div class="card mb-4 bg-kartu-gradient shadow-kartu rounded-4">
                            <div class="card-body">

                                <!-- Judul -->
                                <h5 class="fw-bold cl-utama mb-2">
                                    <i class="bi bi-file-earmark-text me-1"></i>
                                    {{ $item->judul }}
                                </h5>

                                <!-- Kategori -->
                                <p class="mb-1 text-muted">
                                    <i class="bi bi-tag me-1"></i>
                                    {{ $item->kategori }}
                                </p>
                                <div class="d-md-flex justify-content-between ">
                                    <!-- Deskripsi -->
                                    <div class="mt-2" style="width: 50%">

                                        <p>
                                            {{ $item->deskripsi }}
                                        </p>
                                    </div>
                                    <!-- Gambar -->
                                    @if ($item->image_laporan)
                                        <div class="my-3" style="width: 200px; height:150px ;">
                                            <img src="{{ asset('storage/laporan/' . $item->image_laporan) }}"
                                                style="width:100% ; height: 100%;"class="shadow-sidebar "
                                                data-bs-toggle="modal" data-bs-target="#previewImageModal"
                                                data-img="{{ asset('storage/laporan/' . $item->image_laporan) }}">
                                        </div>
                                    @endif

                                </div>

                                <!-- Lokasi -->
                                @if ($item->lokasi)
                                    <p class="mb-2">
                                        <i class="bi bi-geo-alt-fill me-1"></i>
                                        {{ $item->lokasi }}
                                    </p>
                                @endif

                                <!-- Status -->
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-semibold">
                                        Status:
                                        @if ($item->status === 'pending')
                                            <span class="badge bg-proses-gradient">Pending</span>
                                        @elseif ($item->status === 'diproses')
                                            <span class="badge bg-sidebar-gradient">Diproses</span>
                                        @elseif ($item->status === 'ditugaskan')
                                            <span class="badge bg-proses-gradient">Ditugaskan</span>
                                        @elseif ($item->status === 'selesai')
                                            <span class="badge bg-sukses-gradient">Selesai</span>
                                        @endif
                                    </span>

                                    <!-- Button -->
                                    <button class="btn bg-sidebar-gradient text-white shadow-sidebar"
                                        data-bs-toggle="modal" data-bs-target="#finishLaporan-{{ $item->id }}">
                                        <i class="bi bi-check-circle me-1"></i> Finish
                                    </button>
                                </div>

                            </div>
                        </div>

                        {{-- -modal priview image start  --}}
                        <div class="modal fade" id="previewImageModal" tabindex="-1"
                            aria-labelledby="previewImageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content bg-kartu-gradient shadow-kartu rounded-4">
                                    <div class="modal-header bg-utama-gradient text-white rounded-top-4">
                                        <h5 class="modal-title" id="previewImageModalLabel">
                                            <i class="bi bi-image-fill me-1"></i> Preview Gambar
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white"
                                            data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Body -->
                                    <div class="modal-body text-center bg-abu">
                                        <img id="previewImage" src="" class="img-fluid rounded-4 shadow-kartu"
                                            alt="Preview Laporan" style="max-height: 70vh;">
                                    </div>

                                    <!-- Footer -->
                                    <div class="modal-footer bg-kartu">
                                        <button class="btn bg-sidebar-gradient text-white shadow-sidebar"
                                            data-bs-dismiss="modal">
                                            <i class="bi bi-x-circle"></i> Tutup
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- -modal previewImage end --}}
                        {{-- -Modal #finishLaporan-start --}}

                        <div class="modal fade" id="finishLaporan-{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content bg-kartu-gradient shadow-kartu rounded-4">


                                    <div class="modal-header bg-utama-gradient text-white rounded-top-4">
                                        <h5 class="modal-title">
                                            <i class="bi bi-check2-circle me-1"></i> Selesaikan Laporan
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white"
                                            data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body cl-utama">
                                        <form action="{{ route('petugas.laporan.post', ['id' => $item->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')


                                            <input type="hidden" name="status" value="selesai">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">
                                                    <i class="bi bi-flag-fill me-1"></i>Status
                                                </label>
                                                <input type="text" value="selesai" readonly name="status"
                                                    class="form-control bg-abu border-0">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">
                                                    <i class="bi bi-upload me-1"></i> Bukti Penyelesaian
                                                </label>
                                                <input type="file" name="image_laporan_selesai" class="form-control">
                                                <small class="text-muted">JPG , JPEG , PNG</small>
                                            </div>


                                            <div class="d-flex justify-content-end gap-2">
                                                <button type="button" class="btn bg-abu" data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn bg-sukses text-white shadow-sukses">
                                                    <i class="bi bi-save me-1"></i> Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- -mosal finishLaporan- end --}}
                    @endforeach
                @else
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-inbox fs-1"></i>
                        <p class="mt-2">Belum ada laporan ditugaskan</p>
                    </div>

                @endif

            </div>
        </div>

    </div>




</x-layout-petugas>
