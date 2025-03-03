<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Basis Data Material</title>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  
    <!-- Bootstrap CSS -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="front/css/sidebars.css" rel="stylesheet">
    <link href="front/css/jumbotrons.css" rel="stylesheet">

    <!-- Other styles and scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">

    <style>
        .pagination .page-link {
            font-size: 0.8rem; /* Mengatur ukuran font tombol */
            padding: 0.3rem 0.5rem; /* Mengatur padding tombol */
            margin: 0 0.1rem; /* Mengatur margin antara tombol */
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/main" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img src="{{asset('front/photo/logo.png')}}" alt="Logo" class="me-2" width="155" height="60">
            <span class="fs-4">Basis Data</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{ url('/main') }}" class="nav-link" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="{{ url('/material') }}" class="nav-link active">Basis Data</a></li>
            <li class="nav-item"><a href="{{ url('/newhps') }}" class="nav-link">HPS</a></li>
        </ul>
    </header>
    
    <h1 class="text-body-emphasis text-center">BASIS DATA DINAS PERENCANAAN BARANG DAN JASA</h1>

    <div class="d-flex gap-2 justify-content-center py-3">
        <a href="/material" class="btn btn-info rounded-pill px-3">Bahan</a>
        <a href="/alat" class="btn rounded-pill px-3">Alat</a>
        <a href="/upah" class="btn rounded-pill px-3">Upah</a>
        <a href="/main" class="btn btn-secondary rounded-pill px-3">Kembali ke Halaman Utama</a>
    </div>

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari...">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                        <a href="{{ route('material.create') }}" class="btn btn-md btn-success mb-3">Tambah Data Bahan</a>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Sub Kategori</th>
                                        <th scope="col">Spesifikasi Material</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Harga Satuan</th>
                                        <th scope="col">Tanggal Update</th>
                                        <th scope="col">Sumber</th>
                                        <th scope="col">Contact Person</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Link Referensi</th>
                                        <th scope="col">Nama Perusahaan / Toko</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->kategori }}</td>
                                            <td>{{ $post->sub_kategori }}</td>
                                            <td>{{ $post->spesifikasi_material }}</td>
                                            <td>{{ $post->satuan }}</td>
                                            <td>Rp. {{ number_format($post->harga_satuan, 0, ',', '.') }}</td>
                                            <td>{{ $post->tanggal_update }}</td>
                                            <td>{{ $post->sumber }}</td>
                                            <td>{{ $post->contact_person }}</td>
                                            <td>{{ $post->email }}</td>
                                            <td><a href="{{ $post->link_referensi }}">{{ $post->link_referensi }}</a></td>
                                            <td>{{ $post->nama_perusahaan_toko }}</td>
                                            <td>{{ $post->lokasi }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('material.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('material.destroy', $post->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="14" class="text-center">Data Post belum Tersedia.</td>
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
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
