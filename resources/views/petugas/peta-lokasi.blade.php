<x-layout-petugas :title="'Map'" :isSidebar="true">
    <section class="container-fluid  py-4">

        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h4 class="cl-kartu fw-semibold mb-1">
                    <i class="bi bi-geo-alt-fill cl-sidebar me-2"></i>
                    Peta Lokasi
                </h4>
                <p class="text-muted small mb-0">
                    Visualisasi lokasi laporan & area sekitar
                </p>
            </div>

            <span class="badge bg-proses-gradient shadow-proses text-dark small">
                Mode Tampilan
            </span>
        </div>

        <div class="bg-kartu rounded-4 shadow-kartu p-3">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="small cl-kartu">
                    <i class="bi bi-info-circle me-1 cl-sidebar"></i>
                    Data peta akan diperbarui otomatis
                </div>

                <div class="small text-muted">
                    <i class="bi bi-clock-history me-1"></i>
                    Update terakhir: realtime
                </div>
            </div>

            <div class="ratio ratio-16x9 rounded-3 overflow-hidden shadow-utama">
                {{-- untuk sekarang gunakan iframe dulu , nantik baru upddat dengan library  --}}

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510.9317209711093!2d95.35829658398887!3d5.553390655261966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3040379843fea5b9%3A0x9a42a47b9fbfeae3!2sUlee%20Kareng%20Coffee!5e0!3m2!1sen!2sid!4v1765081660251!5m2!1sen!2sid"
                    style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="mt-3 small text-muted text-center">
                <i class="bi bi-layers me-1"></i>
                Integrasi Google Maps akan menggunakan
            </div>

        </div>

    </section>

</x-layout-petugas>
