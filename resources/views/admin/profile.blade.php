<x-layout-admin :isSiderbar="true" :title="$admin->name . '| profile'">

    <div class="flex-grow-1 p-4">

        {{-- Profile Header --}}
        <div class="card shadow-kartu bg-kartu-gradient rounded-4 mb-4 p-4">
            <div class="d-flex align-items-center">
                {{-- Avatar --}}
                <div class="me-4">
                    <img src="{{ $admin->avatar ?? '/img/default-avatar.png' }}" alt="Avatar"
                        class="rounded-circle shadow-sm" style="width: 100px; height: 100px; object-fit: cover;">
                </div>
                {{-- Info --}}
                <div>
                    <h3 class="cl-utama fw-semibold">{{ $admin->username }}</h3>
                    <p class="cl-utama mb-1"><i class="bi bi-envelope me-2"></i>{{ $admin->email }}</p>
                    <p class="cl-utama mb-0"><i class="bi bi-person-badge me-2"></i>Admin Level:
                        {{ $admin->level ?? 'Super Admin' }}</p>
                </div>
            </div>
        </div>

        {{-- Account Details --}}
        <section id="account-details" class="mb-5">
            <h4 class="mb-3 cl-utama">Detail Akun</h4>

            <div class="card shadow-kartu bg-kartu p-4 rounded-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label cl-utama">Username</label>
                        <input type="text" class="form-control bg-abu border-0 cl-utama shadow-sm"
                            value="{{ $admin->username }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label cl-utama">Email</label>
                        <input type="email" class="form-control bg-abu border-0 cl-utama shadow-sm"
                            value="{{ $admin->email }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label cl-utama">Level</label>
                        <input type="text" class="form-control bg-abu border-0 cl-utama shadow-sm"
                            value="{{ $admin->level ?? 'Super Admin' }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label cl-utama">Tanggal Dibuat</label>
                        <input type="text" class="form-control bg-abu border-0 cl-utama shadow-sm"
                            value="{{ $admin->created_at->format('d M Y') }}" readonly>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('admin.profile.edit') }}" class="btn bg-sukses-hover text-white shadow-sm">
                        <i class="bi bi-pencil-square me-2"></i>Edit Profile
                    </a>
                    <button class="btn bg-urgent-hover text-white shadow-sm" data-bs-toggle="modal"
                        data-bs-target="#changePasswordModal">
                        <i class="bi bi-key-fill me-2"></i>Ganti Password
                    </button>
                </div>
            </div>
        </section>

    </div>

    {{-- Modal Ganti Password --}}
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 bg-kartu-gradient shadow-kartu">
                <div class="modal-header border-0">
                    <h5 class="modal-title cl-utama" id="changePasswordModalLabel">
                        <i class="bi bi-key-fill me-2"></i>Ganti Password
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.profile.changePassword') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="current_password" class="form-label cl-utama">Password Lama</label>
                            <input type="password" name="current_password" id="current_password"
                                class="form-control bg-abu border-0 cl-utama shadow-sm" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label cl-utama">Password Baru</label>
                            <input type="password" name="new_password" id="new_password"
                                class="form-control bg-abu border-0 cl-utama shadow-sm" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label cl-utama">Konfirmasi
                                Password</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                class="form-control bg-abu border-0 cl-utama shadow-sm" required>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn bg-kartu-hover fw-semibold"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit"
                            class="btn bg-sukses-hover text-white fw-semibold shadow-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-layout-admin>
