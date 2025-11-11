<x-layout-base>

<div class="container-fluid">
    <div class="row min-vh-100">

      <!-- Sidebar -->
      <div class="col-md-4 bg-main-blue d-flex flex-column justify-content-center align-items-center text-white p-4">
        <h1 class="fw-bold mb-3 text-center">Pilih Peran Anda</h1>
        <p class="text-center mb-0">Masuk sebagai salah satu peran berikut</p>
      </div>

      <!-- Content -->
      <div class="col-md-8 d-flex align-items-center justify-content-center">
        <div class="row w-75">

          <!-- User -->
          <div class="col-md-4 mb-4">
            <div class="card bg-card border-0 rounded-4 shadow-sm text-center p-4">
              <div class="fs-1 mb-3">👤</div>
              <h5 class="fw-semibold mb-3">User</h5>
              <button class="btn btn-user w-100 fw-semibold rounded-3">Masuk</button>
            </div>
          </div>

          <!-- Admin -->
          <div class="col-md-4 mb-4">
            <div class="card bg-card border-0 rounded-4 shadow-sm text-center p-4">
              <div class="fs-1 mb-3">🛠️</div>
              <h5 class="fw-semibold mb-3">Admin</h5>
              <button class="btn btn-admin w-100 fw-semibold rounded-3">Masuk</button>
            </div>
          </div>

          <!-- Petugas -->
          <div class="col-md-4 mb-4">
            <div class="card bg-card border-0 rounded-4 shadow-sm text-center p-4">
              <div class="fs-1 mb-3">📋</div>
              <h5 class="fw-semibold mb-3">Petugas</h5>
              <button class="btn btn-petugas w-100 fw-semibold rounded-3">Masuk</button>
            </div>
          </div>

        </div>
      </div>
    </div>
</div>
</x-layout-base>
