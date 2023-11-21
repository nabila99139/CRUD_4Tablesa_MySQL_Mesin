<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <a class="btn btn-danger" href="/sesi/logout">Logout</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/semua_table">Semua Tabel</a>
                </li>
                @auth
                    @if(auth()->user()->role == 'admin')
                        {{-- Tampilkan item navbar yang hanya bisa diakses oleh admin --}}
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/mesinCE">Mesin</a>
                        </li>
                    @endif
                    @if(auth()->user()->role == 'super_admin')
                        {{-- Tampilkan item navbar yang hanya bisa diakses oleh super admin --}}
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/mesin">Mesin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/jenis_mesin">Jenis Mesin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/merk_mesin">Merk Mesin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/mutasi_mesin">Mutasi Mesin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="sesi/register">Register</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>
