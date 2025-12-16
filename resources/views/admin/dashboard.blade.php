<x-layout-admin :isSidebar="true" :admin="'admin | ' . $admin">

    <div class="flex-grow-1 p-4">

        {{-- USERS SECTION --}}
        <section id="users" class="mb-5">
            <h3 class="mb-3 cl-utama">Kelola Users</h3>

            {{-- Card Header --}}
            <div class="card shadow-kartu mb-3 bg-kartu">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="m-0 cl-utama">Daftar Users</h5>
                    {{-- <button class="btn bg-sukses-hover text-white">
                    <i class="bi bi-plus-lg"></i> Tambah User
                </button> --}}
                </div>
            </div>

            {{-- Users Table --}}
            <table class="table table-bordered table-striped">
                <thead class="bg-sidebar-gradient text-white">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span
                                    class="badge {{ $user->status == 'Aktif' ? 'bg-sukses-gradient shadow-sukses' : 'bg-urgent-gradient shadow-urgent' }}">
                                    {{ $user->status ?? 'Aktif' }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning text-dark shadow-sm">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm bg-urgent-hover text-white shadow-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        {{-- PETUGAS SECTION --}}
        <section id="petugas" class="mb-5">
            <h3 class="mb-3 cl-utama">Kelola Petugas</h3>

            {{-- Card Header --}}
            <div class="card shadow-kartu mb-3 bg-kartu">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="m-0 cl-utama">Daftar Petugas</h5>
                    <button class="btn bg-sukses-hover text-white shadow-sm">
                        <i class="bi bi-plus-lg"></i> Tambah Petugas
                    </button>
                </div>
            </div>

            {{-- Petugas Table --}}
            <table class="table table-bordered table-striped">
                <thead class="bg-sidebar-gradient text-white">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugas as $pt)
                        <tr>
                            <td>{{ $pt->id }}</td>
                            <td>{{ $pt->username }}</td>
                            <td><span class="badge bg-sidebar-gradient shadow-sidebar">{{ $pt->status }}</span></td>
                            <td>
                                <a href="{{ route('admin.laporan.id', ['id' => $pt->id]) }}"
                                    class="btn bg-utama-hover btn-sm text-white shadow-sm">
                                    <i class="bi bi-info-circle-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        {{-- LAPORAN SECTION --}}
        <section id="laporan" class="mb-5">
            <h3 class="mb-3 cl-utama">Laporan</h3>

            <table class="table table-bordered table-striped">
                <thead class="bg-sidebar-gradient text-white">
                    <tr>
                        <th>ID</th>
                        <th>Pelapor</th>
                        <th>Petugas</th>
                        <th>Admin</th>
                        <th>Judul</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $lp)
                        <tr>
                            <td>{{ $lp->id }}</td>
                            <td>{{ $lp->user->username }}</td>
                            <td>{{ $lp->petugas->username ?? '-' }}</td>
                            <td>{{ $lp->admin->username ?? '-' }}</td>
                            <td>{{ $lp->judul }}</td>
                            <td>
                                <span
                                    class="badge 
                                {{ $lp->status == 'Selesai' ? 'bg-sukses-gradient shadow-sukses' : ($lp->status == 'Proses' ? 'bg-proses-gradient shadow-proses' : 'bg-urgent-gradient shadow-urgent') }}">
                                    {{ $lp->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        {{-- CHART SECTION --}}
        <section id="charts" class="mb-5">
            <h3 class="mb-3 cl-utama">Dashboard Charts</h3>

            <div class="row g-3">
                {{-- Chart kategori Users --}}
                <div class="col-md-6">
                    <div class="card shadow-kartu bg-kartu-gradient p-3">
                        <h5 class="cl-utama">Users per Status</h5>
                        <canvas id="chartUsers"></canvas>
                    </div>
                </div>

                {{-- Chart kategori Laporan --}}
                <div class="col-md-6">
                    <div class="card shadow-kartu bg-kartu-gradient p-3">
                        <h5 class="cl-utama">Laporan per Status</h5>
                        <canvas id="chartLaporan"></canvas>
                    </div>
                </div>

                {{-- Chart kategori Petugas --}}
                <div class="col-md-12">
                    <div class="card shadow-kartu bg-kartu-gradient p-3">
                        <h5 class="cl-utama">Petugas Aktif</h5>
                        <canvas id="chartPetugas"></canvas>
                    </div>
                </div>
            </div>
        </section>

    </div>


</x-layout-admin>
