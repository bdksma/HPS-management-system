<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Rincian Pekerjaan AHSP</title>
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="front/css/breadcrumbs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<body>
<div class="container-fluid">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/main" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <!--<svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>-->
        <img src="{{asset('front/photo/logo.png')}}" alt="Logo" class="me-2" width="155" height="60">
        <span class="fs-4" align-items-center >Rincian Pekerjaan AHSP</span>
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
                <li class="breadcrumb-item">
                    <a class="link-body-emphasis fw-semibold text-decoration-none" href="{{ url('/pekerjaan') }}">Input Data Pekerjaan AHSP</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Rincian Pekerjaan AHSP
                </li>
            </ol>
        </nav>
        <form action="{{ route('rincianpekerjaanhps.storeRincianPekerjaanHps') }}" method="POST">
        @csrf
	<input type="hidden" name="pekerjaan_id" value="{{ $pekerjaan_id }}">
        <h3>Rincian Pekerjaan</h3>

        <!-- Nomor Urut -->
        <div class="input-group mb-3">
        <span class="input-group-text" id="nomorUrut">Nomor Urut</span>
        <input type="nomor" name="nomor_urut" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
        </div>

        <!-- Scope Pekerjaan -->
        <div class="input-group mb-3">
        <span class="input-group-text" id="scopePekerjaan">Scope Pekerjaan</span>
        <input type="textarea" name="uraian_pekerjaan" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
        </div>

        <!-- Volume / Quantity -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Volume / Quantity</span>
            <input type="nomor" name="volume_angka"  step="0.01" inputmode="numeric" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
        </div>

        <!-- Satuan -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Satuan</span>
            <input type="text" name="volume_satuan" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
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
                        <th scope="col">Biaya</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="bahanTableBody">
                    <tr>
                    <td>
                        <select name="jenis_bahan" class="form-control material-dropdown select2">
                            <option value="">Pilih Jenis Bahan</option>
                            @foreach ($materials as $material)
                                <option value="{{ $material->id }}">{{ $material->spesifikasi_material }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" inputmode="numeric" name="satuan_bahan" class="form-control" placeholder="Satuan">
                    </td>
                    <td>
                        <input type="text" inputmode="numeric" name="volume_bahan" class="form-control" placeholder="Volume" step="0.01">
                    </td>
                    <td>
                        <input type="text" inputmode="numeric" name="harga_satuan_bahan" class="form-control" placeholder="Harga Satuan" step="0.01">
                    </td>
                        <td>
                            <input type="text" inputmode="numeric" name="biaya_bahan" class="form-control" placeholder="Biaya" step="0.01">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm delete-row">Hapus</button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="4" id="totalHargaBahanLabel">Total Harga Bahan</th>
                    <th id="totalHargaBahan" name="biaya_satuan_bahan" required>0</th>
                </tr>
            </tfoot>
            </table>
            <input type="hidden" name="biaya_satuan_bahan" id="biaya_satuan_bahan">
            <button id="addRowBahan" type="button" class="btn btn-primary">Tambah Baris</button>
        </div>



        <!-- Alat -->
        <hr>
        <h4>Alat</h4>
        <table class="table table-bordered" id="alatTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Jenis Alat</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody id="alatTableBody">
                <tr>
                <td>
                    <select name="jenis_alat" class="form-control tool-dropdown select2">
                        <option value="">Pilih Jenis Alat</option>
                        @foreach ($alats as $alat)
                            <option value="{{ $alat->id }}">{{ $alat->spesifikasi_alat }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" name="satuan" class="form-control" placeholder="Satuan">
                </td>
                <td>
                    <input type="text" inputmode="numeric" name="volume" class="form-control" placeholder="Volume">
                </td>
                <td>
                    <input type="text" inputmode="numeric" name="harga_satuan" class="form-control" placeholder="Harga Satuan">
                </td>
                    <td>
                        <input type="text" inputmode="numeric" name="biaya" class="form-control" placeholder="Biaya" step="0.01">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm delete-row">Hapus</button>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" id="totalHargaAlatLabel">Total Harga Alat</th>
                    <th id="totalHargaAlat" name="biaya_satuan_alat" required>0</th>
                </tr>
            </tfoot>
        </table>
        <input type="hidden" name="biaya_satuan_alat" id="biayaSatuanAlatInput">
        <button id="addRowAlat" type="button" class="btn btn-primary">Tambah Baris</button>


        <!-- Upah -->
        <hr>
        <h4>Upah</h4>
        <table class="table table-bordered" id="upahTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Jenis Upah</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Upah</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody id="upahTableBody">
                <tr>
                <td>
                    <input type="text" name="jenis_upah" class="form-control" placeholder="Jenis Upah">
                </td>
                <td>
                    <select name="keterangan" class="form-control upah-dropdown">
                        <option value="">Spesifik Upah</option>
                        @foreach ($upahs as $upah)
                            <option value="{{ $upah->id }}">{{ $upah->keterangan }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" name="satuan_persentase_utb" class="form-control" placeholder="Satuan / Persentase (UTB)">
                </td>
                <td>
                    <input type="text" inputmode="numeric" name="volume" class="form-control upah-volume" placeholder="Volume">
                </td>
                <td>
                    <input type="text" inputmode="numeric" name="upah" class="form-control" placeholder="Upah">
                </td>
                    <td>
                        <input type="text" inputmode="numeric" name="biaya" class="form-control" placeholder="Biaya" step="0.01">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm delete-row">Hapus</button>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5" id="totalHargaUpahLabel">Total Harga Upah</th>
                    <th id="hargaTotalUpah" name="biaya_satuan_upah" required>0</th>
                </tr>
            </tfoot>
        </table>
        <input type="hidden" name="biaya_satuan_upah" id="biayaSatuanUpah">
        <button id="addRowUpah" type="button" class="btn btn-primary">Tambah Baris</button>
    </div>
    <div class="d-flex justify-content-end">
            <button type="submit" name="tambah_rincian" class="btn btn-success me-2">Simpan</button>
            <button type="submit" name="selesai" class="btn btn-primary">Selesai</button>
    </div>
</form>

<h3>Rincian Pekerjaan yang Sudah Ditambahkan:</h3>
<table border="1">
    <thead>
        <tr>
            <th>Uraian Pekerjaan</th>
            <th>Volume (Angka)</th>
            <th>Volume (Satuan)</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rincian as $item)
            <tr>
                <td>{{ $item->uraian_pekerjaan }}</td>
                <td>{{ $item->volume_angka }}</td>
                <td>{{ $item->volume_satuan }}</td>
                <td>{{ $item->biaya_satuan_bahan + $item->biaya_satuan_alat + $item->biaya_satuan_upah }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<script> //BAHAN
$(document).ready(function() {
    // Fungsi untuk mengonversi input menjadi angka
    function convertToNumber(input) {
        let number = parseFloat(input);
        if (isNaN(number)) {
            number = 0;
        }
        return number;
    }

    // Fungsi untuk memformat angka
    function formatNumber(input) {
        let number = convertToNumber(input);
        if (typeof number === 'number' && !isNaN(number)) {
            return number.toFixed(2);
        } else {
            return '0.00';
        }
    }

    // Fungsi untuk menghitung total harga bahan
    function calculateTotalHargaBahan() {
    let hargaTotalBahan = 0;

    $('#bahanTableBody tr').each(function(index, row) {
        const volume = convertToNumber($(row).find('input[name="volume"]').val());
        const hargaSatuan = convertToNumber($(row).find('input[name="harga_satuan"]').val());
        const biaya = volume * hargaSatuan;
        $(row).find('input[name="biaya"]').val(formatNumber(biaya));
        hargaTotalBahan += biaya;
    });

    // Menampilkan total biaya bahan di tampilan
    $('#hargaTotalBahan').text('TOTAL HARGA BAHAN: ' + hargaTotalBahan.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));

    // Memasukkan total biaya bahan ke dalam input hidden untuk dikirim ke backend
    $('#biaya_satuan_bahan').val(hargaTotalBahan);
}




    // Inisialisasi Select2 untuk dropdown yang ada
    $('.select2').select2();

    // Event handler untuk perubahan dropdown material
    $(document).on('change', '.material-dropdown', function() {
        var materialId = $(this).val();
        var $row = $(this).closest('tr');

        if (materialId) {
            $.ajax({
                url: '/materials/' + materialId,
                method: 'GET',
                success: function(data) {
                    $row.find('input[name="satuan"]').val(data.satuan);
                    $row.find('input[name="harga_satuan"]').val(data.harga_satuan);
                    calculateTotalHargaBahan();
                }
            });
        } else {
            $row.find('input[name="satuan"]').val('');
            $row.find('input[name="harga_satuan"]').val('');
            calculateTotalHargaBahan();
        }
    });

    // Tambahkan baris baru ke tabel bahan
    $('#addRowBahan').on('click', function() {
        $('#bahanTableBody').append('<tr>\
            <td>\
                <select name="jenis_bahan" class="form-control material-dropdown select2">\
                    <option value="">Pilih Jenis Bahan</option>\
                    @foreach ($materials as $material)\
                        <option value="{{ $material->id }}">{{ $material->spesifikasi_material }}</option>\
                    @endforeach\
                </select>\
            </td>\
            <td>\
                <input type="text" name="satuan" class="form-control" placeholder="Satuan">\
            </td>\
            <td>\
                <input type="text" inputmode="numeric" name="volume" class="form-control material-volume" placeholder="Volume" step="0.01">\
            </td>\
            <td>\
                <input type="text" inputmode="numeric" name="harga_satuan" class="form-control" placeholder="Harga Satuan" step="0.01">\
            </td>\
            <td>\
                <input type="text" inputmode="numeric" name="biaya" class="form-control" placeholder="Biaya" step="0.01">\
            </td>\
            <td>\
                <button type="button" class="btn btn-danger btn-sm delete-row">Hapus</button>\
            </td>\
        </tr>');

        // Inisialisasi ulang Select2 untuk dropdown yang baru ditambahkan
        $('.select2').select2();
    });

    // Hapus baris dari tabel bahan
    $(document).on('click', '.delete-row', function() {
        $(this).closest('tr').remove();
        calculateTotalHargaBahan();
    });

    // Event handler untuk perubahan input volume dan harga_satuan
    $(document).on('change', 'input[name="volume"], input[name="harga_satuan"]', function() {
        const $row = $(this).closest('tr');
        const volume = convertToNumber($row.find('input[name="volume"]').val());
        const hargaSatuan = convertToNumber($row.find('input[name="harga_satuan"]').val());
        const biaya = volume * hargaSatuan;
        if (typeof biaya === 'number') {
            $row.find('input[name="biaya"]').val(formatNumber(biaya));
        } else {
            console.error('biaya bukan angka:', biaya);
        }
        calculateTotalHargaBahan();
    });

    function updateTotalHargaBahanInput() {
    let totalHarga = $('#totalHargaBahan').text();
    $('#totalHargaBahanInput').val(totalHarga);
    }

    // Panggil fungsi setiap kali total harga bahan dihitung ulang
    $(document).on('change', 'input[name="volume"], input[name="harga_satuan"]', function() {
        calculateTotalHargaBahan();
        updateTotalHargaBahanInput();
    });

    // Fungsi untuk menghapus kartu AHSP
    function removeAHSPCard() {
        $(this).closest('.ahsp-card').remove();
        calculateTotalHargaBahan();
    }

    // Attach event listeners
    $('input[name="harga_satuan"]').on('change', calculateTotalHargaBahan);
    $('input[name="upah"]').on('change', calculateTotalHargaBahan);
    $('input[name="volume"]').on('change', calculateTotalHargaBahan);
    $('#ahspTambahButton').on('click', function() {
        const ahspNumber = parseInt($('#ahspTambahButton').attr('data-ahsp-number'));
        addAHSPCard(ahspNumber);
        $('#ahspTambahButton').attr('data-ahsp-number', ahspNumber + 1);
    });
    $(document).on('click', '.delete-ahsp', removeAHSPCard);
});
</script>


<script> //ALAT
$(document).ready(function() {
    // Fungsi untuk mengonversi input menjadi angka
    function convertToNumber(input) {
        let number = parseFloat(input);
        if (isNaN(number)) {
            number = 0;
        }
        return number;
    }

    // Fungsi untuk memformat angka
    function formatNumber(input) {
        let number = convertToNumber(input);
        if (typeof number === 'number' && !isNaN(number)) {
            return number.toFixed(2);
        } else {
            return '0.00';
        }
    }

    // Fungsi untuk menghitung total harga alat
    function calculateTotalHargaAlat() {
    let hargaTotalAlat = 0;

    $('#alatTableBody tr').each(function(index, row) {
        const volume = convertToNumber($(row).find('input[name="volume"]').val());
        const hargaSatuan = convertToNumber($(row).find('input[name="harga_satuan"]').val());
        const biaya = volume * hargaSatuan;
        $(row).find('input[name="biaya"]').val(formatNumber(biaya));
        hargaTotalAlat += biaya;
    });

    $('#totalHargaAlat').text(formatNumber(hargaTotalAlat));
    $('#biayaSatuanAlatInput').val(hargaTotalAlat); // Simpan nilai ke input hidden
}

    // Event handler untuk dropdown alat
    $(document).ready(function() {
        $('.select2').select2();
    });

    $(document).on('change', '.tool-dropdown', function() {
        var alatId = $(this).val();
        var $row = $(this).closest('tr');

        if (alatId) {
            $.ajax({
                url: '/alats/' + alatId,
                method: 'GET',
                success: function(data) {
                    $row.find('input[name="satuan"]').val(data.satuan);
                    $row.find('input[name="harga_satuan"]').val(data.harga_satuan);
                    calculateTotalHargaAlat();
                }
            });
        } else {
            $row.find('input[name="satuan"]').val('');
            $row.find('input[name="harga_satuan"]').val('');
            calculateTotalHargaAlat();
        }
    });

    // Event handler untuk input volume alat
    $(document).on('input', '.alat-volume', function() {
        const $row = $(this).closest('tr');
        const volume = convertToNumber($row.find('input[name="volume"]').val());
        const hargaSatuan = convertToNumber($row.find('input[name="harga_satuan"]').val());

        if (!isNaN(volume) && !isNaN(hargaSatuan)) {
            const biaya = volume * hargaSatuan;
            $row.find('input[name="biaya"]').val(formatNumber(biaya));
            calculateTotalHargaAlat();
        }
    });

    // Tambahkan baris baru ke tabel alat
    $('#addRowAlat').on('click', function() {
        $('#alatTableBody').append('<tr>\
            <td>\
                <select name="jenis_alat" class="form-control tool-dropdown select2">\
                    <option value="">Pilih Jenis Alat</option>\
                    @foreach ($alats as $alat)\
                        <option value="{{ $alat->id }}">{{ $alat->spesifikasi_alat }}</option>\
                    @endforeach\
                </select>\
            </td>\
            <td>\
                <input type="text" name="satuan" class="form-control" placeholder="Satuan">\
            </td>\
            <td>\
                <input type="text" inputmode="numeric" name="volume" class="form-control alat-volume" placeholder="Volume" step="0.01">\
            </td>\
            <td>\
                <input type="text" inputmode="numeric" name="harga_satuan" class="form-control" placeholder="Harga Satuan" step="0.01">\
            </td>\
            <td>\
                <input type="text" inputmode="numeric" name="biaya" class="form-control" placeholder="Biaya" step="0.01">\
            </td>\
            <td>\
                <button type="button" class="btn btn-danger btn-sm delete-row">Hapus</button>\
            </td>\
        </tr>');

        $('.select2').select2();
    });

    // Hapus baris dari tabel alat
    $(document).on('click', '.delete-row', function() {
        $(this).closest('tr').remove();
        calculateTotalHargaAlat();
    });

    // Event handler untuk perubahan input volume dan harga_satuan
    $(document).on('change', 'input[name="volume"], input[name="harga_satuan"]', function() {
        const $row = $(this).closest('tr');
        const volume = convertToNumber($row.find('input[name="volume"]').val());
        const hargaSatuan = convertToNumber($row.find('input[name="harga_satuan"]').val());
        const biaya = volume * hargaSatuan;
        if (typeof biaya === 'number') {
            $row.find('input[name="biaya"]').val(formatNumber(biaya));
        } else {
            console.error('biaya bukan angka:', biaya);
        }
        calculateTotalHargaAlat();
    });

    // Fungsi untuk menghapus kartu AHSP
    function removeAHSPCard() {
        $(this).closest('.ahsp-card').remove();
        calculateTotalHargaAlat();
    }

    // Attach event listeners
    $('input[name="harga_satuan"]').on('change', calculateTotalHargaAlat);
    $('input[name="upah"]').on('change', calculateTotalHargaAlat);
    $('input[name="volume"]').on('change', calculateTotalHargaAlat);
    $('#ahspTambahButton').on('click', function() {
        const ahspNumber = parseInt($('#ahspTambahButton').attr('data-ahsp-number'));
        addAHSPCard(ahspNumber);
        $('#ahspTambahButton').attr('data-ahsp-number', ahspNumber + 1);
    });
    $(document).on('click', '.delete-ahsp', removeAHSPCard);
});
</script>


<script> //UPAH
$(document).ready(function() {
    //fungsi untuk mengonversi input menjadi angka
    function convertToNumber(input) {
        let number = parseFloat(input);
        if (isNaN(number)) {
            number = 0; // Setel ke 0 jika NaN
        }
        return number;
    }

    // fungsi untuk memformat angka
    function formatNumber(input) {
        let number = convertToNumber(input);
        if (!isNaN(number)) {
            return number.toFixed(2);
        } else {
            return '0.00';
        }
    }

    // Function to calculate total harga upah
    function calculateTotalHargaUpah() {
    let hargaTotalUpah = 0;

    $('#upahTableBody tr').each(function(index, row) {
        const volume = convertToNumber($(row).find('input[name="volume"]').val());
        const hargaSatuan = convertToNumber($(row).find('input[name="upah"]').val());

        const biaya = volume * hargaSatuan;
        $(row).find('input[name="biaya"]').val(formatNumber(biaya));
        hargaTotalUpah += biaya;
    });

    // Setel nilai total harga upah di tabel dan input hidden
    $('#totalHargaUpah').text('TOTAL HARGA: ' + hargaTotalUpah.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
    $('#biayaSatuanUpah').val(hargaTotalUpah);
}


    // Event handler untuk dropdown upah
    $(document).ready(function() {
        $('.upah-dropdown').select2({
            placeholder: "Spesifik Upah",
            allowClear: true
        });

        $(document).on('change', '.upah-dropdown', function() {
            var upahId = $(this).val();
            var $row = $(this).closest('tr');

            if (upahId) {
                $.ajax({
                    url: '/upahs/' + upahId,
                    method: 'GET',
                    success: function(data) {
                        $row.find('input[name="jenis_upah"]').val(data.jenis_upah);
                        $row.find('input[name="satuan_persentase_utb"]').val(data.satuan_persentase_utb);
                        $row.find('input[name="upah"]').val(data.upah);
                        calculateTotalHargaUpah();
                    }
                });
            } else {
                $row.find('input[name="jenis_upah"]').val('');
                $row.find('input[name="satuan_persentase_utb"]').val('');
                $row.find('input[name="upah"]').val('');
                calculateTotalHargaUpah();
            }
        });
    });

    // Event handler untuk input volume dan upah
    $(document).on('input', '.upah-volume', function() {
        const $row = $(this).closest('tr');
        const volume = convertToNumber($row.find('input[name="volume"]').val());
        const hargaSatuan = convertToNumber($row.find('input[name="upah"]').val());

        if (!isNaN(volume) && !isNaN(hargaSatuan)) {
            const biaya = volume * hargaSatuan;
            $row.find('input[name="biaya"]').val(formatNumber(biaya));
            calculateTotalHargaUpah();
        }
    });

    // Menambahkan baris baru ke dalam tabel upah
    $('#addRowUpah').on('click', function() {
        $('#upahTableBody').append('<tr>\
            <td>\
                <input type="text" name="jenis_upah" class="form-control" placeholder="Jenis Upah">\
            </td>\
            <td>\
                <select name="keterangan" class="form-control upah-dropdown">\
                    <option value="">Spesifik Upah</option>\
                    @foreach ($upahs as $upah)\
                        <option value="{{ $upah->id }}">{{ $upah->keterangan }}</option>\
                    @endforeach\
                </select>\
            </td>\
            <td>\
                <input type="text" name="satuan_persentase_utb" class="form-control" placeholder="Satuan / Persentase (UTB)">\
            </td>\
            <td>\
                <input type="text" inputmode="numeric" name="volume" class="form-control" placeholder="Volume">\
            </td>\
            <td>\
                <input type="text" inputmode="numeric" name="upah" class="form-control" placeholder="Upah">\
            </td>\
            <td>\
                <input type="text" inputmode="numeric" name="biaya" class="form-control" placeholder="Biaya" step="0.01">\
            </td>\
            <td>\
                <button type="button" class="btn btn-danger btn-sm delete-row">Hapus</button>\
            </td>\
        </tr>');

        $('.upah-dropdown').select2({
            placeholder: "Spesifik Upah",
            allowClear: true
        });
    });

    // Menghapus baris dari tabel upah
    $(document).on('click', '.delete-row', function() {
        $(this).closest('tr').remove();
        calculateTotalHargaUpah();
    });

    // Event handler untuk perubahan input volume dan harga_satuan
    $(document).on('change', 'input[name="volume"], input[name="upah"]', function() {
        const $row = $(this).closest('tr');
        const volume = convertToNumber($row.find('input[name="volume"]').val());
        const hargaSatuan = convertToNumber($row.find('input[name="upah"]').val());
        const biaya = volume * hargaSatuan;
        if (typeof biaya === 'number') {
            $row.find('input[name="biaya"]').val(formatNumber(biaya));
        } else {
            console.error('biaya bukan angka:', biaya);
        }
        calculateTotalHargaUpah();
    });

    // Fungsi untuk menghapus kartu AHSP
    function removeAHSPCard() {
        $(this).closest('.ahsp-card').remove();
        calculateTotalUpah();
    }

    // Attach event listeners
    $('input[name="harga_satuan"]').on('change', calculateTotalHargaUpah);
    $('input[name="upah"]').on('change', calculateTotalHargaUpah);
    $('input[name="volume"]').on('change', calculateTotalHargaUpah);
    $('#ahspTambahButton').on('click', function() {
        const ahspNumber = parseInt($('#ahspTambahButton').attr('data-ahsp-number'));
        addAHSPCard(ahspNumber);
        $('#ahspTambahButton').attr('data-ahsp-number', ahspNumber + 1);
    });
    // Menangani event delete AHSP
    $(document).on('click', '.delete-ahsp', removeAHSPCard);
});
</script>
</body>
</html>