<x-layout-admin>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow" id="bg-putih-kartu" style="width: 380px; background-color:  border-radius: 16px;">
            <div class="card-body p-4">
                <h3 class="text-center mb-4" style="color: #1E293B; font-weight: 700;">Admin Login</h3>


                <form action="{{ route('admin.sign-in') }}" method="POST" class="p-4 bg-kartu shadow rounded">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label cl-utama">Username</label>
                        <input type="text" id="username" name="username"
                            class="form-control rounded-2 border-secondary @error('username') is-invalid @enderror"
                            placeholder="Masukkan username" value="{{ old('username') }}" required minlength="3"
                            maxlength="30" />
                        @error('username')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label cl-utama">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-control rounded-2 border-secondary @error('password') is-invalid @enderror"
                            placeholder="Buat password" required minlength="6" />
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

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
