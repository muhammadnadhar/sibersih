<x-layout-user :title="'Laporan'" :isSidebar="true">

    <div class="container mt-5">

        <div class="card bg-kartu shadow-kartu">
            <!-- Header Card -->
            <div class="card-header bg-sidebar text-cl-kartu d-flex align-items-center">
                <i class="bi bi-trash-fill me-2 cl-kartu"></i>
                <h5 class="mb-0">Form Laporan Sampah</h5>
            </div>

            <!-- Body Card -->
            <div class="card-body bg-abu">
                <form action="{{ route('user.laporan.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Judul Laporan -->
                    <div class="mb-3 position-relative">
                        <label class="form-label fw-bold cl-utama">
                            <i class="bi bi-type"></i> Judul Laporan
                        </label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan judul laporan"
                            required>
                        {{-- errro dari method withInput() jika ada yang salah saat validasi --}}
                        <p class="cl-urgent">
                            @error('judul')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>


                    <div class="mb-3">
                        <label class="form-label fw-bold cl-utama">
                            <i class="bi bi-tags"></i> Kategori
                        </label>
                        <select name="kategori" class="form-select" required>
                            <option value="" disabled selected>Pilih kategori sampah</option>
                            <option value="Sampah Rumah Tangga">Sampah Rumah Tangga</option>
                            <option value="Sampah Plastik">Sampah Plastik</option>
                            <option value="Sampah Organik">Sampah Organik</option>
                            <option value="Sampah Non-Organik">Sampah Non-Organik</option>
                            <option value="Sampah Organik dan Non-Organik">Sampah Organik dan Non-Organik</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <p>

                        </p class="cl-urgent">
                        @error('kategori')
                            {{ $message }}
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label class="form-label fw-bold cl-utama">
                            <i class="bi bi-card-text"></i> Deskripsi Laporan
                        </label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tulis detail lokasi atau kondisi sampah..."
                            required></textarea>
                        @error('deskripsi')
                            {{ $message }}
                        @enderror
                    </div>

                    <!-- Upload File / Gambar -->
                    <div class="mb-3">
                        <label class="form-label fw-bold cl-utama">
                            <i class="bi bi-upload"></i> Upload Gambar
                        </label>
                        <input type="file" name="image_laporan" class="form-control">
                        <small class="text-muted">Format: JPG, PNG. Maks 5MB</small>
                        <p class="cl-urgent">
                            @error('image_laporan')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-3">
                        <label class="form-label fw-bold cl-utama">
                            <i class="bi bi-geo-alt"></i> Lokasi Kejadian
                        </label>
                        <input type="text" name="lokasi" class="form-control"
                            placeholder="Masukkan lokasi sampah ditemukan (opsional)">
                        <small class="text-muted">
                            Bisa cek lokasi di menu <a href="{{ route('user.map') }}">Map</a>
                        </small>
                        <p class="cl-urgent">
                            @error('lokasi')
                                {{ $message }}
                            @enderror


                        </p>
                    </div>


                    <!-- Tombol Submit -->
                    <div class="text-end">
                        <button type="submit" class="btn bg-sukses-gradient cl-kartu shadow-sukses">
                            <i class="bi bi-send-fill"></i> Kirim Laporan
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>


</x-layout-user>
