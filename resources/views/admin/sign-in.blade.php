<x-layout-admin>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow" id="bg-putih-kartu" style="width: 380px; background-color:  border-radius: 16px;">
            <div class="card-body p-4">
                <h3 class="text-center mb-4" style="color: #1E293B; font-weight: 700;">Admin Login</h3>


                <form action="{{ route('admin.sign-in') }}" class="p-4 bg-kartu shadow rounded">
                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label cl-utama">Username</label>
                        <input type="text" id="username" name="username"
                            class="form-control rounded-2 border-secondary" placeholder="Masukkan username" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label cl-utama">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-control rounded-2 border-secondary" placeholder="Masukkan password" />
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn bg-sidebar text-white w-100 mt-2 rounded-3">Login</button>

                    <!-- Info Tambahan -->
                    <div class="mt-3 text-center">
                        <small class="cl-urgent d-block">*Hanya untuk Admin</small>
                        <small>Belum punya akun? <a href="{{ route('admin.sign-up') }}">Register</a></small>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layout-admin>
