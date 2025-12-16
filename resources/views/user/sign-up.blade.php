<x-layout-user :title="'Sign in'">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow" style="width: 420px; background-color: #FFFFFF; border-radius: 16px;">
            <div class="card-body p-4">
                <h3 class="text-center mb-4" style="color: #1E293B; font-weight: 700;">User Register</h3>


                <form action="{{ route('user.sign-up.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-dark">Nama Lengkap</label>
                        <input type="text" name="username"
                            class="form-control border border-secondary rounded-3 @error('username') is-invalid
                        @enderror"
                            minlength="3" maxlength="30" placeholder="Masukkan nama" required>
                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label class="form-label text-dark">Email</label>
                        <input type="email" name="email" class="form-control border border-secondary rounded-3"
                            placeholder="Masukkan email" required>
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">
                        <label for="password" class="form-label cl-utama">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-control rounded-2 border-secondary @error('password') is-invalid @enderror"
                            placeholder="Buat password" required minlength="6" />
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label cl-utama">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control rounded-2 border-secondary @error('password_confirmation') is-invalid @enderror"
                            placeholder="Ulangi password" required minlength="6" />
                        @error('password_confirmation')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- invite code --}}
                    <div class="mb-3">
                        <label class="form-label cl-utama">Invite Code</label>
                        <div class="input-group">
                            <span class="input-group-text bg-abu cl-utama border-secondary">SBR-</span>
                            <input type="text" name="invite_code" class="form-control border-secondary rounded-end"
                                placeholder="Dapatkan dengan hubungi pihak pengelola" required>
                        </div>
                    </div>


                    <!-- BUTTON REGISTER -->
                    <button type="submit" class="btn btn-success w-100 mt-2 rounded">
                        Register
                    </button>

                    <!-- LOGIN LINK -->
                    <div class="mt-3 text-center">
                        <a href="{{ route('user.sign-in') }}" class="text-primary text-decoration-none">
                            Sudah punya akun? Sign In
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-layout-user>
