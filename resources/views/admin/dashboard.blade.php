<x-layout-admin :isSidebar="true" :admin="$admin">

    <!-- Content -->
    <div class="flex-grow-1 p-4">

        <!-- USERS -->
        <section id="users" class="mb-5">
            <h3 class="mb-3">Kelola Users</h3>

            <div class="card shadow-sm mb-3" style="background: var(--color-putih-kartu);">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Daftar Users</h5>
                    <button class="btn text-white" style="background: var(--color-hijau-sukses);">
                        <i class="bi bi-plus-lg"></i> Tambah User
                    </button>
                </div>
            </div>

            <table class="table table-bordered table-striped">
                <thead style="background: var(--color-biru-sidebar); color: white;">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        {{-- <th>Status</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            {{-- fitur otomatis dari Blade untuk menampilkan nomor urut pada setiap baris @foreach. --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- <td>
                                <span class="badge" style="background: var(--color-hijau-sukses);">
                                    {{ $user->status ?? 'Aktif' }}
                                </span>
                            </td> --}}
                            <td>
                                <button class="btn btn-sm btn-warning text-dark">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                <button class="btn btn-sm text-white" style="background: var(--color-merah-urgent);">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </section>

        <!-- PETUGAS -->
        <section id="petugas" class="mb-5">
            <h3 class="mb-3">Kelola Petugas</h3>

            <div class="card shadow-sm mb-3" style="background: var(--color-putih-kartu);">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Daftar Petugas</h5>
                    <button class="btn text-white" style="background: var(--color-hijau-sukses);">
                        <i class="bi bi-plus-lg"></i> Tambah Petugas
                    </button>
                </div>
            </div>

            <table class="table table-bordered table-striped">
                <thead style="background: var(--color-biru-sidebar); color: white;">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Budi</td>
                        <td>Admin</td>
                        <td><span class="badge" style="background: var(--color-biru-sidebar);">Aktif</span></td>
                        <td>
                            <button class="btn btn-sm btn-warning text-dark"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm text-white" style="background: var(--color-merah-urgent);"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- LAPORAN -->
        <section id="laporan">
            <h3 class="mb-3">Laporan</h3>

            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card p-3 shadow-sm" style="background: var(--color-putih-kartu);">
                        <h5>User Baru</h5>
                        <p class="mb-1">Hari ini: <span class="fw-bold"
                                style="color: var(--color-hijau-sukses);">12</span></p>
                        <p>Minggu ini: <span class="fw-bold" style="color: var(--color-kuning-proses);">58</span>
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-3 shadow-sm" style="background: var(--color-putih-kartu);">
                        <h5>Laporan Masuk</h5>
                        <p class="mb-1">Pending: <span class="fw-bold"
                                style="color: var(--color-kuning-proses);">7</span></p>
                        <p>Urgent: <span class="fw-bold" style="color: var(--color-merah-urgent);">3</span></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-3 shadow-sm" style="background: var(--color-putih-kartu);">
                        <h5>Petugas Aktif</h5>
                        <p class="mb-1">Total: <span class="fw-bold"
                                style="color: var(--color-biru-sidebar);">15</span></p>
                    </div>
                </div>
            </div>
        </section>

    </div>



</x-layout-admin>
