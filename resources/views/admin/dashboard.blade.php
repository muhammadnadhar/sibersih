<x-layout-admin :isSidebar="true" :admin="'admin | ' . $admin->name" :js="'resources/js/admin/dashboard.js'">

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
                        <div class="card shadow-kartu bg-kartu h-100">
                            <div class="card-body p-0 table-responsive">
                                <table class="table table-bordered table-striped mb-0">
                                    <thead class="bg-sidebar-gradient text-white">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user_paginate as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->username }}</td>
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

                    <div class="card shadow-kartu bg-kartu-gradient p-3" style="height: 100%; width: 100%;">
                        <h6 class="cl-utama mb-3">Total laporan </h6>
                        <canvas id="chartUsers"></canvas>
                        <input type="hidden" id="dataUsers" value="{{ json_encode($users) ?? [] }}">
                        <input type="hidden" id="dataUserLaporanTotals"
                            value="{{ json_encode($user_laporan_totals) ?? [] }}">
                    </div>
                </div>

            </div>
        </section>

        {{-- PETUGAS SECTION --}}
        <section id="petugas" style="margin-top: 5rem">
            <div class="row g-3">

                <div class="col-12 col-md-4">
                    <h4 class="mb-3 cl-utama">Chart Petugas</h4>

                    <div class="card shadow-kartu bg-kartu-gradient h-100 p-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="cl-utama m-0">Petugas laporan selesai </h6>
                            <span class="badge bg-sidebar-gradient shadow-sidebar">Live</span>
                        </div>

                        <canvas id="chartPetugas"></canvas>
                        <input type="hidden" id="dataPetugas" value="{{ json_encode($petugas) ?? [] }}">
                        <input type="hidden" id="dataPetugasLaporanSuccessTotals"
                            value="{{ json_encode($petugas_laporan_totals_success) ?? [] }}">
                    </div>
                </div>


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
                        <div class="card shadow-kartu bg-kartu h-100">
                            <div class="card-body p-0 table-responsive">
                                <table class="table table-bordered table-striped mb-0 align-middle">
                                    <thead class="bg-sidebar-gradient text-white">
                                        <tr>
                                            <th width="60">#</th>
                                            <th>Nama</th>
                                            <th>email</th>
                                            <th>Details</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($petugas_paginate as $pt)
                                            <tr>
                                                <td>{{ $pt->id }}</td>
                                                <td class="fw-semibold cl-utama">
                                                    {{ $pt->username }}
                                                </td>
                                                <td>
                                                    <i class="bi bi-envelope"></i>
                                                    {{ $pt->emails ?? 'belum di isi' }}
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('admin.petugas.id', ['id' => $pt->id]) }}"
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
        <section id="laporan" style="margin-top: 5rem">
            <div class="row g-3">
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
                        <div class="card shadow-kartu bg-kartu h-100 table-responsive overflow-auto"
                            style="max-height: 35rem">
                            <div class="card-body p-0 table-responsive">
                                <table class="table table-bordered table-striped mb-0 align-middle">
                                    <thead class="bg-sidebar-gradient text-white">
                                        <tr>
                                            <th width="60">ID</th>
                                            <th>Judul</th>
                                            <th>Pelapor</th>
                                            <th>Petugas</th>
                                            <th>Tugaskan</th>
                                            <th>Aksi</th>
                                            <th width="120">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laporan as $lp)
                                            <tr>
                                                <td>{{ $lp->id }}</td>
                                                <td class="text-truncate" style="max-width: 220px;">
                                                    {{ $lp->judul }}
                                                </td>
                                                <td class="fw-semibold cl-utama">
                                                    {{ $lp->nama_pelapor }}
                                                </td>
                                                {{-- di atur jika sudha di aprof oleh admin  --}}
                                                <td>{{ $lp->nama_petugas ?? 'click tugaskan' }}</td>
                                                <td>
                                                    @if ($lp->status == 'pending')
                                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#updateLaporan"
                                                            data-id="{{ $lp->id }}">
                                                            Tugaskan
                                                        </button>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge
                                                {{ $lp->status === 'Selesai'
                                                    ? 'bg-sukses-gradient shadow-sukses'
                                                    : ($lp->status === 'pending'
                                                        ? 'bg-proses-gradient shadow-proses'
                                                        : 'bg-urgent-gradient shadow-urgent') }}">
                                                        {{ $lp->status }}
                                                    </span>
                                                </td>
                                                <td class="d-flex gap-2">
                                                    <button type="button" class="btn btn-sm text-denger">
                                                        <i class="bi bi-info-circle"></i>
                                                    </button>
                                                    <button class="btn btn-sm text-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal" data-id="{{ $lp->id }}"
                                                        data-judul="{{ $lp->judul }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>


                                            </tr>
                                            {{-- -modal laporan delete --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- CHART LAPORAN -->
                <div class="col-12 col-md-4" style="max-height: 35rem">
                    <h4 class="mb-3 cl-utama">Statistik</h4>

                    <div class="card shadow-kartu bg-kartu-gradient h-100 p-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="cl-utama m-0">Status Laporan</h6>
                            <span class="badge bg-sidebar-gradient shadow-sidebar">Realtime</span>
                        </div>

                        <canvas id="chartLaporan"></canvas>
                        <input type="hidden" name="dataLaporan" id="dataLaporan"
                            value="{{ json_encode($laporan_status_data) ?? [] }}">
                    </div>
                </div>

            </div>
        </section>

    </div>


    {{-- MODAL Start  --}}
    {{-- Modal Update Laporan --}}
    <div class="modal fade" id="updateLaporan" tabindex="-1" aria-labelledby="updateLaporanLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-kartu-gradient shadow-kartu rounded-4">

                {{-- HEADER --}}
                <div class="modal-header bg-utama-gradient text-white rounded-top-4">
                    <h5 class="modal-title fw-bold" id="updateLaporanLabel">
                        <i class="bi bi-person-check-fill me-1"></i> Tugaskan Petugas
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                {{-- BODY --}}
                <div class="modal-body cl-utama">
                    <p class="mb-3">
                        Pilih petugas untuk menangani laporan ini.
                    </p>

                    <form action="{{ route('admin.update.laporan') }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Pilih Petugas --}}
                        <div class="mb-3">
                            <label for="petugas_id" class="form-label fw-semibold">
                                <i class="bi bi-person-fill me-1"></i> Petugas
                            </label>
                            <select name="petugas_id" id="petugas_id" class="form-select border-secondary" required>
                                <option value="">-- Pilih Petugas --</option>
                                @foreach ($petugas as $pt)
                                    <option value="{{ $pt->id }}">
                                        {{ $pt->username }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Hidden laporan id --}}
                        <input type="hidden" name="laporan_id" id="laporan_id">

                        {{-- FOOTER / ACTION --}}
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" class="btn bg-urgent text-white shadow-urgent"
                                data-bs-dismiss="modal">
                                <i class="bi bi-x-circle"></i> Batal
                            </button>

                            <button type="submit" class="btn bg-sidebar text-white shadow-sidebar">
                                <i class="bi bi-check-circle-fill"></i> Tugaskan
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    {{-- -laporan destroy --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-kartu-gradient shadow-kartu rounded-4">

                <!-- Header -->
                <div class="modal-header bg-urgent-gradient text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        Hapus Laporan
                    </h5>
                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body cl-utama">
                    <p>
                        Ketik <strong id="laporanJudulText"></strong> untuk konfirmasi penghapusan.
                    </p>

                    <input type="text" id="confirmInput" class="form-control" placeholder="Ketik judul laporan">
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>

                    {{-- action di handle di javascrip --}}
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" id="deleteBtn" disabled>
                            <i class="bi bi-trash-fill"></i> Hapus
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>



    {{-- MODAL END  --}}

</x-layout-admin>
