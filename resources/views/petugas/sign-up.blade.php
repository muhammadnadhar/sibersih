
<x-layout-petugas :title="'Petugas | PetugasSignUp'">

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow" style="width: 420px; background-color: #FFFFFF; border-radius: 16px;">
            <div class="card-body p-4">
                <h3 class="text-center mb-4" style="color: #1E293B; font-weight: 700;">User Register</h3>


                <form action="{{ route('user.sign-up.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" style="color: #1E293B;">Nama Lengkap</label>
                        <input type="text" class="form-control"
                            style="border: 1px solid #1E293B33; border-radius: 8px;" placeholder="Masukkan nama" />
                    </div>


                    <div class="mb-3">
                        <label class="form-label" style="color: #1E293B;">Email</label>
                        <input type="email" class="form-control"
                            style="border: 1px solid #1E293B33; border-radius: 8px;" placeholder="Masukkan email" />
                    </div>


                    <div class="mb-3">
                        <label class="form-label" style="color: #1E293B;">Password</label>
                        <input type="password" class="form-control"
                            style="border: 1px solid #1E293B33; border-radius: 8px;" placeholder="Buat password" />
                    </div>


                    <div class="mb-3">
                        <label class="form-label" style="color: #1E293B;">Konfirmasi Password</label>
                        <input type="password" class="form-control"
                            style="border: 1px solid #1E293B33; border-radius: 8px;" placeholder="Ulangi password" />
                    </div>

  <div class="mb-3">
                        <label class="form-label cl-utama">Invite Code</label>
                        <div class="input-group">
                            <span class="input-group-text bg-abu cl-utama border-secondary">SBR-</span>
                            <input type="text" name="invite_code" class="form-control border-secondary rounded-end"
                                placeholder="Dapatkan dengan hubungi pihak pengelola" required>
                        </div>
                    </div>

                    <button type="submit" class="btn w-100 mt-2"
                        style="background-color: #34D399; color: white; border-radius: 10px;"><a
                            href=" {{ route('user.sign-up') }}">Register</a> </button>

                    <div class="mt-3 text-center">
                        <small style="color: #2B68FF; cursor: pointer;">Sudah punya akun? Sign In</small>
                    </div>
                </form>
            </div>
        </div>
    </div>



</x-layout-petugas>
