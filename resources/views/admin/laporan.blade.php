<x-layout-admin>

    div class="d-flex">
    </thead>
    <tbody>
        <tr>
            <td>Petugas A</td>
            <td>petugas@mail.com</td>
            <td><span id="color-hijau-sukses">Aktif</span></td>
            <td>
                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
            </td>
        </tr>
    </tbody>
    </table>
    </div>
    </div>


    <!-- Tabel Laporan -->
    <div class="card shadow-sm mb-4">
        <div class="card-header d-flex align-items-center" id="bg-putih-kartu">
            <i class="bi bi-file-earmark-text-fill me-2" id="color-teks-utama"></i>
            <h5 class="mb-0" id="color-teks-utama">Daftar Laporan</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>User</th>
                        <th>Petugas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lampu Jalan Mati</td>
                        <td>Kerusakan</td>
                        <td>John Doe</td>
                        <td>Petugas A</td>
                        <td><span id="color-kuning-proses">Diproses</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    </div>
    </div>

</x-layout-admin>
