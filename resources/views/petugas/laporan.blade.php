<x-layout-petugas>
    <div class="container mt-5">

        <div class="card shadow-sm">
            <div id="bg-hijau-sukses" class="card-header text-white d-flex align-items-center">
                <i class="bi bi-clipboard-check-fill me-2"></i>
                <h5 class="mb-0">Laporan yang Ditugaskan Kepadaku</h5>
            </div>

            <div class="card-body">

                @foreach ($laporan as $item)
                    <div class="card mb-3" id="bg-putih-kartu">
                        <div class="card-body">

                            <!-- Judul -->
                            <h5 id="color-teks-utama" class="fw-bold">
                                <i class="bi bi-file-earmark-text"></i>
                                {{ $item->judul }}
                            </h5>

                            <!-- Kategori -->
                            <p class="mb-1">
                                <i class="bi bi-tag"></i>
                                <strong>Kategori:</strong> {{ $item->kategori }}
                            </p>

                            <!-- Deskripsi -->
                            <p>
                                <i class="bi bi-card-text"></i>
                                <strong>Deskripsi:</strong><br>
                                {{ $item->deskripsi }}
                            </p>

                            <!-- File -->
                            <p>
                                <i class="bi bi-paperclip"></i>
                                <strong>File:</strong>
                                <a href="{{ asset('storage/laporan/' . $item->file) }}" target="_blank">
                                    {{ $item->file }}
                                </a>
                            </p>

                            <!-- Lokasi jika ada -->
                            @if ($item->lokasi)
                                <p>
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <strong>Lokasi:</strong> {{ $item->lokasi }}
                                </p>
                            @endif

                            <!-- Status -->
                            <p class="fw-semibold mt-3">
                                <i class="bi bi-flag-fill"></i>
                                <strong>Status:</strong>

                                @if ($item->status == 'pending')
                                    <span id="color-kuning-proses">Pending</span>
                                @elseif ($item->status == 'diproses')
                                    <span id="color-biru-sidebar">Diproses</span>
                                @elseif ($item->status == 'ditugaskan')
                                    <span id="color-kuning-proses">Ditugaskan</span>
                                @elseif ($item->status == 'selesai')
                                    <span id="color-hijau-sukses">Selesai</span>
                                @endif
                            </p>

                            <hr>

                            <!-- Tombol Update Status -->
                            <form action="{{ route('petugas.updateStatus', $item->id) }}" method="POST"
                                class="d-flex gap-2">
                                @csrf
                                @method('PUT')

                                <select name="status" class="form-select w-auto">
                                    <option value="diproses" {{ $item->status == 'diproses' ? 'selected' : '' }}>
                                        Diproses
                                    </option>
                                    <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>
                                </select>

                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save-fill"></i> Update
                                </button>
                            </form>

                        </div>
                    </div>
                @endforeach

                @if ($laporan->isEmpty())
                    <div class="text-center py-5">
                        <i class="bi bi-inbox fs-1" id="color-abu-bg"></i>
                        <h5 id="color-teks-utama" class="mt-3">Belum ada laporan yang ditugaskan</h5>
                    </div>
                @endif

            </div>
        </div>

    </div>

</x-layout-petugas>
