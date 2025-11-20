<x-layout-user>

    <div class="container mt-5">

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex align-items-center">
                <i class="bi bi-file-earmark-text-fill me-2"></i>
                <h5 class="mb-0">Form Laporan</h5>
            </div>

            <div class="card-body">

                {{-- nantik arahkan ke controler Laporan tapi menggunaka api.php --}}
                <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Judul -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-type"></i> Judul Laporan
                        </label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan judul laporan"
                            required>
                    </div>

                    <!-- Kategori -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-tags"></i> Kategori
                        </label>
                        <select name="kategori" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Kejadian">Kejadian</option>
                            <option value="Kerusakan">Kerusakan</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-card-text"></i> Deskripsi Laporan
                        </label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tulis detail kejadian..." required></textarea>
                    </div>

                    <!-- Upload File -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-upload"></i> Upload File / Gambar
                        </label>
                        <input type="file" name="file_laporan" class="form-control" required>
                        <small class="text-muted">Format: JPG, PNG, PDF, DOCX</small>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-send-fill"></i> Kirim Laporan
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</x-layout-user>
