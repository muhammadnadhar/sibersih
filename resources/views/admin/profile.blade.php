<x-layout-admin :isSidebar="true" :title="$admin->name . '| profile'">

    <div class="flex-grow-1 p-4">
        {{-- Account Details --}}
        <section id="account-details" class="mb-5">

            <div class="mb-4">
                <h4 class="cl-utama fw-semibold mb-1">
                    <i class="bi bi-person-circle cl-sidebar me-2"></i>
                    Profil Pengguna
                </h4>
                <p class="text-muted small mb-0 mt-2">
                    Kelola informasi akun dan data pribadi Anda
                </p>
            </div>

            <div class="row g-4">

                <div class="col-lg-4">

                    <div class="bg-kartu rounded-4 shadow-kartu overflow-hidden">


                        <div class="bg-kartu-gradient p-4 text-center">
                            <div class="mx-auto mb-2 rounded-circle shadow-kartu
                                d-flex align-items-center justify-content-center"
                                style="width:90px;height:90px;">
                                <img class="w-100 h-100 rounded-circle" src="{{ asset($admin->avatar) }}"
                                    alt="Avatar">
                            </div>

                            <h6 class="cl-kartu fw-semibold mb-0">
                                {{ $admin->username ?? 'Nama User' }}
                            </h6>
                            <span class="small text-light opacity-75">
                                Pengguna Terdaftar
                            </span>
                        </div>

                        {{-- Quick Info --}}
                        <div class="p-3">

                            <div class="d-flex align-items-center mb-2 small">
                                <i class="bi bi-envelope cl-sidebar me-2"></i>
                                <span class="cl-utama">
                                    {{ $admin->email ?? 'admin@email.com' }}
                                </span>
                            </div>

                            <div class="d-flex align-items-center mb-2 small">
                                <i class="bi bi-telephone cl-sidebar me-2"></i>
                                <span class="cl-utama">
                                    {{ $admin->phone ?? '-' }}
                                </span>
                            </div>

                            <div class="d-flex align-items-center small">
                                <i class="bi bi-calendar-check cl-sidebar me-2"></i>
                                <span class="cl-utama">
                                    Bergabung sejak {{ $admin->created_at?->format('d M Y') }}
                                </span>
                            </div>

                        </div>
                    </div>

                </div>

                {{-- DETAIL PROFILE --}}
                <div class="col-lg-8">

                    <div class="bg-kartu rounded-4 shadow-kartu p-4">

                        <h6 class="fw-semibold cl-utama mb-3">
                            Informasi Pribadi
                        </h6>

                        <div class="row g-3 small">

                            <div class="col-md-6">
                                <label class="text-muted mb-1">Nama Lengkap</label>
                                <div class="p-2 rounded-3 bg-abu cl-utama">
                                    {{ $admin->username ?? '-' }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted mb-1">Email</label>
                                <div class="p-2 rounded-3 bg-abu cl-utama">
                                    {{ $admin->email ?? '-' }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted mb-1">Nomor Telepon</label>
                                <div class="p-2 rounded-3 bg-abu cl-utama">
                                    {{ $admin->phone ?? '-' }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted mb-1">Status Akun</label>
                                <div class="p-2 rounded-3 bg-sukses-gradient shadow-sukses text-white">
                                    Aktif
                                </div>
                            </div>

                        </div>

                        {{-- ACTION --}}
                        <div class="mt-4 d-flex flex-wrap gap-2 justify-content-center">
                            <!-- Edit Profil -->
                            <a href="#"
                                class="btn btn-outline-dark shadow-sm px-3 py-2 d-flex align-items-center">
                                <i class="bi bi-pencil-square me-2"></i>
                                Edit Profil
                            </a>

                            <!-- Keamanan -->
                            <a href="#"
                                class="btn btn-outline-dark shadow-sm px-3 py-2 d-flex align-items-center">
                                <i class="bi bi-shield-lock me-2"></i>
                                Keamanan
                            </a>

                            <!-- Ganti Password -->
                            <button class="btn btn-outline-dark shadow-sm px-3 py-2 d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                <i class="bi bi-key-fill me-2"></i>
                                Ganti Password
                            </button>

                            <!-- Logout -->
                            <button class="btn btn-outline-dark shadow-sm px-3 py-2 d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="bi bi-door-closed me-2"></i>
                                Logout
                            </button>
                        </div>


                    </div>

                </div>

            </div>

        </section>

    </div>

    {{-- Modal start  --}}

    {{-- Modal logout --}}
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
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Ganti Password --}}
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 bg-kartu-gradient shadow-kartu">

                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title cl-utama fw-semibold" id="changePasswordModalLabel">
                        <i class="bi bi-key-fill me-2 cl-sidebar"></i>
                        Ganti Password
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body pt-3">

                    <p class="small text-muted mb-3">
                        Demi keamanan akun, gunakan password yang kuat dan mudah diingat.
                    </p>

                    <form action="{{ route('admin.password.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label small cl-utama">
                                Password Lama
                            </label>
                            <input type="password" name="current_password" class="form-control shadow-sm"
                                placeholder="Masukkan password lama" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small cl-utama">
                                Password Baru
                            </label>
                            <input type="password" name="password" class="form-control shadow-sm"
                                placeholder="Password baru" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small cl-utama">
                                Konfirmasi Password Baru
                            </label>
                            <input type="password" name="password_confirmation" class="form-control shadow-sm"
                                placeholder="Ulangi password baru" required>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn bg-kartu-hover shadow-kartu" data-bs-dismiss="modal">
                                Batal
                            </button>

                            <button type="submit" class="btn bg-sidebar-gradient text-white shadow-sidebar">
                                <i class="bi bi-check-lg me-1"></i>
                                Simpan
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>



</x-layout-admin>
