<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pekerjaan</title>
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="front/css/breadcrumbs.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/main" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src="{{asset('front/photo/logo.png')}}" alt="Logo" class="me-2" width="155" height="60">
        <span class="fs-4" align-items-center>Data Pekerjaan AHSP</span>
      </a>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ url('/main') }}" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="{{ url('/material') }}" class="nav-link">Basis Data</a></li>
        <li class="nav-item"><a href="{{ url('/newhps')}}" class="nav-link active">HPS</a></li>
      </ul>
    </header>
</div>
<div class="container-fluid my-0.5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item">
                <a class="link-body-emphasis fw-semibold text-decoration-none" href="{{ url('/main') }}">Main</a>
            </li>
            <li class="breadcrumb-item">
                <a class="link-body-emphasis fw-semibold text-decoration-none" href="{{ url('/newhps') }}">Buat HPS Baru</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Input Data Pekerjaan AHSP
            </li>
        </ol>
    </nav>
    <form id="ahspForm" method="POST" action="{{ route('ahsp.pekerjaan') }}">
        @csrf
        <div class="mb-3">
            <label for="namaPekerjaan" class="form-label">Nama Pekerjaan</label>
            <input type="text" class="form-control" id="namaPekerjaan" name="namaPekerjaan" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
        </div>
        <div class="mb-3">
            <label for="nomorPekerjaan" class="form-label">Nomor Pekerjaan</label>
            <input type="text" class="form-control" id="nomorPekerjaan" name="nomorPekerjaan" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="button" class="btn btn-primary" id="lanjutkanButton">Lanjutkan</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#ahspForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('ahsp.pekerjaan') }}',
                data: $(this).serialize(),
                success: function(response) {
                    alert('Data pekerjaan berhasil disimpan.');
                    // Optional redirect after save
                },
                error: function(error) {
                    alert('Gagal menyimpan AHSP. Silakan coba lagi.');
                    console.log(error);
                }
            });
        });

        $('#lanjutkanButton').on('click', function() {
            window.location.href = "{{ url('/input-ahs') }}"; // Redirect to the next page
        });
    });
</script>
</body>
</html>
