<x-layout-user :isSidebar="true" :title="auth()->user()->name . ' | Profile'">



    <div class="container py-5">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col text-center">
                <h1 class="cl-utama">Profil User</h1>
            </div>
        </div>

        <!-- Profile Card -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-kartu shadow">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/120" class="rounded-circle mb-3" alt="Foto Profil">
                        <h3 class="cl-utama">Zero</h3>
                        <p class="cl-sidebar"><i class="bi bi-envelope"></i> zero@mail.com</p>
                        <p class="cl-sukses"><i class="bi bi-check-circle"></i> Invite Code: ABC123 (Aktif)</p>
                        <a href="#" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <div class="card bg-sukses text-center text-white shadow">
                    <div class="card-body">
                        <i class="bi bi-person-check fs-2"></i>
                        <h5 class="mt-2">Akun Aktif</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-proses text-center text-white shadow">
                    <div class="card-body">
                        <i class="bi bi-hourglass-split fs-2"></i>
                        <h5 class="mt-2">Proses Verifikasi</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-urgent text-center text-white shadow">
                    <div class="card-body">
                        <i class="bi bi-exclamation-triangle fs-2"></i>
                        <h5 class="mt-2">Aksi Dibutuhkan</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar / Informasi Tambahan -->
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action bg-sidebar text-white">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-sukses text-white">
                        <i class="bi bi-people"></i> Teman
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-proses text-white">
                        <i class="bi bi-clock-history"></i> Riwayat
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-urgent text-white">
                        <i class="bi bi-bell"></i> Notifikasi
                    </a>
                </div>
            </div>
        </div>

</x-layout-user>
