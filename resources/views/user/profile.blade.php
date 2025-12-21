<x-layout-user :isSidebar="true" :title="$user->name . ' | Profile'">
    <section class="container-fluid bg-abu py-4">

        {{-- PAGE TITLE --}}
        <div class="mb-4">
            <h4 class="cl-utama fw-semibold mb-1">Profil Pengguna</h4>
            <p class="text-muted small mb-0">
                Kelola informasi pribadi dan keamanan akun Anda
            </p>
        </div>

        <div class="row g-4">

            {{-- LEFT : INFORMASI PRIBADI --}}
            <div class="col-lg-8">

                <div class="card border-0 rounded-4 shadow-kartu bg-kartu p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="fw-semibold cl-utama mb-0">
                            Informasi Pribadi
                        </h6>
                        <div class="d-flex justify-content-center align-items-center gap-3 ">

                            <button class="btn bg-sidebar-gradient text-white shadow-sidebar btn-sm">
                                <i class="bi bi-pencil-square me-1"></i> Edit Profil
                            </button>
                            <button class="btn bg-urgent-gradient text-white shadow-urgent btn-sm"data-bs-toggle="modal"
                                data-bs-target="#logoutModal">
                                <i class="bi bi-door-closed"></i>
                                logout
                            </button>
                        </div>
                    </div>

                    <div class="row g-3 small">

                        <div class="col-md-6">
                            <label class="text-muted mb-1">Nama Lengkap</label>
                            <div class="p-2 bg-abu rounded-3 cl-utama">
                                {{ auth()->user()->name ?? 'Nama User' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted mb-1">Email</label>
                            <div class="p-2 bg-abu rounded-3 cl-utama">
                                {{ auth()->user()->email ?? 'user@email.com' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted mb-1">Username</label>
                            <div class="p-2 bg-abu rounded-3 cl-utama">
                                {{ auth()->user()->username ?? '-' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted mb-1">Nomor Telepon</label>
                            <div class="p-2 bg-abu rounded-3 cl-utama">
                                {{ auth()->user()->phone ?? '-' }}
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="text-muted mb-1">Alamat</label>
                            <div class="p-2 bg-abu rounded-3 cl-utama">
                                {{ auth()->user()->address ?? 'Belum diisi' }}
                            </div>
                        </div>

                    </div>
                </div>

                {{-- ACTIVITY --}}
                <div class="card border-0 rounded-4 shadow-kartu bg-kartu p-4 mt-4">
                    <h6 class="fw-semibold cl-utama mb-3">
                        Aktivitas Terakhir
                    </h6>

                    <ul class="list-unstyled mb-0 small">

                        {{-- <li class="d-flex align-items-start mb-3">
                            <span class="badge bg-sukses-gradient shadow-sukses me-3 mt-1">✔</span>
                            <div>
                                <strong>Password diperbarui</strong>
                                <div class="text-muted">2 hari yang lalu</div>
                            </div>
                        </li>

                        <li class="d-flex align-items-start mb-3">
                            <span class="badge bg-proses-gradient shadow-proses me-3 mt-1">!</span>
                            <div>
                                <strong>Login dari perangkat baru</strong>
                                <div class="text-muted">5 hari yang lalu</div>
                            </div>
                        </li>

                        <li class="d-flex align-items-start">
                            <span class="badge bg-sidebar-gradient shadow-sidebar me-3 mt-1">i</span>
                            <div>
                                <strong>Profil diperbarui</strong>
                                <div class="text-muted">1 minggu yang lalu</div>
                            </div>
                        </li> --}}
                        @if ($laporan_activity)
                            @forelse ($laporan_activity as $item)
                                <li class="d-flex align-items-start mb-3">
                                    <span class="badge bg-sidebar-gradient shadow-sidebar me-3 mt-1">i</span>
                                    <div>
                                        <strong>Laporan "{{ $item->judul }}" dibuat</strong>
                                        <div class="text-muted">{{ $item->created_at->diffForHumans() }}</div>
                                    </div>
                                </li>
                            @endforeach
                            {{-- @eleIf (aktifitas lain) --}}
                        @else
                            <div>
                                <p>Belum ada ACTIVITY</p>
                            </div>

                        @endif
                        @endif

                    </ul>
                </div>

            </div>

            {{-- RIGHT : PROFILE SUMMARY --}}
            <div class="col-lg-4">

                {{-- PROFILE CARD --}}
                <div class="card border-0 rounded-4 shadow-utama bg-utama-gradient text-white p-4 text-center">

                    <div class="mx-auto mb-3 rounded-circle bg-kartu shadow-kartu
                            d-flex align-items-center justify-content-center"
                        style="width:90px;height:90px;">
                        <i class="bi bi-person-fill fs-1 cl-utama"></i>
                    </div>

                    <h6 class="fw-semibold mb-0">
                        {{ auth()->user()->name ?? 'Nama User' }}
                    </h6>
                    <span class="small opacity-75">
                        Pengguna Terdaftar
                    </span>

                    <hr class="opacity-25 my-3">

                    <div class="d-flex justify-content-between small">
                        <span>Status Akun</span>
                        <span class="badge bg-sukses-gradient shadow-sukses">
                            Aktif
                        </span>
                    </div>
                </div>

                {{-- STATS --}}
                <div class="row g-3 mt-3">

                    <div class="col-6">
                        <div
                            class="card border-0 rounded-3 shadow-sukses bg-sukses-gradient text-white p-3 text-center">
                            <div class="small opacity-75">Laporan</div>
                            <div class="fs-4 fw-semibold">12</div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div
                            class="card border-0 rounded-3 shadow-sidebar bg-sidebar-gradient text-white p-3 text-center">
                            <div class="small opacity-75">Aktivitas</div>
                            <div class="fs-4 fw-semibold">28</div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- -Modal start --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="logoutModalLabel">Are you sure</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p>Apakah Anda yakin ingin keluar dari akun ini?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout-user>
