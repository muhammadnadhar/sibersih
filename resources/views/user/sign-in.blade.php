<x-layout-user :title="'Login'">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow" style="width: 380px; background-color: #FFFFFF; border-radius: 16px;">
            <div class="card-body p-4">
                <h3 class="text-center mb-4" style="color: #1E293B; font-weight: 700;">User Sign In</h3>


                <form action="{{ route('user.sign-in.post') }}" method="POST">
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

                    <button type="submit"
                        class="btn w-100 mt-3
               bg-sidebar-gradient text-white
               fw-semibold py-2 rounded-3
               shadow-sidebar
               bg-sidebar-hover">
                        <i class="bi bi-send-fill me-1"></i>
                        Submit
                    </button>


                    <div class="mt-4 text-center d-flex justify-content-center align-items-center gap-3">
                        <span class="small cl-utama">
                            Belum punya akun?
                        </span>

                        <a href="{{ route('user.sign-up') }}"
                            class="p-2  rounded-pill
              bg-sidebar-gradient shadow-sidebar
              text-white fw-semibold small
              d-inline-flex align-items-center gap-1
              text-decoration-none
              bg-sidebar-hover">
                            Daftar Sekarang
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout-user>
