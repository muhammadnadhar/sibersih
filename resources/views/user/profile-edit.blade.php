<x-layout-user :title="'Edit profile'">

    <div class="card card-profile bg-kartu p-4">
        <h3 class="text-center cl-utama mb-4">Edit Profile</h3>
        <form action="{{ route('user.profile.edit.put') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="fullname" class="form-label cl-utama">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" placeholder="Masukkan nama lengkap" required>
            </div>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label cl-utama">Username</label>
        <input type="text" class="form-control" id="name" placeholder="Masukkan username baru" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label cl-utama">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Masukkan email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label cl-utama">Password Baru</label>
        <input type="password" class="form-control" id="password" placeholder="Masukkan password baru">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label cl-utama">alamat Baru</label>
        <input type="address" class="form-control" id="address" placeholder="Masukkan alamat baru kamu">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label cl-utama">phone Baru</label>
        <input type="phone" class="form-control" id="phone" placeholder="Masukkan password baru kamu">
    </div>
    <div class="mb-3">
        <label for="confirm_password" class="form-label cl-utama">Konfirmasi Password</label>
        <input type="password" class="form-control" id="confirm_password" placeholder="Konfirmasi password">
    </div>
    <button type="submit" class="btn btn-save w-100">Simpan Perubahan</button>
    <a href="{{ url()->previous() }}" class="btn btn-secondary w-100 btn-back">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
    </form>
    </div>
</x-layout-user>
