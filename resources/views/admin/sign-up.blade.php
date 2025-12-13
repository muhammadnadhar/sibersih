<x-layout-admin>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow" style="width: 420px; background-color: #FFFFFF; border-radius: 16px;">
            <div class="card-body p-4">
                <h3 class="text-center mb-4" style="color: #1E293B; font-weight: 700;">Admin Register</h3>

                <form action="{{ route('admin.sign-up.post') }}" method="post" class="p-4 bg-kartu shadow rounded">
                    <!-- Nama Lengkap -->
                    <div class="mb-3">
                        <label for="nama" class="form-label cl-utama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama"
                            class="form-control rounded-2 border-secondary" placeholder="Masukkan nama" />
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label cl-utama">Email</label>
                        <input type="email" id="email" name="email"
                            class="form-control rounded-2 border-secondary" placeholder="Masukkan email" />
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label cl-utama">Username</label>
                        <input type="text" id="username" name="username"
                            class="form-control rounded-2 border-secondary" placeholder="Masukkan username" />
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label cl-utama">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-control rounded-2 border-secondary" placeholder="Buat password" />
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label cl-utama">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control rounded-2 border-secondary" placeholder="Ulangi password" />
                    </div>

                    {{-- invite code  --}}
                    <div class="mb-3">
                        <label for="invite_code" class="form-label cl-utama">Code invite</label>
                        <input type="text" id="invite_code" name="invite_code"
                            class="form-control rounded-2 border-secondary"
                            placeholder="Invite code untuk Gruping Users " required />
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn bg-sukses text-white w-100 mt-2 rounded-3">Register</button>

                    <!-- Info Tambahan -->
                    <div class="mt-3 text-center">
                        <small class="cl-sidebar" style="cursor: pointer;">Sudah punya akun? <a
                                href="{{ route('admin.sign-in') }}">Login</a></small>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layout-admin>
