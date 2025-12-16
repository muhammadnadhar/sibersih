<x-layout-admin>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow" style="width: 420px; background-color: #FFFFFF; border-radius: 16px;">
            <div class="card-body p-4">
                <h3 class="text-center mb-4" style="color: #1E293B; font-weight: 700;">Admin Register</h3>

                <form action="{{ route('admin.sign-up.post') }}" method="POST" class="p-4 bg-kartu shadow rounded">
                    @csrf
                    {{-- Username --}}
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

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label cl-utama">Email</label>
                        <input type="email" id="email" name="email"
                            class="form-control rounded-2 border-secondary @error('email') is-invalid @enderror"
                            placeholder="Masukkan email" value="{{ old('email') }}" required />
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label cl-utama">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-control rounded-2 border-secondary @error('password') is-invalid @enderror"
                            placeholder="Buat password" required minlength="6" />
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password Confirmation --}}
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label cl-utama">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control rounded-2 border-secondary @error('password_confirmation') is-invalid @enderror"
                            placeholder="Ulangi password" required minlength="6" />
                        @error('password_confirmation')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Invite Code --}}
                    <div class="mb-3">
                        <label class="form-label cl-utama">Invite Code</label>
                        <div class="input-group">
                            <span class="input-group-text bg-abu cl-utama border-secondary">SBR-</span>
                            <input type="text" name="invite_code" class="form-control border-secondary rounded-end"
                                placeholder="Dapatkan dengan hubungi pihak pengelola" required>
                            @error('invite_code')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    {{-- General Error --}}
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    {{-- Submit Button --}}
                    <button type="submit" class="btn bg-sukses text-white w-100 mt-2 rounded-3">Register</button>
                </form>

                <!-- Info Tambahan -->
                <div class="mt-3 text-center">
                    <small class="cl-sidebar" style="cursor: pointer;">Sudah punya akun? <a
                            href="{{ route('admin.sign-in') }}">Login</a></small>
                </div>

            </div>
        </div>
    </div>
</x-layout-admin>
