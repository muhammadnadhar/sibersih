<x-layout-user :title="'Sign in'">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow" style="width: 420px; background-color: #FFFFFF; border-radius: 16px;">
            <div class="card-body p-4">
                <h3 class="text-center mb-4" style="color: #1E293B; font-weight: 700;">User Register</h3>


                <form action="{{ route('user.sign-up.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-dark">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control border border-secondary rounded-3"
                            placeholder="Masukkan nama" required>
                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label class="form-label text-dark">Email</label>
                        <input type="email" name="email" class="form-control border border-secondary rounded-3"
                            placeholder="Masukkan email" required>
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">
                        <label class="form-label text-dark">Password</label>
                        <input type="password" name="password" class="form-control border border-secondary rounded-3"
                            placeholder="Buat password" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dark">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                            class="form-control border border-secondary rounded-3" placeholder="Ulangi password"
                            required>
                    </div>
                    {{-- invite code --}}
                    <div class="mb-3">
                        <label class="form-label text-dark">invide code </label>
                        <input type="text" name="invide_code" class="form-control border border-secondary rounded-3"
                            placeholder="Dapatkan dengan hubungi pihak pengelola" required>
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
