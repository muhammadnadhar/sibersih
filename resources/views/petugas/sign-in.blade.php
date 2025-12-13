<x-layout-petugas :title="'Petugas | PetugasSignIn'">


    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow" style="width: 380px; background-color: #FFFFFF; border-radius: 16px;">
            <div class="card-body p-4">
                <h3 class="text-center mb-4" style="color: #1E293B; font-weight: 700;">User Sign In</h3>


                <form>
                    <div class="mb-3">
                        <label class="form-label cl-utama ">Username</label>
                        <input type="text" name="username" class="form-control"
                            style="border: 1px solid #1E293B33; border-radius: 8px;" placeholder="Masukkan email" />
                    </div>


                    <div class="mb-3">
                        <label class="form-label" style="color: #1E293B;">Password</label>
                        <input type="password" name="password" class="form-control"
                            style="border: 1px solid #1E293B33; border-radius: 8px;" placeholder="Masukkan password" />
                    </div>


                    <button type="submit" class="btn w-100 mt-2 bg-sidebar"
                        style=" color: white; border-radius: 10px;"><a
                            href="{{ route('petugas.sign-up') }}"></a></button>


                    <div class="mt-3 text-center">
                        <small style="color: #2B68FF; cursor: pointer;"><a href="{{ route('user.sign-up') }}">Belum
                                punya akun? </a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-layout-petugas>
