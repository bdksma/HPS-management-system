<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input AHSP</title>
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="front/css/breadcrumbs.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/main" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <!--<svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>-->
        <img src="{{asset('front/photo/logo.png')}}" alt="Logo" class="me-2" width="155" height="60">
        <span class="fs-4" align-items-center >Data AHSP</span>
      </a>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ url('/main') }}" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="{{ url('/material') }}" class="nav-link">Basis Data</a></li>
        <li class="nav-item"><a href="#" class="nav-link active">AHSP</a></li>
      </ul>
    </header>
  </div>
    <div class="container-fluid my-0.5">
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
        <form>
        <div class="mb-3">
            <label for="namaPekerjaan" class="form-label">Nama Pekerjaan</label>
            <input type="text" class="form-control" id="namaPekerjaan">
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi">
        </div>
        <h3>Rincian Pekerjaan</h3>

        <!-- Scope Pekerjaan -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Scope Pekerjaan</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <!-- Volume / Quantity -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Volume / Quantity</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <!-- Satuan -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Satuan</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <!-- Proses -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Proses (Deskripsikan Proses Pekerjaan)</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <!-- Asumsi -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Asumsi (Deskripsikan Asumsi Pekerjaan)</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <!-- Bahan -->
        <hr>
        <hr>
        <h4>Bahan</h4>
    <div>
        <table class="table table-bordered" id="bahanTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Jenis Bahan</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Harga Satuan</th>
                </tr>
            </thead>
            <tbody id="bahanTableBody">
                <tr>
                    <td>
                        <select name="jenis_bahan[]" class="form-control material-dropdown">
                            <option value="">Pilih Jenis Bahan</option>
                            @foreach ($materials as $material)
                                <option value="{{ $material->id }}">{{ $material->spesifikasi_material }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" name="satuan[]" class="form-control" placeholder="Satuan" readonly>
                    </td>
                    <td>
                        <input type="number" name="volume[]" class="form-control" placeholder="Volume">
                    </td>
                    <td>
                        <input type="number" name="harga_satuan[]" class="form-control" placeholder="Harga Satuan" readonly>
                    </td>
                </tr>
            </tbody>
        </table>
        <button id="addRowBahan" type="button" class="btn btn-primary">Tambah Baris</button>
    </div>


        <!-- Alat -->
        <hr>
        <h4>Alat</h4>
        <table class = "table"  id="alatTable" class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Jenis Alat</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Harga Satuan</th>
                </tr>
            </thead>
            <tbody id="alatTableBody"></tbody>
        </table>
        <button id="addRowAlat" type="button">Tambah Baris</button>

        <!-- Upah -->
        <hr>
        <div id="mainContainer">
    <div class="section-container" id="sectionTemplate">
        <h4>Upah</h4>
        <select class="upahSelect">
            <option value="Upah Tenaga Ahli Konstruksi">Upah Tenaga Ahli Konstruksi</option>
            <option value="Upah Berdasarkan Penawaran">Upah Berdasarkan Penawaran</option>
            <option value="Upah Tukang Bangunan">Upah Tukang Bangunan</option>
            <option value="Upah Operator Alat">Upah Operator Alat</option>
        </select>

        <table class="upahTable table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Upah Pekerja</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Harga Satuan</th>
                </tr>
            </thead>
            <tbody class="upahTableBody"></tbody>
        </table>
        <button class="addRowUpah btn btn-primary" type="button">Tambah Baris</button>
        <hr>
    </div>
</div>
<button id="duplicateSection" class="btn btn-secondary" type="button">Duplikat Bagian Upah</button>
<hr>

        <!-- AHSP Cards will be dynamically added here -->
    </div>

    <!-- Tambah AHSP Button -->
    <!-- Tambah AHSP Input dan Button -->
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="ahspInput" placeholder="Masukkan nomor AHSP">
        <button type="button" class="btn btn-primary" id="tambahAHSP">Tambah</button>
    </div>

    <!-- Checkbox and Submit Button -->
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Gabungkan Menjadi HPS</button>
</form>
    </div>
    <hr>
<hr>
<script src="{{asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('duplicateSection').addEventListener('click', function() {
        const mainContainer = document.getElementById('mainContainer');
        const sectionTemplate = document.getElementById('sectionTemplate');
        const newSection = sectionTemplate.cloneNode(true);
        mainContainer.appendChild(newSection);

        // Adding event listener for new "Tambah Baris" button in the new section
        const addRowButtons = newSection.querySelectorAll('.addRowUpah');
        addRowButtons.forEach(button => {
            button.addEventListener('click', function() {
                const tbody = this.previousElementSibling.querySelector('.upahTableBody');
                const newRow = tbody.insertRow();
                newRow.innerHTML = `
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                `;
            });
        });
    });

    $(document).ready(function() {
            // Handle dropdown change event
            $(document).on('change', '.material-dropdown', function() {
                var materialId = $(this).val();
                var $row = $(this).closest('tr');

                if (materialId) {
                    $.ajax({
                        url: '/materials/' + materialId,
                        method: 'GET',
                        success: function(data) {
                            $row.find('input[name="satuan[]"]').val(data.satuan);
                            $row.find('input[name="harga_satuan[]"]').val(data.harga_satuan);
                        }
                    });
                } else {
                    $row.find('input[name="satuan[]"]').val('');
                    $row.find('input[name="harga_satuan[]"]').val('');
                }
            });

            // Handle add row button
            $('#addRowBahan').click(function() {
                var newRow = $('#bahanTableBody tr:first').clone();
                newRow.find('input').val('');
                newRow.find('select').val('');
                $('#bahanTableBody').append(newRow);
            });
        });


    // Initial event listener for the first "Tambah Baris" button
    document.querySelector('.addRowUpah').addEventListener('click', function() {
        const tbody = this.previousElementSibling.querySelector('.upahTableBody');
        const newRow = tbody.insertRow();
        newRow.innerHTML = `
            <td><input type="text" class="form-control"></td>
            <td><input type="text" class="form-control"></td>
            <td><input type="text" class="form-control"></td>
            <td><input type="text" class="form-control"></td>
        `;
    });
    
    document.getElementById("addRowBahan").addEventListener("click", function() {
        var tableBody = document.getElementById("bahanTableBody");
        var newRow = tableBody.insertRow(tableBody.rows.length);
        var cells = [];
        for (var i = 0; i < 4; i++) {
            cells.push(newRow.insertCell(i));
            var input = document.createElement("input");
            input.type = "text";
            input.classList.add("form-control");
            cells[i].appendChild(input);
        }
    });

    document.getElementById("addRowAlat").addEventListener("click", function() {
        var tableBody = document.getElementById("alatTableBody");
        var newRow = tableBody.insertRow(tableBody.rows.length);
        var cells = [];
        for (var i = 0; i < 4; i++) {
            cells.push(newRow.insertCell(i));
            var input = document.createElement("input");
            input.type = "text";
            input.classList.add("form-control");
            cells[i].appendChild(input);
        }
    });

    document.getElementById("addRowUpah").addEventListener("click", function() {
        var tableBody = document.getElementById("upahTableBody");
        var newRow = tableBody.insertRow(tableBody.rows.length);
        var cells = [];
        for (var i = 0; i < 4; i++) {
            cells.push(newRow.insertCell(i));
            var input = document.createElement("input");
            input.type = "text";
            input.classList.add("form-control");
            cells[i].appendChild(input);
        }
    });

    // jQuery to change input values when material selection changes
    $('#jenis_bahan').change(function() {
        var jenis_bahan = $(this).val();
        var satuan_bahan = $(this).find('option:selected').data('satuan');
        var harga_satuan_bahan = $(this).find('option:selected').data('harga-satuan');
        $('#satuan_bahan').val(satuan_bahan);
        $('#harga_satuan_bahan').val(harga_satuan_bahan);
    });

    // jQuery to change input values when tool selection changes
    $('#jenis_alat').change(function() {
        var jenis_alat = $(this).val();
        var satuan_alat = $(this).find('option:selected').data('satuan');
        var harga_satuan = $(this).find('option:selected').data('harga-satuan');
        $('#satuan_alat').val(satuan_alat);
        $('#harga_satuan_alat').val(harga_satuan);
    });

    // Function to add AHSP card
    function addAHSPCard(ahspNumber) {
        const container = document.getElementById('ahspContainer');

        // Create new card element
        const card = document.createElement('div');
        card.classList.add('card');
        card.innerHTML = `
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Input AHSP-${ahspNumber}</h5>
                <p class="card-text">Silahkan masukan analisa harga satuan pekerjaan yang dibutuhkan</p>
                <a href="/ahsp/create?nomor_ahsp=${ahspNumber}" class="btn btn-primary">AHSP ${ahspNumber}</a>
                <button type="button" class="btn btn-danger btn-sm delete-ahsp">Hapus</button>
            </div>
        `;
        // Append card to container
        container.appendChild(card);
    }

    // Function to remove AHSP card
    function removeAHSPCard(event) {
        const card = event.target.closest('.card');
        if (card) {
            card.remove();
        }
    }

    // Event listener for "Tambah AHSP" button
    document.getElementById('tambahAHSP').addEventListener('click', function() {
        const ahspInput = document.getElementById('ahspInput').value;
        addAHSPCard(ahspInput);
        // Clear the input after adding AHSP card
        document.getElementById('ahspInput').value = '';
    });

    // Event delegation for "Hapus" buttons within AHSP cards
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-ahsp')) {
            removeAHSPCard(event);
        }
    });
</script>
</body>
</html>