<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input AHSP</title>
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="front/css/breadcrumbs.css" rel="stylesheet">
</head>
<body>
<div class="container my-0.5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item">
                <a class="link-body-emphasis" href="{{ url('/main') }}">
                    <svg class="bi" width="16" height="16"><use xlink:href="#house-door-fill"></use></svg>
                    <span class="visually-hidden">Home</span>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a class="link-body-emphasis fw-semibold text-decoration-none" href="{{ url('/new-hps') }}">Buat HPS Baru</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Input AHSP
            </li>
        </ol>
    </nav>
</div>

<form>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nama Pekerjaan</label>
        <input type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Lokasi</label>
        <input type="text" class="form-control" id="exampleInputPassword1">
    </div>
    
    <!-- Card Container for AHSPs -->
    <div id="ahspContainer">
        <!-- AHSP Cards will be dynamically added here -->
    </div>
    
    <!-- Tambah AHSP Button -->
    <button type="button" class="btn btn-primary" id="tambahAHSP">Tambah AHSP</button>

    <!-- Checkbox and Submit Button -->
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Gabungkan Menjadi HPS</button>
</form>

<script src="{{asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- JavaScript for dynamic addition and removal of AHSP cards -->
<script>
    // Initialize counter for AHSP cards
    let ahspCount = 1;

    // Function to add AHSP card dynamically
    function addAHSPCard() {
        const container = document.getElementById('ahspContainer');

        // Create new card element
        const card = document.createElement('div');
        card.classList.add('card');
        card.innerHTML = `
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Input AHSP-${ahspCount}</h5>
                <p class="card-text">Silahkan masukan analisa harga satuan pekerjaan yang dibutuhkan</p>
                <a href="/ahsp" class="btn btn-primary">AHSP ${ahspCount}</a>
                <button type="button" class="btn btn-danger btn-sm delete-ahsp">Hapus</button>
            </div>
        `;

        // Append card to container
        container.appendChild(card);

        // Increment AHSP count
        ahspCount++;
    }

    // Function to remove AHSP card
    function removeAHSPCard(event) {
        const card = event.target.closest('.card');
        if (card) {
            card.remove();
        }
    }

    // Event listener for "Tambah AHSP" button
    document.getElementById('tambahAHSP').addEventListener('click', addAHSPCard);

    // Event delegation for "Hapus" buttons within AHSP cards
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-ahsp')) {
            removeAHSPCard(event);
        }
    });
</script>
</body>
</html>