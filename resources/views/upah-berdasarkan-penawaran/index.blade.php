<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Basis Data Upah Berdasarkan Penawaran</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/jumbotrons/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }
    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }
    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }
    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }
    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }
    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }
    .bd-mode-toggle {
        z-index: 1500;
    }
    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }
    
    .table-keterangan {
        white-space: normal; /* Memungkinkan wrapping teks */
        word-wrap: break-word; /* Memastikan teks yang panjang dibungkus ke baris berikutnya */
        max-width: 50px; /* Atur lebar maksimal kolom Keterangan */
    }

    .pagination .page-link {
        font-size: 0.8rem; /* Mengatur ukuran font tombol */
        padding: 0.3rem 0.5rem; /* Mengatur padding tombol */
        margin: 0 0.1rem; /* Mengatur margin antara tombol */
    }
</style>


    </style>
    <!-- Custom styles for this template -->
    <link href="front/css/sidebars.css" rel="stylesheet">
    <link href="front/css/jumbotrons.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/main" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <!--<svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>-->
        <img src="{{asset('front/photo/logo.png')}}" alt="Logo" class="me-2" width="155" height="60">
        <span class="fs-4" align-items-center >Basis Data</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ url('/main') }}" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="{{ url('/material') }}" class="nav-link active">Basis Data</a></li>
        <li class="nav-item"><a href="{{ url('/newhps') }}" class="nav-link">HPS</a></li>
        <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About</a></li>
      </ul>
    </header>
    <h1 class="text-body-emphasis" style="text-align: center;">BASIS DATA DINAS PERENCANAAN BARANG DAN JASA</h1>
    <div class="d-flex gap-2 justify-content-center py-3">
        <a href="/material" class="btn rounded-pill px-3">Bahan</a>
        <a href="/alat" class="btn rounded-pill px-3">Alat</a>
        <a href="/upah-berdasarkan-penawaran" class="btn btn-info rounded-pill px-3">Upah Berdasarkan Penawaran</a>
        <a href="/upah-operator-alat" class="btn rounded-pill px-3">Upah Operator Alat</a>
        <a href="/upah-tenaga-ahli-konsultan" class="btn rounded-pill px-3">Upah Tenaga Ahli Konsultan</a>
        <a href="/upah-tukang-bangunan" class="btn rounded-pill px-3">Upah Tukang Bangunan</a>
        <a href="/main" class="btn btn-secondary rounded-pill px-3">Kembali ke Halaman Utama</a>
    </div>
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <form action="" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari...">
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
                <div class="card-body">
                    <a href="{{ route('upah-berdasarkan-penawaran.create') }}" class="btn btn-md btn-success mb-3">Tambah Data Upah Berdasarkan Penawaran</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col"  class="table-keterangan">Keterangan</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Upah</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->keterangan }}</td>
                                    <td>{{ $post->satuan }}</td>
                                    <td>Rp. {{ number_format($post->upah, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('upah-berdasarkan-penawaran.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('upah-berdasarkan-penawaran.destroy', $post->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">Data Post belum Tersedia.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $posts->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(session()->has('success'))
        toastr.success('{{ session('success') }}', 'Berhasil!');
        @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'Gagal!');
        @endif
    </script>
</body>
</html>