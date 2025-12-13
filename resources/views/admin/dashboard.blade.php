<x-layout-admin :isSidebar="true" :admin="$admin">

    <!-- Content -->
    <div class="flex-grow-1 p-4">

        <!-- USERS -->
        <section id="users" class="mb-5">
            <h3 class="mb-3">Kelola Users</h3>

            <div class="card shadow-sm mb-3" style="background: var(--color-putih-kartu);">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Daftar Users</h5>
                    <!-- <button class="btn text-white" style="background: var(--color-hijau-sukses);"> -->
                    <!--     <i class="bi bi-plus-lg"></i> Tambah User -->
                    <!-- </button> -->
                </div>
            </div>

            <table class="table table-bordered table-striped">
                <thead style="background: var(--color-biru-sidebar); color: white;">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                         <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            {{-- fitur otomatis dari Blade untuk menampilkan nomor urut pada setiap baris @foreach. --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- <td>
                                <span class="badge" style="background: var(--color-hijau-sukses);">
                                    {{ $user->status ?? 'Aktif' }}
                                </span>
                            </td> --}}
                            <td>
                                <button class="btn btn-sm btn-warning text-dark">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                <button class="btn btn-sm text-white" style="background: var(--color-merah-urgent);">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </section>

        <!-- PETUGAS -->
        <section id="petugas" class="mb-5">
            <h3 class="mb-3">Kelola Petugas</h3>

            <div class="card shadow-sm mb-3" style="background: var(--color-putih-kartu);">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Daftar Petugas</h5>
                    <button class="btn text-white" style="background: var(--color-hijau-sukses);">
                        <i class="bi bi-plus-lg"></i> Tambah Petugas
                    </button>
                </div>
            </div>

            <table class="table table-bordered table-striped">
                <thead style="background: var(--color-biru-sidebar); color: white;">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

        @foreach ($petugas as $pt)
                    <tr>

                <a href="{{ route('admin.petugas.id',['id'=>$pt->id]) }}">
                            <td>{{ $pt->id }}</td>
                            </a>
                        <td>{{ $pt->name}}</td>
                        <td><span class="badge" style="background: var(--color-biru-sidebar);">{{ $pt->status }}</span></td>
                        <td>
                            <!-- <button class="btn btn-sm btn-warning text-dark"><i class="bi bi-pencil"></i></button> -->
                            untuk ifo petugas
                            <button class="btn btn-sm text-white" style="background: var(--color-merah-urgent);">
                                <a href="{{ route()}}">
                                    <i class="bi bi-info-circle-fill"></i>
                                </a>
                                </button>
                        </td>
                    </tr>
@endforeach
                </tbody>
            </table>
        </section>

    </div>


    <!-- LAPORAN DATA start  -->

    <div>
        <h3>LAPORAN</h3>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pelapor</th>
            <th>Petugas</th>
            <th>Admin</th>
            <th>Judul</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($laporan as $lp)
                <a href="{{ route('admin.laporan.id',['id'=>$lp->id]) }}">
                <tr>
                            <td>{{ $lp->id }}</td>
                        </a>

            {{-- User (pelapor) --}}
            <td>{{ $lp->user->name }}</td>

            {{-- Petugas --}}
            <td>{{ $lp->petugas->name ?? '-' }}</td>

            {{-- Admin --}}
            <td>{{ $lp->admin->name ?? '-' }}</td>

            <td>{{ $lp->judul }}</td>
                    <td>{{ $l->status }}</td>
                    </tr>
                </a>
        @endforeach
    </tbody>
</table>
    </div>

    <!-- LAPORAN DATA and  -->


</x-layout-admin>
