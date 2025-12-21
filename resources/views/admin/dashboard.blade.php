<x-layout-admin :isSidebar="true" :admin="'admin | ' . $admin->name">

    <div class=" p-4">

        {{-- USERS SECTION --}}

<section id="users" class="mb-5">
    <div class="row g-3">

        <!-- USERS LIST -->
        <div class="col-12 col-md-8">
            <h4 class="mb-3 cl-utama">Users</h4>

            @if (empty($users) || count($users) == 0)
                <div class="card shadow-kartu bg-kartu h-100">
                    <div class="card-body d-flex justify-content-between align-items-center gap-3">
                        <h6 class="m-0 cl-utama">
                            Belum ada user, gunakan invite_code untuk mengundang user SBR
                        </h6>
                        <button class="btn bg-sukses-hover text-white flex-shrink-0">
                            <i class="bi bi-plus-lg"></i> More Info
                        </button>
                    </div>
                </div>
            @else
                <div class="card shadow-kartu bg-kartu">
                    <div class="card-body p-0">
                        <table class="table table-bordered table-striped mb-0">
                            <thead class="bg-sidebar-gradient text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-warning shadow-sm">
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
                    </div>
                </div>
            @endif
        </div>

        <!-- CHART -->
        <div class="col-12 col-md-4">
            <h4 class="mb-3 cl-utama">Chart</h4>

            <div class="card shadow-kartu bg-kartu-gradient h-100 p-3">
                <h6 class="cl-utama mb-3">User Chart by Name</h6>
                <canvas id="chartUsers"></canvas>
            </div>
        </div>

    </div>
</section>

        {{-- PETUGAS SECTION --}}

<section id="petugas" class="mb-5">
    <div class="row g-3">

        <!-- CHART PETUGAS -->
        <div class="col-12 col-md-4">
            <h4 class="mb-3 cl-utama">Chart Petugas</h4>

            <div class="card shadow-kartu bg-kartu-gradient h-100 p-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="cl-utama m-0">Petugas Aktif</h6>
                    <span class="badge bg-sidebar-gradient shadow-sidebar">Live</span>
                </div>

                <canvas id="chartPetugas"></canvas>
            </div>
        </div>

        <!-- DATA PETUGAS -->
        <div class="col-12 col-md-8">
            <h4 class="mb-3 cl-utama">Petugas</h4>

            @if (empty($petugas) || count($petugas) == 0)
                <div class="card shadow-kartu bg-kartu h-100">
                    <div class="card-body d-flex justify-content-between align-items-center gap-3">
                        <h6 class="m-0 cl-utama">
                            Belum ada petugas, gunakan invite_code untuk mengundang petugas
                        </h6>
                        <button class="btn bg-sukses-hover text-white flex-shrink-0">
                            <i class="bi bi-plus-lg"></i> More Info
                        </button>
                    </div>
                </div>
            @else
                <div class="card shadow-kartu bg-kartu">
                    <div class="card-body p-0">
                        <table class="table table-bordered table-striped mb-0 align-middle">
                            <thead class="bg-sidebar-gradient text-white">
                                <tr>
                                    <th width="60">#</th>
                                    <th>Nama</th>
                                    <th width="120">Status</th>
                                    <th width="80" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($petugas as $pt)
                                    <tr>
                                        <td>{{ $pt->id }}</td>
                                        <td class="fw-semibold cl-utama">
                                            {{ $pt->username }}
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $pt->status === 'aktif'
                                                    ? 'bg-sukses-gradient shadow-sukses'
                                                    : 'bg-proses-gradient shadow-proses' }}">
                                                {{ ucfirst($pt->status) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.laporan.id', ['id' => $pt->id]) }}"
                                                class="btn btn-sm bg-utama-hover text-white shadow-sm">
                                                <i class="bi bi-info-circle-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>

    </div>
</section>

        {{-- LAPORAN SECTION --}}


<section id="laporan" class="mb-5">
    <div class="row g-3">

        <!-- DATA LAPORAN -->
        <div class="col-12 col-md-8">
            <h4 class="mb-3 cl-utama">Laporan</h4>

            @if (empty($laporan) || count($laporan) == 0)
                <div class="card shadow-kartu bg-kartu h-100">
                    <div class="card-body d-flex justify-content-between align-items-center gap-3">
                        <h6 class="m-0 cl-utama">
                            Belum ada laporan yang diterima
                        </h6>
                        <button class="btn bg-sukses-hover text-white flex-shrink-0">
                            <i class="bi bi-plus-lg"></i> More Info
                        </button>
                    </div>
                </div>
            @else
                <div class="card shadow-kartu bg-kartu">
                    <div class="card-body p-0">
                        <table class="table table-bordered table-striped mb-0 align-middle">
                            <thead class="bg-sidebar-gradient text-white">
                                <tr>
                                    <th width="60">ID</th>
                                    <th>Pelapor</th>
                                    <th>Petugas</th>
                                    <th>Admin</th>
                                    <th>Judul</th>
                                    <th width="120">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $lp)
                                    <tr>
                                        <td>{{ $lp->id }}</td>
                                        <td class="fw-semibold cl-utama">
                                            {{ $lp->user->username }}
                                        </td>
                                        <td>{{ $lp->petugas->username ?? '-' }}</td>
                                        <td>{{ $lp->admin->username ?? '-' }}</td>
                                        <td class="text-truncate" style="max-width: 220px;">
                                            {{ $lp->judul }}
                                        </td>
                                        <td>
                                            <span
                                                class="badge
                                                {{ $lp->status === 'Selesai'
                                                    ? 'bg-sukses-gradient shadow-sukses'
                                                    : ($lp->status === 'Proses'
                                                        ? 'bg-proses-gradient shadow-proses'
                                                        : 'bg-urgent-gradient shadow-urgent') }}">
                                                {{ $lp->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>

        <!-- CHART LAPORAN -->
        <div class="col-12 col-md-4">
            <h4 class="mb-3 cl-utama">Statistik</h4>

            <div class="card shadow-kartu bg-kartu-gradient h-100 p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="cl-utama m-0">Status Laporan</h6>
                    <span class="badge bg-sidebar-gradient shadow-sidebar">Realtime</span>
                </div>

                <canvas id="chartLaporan"></canvas>
            </div>
        </div>

    </div>
</section>

    </div>


</x-layout-admin>
