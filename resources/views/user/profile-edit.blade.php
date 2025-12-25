<x-layout-user :title="'Edit profile'">

    <!-- Container full height -->
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-abu">
        <!-- Card Profile -->
        <div class="card shadow-kartu rounded-4 p-4" style="max-width: 500px; width: 100%;">
            <h3 class="text-center cl-utama mb-4">Edit Profile</h3>
            <form action="{{ route('petugas.profile.edit.put') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="fullname" class="form-label cl-utama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="fullname" name="fullname"
                        placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label cl-utama">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Masukkan username baru" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label cl-utama">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Masukkan email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label cl-utama">Password Baru</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Masukkan password baru">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label cl-utama">Alamat Baru</label>
                    <input type="text" class="form-control" id="address" name="address"
                        placeholder="Masukkan alamat baru">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label cl-utama">Telepon Baru</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                        placeholder="Masukkan nomor telepon baru">
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label cl-utama">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                        placeholder="Konfirmasi password">
                </div>

                <button type="submit"
                    class="btn bg-sidebar text-white w-100 mb-2 shadow-sidebar bg-sidebar-hover">Simpan
                    Perubahan</button>
                <a href="{{ url()->previous() }}" class="btn bg-utama text-white w-100 shadow-utama bg-utama-hover">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

</x-layout-user>
