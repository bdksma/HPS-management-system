<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Dokumen HPS</title>
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="front/css/breadcrumbs.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-fluid mb-4">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/main" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <!--<svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>-->
                <img src="{{asset('front/photo/logo.png')}}" alt="Logo" class="me-2" width="155" height="60">
                <span class="fs-4" align-items-center>Buat HPS</span>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{ url('/main') }}" class="nav-link" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="{{ url('/material') }}" class="nav-link">Basis Data</a></li>
                <li class="nav-item"><a href="#" class="nav-link active">HPS</a></li>
            </ul>
        </header>
    </div>
    <div class="container-fluid mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item">
                    <a class="link-body-emphasis fw-semibold text-decoration-none" href="{{ url('/main') }}">Main</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Buat HPS Baru
                </li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid d-flex justify-content-center mt-5">
        <div class="col-md-4 mb-4 mx-4">
            <div class="card mb-4 rounded-3 shadow-sm border-primary">
                <div class="card-header py-3 text-bg-primary border-primary">
                    <h4 class="my-0 fw-normal">AHSP</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">Input Data AHSP</h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Analisa Harga Satuan Pekerjaan</li>
                        <li>disebut juga AHSP</li>
                        <li>Diperlukan untuk membuat kebutuhan per-scope</li>
                        <li>pekerjaan yang dilakukan</li>
                    </ul>
                    <a href="/pekerjaanhps/create" class="w-100 btn btn-lg btn-primary">Input Data AHSP</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4 mx-4">
            <div class="card mb-4 rounded-3 shadow-sm border-primary">
                <div class="card-header py-3 text-bg-primary border-primary">
                    <h4 class="my-0 fw-normal">HPS</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">Buat Dokumen HPS</h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Harga Perkiraan Sendiri</li>
                        <li>Disebut juga dokumen HPS</li>
                        <li>dibuat dengan menggabungkan beberapa data</li>
                        <li>yang telah dibuat sebelumnya dengan AHSP</li>
                    </ul>
                    <a href="/testform" class="w-100 btn btn-lg btn-primary">Buat Dokumen HPS</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Add your JavaScript here
    </script>
</body>
</html>
